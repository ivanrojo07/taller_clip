<?php

namespace App\Http\Controllers\Material;

use App\DescripcionProteccion;
use App\EspesorProteccion;
use App\MedidasProteccion;
use App\ColorProteccion;
use App\Proteccion;
use App\Provedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class DescripcionProteccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales=Proteccion::orderBy('descripcion')->get();
        $descripciones=DescripcionProteccion::orderBy('descripcion')->get();
        $provedores=Provedor::get();
        return view('montajes.index',
                   ['descripciones'=>$descripciones,
                    'ruta'         =>'des_proteccion.store',
                    'nombre'       =>'Proteccion',
                    'ruta1'        =>'proteccion.store',
                    'ruta2'        =>'proteccion.destroy',
                    'objeto'       =>'proteccion',
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
        $descripciones=DescripcionProteccion::orderBy('descripcion')->get();
        

         return view('layouts.material',
                    ['descripciones'=>$descripciones,
                     'nombre'       =>'Protecciones',
                     'class'        =>'fa fa-object-group',
                     'ruta'         =>'des_proteccion.store',
                     'ruta_frame'   =>'des_proteccion.index'      
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

            $exist=DescripcionProteccion::where('descripcion',$request->descripcion)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe esa Descripción');}else{
            DescripcionProteccion::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nueva Descripción');}

        }else if($request->atributo=='espesor'){

            $exist=EspesorProteccion::where('espesor',$request->espesor)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe ese Espesor');}else{
            EspesorProteccion::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nuevo Espesor');}
        }
         else if($request->atributo=='color'){
            
            $exist=ColorProteccion::where('color',$request->color)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe ese Color');}else{
            ColorProteccion::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nuevo Color');}
        }
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DescripcionProteccion  $descripcionProteccion
     * @return \Illuminate\Http\Response
     */
    public function show(DescripcionProteccion $descripcionProteccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DescripcionProteccion  $descripcionProteccion
     * @return \Illuminate\Http\Response
     */
    public function edit(DescripcionProteccion $descripcionProteccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DescripcionProteccion  $descripcionProteccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DescripcionProteccion $descripcionProteccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DescripcionProteccion  $descripcionProteccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(DescripcionProteccion $descripcionProteccion)
    {
        //
    }
}
