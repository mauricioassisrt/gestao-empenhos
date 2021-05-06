<?php

use App\Licitacao;
use Illuminate\Database\Seeder;

class LicitacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //    'ano','numero_licitacao', 'modalidade','pregoeiro', 'pregao',  'fonte_recurso', 'reduzido','fornecedor_id'

        $licitacao = array(
            [
                'ano' => '2021',
                'numero_licitacao' => 21212121,
                'modalidade' => 'Modalidade ',
                'pregoeiro' => 'Pessoa',

                'pregao' => '222',
                'fonte_recurso' => 'recursos livres',
                'reduzido' => '12312312312',
              //  'fornecedor_id' => '1'

            ],
            [
                'ano' => '2020',
                'numero_licitacao' => 123123132,
                'modalidade' => 'Modalidade 2',
                'pregoeiro' => 'asdasda',

                'pregao' => '4555222',
                'fonte_recurso' => 'recursos vinculado',
                'reduzido' => '12312312312',
             //   'fornecedor_id' => '1'

            ],
        );


        foreach ($licitacao as $key => $value) {
            Licitacao::create($value);
        }
    }
}
