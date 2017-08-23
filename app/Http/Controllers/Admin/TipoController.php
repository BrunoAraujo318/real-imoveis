<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Tipo;
use RealImoveis\Imovel;

class TipoController extends Controller
{
    public function listaAdm(){
       $registros = Tipo::all();
       return view('login.principal_adm.tipos_imovel.lista_tipos', compact('registros'));
    }

    public function adicionarAdm(){
    	return view('login.principal_adm.tipos_imovel.adicionar_tipos');
    }

    public function salvarAdm(Request $request){
        $dados = $request->all();
        $registro = new Tipo();
        $registro->titulo = $dados['titulo'];
        $registro->save();
        \Session::flash('mensagem', ['msg'=>'Registro criado com Sucesso!', 'class'=>'green white-text']);
    	return redirect()->route('admin.imovel.tipos');
    }

    public function editarAdm($id){
        $registro = Tipo::find($id);
        return view('login.principal_adm.tipos_imovel.editar_tipos', compact('registro'));
    }

    public function atualizarAdm(Request $request, $id){
        $registro = Tipo::find($id);
        $dados = $request->all();
        $registro->titulo = $dados['titulo'];
        $registro ->update();
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.imovel.tipos');
    }

    public function deletarAdm($id){
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

        Tipo::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.imovel.tipos');
    }

}
