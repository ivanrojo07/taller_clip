@extends('layouts.cotizacion')
@section('content')
<div class="container-fluid">
    {{-- {{dd($cotizaciones)}} --}}
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4">
                    <h5>Cotizaciones</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="mt-1">
                <table class="table table-striped table-bordered table-responsive">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">Cliente / Correo</th>
                            <th scope="col">Número de cotización</th>
                            <th scope="col">fecha de creación</th>
                            <th scope="col">Fecha de entrega</th>
                            <th scope="col">Costo proyecto</th>
                            <th scope="col">Ganancia / Incremento</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Total</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cotizaciones as $cotizacion)
                            {{-- expr --}}
                            <tr>
                                <td scope="row">{{ ($cotizacion->cliente->tipopersona == "Fisica" ? $cotizacion->cliente->nombre." ".$cotizacion->cliente->apellidopaterno." ".$cotizacion->cliente->apellidomaterno : $cotizacion->cliente->razonsocial ) }} / {{$cotizacion->correo}}</td>
                                <td>{{ $cotizacion->nocotizacion }}</td>
                                <td>{{$cotizacion->fechaactual}}</td>
                                <td>{{$cotizacion->fechaentrega}}</td>
                                <td>${{$cotizacion->totalproyecto}} MXN</td>
                                <td>{{$cotizacion->incremento ? "$".$cotizacion->incremento." MXN" : "Sin Ganancia"}}</td>
                                <td>${{$cotizacion->resultado}}MXN</td>
                                <td>${{$cotizacion->totalneto}}MXN</td>
                                <td><a href="{{ route('cotizacion.show',['cotizacion'=>$cotizacion]) }}" class="btn btn-info">Detalle</a></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection