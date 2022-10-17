@extends('layout')

@section('content')

<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Inserindo Animal</h6>
    </div>
    <div class="card-body">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar um novo Serviço</h2>
        </div>

    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ops!</strong> Tivemos alguns problemas com o seu formulario.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form class ="was-validated" action ="{{ route ('animais.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Nome do Animal:</strong>
                <input type="text" name="nome" class="form-control is-valid" placeholder="Entre com o nome"required>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-12">
                <strong>Digite o nome e deixer ser complementado com o Id:</strong>
                <input type="search" class="form-control is-valid" placeholder="Entre com o nome do Dono" name="dono_id" required input list="Clientes">
                <datalist id="Clientes">
                    @foreach ($data as $key => $value)
                        <option value="{{ $value->id }}"> {{ $value->nome }} </option>
                    @endforeach
                </datalist>
            </div>

        </div>



        <!--div linha 2 col-->
        <div class="form-row col-xs-12 col-sm-12 col-md-12">

            <div class="form-group col-md-6">
                <strong>Tipo de pelo:</strong>
                <input name="tipodepelo" placeholder="Selecione o tipo de pelo" class="form-control is-valid" required input list="pelos">
                <datalist id="pelos">
                    <option value="Pelo Baixo">
                    <option value="Pelo Medio">
                    <option value="Pelo Alto">
                </datalist>
            </div>

             <div class="form-group col-md-6 ">
                <strong>Especie:</strong>
                <input class="form-control is-valid" name="especie" placeholder="Entre com a especie" required input list="especies">
                <datalist id="especies">
                    <option value="Coelho">
                    <option value="Gato">
                    <option value="Cachorro">
                </datalist>
            </div>

        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Raça:</strong>
                <input type="text" name="raca" class="form-control wd is-valid" placeholder="Entre com a Raça"required>
            </div>
            <div class="form-group col-md-6">
                <strong>Idade:</strong>
                <input type="int" name="idade" class="form-control is-valid" placeholder="Entre com a idade do animal"required>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição do Animal:</strong>
                <textarea class="form-control is-valid" style="height:150px" name="descricao" placeholder="Entre com a descrição" required></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-danger" href="{{ route('servicos.index') }}"> Voltar </a>
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>

</form>
</div>
</div>


@endsection
