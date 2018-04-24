<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class TipoCambio extends Model
{
    use Sortable, SoftDeletes;
    protected $table = 'tipo_cambios';
    protected $fillable=['cantidad','fecha'];
    protected $hidden=[ 'created_at','updated_at','deleted_at'];
    public $sortable=['fecha'];
}
