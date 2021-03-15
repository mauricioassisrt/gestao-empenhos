<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = array(
            [
                'nome_categoria' => 'Categoria ',

            ],
            [
                'nome_categoria' => 'Categoria 2',

            ],

            [
                'nome_categoria' => 'Categoria 3',

            ],

        );


        foreach ($categorias as $key => $value) {
            Categoria::create($value);
        }
    }
}
