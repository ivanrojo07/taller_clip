<?php

namespace App\Http\Controllers\Descripcion;

use App\Descripcion;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Http\Controllers\Controller;

class DescripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $descripciones = Descripcion::where('seccion', $req->seccion)->get();
        return $descripciones;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $descripciones = Descripcion::get();
        return view('descripcion.create',['descripciones'=>$descripciones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seccion = $request->seccion;
        $descripcion = $request->descripcion;
        $des = new Descripcion;
        $des->seccion = $seccion;
        $des->descripcion = $descripcion;
        $des->save();
        return redirect()->route('descripcion.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Descripcion  $descripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Descripcion $descripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Descripcion  $descripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Descripcion $descripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Descripcion  $descripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Descripcion $descripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Descripcion  $descripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Descripcion $descripcion)
    {
        //
    }
}
