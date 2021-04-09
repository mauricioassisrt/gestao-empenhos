<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicitacaoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitacao_produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('quantidade_produto', 8, 2);
            $table->double('valor_total_iten', 8, 2);
            $table->integer('fornecedor_id')->unsigned()->nullable();
            $table->integer('produto_id')->unsigned()->nullable();
            $table->integer('licitacao_id')->unsigned()->nullable();

            $table->foreign('fornecedor_id')->references('id')->on('fornecedors');
            $table->foreign('licitacao_id')->references('id')->on('licitacaos');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licitacao_produtos');
        Schema::dropIfExists('licitacaos');
        Schema::dropIfExists('fornecedors');
    }
}
