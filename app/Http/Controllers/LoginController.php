<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class LoginController extends Controller
{
    
    public function index() {
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request) {

        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário deve ser um e-mail válido',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        //recuperar parametros inseridos
        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuário: $email | Senha: $password <br>";

        //iniciar model user
        $user = new User();

        $usuario = $user->where('email', $email)
                        ->where('password', $password)
                        ->get()
                        ->first();


        if(isset($usuario->name)) {
            echo 'Logado com sucesso';
        } else {
            echo 'deu ruim parceiro';
        }
    }

}
