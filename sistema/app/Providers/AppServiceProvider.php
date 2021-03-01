<?php

namespace App\Providers;

use App\Empresa;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {

            $objeto_empresa = Empresa::all();
            /* Verifica se possui empresa cadastrada no banco de dados
                caso possua cai no if, caso contrário cai no else e insere uma
            */
            if ($objeto_empresa->count() <= 0) {
                $obj = new Empresa();
                $obj->nome_fantasia = "Nome fantasia da empresa";
                $obj->razao_social = "Nome fantasia da empresa";
                $obj->cnpj = "CNPJ";
                $obj->contato = "contato";
                $obj->email = "email";
                $obj->foto_caminho = "/img/empresa/empresa.png";
                $obj->numero = "SN";
                $obj->endereco = "Nome da rua";
                $obj->bairro = "Nome bairro";
                $obj->cep = "cep ";
                $obj->cidade = "cidade ";
                $obj->estado = "estado ";
                $obj->save();
            }
        } catch (\Throwable $th) {
            return view('erro');
        }
    }
}
