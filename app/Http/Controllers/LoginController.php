<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class LoginController extends Controller
{
    
    public function index(Request $request) {

        $erro = '';

        switch ($request->get('erro')) {
            case 1:
                $erro = 'Usuário e/ou senha inválido(s)';
                break;

            case 2:
                $erro = 'Atenção, página restrita! Faça o login para continuar!';
                break;
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
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

        //iniciar model user
        $user = new User();

        $usuario = $user->where('email', $email)
                        ->where('password', $password)
                        ->get()
                        ->first();


        //teste de sessão
        if(isset($usuario->name)) {

            session_start();
            $_SESSION['id'] = $usuario->id;
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.cliente');

        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {

        session_destroy();
        return redirect()->route('site.login');

    }

}
