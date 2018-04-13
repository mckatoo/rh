<?php


Route::group(['as' => 'prof.', 'prefix' => 'professores'], function () {
    // Rotas para professores efetuarem seu primeiro cadastro sem necessitar de autenticação
    Route::get('novo/{id?}', ['as' => 'create', 'uses' => 'ProfessorController@create']);
    
    // Cadastro de professores
    Route::post('salvar', ['as' => 'store', 'uses' => 'ProfessorController@store']);
});

require_once __DIR__.'/Rotas/autenticadas.php';
require_once __DIR__.'/Rotas/convidados.php';
