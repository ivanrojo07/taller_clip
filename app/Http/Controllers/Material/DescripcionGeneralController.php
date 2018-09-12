<?php

namespace App\Http\Controllers\Material;

use App\Colgadera;
use App\Adhesivo;
use App\Provedor;
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
        $materiales=General::orderBy('descripcion')->get();
        $descripciones=DescripcionGeneral::orderBy('descripcion')->get();
        $provedores=Provedor::get();
        return view('montajes.index',
                   ['descripciones'=>$descripciones,
                    'ruta'         =>'des_general.store',
                    'nombre'       =>'Generales',
                    'ruta1'        =>'general.store',
                    'materiales'   =>$materiales,
                    'provedores'   =>$provedores

               ]);
    }

    public function index2(){
        $generales = General::orderBy('descripcion')->get();
        return view('layouts.material2', ['temporales'=>$generales ]);
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
        $provedores    =Provedor::get();
        return view('layouts.generales',
                   ['colgaderas'=>$colgaderas,
                    'adhesivos' =>$adhesivos,
                    'nombre'       =>'Productos Generales',
                    'class'        =>'fa fa-clip',
                    'ruta'         =>'des_generales.store',
                    'ruta_frame'   =>'des_generales.index',
                    'provedores'   =>$provedores
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
          

    }

    public function save(Request $request){
        
        
        $materiales=null;

         if($request->atributo_c=='colgaderas'){

            $exist=Colgadera::where('colgadera',$request->colgadera)->get();

            if($exist->count()!=0){

            
                $materiales=Colgadera::orderBy('created_at','desc')->get();
                 $first=$materiales->first();
                return view('tablagenerales.error',['materiales'=>$materiales,
                                                    'first'     =>$first]);
             
           
           }else{

                Colgadera::create($request->all());
                $materiales=Colgadera::orderBy('created_at','desc')->get();
                $first=$materiales->first();
                return view('tablagenerales.tabla',['materiales'=>$materiales,
                                                    'first'     =>$first]);
            }
            

        }else if($request->atributo_a=='adhesivos'){

            $exist=Adhesivo::where('Adhesivo',$request->adhesivo)->get();

            if($exist->count()!=0){

            
                $materiales=Adhesivo::orderBy('created_at','desc')->get();
                 $first=$materiales->first();
                return view('tablagenerales.error',['materiales'=>$materiales,
                                                    'first'     =>$first]);
             
           
           }else{

                Adhesivo::create($request->all());
                $materiales=Adhesivo::orderBy('created_at','desc')->get();
                $first=$materiales->first();
                return view('tablagenerales.tabla',['materiales'=>$materiales,
                                                    'first'     =>$first]);
            }
        }
    }

    public function delete(Request $request){

       

        if($request->atributo=='colgaderas'){

            $colgadera=Colgadera::where('id',$request->id)->first();
            //dd($colgadera);
            $colgadera->delete();
            
            
            $materiales=Colgadera::orderBy('created_at','desc')->get();
            return view('tablagenerales.eliminado',['materiales'=>$materiales]);
            
            
            

        }else if($request->atributo=='adhesivos'){
            
             
         $adhesivo=Adhesivo::where('id',$request->id)->first();
            
            $adhesivo->delete();
            
            
            $materiales=Adhesivo::orderBy('created_at','desc')->get();
            return view('tablagenerales.eliminado',['materiales'=>$materiales]);
            
        }

    }


}
