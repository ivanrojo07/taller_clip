@extends('layouts.blank')
 @section('content')
 <div class="container">
 	
 	<div class="row">
 		<form method="POST" action="{{route($ruta)}}">
 			{{ csrf_field() }}
 		<div class="col-sm-3">
 			<label>Nombre/Descripción</label>
 			<input type="text" class="form-control" name="descripcion" required>
 			<input type="hidden" name="atributo" value="descripcion">
 		</div>
 		<div class="col-sm-3">
 			<br>
 			<button type="sumbit" class="btn btn-warning"><strong>Agregar</strong></button>
 		</div>
     </form>
     <form method="POST" action="{{route($ruta1)}}">
 		<div class="col-sm-3">
 			<div class="form-group">
  <label for="descripcion_sel">{{$nombre}}(Descripciones):</label>
  <select class="form-control" id="descripcion_sel" name="descripcion_sel" required>
    <option value="">Seleccionar</option>
    @foreach($descripciones as $descripcion)
    <option value="{{$descripcion->descripcion}}">{{$descripcion->descripcion}}</option>
    @endforeach
  </select>
</div>
 		</div>
 	</div><br>

 	{{--  Descripción --}}
 	
 			{{ csrf_field() }}
 			<input type="hidden" name="descripcion" id="montaje_descripcion" value="">
 		<div class="jumbotron" id="descripcion_div">
 			<div class="row">
 				<div class="col-sm-3"><h4 id="nombreh"><strong>{{$nombre}}</strong></h4></div>
 				<div class="col-sm-5">
 					<label for="clave_montaje">Clave:(Automático)</label>
 					<input type="text" name="clave" id="clave_montaje" class="form-control" readonly>
 				</div>
 			</div><br>
 			<div class="row">
 				<div class="col-sm-3">
          <label for="medidas_montaje">Ancho</label>
          <input type="number" name="ancho" id="ancho_montaje" class="form-control" step="any" required>
        </div>
        <div class="col-sm-3">
          <label for="medidas_montaje">Alto</label>
          <input type="number" name="alto" id="alto_montaje" class="form-control" step="any" required>
        </div>
 				<div class="col-sm-3">
          <label for="tipo_medidas">Tipo de medidas</label>
          <select class="form-control" id="tipo_medidas" name="tipo_medidas" required>
            <option value="">Seleccionar</option>
            <option value="Milímetros">Milímetros</option>
            <option value="Centímetros">Centímetros</option>
            <option value="Metros">Metros</option>
          </select>
        </div>
 			</div><br>
      <div class="row">
        <div class="col-sm-3">
          <label for="espesor_montaje">Espesor</label>
          <input type="text" name="espesor" id="espesor_montaje" class="form-control" required>
        </div>
        <div class="col-sm-3">
          <label for="color_montaje">Color</label>
          <input type="text" name="color" id="color_montaje" class="form-control" required>
        </div>
        <div class="col-sm-3">
          <label for="color_montaje">Tipo de Material</label>
          <input type="text" name="color" id="color_montaje" class="form-control" required>
        </div>

      </div><br>
      <div class="row">
        <div class="col-sm-4">
          <label for="proveedor">Proveedor</label>
           <div class="input-group">
            <span class="input-group-addon" id="basic-addon3" onclick='getProveedor()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
          <select class="form-control" id="proveedor" name="proveedor" required>
    <option value="">Seleccionar</option>
    @foreach($provedores as $provedor)
     @isset($provedor->razonsocial)
     <option value="{{$provedor->razonsocial}}">{{$provedor->razonsocial}}</option>
     @else
     <option value="{{$provedor->nombre}}">{{$provedor->nombre}}</option>
     @endisset
    @endforeach
  </select>
    </div>
        </div>
        <div class="col-sm-2">
          <label for="precio">Precio</label>
          <input type="number" name="precio" id="precio" class="form-control" step="any" placeholder="$--" step="any" required>
        </div>
        <div class="col-sm-3">
          <br>
          <button type="sumbit" class="btn btn-warning"><strong>Crear</strong></button>
        </div>
      </div><br>
 				
 		</div>
 	</form>
 		{{-- Descripción --}}

 		{{-- Materiales --}}
 		<div class="container " style="color: black;border-color: black;border:solid;">
	<table class="table">
    <thead class="thead-dark" style="background-color: darkblue;color: white;">
      <tr>
        <th>Nombre/Descripción</th>
        <th>Clave</th>
        <th>Tipo de Medidas</th>
        <th>Precio</th>
        <th>Proveedor</th>
        <th>Fecha de Creación</th>
        <th>Operación</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($materiales as $material)
      <form action="{{route($ruta2,[$objeto=>$material])}}" id="elim" method="POST">
        {{ csrf_field() }}
        
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="{{$material->id}}">
      
      <tr>
        <td>{{$material->descripcion}}</td>
        <td>{{$material->clave}}</td>
        <td>{{$material->tipo_medidas}}</td>
        <td>${{$material->precio}}</td>
        <td>{{$material->proveedor}}</td>

        <td>{{$material->created_at}}</td>
        <td><button class="btn btn-danger" onclick="deleteFunction('elim')"><strong>Eliminar</strong></button></td>
      </tr>
      </form>
      @endforeach
    </tbody>
  </table>
</div>
 		{{-- Materiales --}}

 </div>


<script type="text/javascript">
  
 

    function getProveedor(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: "{{ url('/getclient') }}",
          type: "GET",
          dataType: "html",
      }).done(function(resultado){
          $("#proveedor").html(resultado);
      });
    }


  </script>
 @endsection