<?php

namespace RealImoveis\Http\Controllers\Site;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Imovel;
use RealImoveis\Models\Slide;
use RealImoveis\Models\Tipo;
use RealImoveis\Models\Cidade;

class HomeController extends Controller
{
    public function index(){
    	$imoveis = Imovel::where('publicar','=','sim')->orderBy('id','desc')->paginate(1);
    	$slides = Slide::where('publicado','=','sim')->orderBy('ordem')->get();
    	$direcaoImagem = ['center-align','left-align', 'rigth-align'];
    	$paginacao = true;
    	$tipos = Tipo::orderBy('titulo')->get();
    	$cidades = Cidade::orderBy('nome')->get();
    	return view('site.home', compact('imoveis', 'slides','direcaoImagem','paginacao','tipos','cidades'));
    }

    public function busca(Request $request){
    	$busca = $request->all();
    	$paginacao = false;
    	$tipos = Tipo::orderBy('titulo')->get();
    	$cidades = Cidade::orderBy('nome')->get();
    	if($busca['condominio'] == 'todos'){
    		$testeCondominio = [
    			['condominio','<>',null]
    		];
    	}else{
    		$testeCondominio = [
    			['condominio','=',$busca['condominio']]
    		];
    	}
    	if($busca['tipo_id'] == 'todos'){
    		$testeTipo = [
    			['tipo_id','<>',null]
    		];
    	}else{
    		$testeTipo = [
    			['tipo_id','=',$busca['tipo_id']]
    		];
    	}
    	if($busca['cidade_id'] == 'todas'){
    		$testeCidade = [
    			['cidade_id','<>',null]
    		];
    	}else{
    		$testeCidade = [
    			['cidade_id','=',$busca['cidade_id']]
    		];
    	}
    	$testeDormitorios = [
    		['dormitorios','>=','0'],
    		['dormitorios','=','1'],
    		['dormitorios','=','2'],
    		['dormitorios','=','3'],
    		['dormitorios','>','3']
    	];
    	$numDormitorios = $busca['dormitorios'];
    	$testeValor = [
    		[['valor','>=','0']],
    		[['valor','<=','500']],
    		[['valor','>','500'],['valor','<=','1000']],
    		[['valor','>','1000'],['valor','<=','1500']],
    		[['valor','>','1500'],['valor','<=','2000']],
    		[['valor','>','2000']]
    		
    	];
    	$numValor = $busca['valor'];
    	if($busca['bairro'] != ''){
    		$testeBairro = [
    			['endereco','like','%'.$busca['bairro'].'%']
    		];
    	}else {
    		$testeBairro = [
    			['endereco','<>',null]
    		];
    	}
    	$imoveis = Imovel::where('publicar','=','sim')->where($testeCondominio)->where($testeTipo)->where($testeCidade)->where([$testeDormitorios[$numDormitorios]])->where($testeValor[$numValor])->where($testeBairro)->orderBy('id','desc')->get();
    	return view('site.busca', compact('busca','imoveis','paginacao','tipos','cidades'));
    }
}
