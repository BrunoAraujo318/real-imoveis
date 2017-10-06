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
                'titulo' => 'Real Imóveis',
                'descricao' => 'Ajudando a aproximar clientes',
                'imagem' => 'img/modelo_detalhe_1.jpg',
                'tipo' => 'Sobre',
                'texto' => 'texto'
            ],
            [
                'titulo' => 'Real Imóveis',
                'descricao' => 'Fale Conosco',
                'imagem' => 'img/modelo_detalhe_1.jpg',
                'tipo' => 'Contato',
                'texto' => ''
            ]
        ]);
    }
}
