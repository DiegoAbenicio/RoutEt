<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ARController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pega os clientes cadastrados no bd, usando o recurso de paginação do laravel
        $data = Cliente::latest()->paginate(5);

        //retorna a view principal de produtos passando a página de dados com seu limite
        return view('clientes.index',compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna a view com o formulário para inserir os clientes
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validando a necessidadee
        $request->validate([
            'nome' => 'required',
            'qtdC' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'saldo' => 'required',
            'descricao' => 'required',
        ]);

        //inserindo o registro na tabela
        Cliente::create($request->all());

        //redirecionando para a view raiz
        return redirect()->route('clientes.index')
                        ->with('successo','Cliente cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show',compact('cliente'));
    }

    public function cliente(Cliente $cliente){
        return compact('cliente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //redireciona para a página com o formulário de edição, assando o produto escolhido
        return view('clientes.edit',compact('cliente'));
    }

    public function name(Request $id){

        return compact('cliente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        #valida, pois existe a necessicade de todos os parametros estarem preenchidos
        $request->validate([
            'nome' => 'required',
            'qtdC' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'saldo' => 'required',
            'descricao' => 'required',
        ]);

        //atualiza produto no banco de dados
        $cliente->update($request->all());

        //retorna para a página principal
        return redirect()->route('clientes.index')
                        ->with('successo','Cliente alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //deleta o produto no banco de dados
        $cliente->delete();

        //redireciona para a página inicial do cadastro
        return redirect()->route('clientes.index')
                        ->with('successo','Foi um sucesso a esclusão!');
    }
}
