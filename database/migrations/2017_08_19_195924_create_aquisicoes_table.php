<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAquisicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aquisicoes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('usuario_id')->unsigned()->comment('Identificador da chave estrangeira do usuario');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('imovel_id')->unsigned()->comment('Identificador da chave estrangeira do imovel');
            $table->foreign('imovel_id')->references('id')->on('imoveis')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('data_aquisicao')->comment('Data da aquisição do imovel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aquisicoes');
    }
}
