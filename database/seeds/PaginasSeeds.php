<?php

use Illuminate\Database\Seeder; 

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paginas')->insert([
            [
                'titulo' => 'O Imóvel',
                'descricao' => 'Descrição sobre o imóvel',
                'imagem' => 'img/modelo_detalhe_1.jpg',
                'email' => 'bruno_brito318@hotmail.com',
                'mapa' => "mapa",
                'tipo' => 'sobre'
            ],
            [
                'titulo' => 'Real Imóveis',
                'descricao' => 'Descrição',
                'email' => 'bruno_brito318@hotmail.com',
                'imagem' => 'img/modelo_detalhe_1.jpg',
                'mapa' => "mapa",
                'tipo' => 'contato'
            ]
        ]);
    }
}
