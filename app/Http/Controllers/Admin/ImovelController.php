<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Imovel;
use RealImoveis\Models\ImovelTipo;
use RealImoveis\Models\Cidade;

class ImovelController extends Controller
{
     public function lista(){
       $registros = Imovel::all();
       return view('login.principal_adm.imoveis.lista_imoveis', compact('registros'));
    }

    public function adicionar(){
    	$tipos = ImovelTipo::all();
    	$cidades = Cidade::all();
        $registros = Imovel::all();
    	return view('login.principal_adm.imoveis.adicionar_imoveis', compact('tipos', 'cidades', 'registros'));
    }


    public function salvar(Request $request){
        $dados = $request->all();
        $registro = new Imovel();
        $registro->nome = $dados['nome'];
        $registro->descricao = $dados['descricao'];
        $registro->categoria_servico = $dados['categoria_servico'];
        $registro->qtd_dormitorio = $dados['qtd_dormitorio'];
        $registro->valor = $dados['valor'];
        $registro->qtd_visualicoes = 0;
        $registro->url_video = $dados['url_video'];
        $registro->endereco_id = $dados['endereco_id'];
        $registro->visualizacoes = 0;
        $registro->cidade_id = $dados['cidade_id'];
        $registro->tipo_id = $dados['tipo_id'];
        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/imoveis/".str_slug($dados['titulo'],'_')."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $registro->save();
        \Session::flash('mensagem', ['msg'=>'Registro criado com Sucesso!', 'class'=>'green white-text']);
    	return redirect()->route('admin.imoveis');
    }

    public function editar($id){
        $registro = Imovel::find($id);
        $tipos = ImovelTipo::all();
    	$cidades = Cidade::all();
        return view('login.principal_adm.imoveis.editar_imoveis', compact('registro', 'tipos', 'cidades'));
    }

    public function atualizar(Request $request, $id){
        $registro = Imovel::find($id);
        $dados = $request->all();
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->condominio = $dados['condominio'];
        $registro->endereco = $dados['endereco'];
        $registro->cep = $dados['cep'];
        $registro->valor = $dados['valor'];
        $registro->dormitorios = $dados['dormitorios'];
        $registro->detalhes = $dados['detalhes'];
        $registro->publicar = $dados['publicar'];
        if(isset($dados['mapa']) && trim($dados['mapa']) != ""){
        	$registro->mapa = trim($dados['mapa']);
        }else {
        	$registro->mapa = null;
        }
        $registro->cidade_id = $dados['cidade_id'];
        $registro->tipo_id = $dados['tipo_id'];
        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/imoveis/".str_slug($dados['titulo'],'_')."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $registro ->update();
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.imoveis');
    }

    public function deletar($id){
        Imovel::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.imoveis');
    }
}