<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';
    protected $fillable=['seccion',
                         'descripcion',
                         'clave',
						 'ancho',
                         'alto',
                         'espesor',
                         'medidas',
						 'color',
						 'proveedor',
                         'precio'];

    public function obras(){
        return $this->belongsToMany('App\Obra');
    }

    public function descripcion(){
        return $this->hasOne('App\Descripcion');
    }

    public function proveedor(){
        return $this->hasOne('App\Cliente');
    }
}
