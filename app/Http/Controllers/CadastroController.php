<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Cadastrar extends Controller
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
        return view('app.cadastro', ['titulo' => 'Cadastro']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $regras = [
            'name' => 'required|min:4|max:40',
            'email' => 'email',
            'password' => 'required|min:4|max:40',
            'confirmPassword' => 'required|min:4|max:40'
            ];

        $feedback = [
            'required' => 'O campo é obrigatório!',
            'email' => 'Digite um e-mail válido',
            'min' => 'O campo requer no mínimo 4 caracteres',
            'max' => 'O campo não pode ser maior que 40 caracteres'
        ];

        $request->validate($regras, $feedback);

        $pass = $request['password'];
        $pass2 = $request['confirmPassword'];

        if($pass == $pass2) {

            $user = new User;
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = $request['password'];

            //verificar no db
            $cadastro_validate = $user->where('name', $request['name'])
                ->where('email', $request['email'])
                ->get();

            if($cadastro_validate) {
                $user->save();
                if($user->save()) {
                    return view('site.login', ['msg' => 'Cadastro Realizado com Sucesso!', 'titulo' => 'Login']);
                }
            } else {
                return view('app.cadastro', ['msg' => 'O usuário já existe!',  'titulo' => 'Cadastro']);
            }
        } else {

            return view('app.cadastro', ['msg' => 'As senhas não são compatíveis, tente novamente',  'titulo' => 'Cadastro']);

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
