<?php

namespace RealImoveis\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cidades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'estado_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Retorna o Estado da Cidade
     * 
     * @return Estado
     */
    public function estado()
    {
    	return $this->belongsTo(Estado::class);
    }

    /**
     * Retorna o Endereco da Cidade
     * 
     * @return Endereco
     */
    public function endereco()
    {
    	return $this->haMany(Endereco::class);
    }
}
