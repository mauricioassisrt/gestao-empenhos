<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumnsVigenciaLicitacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('licitacaos', function (Blueprint $table) {
            $table->date('inicio')->nullable();
            $table->date('fim')->nullable();

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
            $table->dropColumn('inicio');
            $table->dropColumn('fim');

        });
    }
}
