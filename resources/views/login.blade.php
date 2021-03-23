<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    <title>Login | Uniasselvi</title>
</head>
<body>
    <div class="login-form">
        <form action="{{ route('authenticate') }}" method="post">
            @csrf

            <h2 class="text-center">
                <img src="/imagens/logo.jpg" alt="Logo" height="80"><br /><br />
                Login
            </h2>

            <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Usuário"
                    name="usuario"
                    value="{{ old('usuario') }}"
                    autocomplete="off"
                >

                @error('usuario')
                    <small class="erro">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <input
                    type="password"
                    class="form-control"
                    placeholder="Senha"
                    name="senha"
                    autocomplete="off"
                >

                @error('senha')
                    <small class="erro">{{ $message }}</small>
                @enderror
            </div>

            @if (session('erro'))
                <small class="erro">{{ session('erro') }}</small>
            @endif

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">ACESSAR</button>
            </div>
        </form>
        <p class="text-center">Não possui conta?<a href="/register"> Registrar-se</a></p>
    </div>
</body>
</html>
