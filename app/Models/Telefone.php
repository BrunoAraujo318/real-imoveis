<?php

namespace RealImoveis;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    public function Usuario()
    {
    	return $this->belongsTo('RealImoveis\Usuario','usuarios');
    }
}
