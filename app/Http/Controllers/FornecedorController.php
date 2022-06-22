<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fornecedor;

class FornecedorController extends Controller
{

    public function uf() {
        $uf = ['AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'DF' => 'Distrito Federal',
            'ES' => 'Espirito Santo',
            'GO' => 'Goiás',
            'MA' => 'Maranhão',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do Sul',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins'
        ];

        return $uf;
    }

    public function index() {

        $uf = $this->uf();

        return view('app.fornecedor.index', ['titulo' => 'Fornecedores', 'uf' => $uf]);
    }

    public function adicionar(Request $request) {

        $uf = $this->uf();

        $msg = '';
        //inclusão
        if($request->input('_token') != '' && $request->input('id') == '') {
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
                $uf = $this->uf();
                $msg = 'Cadastro realizado com sucesso!';             
            } else {
                $msg = 'Erro ao realizar cadastro.';
            }
        }

        //edição
        if($request->input('_token') != '' && $request->input('id') != '') {

            $fornecedor = Fornecedor::find($request->input('id'));

            
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Update realizado com sucesso';
            }else {
                $msg = 'Update aparesentou problema(s)';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'titulo' => 'Fornecedores - Adicionar', 'msg' => $msg, 'uf' => $uf]);
        }
        
        return view('app.fornecedor.adicionar', ['titulo' => 'Fornecedores - Editar', 'msg' => $msg, 'uf' => $uf]);

    }

    public function listar(Request $request) {

        $uf = $this->uf();
        //capturar dados do form
        $dados = $request->all();
        
        //comparar dados com o banco de dados
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->get('nome').'%')
                                    ->where('site', 'like', '%'.$request->get('site').'%')
                                    ->where('uf', 'like', '%'.$request->get('uf').'%')
                                    ->where('email', 'like', '%'.$request->get('email').'%')
                                    ->get();
        
        
        //retornar fornecedores compatíveis em uma lista

        return view('app.fornecedor.listar', ['titulo' => 'Fornecedores - Lista', 'fornecedores' => $fornecedores, 'uf' => $uf]);
    }

    public function editar($id, $msg = '') {

        $uf = $this->uf();

        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['titulo' => 'Fornecedores - Editar', 'fornecedor' => $fornecedor, 'uf' => $uf, 'msg' => $msg]);

    }

    /*public function index2() {

        $fornecedores = Fornecedor::all();

    return view('app.fornecedor.index', ['fornecedores' => $fornecedores]);//compact encaminha a variável dada como parametro para a view
    }*/
}
