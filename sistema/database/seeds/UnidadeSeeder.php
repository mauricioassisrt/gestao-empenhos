<?php

use App\Unidade;
use Illuminate\Database\Seeder;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidade = array(
            [
                'nome' => 'CAPS 2  ',
                'endereco' => 'Rua XXX ',
                'numero' => '123 ',
                'bairro' => 'BAIRRO NOVO ',
                'cidade' => 'SAO PAULO  ',
                'estado' => 'SAO PAULO  ',
                'cep' => '87701020',
                'telefone' => '44 4545-8721 ',
                'email' => 'email@mail.com ',
                'secretaria_id' => '1',
            ],
            [
                'nome' => 'UBS CENTRO  ',
                'endereco' => 'Rua XXX ',
                'numero' => '123 ',
                'bairro' => 'BAIRRO NOVO ',
                'cidade' => 'SAO PAULO  ',
                'estado' => 'SAO PAULO  ',
                'cep' => '87701020',
                'telefone' => '44 4545-8721 ',
                'email' => 'email@mail.com ',
                'secretaria_id' => '2',
            ],

            [
                'nome' => 'Escola CENTRAL  ',
                'endereco' => 'Rua XXX ',
                'numero' => '123 ',
                'bairro' => 'BAIRRO NOVO ',
                'cidade' => 'SAO PAULO  ',
                'estado' => 'SAO PAULO  ',
                'cep' => '87701020',
                'telefone' => '44 4545-8721 ',
                'email' => 'email@mail.com ',
                'secretaria_id' => '3',
            ],
            [
                'nome' => 'Receitas e despesas  ',
                'endereco' => 'Rua XXX ',
                'numero' => '123 ',
                'bairro' => 'BAIRRO NOVO ',
                'cidade' => 'SAO PAULO  ',
                'estado' => 'SAO PAULO  ',
                'cep' => '87701020',
                'telefone' => '44 4545-8721 ',
                'email' => 'email@mail.com ',
                'secretaria_id' => '4',
            ],
            [
                'nome' => 'Departamento Frotas ',
                'endereco' => 'Rua XXX ',
                'numero' => '123 ',
                'bairro' => 'BAIRRO NOVO ',
                'cidade' => 'SAO PAULO  ',
                'estado' => 'SAO PAULO  ',
                'cep' => '87701020',
                'telefone' => '44 4545-8721 ',
                'email' => 'email@mail.com ',
                'secretaria_id' => '5',
            ],
            [
                'nome' => 'Gerencia de processos  ',
                'endereco' => 'Rua XXX ',
                'numero' => '123 ',
                'bairro' => 'BAIRRO NOVO ',
                'cidade' => 'SAO PAULO  ',
                'estado' => 'SAO PAULO  ',
                'cep' => '87701020',
                'telefone' => '44 4545-8721 ',
                'email' => 'email@mail.com ',
                'secretaria_id' => '6',
            ],
        );


        foreach ($unidade as $key => $value) {
            Unidade::create($value);
        }
    }
}
