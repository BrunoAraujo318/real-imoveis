<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->char('situacao',1)->default('S')->comment('Identificação da avaliação [S - Sim, N - Não]'); 

            $table->integer('imovel_id')->unsigned()->comment('Identificador da chave estrangeira do imóvel');
            $table->foreign('imovel_id')->references('id')->on('imoveis')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('usuario_id')->unsigned()->comment('Identificador da chave estrangeira do usuario');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');

            $table->string('comentario')->comment('Define o comentario da avaliação');

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
        Schema::dropIfExists('avaliacoes');
    }
}
