<?php

namespace App\Http\Controllers\Montaje;

use App\Montaje;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class MontajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $montajes=Montaje::orderBy('clave_montaje')->get();
         return view('');
    }

    static function index2(Request $request){
        $materiales=Montaje::where([
            ['descripcion', $request->descripcion],
            ['alto',$request->alto],
            ['ancho', $request->ancho],
            ['color', $request->color],
            ['espesor', $request->espesor]                               
            ] )->get();
            // dd($materiales);
        return view('productos.tablamateriales', ['temporales'=>$materiales]);
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
        $lista=Montaje::where('clave',$request->clave)->get();

        if(count($lista)){
            Alert::error('Error Message', 'Ya existe esa Clave y Montaje');
        }else{

            $montaje=Montaje::create($request->all());
            Alert::success('Success Message', 'Se Agregó un Clave y Montaje');
        }

        

        return redirect()->route('des_montaje.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Montaje  $montaje
     * @return \Illuminate\Http\Response
     */
    public function show(Montaje $montaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Montaje  $montaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Montaje $montaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Montaje  $montaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Montaje $montaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Montaje  $montaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Montaje $montaje)
    {
        $montaje->delete();
        return redirect()->route('des_montaje.index');
    }
}
