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
            $table->decimal('alto_obra');
            $table->decimal('ancho_obra');
            $table->decimal('profundidad_obra');
            //
            $table->string('tipo_material_obra');
            $table->text('descripcion_obra');
            $table->decimal('precio_obra',12,2);
            $table->double('ancho_marco', 15, 8);
            $table->double('largo_marco', 15, 8);
            $table->double('profundidad_marco', 15, 8);
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
