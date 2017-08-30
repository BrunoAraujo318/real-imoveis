<?php

use Illuminate\Database\Seeder;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        
        DB::table('usuarios')->insert([
            [
                'nome' => 'Allan Turing',
                'email' => 'allangcruz@gmail.com',
                'cpf' => "111.111.111-11",
                'nascimento' => '14/07/1994',
                'password' => bcrypt(123456)
            ],
            [
                'nome' => 'Karina Hellen',
                'email' => 'Karina_admin@mail.com',
                'cpf' => "222.222.222-22",
                'nascimento' => '03/09/1995',
                'password' => bcrypt(123456)
            ],
            [
                'nome' => 'Bruno Araújo',
                'email' => 'bruno_admin@mail.com',
                'cpf' => "333.333.333-33",
                'nascimento' => '08/11/1994',
                'password' => bcrypt(123456)
            ]
        ]); 
    }
}
