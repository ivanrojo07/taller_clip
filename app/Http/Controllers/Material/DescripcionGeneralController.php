<?php

namespace App\Http\Controllers\Material;

use App\Colgadera;
use App\Adhesivo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class DescripcionGeneralController extends Controller
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
       
        $colgaderas    =Colgadera::orderBy('colgadera')->get();
        $adhesivos     =Adhesivo::orderBy('adhesivo')->get();

        return view('layouts.generales',
                   ['colgaderas'=>$colgaderas,
                    'adhesivos' =>$adhesivos
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
        
         if($request->atributo=='colgaderas'){

            $exist=Colgadera::where('colgadera',$request->colgadera)->get();
            if(count($exist)!=0){Alert::error('Error Message', 'Ya existe esa Colgadera');}else{
                Colgadera::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nueva Colgadera');
            }
            

        }else if($request->atributo=='adhesivos'){
            $exist=Adhesivo::where('adhesivo',$request->adhesivo)->get();
             if(count($exist)!=0){Alert::error('Error Message', 'Ya existe ese Adhesivo');}else{
            Adhesivo::create($request->all());
            Alert::success('Success Message', 'Se Agregó un nuevo Adhesivo');
        }
        }
        
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DescripcionGeneral  $descripcionGeneral
     * @return \Illuminate\Http\Response
     */
    public function show(DescripcionGeneral $descripcionGeneral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DescripcionGeneral  $descripcionGeneral
     * @return \Illuminate\Http\Response
     */
    public function edit(DescripcionGeneral $descripcionGeneral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DescripcionGeneral  $descripcionGeneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DescripcionGeneral $descripcionGeneral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DescripcionGeneral  $descripcionGeneral
     * @return \Illuminate\Http\Response
     */
    public function destroy(DescripcionGeneral $descripcionGeneral)
    {
        //
    }
}
