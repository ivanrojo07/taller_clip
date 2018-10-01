@extends('layouts.cotizacion')
	@section('content')

    <table class="table">
        <tr>
            <th>Nombre:</th><th>Fecha:</th><th>#Órden:</th><th>#Obras</th>
        </tr>
        @foreach($ordenes as $orden)
            <tr>
                <td>{{$orden->nombre}}</td><td>{{$orden->fecha}}</td><td>{{$orden->noorden}}</td><td>{{$orden->nopiezas}}</td>
            </tr>
        @endforeach
    </table>
    @endsection