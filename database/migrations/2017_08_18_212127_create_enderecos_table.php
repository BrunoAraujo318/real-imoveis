<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cidade_id')->unsigned()->comment('Identificador da chave estrangeira da Cidade');
            $table->foreign('cidade_id')->references('id')->on('cidades')->onUpdate('cascade')->onDelete('cascade');

            $table->string('logradouro')->comment('definir(praça\rua\parque)');
            $table->integer('numero')->comment('Numero residencial');
            $table->string('complemento')->comment('informação complementar do endereço');
            $table->integer('cep')->comment('Codigo de endereço postal');
            $table->string('bairro')->comment('Nome do bairro');
            $table->integer('longitude')->comment('Posição referente a longitude');
            $table->integer('latitude')->comment('Posição referente a latitude');
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
        Schema::dropIfExists('enderecos');
    }
}
