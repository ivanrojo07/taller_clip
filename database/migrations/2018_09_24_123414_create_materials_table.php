<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave');
            $table->string('seccion');
            $table->decimal('ancho')->unsigned();
            $table->decimal('alto')->unsigned();
            $table->decimal('espesor')->unsigned();
             // eliminar y ver en donde se ocupa
            $table->string('color');
            $table->string('tipo');
            $table->string('descripcion');
            $table->integer('proveedor_id')->unsigned();
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->decimal('costo', 8, 2);
            $table->decimal('precio',8,2);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
