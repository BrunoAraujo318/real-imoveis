<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RealImoveis\Http\Requests\UsuarioRequest;
use RealImoveis\Http\Controllers\Controller;
use Auth;
use \Carbon\Carbon;
use RealImoveis\Models\Usuario;
use RealImoveis\Models\Perfis;
use RealImoveis\Models\Estado;
use RealImoveis\Models\Cidade;
use RealImoveis\Models\Endereco;

class UsuarioController extends Controller
{
    private $usuarioModel;
    private $estadoModel;
    private $perfilModel;

    /**
     * Inicializas as dependencias da classe.
     */
    public function __construct()
    {
        $this->estadoModel = new Estado();
        $this->perfilModel = new Perfis();
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
    		\Session::flash('mensagem', ['msg'=>'Login realizado com Sucesso!', 'class'=>'green white-text']);
    		return redirect()->route('admin.principal');
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
        $usuario = new Usuario();
        $endereco = new Endereco();
        $usuario->nascimento = Carbon::now();
        $estados = $this->estadoModel->all();
        $cidades = [];
        $perfis = $this->perfilModel->all();

        return view('login.principal_adm.usuarios.adicionar_usuarios', compact('usuario', 'endereco', 'perfis', 'estados', 'cidades'));
    }

    /**
     * Salva um novo usuario na base de dados.
     *
     * @param UsuarioRequest $request
     */
    public function salvar(UsuarioRequest $request)
    {
        $this->beginTransaction();

        try {

            $usuarioRequest = $request->get('usuario');

            $usuario = new Usuario($usuarioRequest);
            $usuario->password = bcrypt($usuarioRequest['password']);
            $usuario->save();

            // endereço
            $endereco = new Endereco($request->get('endereco'));
            $endereco->save();

            // salvar a relação entre o endereço e imovel
            $usuario->endereco()->sync([$endereco->id]);

            // salva o perfil do usuario
            $usuario->roles()->attach([2]);

            // salva o telefone do usuario
            $telefone = ['numero' => $request->telefone];
            $usuario->telefone()->create($telefone);

            $this->commit();

            \Session::flash('mensagem', ['msg' => 'Registro criado com Sucesso!', 'class' => 'green white-text']);
            return redirect()->route('admin.usuarios');
        } catch (\Exception $e) {
            $this->rollBack();
            throw $e;
        }
    }

    /**
     * Renderiza a interface, com os dados do usuario.
     *
     * @param $id
     */
    public function editar($id)
    {
        $perfis = $this->perfilModel->all();
        $estados = $this->estadoModel->all();
        $usuario = $this->usuarioModel->find($id);

        if (! $usuario->endereco->isEmpty()) {
            $endereco = $usuario->endereco;
        }

        if (! empty($usuario->endereco)) {
            $endereco = $usuario->endereco[0];
            $cidade = $endereco->cidade;

            $cidades = Cidade::where('estado_id', '=', $cidade->estado_id)->get();
        }

        return view('login.principal_adm.usuarios.editar_usuarios', compact('estados', 'cidades', 'perfis', 'usuario', 'endereco'));
    }

    /**
     * Atualiza os dado do usuario.
     *
     * @param Request $request
     * @param $id
     */
    public function atualizar(Request $request, $id)
    {
        $usuario = $this->usuarioModel->find($id);
        $dados = $request->all();

        if(isset($dados['password']) && strlen($dados['password']) > 5 ){
            $dados['password'] = bcrypt($dados['password']);
        } else {
            unset($dados['password']);
        }

        $usuario ->update($dados);
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.usuarios');
    }

    /**
     * Remove um usuario, conforme $id informado.
     * 
     * @param $id
     */
    public function deletar($id)
    {
        $this->usuarioModel->find($id)->delete();
        
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.usuarios');
    }
}
