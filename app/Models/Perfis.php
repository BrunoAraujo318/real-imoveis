<?php

namespace RealImoveis\Models;

use Zizaco\Entrust\EntrustRole;

class Perfis extends EntrustRole
{
	protected $table = 'perfis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
