<?php

namespace RealImoveis\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    /**
     * Campos que estão disponivel para manipulação.
     *
     * @var array
     */
    protected $fillable = ['numero', 'usuario_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Retorna o usuario que é dono do telefone.
     */
    public function usuario()
    {
    	return $this->belongsTo(Usuario::class);
    }
}
