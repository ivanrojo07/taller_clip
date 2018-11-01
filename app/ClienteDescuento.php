<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteDescuento extends Model {

    protected $table = 'cliente_descuentos';

    protected $fillable = [
    	'id',
    	'cliente_id',
    	'nombre',
    	'descuento',
    ];

    public function cliente() {
    	return $this->belongsTo('App\Cliente');
    }

}
