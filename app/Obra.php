<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $table = "obras";
    protected $fillable = [
        'nombre',
        'nopiezas',
        'alto_obra',
        'ancho_obra',
        'profundidad_obra',
        'unidad_obra',
        'descripcion_obra'
    ];
        
       
    public function materiales(){
        return $this->belongsToMany('App\Material', 'material_obra')->withPivot('cantidad');
    }

    public function ordenes(){
        return $this->belongsToMany('App\Orden', 'obra_orden');
    }
}
