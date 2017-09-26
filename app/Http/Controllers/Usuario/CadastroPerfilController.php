<?php

namespace RealImoveis\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Usuario;
use RealImoveis\Http\Requests\CadastroUsuarioRequest;
use \Carbon\Carbon;

/**
 * Classe de cadastro de usuario externo.
 */
class CadastroPerfilController extends Controller
{
    private $usuarioModel;

    /**
     * Inicializa a dependencia do controller.
     */
    public function __contruct()
    {
        $this->usuarioModel = new Usuario();
    }

    /**
     * Renderiza a interface de cadastro de usuario.
     */
    public function indexCadastro()
    {
       	return view('cadastro.index');
	}

    /**
     * Salva um novo usuario.
     *
     * @param CadastroUsuarioRequest $request
     * @return void
     */
    public function salvar(CadastroUsuarioRequest $request)
    {
        $this->beginTransaction();

        try {
            $usuario = new Usuario($request->all());
            $usuario->password = bcrypt($request->password);

            $nascimento = Carbon::createFromFormat('d/m/Y', $request->nascimento);
            $usuario->nascimento = $nascimento->format('Y-m-d');
            $usuario->save();

            // salva o perfil do usuario
            $usuario->roles()->attach([2]); // perfil de usuario comun

            \Session::flash('mensagem', ['msg' => 'Cadastro realizado com Sucesso!', 'class' => 'green white-text']);

            $this->commit();
            return redirect()->route('login');
        } catch (\Exception $e) {
            $this->rollBack();
            throw $e;
        }
    }

    // TODO talvez remover esse metodo
    public function indexPerfil()
    {
        return view('login.principal_adm.perfil.index_perfil');
    }

    public function editar($id)
    {
        $registro = Usuario::find($id);
        return view('login.principal_adm.perfil.editar_perfil', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $dados = $request->all();
        if(isset($dados['password']) && strlen($dados['password']) > 5 ){
            $dados['password'] = bcrypt($dados['password']);
        }else{
            unset($dados['password']);
        }

        $usuario ->update($dados);
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.perfil');
    }

    public function deletar($id)
    {
        Usuario::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('login');
    }
}
