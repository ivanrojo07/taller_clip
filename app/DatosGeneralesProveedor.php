<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosGeneralesProveedor extends Model
{
    //
    protected $table = 'datos_generales_provedor';

    protected $fillable = [
        'id',
    	'provedor_id',
    	'giro_id',
        'tamano', 
    	'web',
        'comentario', 
    	'fechacontacto',
    	'banco',
    	'cuenta',
    	'beneficiario',
    	'clabe'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function proveedor() {
    	return $this->belongsTo('App\Proveedor');
    }
}
