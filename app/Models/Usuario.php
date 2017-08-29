<?php

namespace RealImoveis\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function Telefone()
    {
    	return $this->hasMany('RealImoveis\Telefone','telefones');
    }

    public function Aquisicao()
    {
    	return $this->hasMany('RealImoveis\Aquisicao','aquisicoes');
    }

    public function Avaliacao()
    {
    	return $this->hasMany('RealImoveis\Avaliacao','avaliacoes');
    }
}
