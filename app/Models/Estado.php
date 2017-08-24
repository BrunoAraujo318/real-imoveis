<?php

namespace RealImoveis\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'sigla'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

	/**
     * Retorna o Cidade da Estado
     * 
     * @return Cidade
     */
    public function cidade()
    {
    	return $this->hasMany(Cidade::class);
    }
}
