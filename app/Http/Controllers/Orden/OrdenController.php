<?php

namespace App\Http\Controllers\Orden;

use App\Orden;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Montaje\MarcoController;
use App\Http\Controllers\Montaje\ProteccionController;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Orden::create($request->all());
        //    return view('productos.create');
        dd('hola');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(Orden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orden $orden)
    {
        //
    }

    public function buscarMateriales(Request $request){
        // dd();
        //return $request->all();
        switch($request->seccion){
            case 'montaje':
                // return 'hola';
                return MontajeController::index2($request);
                break;
            case 'proteccion':
                return ProteccionController::index2($request);
                break;
            case 'marcos':
                return MarcoController::index2($request);
                break;
            case 'marialuisa':
                return MariaController::index2($request);
                break;
            case 'generales':
                return GeneralController::index2($request);
                break;
            default: break;
        }
    }

    public function cotizar(){
        
    }

    public function getMarco(){
        return view('productos.tablamateriales');
    }
}
