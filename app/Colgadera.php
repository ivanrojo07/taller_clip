<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Colgadera extends Model
{
    use Sortable, SoftDeletes;
    protected $table = 'colgaderas';
    protected $fillable=['colgadera','precio','proveedor'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable=['colgadera','created_at'];
}
