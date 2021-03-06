<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('apellidopaterno')->nullable();
            $table->string('apellidomaterno')->nullable();
            $table->string('razonsocial')->nullable();
            $table->enum('tipopersona', ['Fisica', 'Moral'])->nullable();
            $table->string('contactop')->nullable();
            $table->string('mail')->nullable();
            $table->string('rfc')->nullable();
            $table->string('tel_casa')->nullable();
            $table->string('tel_oficina')->nullable();
            $table->string('tel_celular')->nullable();
            $table->string('calle')->nullable();
            $table->string('numext')->nullable();
            $table->string('numinter')->nullable();
            $table->string('cp')->nullable();
            $table->string('colonia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado')->nullable();
            $table->string('referencia')->nullable();
            $table->string('calles')->nullable();
            $table->string('formac')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
