<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Pagina::where('tipo', '=','sobre')->count();
        if($existe){
            $paginaSobre = Pagina::where('tipo', '=','sobre')->first();
        } else{
            $paginaSobre = new Pagina();
        }

        $paginaSobre->titulo = "O Imóvel";
        $paginaSobre->descricao = "Descrição sobre o imóvel";
        $paginaSobre->imagem = "img/modelo_detalhe_1.jpg";
        $paginaSobre->mapa = "mapa";
        $paginaSobre->tipo = "sobre";
        $paginaSobre->save();

        $existe = Pagina::where('tipo', '=','contato')->count();
        if($existe){
            $paginaContato = Pagina::where('tipo', '=','contato')->first();
        } else{
            $paginaContato = new Pagina();
        }

        $paginaContato->titulo = "Real Imóveis";
        $paginaContato->descricao = "Descrição";
        $paginaContato->imagem = "img/modelo_detalhe_1.jpg";
        $paginaContato->email = "bruno_brito318@hotmail.com";
        $paginaContato->tipo = "contato";
        $paginaContato->save();
    }
}
