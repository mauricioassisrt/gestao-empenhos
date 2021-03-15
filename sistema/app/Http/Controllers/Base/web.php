<?php

Route::group(['middleware' => 'web'], function () {
    Route::get('produto', 'ProdutoController@index');
     Route::get('produto/cadastrar', 'ProdutoController@cadastrar');
     Route::post('produto/insert', 'ProdutoController@insert');
     Route::get('produto/editar/{produto}', 'ProdutoController@editar');
     Route::patch('produto/update/{id}', 'ProdutoController@update');
     Route::get('produto/deletar/{produto}', 'ProdutoController@deletar');
     Route::get('produto/visualizar/{produto}', 'ProdutoController@view');
     Route::get('produto/search', 'ProdutoController@search');
 });

