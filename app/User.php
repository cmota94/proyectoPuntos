<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'usuario';
    protected $primaryKey = 'id';

    protected $fillable = [
        'usu_nombre', 
        'usu_apellidoPaterno',
        'usu_apellidoMaterno',
        'usu_estatus',
        'email', 
        'password',
        'mod_idModulo',
        'ar_idArea',
        'rol_idRol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
