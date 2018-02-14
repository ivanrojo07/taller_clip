<?php

namespace App;

use App\ClienteDatosGen;
use Laravel\Scout\Searchable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Giro extends Model
{
    //
    use Sortable, SoftDeletes;
    protected $table = 'giro';
    protected $fillable=['id','nombre','etiqueta'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable=['id','nombre', 'etiqueta'];

    public function datosGen(){
    	return $this->hasOne(ClienteDatosGen::class);
    }
}
