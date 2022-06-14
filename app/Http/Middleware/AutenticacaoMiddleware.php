<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {

        echo "<b>$metodo_autenticacao</b> - <b>$perfil</b> <br>";

        if($metodo_autenticacao == 'padrao') {
            echo "verificar usuario e senha no banco de dados <br>";
        }


        if(false) {
            return $next($request);
        } else {
            return Response('Acesso negado! Rota exige autenticação!');
        }

    }
}
