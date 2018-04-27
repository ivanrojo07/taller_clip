<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class ColorMontaje extends Model
{
    use Sortable, SoftDeletes;
    protected $table = 'color_montajes';
    protected $fillable=['color'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable=['color','created_at'];
}
