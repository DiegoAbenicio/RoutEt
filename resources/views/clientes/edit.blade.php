@extends('layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Editanto cliente</h6>
    </div>
    <div class="card-body">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editando clientes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-dark" href="{{ route('clientes.index') }}"> Voltar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.update',$cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" class="form-control" placeholder="Entre com o nome">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Novos bichinhos:</strong>
                    <input type="text" name="qtdC" class="form-control" placeholder="Entre com quantidade">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Novo Endereço:</strong>
                    <input type="text" name="endereco" class="form-control" placeholder="Entre a data da compra">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Novo telefone:</strong>
                    <input type="text" name="telefone" class="form-control" placeholder="Entre com o preco da compra">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Novo saldo:</strong>
                    <input type="text" name="saldo" class="form-control" placeholder="Entre com o preco da venda">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nova descrição:</strong>
                    <textarea class="form-control" style="height:150px" name="descricao" placeholder="Entre com a descrição"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-dark">Atualizar</button>
            </div>
        </div>

    </form>
</div>
</div>
@endsection
