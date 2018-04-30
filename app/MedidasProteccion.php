<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class MedidasProteccion extends Model
{
    use Sortable, SoftDeletes;
    protected $table = 'medidas_proteccions';
    protected $fillable=['medidas'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable=['medidas','created_at'];
}
