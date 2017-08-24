<?php

namespace RealImoveis\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    public function Usuario()
    {
    	return $this->belongsTo('RealImoveis\Usuario','usuarios');
    }
}
