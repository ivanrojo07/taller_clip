<?php

namespace App\Http\Controllers\Material;

use App\Material;
use App\Descripcion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
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
        $descripciones = Descripcion::get();
        $materiales = Material::get();
        return view('material.create', ['materiales'=>$materiales, 'descripciones'=>$descripciones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material = new Material;
        $material->seccion = $request->seccion;
        $material->descripcion_id = $request->descripcion;
        $material->clave = $request->clave;
        $material->ancho = $request->ancho;
        $material->alto = $request->alto;
        $material->espesor = $request->espesor;
        $material->medidas = $request->medidas;
        $material->color = $request->color;
        $material->proveedor_id = $request->proveedor;
        $material->precio = $request->precio;
        $material->tipo = 'tipo1';
        $material->save();
        return redirect()->route('material.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }

    public function buscarMateriales(){
        
    }
}
