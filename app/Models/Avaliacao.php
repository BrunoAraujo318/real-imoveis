<?php

namespace RealImoveis;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'avaliacoes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['situacao', 'imovel_id', 'usuario_id', 'comentario'];

    /**
     * Retorna o Usuario da Avaliação.
     * 
     * @return Usuario
     */
    public function usuario()
    {
    	return $this->belongsTo(Usuario::class);
    }

    /**
     * Retorna o Imovel da Avaliação.
     * 
     * @return Imovel
     */
    public function imovel()
    {
    	return $this->belongsTo(Imovel::class);
    }
}
