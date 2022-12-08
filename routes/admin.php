<?php


Auth::routes();



Route::prefix('area-restrita')->namespace('Admin')->group(function () {

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

   

    Route::group(['middleware' => ['auth','check-user-admin'],[CheckUserAdmin::class]], function () {
    
            Route::group(['prefix' => 'home', 'where' => ['prefix' => 'home']], function() {
                Route::get('/', ['uses' => 'HomeController@index']);
                Route::get('/list-coworkings', ['uses' => 'HomeController@list_coworking']);
                Route::get('/list-profissionais', ['uses' => 'HomeController@list_profissional']);
                Route::get('/list-agendamento', ['uses' => 'HomeController@list_agendamento']);
            });

            Route::group(['prefix' => 'agendamento', 'where' => ['prefix' => 'agendamento']], function() {
                Route::get('/', ['uses' => 'AgendamentoController@index']);
                Route::get('/list', ['uses' => 'AgendamentoController@list']);
                Route::get('/{id}/show', ['uses' => 'AgendamentoController@show']);
                Route::post('/solicitacao-atendida', ['uses' => 'AgendamentoController@solicitacao_atendida']);
                Route::post('/formulario-cliente', ['uses' => 'AgendamentoController@consulta_formulario_cliente']);
            });
        
            //BANNER
            Route::group(['prefix' => 'banner', 'where' => ['prefix' => 'banner']], function() {
                Route::get('/show', ['uses' => 'BannerController@show']);
                Route::get('/show-colab', ['uses' => 'BannerController@show_colab']);
                Route::get('/{slug}/edit', ['uses' => 'BannerController@edit']);
                
            });

            //Parceiros
            Route::group(['prefix' => 'parceiros', 'where' => ['prefix' => 'parceiros']], function() {
                Route::get('/{slug}/edit', ['uses' => 'ParceiroController@edit']);
                Route::get('/list', ['uses' => 'ParceiroController@list']);
            });

            //Video
            Route::group(['prefix' => 'videos', 'where' => ['prefix' => 'videos']], function() {
                Route::get('/{slug}/edit', ['uses' => 'VideoController@edit']);
                Route::get('/list', ['uses' => 'VideoController@list']);
            });
            //Cliente - rotas da administração
            Route::group(['prefix' => 'cliente-adm', 'where' => ['prefix' => 'cliente-adm']], function() {
                Route::get('/', ['uses' => 'ClienteAdmController@index']);
                Route::get('/list', ['uses' => 'ClienteAdmController@list']);
                Route::get('/{slug}/show', ['uses' => 'ClienteAdmController@show']);
                Route::get('/{slug}/edit', ['uses' => 'ClienteAdmController@edit']);
            });

            //Profissional - rotas da administração
            Route::group(['prefix' => 'profissional-adm', 'where' => ['prefix' => 'profissional-adm']], function() {
                Route::get('/list', ['uses' => 'ProfissionalAdmController@list']);
                Route::get('/{slug}/show', ['uses' => 'ProfissionalAdmController@show']);
                Route::get('/{slug}/edit', ['uses' => 'ProfissionalAdmController@edit']);
                Route::get('/agendamento', ['uses' => 'ProfissionalAdmController@edit_agendamento']);
                Route::post('/agendamento', ['uses' => 'ProfissionalAdmController@update_agendamento']);
                Route::get('/consulta-modelo', ['uses' => 'ProfissionalAdmController@consulta_agendamento']);
            });

              //Coworking - rotas da administração
            Route::group(['prefix' => 'coworking-adm', 'where' => ['prefix' => 'coworking-adm']], function() {
                Route::get('/list', ['uses' => 'CoworkingAdmController@list']);
                Route::get('/{slug}/show', ['uses' => 'CoworkingAdmController@show']);
                Route::get('/{slug}/edit', ['uses' => 'CoworkingAdmController@edit']);
                Route::get('/agendamento', ['uses' => 'CoworkingAdmController@edit_agendamento']);
                Route::post('/agendamento', ['uses' => 'CoworkingAdmController@update_agendamento']);
                Route::get('/consulta-modelo', ['uses' => 'CoworkingAdmController@consulta_agendamento']);
            });
            //Colaborador - rotas de administração
            Route::group(['prefix' => 'colaborador', 'where' => ['prefix' => 'colaborador']], function() {
                Route::get('/inativo', ['uses' => 'ColaboradorController@index_inativo']);
                Route::get('/list', ['uses' => 'ColaboradorController@list']);
                Route::get('/list-inativo', ['uses' => 'ColaboradorController@list_inativo']);
                Route::get('/{slug}/reativar', ['uses' => 'ColaboradorController@reativar']);
                Route::get('/{slug}/edit', ['uses' => 'ColaboradorController@edit']);
                Route::get('/{slug}/alterar-senha', ['uses' => 'ColaboradorController@alterar_senha']);
                Route::put('/{id}/update-senha', ['uses' => 'ColaboradorController@update_senha']);
            });

            Route::group(['prefix' => 'liberacao', 'where' => ['prefix' => 'liberacao']], function() {
                Route::get('/{slug}/edit', ['uses' => 'LiberacaoController@edit']);
                Route::post('/localizacao/{id}', ['uses' => 'LiberacaoController@gerar_localizacao']);
            });

            //Configuracao
            Route::group(['prefix' => 'configuracao', 'where' => ['prefix' => 'configuracao']], function() {
            });

            //Depoimentos
            Route::group(['prefix' => 'depoimentos', 'where' => ['prefix' => 'depoimentos']], function() {
                Route::get('/{slug}/edit', ['uses' => 'DepoimentoController@edit']);
                Route::get('/list', ['uses' => 'DepoimentoController@list']);
            });

             //NOTÍCIAS
             Route::group(['prefix' => 'noticias', 'where' => ['prefix' => 'noticias']], function() {
                Route::get('/list', ['uses' => 'NoticiaController@list']);
                Route::get('/{slug}/edit', ['uses' => 'NoticiaController@edit']);
            });

            //TIME
            Route::group(['prefix' => 'time-qtm', 'where' => ['prefix' => 'time-qtm']], function() {
                Route::get('/{slug}/edit', ['uses' => 'TimeController@edit']);
            });

            Route::group(['prefix' => 'servico-oferecido', 'where' => ['prefix' => 'servico-oferecido']], function() {
                Route::get('/{slug}/edit', ['uses' => 'ServicoOferecidoController@edit']);
            });

            Route::group(['prefix' => 'produto', 'where' => ['prefix' => 'produto']], function() {
                Route::get('/{slug}/edit', ['uses' => 'ProdutoController@edit']);
            });

            Route::group(['prefix' => 'conselho', 'where' => ['prefix' => 'conselho']], function() {
                Route::get('/{slug}/edit', ['uses' => 'ConselhoController@edit']);
            });

            Route::group(['prefix' => 'especialidade', 'where' => ['prefix' => 'especialidade']], function() {
                Route::get('/{slug}/edit', ['uses' => 'EspecialidadeController@edit']);
            });
            Route::group(['prefix' => 'covidas-adm', 'where' => ['prefix' => 'covidas-adm']], function() {
                Route::get('/{slug}/edit-objetivo', ['uses' => 'CovidasController@edit_objetivo']);
                Route::put('/{slug}/update-objetivo', ['uses' => 'CovidasController@updateObjetivo']);
                Route::get('/{slug}/show', ['uses' => 'CovidasController@show']);
                Route::post('/store-objetivo', ['uses' => 'CovidasController@store_objetivo']);
            });


            Route::post('ckeditor/imageUpload', ['uses' => 'UploadEditorController@upload'])->name('upload');

            
            Route::resource('banner', 'BannerController');
            Route::resource('sobre-nos', 'SobreNosController');
            Route::resource('parceiros', 'ParceiroController');
            Route::resource('servicos', 'ServicoController');
            Route::resource('videos', 'VideoController');
            Route::resource('configuracao', 'ConfiguracaoController');
            Route::resource('depoimentos', 'DepoimentoController');
            Route::resource('noticias', 'NoticiaController');
            Route::resource('contato', 'ContatoPaginaInicialController');
            Route::resource('slide', 'SlideController');
            Route::resource('time-qtm', 'TimeController');
            Route::resource('servico-oferecido', 'ServicoOferecidoController');
            Route::resource('sobre-nos-conteudo', 'SobreConteudoController');
            Route::resource('sobre-nos-principal', 'SobrePrincipalController');
            Route::resource('sobre-nos-secundario', 'SobreSecundarioController');
            Route::resource('produto', 'ProdutoController');
            Route::resource('produto-conteudo', 'ProdutoConteudoController');
            Route::resource('conselho', 'ConselhoController');
            Route::resource('especialidade', 'EspecialidadeController');
            Route::resource('profissional-adm', 'ProfissionalAdmController');
            Route::resource('cliente-adm', 'ClienteAdmController');
            Route::resource('coworking-adm', 'CoworkingAdmController');
            Route::resource('liberacao', 'LiberacaoController');
            Route::resource('colaborador', 'ColaboradorController');
            Route::resource('covidas-adm', 'CovidasController');
        });
    });
