<?php

use App\Secretaria;
use Illuminate\Database\Seeder;

class SecretariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $secretarias = array(
            [
                'nome' => 'Assistencia Social  ',
                'endereco' => 'Rua XXX ',
                'numero' => '123 ',
                'bairro' => 'BAIRRO NOVO ',
                'cidade' => 'SAO PAULO  ',
                'estado' => 'SAO PAULO  ',
                'cep' => '87701020',
                'telefone' => '44 4545-8721 ',
                'email' => 'email@mail.com ',

            ],
            [
                'nome' => 'Saúde ',
                'endereco' => 'Rua XXX ',
                'numero' => '123 ',
                'bairro' => 'BAIRRO NOVO ',
                'cidade' => 'SAO PAULO  ',
                'estado' => 'SAO PAULO  ',
                'cep' => '87701020',
                'telefone' => '44 4545-8721 ',
                'email' => 'email@mail.com ',

            ],

            [
                'nome' => 'Educação ',
                'endereco' => 'Rua XXX ',
                'numero' => '123 ',
                'bairro' => 'BAIRRO NOVO ',
                'cidade' => 'SAO PAULO  ',
                'estado' => 'SAO PAULO  ',
                'cep' => '87701020',
                'telefone' => '44 4545-8721 ',
                'email' => 'email@mail.com ',

            ],
            [
                'nome' => 'Fazenda  ',
                'endereco' => 'Rua XXX ',
                'numero' => '123 ',
                'bairro' => 'BAIRRO NOVO ',
                'cidade' => 'SAO PAULO  ',
                'estado' => 'SAO PAULO  ',
                'cep' => '87701020',
                'telefone' => '44 4545-8721 ',
                'email' => 'email@mail.com ',

            ],
            [
                'nome' => 'Controladoria  ',
                'endereco' => 'Rua XXX ',
                'numero' => '123 ',
                'bairro' => 'BAIRRO NOVO ',
                'cidade' => 'SAO PAULO  ',
                'estado' => 'SAO PAULO  ',
                'cep' => '87701020',
                'telefone' => '44 4545-8721 ',
                'email' => 'email@mail.com ',

            ],
            [
                'nome' => 'Procuradoria ',
                'endereco' => 'Rua XXX ',
                'numero' => '123 ',
                'bairro' => 'BAIRRO NOVO ',
                'cidade' => 'SAO PAULO  ',
                'estado' => 'SAO PAULO  ',
                'cep' => '87701020',
                'telefone' => '44 4545-8721 ',
                'email' => 'email@mail.com ',

            ],
        );


        foreach ($secretarias as $key => $value) {
            Secretaria::create($value);
        }
    }
}
