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

    public function create(Proveedor $proveedor)
    {
        $bancos = Banco::get();
        return view('proveedores.datosBancarios.create', ['proveedor' => $proveedor, 'bancos' => $bancos]);
    }

    public function store(Request $request, Proveedor $proveedor)
    {
        $bancario = new DatosBancariosProveedor();
        $bancario->banco_id = $request->banco_id;
        $bancario->provedor_id = $proveedor->id;
        $bancario->cuenta = $request->cuenta;
        $bancario->clabe = $request->clabe;
        $bancario->beneficiario = $request->beneficiario;
        $bancario->save();
        return redirect()->route('proveedores.datosBancarios.index', ['proveedor' => $proveedor]);
    }

    public function edit(Proveedor $proveedor)
    {
        $bancario = $proveedor->datosBancarios;
        $bancos = Banco::get();
        return view('proveedores.datosBancarios.edit', ['proveedor' => $proveedor, 'bancario' => $bancario, 'bancos' => $bancos]);
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $bancario = $proveedor->bancarios;
        $bancario->update($request->all());
        return $this->index($proveedor);
    }

    public function destroy() {

    }

}
