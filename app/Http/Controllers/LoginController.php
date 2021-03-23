<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        if (session('usuario')) {
            return redirect()->route('home');
        }

        return view('login');
    }

    public function authenticate(Request $request) {
        $data = $request->validate([
            'usuario' => ['required', 'max:100', 'string'],
            'senha' => ['required']
        ]);

        $usuario = Usuario::where('usuario', $data['usuario'])->first();

        if (!$usuario) {
            return redirect()->route('login')
                ->with('erro', 'Usuário e/ou senha não conferem');
        }

        $hashUsuario = $usuario->senha;

        if (!password_verify($data['senha'], $hashUsuario)) {
            return redirect()->route('login')
                ->with('erro', 'Usuário e/ou senha não conferem');
        }

        $request->session()->put('usuario', [
            'id' => $usuario->id,
            'nome' => $usuario->nome,
            'email' => $usuario->email
        ]);

        return redirect()->route('home');
    }

    public function authenticateGet() {
        return redirect()->route('login');
    }

    public function logout() {
        session()->forget('usuario');

        return redirect()->route('login');
    }
}
