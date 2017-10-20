<?php

namespace RealImoveis\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contratos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'descricao', 'imagem'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
