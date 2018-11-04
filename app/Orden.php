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
                         'noobras',
                         'precio_orden'
                     ];

    public function obras(){
        return $this->belongsToMany('App\Obra','obra_orden');
    }

    public function cotizacions(){
        return $this->belongsToMany('App\Cotizacion', 'cotizacion_orden');
    }

    public function total(){
        $obras = $this->obras;
        $total = 0;
        foreach ($obras as $obra) {
            $total = $total + $obra->precio_obra;

        }
        return $total;
    }
}

