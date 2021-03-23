@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div id="home">

    <h1 class="titulo">Últimos pedidos recebidos</h1>

    @if (count($pedidos) > 0)
        <div class="table-responsive-sm">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Qtde / Produto</th>
                        <th scope="col">Recebido em</th>
                        <th scope="col">Valor total</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <th scope="row">{{ $pedido->id }}</th>
                            <td>{{ $pedido->nome_cliente }}</td>
                            <td>{{ $pedido->cpf }}</td>
                            <td>
                                @foreach ($produtos_pedidos as $produto)
                                    @if ($pedido->id == $produto->pedido_id)
                                        {{ $produto->qtde }} - {{ $produto->nome }} <br />
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $pedido->created_at }}</td>
                            <td>R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</td>
                            <td>
                                <span class="status">{{ $pedido->status->descricao }}</span>
                            </td>
                            <td>
                                <a
                                    class="icon-edit"
                                    href="{{ route('pedidos.edit', ['id' => $pedido->id]) }}"
                                    title="Editar/visualizar pedido"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a
                                    class="icon-delete"
                                    href="{{ route('pedidos.delete', ['id' => $pedido->id]) }}"
                                    onclick="return confirm('Tem certeza de que deseja excluir o pedido?')"
                                    title="Remover pedido"
                                >
                                    <i class="fas fa-minus-circle"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <span class="info-no-data">Não foram localizados pedidos.</span>
    @endif

    <hr>

    <div class="d-flex justify-content-center">
        {!! $pedidos->links() !!}
    </div>
</div>
@endsection
