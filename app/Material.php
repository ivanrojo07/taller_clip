<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';
    protected $fillable=['seccion',
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

}
