<?php

use Illuminate\Support\Facades\Auth;

/*
    rotas autenticadas
*/

Auth::routes();

/*
    REDIRECIONA PARA TELA DE LOGIN
*/

Route::get('/', 'Auth\LoginController@showLoginForm');
/*
    ROTAS PRINCIPAL
*/
Route::get('/home', 'HomeController@dashboard');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/erro', 'HomeController@erro');
Route::get('/erros', 'HomeController@sem');


###################### CAMADA E CONTROLE E SEGURAÇA ---- ROTAS #################

/*
     ROUTES USUARIOS
*/
Route::get('users', 'UsersController@index');
Route::get('autenticar/{id}', 'UsersController@autenticar');
Route::get('users/cadastrar', 'UsersController@cadastrar');
Route::post('users/insert', 'UsersController@insert');
Route::get('users/editar/{user}', 'UsersController@editar');
Route::patch('users/update/{uer}', 'UsersController@update');
Route::get('users/deletar/{user}', 'UsersController@deletar');
Route::get('users/visualizar/{user}', 'UsersController@view');
Route::post('users/user_role', 'UsersController@user_role');

/*
    ROUTES PESQUISA VISÃO USUARIO
*/
Route::get('users/search', 'UsersController@search');
Route::get('users/ordenar/asc/{ordenar}', 'UsersController@ordenar_asc');
Route::get('users/ordenar/desc/{ordenar}', 'UsersController@ordenar_desc');

/*
    ROUTES permissão e regraas
*/
Route::get('acl/roles', 'Permissions_rolesController@roles');
Route::get('acl/permissions', 'Permissions_rolesController@permissions');
Route::get('acl/role_view/{role}', 'Permissions_rolesController@view_role');
Route::get('acl/role_cadastrar', 'Permissions_rolesController@cadastrar_role')->name('acl/role_cadastrar');
Route::get('acl/permission_cadastrar', 'Permissions_rolesController@cadastrar_permission');
Route::post('acl/role_insert', 'Permissions_rolesController@insert_role');
Route::post('acl/permission_insert', 'Permissions_rolesController@insert_permission');
Route::get('acl/role_delete/{role}', 'Permissions_rolesController@deletar_role');
Route::post('acl/role_permissions', 'Permissions_rolesController@role_permissions');
#ROUTES empresa
Route::get('empresa', 'EmpresaController@editar');
Route::post('empresa/atualizar', 'EmpresaController@atualizar');
/*
     ROUTES PESSOAS
*/
Route::get('/pessoas', 'PessoaController@index')->name('pessoa');
Route::get('pessoas/cadastrar', 'PessoaController@create');
Route::post('pessoas/insert', 'PessoaController@store');
Route::get('pessoas/editar/{pessoa}', 'PessoaController@editar_pessoa');
Route::patch('pessoas/update/{pessoa}', 'PessoaController@update');
Route::get('pessoas/deletar/{pessoa}', 'PessoaController@destroy');
Route::get('pessoas/visualizar/{user}', 'PessoaController@view');
Route::post('pessoas/redefinirSenha', 'PessoaController@sendEmail')->name('pessoas.redefinirSenha');
#edita pessoa logada
Route::get('dadosPessoais/{id}', 'PessoaController@edit');
#ROUTES PESQUISA
Route::get('pessoas/search', 'PessoaController@search');
Route::post('pessoas/carregaSenha', 'PessoaController@retorna_senhas');
/*
    REQUISICAO ROUTES
*/
Route::get('/requisicao', 'RequisicaoController@index')->name('requisicao');


/*
    Fornecedor Routers
*/
Route::group(['middleware' => 'web'], function () {
   Route::get('fornecedor', 'FornecedorController@index');
    Route::get('fornecedor/cadastrar', 'FornecedorController@cadastrar');
    Route::post('fornecedor/insert', 'FornecedorController@insert');
    Route::get('fornecedor/editar/{fornecedor}', 'FornecedorController@editar');
    Route::patch('fornecedor/update/{id}', 'FornecedorController@update');
    Route::get('fornecedor/deletar/{fornecedor}', 'FornecedorController@deletar');
    Route::get('fornecedor/visualizar/{fornecedor}', 'FornecedorController@view');
    Route::get('fornecedor/search', 'FornecedorController@search');
});
/*
    Categoria Routers
*/
Route::group(['middleware' => 'web'], function () {
    Route::get('categoria', 'CategoriaController@index');
     Route::get('categoria/cadastrar', 'CategoriaController@cadastrar');
     Route::post('categoria/insert', 'CategoriaController@insert');
     Route::get('categoria/editar/{categoria}', 'CategoriaController@editar');
     Route::patch('categoria/update/{id}', 'CategoriaController@update');
     Route::get('categoria/deletar/{categoria}', 'CategoriaController@deletar');
     Route::get('categoria/visualizar/{categoria}', 'CategoriaController@view');
     Route::get('categoria/search', 'CategoriaController@search');
 });
/*
    Secretarias Routers
*/
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

/*
    Setores Routers
*/
Route::group(['middleware' => 'web'], function () {
    Route::get('setor', 'SetorController@index');
     Route::get('setor/cadastrar', 'SetorController@cadastrar');
     Route::post('setor/insert', 'SetorController@insert');
     Route::get('setor/editar/{setor}', 'SetorController@editar');
     Route::patch('setor/update/{id}', 'SetorController@update');
     Route::get('setor/deletar/{setor}', 'SetorController@deletar');
     Route::get('setor/visualizar/{setor}', 'SetorController@view');
     Route::get('setor/search', 'SetorController@search');
 });
