<?php

namespace App\Http\Controllers\Montaje;

use App\Proteccion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ProteccionController extends Controller
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
        $lista=Proteccion::where('clave',$request->clave)->get();

        if(count($lista)){
            Alert::error('Error Message', 'Ya existe esa Clave y Proteccion');
        }else{

            $proteccion=Proteccion::create($request->all());
            Alert::success('Success Message', 'Se Agregó una Clave y Proteccion');
        }

        

        return redirect()->route('des_proteccion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proteccion  $proteccion
     * @return \Illuminate\Http\Response
     */
    public function show(Proteccion $proteccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proteccion  $proteccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Proteccion $proteccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proteccion  $proteccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proteccion $proteccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proteccion  $proteccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proteccion $proteccion)
    {
        $proteccion->delete();
        return redirect()->route('des_proteccion.index');
    }
}
