<?php

namespace App\Http\Controllers\Material;

use App\Descripcion;
use App\Http\Controllers\Controller;
use App\Material;
use App\Proveedor;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $materiales = Material::paginate(10);

        return view('material.index',['materiales'=>$materiales]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit=false;
        $proveedores = Proveedor::get();
        $alert = null;
        return view('material.create', ['edit'=>$edit, 'alert'=>$alert, "provedores"=>$proveedores]);
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
        $material->descripcion = $request->descripcion;
        $material->clave = $request->clave;
        $material->ancho = $request->ancho;
        $material->alto = $request->alto;
        $material->espesor = $request->espesor;
        $material->medidas = $request->medidas;
        $material->color = $request->color;
        $material->proveedor_id = $request->proveedor;
        $material->precio = $request->precio;
        $material->costo = $request->costo;
        // ¿por que tipo1?
        $material->tipo = 'tipo1';

        $material->save();
        $alert = ['message'=>"Material ".$material->clave." registrado", 'class'=>'success'];
        return redirect()->route('material.create')->with('alert',$alert);
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
        $edit=true;
        $proveedores = Proveedor::get();
        // dd($material);
        $alert= null;
        return view('material.create', ['edit'=>$edit,'alert'=>$alert, "material"=>$material, "provedores"=>$proveedores]);
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
        $material->seccion = $request->seccion;
        $material->descripcion = $request->descripcion;
        $material->clave = $request->clave;
        $material->ancho = $request->ancho;
        $material->alto = $request->alto;
        $material->espesor = $request->espesor;
        $material->medidas = $request->medidas;
        $material->color = $request->color;
        $material->proveedor_id = $request->proveedor;
        $material->precio = $request->precio;
        $material->costo = $request->costo;
        $material->ganancia = $request->ganancia;
        $material->save();
        return redirect()->route('material.index');
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

    public function buscarMateriales($seccion){
        $materiales = Material::where('seccion',$seccion)->get();
        // dd($materiales);
        return view('material.list',['materiales'=>$materiales]);
         $materiales = Material::where('seccion', $req->seccion)->with(['descripcion'])->get();
            return $materiales;
    }
}
