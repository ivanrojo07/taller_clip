<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('nopiezas');
            $table->integer('alto');
            $table->integer('ancho');
            $table->string('medidas');
            $table->integer('profundidad');
            $table->string('tipo_material');
            $table->string('descripcion');

            $table->integer('orden_id')->unsigned();
            $table->foreign('orden_id')->references('id')->on('ordens');
            
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
        Schema::dropIfExists('obras');
    }
}
