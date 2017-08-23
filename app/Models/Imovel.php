<?php

namespace RealImoveis;

use Illuminate\Database\Eloquent\Model;


class Imovel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'imoveis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'descricao', 'valor', 'qtd_dormitorio', 'qtd_visualicoes', 'url_video', 'categoria_servico', 'imovel_tipo_id'];

    /**
     * Retorna o Imovel relacionado com o Tipo de Imovel.
     * 
     * @return Imovel
     */
    public function aquisicao()
    {
        return $this->hasMany('RealImoveis\Aquisicao','aquisicoes');
    }

    /**
     * Retorna o Imovel relacionado com o Tipo de Imovel.
     * 
     * @return Imovel
     */
    public function avaliacao()
    {
        return $this->hasMany('RealImoveis\Avaliacao','avaliacoes');
    }

    /**
     * Retorna o Imovel relacionado com o Tipo de Imovel.
     * 
     * @return Imovel
     */
    public function tipo()
    {
        return $this->belongsTo('RealImoveis\Imoveis_Tipo','imoveis_tipos');
    }

    /**
     * Retorna o Imovel relacionado com o Tipo de Imovel.
     * 
     * @return Imovel
     */
    public function imagens()
    {
        return $this->haMany('RealImoveis\Imagen','imagens');
    }
}   
