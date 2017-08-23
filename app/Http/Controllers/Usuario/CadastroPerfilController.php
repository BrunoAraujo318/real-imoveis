<?php

namespace RealImoveis\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\User;

class CadastroPerfilController extends Controller
{
	public function index(){
		$usuarios = User::all();
       	return view('cadastro.index', compact('usuarios'));
	}

    public function salvar(Request $request){
        $dados = $request->all();
        $usuarios = new User();
        $usuarios->name = $dados['name'];
        $usuarios->email = $dados['email'];
        $usuarios->password = bcrypt($dados['password']);
        $usuarios->save();
        \Session::flash('mensagem', ['msg'=>'Cadastro realizado com Sucesso!', 'class'=>'green white-text']);
        return redirect()->route('login');
    }

    public function indexAdm(){       
        return view('login.principal_adm.perfil.index_perfil');
    }

    public function indexUser(){  
        return view('login.principal_usuario.perfil.index_perfil');
    }

    public function editarAdm($id){
        $registro = User::find($id);
        return view('login.principal_adm.perfil.editar_perfil', compact('registro'));
    }

    public function editarUser($id){
        $registro = User::find($id);
        return view('login.principal_usuario.perfil.editar_perfil', compact('registro'));
    }

    public function atualizarAdm(Request $request, $id){
        $usuario = User::find($id);
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

       public function atualizarUser(Request $request, $id){
        $usuario = User::find($id);
        $dados = $request->all();
        if(isset($dados['password']) && strlen($dados['password']) > 5 ){
            $dados['password'] = bcrypt($dados['password']);
        }else{
            unset($dados['password']);
        }

        $usuario ->update($dados);
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('principal.perfil');
    }

    public function deletarAdm($id){
        User::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('login');
    }

    public function deletarUser($id){
        User::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('login');
    }

}
