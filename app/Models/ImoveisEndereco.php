<?php

namespace RealImoveis;

use Illuminate\Database\Eloquent\Model;

class ImoveisEndereco extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'imoveis_enderecos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['imovel_id', 'endereco_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Retorna o Imovel do Endereço
     * 
     * @return Imovel
     */
    public function imovel()
    {
        // TODO ...
    }
}
