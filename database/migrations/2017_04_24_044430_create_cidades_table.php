<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->comment('Nome da cidade');
            $table->integer('estado_id')->unsigned()->comment('Identificador da chave estrangeira do Estado');
            $table->foreign('estado_id')->references('id')->on('estados')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // delete foreign key state
        Schema::table('cidades', function (Blueprint $table) {
            $table->dropForeign('cidades_estado_id_foreign');
        });

        Schema::dropIfExists('cidades');
    }
}
