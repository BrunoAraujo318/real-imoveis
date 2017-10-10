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
    			'nome' => 'Mansão Turing',
    			'descricao' => 'Terreno de 400m², próximo à praia',
                'valor' => '1268000.00',
                'qtd_dormitorio' => '6',
                'qtd_banheiro' => '4',
                'qtd_cozinha' => '2',
                'qtd_garagem' => '3',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '1',
                'imagem' => 'img/modelo_detalhe_4.jpg',
                'imovel_tipo_id' => '1'
            ],
            [
    			'nome' => 'Apartamento Luxo',
    			'descricao' => 'Cobertura de 250m², condomínio fechado',
                'valor' => '987000.00',
                'qtd_dormitorio' => '4',
                'qtd_banheiro' => '3',
                'qtd_cozinha' => '1',
                'qtd_garagem' => '2',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '1',
                'imagem' => 'img/imgtipo1.jpg',
                'imovel_tipo_id' => '2'
            ],
            [
                'nome' => 'Jardim Flor de Liz',
                'descricao' => 'Apartamento simples',
                'valor' => '900.00',
                'qtd_dormitorio' => '2',
                'qtd_banheiro' => '1',
                'qtd_cozinha' => '1',
                'qtd_garagem' => '1',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '2',
                'imagem' => 'img/Casa05/figura01.JPG',
                'imovel_tipo_id' => '2'
            ],
			[
    			'nome' => 'Jardim dos Ipês',
    			'descricao' => 'Casa 150m²',
                'valor' => '175000.00',
                'qtd_dormitorio' => '3',
                'qtd_banheiro' => '1',
                'qtd_cozinha' => '1',
                'qtd_garagem' => '1',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '1',
                'imagem' => 'img/Casa01/figura1.JPG',
                'imovel_tipo_id' => '3'
            ],
            [
    			'nome' => 'Setor Summerville',
    			'descricao' => 'Casa próxima ao centro',
                'valor' => '392000.00',
                'qtd_dormitorio' => '4',
                'qtd_banheiro' => '2',
                'qtd_cozinha' => '1',
                'qtd_garagem' => '3',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '1',
                'imagem' => 'img/Casa10/figura01.JPG',
                'imovel_tipo_id' => '1'
            ],
            [
    			'nome' => 'Bairro Batista',
    			'descricao' => 'Casarão com espaçõ 315m² com psicina',
                'valor' => '950000.00',
                'qtd_dormitorio' => '6',
                'qtd_banheiro' => '3',
                'qtd_cozinha' => '1',
                'qtd_garagem' => '3',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '1',
                'imagem' => 'img/Casa07/figura01.JPG',
                'imovel_tipo_id' => '1'
            ],
            [
                'nome' => 'Jundiaí Industrial',
                'descricao' => 'Mansão Incrivel',
                'valor' => '1800.00',
                'qtd_dormitorio' => '4',
                'qtd_banheiro' => '2',
                'qtd_cozinha' => '1',
                'qtd_garagem' => '2',
                'qtd_visualicoes' => '0',
                'categoria_servico' => '2',
                'imagem' => 'img/Casa06/figura01.JPG',
                'imovel_tipo_id' => '3'
            ],
        ];

        DB::table('imoveis')->insert($imoveis);

                // salva os dados da vinculação do endereco com o imóvel
        for ($i = 1; $i <= 7; $i ++) {
            $enderecosImoveis[] = [
                'imovel_id' => $i,
                'endereco_id' => $i
            ];
        }
    }
}
