<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Cidade;
use RealImoveis\Imovel;

class CidadeController extends Controller
{
    
    public function listaAdm(){
       $registros = Cidade::all();
       return view('login.principal_adm.cidades.lista_cidades', compact('registros'));
    }

    public function adicionarAdm(){
    	return view('login.principal_adm.cidades.adicionar_cidades');
    }

    public function salvarAdm(Request $request){
        $dados = $request->all();
        $registro = new Cidade();
        $registro->nome = $dados['nome'];
        $registro->estado = $dados['estado'];
        $registro->sigla_estado = $dados['sigla_estado'];
        $registro->save();
        \Session::flash('mensagem', ['msg'=>'Registro criado com Sucesso!', 'class'=>'green white-text']);
    	return redirect()->route('admin.cidades');
    }

    public function editarAdm($id){
        $registro = Cidade::find($id);
        return view('login.principal_adm.cidades.editar_cidades', compact('registro'));
    }

    public function atualizarAdm(Request $request, $id){
        $registro = Cidade::find($id);
        $dados = $request->all();
        $registro->nome = $dados['nome'];
        $registro->estado = $dados['estado'];
        $registro->sigla_estado = $dados['sigla_estado'];
        $registro ->update();
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.cidades');
    }

    public function deletarAdm($id){
        if(Imovel::where('cidade_id','=',$id)->count()){

            $msg = "Não é possível deletar essa cidade! Esses imóveis (";
            $imoveis = Imovel::where('cidade_id','=',$id)->get();
            foreach ($imoveis as $imovel) {
                $msg.="id:".$imovel->id."";
            }
            $msg .= ") estão relacionados.";

            \Session::flash('mensagem',['msg'=>$msg,'class'=>'red white-text']);
            return redirect()->route('admin.cidades');
        }

        Cidade::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.cidades');
    }
}
