<?php

use App\Pessoa;
use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pessoa = array(
            [
                'name' => 'Nome Admin',
                'data_nascimento' => '2021-03-01 12:00:15',
                'sexo' => 'Masculino',
                'celular' => '(44) 9 9999-9999',
                'foto_pessoa' => 'img/pessoa/user.jpg',
                'updated_at' => '2021-03-01 12:00:15',
                'user_id' => '1'
            ],
            [
                'name' => 'Gestor Prefeitura ',
                'data_nascimento' => '2021-03-01 12:00:15',
                'sexo' => 'Masculino',
                'celular' => '(44) 9 9999-9999',
                'foto_pessoa' => 'img/pessoa/user.jpg',
                'updated_at' => '2021-03-01 12:00:15',
                'user_id' => '2'
            ]
        );


        foreach ($pessoa as $key => $value) {
            Pessoa::create($value);
        }
    }
}
