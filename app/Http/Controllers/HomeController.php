<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $pedidos = DB::table('pedidos')
            ->join('clientes', 'clientes.id', '=', 'pedidos.cliente_id')
            ->select(
                'pedidos.id',
                'clientes.nome as nome_cliente',
                'clientes.cpf',
                'pedidos.created_at',
                'pedidos.valor_total',
                'pedidos.status'
            )
            ->orderBy('pedidos.id', 'desc')
            ->simplePaginate(5);

        foreach ($pedidos as $pedido) {
            $pedido->created_at = Carbon::parse($pedido->created_at)->format('d/m/Y');
            $pedido->status = DB::table('status_pedido')
                ->select('descricao')
                ->where('id', $pedido->status)
                ->first();
        }

        $produtosPedido = DB::table('produtos_pedido')
            ->join('produtos', 'produtos.id', '=', 'produtos_pedido.produto_id')
            ->select(
                'produtos_pedido.pedido_id as pedido_id',
                'produtos.nome',
                'produtos_pedido.qtde'
            )
            ->orderBy('produtos.nome', 'asc')
            ->get();

        return view('home', [
            'pedidos' => $pedidos,
            'produtos_pedidos' => $produtosPedido
        ]);
    }

    public function register() {
        return view('register');
    }

    public function novoUsuario(Request $request) {
        $data = $request->validate([
            'usuario' => ['required', 'min:3', 'max:100'],
            'nome' => ['required', 'max:100'],
            'email' => ['email'],
            'password' => ['required', 'confirmed', 'min:4']
        ]);

        $hashSenha = password_hash($data['password'], PASSWORD_DEFAULT);

        unset($data['password']);

        Usuario::create(array_merge(
            $data,
            ['senha' => $hashSenha]
        ));

        return redirect()->route('login');
    }
}
