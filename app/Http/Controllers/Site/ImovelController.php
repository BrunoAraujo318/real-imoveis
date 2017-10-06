<?php

namespace RealImoveis\Http\Controllers\Site;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Imovel;
use RealImoveis\Models\Endereco;

class ImovelController extends Controller
{
	/**
	 * Renderiza interface de  detalhamento de imovel
	 *
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
    public function index($id)
    {
    	$imovel = Imovel::find($id);
        $endereco = new Endereco();
    	$galeria = [];

    	if (! empty($imovel->endereco)) {
    		$endereco = $imovel->endereco[0];
    	}

    	if (! empty($imovel->imagens)) {
    		$galeria = $imovel->imagens()->orderBy('ordem')->get();
    	}

    	$direcaoImagem = ['center-align','left-align', 'rigth-align'];

    	$seo = [ 'titulo'=>$imovel->titulo, 'descricao'=>$imovel->descricao, 'imagem'=>asset($imovel->imagem), 'url'=>route('site.imovel', [$imovel->id,str_slug($imovel->ttulo,'_')]) ];

    	return view('site.imovel', compact('imovel','galeria','direcaoImagem','seo', 'endereco'));
    }
}
