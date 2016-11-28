<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catproducto extends Model
{
    protected $connection = 'spinmaster';
    protected $table = "catproductos";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'proyecto',
        'liverpool',
        'ph',
        'soriana',
        'wm',
        'sears',
        'juguetron',
        'juguetronCodigo',
        'division',
        'categoria',
        'subCategoria',
        'upc',
        'item',
        'nombre',
        'costoUnidad',
        'activo',
        'temporada',
        'importacion',
        'negocio',
        'skuLiverpool',
        'skuPalacio',
        'skuSoriana',
        'skuWalmart',
        'skuSears',
        'skuChedraui',
        'skuJuguetron',
        'skuComex',
        'skuHeb',
        'material',
        'color',
        'talla',
        'temporadaDetalle',
        'carryOver',
        'modelo',
        'chksum'
    ];
    public function division()
    {
        return $this->belongsTo('App\Catxdivision', 'id');
    }
}
