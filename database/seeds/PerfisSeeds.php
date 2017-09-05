<?php

use Illuminate\Database\Seeder;

class PerfisSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed of perfis
        DB::table('perfis')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrador',
                'description' => 'Perfil de administrador',
            ],
            [
                'id' => 2,
                'name' => 'usuario',
                'display_name' => 'Usuario',
                'description' => 'Perfil do Usuario que aloca e compra imoveis.',
            ],
        ]);


        DB::table('usuarios_perfis')->insert([
            [
                'usuario_id' => 1,
                'perfil_id' => 1
            ],
            [
                'usuario_id' => 2,
                'perfil_id' => 1
            ],
            [
                'usuario_id' => 3,
                'perfil_id' => 1
            ],
            [
                'usuario_id' => 4,
                'perfil_id' => 1
            ],
            [
                'usuario_id' => 5,
                'perfil_id' => 1
            ],
        ]);
    }
}
