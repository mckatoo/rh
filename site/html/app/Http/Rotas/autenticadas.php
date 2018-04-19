<?php

// ROTAS AUTENTICADAS

// Rotas para usuários
Route::group(['middleware' => 'auth'], function () {
    // Rotas de autenticação...
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
    
    // Rotas tratamento de usuários
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
    Route::get('perfil/{id?}', ['as' => 'perfil', 'uses' => 'HomeController@perfil']);
    
    // Rotas para registro de usuários
    Route::get('registro', ['as' => 'registro', 'uses' => 'HomeController@getRegister']);
    Route::post('registrar', ['as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);
    Route::get('usuarios', ['as' => 'usuarios', 'uses' => 'HomeController@usuarios']);
    Route::post('updateUser', ['as' => 'updateUser', 'uses' => 'HomeController@updateUser']);

    // Rotas para cursos
    Route::group(['as' => 'cursos.', 'prefix' => 'cursos'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'CursoController@index']);
        Route::get('ministra', ['as' => 'ministra', 'uses' => 'CursoController@ministra']);
        Route::post('addprofessor', ['as' => 'addprofessor', 'uses' => 'CursoController@addProfessor']);
        Route::post('addcoordenador', ['as' => 'addcoordenador', 'uses' => 'CursoController@addCoordenador']);
        Route::post('rmprofessor', ['as' => 'rmprofessor', 'uses' => 'CursoController@rmProfessor']);
        Route::post('rmjaministrou', ['as' => 'rmjaministrou', 'uses' => 'CursoController@rmJaMinistrou']);
        Route::post('updateprofessor', ['as' => 'updateprofessor', 'uses' => 'CursoController@updateProfessor']);
    });

    // Rotas para produções
    Route::group(['as' => 'producoes.', 'prefix' => 'producoes'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ProducaoController@index']);
        Route::post('salvar', ['as' => 'store', 'uses' => 'ProducaoController@store']);
        Route::post('upload', ['as' => 'upload', 'uses' => 'ProducaoController@upload']);
        Route::get('download/{id_arq}', ['as' => 'download', 'uses' => 'ProducaoController@download']);
        Route::post('excluir', ['as' => 'excluir', 'uses' => 'ProducaoController@excluir']);
        Route::post('arquivo/excluir', ['as' => 'excluir_arq', 'uses' => 'ProducaoController@excluir_arq']);
        Route::get('list_arq/{producao_id}', ['as' => 'list_arq', 'uses' => 'ProducaoController@list_arq']);
        Route::get('tipo', ['as' => 'tipo', 'uses' => 'ProducaoController@listTipo']);
        Route::post('addtipo', ['as' => 'addtipo', 'uses' => 'ProducaoController@addTipo']);
        Route::post('rmtipo', ['as' => 'rmtipo', 'uses' => 'ProducaoController@rmTipo']);
    });

    // Rotas para notificações
    Route::group(['as' => 'notificacoes.', 'prefix' => 'notificacoes'], function () {
        Route::match(['get', 'post'], '', ['as' => 'index', 'uses' => 'NotificacaoController@index']);
        Route::get('list', ['as' => 'list', 'uses' => 'NotificacaoController@list']);
    });


    Route::group(['as' => 'tempo_mag.', 'prefix' => 'tempo_mag'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'TempoMagController@index']);
        Route::post('upload', ['as' => 'upload', 'uses' => 'TempoMagController@upload_tempo_mag']);
        Route::get('download/{id_arq}', ['as' => 'download', 'uses' => 'TempoMagController@download']);
        Route::post('excluir', ['as' => 'excluir', 'uses' => 'TempoMagController@excluir']);
    });

    Route::group(['as' => 'tempo_exp.', 'prefix' => 'tempo_exp'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'TempoExpController@index']);
        Route::post('upload', ['as' => 'upload', 'uses' => 'TempoExpController@upload_tempo_exp']);
        Route::get('download/{id_arq}', ['as' => 'download', 'uses' => 'TempoExpController@download']);
        Route::post('excluir', ['as' => 'excluir', 'uses' => 'TempoExpController@excluir']);
    });

    Route::group(['as' => 'telefone_prof.', 'prefix' => 'telefone_prof'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'TelefoneProfController@index']);
        Route::post('salvar', ['as' => 'store', 'uses' => 'TelefoneProfController@store']);
        Route::post('excluir', ['as' => 'destroy', 'uses' => 'TelefoneProfController@destroy']);
    });

    Route::group(['as' => 'titulos.', 'prefix' => 'titulos'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'TituloController@index']);
        Route::post('salvar', ['as' => 'store', 'uses' => 'TituloController@store']);
        Route::post('atualizar', ['as' => 'update', 'uses' => 'TituloController@update']);
        Route::post('excluir', ['as' => 'destroy', 'uses' => 'TituloController@destroy']);
        Route::get('{id_titulo}/lista/', ['as' => 'lista', 'uses' => 'TituloController@lista']);
        Route::get('{id_titulo}/cad_arq/', ['as' => 'cad_arq', 'uses' => 'TituloController@cad_arq']);
        Route::post('upload', ['as' => 'upload', 'uses' => 'TituloController@upload']);
        Route::get('download/{id_arq}', ['as' => 'download', 'uses' => 'TituloController@download']);
        Route::post('arquivo/excluir', ['as' => 'excluir_arq', 'uses' => 'TituloController@excluir_arq']);
        Route::get('list_arq/{id_titulo}', ['as' => 'list_arq', 'uses' => 'TituloController@list_arq']);
    });

    Route::group(['as' => 'publicacoes.', 'prefix' => 'publicacoes'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'PublicacaoController@index']);
        Route::post('salvar', ['as' => 'store', 'uses' => 'PublicacaoController@store']);
        Route::post('upload', ['as' => 'upload', 'uses' => 'PublicacaoController@upload']);
        Route::get('download/{id_arq}', ['as' => 'download', 'uses' => 'PublicacaoController@download']);
        Route::post('excluir', ['as' => 'excluir', 'uses' => 'PublicacaoController@excluir']);
        Route::post('arquivo/excluir', ['as' => 'excluir_arq', 'uses' => 'PublicacaoController@excluir_arq']);
        Route::get('list_arq/{publicacao_id}', ['as' => 'list_arq', 'uses' => 'PublicacaoController@list_arq']);
        Route::get('tipo', ['as' => 'tipo', 'uses' => 'PublicacaoController@listTipo']);
        Route::post('addtipo', ['as' => 'addtipo', 'uses' => 'PublicacaoController@addTipo']);
        Route::post('rmtipo', ['as' => 'rmtipo', 'uses' => 'PublicacaoController@rmTipo']);
    });


    // Rotas para curriculos
    Route::group(['as' => 'curriculos.', 'prefix' => 'curriculos'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'CurriculosController@index']);
        Route::post('professor', ['as' => 'professor', 'uses' => 'CurriculosController@postProfessor']);
        Route::get('professor', ['as' => 'professor', 'uses' => 'CurriculosController@getProfessor']);
        Route::get('titulo/{id_titulo}/arquivos', ['as' => 'arq_titulo', 'uses' => 'CurriculosController@arq_titulo']);
        Route::get('publicacao/{id_titulo}/arquivos', ['as' => 'arq_publicacao', 'uses' => 'CurriculosController@arq_publicacao']);
        Route::get('producao/{id_titulo}/arquivos', ['as' => 'arq_producao', 'uses' => 'CurriculosController@arq_producao']);
    });


    // Rotas para professores
    Route::group(['as' => 'prof.', 'prefix' => 'professores'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ProfessorController@index']);
        Route::post('atualizar', ['as' => 'update', 'uses' => 'ProfessorController@update']);
        Route::get('excluir', ['as' => 'destroy', 'uses' => 'ProfessorController@destroy']);
        Route::get('pendentes', ['as' => 'pendentes', 'uses' => 'ProfessorController@pendentes']);
        Route::get('foto/{users_id}', ['as' => 'foto', 'uses' => 'ProfessorController@foto']);
        Route::get('novo', ['as' => 'create', 'uses' => 'ProfessorController@create']);
        Route::post('salvar', ['as' => 'store', 'uses' => 'ProfessorController@store']);
    });
});