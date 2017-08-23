<?php

namespace RealImoveis\Models;

use Illuminate\Database\Eloquent\Model;

class Aquisicao extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aquisicoes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['usuario_id', 'imovel_id', 'data_aquisicao'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Retorna o Usuario da Aquisição
     * 
     * @return Usuario
     */
    public function usuario()
    {
    	return $this->belongsTo(Usuario::class);
    }

	/**
     * Retorna o Imovel da Aquisição
     * 
     * @return Imovel
     */
    public function imovel()
    {
    	return $this->belongsTo(Imovel::class);
    }
}
