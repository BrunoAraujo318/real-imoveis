<?php

namespace RealImoveis\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'descricao', 'imagem', 'ordem'];
}
