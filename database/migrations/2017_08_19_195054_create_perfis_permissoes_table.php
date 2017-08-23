<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfisPermissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfis_permissoes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('perfil_id')->unsigned()->comment('Identificador da chave estrangeira do perfil');
            $table->foreign('perfil_id')->references('id')->on('perfis')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('permissao_id')->unsigned()->comment('Identificador da chave estrangeira do permissão');
            $table->foreign('permissao_id')->references('id')->on('permissoes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfis_permissoes');
    }
}
