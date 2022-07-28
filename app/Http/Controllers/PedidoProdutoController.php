<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Produto;
use App\PedidoProduto;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {

        $produtos = Produto::all();

        return view('app.pedido_produto.create', ['pedido' => $pedido, 'titulo' => 'Pedido ao Produto', 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $produtos = Produto::all();

        $regras = [
            'produto_id' => 'required|exists:produtos,id|not_in:0',
            'quantidade' => 'required|integer'
        ];

        $feedback = [
            'required' => 'O campo é obrigatório.',
            'exists' => 'Selecione um produto válido',
            'not_in' => 'Selecione uma opção válida',
            'integer' => 'O campo deve ser preenchido apenas com números inteiros'
        ];

        $valido = $request->validate($regras, $feedback);

        

        if($valido) {
            PedidoProduto::store($request);
            
            $msg = 'Produto '.$request->get('produto_id').' adicionado com sucesso ao pedido '.$pedido->id;

            return view('app.pedido_produto.create', ['pedido' => $pedido, 'msg' => $msg, 'titulo' => 'Pedido ao Produto', 'produtos' => $produtos]);
        } else {
            $msg = 'Algo deu errado, tente novamente mais tarde';

            return view('app.pedido_produto.create', ['pedido' => $pedido, 'titulo' => 'Pedido ao Produto', 'produtos' => $produtos, 'msg' => $msg]);
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
