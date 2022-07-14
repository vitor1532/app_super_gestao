<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Cliente;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $pedidos = Pedido::with(['cliente'])->paginate(20);

        return view('app.pedido.index', ['titulo' => 'Pedido', 'pedidos' => $pedidos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $clientes = Cliente::all();

        return view('app.pedido.create', ['titulo' => 'Pedido', 'clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
                'cliente_id' => 'required|exists:clientes,id|not_in:0', //exists:table,column
            ];

        $feedback = [
                'not_in' => 'Selecione uma opção válida',
                'required' => 'O campo é obrigatório',
                'exists' => 'O Cliente informado não existe'
            ];

        //validação
        $request->validate($regras, $feedback);

        $pedido = new Pedido;

        $create = $pedido->create($request->all());

        if($create) {
            return redirect()->route('pedido.index');
        } else {

            $msg = 'Algo deu errado, tente novamente mais tarde';

            return view ('app.pedido.create', ['titulo' => 'Pedido', 'clientes' => $clientes, 'msg' => $msg]);
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
        //
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
