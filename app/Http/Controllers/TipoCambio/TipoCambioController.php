<?php

namespace App\Http\Controllers\TipoCambio;

use App\TipoCambio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class TipoCambioController extends Controller
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
        $tipoCambios=TipoCambio::get();
        $tipoCambios=$tipoCambios->sortByDesc('created_at');
        
        return view('tipocambio.create',['tipoCambios'=>$tipoCambios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoCambio  $tipoCambio
     * @return \Illuminate\Http\Response
     */
    public function show(TipoCambio $tipoCambio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoCambio  $tipoCambio
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoCambio $tipoCambio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoCambio  $tipoCambio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoCambio $tipoCambio)
    {
         $tipoCambio = TipoCambio::create($request->all());
         return redirect()->route('cambio.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoCambio  $tipoCambio
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoCambio $tipoCambio)
    {
        //
    }
}
