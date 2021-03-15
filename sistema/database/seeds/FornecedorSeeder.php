<?php

use App\Fornecedor;
use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = array(
            [
                'nome_fornecedor' => 'Fornecedor',
                'cnpj' => '12312312312',
                'endereco' => 'Rua teste',
                'numero' => '12',
                'bairro' => 'São paulo',
                'cep' => '54654545',
                'cidade' => 'São Paulo',
                'estado' => 'São Paulo',
                'telefone' => '44 4444-4444',
                'email' => '123'
            ],

            [
                'nome_fornecedor' => 'Fornecedor 1',
                'cnpj' => '12312312312',
                'endereco' => 'Rua teste',
                'numero' => '12',
                'bairro' => 'São paulo',
                'cep' => '54654545',
                'cidade' => 'São Paulo',
                'estado' => 'São Paulo',
                'telefone' => '44 4444-4444',
                'email' => '123'
            ],
            [
                'nome_fornecedor' => 'Fornecedor 2',
                'cnpj' => '12312312312',
                'endereco' => 'Rua teste',
                'numero' => '12',
                'bairro' => 'São paulo',
                'cep' => '54654545',
                'cidade' => 'São Paulo',
                'estado' => 'São Paulo',
                'telefone' => '44 4444-4444',
                'email' => '123'
            ],
        );


        foreach ($fornecedor as $key => $value) {
            Fornecedor::create($value);
        }
    }
}
