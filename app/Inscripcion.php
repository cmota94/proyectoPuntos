<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    //

    protected $table = 'inscripción';
    protected $primaryKey = 'insidinscripcion';
    public $timestamps = false;

    protected $fillable = [
        'insidinscripcion',
        'insfechainscripcion',
        'insestatus',
        'insidgrupo',
        'insidalumno'
    ];
}
