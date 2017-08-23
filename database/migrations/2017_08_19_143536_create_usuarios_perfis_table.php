<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosPerfisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_perfis', function (Blueprint $table) {
            $table->integer('usuario_id')->unsigned()->comment('Identificador da chave estrangeira do usuário');
            $table->integer('perfil_id')->unsigned()->comment('Identificador da chave estrangeira do perfil');

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('perfil_id')->references('id')->on('perfis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_perfis');
    }
}
