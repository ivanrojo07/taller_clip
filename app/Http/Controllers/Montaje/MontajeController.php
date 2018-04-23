<?php

namespace App\Http\Controllers\Montaje;

use App\Montaje;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MontajeController extends Controller
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
         return view('layouts.material');
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
        //
    }
}
