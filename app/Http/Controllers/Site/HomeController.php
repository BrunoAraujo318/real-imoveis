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
     * Inicializa dependencia do controller.
     */
    public function __construct()
    {
        $this->imovelModel = new Imovel();
    }

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
        $imovelModel = new Imovel();
        $filtro = [];

        return view('site.home', compact(
            'imoveis',
            'slides',
            'direcaoImagem',
            'paginacao',
            'imovelModel',
            'tipos',
            'cidades',
            'estados',
            'filtro'
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
        $cidades = [];

        $imoveis = $this->imovelModel->getImoveisFiltro((object) $filtro);
        $imovelModel = new Imovel();
        $paginacao = null;

        return view('site.busca', compact(
            'busca',
            'imoveis',
            'imovelModel',
            'paginacao',
            'tipos',
            'cidades',
            'estados',
            'filtro'
        ));
    }
}
