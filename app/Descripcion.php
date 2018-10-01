<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descripcion extends Model
{
    protected $table = 'descripcions';
    protected $fillable = ['seccion',
                         'descripcion'];

    public function material(){
        return $this->hasOne('App\Material');
    }

}
