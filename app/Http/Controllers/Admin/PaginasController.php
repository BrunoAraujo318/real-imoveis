<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagina;

class PaginasController extends Controller
{
    public function index(){
    	$paginas = Pagina::all();
    	return view('login.principal_adm.paginas.index', compact('paginas'));
    }

    public function editar($id){
    	$pagina = Pagina::find($id);
    	return view('login.principal_adm.paginas.editar', compact('pagina'));
    }

    public function atualizar(Request $request, $id){
        $dados = $request-> all();
        $pagina = Pagina::find($id);
        $pagina->titulo = trim($dados['titulo']);
        $pagina->titulo = trim($dados['descricao']);
        if(isset($dados['email'])){
            $pagina->email = trim($dados['email']);
        }
        if(isset($dados['mapa']) && trim($dados['mapa']) != ''){
            $pagina->mapa = trim($dados['mapa']);
        } else{
            $pagina->mapa = null;
        }

        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/paginas/".$id."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $pagina->imagem = $diretorio.'/'.$nomeArquivo;
        }

        $pagina->update();

        \Session::flash('mensagem', ['msg'=>'Registro atualizado com Sucesso!', 'class'=>'green white-text']);

        return redirect()->route('admin.paginas');
    }
}
