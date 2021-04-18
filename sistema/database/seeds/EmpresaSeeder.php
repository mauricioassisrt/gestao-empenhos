<?php

use App\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new Empresa();
        $obj->nome_fantasia = "Nome Prefeitura";
        $obj->razao_social = "Nome";
        $obj->cnpj = "CNPJ";
        $obj->contato = "contato";
        $obj->email = "email";
        $obj->foto_caminho = "/img/empresa/empresa.jpg";
        $obj->numero = "SN";
        $obj->endereco = "Nome da rua";
        $obj->bairro = "Nome bairro";
        $obj->cep = "cep ";
        $obj->cidade = "cidade ";
        $obj->estado = "estado ";
        $obj->save();
    }
}
