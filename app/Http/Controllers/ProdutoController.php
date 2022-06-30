<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Unidade;
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

        $produtos = Produto::paginate(15);

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
        //dd($unidades);
        return view('app.produto.adicionar', ['titulo' => 'Produtos - Adicionar', 'unidades' => $unidades]);
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
        //inclusão
        if($request->input('_token') != '' && $request->input('id') == '') {
            //regras de validação
            $regras = [
                'nome' => 'required|min:3|max:40',
                'descricao' => 'required|min:3|max:2000',
                'peso' => 'required|integer',
                'unidade_id' => 'exists:unidades,id|required|not_in:0' //exists:<tabela>,<coluna>
            ];

            $feedback = [
                'required' => 'O campo é obrigatório',
                'min' => 'O campo deve ter um mínimo de 3 caracteres',
                'nome.max' => 'O campo deve ter um máximo de 40 caracteres',
                'descricao.max' => 'O campo deve ter um máximo de 2000 caracteres',
                'not_in' => 'Selecione uma opção válida',
                'peso.integer' => 'O campo peso deve ser um número inteiro',
                'unidade_id.exists' => 'A unidade de medida informada não existe'
            ];

            //validação
            $request->validate($regras, $feedback);

            //criando instancia de produtos
            $produtos = new Produto;

            //verificar no db
            $fornecedor_validate = $produtos->where('nome', $request->get('nome'))
                                                ->where('descricao', $request->get('descricao'))
                                                ->where('peso', $request->get('peso'))
                                                ->where('unidade_id', $request->get('unidade_id'))
                                                ->first();

             //salvar
            if(!isset($fornecedor_validate->id)) {
                //aplicando os dados
                $produtos->create($request->all());
                $msg = 'Cadastro realizado com sucesso!';

            } else {
                $msg = 'Erro ao realizar cadastro.';
            }
        }
        //return redirect()->route('produto.index', ['titulo' => 'Produtos - Adicionar', 'unidades' => $unidades]);
        return view('app.produto.adicionar', ['titulo' => 'Produtos - Adicionar', 'msg' => $msg, 'unidades' => $unidades]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        $unidades = $this->unidades();
        return view('app.produto.show', ['titulo' => $produto->nome,'produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = $this->unidades();
        return view('app.produto.edit', ['titulo' => 'Editar '.$produto->nome, 'produto' => $produto, 'unidades' => $unidades]);
        //return view('app.produto.adicionar', ['titulo' => 'Editar '.$produto->nome, 'produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {

        //regras de validação
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id|required|not_in:0' //exists:<tabela>,<coluna>
        ];

        $feedback = [
            'required' => 'O campo é obrigatório',
            'min' => 'O campo deve ter um mínimo de 3 caracteres',
            'nome.max' => 'O campo deve ter um máximo de 40 caracteres',
            'descricao.max' => 'O campo deve ter um máximo de 2000 caracteres',
            'not_in' => 'Selecione uma opção válida',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe'
        ];

        //validação
        $request->validate($regras, $feedback);

        //request é o obj já atualizado
        //produto é o obj antes da atualização

        $produto->update($request->all());

        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
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
