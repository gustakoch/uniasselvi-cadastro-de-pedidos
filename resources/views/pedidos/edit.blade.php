@extends('layouts.app')

@section('title', 'Editar pedido')

@section('content')
    <div id="pedidos-edit">
        <h1 style="margin-bottom: 0.5rem" class="titulo">Editar pedido</h1>
        <small style="display: block; margin-bottom: 3rem; color: var(--red)">(Observação: é permitido somente atualizar o status do pedido)</small>

        <form method="POST">
            @csrf

            <div class="form-row mb-3">
                <div class="col-sm-2 mb-3">
                    <label for="cliente">Número</label>
                    <input
                        type="text"
                        class="form-control"
                        value="{{ $pedido->id }}"
                        readonly
                    >
                </div>
                <div class="col-sm-3 mb-3">
                    <label for="cliente">Recebido em</label>
                    <input
                        type="text"
                        class="form-control"
                        value="{{ $pedido->created_at->format('d/m/Y') }}"
                        readonly
                    >
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="col-sm-8 mb-3">
                    <label for="cliente">Cliente</label>
                    <input
                        type="text"
                        class="form-control"
                        value="{{ $cliente->nome }}"
                        readonly
                    >
                </div>
                <div class="col-sm-4">
                    <label for="cliente">CPF</label>
                    <input
                        type="text"
                        class="form-control"
                        value="{{ $cliente->cpf }}"
                        readonly
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-4 mb-3">
                    <label for="produto">Produtos</label>
                    @foreach ($produtos as $produto)
                        <input
                            type="text"
                            class="form-control"
                            value="{{ $produto->nome_produto }}"
                            readonly
                        ><br />
                    @endforeach
                </div>
                <div class="col-sm-3 mb-3">
                    <label for="codigo_barras">Código de barras</label>
                    @foreach ($produtos as $produto)
                        {!! $produto->codigo_barras !!}

                        <div class="barcode mb-2">
                            {{ $produto->numero_codigo_barras }}
                        </div>
                    @endforeach
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="valor_unitario">Valor unitário</label>
                    @foreach ($produtos as $produto)
                        <input
                            value="R$ {{ number_format($produto->valor_unitario, 2, ',', '.') }}"
                            class="form-control"
                            type="text"
                            readonly
                        ><br />
                    @endforeach
                </div>
                <div class="col-sm-1 mb-3">
                    <label for="qtde">Qtde</label>
                    @foreach ($produtos as $produto)
                        <input
                            type="text"
                            class="form-control"
                            value="{{ $produto->qtde }}"
                            readonly
                        ><br />
                    @endforeach
                </div>
                <div class="col-sm-2">
                    <label for="total">Total produto</label>
                    @foreach ($produtos as $produto)
                        <input
                            value="R$ {{ number_format(($produto->qtde * $produto->valor_unitario), 2, ',', '.') }}"
                            class="form-control"
                            type="text"
                            readonly
                        ><br />
                    @endforeach
                </div>
            </div>

            <div class="form-row mt-5">
                <div class="col-sm-4 mb-3">
                    <label for="status">Status do pedido</label>
                    <select class="form-control" name="status" id="status">
                        @foreach ($status as $s)
                            <option
                                @if ($pedido->status == $s->id) {{ 'selected="selected"' }} @endif
                                value="{{ $s->id }}"
                            >
                                {{ $s->descricao }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2 offset-md-6">
                    <label for="total_pedido">Total do pedido</label>
                    <input
                        value="R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}"
                        class="form-control"
                        type="text"
                        readonly
                    >
                </div>
            </div>

            <div class="buttons" style="margin-top: 2rem">
                <a class="button back" href="/">Cancelar</a>
                <button type="submit" class="button success">Atualizar pedido</button>
            </div>
        </form>
    </div>
@endsection
