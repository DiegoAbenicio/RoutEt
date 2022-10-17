@extends('layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Lista de Servicos</h6>
    </div>
    <div class="card-body">

    <div class="row" style="margin-top: 0.1rem; margin-bottom: 1rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('servicos.create') }}"> Novo Serviço</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nome da Tarefa</th>
            <th>Duração da Tarefa</th>
            <th>Cor da Letra</th>
            <th>Cor do Fundo</th>

            <th width="100px">Ações</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->title }}</td>
            <td>{{ $value->duracao }}</td>
            <td>{{ $value->color}}</td>
            <td>{{ $value->textColor}}</td>
            <td>
                <form action="{{ route('servicos.destroy',$value->id) }}" method="POST">
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
@include('sweetalert::alert')
@endsection


