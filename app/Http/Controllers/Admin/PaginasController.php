<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Pagina;

class PaginasController extends Controller
{
    private $paginaModel;

    /**
     * Inicializas as dependencias da classe.
     */
    public function __construct()
    {
        $this->paginaModel = new Pagina();
    }

    /**
     * Renderiza a interface de paginas.
     */
    public function index(){
    	$paginas = $this->paginaModel->all();

    	return view('login.principal_adm.paginas.index', compact('paginas'));
    }

    /**
     * Renderiza a interface de edição.
     *
     * @param  integer $id
     */
    public function editar($id)
    {
    	$pagina = $this->paginaModel->find($id);

    	return view('login.principal_adm.paginas.editar', compact('pagina'));
    }

    public function atualizar(Request $request, $id){
        $dados = $request-> all();

        $pagina = $this->paginaModel->find($id);
        $pagina->titulo = trim($dados['titulo']);
        $pagina->descricao = trim($dados['descricao']);
        $pagina->texto = trim($dados['texto']);

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
