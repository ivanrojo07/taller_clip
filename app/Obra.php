<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $table = "obras";
    protected $fillable = ['orden_id',
                        'nombre',
                        'nopiezas',
                        'alto',
                        'ancho',
                        'medidas',
                        'profundidad',
                        'tipodematerial',
                        'descripcion'];
        
       
    public function materiales(){
        return $this->belongsToMany('App\Material', 'material_obra');
    }

    public function orden(){
        return $this->belongsTo('App\Orden');
    }
}
