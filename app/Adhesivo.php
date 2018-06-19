<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Adhesivo extends Model
{
    use Sortable, SoftDeletes;
    protected $table = 'adhesivos';
    protected $fillable=['adhesivo','precio','proveedor'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable=['adhesivo','created_at'];
}
