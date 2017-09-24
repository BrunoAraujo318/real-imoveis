<?php

namespace RealImoveis\Http\Controllers;

use RealImoveis\Http\Requests;
use Illuminate\Http\Request;
use RealImoveis\Models\Cidade;

class CidadeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->cidadeModel = new Cidade();
    }

    /**
     * Retornas as cidades conforme $estadoId informado.
     *
     * @param $estadoId
     */
    public function getCidades($estadoId)
    {
        $cidades = $this->cidadeModel->where('estado_id', '=', $estadoId)->get();
        
        return response(['data' => $cidades]);
    }
}
