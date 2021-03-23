<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index() {
        $produtos = Produto::where('ativo', 1)
            ->orderBy('nome')
            ->get();

        return view('produtos.index', ['produtos' => $produtos]);
    }

    public function create() {
        return view('produtos.create');
    }

    public function store(Request $request) {
        $codigoBarras = $request->input('codigo_barras');

        $produtoWithCodigoBarras = Produto::where('codigo_barras', $codigoBarras)->first();

        if ($produtoWithCodigoBarras) {
            return redirect()->route('produtos.create')
                ->with('erro', 'Código de barras já cadastrado, por favor, tente outro');
        }

        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'codigo_barras' => ['required', 'numeric'],
            'valor' => ['required']
        ]);

        Produto::create($data);

        return redirect()->route('produtos.index');
    }

    public function edit($id) {
        $produto = Produto::find($id);

        return view('produtos.edit', ['produto' => $produto]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'codigo_barras' => ['required', 'numeric'],
            'valor' => ['required']
        ]);

        Produto::whereId($id)->update($data);

        return redirect()->route('produtos.index');
    }

    public function destroy($id) {
        Produto::whereId($id)->update(['ativo' => 0]);

        return redirect()->route('produtos.index');
    }
}
