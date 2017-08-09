<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Papel;

class UsuarioController extends Controller
{
    public function login(Request $request){
    	$dados = $request->all();

    	if(Auth::attempt(['email' => $dados['email'], 'password' => $dados['password']])){

            if($dados['email'] == 'admin@mail.com'){
        		\Session::flash('mensagem', ['msg'=>'Login realizado com Sucesso!', 'class'=>'green white-text']);
        		return redirect()->route('admin.principal');
            } else{
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

    public function papel($id){
        //if(!auth()->user()->can('usuario_editar')){            
          //  return redirect()->route('admin.principal');
        //}
        $usuario = User::find($id);
        $papel = Papel::all();
        return view('login.principal_adm.usuarios.papel', compact('usuario','papel'));
    }

    public function salvarPapel(Request $request, $id){
        //if(!auth()->user()->can('usuario_editar')){            
          //  return redirect()->route('admin.principal');
        //}
        $usuario = User::find($id);
        $dados = $request->all();
        $papel = Papel::find($dados['papel_id']);
        $usuario->adicionaPapel();
        return redirect()->back();
    }

    public function removerPapel($id, $papel_id){
        //if(!auth()->user()->can('usuario_editar')){            
          //  return redirect()->route('admin.principal');
        //}
        $usuario = User::find($id);
        $papel = Papel::find($papel_id);
        $usuario->removePapel($papel);
        return redirect()->back();
    }
}
