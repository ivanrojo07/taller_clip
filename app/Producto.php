<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'orden';
    protected $fillable=['id',
    					 'nombre',
						 'fecha',
                         'descripcion'];
}
