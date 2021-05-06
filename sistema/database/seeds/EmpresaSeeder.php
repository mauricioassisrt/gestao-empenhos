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
        $obj->nome_fantasia = "Prefeitura Municipal de Santa Isabel do Ivaí";
        $obj->razao_social = "Santa Isabel do Ivaí";
        $obj->cnpj = "76.974.823/0001-80";
        $obj->contato = "(44) 3453-8300";
        $obj->email = "prefeitura@santaisabel.com";
        $obj->foto_caminho = "img/empresa/empresa.jpg";
        $obj->numero = " 470";
        $obj->endereco = "Avenida: Manoel Ribas,";
        $obj->bairro = "CENTRO";
        $obj->cep = "cep ";
        $obj->cidade = "Santa Isabel do Ivaí  ";
        $obj->estado = "Paraná ";
        $obj->save();
    }
}
