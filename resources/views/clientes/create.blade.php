@extends('layout')

@section('content')

<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Inserindo Cliente</h6>
    </div>
    <div class="card-body">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar um novo Cliente</h2>
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


<form action="{{ route('clientes.store') }}" method="POST">
    @csrf

     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome do Cliente:</strong>
                <input type="text" name="nome" class="form-control is-valid" placeholder="Entre com o nome do Cliente"required>
            </div>
        </div>
        <!--div linha 2 col-->
        <div class="form-row col-xs-12 col-sm-12 col-md-12">

            <div class="form-group col-md-6">
                <strong>Quantidade de Cachorros:</strong>
                <input type="int" name="qtdC" class="form-control is-valid" placeholder="Entre com quantidade de cachorros" required>
            </div>


             <!--Calendario javascript-->
             <div class="form-group col-md-6 ">
                <strong>Telefone:</strong>
                <input class="form-control date wd is-valid" type="text" name="telefone" placeholder="Entre com o Telefone" required>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Endereco:</strong>
                <input type="text" name="endereco" class="form-control wd is-valid" placeholder="Entre com o Endereço"required>
            </div>
            <div class="form-group col-md-6">
                <strong>Saldo:</strong>
                <input type="text" name="saldo" class="form-control is-valid" placeholder="Entre com o saldo devedor"required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição do Cliente:</strong>
                <textarea class="form-control is-valid" style="height:150px" name="descricao" placeholder="Entre com a descrição" required></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-danger" href="{{ route('clientes.index') }}"> Voltar</a>
                <button type="submit" class="btn btn-dark">Concluir</button>
        </div>
    </div>

</form>
</div>
</div>
@endsection
