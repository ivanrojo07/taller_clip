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
            $table->integer('ancho')->unsigned();
            $table->integer('alto')->unsigned();
            $table->integer('espesor')->unsigned();
            $table->string('medidas');
            $table->string('color');
            $table->string('tipo');
            $table->string('proveedor_id');
            // $table->integer('proveedor_id')->unsigned();
            // $table->foreign('proveedor_id')->references('id')->on('clientes');

            $table->float('precio', 8, 2);
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
