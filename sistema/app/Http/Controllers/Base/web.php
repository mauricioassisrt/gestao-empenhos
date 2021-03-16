<?php

Route::group(['middleware' => 'web'], function () {
    Route::get('unidade', 'UnidadeController@index');
     Route::get('unidade/cadastrar', 'UnidadeController@cadastrar');
     Route::post('unidade/insert', 'UnidadeController@insert');
     Route::get('unidade/editar/{unidade}', 'UnidadeController@editar');
     Route::patch('unidade/update/{id}', 'UnidadeController@update');
     Route::get('unidade/deletar/{unidade}', 'UnidadeController@deletar');
     Route::get('unidade/visualizar/{unidade}', 'UnidadeController@view');
     Route::get('unidade/search', 'UnidadeController@search');
 });

