<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vario extends Model
{

    protected $table = 'varios';

    protected $fillable=['descripcion',
                         'monto',
                        'cotizacion_id',
                        'costo',
                    'total'];

    public function cotizacion(){
        return $this->belongsTo('App\Cotizacion');
    }
}
