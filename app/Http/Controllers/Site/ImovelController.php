<?php

namespace RealImoveis\Http\Controllers\Site;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Imovel;

class ImovelController extends Controller
{
    public function index($id){
    	$imovel = Imovel::find($id);
    	$galeria = $imovel->galeria()->orderBy('ordem')->get();
    	$direcaoImagem = ['center-align','left-align', 'rigth-align'];
    	$seo = [ 'titulo'=>$imovel->titulo, 'descricao'=>$imovel->descricao, 'imagem'=>asset($imovel->imagem), 'url'=>route('site.imovel', [$imovel->id,str_slug($imovel->ttulo,'_')]) ];
    	return view('site.imovel', compact('imovel','galeria','direcaoImagem','seo'));
    }
}
