<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    //
    protected $table = 'bitacora';
    protected $primaryKey = 'bit_idbitacora';

    protected $fillable = [
    	'bit_dispositivo',
    	'bit_navegador',
    	'bit_direccionip',
    	'bit_idusuario'
    ];
}
