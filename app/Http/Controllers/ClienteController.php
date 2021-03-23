<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::where('ativo', 1)
            ->orderBy('nome')
            ->get();

        return view('clientes.index', ['clientes' => $clientes]);
    }

    public function create() {
        return view('clientes.create');
    }

    public function store(Request $request) {
        $email = $request->input('email');
        $cpf = $request->input('cpf');

        $clienteWithEmail = Cliente::where('email', $email)->first();

        if ($clienteWithEmail) {
            return redirect()->route('clientes.create')
                ->with('erro', 'Endereço de e-mail já cadastrado, por favor, tente outro');
        }

        $clienteWithCpf = Cliente::where('cpf', $cpf)->first();

        if ($clienteWithCpf) {
            return redirect()->route('clientes.create')
                ->with('erro', 'CPF já cadastrado, por favor, tente outro');
        }

        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'max:14'],
            'email' => ['required', 'email']
        ]);

        Cliente::create($data);

        return redirect()->route('clientes.index');
    }

    public function edit($id) {
        $cliente = Cliente::find($id);

        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'max:14'],
            'email' => ['required', 'email']
        ]);

        Cliente::whereId($id)->update($data);

        return redirect()->route('clientes.index');
    }

    public function destroy($id) {
        Cliente::whereId($id)->update(['ativo' => 0]);

        return redirect()->route('clientes.index');
    }
}
