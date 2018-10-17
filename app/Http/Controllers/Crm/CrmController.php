<?php

namespace App\Http\Controllers\Crm;

use App\ClienteCRM;
use App\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrmController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crms = [];
        foreach (Cliente::get() as $cliente) {
            if(count($cliente->crm) != 0)
                $crms[] = $cliente->crm->last();
        }
        $clientes = Cliente::orderBy('nombre','desc')->get();
        return view('crm.indexall', ['crms' => $crms, 'clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crms = [];
        foreach (Cliente::get() as $cliente) {
            if(count($cliente->crm) != 0)
                $crms[] = $cliente->crm->last();
        }
        // dd($crms);
        $clientes = Cliente::orderBy('nombre','desc')->get();
        return view('crm.indexall', ['crms' => $crms, 'clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crm = ClienteCRM::create($request->all());
        return redirect()->route('crm.create'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClienteCRM  $clienteCRM
     * @return \Illuminate\Http\Response
     */
    public function show(ClienteCRM $clienteCRM)
    {
        //
    }

    public function porFecha(Request $request) {
        $crms = [];
        foreach (Cliente::get() as $cliente) {
            if(count($cliente->crm) != 0) {
                $tmp = $cliente->crm()->whereBetween('fecha_cont', [$request->fechaD, $request->fechaH])->orderBy('fecha_cont', 'asc')->get()->first();
                if($tmp != null)
                    $crms[] = $tmp;
            }
        }
        $clientes = Cliente::orderBy('nombre','desc')->get();
        $todos = ClienteCRM::get();
        return view('crm.indexall', ['crms' => $crms, 'todos' => $todos, 'clientes' => $clientes]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClienteCRM  $clienteCRM
     * @return \Illuminate\Http\Response
     */
    public function edit(ClienteCRM $clienteCRM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClienteCRM  $clienteCRM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClienteCRM $clienteCRM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClienteCRM  $clienteCRM
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClienteCRM $clienteCRM)
    {
        //
    }
}
