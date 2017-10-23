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
                'titulo' => 'Título1',
                'descricao' => 'Descrição1',
                'url' => 'Contrato1.docx',
            ],
            [
                'titulo' => 'Título2',
                'descricao' => 'Descrição2',
                'url' => 'Contrato2.docx',
            ],
                        [
                'titulo' => 'Título3',
                'descricao' => 'Descrição3',
                'url' => 'Contrato3.docx',
            ]
        ]);
    }
}
