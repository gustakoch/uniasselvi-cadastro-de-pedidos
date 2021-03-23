@extends('layouts.app')

@section('title', 'Novo pedido')

@section('content')
    <div id="pedidos-create">
        <h1 class="titulo">Fazer novo pedido</h1>

        @if (session('erro'))
            <small class="error">{{ session('erro') }}</small>
        @endif

        <form method="POST" action="{{ route('pedidos.store') }}" id="form-create-produto">
            @csrf

            <div class="form-group">
                <label for="cliente">Selecione o cliente</label>
                <select class="form-control" name="cliente" id="cliente">
                    <option value="">Selecione um cliente</option>
                    @foreach ($clientes as $cliente)
                        <option
                            @if (old('cliente') == $cliente->id) {{ 'selected="selected"' }} @endif
                            value="{{ $cliente->id }}"
                        >
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>

                @error('cliente')
                    <small class="alerta">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="produto">Adicione produtos</label>
                    <select class="form-control produto" name="produto[]">
                        <option value="">Selecione um produto</option>
                        @foreach ($produtos as $produto)
                            <option value="{{ $produto->id }}">
                                {{ $produto->nome }}
                            </option>
                        @endforeach
                    </select>

                    @if (session('erro_produto'))
                        <small class="error">{{ session('erro_produto') }}</small>
                    @endif
                </div>
                <div class="col-md-2 mb-3">
                    <label for="valor_unitario">Valor unitário</label>
                    <input type="text" class="form-control" id="valor_unitario" value="R$ 0,00" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="qtde">Informe a quantidade</label>
                    <input type="number" class="form-control qtde" value="0" name="qtde[]">

                    @if (session('erro_qtde'))
                        <small class="error">{{ session('erro_qtde') }}</small>
                    @endif
                </div>
                <div class="col-md-2 mb-3">
                    <label for="total">Total produto</label>
                    <input type="text" class="form-control total_produto" value="R$ 0,00" readonly>
                </div>
                <div class="col-md-1 mb-3 mais-produto-box">
                    <button class="add-remove-produto add" title="Adicionar produto">
                        <i class="fas fa-plus fa-lg"></i>
                    </button>
                </div>
            </div>

            <div class="form-row mt-5">
                <div class="col-md-4 mb-3">
                    <label for="status">Status do pedido</label>
                    <select class="form-control" name="status" id="status">
                        @foreach ($status as $s)
                            <option
                                @if (old('status') == $s->id) {{ 'selected="selected"' }} @endif
                                value="{{ $s->id }}"
                            >
                                {{ $s->descricao }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="buttons" style="margin-top: 2rem">
                <a class="button back" href="/">Cancelar</a>
                <button type="submit" class="button success">Finalizar pedido</button>
            </div>
        </form>
    </div>
@endsection
