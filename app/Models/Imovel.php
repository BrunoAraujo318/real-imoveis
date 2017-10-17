<?php

namespace RealImoveis\Models;

use DB;
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
     * @param integer $categoria
     * @return string
     */
    public function getNomeCategoria($categoria = null)
    {
        $categorias = ['1' => 'Venda', '2' => 'Aluguel'];

        if (empty($categoria)) {
            $categoria = $this->categoria_servico;
        }

        return $categorias[$categoria];
    }

    /**
     * Retorna o nomes das categorias de servicos do imovel.
     *
     * @return string
     */
    public function getNomeCategoriaFormatada($categoria = null)
    {
        $categorias = ['1' => 'VENDE-SE', '2' => 'ALUGA-SE'];

        if (empty($categoria)) {
            $categoria = $this->categoria_servico;
        }

        return $categorias[$categoria];
    }

    /**
     * Retorna os dados do imovel conforme $filtro informado.
     *
     * @param object $filtro
     * @return array
     */
    public function getImoveisFiltro($filtro)
    {
        $imoveis = DB::table('imoveis')
        ->select(
            'imoveis.id',
            'imoveis.nome',
            'imoveis.valor',
            'imoveis.imagem',
            'imoveis.descricao',
            'imoveis.categoria_servico'
        )
        ->join('imoveis_enderecos', 'imoveis_enderecos.imovel_id', '=', 'imoveis.id')
        ->join('enderecos', 'enderecos.id', '=', 'imoveis_enderecos.endereco_id')
        ->join('cidades', 'cidades.id', '=', 'enderecos.cidade_id')
        ->orderBy('imoveis.id', 'desc');

        if (! empty($filtro->estado)) {
            $imoveis->where('cidades.estado_id', '=', $filtro->estado);
        }

        if (! empty($filtro->cidade)) {
            $imoveis->where('cidades.id', '=', $filtro->cidade);
        }

        if (! empty($filtro->categoria_servico)) {
            $imoveis->where('imoveis.categoria_servico', '=', $filtro->categoria_servico);
        }

        if (! empty($filtro->imovel_tipo)) {
            $imoveis->where('imoveis.imovel_tipo_id', '=', $filtro->imovel_tipo);
        }

        if (! empty($filtro->valor)) {
            $imoveis->where('imoveis.valor', '<=', $filtro->valor);
            //$imoveis->whereBetween('imoveis.valor', ['1000', '2000']);
        }

        if (! empty($filtro->qtd_dormitorio)) {
            if($filtro->qtd_dormitorio == 5){
                $imoveis->where('imoveis.qtd_dormitorio', '>=', '5');
            }else {
                $imoveis->where('imoveis.qtd_dormitorio', '=', $filtro->qtd_dormitorio);
            }
        }

        return $imoveis->get();
    }
}
