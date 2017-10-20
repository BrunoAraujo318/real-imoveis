<?php

use Illuminate\Database\Seeder;

class ContratoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contratos')->insert([
            [
                'titulo' => '',
                'descricao' => '',
                'url' => '',
            ],
            [
                'titulo' => '',
                'descricao' => '',
                'url' => '',
            ],
                        [
                'titulo' => '',
                'descricao' => '',
                'url' => '',
            ]
        ]);
    }
}
