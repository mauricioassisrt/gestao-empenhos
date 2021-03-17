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
                'lote' => '20210301 12:00:15',
                'descricao' => 'Descrição do produto',
                'valor_unitario' => '50.00',
                'fornecedor_id' => '1',
                'categoria_id' => '2',

            ],
            [
                'nome' => 'Feijão Carioca 1kg',
                'lote' => '20210301 12:00:15',
                'descricao' => 'Descrição do produto',
                'valor_unitario' => '10.00',
                'fornecedor_id' => '1',
                'categoria_id' => '2',

            ],
        );


        foreach ($produto as $key => $value) {
            Produto::create($value);
        }
    }
}
