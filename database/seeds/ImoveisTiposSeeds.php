<?php

use Illuminate\Database\Seeder;

class ImoveisTiposSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::table('imoveis_tipos')->insert([
            ['nome' => 'Duplex'],
            ['nome' => 'Apartamento'],
            ['nome' => 'Alvenaria']
        ]); 
    }
}
