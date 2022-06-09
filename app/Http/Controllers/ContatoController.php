<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SiteContato;

use App\MotivoContato;

use App\Http\Middleware\LogAcessoMiddleware;

class ContatoController extends Controller
{

    public function __construct() {
        
    }

    public function contato() {

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function contatoSave(Request $request) {
        
        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';

        echo $request->input('telefone');

        
        */
        /*
        $contato = new SiteContato();

        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        $contato->save();
        */

        /*$contato = new SiteContato();
        //$contato->create($request->all());
        $contato->fill($request->all());

        $contato->save();*/


        
        //array de validações
        $rules = [
                //'nome do input' => validação
                'nome' => 'required|min:3|max:40|',
                'telefone' => 'required|integer',
                'email' => 'email',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|min:3|max:2000'
            ];

            //array de mensagens de erro
        $feedback = [
                //{nomeDoInput.nomeDaValidação} => 'mensagem'
                //'nome.required' => 'O nome é obrigatório!',
                'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O nome deve ter no máximo 40 caracteres',
                //'telefone.required' => 'O telefone é obrigatório!',
                'telefone.integer' => 'O telefone deve ser  composto apenas por números!',
                'email.email' => 'Este campo deve conter um e-mail válido!',
                'motivo_contatos_id.required' => 'Selecione um motivo do contato!',
                //'mensagem.required' => 'Este campo é obrigatório!',
                'mensagem.min' => 'A mensagem deve ter no mínimo 3 caracteres',
                'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',

                //se for colocado apenas a validação, se configura uma msg padrão

                'required' => 'O campo :attribute deve ser preenchido'

            ];

        //realizar a validação dos dados do formulário recebidos no request
        $request->validate($rules, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');

        /*

            <div style="position:absolute; top:0px; width:100%; background:red">
                <pre>
                    {{ print_r($errors) }}
                </pre>
            </div>

        */

    }

}
