<?php

namespace RealImoveis\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'enderecos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cidade_id', 'logradouro', 'numero', 'complemento', 'cep', 'bairro', 'longitude', 'latitude'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Retorna o Cidade da Aquisição
     *
     * @return Cidade
     */
    public function cidade()
    {
    	return $this->belongsTo(Cidade::class);
    }

    /**
     * Retorna o Imovel referente ao Endereço.
     *
     * @return Imovel
     */
    public function imovel()
    {
        return $this->belongsToMany(Imovel::class, 'imoveis_enderecos', 'endereco_id', 'imovel_id');
    }
}
