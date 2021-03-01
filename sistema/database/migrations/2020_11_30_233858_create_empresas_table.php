<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ///   'nome_fantasia', 'razao_social', 'cnpj', 'contato', 'email', 'foto_caminho', 'endereco', 'bairro', 'cep', 'cidade', 'estado'

        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_fantasia');
            $table->string('razao_social');
            $table->string('cnpj');
            $table->string('contato');
            $table->string('email')->unique();
            $table->string('foto_caminho');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cep');
            $table->string('numero');
            $table->string('cidade');
            $table->string('estado');
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
        Schema::dropIfExists('empresas');
    }
}
