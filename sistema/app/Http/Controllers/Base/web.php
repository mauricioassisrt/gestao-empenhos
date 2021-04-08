<?php

Route::group(['middleware' => 'web'], function () {
    Route::get('licitacao', 'LicitacaoController@index')->name('licitacao');
     Route::get('licitacao/cadastrar', 'LicitacaoController@cadastrar')->name('licitacao.create');
     Route::post('licitacao/novo', 'LicitacaoController@insert')->name('licitacao.insert');
     Route::get('licitacao/editar/{licitacao}', 'LicitacaoController@editar')->name('licitacao.edit');
     Route::patch('licitacao/update/{id}', 'LicitacaoController@update')->name('licitacao.update');
     Route::get('licitacao/deletar/{licitacao}', 'LicitacaoController@deletar')->name('licitacao.delete');
     Route::get('licitacao/visualizar/{licitacao}', 'LicitacaoController@view')->name('licitacao.view');
     Route::get('licitacao/pesquisar', 'LicitacaoController@search')->name('licitacao.search');
 });

