@extends('layouts.cotizacion')
@section('content')
<div class="row">
    <div class="col-8 offset-2">
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
                    <button type="button" class="btn btn-primary">PDF</button>
                    <button type="button" class="btn btn-success">A cotización</button>
                    </td>           
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>0</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>
                    <button type="button" class="btn btn-primary">PDF</button>
                    <button type="button" class="btn btn-success">A cotización</button>
                    </td>              
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>0</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>
                    <button type="button" class="btn btn-primary">PDF</button>
                    <button type="button" class="btn btn-success">A cotización</button>
                    </td>              
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection