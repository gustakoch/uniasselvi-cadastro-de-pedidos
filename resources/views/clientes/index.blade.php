@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <div id="clientes">
        <h1 class="titulo">Clientes cadastrados</h1>

        <a class="button success" href="{{ route('clientes.create') }}">Cadastrar novo cliente</a>

        @if (count($clientes) > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Cadastrado em</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <th scope="row">{{ str_pad($cliente->id, '2', 0, STR_PAD_LEFT) }}</th>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->cpf }}</td>
                            <td><a class="link" href="mailto:{{ $cliente->email }}">{{ $cliente->email }}</a></td>
                            <td>{{ $cliente->created_at->format('d/m/Y') }}</td>
                            <td style="text-align: right">
                                <a
                                    class="icon-edit"
                                    href="{{ route('clientes.edit', ['id' => $cliente->id]) }}"
                                    title="Editar cliente"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a
                                    class="icon-delete"
                                    href="{{ route('clientes.delete', ['id' => $cliente->id]) }}"
                                    onclick="return confirm('Tem certeza de que deseja excluir o cliente?')"
                                    title="Remover cliente"
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
