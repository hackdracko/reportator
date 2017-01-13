<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $connection = 'cubogeneral';
    protected $table = 'proyectos_cadenas';
    public $timestamps = false;
    protected $fillable = [
        'id','idProyecto', 'idCadena', 'nombreProyecto', 'nombreCadena', 'usuario', 'password', 'activo'
    ];
}
