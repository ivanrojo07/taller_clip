<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Cliente;
use App\ClienteDireccionEntrega;
use App\Http\Controllers\Controller;

class ClienteDireccionEntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        if($cliente->entrega != null)
            return view('clientes.direccionEntrega.index', ['cliente' => $cliente]);
        return redirect()->route('clientes.direccionEntrega.create', ['cliente' => $cliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        return view('clientes.direccionEntrega.create', ['cliente' => $cliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cliente $cliente)
    {
        $entrega = new ClienteDireccionEntrega($request->all());
        $cliente->entrega()->save($entrega);
        return redirect()->route('clientes.direccionEntrega.index', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.direccionEntrega.edit', ['cliente' => $cliente]);
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
        $cliente->entrega()->update($request->except(['_method', '_token']));
        return redirect()->route('clientes.direccionEntrega.index', ['cliente' => $cliente]);
    }

}
