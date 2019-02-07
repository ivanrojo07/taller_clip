<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manodeobra extends Model
{

    protected $table = 'manodeobras';

    protected $fillable=['descripcion',
                         'monto',
                         'nombre',
                         'puesto',
                         'cotizacion_id',
                         'costo'];

    public function cotizacion(){
        return $this->belongsTo('App\Cotizacion');
    }
}
