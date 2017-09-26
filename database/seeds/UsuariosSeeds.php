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
                'nascimento' => '1994-07-14',
                'password' => bcrypt(123456)
            ],
            [
                'nome' => 'Karina Hellen',
                'email' => 'karinahellen@live.com',
                'cpf' => "222.222.222-22",
                'nascimento' => '1995-09-03',
                'password' => bcrypt(123456)
            ],
            [
                'nome' => 'Bruno Araújo',
                'email' => 'bruno_brito318@hotmail.com',
                'cpf' => "333.333.333-33",
                'nascimento' => '1994-11-08',
                'password' => bcrypt(123456)
            ],
            [
                'nome' => 'Elson Bento',
                'email' => 'elson314@gmail.com',
                'cpf' => "444.444.444-44",
                'nascimento' => '1976-05-09',
                'password' => bcrypt(123456)
            ],
            [
                'nome' => 'Sávio Figueiredo',
                'email' => 'saviofg1@hotmail.com',
                'cpf' => "555.555.555-55",
                'nascimento' => '1994-08-29',
                'password' => bcrypt(123456)
            ],
            [
                'nome' => 'Jose Figueiredo',
                'email' => 'jose@hotmail.com',
                'cpf' => "555.555.555-55",
                'nascimento' => '1994-08-29',
                'password' => bcrypt(123456)
            ]
        ]);
    }
}
