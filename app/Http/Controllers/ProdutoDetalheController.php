<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Unidade;

use App\Produto;

use App\ProdutoDetalhe;

class ProdutoDetalheController extends Controller
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
    public function create()
    {
        $unidades = Unidade::all();
        $produtos = Produto::all();

         return view('app.produto_detalhe.create', ['titulo' => 'Adicionar Detalhes do Produto', 'unidades' => $unidades, 'produtos' => $produtos]);
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
            'produto_id' => 'exists:produtos,id|required|not_in:0',
            'comprimento' => 'required|numeric',
            'largura' => 'required|numeric',
            'altura' => 'required|numeric',
            'unidade_id' => 'exists:unidades,id|required|not_in:0'
        ];

        $feedback = [
            'required' => 'O campo é obrigatório!',
            'numeric' => 'O campo deve ser preenchido apenas com números',
            'produto_id.exists' => 'O produto não foi encontrado no Banco de Dados',
            'unidade_id.exists' => 'A unidade de medida não foi encontrada no Banco de Dados',
            'not_in' => 'Selecione uma opção válida'
        ];

        $request->validate($regras, $feedback);

        ProdutoDetalhe::create($request->all());
        echo 'cadastro realizado com sucesso';
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
        $unidades = Unidade::all();
        $produtos = Produto::all();

         return view('app.produto_detalhe.create', ['titulo' => 'Editar Detalhes do Produto', 'unidades' => $unidades, 'produtos' => $produtos]);
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
