@extends('layouts.app')

@section('title', 'Editar cliente')

@section('content')
<div id="clientes-edit">
    <h1 class="titulo">Editar cliente</h1>

    @if (session('erro'))
        <small class="error">{{ session('erro') }}</small>
    @endif

    <form method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{ old('nome') ?? $cliente->nome }}">

                @error('nome')
                    <small class="alerta">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" placeholder="CPF" value="{{ old('cpf') ?? $cliente->cpf }}">

                @error('cpf')
                    <small class="alerta">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email') ?? $cliente->email }}">

            @error('email')
                <small class="alerta">{{ $message }}</small>
            @enderror
        </div>

        <div class="buttons">
            <a class="button back" href="{{ route('clientes.index') }}">Cancelar</a>
            <button type="submit" class="button success">Atualizar cliente</button>
        </div>
    </form>
</div>
@endsection
