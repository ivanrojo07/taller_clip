<?php

namespace App\Http\Controllers\Obra;

use App\Obra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObraController extends Controller
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
        return view('obra.create', ['orden_id'=>1, 'nopiezas'=>1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $obra = new Obra;
        $obra->orden_id = $request->orden_id;
        $obra->nombre = $request->nombre;
        $obra->nopiezas = $request->nopiezas;
        $obra->alto = $request->alto;
        $obra->ancho = $request->ancho;
        $obra->medidas = $request->medidas;
        $obra->profundidad = $request->profundidad;
        $obra->tipo_material = 'tipo de material';
        $obra->descripcion = $request->descripcion;
        $obra->save();
        for($i = 0; $i<sizeof($request->materiaids); $i++ ){
            $obra->materiales()->attach($request->materiaids[$i], ['cantidad'=>$request->cantidades[$i]]);
            var_dump($i);
        }
        dd($obra->materiales);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function show(Obra $obra)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function edit(Obra $obra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obra $obra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obra $obra)
    {
        //
    }
}
