@extends('layouts.cotizacion')
@section('content')
<table class="table">
        <thead>
            <tr class="bg-primary">
                <th scope="col">#</th>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col">Costo total</th>
                <th scope="col">Status</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Operación</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>0</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>
                <button type="button" class="btn btn-primary">Editar</button>
                <button type="button" class="btn btn-success">Crear</button>
                </td>              
            </tr>
        </tbody>
    </table>
@endsection