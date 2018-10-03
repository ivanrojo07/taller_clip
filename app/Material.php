<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';
    protected $fillable=['seccion',
                         'descripcion_id',
                         'clave',
						 'ancho',
                         'alto',
                         'espesor',
                         'medidas',
						 'color',
						 'proveedor',
                         'precio'];

    public function obras(){
        return $this->belongsToMany('App\Obra', 'material_obra');
    }

    public function descripcion(){
        return $this->belongsTo('App\Descripcion');
    }

    // public function proveedor(){
    //     return $this->hasOne('App\Cliente');
    // }
}
