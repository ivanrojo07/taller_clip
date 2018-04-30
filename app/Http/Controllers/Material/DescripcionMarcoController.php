<?php

namespace App\Http\Controllers\Material;

use App\DescripcionMarco;
use App\EspesorMarco;
use App\MedidasMarco;
use App\ColorMarco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class DescripcionMarcoController extends Controller
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
        $descripciones=DescripcionMarco::orderBy('descripcion')->get();
        $espesores    =EspesorMarco::orderBy('espesor')->get();
        $medidas      =MedidasMarco::orderBy('medidas')->get();
        $colores      =ColorMarco::orderBy('color')->get();

         return view('layouts.material',
                    ['descripciones'=>$descripciones,
                     'espesores'    =>$espesores,
                     'medidas'      =>$medidas,
                     'colores'      =>$colores,
                     'nombre'       =>'Marcos y Bastidores',
                     'class'        =>'fa fa-columns',
                     'ruta'         =>'des_marco.store'      
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

            $exist=DescripcionMarco::where('descripcion',$request->descripcion)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe esa Descripción');}else{
            DescripcionMarco::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nueva Descripción');}

        }else if($request->atributo=='espesor'){

            $exist=EspesorMarco::where('espesor',$request->espesor)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe ese Espesor');}else{
            EspesorMarco::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nuevo Espesor');}
        }
        else if($request->atributo=='medidas'){
            
            $exist=MedidasMarco::where('medidas',$request->medidas)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe esa Medida');}else{
            MedidasMarco::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nueva Medida');}

        } else if($request->atributo=='color'){
            
            $exist=ColorMarco::where('color',$request->color)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe ese Color');}else{
            ColorMarco::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nuevo Color');}
        }
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DescripcionMarco  $descripcionMarco
     * @return \Illuminate\Http\Response
     */
    public function show(DescripcionMarco $descripcionMarco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DescripcionMarco  $descripcionMarco
     * @return \Illuminate\Http\Response
     */
    public function edit(DescripcionMarco $descripcionMarco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DescripcionMarco  $descripcionMarco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DescripcionMarco $descripcionMarco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DescripcionMarco  $descripcionMarco
     * @return \Illuminate\Http\Response
     */
    public function destroy(DescripcionMarco $descripcionMarco)
    {
        //
    }
}
