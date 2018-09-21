<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'actividad';
    protected $primaryKey = 'act_idActividad';

    protected $fillable = [
        'act_nombre',
        'act_tipo',
        'act_responsable',
        'act_fechaInicio',
        'act_fechaFin',
        'act_horaInicio',
        'act_horaFin',
        'act_numeroPuntos',
        'act_descripcion',
        'act_estatus',
        'ar_idArea',
        'sub_idSubcategoria',
        'rec_idRecinto'
    ];
}
