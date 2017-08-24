<?php

namespace RealImoveis\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function Telefone()
    {
    	return $this->hasMany('RealImoveis\Telefone','telefones');
    }

    public function Aquisicao()
    {
    	return $this->hasMany('RealImoveis\Aquisicao','aquisicoes');
    }

    public function Avaliacao()
    {
    	return $this->hasMany('RealImoveis\Avaliacao','avaliacoes');
    }
}
