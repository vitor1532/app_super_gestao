<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SiteContato;

class ContatoController extends Controller
{

    public function contato() {

        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];

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


        //realizar a validação dos dados do formulário recebidos no request
        $request->validate([
            //'nome do input' => validação
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required|integer',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|min:3|max:2000'
        ]);

        SiteContato::create($request->all());

        //return view('site.contato', ['titulo' => 'Contato']);

    }

}
