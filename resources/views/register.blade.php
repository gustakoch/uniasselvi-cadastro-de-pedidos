<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <title>Criar conta | Uniasselvi</title>
    <style>

    </style>
</head>
<body>
    <div class="signup-form">
        <form action="{{ route('novousuario') }}" method="post">
            @csrf

            <h2>Novo usuário</h2>

            <div class="form-group">
                <input
                    type="text"
                        class="form-control"
                        name="usuario"
                        value="{{ old('usuario') }}"
                        placeholder="Usuário"
                        autocomplete="off"
                    >

                @error('usuario')
                    <small class="erro">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    name="nome"
                    value="{{ old('nome') }}"
                    placeholder="Nome completo"
                    autocomplete="off"
                >

                @error('nome')
                    <small class="erro">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="E-mail"
                    autocomplete="off"
                >

                @error('email')
                    <small class="erro">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    value="{{ old('senha') }}"
                    placeholder="Sua melhor senha"
                >

                @error('password')
                    <small class="erro">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    placeholder="Confirme sua senha"
                >

                @error('password_confirmation')
                    <small class="erro">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block">REGISTRAR</button>
            </div>
        </form>
        <div class="text-center">Você já possui uma conta? <a href="/login">Faça login</a></div>
    </div>
</body>
</html>
