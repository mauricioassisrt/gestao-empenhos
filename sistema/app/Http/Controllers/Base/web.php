<?php

Route::group(['middleware' => 'web'], function () {
    Route::get('licitacao/vincular', 'LicitacaoProdutoController@index')->name('licitacao.vincular');
     Route::get('licitacao/vincular/cadastrar', 'LicitacaoProdutoController@cadastrar')->name('licitacao.vincular.create');
     Route::post('licitacao/vincular/novo', 'LicitacaoProdutoController@insert')->name('licitacao.vincular.insert');
     Route::get('licitacao/vincular/editar/{licitacao/vincular}', 'LicitacaoProdutoController@editar')->name('licitacao.vincular.edit');
     Route::patch('licitacao/vincular/update/{id}', 'LicitacaoProdutoController@update')->name('licitacao.vincular.update');
     Route::get('licitacao/vincular/deletar/{licitacao/vincular}', 'LicitacaoProdutoController@deletar')->name('licitacao.vincular.delete');
     Route::get('licitacao/vincular/visualizar/{licitacao/vincular}', 'LicitacaoProdutoController@view')->name('licitacao.vincular.view');
     Route::get('licitacao/vincular/pesquisar', 'LicitacaoProdutoController@search')->name('licitacao.vincular.search');
 });

