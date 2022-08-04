@extends('layout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Cadastrar Animais</h6>
    </div>

    <div class="card-body">

    <div class="row" style="margin-top: 0.4rem;">
            <div class="pull-right">
                <a class="btn btn-dark" href="{{ route('animais.create') }}"> Cadastrar novos Animais</a>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 0.4rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Animais já cadastrados:</h2>
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
            <th>Nome</th>
            <th>Nome do Dono</th>
            <th>Especie</th>
            <th>Raça</th>

            <th width="280px">Ações</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>

            <td>{{ $value->nome }}</td>
            <td>{{
                $value->dono_id


            }}</td>
            <td>{{ $value->especie }}</td>
            <td>{{ $value->raca }}</td>
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
