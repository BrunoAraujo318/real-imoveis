<?php

namespace RealImoveis\Models;

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
    protected $fillable = ['nome', 'descricao', 'valor', 'qtd_dormitorio', 'qtd_banheiro', 'qtd_cozinha', 'qtd_garagem', 'qtd_visualicoes', 'url_video', 'categoria_servico', 'imovel_tipo_id'];

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
        return $this->belongsTo(ImovelTipo::class, 'imovel_tipo_id');
    }

    /**
     * Retorna o Imovel relacionado com o Tipo de Imovel.
     *
     * @return Imovel
     */
    public function imagens()
    {
        return $this->hasMany(Imagem::class);
    }

    /**
     * Retorna os Endereços referente ao Imovel.
     *
     * @return Endereco
     */
    public function endereco()
    {
        return $this->belongsToMany(Endereco::class, 'imoveis_enderecos', 'imovel_id', 'endereco_id');
    }

    /**
     * Retorna o nomes das categorias de servicos do imovel.
     *
     * @return string
     */
    public function getNomeCategoria()
    {
        $categoria = $this->categoria_servico;
        $categorias = ['1' => 'Venda', '2' => 'Aluguel'];

        return $categorias[$categoria];
    }
}
