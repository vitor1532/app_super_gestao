<?php

namespace App\Http\Controllers;

use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use App\Item;
use App\Fornecedor;
use App\ItemDetalhe;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function unidades() {
        $unidades = Unidade::all();

        return $unidades;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $unidades = $this->unidades();

        $produtos = Produto::with(['produtoDetalhe', 'fornecedor', 'pedidos'])->paginate(15);
        
        //dd($produtos);


        return view('app.produto.index', ['titulo' => 'Produtos', 'produtos' => $produtos, 'request' => $request->all(), 'unidades' => $unidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $unidades = $this->unidades();
        $fornecedores = Fornecedor::all();
        return view('app.produto.adicionar', ['titulo' => 'Produtos - Adicionar', 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msg = '';
        $unidades = $this->unidades();
        $fornecedores = Fornecedor::all();
        //inclusão
        if($request->input('_token') != '' && $request->input('id') == '') {
            //regras de validação
            $regras = [
                'nome' => 'required|min:3|max:40',
                'descricao' => 'required|min:3|max:2000',
                'peso' => 'required|integer',
                'unidade_id' => 'exists:unidades,id|required|not_in:0', //exists:<tabela>,<coluna>
                'fornecedor_id' => 'exists:fornecedores,id|required|not_in:0'
            ];

            $feedback = [
                'required' => 'O campo é obrigatório',
                'min' => 'O campo deve ter um mínimo de 3 caracteres',
                'nome.max' => 'O campo deve ter um máximo de 40 caracteres',
                'descricao.max' => 'O campo deve ter um máximo de 2000 caracteres',
                'not_in' => 'Selecione uma opção válida',
                'peso.integer' => 'O campo peso deve ser um número inteiro',
                'unidade_id.exists' => 'A unidade de medida informada não existe',
                'fornecedor_id.exists' => 'O Fornecedor informado não existe'
            ];

            //validação
            $request->validate($regras, $feedback);

            //criando instancia de produtos
            $produtos = new Item;

            //verificar no db
            $produtos_validate = $produtos->where('nome', $request->get('nome'))
                                                ->where('descricao', $request->get('descricao'))
                                                ->where('peso', $request->get('peso'))
                                                ->where('unidade_id', $request->get('unidade_id'))
                                                ->first();

             //salvar
            if(!isset($produtos_validate->id)) {
                //aplicando os dados
                $produtos->create($request->all());
                $msg = 'Cadastro realizado com sucesso!';

            } else {
                $msg = 'Erro ao realizar cadastro.';
            }
        }
        //return redirect()->route('produto.index', ['titulo' => 'Produtos - Adicionar', 'unidades' => $unidades]);
        return view('app.produto.adicionar', ['titulo' => 'Produtos - Adicionar', 'msg' => $msg, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Item $produto)
    {
        $unidades = $this->unidades();
        //dd($produto);
        return view('app.produto.show', ['titulo' => $produto->nome,'produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $produto)
    {
        $unidades = $this->unidades();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['titulo' => 'Editar '.$produto->nome, 'produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $fornecedores = Fornecedor::all();
        //regras de validação
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id|required|not_in:0',  //exists:<tabela>,<coluna>
            'fornecedor_id' => 'exists:fornecedores,id|required|not_in:0'
        ];

        $feedback = [
            'required' => 'O campo é obrigatório',
            'min' => 'O campo deve ter um mínimo de 3 caracteres',
            'nome.max' => 'O campo deve ter um máximo de 40 caracteres',
            'descricao.max' => 'O campo deve ter um máximo de 2000 caracteres',
            'not_in' => 'Selecione uma opção válida',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O Fornecedor informado não existe'
        ];

        //validação
        $request->validate($regras, $feedback);

        //request é o obj já atualizado
        //produto é o obj antes da atualização

        $produto->update($request->all());

        return redirect()->route('produto.show', ['produto' => $produto->id, 'fornecedores' => $fornecedores]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $produto)
    {
        $softDelete = $produto->delete();

        if($softDelete) {
            $msg = 'Registro deletado com sucesso';
        } else {
            $msg = 'Algum erro ocorreu ao tentar deletar o registro';
        }
        return redirect()->route('produto.index', ['msg' => $msg]);
    }

}
