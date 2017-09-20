<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Imovel;
use RealImoveis\Models\ImovelTipo;
use RealImoveis\Models\Cidade;
use RealImoveis\Models\Endereco;
use RealImoveis\Models\Imagem;

class ImovelController extends Controller
{
    /**
     * Contruct of Class.
     */
    public function __construct()
    {
        $this->imovel = new Imovel();
    }

    /**
     * Lista os imoveis.
     */
    public function lista()
    {
       $imoveis = $this->imovel->all();

       return view('login.principal_adm.imoveis.lista_imoveis', compact('imoveis'));
    }

    /**
     * Renderiza a interface de adicionar imovel.
     */
    public function adicionar()
    {
    	$tipos = ImovelTipo::all();
        $imoveis = Imovel::all();
        $imagens = Imagem::all();
        $enderecos = Endereco::all();

    	return view('login.principal_adm.imoveis.adicionar_imoveis', compact('tipos', 'imoveis', 'imagens', 'enderecos'));
    }

    /**
     * Salva os dados de Imóveis e suas dependencias
     *
     * @param  Request $request
     */
    public function salvar(Request $request)
    {
        dd($request->all());
        $this->beginTransaction();

        try {

            // Salva o imovel
            $imovel = new Imovel($request->get('imovel'));

            if ($request->hasFile('imagem')) {
                $this->uploadImagens($imovel, $request->file('imagem'), "img/imoveis/");
            }

            $imovel->save();

            // endereço
            $endereco = new Endereco($request->get('endereco'));
            $endereco->save();

            // salvar a relação entre o endereço e imovel
            $imovel->endereco()->sync([$endereco->id]);

            if ($request->hasFile('imagens')) {
                $imagens = $request->hasFile('imagens');
                foreach ($imagens as $index => $imagem) {
                    $newImagem = new Imagem();
                    $newImagem->nome = $imagem->getClientOriginalName();
                    $newImagem->imovel_id = $imovel->id;
                    $newImagem->imovel_id = $index;
                }
            }

            // imagens
            $imagens = new Imagem();

            $this->commit();
            //\Session::flash('mensagem', ['msg'=>'Registro criado com Sucesso!', 'class'=>'green white-text']);
            //return redirect()->route('admin.imoveis');
        } catch (\Exception $e) {
            $this->rollBack();
            throw $e;
        }
    }

    /**
     * Realiza upload de acordo com parametros informados
     *
     * @return void
     */
    private function uploadImagens($registro, $imagem, $destino)
    {
        $imagens = [];

        if (! is_array($imagem)) {
            array_push($imagens, $imagem);
        } else {
            $imagens = $imagem;
        }

        if (! empty($imagens)) {
            foreach ($imagens as $imagem) {
                $rand = date('Ymdhis');
                $ext = $imagem->guessClientExtension();
                $nomeArquivo = "_img_".$rand.".".$ext;
                $imagem->move($destino, $nomeArquivo);
                $registro->imagem = $destino.$nomeArquivo;
            }
        }
    }

    public function editar($id){
        $registro = Imovel::find($id);
        $tipos = ImovelTipo::all();
        $imagens = Imagem::all();
        $enderecos = Endereco::all();
        $cidades = Cidade::all();
        return view('login.principal_adm.imoveis.editar_imoveis', compact('registro', 'tipos', 'imagens','enderecos','cidades'));
    }

    public function atualizar(Request $request, $id){
        $registro = Imovel::find($id);
        $dados = $request->all();
        $registro->nome = $dados['nome'];
        $registro->descricao = $dados['descricao'];
        $registro->categoria_servico = $dados['categoria_servico'];
        $registro->endereco_id = $dados['endereco_id'];
        $registro->url_video = $dados['url_video'];
        $registro->valor = $dados['valor'];
        $registro->qtd_dormitorio = $dados['qtd_dormitorio'];
        $registro->cidade_id = $dados['cidade_id'];
        $registro->tipo_id = $dados['tipo_id'];
        $file = $request->file('imagem_id');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/imoveis/".str_slug($dados['nome'],'_')."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem_id = $diretorio.'/'.$nomeArquivo;
        }
        $registro ->update();
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.imoveis');
    }

    public function deletar($id){
        Imovel::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.imoveis');
    }
}