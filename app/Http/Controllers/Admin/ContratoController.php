<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;

use RealImoveis\Http\Requests;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Contrato;

class ContratoController extends Controller
{
    /**
     * Contruct of Class.
     */
    public function __construct()
    {
        $this->contrato = new Contrato();
    }

    /**
     * Lista os Contratos.
     */
    public function index()
    {
       $contratos = $this->contrato->all();

       return view('login.principal_adm.contratos.index', compact('contratos'));
    }

    /**
     * Salvar Contrato
     *
     * @param Request $request
     */
    public function salvar(ContratoRequest $request)
    {
        $this->beginTransaction();

        try {

            // Salva o contrato
            $contrato = new Contrato($request->all());

            if ($request->hasFile('contrato')) {
                $this->uploadContrato($contrato, $request->file('contrato'), "doc/contratos/");
            }

            $contrato->save();

            $this->commit();

            \Session::flash('mensagem', ['msg'=>'Registro criado com Sucesso!', 'class'=>'green white-text']);
            return redirect()->route('admin.contratos');
        } catch (\Exception $e) {
            $this->rollBack();
            throw $e;
        }

    }
     /**
     *
     *
     * @param integer $id
     * @return view
     */
    private function uploadContrato($contrato, $file, $destino)
    {
        $rand = date('Ymdhis');
        $ext = $file->guessClientExtension();
        $nomeOriginal = $file->getClientOriginalName();
        $nomeContrato = $this->removeAcentos($rand.".".$ext);
        $file->move($destino, $nomecontrato);
        $contrato->url = $destino.$nomeContrato;
    }
}
