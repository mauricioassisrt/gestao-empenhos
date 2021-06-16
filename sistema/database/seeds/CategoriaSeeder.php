<?php

use App\Categoria;
use App\Produto;
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
        // $categorias = array(
        //     [
        //         'nome_categoria' => 'Limpeza ',

        //     ],
        //     [
        //         'nome_categoria' => 'Higiene',

        //     ],

        //     [
        //         'nome_categoria' => 'Alimentos',

        //     ],

        // );


        // foreach ($categorias as $key => $value) {
        //     Categoria::create($value);
        // }
       //factory(Categoria::class, 5000)->create();
        factory(Produto::class, 100)->create()->each(function ($currency) {
            $currency->variations()->saveMany(factory(Categoria::class, 50)->make());
        });
    }
}
