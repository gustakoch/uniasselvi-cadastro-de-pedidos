<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\ProdutoPedido;
use App\Models\StatusPedido;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function create() {
        $clientes = Cliente::where('ativo', 1)->orderBy('nome')->get();
        $produtos = Produto::where('ativo', 1)->orderBy('nome')->get();
        $statusPedidos = StatusPedido::all();

        return view('pedidos.create', [
            'clientes' => $clientes,
            'produtos' => $produtos,
            'status' => $statusPedidos
        ]);
    }

    public function consultaProduto(Request $request) {
        $produto = Produto::find($request->id);

        $produto->valor = number_format($produto->valor, 2, ',', '.');

        return response()->json($produto);
    }

    public function todosProdutos() {
        $produtos = Produto::where('ativo', 1)->orderBy('nome')->get();

        return response()->json($produtos);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'cliente' => ['required']
        ]);

        $status = $request->input('status');
        $produtos = $request->input('produto');
        $qtdes = $request->input('qtde');

        foreach ($produtos as $produto) {
            if (!$produtos) {
                return redirect()->route('pedidos.create')
                    ->with('erro_produto', 'Por favor, selecione um produto');
            }
        }

        foreach ($qtdes as $qtde) {
            if (!$qtde) {
                return redirect()->route('pedidos.create')
                    ->with('erro_qtde', 'Por favor, informe a quantidade');
            }
        }

        $valorTotalPedido = 0;

        foreach ($produtos as $k => $produto) {
            $consultaProduto = Produto::find($produto);

            $valorUnitario = floatval($consultaProduto->valor);
            $qtdeItem = intval($qtdes[$k]);

            $valorTotalItem = $valorUnitario * $qtdeItem;
            $valorTotalPedido += $valorTotalItem;
        }

        $pedido = Pedido::create([
            'cliente_id' => $data['cliente'],
            'valor_total' => $valorTotalPedido,
            'status' => $status
        ]);

        for ($i = 0; $i < count($produtos); $i++) {
            ProdutoPedido::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $produtos[$i],
                'qtde' => $qtdes[$i]
            ]);
        }

        return redirect('/');
    }

    public function edit($id) {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return redirect('/');
        }

        $cliente = Cliente::find($pedido->cliente_id);
        $produtos = ProdutoPedido::where('pedido_id', $id)->get();

        $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();

        foreach ($produtos as $p) {
            $p->nome_produto = DB::table('produtos')->where('id', $p->produto_id)->value('nome');
            $p->valor_unitario = DB::table('produtos')->where('id', $p->produto_id)->value('valor');
            $p->numero_codigo_barras = DB::table('produtos')->where('id', $p->produto_id)->value('codigo_barras');
            $p->codigo_barras = $generator->getBarcode($p->numero_codigo_barras, $generator::TYPE_CODE_128);
        }

        $statusPedidos = StatusPedido::all();

        return view('pedidos.edit', [
            'pedido' => $pedido,
            'cliente' => $cliente,
            'produtos' => $produtos,
            'status' => $statusPedidos
        ]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'status' => ['required']
        ]);

        Pedido::whereId($id)->update($data);

        return redirect('/');
    }

    public function destroy($id) {
        $pedido = Pedido::find($id);

        $pedido->delete();

        return redirect('/');
    }
}
