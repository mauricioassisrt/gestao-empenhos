<?php

Route::group(['middleware' => 'web'], function () {
    Route::get('secretaria', 'SecretariaController@index');
     Route::get('secretaria/cadastrar', 'SecretariaController@cadastrar');
     Route::post('secretaria/insert', 'SecretariaController@insert');
     Route::get('secretaria/editar/{secretaria}', 'SecretariaController@editar');
     Route::patch('secretaria/update/{id}', 'SecretariaController@update');
     Route::get('secretaria/deletar/{secretaria}', 'SecretariaController@deletar');
     Route::get('secretaria/visualizar/{secretaria}', 'SecretariaController@view');
     Route::get('secretaria/search', 'SecretariaController@search');
 });

