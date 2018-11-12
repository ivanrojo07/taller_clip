<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('nocotizacion');
            $table->date('fechaactual');
            $table->date('fechaentrega');
            $table->decimal('totalordenes',12,2);
            $table->decimal('totalmanodeobra',12,2);
            $table->decimal('totalvarios',12,2);
            $table->decimal('totalenvios',12,2);
            $table->double('ganancia', 8, 2);
            $table->double('incremento', 8, 2);
            $table->decimal('totalproyecto',12,2);
            $table->double('resultado', 12, 2);
            $table->double('totalneto', 12, 2);
            $table->string('correo');
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
        Schema::dropIfExists('cotizacions');
    }
}
