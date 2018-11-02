<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Cliente;
use App\ClienteDireccionFiscal;
use App\Http\Controllers\Controller;

class ClienteDireccionFiscalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        if($cliente->fiscal != null)
            return view('clientes.direccionFiscal.index', ['cliente' => $cliente]);
        return redirect()->route('clientes.direccionFiscal.create', ['cliente' => $cliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        return view('clientes.direccionFiscal.create', ['cliente' => $cliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cliente $cliente)
    {
        $fiscal = new ClienteDireccionFiscal($request->all());
        $cliente->fiscal()->save($fiscal);
        return redirect()->route('clientes.direccionFiscal.index', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.direccionFiscal.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->fiscal()->update($request->except(['_method', '_token']));
        return redirect()->route('clientes.direccionFiscal.index', ['cliente' => $cliente]);
    }

}
