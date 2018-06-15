<?php

namespace App\Http\Controllers\Material;

use App\DescripcionMontaje;
use App\EspesorMontaje;
use App\MedidasMontaje;
use App\ColorMontaje;
use App\Montaje;
use App\Provedor;
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
        $materiales=Montaje::orderBy('descripcion')->get();
        $descripciones=DescripcionMontaje::orderBy('descripcion')->get();
        $provedores=Provedor::get();
        return view('montajes.index',
                   ['descripciones'=>$descripciones,
                    'ruta'         =>'des_montaje.store',
                    'nombre'       =>'Montajes',
                    'ruta1'        =>'montaje.store',
                    'ruta2'        =>'montaje.destroy',
                    'objeto'       =>'montaje',
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
        $descripciones=DescripcionMontaje::orderBy('descripcion')->get();
        

         return view('layouts.material',
                    ['descripciones'=>$descripciones,
                     'nombre'       =>'Montajes',
                     'class'        =>'fa fa-clone',
                     'ruta'         =>'des_montaje.store',
                     'ruta_frame'   =>'des_montaje.index'      
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

            $exist=DescripcionMontaje::where('descripcion',$request->descripcion)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe esa Descripción');}else{
            DescripcionMontaje::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nueva Descripción');}

        }else if($request->atributo=='espesor'){

            $exist=EspesorMontaje::where('espesor',$request->espesor)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe ese Espesor');}else{
            EspesorMontaje::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nuevo Espesor');}
        }
        else if($request->atributo=='medidas'){
            
            $exist=MedidasMontaje::where('medidas',$request->medidas)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe esa Medida');}else{
            MedidasMontaje::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nueva Medida');}

        } else if($request->atributo=='color'){
            
            $exist=ColorMontaje::where('color',$request->color)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe ese Color');}else{
            ColorMontaje::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nuevo Color');}
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
