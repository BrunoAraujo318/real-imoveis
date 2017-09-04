<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Slide;

class SlideController extends Controller
{
    public function listaAdm(){
       $registros = Slide::orderBy('ordem')->get();
       return view('login.principal_adm.slides.lista_slides', compact('registros'));
    }

    public function adicionarAdm(){
    	return view('login.principal_adm.slides.adicionar_slides');
    }

    public function salvarAdm(Request $request){
        if(Slide::count()){
        	$slides = Slide::orderBy('ordem','desc')->first();
        	$ordemAtual = $slides->ordem;
        } else{
        	$ordemAtual = 0;
        }
        if($request->hasFile('imagens')){
        	$arquivos = $request->file('imagens');
        	foreach($arquivos as $imagem){
        		$registro = new Slide();
        		$rand = rand(11111,99999);
            	$diretorio = "img/slides/";
            	$ext = $imagem->guessClientExtension();
            	$nomeArquivo = "_img_".$rand.".".$ext;
            	$imagem->move($diretorio, $nomeArquivo);
            	$registro->ordem = $ordemAtual + 1;
            	$ordemAtual++;
            	$registro->imagem = $diretorio.'/'.$nomeArquivo;
            	$registro->save();
        	}
        }
        \Session::flash('mensagem', ['msg'=>'Registro criado com Sucesso!', 'class'=>'green white-text']);
    	return redirect()->route('admin.slides');
    }

    public function editarAdm($id){
        $registro = Slide::find($id);
        return view('login.principal_adm.slides.editar_slides', compact('registro'));
    }

    public function atualizarAdm(Request $request, $id){
        $registro = Slide::find($id);
        $dados = $request->all();
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->link = $dados['link'];
        $registro->ordem = $dados['ordem'];
        $registro->publicado = $dados['publicado'];
        $imovel = $registro->imovel;
        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/slides/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $registro ->update();
        \Session::flash('mensagem',['msg'=>'Registro atualizado com Sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.slides');
    }

    public function deletarAdm($id){
        $slide = Slide::find($id);
        $slide->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com Sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.slides');
    }

}
