<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EstadosSeeds::class);
        $this->call(CidadesSeeds::class);
        $this->call(UsuariosSeeds::class);
        $this->call(EnderecoSeeds::class);
        $this->call(PaginasSeeds::class);
        $this->call(PermissoesSeeds::class);
        $this->call(PerfisSeeds::class);
        $this->call(SlideSeeds::class);
        $this->call(ImoveisTiposSeeds::class);
        //$this->call(ImoveisSeeds::class);
    }
}
