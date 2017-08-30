<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;

use RealImoveis\Http\Requests;
use RealImoveis\Http\Controllers\Controller;
use Auth;
use RealImoveis\User;
use RealImoveis\Papel;

class UsuarioController extends Controller
{
    /**
     * Autentica o usuario no sistema.
     * 
     * @param Request $request
     */
    public function login(Request $request)
    {
    	$dados = $request->all();

        $autenticado = Auth::attempt(['email' => $dados['email'], 'password' => $dados['password']]);

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

    public function sair(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function lista(){
       // if(auth()->user()->can('usuario_listar')){
            $usuarios = User::all();
            return view('login.principal_adm.usuarios.lista_usuarios', compact('usuarios'));
        //}else {
            //return redirect()->route('admin.principal');
        //}
    }

    public function adicionar(){
        //if(!auth()->user()->can('usuario_adicionar')){            
            //return redirect()->route('admin.principal');
        //}
        return view('login.principal_adm.usuarios.adicionar_usuarios');
    }

    public function salvar(Request $request){
        //if(!auth()->user()->can('usuario_adicionar')){            
          //  return redirect()->route('admin.principal');
        //}
        $dados = $request->all();
        $usuarios = new User();
        $usuarios->name = $dados['name'];
        $usuarios->email = $dados['email'];
        $usuarios->password = bcrypt($dados['password']);
        $usuarios->save();
        \Session::flash('mensagem', ['msg'=>'Registro criado com Sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.usuarios');
    }

    public function editar($id){
        //if(!auth()->user()->can('usuario_editar')){            
          //  return redirect()->route('admin.principal');
        //}
        $usuario = User::find($id);
        return view('login.principal_adm.usuarios.editar_usuarios', compact('usuario'));
    }

    public function atualizar(Request $request, $id){
        // if(!auth()->user()->can('usuario_editar')){            
           // return redirect()->route('admin.principal');
        //}
        $usuario = User::find($id);
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

    public function deletar($id){
        //if(!auth()->user()->can('usuario_deletar')){            
          //  return redirect()->route('admin.principal');
        //}
        User::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.usuarios');
    }
}
