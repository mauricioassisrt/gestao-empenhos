<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('data_nascimento');
            $table->string('sexo');
            $table->string('celular');
            $table->string('foto_pessoa');
            $table->integer('user_id')->unsigned();
            $table->integer('secretaria_id')->unsigned()->nullable();
            $table->foreign('secretaria_id')->references('id')->on('secretarias');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::create('pessoa_unidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unidade_id')->unsigned();
            $table->integer('pessoa_id')->unsigned();
            $table->foreign('unidade_id')->references('id')->on('unidades');
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
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

        Schema::dropIfExists('pessoa_unidades');
        Schema::dropIfExists('pessoas');
    }
}
