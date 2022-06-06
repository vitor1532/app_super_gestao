<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\LogAcessoMiddleware;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PrincipalController@principal')
    ->name('site.index')
    ->middleware(LogAcessoMiddleware::class);

Route::get('/sobreNos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@contatoSave')->name('site.contato');

Route::get('/login', function() {return 'Login';})->name('site.login');

//App
Route::prefix('/app')->group(function() {
    Route::get('/clientes', function() {return 'clientes';})->name('app.clientes');

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedores');

    Route::get('/produtos', function() {return 'produtos';})->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');



//rota de fallback
Route::fallback(function() {
    Echo 'Deu ruim, <a href="'. route ("site.index") .'">Clique Aqui</a>';
});


//Route::redirect('/rota2', '/rota1');

/*
Route::get('/contato/{nome}/{categoria_id}', 
    function(
        string $nome = 'Desconhecido', 
        int $categoria_id = 1 // 1 - informação
)   {
        echo "Estamos aqui: $nome - $categoria_id";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');//primeiro parametro é o nome do parametro recebido na rota a ser tratado, o segundo é uma expressão regular que determina as condições de aceitação no valor enviado
*/
/*
Verbos http

post
put
patch
get
delete
options

*/