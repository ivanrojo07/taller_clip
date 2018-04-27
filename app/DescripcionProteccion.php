<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class DescripcionProteccion extends Model
{
    use Sortable, SoftDeletes;
    protected $table = 'descripcion_proteccions';
    protected $fillable=['descripcion'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable=['descripcion','created_at'];
}
