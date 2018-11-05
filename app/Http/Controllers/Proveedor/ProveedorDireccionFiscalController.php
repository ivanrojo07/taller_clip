<?php

namespace App\Http\Controllers\Proveedor;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\ProveedorDireccionFiscal;
use App\Http\Controllers\Controller;
use App\Proveedor;
use Illuminate\Http\Request;

class ProveedorDireccionFiscalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $proveedor = Proveedor::find($id);
        $direccion = $proveedor->fiscal;
        if($direccion == null)
            return redirect()->route('proveedores.direccionFiscal.create', ['proveedor' => $proveedor]);
        return view('proveedores.direccionFiscal.view', ['direccion' => $direccion, 'proveedor' => $proveedor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedores.direccionFiscal.create', ['proveedor' => $proveedor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);
        $fiscal = new ProveedorDireccionFiscal($request->all());
        $proveedor->fiscal()->save($fiscal);
        return redirect()->route('proveedores.direccionFiscal.index', ['proveedor' => $proveedor]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        $direccion = $proveedor->fiscal;
        return view('proveedores.direccionFiscal.edit', ['proveedor' => $proveedor, 'direccion' => $direccion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->fiscal()->update($request->except(['_method', '_token']));
        return redirect()->route('proveedores.direccionFiscal.index', ['proveedor' => $proveedor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }

}
