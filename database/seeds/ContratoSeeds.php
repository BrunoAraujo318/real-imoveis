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
                'titulo' => 'Contrato de Mansão',
                'descricao' => 'Contrato detalhado de mansão',
                'url' => 'Contrato1.docx',
            ],
            [
                'titulo' => 'Contrato de condominios',
                'descricao' => 'Contrato detalhado de condominios',
                'url' => 'Contrato2.docx',
            ],
                        [
                'titulo' => 'Contrato de apartamento',
                'descricao' => 'Contrato de apartamentos',
                'url' => 'Contrato3.docx',
            ]
        ]);
    }
}
