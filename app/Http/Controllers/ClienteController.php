<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $clientes = Cliente::paginate(25);

        return view('app.cliente.index', ['titulo' => 'Cliente', 'clientes' => $clientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cliente.create', ['titulo' => 'Cliente']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $regras = ['nome' => 'required|min:3|max:40'];
         $feedback = [
            'required' => 'O campo é obrigatório',
            'min' => 'O campo deve ter um mínimo de 3 caracteres',
            'nome.max' => 'O campo deve ter um máximo de 40 caracteres'
        ];

        //validação
        $request->validate($regras, $feedback);

        $cliente = new Cliente;

        $cadastro = $cliente->create($request->all());

        if($cadastro) {
            $msg = 'Cadastro realizado com Sucesso!';
            return view('app.cliente.create', ['titulo' => 'Cliente', 'msg' => $msg]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('app.cliente.show', ['titulo' => 'Visualização do Cliente', 'cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
