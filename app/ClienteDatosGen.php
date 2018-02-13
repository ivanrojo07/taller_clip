<?php

namespace App;

use App\Cliente;
use Illuminate\Database\Eloquent\Model;

class ClienteDatosGen extends Model
{
    //
    protected $table='cliente_datos_generales';

    protected $fillable=[
    	'id',
    	'cliente_id',
    	'giro_id',
    	'forma_contacto_id',
    	'tamano',
    	'web',
    	'comentario',
    	'fechacontacto'
    ];
    
    protected $hidden = [
    	'created_at',
    	'updated_at'
    ];

    public function cliente(){
    	return $this->belongsTo(Cliente::class);
    }
}
