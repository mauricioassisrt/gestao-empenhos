<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLicitacaoProdutoIdToRequisicaoProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisicao_produtos', function (Blueprint $table) {
            $table->integer('licitacao_produto_id')->unsigned()->nullable();
            $table->foreign('licitacao_produto_id')->references('id')->on('licitacao_produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requisicao_produtos', function (Blueprint $table) {
            $table->integer('licitacao_produto_id')->unsigned()->nullable();
            $table->foreign('licitacao_produto_id')->references('id')->on('licitacao_produtos');
        });
    }
}
