<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\ImovelTipo;
use RealImoveis\Models\Imovel;

class TipoController extends Controller
{
    private $tipoModel;
    private $imovelModel;

    /**
     * Inicializa dependencia do controle.
     */
    public function __construct()
    {
        $this->imovelModel = new Imovel();
        $this->tipoModel = new ImovelTipo();
    }

    /**
     * Listagem de tipos.
     */
    public function listaAdm()
    {
       $tipos = $this->tipoModel->all();

       return view('login.principal_adm.tipos_imovel.lista_tipos', compact('tipos'));
    }

    /**
     * Renderiza a interface de tipos.
     */
    public function adicionarAdm()
    {
    	return view('login.principal_adm.tipos_imovel.adicionar_tipos');
    }

    /**
     * Salva os dados do tipo do imovel.
     * 
     * @param  Request $request
     */
    public function salvarAdm(Request $request)
    {
        $dados = $request->all();
        $tipo = new ImovelTipo($dados);
        $tipo->save();

        \Session::flash('mensagem', ['msg'=>'Registro criado com Sucesso!', 'class'=>'green white-text']);

    	return redirect()->route('admin.imovel.tipos');
    }

    /**
     * Renderiza a interface para edição de tipos
     * @param $id
     */
    public function editarAdm($id)
    {
        $tipo = $this->tipoModel->find($id);

        return view('login.principal_adm.tipos_imovel.editar_tipos', compact('tipo'));
    }

    /**
     * Atualiza os dados do tipo do Imovel
     * @param Request $request
     * @param $id
     */
    public function atualizarAdm(Request $request, $id)
    {
        $tipo = $this->tipoModel->find($id);
        $tipo->fill($request->all());
        $tipo->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.imovel.tipos');
    }

    /**
     * Exclui o tipo de Imovel.
     * 
     * @param $id
     */
    public function deletarAdm($id)
    {
        if(Imovel::where('tipo_id','=',$id)->count()){

            $msg = "Não é possível deletar esse Tipo de Imóvel! Esses imóveis (";
            $imoveis = Imovel::where('tipo_id','=',$id)->get();
            foreach ($imoveis as $imovel) {
                $msg.="id:".$imovel->id."";
            }
            $msg .= ") estão relacionados.";

            \Session::flash('mensagem',['msg'=>$msg,'class'=>'red white-text']);
            return redirect()->route('admin.imovel.tipos');
        }

        $this->tipoModel->find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        
        return redirect()->route('admin.imovel.tipos');
    }

}
