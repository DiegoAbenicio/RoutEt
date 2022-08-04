@extends('layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Cadastrar Clientes</h6>
    </div>

    <div class="card-body">

    <div class="row" style="margin-top: 0.4rem;">
            <div class="pull-right">
                <a class="btn btn-dark" href="{{ route('clientes.create') }}"> Cadastrar novos Clientes</a>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 0.4rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Clientes já cadastrados:</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nome / Id</th>
            <th>Qtd de Cachorros</th>
            <th>Endereco</th>
            <th>Telefone</th>
            <th>Devendo</th>
            <th>Descrição</th>

            <th width="280px">Ações</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>

            <td>{{ $value->nome }} / {{ $value->id }}</td>
            <td>{{ $value->qtdC }}</td>
            <td>{{ $value->endereco }}</td>
            <td>{{ $value->telefone }}</td>
            <td>{{ $value->saldo }}</td>
            <td>{{ \Str::limit($value->descricao, 100) }}</td>
            <td>

                <form action="{{ route('clientes.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-dark" href="{{ route('clientes.show',$value->id) }}">Exibir</a>
                    <a class="btn btn-secondary" href="{{ route('clientes.edit',$value->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
</div>
</div>
@endsection
