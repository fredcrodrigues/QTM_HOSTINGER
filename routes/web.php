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

Route::group(['namespace' => 'Site'], function() {

    Route::get('/', 'InicioController@index');
    Route::get('/sobre-nos', 'SobreController@index');
    Route::get('/servicos', 'ServicoController@index');
    Route::get('/produtos', 'ProdutoController@index');
    Route::get('/covidas', 'CovidasController@index');
    Route::get('/selecionar-cidade/{sigla}', 'CoworkingController@select_cidade');
    Route::get('/busca-escolha', 'BuscaController@index');
    Route::get('/busca-profissionais', 'BuscaController@profissionais');
    Route::post('/busca-profissionais', 'BuscaController@filtro_profissionais');
    Route::get('/busca-coworkings', 'BuscaController@coworkings');
    Route::post('/busca-coworkings', 'BuscaController@filtro_coworkings');
    Route::get('/escolha-cadastro', 'ClienteController@escolha_cadastro');
    Route::post('contato/save', ['uses' => 'ContatoController@store']);
    Route::get('/termos', 'ConfiguracaoController@termos');
    Route::get('/politica-privacidade', 'ConfiguracaoController@politica_privacidade');
    Route::get('/uso-responsavel', 'ConfiguracaoController@uso_responsavel');

    Route::group(['prefix' => 'agendamento', 'where' => ['prefix' => 'agendamento']], function() {
        Route::get('/{tipo?}/{user?}', ['uses' => 'AgendamentoController@index']);
        Route::get('/escolha/{slug}/{tipo}', ['uses' => 'AgendamentoController@login_cliente_escolha']);
        Route::post('/', ['uses' => 'AgendamentoController@login_cliente']);
        Route::post('/save', ['uses' => 'AgendamentoController@agendamento']);
        Route::post('/consulta-modelo', ['uses' => 'AgendamentoController@consulta_agendamento']);
    });

    Route::resource('cliente', 'ClienteController');
    Route::resource('coworking', 'CoworkingController');
    Route::resource('profissional', 'ProfissionalController');


    // Route::get('/email', function () {
    // $nome = "teste";
    // $mensagem = "Testando mensagem";
    // return new App\Mail\SendMailLiberacaoPlataforma($nome);
// });

});


//Rotas do administrativo
require app_path('../routes/admin.php');