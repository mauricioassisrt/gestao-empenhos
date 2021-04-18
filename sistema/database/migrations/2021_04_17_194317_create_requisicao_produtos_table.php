<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisicaoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicaos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('justificativa')->nullable();
            $table->string('observacao')->nullable();
            $table->string('requisicao_ano')->nullable();
            $table->double('total_produtos', 8, 2);
            $table->double('valor_final', 8, 2);
            $table->integer('unidade_id')->unsigned();
            $table->foreign('unidade_id')->references('id')->on('unidades');
            $table->timestamps();
        });

        Schema::create('requisicao_produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade_produto');
            $table->integer('valor_total_iten');
            $table->integer('requisicao_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            $table->integer('licitacao_produto_id')->unsigned()->nullable();
            $table->foreign('licitacao_produto_id')->references('id')->on('licitacao_produtos');
            $table->foreign('requisicao_id')->references('id')->on('requisicaos');
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

        Schema::dropIfExists('requisicao_produtos');
        Schema::dropIfExists('requisicaos');

    }
}
