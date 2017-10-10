<?php

use Illuminate\Database\Seeder;

class EnderecoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {

        $enderecos = [];
        $enderecosUsuarios = [];
        $enderecosImoveis = [];

        for ($i = 1; $i <= 7; $i ++) {
            $enderecos[] = [
                'cidade_id' => 898,
                'logradouro' => 'Rua RA 4',
                'complemento' => "QD 13 LT 49",
                'cep' => '750.714-10',
                'bairro' => 'Residencia Araguaia',
                'longitude' => '0',
                'latitude' => '0',
            ];
        }

        DB::table('enderecos')->insert($enderecos);

        // salva os dados da vinculação do endereco com o usuario
        for ($i = 1; $i <= 6; $i ++) {
            $enderecosUsuarios[] = [
                'usuario_id' => $i,
                'endereco_id' => $i
            ];
        }

        DB::table('usuarios_enderecos')->insert($enderecosUsuarios);
    }
}
