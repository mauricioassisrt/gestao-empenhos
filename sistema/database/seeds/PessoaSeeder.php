<?php

use Illuminate\Database\Seeder;
use App\Pessoa;
class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pessoa = array([
            'name' => 'Nome Admin',
            'data_nascimento'=> '2021-03-01 12:00:15',
            'sexo'=> 'M', 
            'celular'=> '(44) 9 9999-9999',
            'foto_pessoa'=> '/caminho',
            'updated_at'=> '2021-03-01 12:00:15',
            'user_id'=> '1'
          ]);
          foreach ($pessoa as $key => $value) {
            Pessoa::create($value);
          }
    }
}
