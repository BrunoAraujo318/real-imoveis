<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('nome')->comment('Nome completo');
            $table->string('email')->unique()->comment('define o e-mail');
            $table->string('cpf')->comment('define o CPF');
            $table->date('nascimento')->comment('Data de nascimento');
<<<<<<< HEAD
            $table->string('endereco')->comment('Endereço do Usuário'); // Alteração
            $table->string('contatoz')->comment('Contato do Usuário'); // Alteração
=======
>>>>>>> 8f49d79de50feccab82ad613761ee2a397af6cdf
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}
