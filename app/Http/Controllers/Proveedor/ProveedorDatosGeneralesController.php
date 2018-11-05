<?php

namespace App\Http\Controllers\Proveedor;

use App\DatosGeneralesProveedor;
use App\FormaContacto;
use App\Giro;
use App\Http\Controllers\Controller;
use App\Proveedor;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ProveedorDatosGeneralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($proveedor)
    {
        $proveedor = Proveedor::find($proveedor);
        $datos = $proveedor->generales;
        if($datos == null)
            return redirect()->route('proveedores.datosGenerales.create', ['proveedor' => $proveedor]);;
        $giro = Giro::find($datos->giro_id);
        $formaContacto = FormaContacto::find($datos->forma_contacto_id);
        return view('proveedores.datosGenerales.view',['datos' => $datos, 'proveedor' => $proveedor, 'giro' => $giro, 'formaContacto' => $formaContacto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($proveedor)
    {
        $proveedor = Proveedor::find($proveedor);
        $giros = Giro::get();
        $formaContactos = FormaContacto::get();
        return view('proveedores.datosGenerales.create', ['proveedor' => $proveedor, 'giros' => $giros, 'formaContactos' => $formaContactos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $proveedor)
    {
        $proveedor = Proveedor::find($proveedor);
        $datos = new DatosGeneralesProveedor($request->all());
        $proveedor->generales()->save($datos);
        return redirect()->route('proveedores.datosGenerales.index', ['proveedor' => $proveedor]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        
        $datos = $proveedor->datosGeneralesProvedor;
        
        $giro='';
      if($datos->giro_id==null){
        $giro='NO DEFINIDO';
      }else{
        $giros=Giro::where('id',$datos->giro_id);
      $giro=$giros->nombre;
      }

       $formaContacto='';
      if($datos->forma_contacto_id==null){
        $formaContacto='NO DEFINIDO';
      }else{
        $formaContactos=FormaContacto::where('id',$datos->forma_contacto_id);
      $formaContacto=$formaContactos->nombre;
      }
        

        
       
        return view('proveedores.datosGenerales.view',
        ['datos' => $datos, 'proveedor' => $proveedor, 'giro' => $giro, 'formaContacto' => $formaContacto]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit($proveedor)
    {   
        $proveedor = Proveedor::find($proveedor);
        $datos = $proveedor->generales;
        $giros = Giro::get();
        $formaContactos = FormaContacto::get();
        return view('proveedores.datosGenerales.edit', ['proveedor' => $proveedor, 'datos' => $datos, 'giros' => $giros, 'formaContactos' => $formaContactos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $proveedor, $generales)
    {
        $proveedor = Proveedor::find($proveedor);
        $proveedor->generales()->update($request->except(['_method', '_token']));
        return redirect()->route('proveedores.datosGenerales.index', ['proveedor' => $proveedor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
