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
                'nome_categoria' => 'Limpeza ',

            ],
            [
                'nome_categoria' => 'Higiene',

            ],

            [
                'nome_categoria' => 'Alimentos',

            ],

        );


        foreach ($categorias as $key => $value) {
            Categoria::create($value);
        }
    }
}
