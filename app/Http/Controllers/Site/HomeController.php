<?php

namespace RealImoveis\Http\Controllers\Site;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Imovel;
use RealImoveis\Models\Slide;
use RealImoveis\Models\ImovelTipo;
use RealImoveis\Models\Cidade;
use RealImoveis\Models\Estado;

class HomeController extends Controller
{
    /**
     * Renderizar a interface da home.
     *
     * @return view
     */
    public function index()
    {
    	$imoveis = Imovel::orderBy('id','desc')->paginate(4);
    	$slides = Slide::orderBy('ordem')->get();
    	$direcaoImagem = ['center-align', 'left-align', 'rigth-align'];
    	$paginacao = true;
    	$tipos = ImovelTipo::orderBy('nome')->get();
        $cidades = [];
    	$estados = Estado::orderBy('nome')->get();

        return view('site.home', compact(
            'imoveis',
            'slides',
            'direcaoImagem',
            'paginacao',
            'tipos',
            'cidades',
            'estados'
        ));
    }

    /**
     * Consulta os dados do Imoveis.
     *
     * @param  Request $request
     * @return view
     */
    public function busca(Request $request)
    {
    	$filtro = $request->all();
        $tipos = ImovelTipo::orderBy('nome')->get();
    	$estados = Estado::orderBy('nome')->get();
    	$cidades = Cidade::orderBy('nome')->get();
    	$imoveis = Imovel::orderBy('id', 'desc')->get();
        $paginacao = null;

        return view('site.busca', compact(
            'busca',
            'imoveis',
            'paginacao',
            'tipos',
            'cidades',
            'estados'
        ));
    }
}
