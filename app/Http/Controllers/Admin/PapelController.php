<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Perfis;
use RealImoveis\Models\Permissao;

class PapelController extends Controller
{
    private $perfilModel;
    private $permissaoModel;

    /**
     * Inicializas as dependencias da classe.
     */
    public function __construct()
    {
        $this->perfilModel = new Perfis();
        $this->permissaoModel = new Permissao();
    }

    /**
     * Listagem de perfil.
     * 
     * @return view
     */
    public function listaAdm()
    {
    	$papeis = $this->perfilModel->all();

    	return view('login.principal_adm.papel.lista_papeis', compact('papeis'));
    }

    /**
     * Renderiza a interface de papeis.
     */
    public function adicionarAdm()
    {
    	return view('login.principal_adm.papel.adicionar_papeis');
    }

    /**
     * Salva um novo papel.
     * 
     * @param  Request $request
     */
    public function salvarAdm(Request $request)
    {
    	$this->perfilModel->create($request->all());

    	return redirect()->route('admin.papel');
    }

    /**
     * Renderiza a interface, de edição de papel.
     * 
     * @param $id
     */
    public function editarAdm($id)
    {
    	$papeis = $this->perfilModel->find($id);

    	return view('login.principal_adm.papel.editar_papeis', compact('papeis'));
    }

    public function atualizarAdm(Request $request, $id)
    {
    	if ($this->perfilModel->find($id)->nome == "admin") {
    		return redirect()->route('admin.papel');
    	}

    	$this->perfilModel->find($id)->update($request->all());

    	return redirect()->route('admin.papel');
    }

    /**
     * Remove um papel.
     * 
     * @param $id
     */
    public function deletarAdm($id)
    {
        $this->perfilModel->destroy($id);

    	return redirect()->route('admin.papel');
    }

    public function permissao($id){
        if(!auth()->user()->can('papel_editar')){            
            return redirect()->route('admin.principal');
        }
        $papel = Papel::find($id);
        $permissao = Permissao::all();
        return view('login.principal_adm.papel.permissao', compact('papel','permissao'));
    }

    public function salvarPermissao(Request $request, $id){
        if(!auth()->user()->can('papel_editar')){            
            return redirect()->route('admin.principal');
        }
        $papel = Papel::find($id);
        $permissao = Permissao::find($request['bloqueio_id']);
        $papel->adicionarPermissao($permissao);
        return redirect()->back();
    }

    /**
     * Excluir papel.
     * 
     * @param $id
     * @param $id_permissao
     */
    public function removerPermissao($id, $id_permissao)
    {
        $papel = $this->perfilModel->find($id);

        return redirect()->back();
    }
}
