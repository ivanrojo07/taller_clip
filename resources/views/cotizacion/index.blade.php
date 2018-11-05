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
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">Cliente</th>
                            <th scope="col">Numero de cotización</th>
                            <th scope="col">fecha de creación</th>
                            <th scope="col">Fecha de entrega</th>
                            <th scope="col">Ordenes</th>
                            <th scope="col">Mano de obra</th>
                            <th scope="col">Varios</th>
                            <th scope="col">Envios</th>
                            <th scope="col">Ganancia/Incremento</th>
                            <th scope="col">Costo proyecto</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cotizaciones as $cotizacion)
                            {{-- expr --}}
                            <tr>
                                <td scope="row">{{ ($cotizacion->cliente->tipopersona == "Fisica") ? "$cotizacion->cliente->nombre" : "" }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h4>Historial de cotizaciones</h4>
<br>
<br>
<br>
<div class="row">
    <div class="col-8 offset-2">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">#Cotizacion</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Fecha de entrega</th>
                    <th scope="col">Costo total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cotizaciones as $cotizacion)
                    <tr>
                        <td>{{$cotizacion->id}}</td>
                        <td>{{$cotizacion->cliente}}</td>
                        <td>{{$cotizacion->nocotizacion}}</td>
                        <td>{{$cotizacion->fechaactual}}</td>
                        <td>{{$cotizacion->fechaentrega}}</td>
                        <td>{{$cotizacion->totalneto}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>


@endsection