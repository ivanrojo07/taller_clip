<?php

namespace App\Http\Controllers\Proveedor;

use App\Proveedor;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProveedorController extends Controller{

 // use Alert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::sortable()->paginate(5);
        return view('proveedores.index', ['proveedores' => $proveedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
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
        $proveedor = Proveedor::where('rfc', $request->rfc)->get();
        if (count($proveedor) > 0)
            return redirect()->back()->with('errors', 'El RFC ya existe');
        $proveedor = Proveedor::create($request->all());
        Alert::success("Proveedor agregado con éxito.");
        return redirect()->route('proveedores.show', ['proveedor' => $proveedor]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\provedore  $provedore
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedores.view', ['proveedor' => $proveedor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        dd($proveedor);
        return view('proveedores.edit', ['proveedor' => $proveedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $provedore)
    {
        
        $provedore->update($request->all());
        Alert::success('Proveedor actualizado')->persistent("Cerrar");
        return redirect()->route('provedores.show',['provedore'=>$provedore]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provedor $provedore)
    {
        //
    }
    public function buscar(Request $request){
    // dd($request);
    $query = $request->input('busqueda');
    $wordsquery = explode(' ',$query);
    $provedores = Provedor::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
            $q->orWhere('nombre','LIKE',           "%$word%")
                ->orWhere('apellidopaterno','LIKE',"%$word%")
                ->orWhere('apellidomaterno','LIKE',"%$word%")
                ->orWhere('razonsocial','LIKE',    "%$word%")
                ->orWhere('rfc','LIKE',            "%$word%")
                ->orWhere('alias','LIKE',          "%$word%")
                ->orWhere('tipopersona','LIKE',    "%$word%");
            }
        })->get();
    return view('provedores.busqueda', ['provedores'=>$provedores]);
        

    }


}