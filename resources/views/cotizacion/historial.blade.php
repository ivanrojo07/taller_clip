@extends('layouts.cotizacion')
@section('content')
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