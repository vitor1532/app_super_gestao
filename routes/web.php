<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobreNos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@contatoSave')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::resource('cadastro', 'CadastroController');

//App
Route::middleware('atenticar:padrao,visitante')->prefix('/app')->group(function() {

    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    //Fornecedores
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    //adicionar
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');

    //listar
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');

    //editar
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');

    //excluir
    Route::get('/fornecedor/excluir/{id}/{msg?}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    //produtos
    Route::resource('produto', 'ProdutoController');

    //produto_detalhe
    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    //cliente
    Route::resource('cliente', 'ClienteController');

    //pedido
    Route::resource('pedido', 'PedidoController');

    //pedido_produto
    //Route::resource('pedido-produto', 'PedidoProdutoController');
    Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');

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
        int $categoria_id = 1 // 1 - informa????o
)   {
        echo "Estamos aqui: $nome - $categoria_id";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');//primeiro parametro ?? o nome do parametro recebido na rota a ser tratado, o segundo ?? uma express??o regular que determina as condi????es de aceita????o no valor enviado
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
