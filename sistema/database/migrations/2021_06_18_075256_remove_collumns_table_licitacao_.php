<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCollumnsTableLicitacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('licitacaos', function (Blueprint $table) {
            $table->dropColumn('total_produtos');
             $table->dropColumn('valor_final');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('licitacaos', function (Blueprint $table) {
            $table->integer('total_produtos');
            $table->integer('valor_final');
        });
    }
}
