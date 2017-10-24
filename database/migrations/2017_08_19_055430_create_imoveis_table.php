<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->comment('Nome do imovel');
            $table->string('descricao')->comment('Descricao do imovel, informacões referentes ao mesmo');
            $table->decimal('valor', 12, 2)->comment('Valor monetário referente ao servico');
            $table->integer('qtd_dormitorio')->comment('Numero de quartos dispostos pelo imóvel');
            $table->integer('qtd_banheiro')->comment('Numero de banheiros dispostos pelo imóvel');
            $table->integer('qtd_cozinha')->comment('Numero de cozinhas dispostas pelo imóvel');
            $table->integer('qtd_garagem')->comment('Numero de garagens dispostos pelo imóvel');
            $table->integer('qtd_visualicoes')->comment('Numero de Visualições recebidas pelo anuncio');
            $table->string('url_video')->comment('Local onde sera inserida a url de um video do youtube')->nullable();;
            $table->integer('categoria_servico')->comment('Categoria do serviço prestado pelo anunciante(Compra\Venda\aluguel etc...)');
            $table->string('imagem')->comment('Imagem principal do imovel');

            $table->integer('usuario_id')->unsigned()->comment('Identificador da chave estrangeira do tipo do usuario');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('contrato_id')->unsigned()->comment('Identificador da chave estrangeira do tipo do contrato');
            $table->foreign('contrato_id')->references('id')->on('contratos')->onUpdate('cascade')->onDelete('cascade')->nullable();;

            $table->integer('imovel_tipo_id')->unsigned()->comment('Identificador da chave estrangeira do tipo do imovel');
            $table->foreign('imovel_tipo_id')->references('id')->on('imoveis_tipos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('imoveis');
    }
}