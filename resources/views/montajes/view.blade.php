@extends('layouts.blank')
 @section('content')

<div class="container">
	<table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Nombre/Descripción</th>
        <th>Clave</th>
        <th>Operación</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($materiales as $material)
      <tr>
        <td>{{$material->descripcion}}</td>
        <td>{{$material->clave}}</td>
        <td><button><strong>Eliminar</strong></button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
 @endsection


