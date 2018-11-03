<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObraOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obra_orden', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('obra_id')->unsigned();
            $table->foreign('obra_id')->references('id')->on('obras');
            $table->integer('orden_id')->references('id')->on('ordens');
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
        Schema::dropIfExists('obra_orden');
    }
}
