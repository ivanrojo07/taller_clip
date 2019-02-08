<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteDatosGenerales extends Model
{
    protected $table = 'datos_generales_cliente';

    protected $fillable = [

        'id',
    	'cliente_id',
    	'giro_id',
        'tamano', 
    	'web',
        'comentario', 
    	'fechacontacto',
    	'banco',
    	'cuenta',
    	'beneficiario',
        'clabe',
        'forma_contacto_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function cliente() {
    	return $this->belongsTo('App\Cliente');
    }

    public function formacontacto(){
        return $this->belongsTo(FormaContacto::class, 'forma_contacto_id');
    }
}
