<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImoveisEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis_enderecos', function (Blueprint $table) {

            $table->integer('imovel_id')->unsigned()->comment('Identificador da chave estrangeira do imóvel');
            $table->foreign('imovel_id')->references('id')->on('imoveis')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('endereco_id')->unsigned()->comment('Identificador da chave estrangeira do endereço');
            $table->foreign('endereco_id')->references('id')->on('enderecos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imoveis_enderecos');
    }
}
