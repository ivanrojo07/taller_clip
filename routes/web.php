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
	return redirect()->route('login');
});

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
Route::get('getcontacto','FormaContacto\FormaContactoController@getFormas');

Route::get('fecha','Crm\CrmController@porFecha')->name('fecha');
Route::get('getclient', 'Cliente\ClienteController@getClient');
Route::resource('clientes', 'Cliente\ClienteController');
Route::resource('clientes.direccionFiscal','Cliente\ClienteDireccionFiscalController')->except(['show', 'destroy']);
Route::resource('clientes.direccionEntrega','Cliente\ClienteDireccionEntregaController')->except(['show', 'destroy']);
Route::resource('clientes.descuentos','Cliente\ClienteDescuentoController');
Route::resource('clientes.crm','Cliente\ClienteCRMController');
Route::resource('personals', 'Personal\PersonalController');
Route::resource('personals.datoslaborales', 'Personal\PersonalDatosLabController');
Route::resource('personals.referenciapersonales', 'Personal\PersonalRefPersonalController');
Route::resource('personals.datosbeneficiario', 'Personal\PersonalBeneficiarioController');
Route::resource('personals.producto','Personal\PersonalProductoController');
Route::resource('personals.crm','Personal\PersonalCRMController');
Route::post('crmstore','Crm\CrmController@store')->name('crmstore');
Route::get('buscarcliente','Cliente\ClienteController@buscar');

Route::resource('personals.products.transactions', 'Personal\PersonalProductTransactionController',['only'=>'store']);
Route::resource('personals.product','Personal\PersonalProductController', ['only'=>'index']);
Route::get('pruebas','PruebasController@create');
Route::resource('empleados','Empleado\EmpleadoController');
Route::resource('empleados.datoslaborales','Empleado\EmpleadosDatosLabController');
Route::resource('empleados.estudios','Empleado\EmpleadosEstudiosController');
Route::resource('empleados.emergencias','Empleado\EmpleadosEmergenciasController');
Route::resource('empleados.vacaciones','Empleado\EmpleadosVacacionesController');
Route::resource('empleados.faltas','Empleado\EmpleadosFaltasAdministrativasController');
Route::resource('contratos','Precargas\TipoContratoController');
Route::resource('bajas','Precargas\TipoBajaController');
Route::resource('crm','Crm\CrmController');
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



//   11/Dic/2017
//-----------------------------------------------------

Route::resource('formacontactos','FormaContacto\FormaContactoController');

//Route::resource('clientes','Personal\PersonalController');

//-----------------------------------------------------
Route::resource('provedores','Provedor\ProvedorController');
Route::resource('provedores.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('provedores.datosgenerales','Provedor\ProvedorDatosGeneralesController');
Route::resource('provedores.contacto','Provedor\ProvedorContactoController');
Route::resource('provedores.datosbancarios','Provedor\ProveedorDatosBancariosController');
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



//----------------------------------------------------------------
Route::resource('cambio', 'TipoCambio\TipoCambioController', ['except'=>'show']);




Route::get('historial_orden',function(){

	return View::make('productos.historial');
});

/*
 * Seguridad: Armando 12/09/2018
 */

Route::get('/home', function () {
	if(Auth::check()){
    	return view('welcome');

	}else{
		return redirect()->route('login');
	}
})->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/denegado',function(){
	return view('errors.denegado');
})->name('denegado');

Route::resource('perfil', 'Perfil\PerfilController');
Route::resource('usuario', 'Usuario\UsuarioController');


Route::resource('material', 'Material\MaterialController');
Route::resource('descripcion', 'Descripcion\DescripcionController');
Route::get('getdescripciones', 'Descripcion\DescripcionController@');
Route::resource('orden', 'Orden\OrdenController');
Route::resource('obra','Obra\ObraController');


Route::get('/buscarmaterialporseccion','Material\MaterialController@buscarMateriales')->name('buscarmaterialporseccion');

Route::resource('cotizacion','Cotizacion\CotizacionController');
