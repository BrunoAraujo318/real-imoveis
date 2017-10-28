<?php

namespace RealImoveis\Http\Controllers\Admin;

use Illuminate\Http\Request;

use RealImoveis\Http\Requests;
use RealImoveis\Http\Controllers\Controller;
use RealImoveis\Models\Contrato;
use RealImoveis\Models\Imovel;

class ContratoController extends Controller
{
    /**
     * Contruct of Class.
     */
    public function __construct()
    {
        $this->contrato = new Contrato();
        $this->imovel = new Imovel();
    }

    /**
     * Lista os Contratos.
     */
    public function index($id = 0)
    {
       $contratos = $this->contrato->all();
       $imovel = $this->imovel->find($id);

       return view('login.principal_adm.imoveis.contratos', compact('contratos', 'imovel'));
    }

     /**
     *
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
        $file->move($destino, $nomecontrato);
        $contrato->url = $destino.$nomeContrato;
    }
}
