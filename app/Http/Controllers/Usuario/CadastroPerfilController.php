<?php

namespace RealImoveis\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Usuario;

class CadastroPerfilController extends Controller
{
	public function indexCadastro(){
		$usuarios = Usuario::all();
       	return view('cadastro.index', compact('usuarios'));
	}

    public function salvar(Request $request){
        $dados = $request->all();
        $usuarios = new Usuario();
        $usuarios->nome = $dados['nome'];
        $usuarios->nascimento = $dados['nascimento'];
        $usuarios->cpf = $dados['cpf'];
        $usuarios->endereco = $dados['endereco'];
        $usuarios->contato = $dados['contato'];
        $usuarios->email = $dados['email'];
        $usuarios->password = bcrypt($dados['password']);
        $usuarios->save();
        \Session::flash('mensagem', ['msg'=>'Cadastro realizado com Sucesso!', 'class'=>'green white-text']);
        return redirect()->route('login');
    }

    public function indexPerfil(){       
        return view('login.principal_adm.perfil.index_perfil');
    }

    public function editar($id){
        $registro = Usuario::find($id);
        return view('login.principal_adm.perfil.editar_perfil', compact('registro'));
    }

    public function atualizar(Request $request, $id){
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

    public function deletar($id){
        Usuario::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('login');
    }

}
