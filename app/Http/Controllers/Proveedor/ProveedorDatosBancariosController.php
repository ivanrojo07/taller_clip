<?php

namespace App\Http\Controllers\Proveedor;

use App\DatosBancariosProveedor;
use App\Proveedor;
use App\Banco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorDatosBancariosController extends Controller
{

    public function index($proveedor)
    {
        $proveedor = Proveedor::find($proveedor);
        $bancario = $proveedor->bancarios;
        if($bancario == null) {
            $bancos = Banco::get();
            return view('proveedores.datosBancarios.create', ['proveedor' => $proveedor, 'bancos' => $bancos]);
        }
        return view('proveedores.datosBancarios.view', ['proveedor' => $proveedor, 'bancario' => $bancario]);
    }

    public function create($proveedor)
    {
        $proveedor = Proveedor::find($proveedor);
        $bancos = Banco::get();
        return view('proveedores.datosBancarios.create', ['proveedor' => $proveedor, 'bancos' => $bancos]);
    }

    public function store(Request $request, $proveedor)
    {
        $proveedor = Proveedor::find($proveedor);
        $bancarios = new DatosBancariosProveedor($request->all());
        $proveedor->bancarios()->save($bancarios);
        return redirect()->route('proveedores.datosBancarios.index', ['proveedor' => $proveedor]);
    }

    public function edit($proveedor)
    {
        $proveedor = Proveedor::find($proveedor);
        $bancario = $proveedor->bancarios;
        $bancos = Banco::get();
        return view('proveedores.datosBancarios.edit', ['proveedor' => $proveedor, 'bancario' => $bancario, 'bancos' => $bancos]);
    }

    public function update(Request $request, $proveedor)
    {
        $proveedor = Proveedor::find($proveedor);
        $proveedor->bancarios()->update($request->except(['_method', '_token']));
        return redirect()->route('proveedores.datosBancarios.index', ['proveedor' => $proveedor]);
    }

    public function destroy() {

    }

}
