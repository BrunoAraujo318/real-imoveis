<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;
use RealImoveis\Http\Requests\ImovelRequest;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Imovel;
use RealImoveis\Models\ImovelTipo;
use RealImoveis\Models\Cidade;
use RealImoveis\Models\Estado;
use RealImoveis\Models\Endereco;
use RealImoveis\Models\Imagem;
use RealImoveis\Models\Usuario;
use Auth;

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
        $imoveis = [];

        // verifica se o cara logad e usuario comum
        if (Auth::user()->hasRole('usuario')) {
            $imoveis = $this->imovel->where('usuario_id', '=', Auth::user()->id)->get();
        } else {
            $imoveis = $this->imovel->all();
        }

        return view('login.principal_adm.imoveis.lista_imoveis', compact('imoveis'));
    }

    /**
     * Renderiza a interface de adicionar imovel.
     */
    public function adicionar()
    {
    	$tipos = ImovelTipo::all();
        $estados = Estado::all();
        $imovel = new Imovel();
        $endereco = new Endereco();
        $cidades = [];
        $galerias = [];

        $usuarios = [];

        if (Auth::user()->hasRole('admin')) {
            $usuarios = Usuario::all();
        }

    	return view('login.principal_adm.imoveis.adicionar_imoveis', compact('tipos', 'estados', 'cidades', 'imovel', 'endereco', 'usuarios', 'galerias'));
    }

    /**
     * Salva os dados de Imóveis e suas dependencias
     *
     * @param Request $request
     */
    public function salvar(ImovelRequest $request)
    {
        $this->beginTransaction();

        try {

            // Salva o imovel
            $imovel = new Imovel($request->get('imovel'));
            $imovel->valor = $this->moedaBanco($imovel->valor);

            if ($request->hasFile('imagem')) {
                $this->uploadImagens($imovel, $request->file('imagem'), "img/imoveis/");
            }

            if ($request->hasFile('url_contrato')) {
                $this->uploadContrato($imovel, $request->file('url_contrato'), "img/contrato/");
            }

            if (Auth::user()->hasRole('usuario')) {
                $imovel->usuario_id = Auth::user()->id;
            }

            $imovel->save();

            // endereço
            $endereco = new Endereco($request->get('endereco'));
            $endereco->save();

            // salvar a relação entre o endereço e imovel
            $imovel->endereco()->sync([$endereco->id]);

            // salva a galerias de imagens
            if ($request->hasFile('imagens')) {
                $imagens = $request->file('imagens');

                foreach ($imagens as $index => $imagem) {
                    $newImagem = new Imagem();
                    $newImagem->nome = $imagem->getClientOriginalName();
                    $newImagem->imovel_id = $imovel->id;
                    $newImagem->ordem = $index;
                    $this->uploadImagens($newImagem, $imagem, "img/imoveis/galerias/");
                    $newImagem->save();
                }
            }

            $this->commit();
            \Session::flash('mensagem', ['msg'=>'Registro criado com Sucesso!', 'class'=>'green white-text']);
            return redirect()->route('admin.imoveis');
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
        $rand = date('Ymdhis');
        $ext = $imagem->guessClientExtension();
        $nomeOriginal = $imagem->getClientOriginalName();
        $nomeArquivo = "_img_".$nomeOriginal."_".$rand.".".$ext;
        $imagem->move($destino, $nomeArquivo);
        $registro->imagem = $destino.$nomeArquivo;
    }

     /**
     * Realiza upload de acordo com parametros informados
     *
     * @param
     * @return
     */
    private function uploadContrato($contrato, $file, $destino)
    {
        $rand = date('Ymdhis');
        $ext = $file->guessClientExtension();
        $nomeOriginal = $file->getClientOriginalName();
        $nomeContrato = $this->removeAcentos($rand.".".$ext);
        $file->move($destino, $nomeContrato);
        $contrato->url_contrato = $destino.$nomeContrato;
    }

    /**
     * Atualiza os dados do contrato.
     *
     * @param $imovelId
     */
    public function atualizarContrato(Request $request)
    {
        $this->beginTransaction();

        try {
            $imovel = Imovel::find($request->get('imovel_id'));

            if ($request->hasFile('arquivo')) {
                $this->uploadContrato($imovel, $request->file('arquivo'), "contratos/imoveis/");
            }

            $imovel->save();

            $this->commit();

            return ['msg' => 'Contrato anexado com sucesso.'];
        } catch (\Exception $e) {
            $this->rollBack();
            throw $e;
        }
    }

    /**
     * Renderiza interface de edição do imovel
     *
     * @param integer $id
     * @return view
     */
    public function editar($id)
    {
        $estados = Estado::all();
        $tipos = ImovelTipo::all();
        $endereco = new Endereco();
        $cidades = new Cidade;
        $galerias = [];

        $usuarios = [];

        if (Auth::user()->hasRole('admin')) {
            $usuarios = Usuario::all();
        }

        $imovel = Imovel::find($id);
        if (! empty($imovel->endereco)) {
            $endereco = $imovel->endereco[0];
            $cidade = $endereco->cidade;

            $cidades = Cidade::where('estado_id', '=', $cidade->estado_id)->get();
        }

        if (! empty($imovel->imagens)) {
             $galerias = $imovel->imagens;
        }

        return view('login.principal_adm.imoveis.editar_imoveis', compact('imovel', 'tipos', 'imagens', 'endereco', 'estados', 'cidades', 'usuarios', 'galerias'));
    }

    /**
     * Altereação de dados de imoveis.
     *
     * @param interger $id
     * @return view
     */
    public function atualizar(Request $request, $id)
    {
        $this->beginTransaction();

        try {

            // Altera o imovel
            $imovel = Imovel::find($id);
            $imovel->fill($request->get('imovel'));
            $imovel->valor = $this->moedaBanco($imovel->valor);

            if ($request->hasFile('imagem')) {
                $this->uploadImagens($imovel, $request->file('imagem'), "img/imoveis/");
            }

            if (Auth::user()->hasRole('usuario')) {
                $imovel->usuario_id = Auth::user()->id;
            }

            $imovel->save();

            if (! empty($imovel->endereco)) {
                $endereco = $imovel->endereco[0];
                // endereço
                $endereco = Endereco::find($endereco->id);
                $endereco->fill($request->get('endereco'));
                $endereco->save();

                // Altera a relação entre o endereço e imovel
                $imovel->endereco()->sync([$endereco->id]);
            }

            // Altera a galerias de imagens
            if ($request->hasFile('imagens')) {
                $imagens = $request->file('imagens');

                foreach ($imagens as $index => $imagem) {
                    $newImagem = new Imagem();
                    $newImagem->nome = $imagem->getClientOriginalName();
                    $newImagem->imovel_id = $imovel->id;
                    $newImagem->ordem = $index;
                    $this->uploadImagens($newImagem, $imagem, "img/imoveis/galerias/");
                    $newImagem->save();
                }
            }

            $this->commit();
            \Session::flash('mensagem', ['msg'=>'Registro atualizado com Sucesso!', 'class'=>'green white-text']);
            return redirect()->route('admin.imoveis');
        } catch (\Exception $e) {
            $this->rollBack();
            throw $e;
        }
    }

    /**
     * Exclui um imovel, de acordo com parametro informado.
     *
     * @param interger $id
     * @return view
     */
    public function deletar($id)
    {
        Imovel::find($id)->delete();

        // TODO ao excluir o imovel antes tem que excluir as dependencias referente ao imovel

        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.imoveis');
    }
}
