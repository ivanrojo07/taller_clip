<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialObraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_obra', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('obra_id')->unsigned();
            $table->foreign('obra_id')->references('id')->on('obras');

            $table->integer('material_id')->unsigned();
            $table->foreign('material_id')->references('id')->on('materials');
            
            $table->integer('cantidad')->unsigned();
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
        Schema::dropIfExists('material_obra');
    }
}
