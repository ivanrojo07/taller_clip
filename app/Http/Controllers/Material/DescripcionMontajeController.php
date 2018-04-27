<?php

namespace App\Http\Controllers\Material;

use App\DescripcionMontaje;
use App\EspesorMontaje;
use App\MedidasMontaje;
use App\ColorMontaje;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class DescripcionMontajeController extends Controller
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
        $descripciones=DescripcionMontaje::get();
        $espesores    =EspesorMontaje::get();
        $medidas      =MedidasMontaje::get();
        $colores      =ColorMontaje::get();

         return view('layouts.material',
                    ['descripciones'=>$descripciones,
                     'espesores'    =>$espesores,
                     'medidas'      =>$medidas,
                     'colores'      =>$colores,
                     'nombre'       =>'Montajes',
                     'class'        =>'fa fa-clone',
                     'ruta'         =>'des_montaje.store'      
                     ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->atributo=='descripcion'){

            DescripcionMontaje::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nueva Descripción');

        }else if($request->atributo=='espesor'){

            EspesorMontaje::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nuevo Espesor');
        }
        else if($request->atributo=='medidas'){
            
            MedidasMontaje::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nueva Medida');
        } else if($request->atributo=='color'){
            
            ColorMontaje::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nuevo Color');
        }
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DescripcionMontaje  $descripcionMontaje
     * @return \Illuminate\Http\Response
     */
    public function show(DescripcionMontaje $descripcionMontaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DescripcionMontaje  $descripcionMontaje
     * @return \Illuminate\Http\Response
     */
    public function edit(DescripcionMontaje $descripcionMontaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DescripcionMontaje  $descripcionMontaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DescripcionMontaje $descripcionMontaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DescripcionMontaje  $descripcionMontaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(DescripcionMontaje $descripcionMontaje)
    {
        //
    }
}
