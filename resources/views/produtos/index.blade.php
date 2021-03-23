@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
    <div id="produtos">
        <h1 class="titulo">Produtos cadastrados</h1>

        <a class="button success" href="{{ route('produtos.create') }}">Cadastrar novo produto</a>

        @if (count($produtos) > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Código de barras</th>
                        <th scope="col">Valor unitário</th>
                        <th scope="col">Cadastrado em</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <th scope="row">{{ str_pad($produto->id, '2', 0, STR_PAD_LEFT) }}</th>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->codigo_barras }}</td>
                            <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                            <td>{{ $produto->created_at->format('d/m/Y') }}</td>
                            <td style="text-align: right">
                                <a
                                    class="icon-edit"
                                    href="{{ route('produtos.edit', ['id' => $produto->id]) }}"
                                    title="Editar produto"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a
                                    class="icon-delete"
                                    href="{{ route('produtos.delete', ['id' => $produto->id]) }}"
                                    onclick="return confirm('Tem certeza de que deseja remover o produto?')"
                                    title="Remover produto"
                                >
                                    <i class="fas fa-minus-circle"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span class="info-no-data">Não foram localizados registros.</span>
        @endif
    </div>
@endsection
