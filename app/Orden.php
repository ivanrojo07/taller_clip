<?php

namespace App;

use App\DescripcionGeneral;
use App\DescripcionMarco;
use App\DescripcionMaria;
use App\DescripcionMontaje;
use App\DescripcionProteccion;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Orden extends Model
{
    protected $table = 'orden';

    protected $fillable=['
    id',
    'nombre',
    'fecha',
    'descripcion',
    'almacen_id'];

    public function generales(){
        return $this->hasMany('App\DescripcionGeneral');
    }
    public function marcos(){
        return $this->hasMany('App\DescripcionMarco');
    }
    public function marias(){
        return $this->hasMany('App\DescripcionMaria');
    }
    public function montajes(){
        return $this->hasMany('App\DescripcionMontaje');
    }
    public function protecciones(){
        return $this->hasMany('App\DescripcionProteccion');
    }
}
