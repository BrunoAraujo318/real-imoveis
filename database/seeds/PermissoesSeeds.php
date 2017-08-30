<?php

use Illuminate\Database\Seeder;

class PermissoesSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed of permissions
        DB::table('permissoes')->insert([
            // permissions of users
            [
                'id' => 1,
                'name' => 'user.index',
                'display_name' => 'Gerenciar Index',
                'description' => 'Definir a descrição ...',
            ],
            [
                'id' => 2,
                'name' => 'user.view',
                'display_name' => 'Visualizar Usuário',
                'description' => 'Definir a descrição ...',
            ],
            [
                'id' => 3,
                'name' => 'user.create',
                'display_name' => 'Adicionar Usuário',
                'description' => 'Definir a descrição ...',
            ],
            [
                'id' => 4,
                'name' => 'user.update',
                'display_name' => 'Atualizar Usuário',
                'description' => 'Definir a descrição ...',
            ],
            [
                'id' => 5,
                'name' => 'user.delete',
                'display_name' => 'Excluir Usuário',
                'description' => 'Definir a descrição ...',
            ],
        ]);
    }
}
