<?php

namespace App\Http\Controllers\Material;

use App\DescripcionMaria;
use App\EspesorMaria;
use App\MedidasMaria;
use App\ColorMaria;
use App\Maria;
use App\Provedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class DescripcionMariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales=Maria::orderBy('descripcion')->get();
        $descripciones=DescripcionMaria::orderBy('descripcion')->get();
        $provedores=Provedor::get();
        return view('montajes.index',
                   ['descripciones'=>$descripciones,
                    'ruta'         =>'des_maria.store',
                    'nombre'       =>'Maria Luisa',
                    'ruta1'        =>'maria.store',
                    'materiales'   =>$materiales,
                    'provedores'   =>$provedores

               ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $descripciones=DescripcionMaria::orderBy('descripcion')->get();
        $espesores    =EspesorMaria::orderBy('espesor')->get();
        $medidas      =MedidasMaria::orderBy('medidas')->get();
        $colores      =ColorMaria::orderBy('color')->get();

         return view('layouts.material',
                    ['descripciones'=>$descripciones,
                     'espesores'    =>$espesores,
                     'medidas'      =>$medidas,
                     'colores'      =>$colores,
                     'nombre'       =>'María Luisa',
                     'class'        =>'fa fa-image',
                     'ruta'         =>'des_maria.store',
                     'ruta_frame'   =>'des_maria.index'      
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

            $exist=DescripcionMaria::where('descripcion',$request->descripcion)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe esa Descripción');}else{
            DescripcionMaria::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nueva Descripción');}

        }else if($request->atributo=='espesor'){

            $exist=EspesorMaria::where('espesor',$request->espesor)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe ese Espesor');}else{
            EspesorMaria::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nuevo Espesor');}
        }
        else if($request->atributo=='medidas'){
            
            $exist=MedidasMaria::where('medidas',$request->medidas)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe esa Medida');}else{
            MedidasMaria::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nueva Medida');}

        } else if($request->atributo=='color'){
            
            $exist=ColorMaria::where('color',$request->color)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe ese Color');}else{
            ColorMaria::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nuevo Color');}
        }
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DescripcionMaria  $descripcionMaria
     * @return \Illuminate\Http\Response
     */
    public function show(DescripcionMaria $descripcionMaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DescripcionMaria  $descripcionMaria
     * @return \Illuminate\Http\Response
     */
    public function edit(DescripcionMaria $descripcionMaria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DescripcionMaria  $descripcionMaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DescripcionMaria $descripcionMaria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DescripcionMaria  $descripcionMaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(DescripcionMaria $descripcionMaria)
    {
        //
    }
}
