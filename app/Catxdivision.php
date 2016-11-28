<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catxdivision extends Model
{
    protected $connection = 'spinmaster';
    protected $table = "catxdivision";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'nombre'
    ];
    public function productos()
    {
        return $this->hasMany('App\Catproducto', 'division');
    }
}
