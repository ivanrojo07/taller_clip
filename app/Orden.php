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
                         'nopiezas'];

    public function obras(){
        return $this->hasMany('App\Obra');
    }

    public function cotizacions(){
        return $this->belongsToMany('App\Cotizacion', 'cotizacion_orden');
    }
}

