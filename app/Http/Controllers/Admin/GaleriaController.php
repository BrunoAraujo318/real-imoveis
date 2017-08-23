<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Imovel;
use RealImoveis\Galeria;

class GaleriaController extends Controller
{
    public function listaAdm($id){
       $imovel = Imovel::find($id);
       $registros = $imovel->galeria()->orderBy('ordem')->get();
       return view('login.principal_adm.galeria.lista_galeria', compact('registros','imovel'));
    }

    public function listaUser($id){
       $imovel = Imovel::find($id);
       $registros = $imovel->galeria()->orderBy('ordem')->get();
       return view('login.principal_usuario.galeria.lista_galeria', compact('registros','imovel'));
    }

    public function adicionarAdm($id){
    	$imovel = Imovel::find($id);
    	return view('login.principal_adm.galeria.adicionar_galeria', compact('imovel'));
    }

    public function adicionarUser($id){
    	$imovel = Imovel::find($id);
        return view('login.principal_usuario.galeria.adicionar_galeria', compact('tipos', 'cidades'));
    }

    public function salvarAdm(Request $request, $id){
        $imovel = Imovel::find($id);
        $dados = $request->all();
        if($imovel->galeria()->count()){
        	$galeria = $imovel->galeria()->orderBy('ordem','desc')->first();
        	$ordemAtual = $galeria->ordem;
        } else{
        	$ordemAtual = 0;
        }
        if($request->hasFile('imagens')){
        	$arquivos = $request->file('imagens');
        	foreach($arquivos as $imagem){
        		$registro = new Galeria();
        		$rand = rand(11111,99999);
            	$diretorio = "img/imoveis/".str_slug($imovel->titulo,'_')."/";
            	$ext = $imagem->guessClientExtension();
            	$nomeArquivo = "_img_".$rand.".".$ext;
            	$imagem->move($diretorio, $nomeArquivo);
            	$registro->imovel_id = $imovel->id;
            	$registro->ordem = $ordemAtual + 1;
            	$ordemAtual++;
            	$registro->imagem = $diretorio.'/'.$nomeArquivo;
            	$registro->save();
        	}
        }
        \Session::flash('mensagem', ['msg'=>'Imagem adicionada com Sucesso!', 'class'=>'green white-text']);
    	return redirect()->route('admin.galeria', $imovel->id);
    }

    public function salvarUser(Request $request, $id){
        $imovel = Imovel::find($id);
        $dados = $request->all();
        if($imovel->galeria()->count()){
        	$galeria = $imovel->galeria()->orderBy('ordem','desc')->first();
        	$ordemAtual = $galeria->ordem;
        } else{
        	$ordemAtual = 0;
        }
        if($request->hasFile('imagens')){
        	$arquivos = $request->file('imagens');
        	foreach($arquivos as $imagem){
        		$registro = new Galeria();
        		$rand = rand(11111,99999);
            	$diretorio = "img/imoveis/".str_slug($imovel->titulo,'_')."/";
            	$ext = $imagem->guessClientExtension();
            	$nomeArquivo = "_img_".$rand.".".$ext;
            	$imagem->move($diretorio, $nomeArquivo);
            	$registro->imovel_id = $imovel->id;
            	$registro->ordem = $ordemAtual + 1;
            	$ordemAtual++;
            	$registro->imagem = $diretorio.'/'.$nomeArquivo;
            	$registro->save();
        	} 
        }
        \Session::flash('mensagem', ['msg'=>'Imagem adicionada com Sucesso!', 'class'=>'green white-text']);
    	return redirect()->route('principal.galeria', $imovel->id);
    }

    public function editarAdm($id){
        $registro = Galeria::find($id);
        $imovel = $registro->imovel;
        return view('login.principal_adm.galeria.editar_galeria', compact('registro','imovel'));
    }

    public function editarUser($id){
        $registro = Galeria::find($id);
        $imovel = $registro->imovel;
        return view('login.principal_usuario.galeria.editar_galeria', compact('registro','imovel'));    
    }

    public function atualizarAdm(Request $request, $id){
        $registro = Galeria::find($id);
        $dados = $request->all();
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->ordem = $dados['ordem'];
        $imovel = $registro->imovel;
        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/imoveis/".str_slug($imovel->titulo,'_')."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $registro ->update();
        \Session::flash('mensagem',['msg'=>'Imagem atualizada com Sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.galeria', $imovel->id);
    }

    public function atualizarUser(Request $request, $id){
        $registro = Galeria::find($id);
        $dados = $request->all();
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->ordem = $dados['ordem'];
        $imovel = $registro->imovel;
        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/imoveis/".str_slug($imovel->titulo,'_')."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $registro ->update();
        \Session::flash('mensagem',['msg'=>'Imagem atualizada com Sucesso!','class'=>'green white-text']);
        return redirect()->route('principal.galeria', $imovel->id);
    }

    public function deletarAdm($id){
        $galeria = Galeria::find($id);
        $imovel = $galeria->imovel;
        $galeria->delete();
        \Session::flash('mensagem',['msg'=>'Imagem deletada com Sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.galeria', $imovel->id);
    }

    public function deletarUser($id){
        $galeria = Galeria::find($id);
        $imovel = $galeria->imovel;
        $galeria->delete();
        \Session::flash('mensagem',['msg'=>'Imagem deletada com Sucesso!','class'=>'green white-text']);
        return redirect()->route('principal.galeria', $imovel->id);
    }
}
