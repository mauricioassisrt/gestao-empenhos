<?php

use App\Requisicao;
use App\Requisicao_produto;
use App\RequisicaoProduto;
use Illuminate\Database\Seeder;

class RequisicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $requisicao = array(
            [

                'justificativa' => 'Justificativa ',
                'observacao' => 'OBS ',
                'status'=>'Enviado',

                'requisicao_ano' => '1020/2021',
                'valor_final' => '80',
                'total_produtos' => '8',
                'unidade_id' => '1',
            ],
            [
                'justificativa' => 'Justificativa ',
                'observacao' => 'OBS ',
                'status'=>'Enviado',

                'requisicao_ano' => '1020/2021',
                'valor_final' => '80',
                'total_produtos' => '8',
                'unidade_id' => '1',
            ],


        );


        foreach ($requisicao as $key => $value) {
            Requisicao::create($value);
        }

        $requisicao_produto = array(
            [
                'quantidade_produto' => '4',
                'valor_total_iten' => '40',
                'requisicao_id' => '1',
                'produto_id' => '1'
            ],
            [
                'quantidade_produto' => '4',
                'valor_total_iten' => '40',
                'requisicao_id' => '1',
                'produto_id' => '2'
            ]
        );
        foreach ($requisicao_produto as $key => $value) {
            RequisicaoProduto::create($value);
        }
    }
}
