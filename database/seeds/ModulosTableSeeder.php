<?php

use App\Modulo;
use Illuminate\Database\Seeder;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$modulos = array(
    		array('nombre' => 'seguridad'),
            array('nombre' => 'clientes'),
            array('nombre' => 'rh'),
    		array('nombre' => 'materiales'),
    		array('nombre' => 'ordenes'),
    		array('nombre' => 'cotizacion'),
            array('nombre' => 'proveedores'),
            array('nombre' => 'cambio'),
            array('nombre'=>'obras')
    	);

    	Modulo::insert($modulos);
    }
}
