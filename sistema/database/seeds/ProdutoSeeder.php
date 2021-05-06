<?php

use App\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produto = array(
            [
                'nome' => 'Arroz tipo 1 5kg',
                'descricao' => 'Descrição do produto',
                'categoria_id' => '2',

            ],
            [
                'nome' => 'Feijão Carioca 1kg',
                'descricao' => 'Descrição do produto',
                'categoria_id' => '2',


            ],
        );


        foreach ($produto as $key => $value) {
            Produto::create($value);
        }
    }
}
