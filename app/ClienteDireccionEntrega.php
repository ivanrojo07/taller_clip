<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteDireccionEntrega extends Model {

    protected $table = 'cliente_direccion_entregas';

    protected $fillable = [
    	'id',
    	'cliente_id',
    	'calle',
    	'numext',
    	'numinter',
    	'cp',
    	'colonia',
    	'municipio',
    	'ciudad',
    	'estado',
    	'referencia',
    	'calles',
    ];

    public function cliente() {
    	return $this->belongsTo('App\Cliente');
    }
    
}
