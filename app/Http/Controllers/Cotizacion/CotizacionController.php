<?php

namespace App\Http\Controllers\Cotizacion;

use App\Cotizacion;
use App\Vario;
use App\Manodeobra;
use App\Envio;
use App\Orden;
use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones = Cotizacion::get();
        return view('cotizacion.historial', ['cotizaciones'=>$cotizaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordenes = Orden::get();
        $clientes = Cliente::get();
        $edit=false;
        return view('cotizacion.create',['ordenes'=>$ordenes,'clientes'=>$clientes,'edit'=>$edit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $cotizaciones = Cotizacion::get();
        $cotizacion = new Cotizacion($request->all());
        $cotizacion->save();
        

        $variosm = $request->variosm;
        $variosd = $request->variosd;

        $manodeobrasd = $request->manodeobrasd;
        $manodeobrasn = $request->manodeobrasn;
        $manodeobrasp = $request->manodeobrasp;
        $manodeobrasm = $request->manodeobrasm;


        $enviosd = $request->enviosd;
        $enviosdi = $request->enviosdi;
        $enviosm = $request->enviosm;

        $ordenids = $request->ordenids;

        for($i = 0; $i < sizeof($variosm); $i++){
            $variot = new Vario([ 'descripcion'=>$variosd[$i], 'monto'=>$variosm[$i]]);
            $cotizacion->varios()->save($variot);
        }

        for($i = 0; $i < sizeof($manodeobrasd); $i++){
            $manodeobrat = new Manodeobra([ 'descripcion'=>$manodeobrasd[$i], 'monto'=>$manodeobrasn[$i] , 'nombre'=>$manodeobrasn[$i], 'puesto'=>$manodeobrasp[$i]]);
            $cotizacion->manodeobras()->save($manodeobrat);
        }

        for($i = 0; $i < sizeof($enviosd); $i++){
            $enviot = new Envio([ 'descripcion'=>$enviosd[$i], 'monto'=>$enviosm[$i] , 'direccion'=>$enviosdi[$i]]);
            $cotizacion->envios()->save($enviot);
        }

        for($i = 0; $i < sizeof($ordenids); $i++){

            $cotizacion->ordens()->attach($ordenids[$i]);
        }


        return view('cotizacion.historial',['cotizaciones'=>$cotizaciones]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizacion $cotizacion)
    {
        //
    }
}
