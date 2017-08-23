<?php

namespace RealImoveis;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{	

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'imagens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'url', 'descricao', 'imovel_id', 'ordem', 'visualizacao'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Retorna o Imovel da Imagem.
     * 
     * @return Imovel
     */
    public function imovel()
    {
    	return $this->belongsTo(Imovel::class);
    }
}
