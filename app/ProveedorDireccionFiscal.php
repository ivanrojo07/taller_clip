<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProveedorDireccionFiscal extends Model
{

    protected $table = 'proveedor_direccion_fiscal';
    
    protected $fillable = [
    	'id',
    	'proveedor_id',
    	'calle',
    	'numext',
    	'numint',
    	'cp',
    	'colonia',
    	'municipio',
    	'ciudad',
    	'estado',
    	'referencia',
    	'calles',
    ];

    protected $hidden = [ 'created_at', 'updated_at'];

    public function proveedor() {
    	return $this->belongsTo('App\Proveedor');
    }

}
