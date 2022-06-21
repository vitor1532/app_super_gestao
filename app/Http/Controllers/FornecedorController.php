<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fornecedor;

class FornecedorController extends Controller
{

    public function index() {
        return view('app.fornecedor.index', ['titulo' => 'Fornecedores']);
    }

    public function adicionar(Request $request) {

        $msg = '';

        if($request->input('_token') != '') {
            //regras de validação
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|not_in:0',
                'email' => 'email'
            ];

            $feedback = [
                'not_in' => 'O campo é obrigatório',
                'required' => 'O campo é obrigatório',
                'email' => 'O campo usuário deve ser um e-mail válido',
                'nome.min' => 'O campo deve ter um mínimo de 3 caracteres',
                'nome.max' => 'O campo deve ter um máximo de 40 caracteres'
            ];

            //validação
            $request->validate($regras, $feedback);

            //capturando os dados
            
            $nome = $request->get('nome');
            $site = $request->get('site');
            $uf = $request->get('uf');
            $email = $request->get('email');
            

            //criando instancia de fornecedor
            $fornecedor = new Fornecedor;

            //verificar no db
            $fornecedor_validate = $fornecedor->where('nome', $nome)
                                                ->where('site', $site)
                                                ->where('uf', $uf)
                                                ->where('email', $email)
                                                ->first();

            //echo $fornecedor_validate;
            //salvar
            if(!isset($fornecedor_validate->id)) {
                //aplicando os dados
                /*
                $fornecedor->nome = $nome;
                $fornecedor->site = $site;
                $fornecedor->uf = $uf;
                $fornecedor->email = $email;
                $fornecedor->save();
                */
                $fornecedor->create($request->all());
                
                //ao invés de capturar em variáveis e usar o método save como feito acima, pode-se usar a função do eloquent "$fornecedor->create($request->all())"

                $msg = 'Cadastro realizado com sucesso!';
                
            }else {
                $msg = 'ops';
            }
        }
        
        return view('app.fornecedor.adicionar', ['titulo' => 'Fornecedores - Adicionar', 'msg' => $msg]);

    }

    public function listar(Request $request) {

        

        return view('app.fornecedor.listar', ['titulo' => 'Fornecedores - Lista']);
    }

    public function index2() {

        $fornecedores = Fornecedor::all();

    return view('app.fornecedor.index', ['fornecedores' => $fornecedores]);//compact encaminha a variável dada como parametro para a view
    }
}
