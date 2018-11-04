<?php

namespace App\Http\Controllers\Obra;

use App\Obra;
use App\Material;
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
        $obras = Obra::get();
        return view('obra.index',['obras'=>$obras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiales = Material::get();
        return view ('obra.create',['edit'=>false,'materiales'=>$materiales]);
        // orden=>1 ???
        // return view('obra.create', ['orden_id'=>1, 'nopiezas'=>1]);
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
        // $obra = new Obra;
        $obra = Obra::create($request->all());
        for ($i = 0; $i < sizeof($request->materiales) ; $i++) {
            $obra->materiales()->attach($request->materiales[$i],['cantidad'=>$request->cantidad[$i]]);
        }
        $obra->precio_obra = $obra->total();
        // dd($obra->total());
        $obra->save();
        // $obra->orden_id = $request->orden_id;
        // $obra->nombre = $request->nombre;
        // $obra->nopiezas = $request->nopiezas;
        // $obra->alto = $request->alto;
        // $obra->ancho = $request->ancho;
        // $obra->medidas = $request->medidas;
        // $obra->profundidad = $request->profundidad;
        // $obra->tipo_material = 'tipo de material';
        // $obra->descripcion = $request->descripcion;
        // $obra->save();
        // for($i = 0; $i<sizeof($request->materiaids); $i++ ){
        //     $obra->materiales()->attach($request->materiaids[$i], ['cantidad'=>$request->cantidades[$i]]);
        // }
        $alert = ['message'=>"Obra ".$obra->nombre." registrado", 'class'=>'success'];
        return redirect()->route('obra.create')->with('alert',$alert);
        // return response()->json(['materiales'=>$obra->materiales], 201);
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
    public function getObra(Obra $obra)
    {
        $obra->materiales;
        return response()->json(['obra'=>$obra],200);
    }
}
