<?php

namespace App\Http\Controllers\Proveedor;


use App\ContactoProveedor;
use App\Http\Controllers\Controller;
use App\Proveedor;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ProveedorContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $proveedor = Proveedor::find($id);
        $contactos = $proveedor->contactos;
        return view('proveedores.contactos.index', ['proveedor' => $proveedor, 'contactos' => $contactos]);
    }

    public function busqueda() {
        $contactos = $proveedor->contactosProvedor;
        return view('provedores.contacto.busqueda', ['proveedor'=>$proveedor, 'contactos'=>$contactos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedores.contactos.create', ['proveedor' => $proveedor]);
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
        $proveedor->contactos()->create($request->all());
        return redirect()->route('proveedores.contacto.index', ['proveedor' => $proveedor]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show($proveedor, $contacto)
    {
        $proveedor = Proveedor::find($proveedor);
        $contacto = ContactoProveedor::find($contacto);
        return view('proveedores.contactos.view', ['proveedor' => $proveedor, 'contacto' => $contacto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor, $contacto)
    {
        //
        $contacto = ContactoProveedor::findOrFail($contacto);
        return view('provedores.contacto.edit',['proveedor'=>$proveedor, 'contacto'=>$contacto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor, $contacto)
    {
        //
        $contacto = ContactoProveedor::findOrFail($contacto);
        $contacto->update($request->all());
        Alert::success('Contacto actualizado con éxito');
        return redirect()->route('provedores.contacto.index',['proveedor'=>$proveedor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $provedor)
    {
        //
    }
}
