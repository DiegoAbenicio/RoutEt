@extends('layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Lista de Tarefas</h6>
    </div>
    <div class="card-body">

    <table class="table table-bordered">
        <tr>
            <th>Titulo</th>
            <th>Nome do Cachorro</th>
            <th>Entrada</th>
            <th>Saida</th>

            <th width="100px">Ações</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->title }} {{ $value->id }}</td>
            <td>{{ $value->animal->nome }}</td>
            <td>{{ \Carbon\Carbon::parse($value->start)->format('d/m/Y H:i:s')}}</td>
            <td>{{ \Carbon\Carbon::parse($value->end)->format('d/m/Y H:i:s')}}</td>
            <td>
                <form action="{{ route('list.destroy',$value->id) }}" method="POST">
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


