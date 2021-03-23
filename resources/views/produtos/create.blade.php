@extends('layouts.app')

@section('title', 'Novo produto')

@section('content')
    <div id="produtos-edit">
        <h1 class="titulo">Cadastrar produto</h1>

        @if (session('erro'))
            <small class="error">{{ session('erro') }}</small>
        @endif

        <form method="POST" action="{{ route('produtos.store') }}">
            @csrf

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome/descrição" value="{{ old('nome') }}">

                @error('nome')
                    <small class="alerta">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="codigo_barras">Código de barras</label>
                    <input type="text" maxlength="13" class="form-control" id="codigo_barras" name="codigo_barras" placeholder="Código de barras" value="{{ old('codigo_barras') }}">

                    @error('codigo_barras')
                        <small class="alerta">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="valor">Valor unitário</label>
                    <input type="number" step=".01" class="form-control" id="valor" name="valor" placeholder="Valor" value="{{ old('valor') }}">

                    @error('valor')
                        <small class="alerta">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="buttons">
                <a class="button back" href="{{ route('produtos.index') }}">Cancelar</a>
                <button type="submit" class="button success">Cadastrar produto</button>
            </div>
        </form>
    </div>
@endsection
