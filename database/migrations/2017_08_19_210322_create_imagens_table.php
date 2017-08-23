<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->comment('Nome da imagem');
            $table->string('url')->comment('Link da imagem');
            $table->string('descricao')->comment('descriçao da imagem');

            $table->integer('imovel_id')->unsigned()->comment('Identificador da chave estrangeira do imovel');
            $table->foreign('imovel_id')->references('id')->on('imoveis')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('ordem')->comment('Ordem da imagem');
            $table->integer('visualizacao')->comment('Quantidade de visualição da imagem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagens');
    }
}
