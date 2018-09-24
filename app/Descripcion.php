<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descripcion extends Model
{
    protected $table = 'descripcions';
    protected $fillable = ['seccion',
                         'descripcion',
                         'clave',
						 'ancho',
                         'alto',
                         'espesor',
                         'medidas',
						 'color',
						 'proveedor',
                         'precio'];

    public function descripcion(){
        return $this->belongsTo('App\Material');
    }
}
