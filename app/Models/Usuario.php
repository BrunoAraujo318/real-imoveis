<?php

namespace RealImoveis\Models;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Carbon\Carbon;

class Usuario extends Authenticatable
{
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'email', 'password', 'nascimento', 'cpf'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['nascimento'];

    /**
     * Retorna so telefones referente ao usuario.
     */
    public function telefone()
    {
    	return $this->hasMany('RealImoveis\Telefone','telefones');
    }

    /**
     * Retorna os Endereços referente ao Usuario.
     *
     * @return Endereco
     */
    public function endereco()
    {
        return $this->belongsToMany(Endereco::class, 'usuarios_enderecos', 'usuario_id', 'endereco_id');
    }

    /**
     * Retorna o nomes dos perfils que o usuario esta relacionado.
     *
     * @return string
     */
    public function getNomesPerfis()
    {
        $nameRoles = [];

        foreach($this->roles as $role){
            $nameRoles[] = $role->display_name;
        }

        return implode($nameRoles, ', ');
    }
}
