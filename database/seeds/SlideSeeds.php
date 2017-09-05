<?php

use Illuminate\Database\Seeder;

class SlideSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed of perfis
        DB::table('slides')->insert([
            [
            	'nome' => null,
            	'descricao' => null,
            	'imagem' => 'img/banner1.jpg',
            	'ordem' => 1,
            	'created_at' => '2017-09-05',
            	'updated_at' => '2017-09-05'
            ],
            [
            	'nome' => null,
            	'descricao' => null,
            	'imagem' => 'img/banner2.jpg',
            	'ordem' => 2,
            	'created_at' => '2017-09-05',
            	'updated_at' => '2017-09-05'
            ],
			[
				'nome' => null,
				'descricao' => null,
				'imagem' => 'img/banner3.jpg',
				'ordem' => 3,
				'created_at' => '2017-09-05',
				'updated_at' => '2017-09-05'
            ],
        ]);
    }
}
