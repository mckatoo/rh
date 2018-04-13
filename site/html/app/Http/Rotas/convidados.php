<?php

// ROTAS PARA CONVIDADOS

Route::group(['middleware' => 'guest'], function () {
    // Rotas de autenticação...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
});