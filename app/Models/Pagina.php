<?php

namespace RealImoveis\Models;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'descricao', 'imagem', 'ordem', 'email', 'tipo', 'sobre'
    ];
}