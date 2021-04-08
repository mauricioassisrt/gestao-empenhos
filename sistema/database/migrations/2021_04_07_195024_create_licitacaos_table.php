<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ano');
            $table->integer('numero_licitacao');
            $table->string('modalidade');
            $table->string('pregoeiro')->nullable();
            $table->string('pregao');
            $table->string('fonte_recurso')->nullable();
            $table->string('reduzido')->nullable();
            // $table->integer('fornecedor_id')->unsigned()->nullable();
            // $table->foreign('fornecedor_id')->references('id')->on('fornecedors');
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
        Schema::dropIfExists('licitacaos');

      ///  Schema::dropIfExists('fornecedors');
    }
}
