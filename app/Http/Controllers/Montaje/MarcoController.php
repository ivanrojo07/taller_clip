<?php

namespace App\Http\Controllers\Montaje;

use App\Marco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class MarcoController extends Controller
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
        $lista=Marco::where('clave',$request->clave)->get();

        if(count($lista)){
            Alert::error('Error Message', 'Ya existe esa Clave y Marco');
        }else{

            $marco=Marco::create($request->all());
            Alert::success('Success Message', 'Se Agregó una Clave y Marco');
        }

        

        return redirect()->route('des_marco.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marco  $marco
     * @return \Illuminate\Http\Response
     */
    public function show(Marco $marco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marco  $marco
     * @return \Illuminate\Http\Response
     */
    public function edit(Marco $marco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marco  $marco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marco $marco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marco  $marco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marco $marco)
    {
        $marco->delete();
        return redirect()->route('des_marco.index');
    }
}
