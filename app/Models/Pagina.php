<?php

namespace RealImoveis\Models;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
	protected $table = 'paginas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'descricao', 'imagem', 'texto', 'tipo'
    ];
}