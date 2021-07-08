<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeingKeyRequisicaoProdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisicao_produtos', function (Blueprint $table) {
            $table->dropForeign(['licitacao_produto_id']);
            $table->foreign('licitacao_produto_id')->references('id')->on('licitacaos');
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
            //
        });
    }
}
