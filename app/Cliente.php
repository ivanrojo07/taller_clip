<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Cliente extends Model {

	use Sortable;

	protected $table='clientes';

	protected $fillable = [
		'id',
		'nombre',
		'apellidopaterno',
		'apellidomaterno',
		'razonsocial',
		'tipopersona',
		'contactop',
		'mail',
		'rfc',
		'tel_casa',
		'tel_oficina',
		'tel_celular',
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
		'formac'
	];

	public $Sortable = [
	 	'id',
	 	'nombre',
	 	'apellidopaterno',
	 	'apellidomaterno',
	 	'razonsocial',
		'rfc'
 	];

	protected $hidden = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

	public function cotizaciones()
	{
		return $this->hasMany('App\Cotizacion');
	}

	public function ordens()
	{
		return $this->hasMany('App\Orden');
	}

	public function fiscal() {
		return $this->hasOne('App\ClienteDireccionFiscal');
	}

	public function entrega() {
		return $this->hasOne('App\ClienteDireccionEntrega');
	}

	public function descuentos() {
		return $this->hasMany('App\ClienteDescuento');
	}

	public function crm() {
		return $this->hasMany('App\ClienteCRM');
	}

}
