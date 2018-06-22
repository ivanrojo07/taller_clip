<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('getareas','Area\AreaController@getAreas');
Route::get('getcontratos','Precargas\TipoContratoController@getContratos');
Route::get('getpuestos','Puesto\PuestoController@getPuestos');
Route::get('getSucursal','Sucursal\SucursalController@getSucursal');
Route::get('getbancos','Banco\BancoController@getBancos');
Route::get('getbajas','Precargas\TipoBajaController@getBajas');
Route::get('getgiros','Giro\GiroController@getGiros');
Route::get('getformas','FormaContacto\FormaContactoController@getFormas');
Route::get('getfaltas','Falta\FaltaController@getFaltas');
Route::get('getprov','Provedor\ProvedorController@getProveedor');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('prospectos', 'Personal\PersonalController@search');
// Route::get('clientes', 'Personal\PersonalController@clientes');
// Route::get('prospectos', 'Personal\PersonalController@prospectos');
Route::resource('clientes', 'Cliente\ClienteController');
Route::resource('clientes.direccion','Cliente\ClienteDireccionController');
Route::resource('clientes.contactos','Cliente\ClienteContactosController');
Route::resource('clientes.datos','Cliente\ClienteDatosGenController');
Route::resource('clientes.crm','Cliente\ClienteCRMController');
Route::resource('personals', 'Personal\PersonalController');
Route::resource('personals.datoslaborales', 'Personal\PersonalDatosLabController');
Route::resource('personals.referenciapersonales', 'Personal\PersonalRefPersonalController');
Route::resource('personals.datosbeneficiario', 'Personal\PersonalBeneficiarioController');
Route::resource('personals.producto','Personal\PersonalProductoController');
Route::resource('personals.crm','Personal\PersonalCRMController');

Route::get('buscarcliente','Cliente\ClienteController@buscar');

Route::resource('personals.products.transactions', 'Personal\PersonalProductTransactionController',['only'=>'store']);
Route::resource('personals.product','Personal\PersonalProductController', ['only'=>'index']);
// Route::resource('datoslaborales','DatosLabController');
// Route::resource('referenciapersonales','RefPersonalController');
// Route::resource('beneficiarios', 'BeneficiariosController');
// Route::resource('prodpersonal','ProdUsuarioController');
Route::get('pruebas','PruebasController@create');
Route::resource('empleados','Empleado\EmpleadoController');
Route::resource('empleados.datoslaborales','Empleado\EmpleadosDatosLabController');
Route::resource('empleados.estudios','Empleado\EmpleadosEstudiosController');
Route::resource('empleados.emergencias','Empleado\EmpleadosEmergenciasController');
Route::resource('empleados.vacaciones','Empleado\EmpleadosVacacionesController');
Route::resource('empleados.faltas','Empleado\EmpleadosFaltasAdministrativasController');
Route::resource('contratos','Precargas\TipoContratoController');
Route::resource('bajas','Precargas\TipoBajaController');

Route::get('buscarempleado','Empleado\EmpleadoController@buscar');
    
//-----  Sólo vistas  ---------------------------------------
Route::get('sucursales',function(){
	return View::make('Sucursales.index');
});
Route::get('gastos',function(){

	return View::make('Gastos.formulario');
});
Route::get('consulta',function(){

	return View::make('Empleadoconsulta.consulta');
});
Route::get('bonos',function(){

	return View::make('Empleadobonos.bonos');
});
Route::get('comision',function(){

	return View::make('Empleadobonos.comision');
});

Route::get('cotizacion',function(){

	return View::make('cotizacion.cot');
});

//   11/Dic/2017
//-----------------------------------------------------

Route::resource('formacontactos','FormaContacto\FormaContactoController');

//Route::resource('clientes','Personal\PersonalController');
Route::resource('clientes','Cliente\ClienteController');
Route::resource('clientes.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('clientes.contacto','Personal\PersonalContactoController');
Route::resource('clientes.datosgenerales','Personal\PersonalDatosGeneralesController', ['except'=>'show']);


//-----------------------------------------------------
Route::resource('provedores','Provedor\ProvedorController');
Route::get('buscarprovedor','Provedor\ProvedorController@buscar');
Route::resource('provedores.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('provedores.datosgenerales','Provedor\ProvedorDatosGeneralesController', ['except'=>'show']);
Route::resource('provedores.contacto','Provedor\ProvedorContactoController');
Route::resource('provedores.crm','Provedor\ProvedorCRMController');
//----------------------------------------------------------
Route::resource('giros','Giro\GiroController', ['except'=>'show']);
//---------------------------------------------------------------------


//---------------------------------------------------------------------------
Route::resource('areas','Area\AreaController', ['except'=>'show']);
Route::resource('puestos','Puesto\PuestoController', ['except'=>'show']);
Route::resource('bancos','Banco\BancoController', ['except'=>'show']);
Route::resource('faltas','Falta\FaltaController', ['except'=>'show']);
//--------------------------------------------------------------------
Route::resource('gastos','Gasto\GastoController', ['except'=>'show']);


Route::resource('sucursales','Sucursal\SucursalController');
Route::get('sucursales.create','Sucursal\SucursalController@create');
Route::get('sucursales.index','Sucursal\SucursalController@index');

Route::resource('sucursal','Empleado\EmpleadoSucursalController');
//-------------------------------------------------------------------
Route::resource('montaje', 'Montaje\MontajeController');
Route::resource('producto', 'Producto\ProductoController');
Route::resource('des_montaje', 'Material\DescripcionMontajeController');
Route::resource('des_proteccion', 'Material\DescripcionProteccionController');
Route::resource('des_marco', 'Material\DescripcionMarcoController');
Route::resource('des_maria', 'Material\DescripcionMariaController');
Route::resource('des_generales', 'Material\DescripcionGeneralController');
Route::resource('proteccion', 'Montaje\ProteccionController');
Route::resource('marco', 'Montaje\MarcoController');
Route::resource('maria', 'Montaje\MariaController');
Route::resource('general', 'Montaje\GeneralController');
Route::get('save_gen','Material\DescripcionGeneralController@save');
Route::get('eliminar','Material\DescripcionGeneralController@delete');
//----------------------------------------------------------------
Route::resource('cambio', 'TipoCambio\TipoCambioController', ['except'=>'show']);

Route::get('cotizacion','Producto\ProductoController@cotizar') -> name("cotizacion");

Route::get('historial_cotizacion',function(){

	return View::make('cotizacion.historial');
});

Route::get('historial_orden',function(){

	return View::make('productos.historial');
});
