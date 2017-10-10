<?php

use Illuminate\Database\Seeder;

class ImoveisSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$imoveis = [
    		[
    			'nome' => 'Mansão',
    			'descricao' => 'Mansão Incrivel',
                'valor' => '987000.00',
                'qtd_dormitorio' => '6',
                'qtd_banheiro' => '4',
                'qtd_cozinha' => '2',
                'qtd_garagem' => '3',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '1',
                'imagem' => 'img/imoveis/imoveil_001.png',
                'imovel_tipo_id' => '2'
            ],
            [
    			'nome' => 'Apartamento Luxo',
    			'descricao' => 'Mansão Incrivel',
                'valor' => '987000.00',
                'qtd_dormitorio' => '6',
                'qtd_banheiro' => '4',
                'qtd_cozinha' => '2',
                'qtd_garagem' => '3',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '1',
                'imagem' => 'img/imoveis/imoveil_002.png',
                'imovel_tipo_id' => '2'
            ],
			[
    			'nome' => 'Mansão',
    			'descricao' => 'Mansão Incrivel',
                'valor' => '987000.00',
                'qtd_dormitorio' => '6',
                'qtd_banheiro' => '4',
                'qtd_cozinha' => '2',
                'qtd_garagem' => '3',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '1',
                'imagem' => 'img/imoveis/imoveil_001.png',
                'imovel_tipo_id' => '2'
            ],
            [
    			'nome' => 'Mansão',
    			'descricao' => 'Mansão Incrivel',
                'valor' => '987000.00',
                'qtd_dormitorio' => '6',
                'qtd_banheiro' => '4',
                'qtd_cozinha' => '2',
                'qtd_garagem' => '3',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '1',
                'imagem' => 'img/imoveis/imoveil_001.png',
                'imovel_tipo_id' => '2'
            ],
            [
    			'nome' => 'Mansão',
    			'descricao' => 'Mansão Incrivel',
                'valor' => '987000.00',
                'qtd_dormitorio' => '6',
                'qtd_banheiro' => '4',
                'qtd_cozinha' => '2',
                'qtd_garagem' => '3',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '1',
                'imagem' => 'img/imoveis/imoveil_001.png',
                'imovel_tipo_id' => '2'
            ],
            [
    			'nome' => 'Mansão',
    			'descricao' => 'Mansão Incrivel',
                'valor' => '987000.00',
                'qtd_dormitorio' => '6',
                'qtd_banheiro' => '4',
                'qtd_cozinha' => '2',
                'qtd_garagem' => '3',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '1',
                'imagem' => 'img/imoveis/imoveil_001.png',
                'imovel_tipo_id' => '2'
            ],
        ];

        DB::table('imoveis_tipos')->insert($imoveis);

                // salva os dados da vinculação do endereco com o imóvel
        for ($i = 1; $i <= 12; $i ++) {
            $enderecosImoveis[] = [
                'imovel_id' => $i,
                'endereco_id' => $i
            ];
        }
    }
}
