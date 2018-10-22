<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'actividad';
    protected $primaryKey = 'act_idactividad';

    protected $fillable = [
        'act_nombre',
        'act_tipo',
        'act_responsable',
        'act_fechainicio',
        'act_fechafin',
        'act_horainicio',
        'act_horafin',
        'act_numeropuntos',
        'act_descripcion',
        'act_estatus',
        'act_idarea',
        'act_idsubcategoria',
        'act_idlugar',
        'act_idbitacora'
    ];
}
