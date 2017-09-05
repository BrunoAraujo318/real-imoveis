<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;

use RealImoveis\Http\Requests;
use RealImoveis\Http\Controllers\Controller;
use Auth;
use RealImoveis\Models\Usuario;
use RealImoveis\Models\Perfil;

class UsuarioController extends Controller
{
    private $usuarioModel;

    /**
     * Inicializas as dependencias da classe.
     */
    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    /**
     * Autentica o usuario no sistema.
     * 
     * @param Request $request
     */
    public function login(Request $request)
    {
    	$dados = $request->all();

        $autenticado = Auth::attempt(['email' => $dados['email'], 'password' => $dados['senha']]);

        if ($autenticado) {
            if (Auth::user()->hasRole('admin')) {
        		\Session::flash('mensagem', ['msg'=>'Login realizado com Sucesso!', 'class'=>'green white-text']);
        		return redirect()->route('admin.principal');
            } else {
                \Session::flash('mensagem', ['msg'=>'Login realizado com Sucesso!', 'class'=>'green white-text']);
                return redirect()->route('usuario.principal');
            }
    	} 
    	
        \Session::flash('mensagem', ['msg'=>'Confira seus Dados!', 'class'=>'red white-text']);
    	return redirect()->route('login');
    }

    /**
     * Finaliza a sessão e sair do sistema.
     */
    public function sair()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Lista todos os usuarios cadastrados.
     */
    public function lista()
    {
        $usuarios = $this->usuarioModel->all();

        return view('login.principal_adm.usuarios.lista_usuarios', compact('usuarios'));
    }


    /**
     * Renderiza a interface de cadastro de usuario.
     */
    public function adicionar()
    {
        return view('login.principal_adm.usuarios.adicionar_usuarios');
    }

    /**
     * Salva um novo usuario na base de dados.
     * 
     * @param  Request $request
     */
    public function salvar(Request $request)
    {
        $dados = $request->all();

        dd($dados);

        $usuarios = new Usuario($dados);
        $usuarios->password = bcrypt($dados['password']);
        $usuarios->save();

        \Session::flash('mensagem', ['msg'=>'Registro criado com Sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.usuarios');
    }

    public function editar($id)
    {
        $usuario = $this->usuarioModel->find($id);
        return view('login.principal_adm.usuarios.editar_usuarios', compact('usuario'));
    }

    public function atualizar(Request $request, $id){
        $usuario = $this->usuarioModel->find($id);
        $dados = $request->all();

        if(isset($dados['password']) && strlen($dados['password']) > 5 ){
            $dados['password'] = bcrypt($dados['password']);
        }else{
            unset($dados['password']);
        }

        $usuario ->update($dados);
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.usuarios');
    }

    public function deletar($id)
    {
        $this->usuarioModel->find($id)->delete();
        
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.usuarios');
    }
}
