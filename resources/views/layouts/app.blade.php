<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clientes.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/produtos.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/pedidos.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/media.css') }}" />

    <title>@yield('title') | Uniasselvi</title>
  </head>
  <body id="uniasselvi">
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark">
            <div class="container">
                <a class="navbar-brand d-flex" href="/">
                    <img src="/imagens/logo.jpg" alt="Logo" width="50">
                    <div style="margin-left:10px; display:flex; flex-direction:column;">
                        <strong style="margin-top:3px;">Uniasselvi</strong>
                        <small style="font-size:14px;">Olá, {{ session('usuario')['nome'] }}!</small>
                    </div>
                </a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#main-menu">
                    <i class="fas fa-bars text-white"></i>
                </button>

                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="navbar-nav ml-auto menu-mobile">
                        <li class="navbar-item">
                            <a class="nav-link" href="/"><i class="fas fa-home"></i> Início</a>
                        </li>

                        <li class="navbar-item divided"></li>

                        <li class="navbar-item">
                            <a class="nav-link" href="{{ route('pedidos.create') }}"><i class="fas fa-book"></i> Fazer pedido</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-plus"></i> Cadastros
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('clientes.index') }}">Clientes</a>
                                <a class="dropdown-item" href="{{ route('produtos.index') }}">Produtos</a>
                            </div>
                        </li>

                        <li class="navbar-item divided"></li>

                        <li class="navbar-item">
                            <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="container">
        @yield('content')
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.js" integrity="sha512-otOZr2EcknK9a5aa3BbMR9XOjYKtxxscwyRHN6zmdXuRfJ5uApkHB7cz1laWk2g8RKLzV9qv/fl3RPwfCuoxHQ==" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
  </body>
</html>
