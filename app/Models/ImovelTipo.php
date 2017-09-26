<?php

namespace RealImoveis\Models;

use Illuminate\Database\Eloquent\Model;

class ImovelTipo extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'imoveis_tipos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Retorna o Imovel relacionado com o Tipo de Imovel.
     *
     * @return Imovel
     */
    public function imovel()
    {
    	return $this->hasMany(Imovel::class);
    }
}
