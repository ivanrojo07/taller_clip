<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordens';

    protected $fillable=['nombre',
                         'fecha',
                         'noorden',
                         'descripcion',
                         'noobras'];

    public function obras(){
        return $this->belongsToMany('App\Obra','obra_orden');
    }

    public function cotizacions(){
        return $this->belongsToMany('App\Cotizacion', 'cotizacion_orden');
    }
}

