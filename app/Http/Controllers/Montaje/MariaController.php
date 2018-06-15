<?php

namespace App\Http\Controllers\Montaje;

use App\Maria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class MariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
         $lista=Maria::where('clave',$request->clave)->get();

        if(count($lista)){
            Alert::error('Error Message', 'Ya existe esa Clave y Maria');
        }else{

            $maria=Maria::create($request->all());
            Alert::success('Success Message', 'Se Agregó una Clave y Maria');
        }

        

        return redirect()->route('des_maria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Maria  $maria
     * @return \Illuminate\Http\Response
     */
    public function show(Maria $maria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maria  $maria
     * @return \Illuminate\Http\Response
     */
    public function edit(Maria $maria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maria  $maria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maria $maria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maria  $maria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Maria $maria)
    {
        $maria=Maria::where('id',$request->id)->first();
        
        $maria->delete();
        return redirect()->route('des_maria.index');
    }
}
