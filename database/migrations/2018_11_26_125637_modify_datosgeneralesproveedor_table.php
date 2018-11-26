<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyDatosgeneralesproveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datos_generales_provedor', function (Blueprint $table) {
            $table->dropForeign(['forma_contacto_id']);
            $table->dropColumn('forma_contacto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datos_generales_provedor', function (Blueprint $table) {
            //
        });
    }
}
