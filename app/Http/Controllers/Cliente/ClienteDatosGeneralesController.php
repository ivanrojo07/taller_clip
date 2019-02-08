<?php

namespace App\Http\Controllers\Cliente;

use App\ClienteDatosGenerales;
use App\Giro;
use App\FormaContacto;
use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteDatosGeneralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cliente)
    {
        $cliente = Cliente::find($cliente);
        $datos = $cliente->generales;
        if($datos == null)
            return redirect()->route('clientes.datosgenerales.create', ['cliente' => $cliente]);;
        $giro = Giro::find($datos->giro_id);
        $formaContacto = FormaContacto::find($datos->forma_contacto_id);
        return view('clientes.datosGenerales.view',['datos' => $datos, 'cliente' => $cliente, 'giro' => $giro, 'formaContacto' => $formaContacto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cliente)
    {
        $cliente = Cliente::find($cliente);
        $giros = Giro::get();
        $formaContactos = FormaContacto::get();
        return view('clientes.datosGenerales.create', ['cliente' => $cliente, 'giros' => $giros, 'formaContactos' => $formaContactos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cliente)
    {
      
        $cliente = Cliente::find($cliente);
        $datos = new ClienteDatosGenerales($request->all());
        $cliente->generales()->save($datos);
        return redirect()->route('clientes.datosgenerales.index', ['cliente' => $cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClienteDatosGenerales  $clienteDatosGenerales
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
      
        $datos = $cliente->generales;
        
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
        
       
        return view('clientes.datosGenerales.view', ['datos' => $datos, 'cliente' => $cliente, 'giro' => $giro, 'formaContacto' => $formaContacto]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClienteDatosGenerales  $clienteDatosGenerales
     * @return \Illuminate\Http\Response
     */
    public function edit($cliente)
    {
        $cliente = Cliente::find($cliente);
        $datos = $cliente->generales;
        $giros = Giro::get();
        $formaContactos = FormaContacto::get();
        return view('clientes.datosGenerales.edit', ['cliente' => $cliente, 'datos' => $datos, 'giros' => $giros, 'formaContactos' => $formaContactos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClienteDatosGenerales  $clienteDatosGenerales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cliente, $generales)
    {
        $cliente = Cliente::find($cliente);
        $cliente->generales()->update($request->except(['_method', '_token']));
        return redirect()->route('clientes.datosgenerales.index', ['cliente' => $cliente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClienteDatosGenerales  $clienteDatosGenerales
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClienteDatosGenerales $clienteDatosGenerales)
    {
        //
    }
}
