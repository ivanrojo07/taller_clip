@extends('layouts.blank')
@section('content')

<div class="container-fluid" id="tab">
	<div role="application" class="panel panel-group" >
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Proveedor:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('proveedores.create') }}">
							<i class="fa fa-plus" aria-hidden="true"></i><strong> Agregar Proveedor</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-primary" href="{{ route('proveedores.index') }}">
							<i class="fa fa-bars" aria-hidden="true"></i><strong> Lista de Proveedores</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
  					<div class="form-group col-sm-3">
    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
    					<dd>{{ $proveedor->tipopersona }}</dd>
  					</div>
					@if($proveedor->tipopersona == "Fisica")
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="nombre">Nombre(s):</label>
	  						<dd>{{ $proveedor->nombre }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
	  						<dd>{{ $proveedor->apellidopaterno }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
	  						<dd>{{ $proveedor->apellidomaterno }}</dd>
	  					</div>
					@else
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="razonsocial">Razon Social:</label>
	  						<dd>{{ $proveedor->razonsocial }}</dd>
	  					</div>
					@endif
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="rfc">RFC:</label>
  						<dd>{{ $proveedor->rfc }}</dd>
  					</div>
				</div>
			</div>
		</div>
		<ul class="nav nav-tabs">
			<li>
				<a href="{{ route('proveedores.show', ['proveedor' => $proveedor]) }}">Dirección Física:</a>
			</li>
			<li>
				<a href="{{ route('proveedores.direccionFiscal.index', ['proveedor' => $proveedor]) }}">Dirección Fiscal:</a>
			</li>
			<li>
				<a href="{{ route('proveedores.contacto.index', ['proveedor' => $proveedor]) }}">Contactos:</a>
			</li>
			<li class="active">
				<a href="{{ route('proveedores.datosGenerales.index', ['proveedor' => $proveedor]) }}">Datos Generales:</a>
			</li>
			<li>
				<a href="{{ route('proveedores.datosBancarios.index', ['proveedor' => $proveedor]) }}">Datos Bancarios:</a>
			</li>
		</ul>
		<div class="panel panel-default">
		 	<div class="panel-heading">
		 		<div class="row">
		 			<div class="col-sm-4">
		 				<h4>Datos Generales:</h4>
		 			</div>
		 		</div>
		 	</div>
			<form role="form" id="form-cliente" method="POST" action="{{ route('proveedores.datosGenerales.store', ['proveedor'=>$proveedor]) }}" name="form">
				{{ csrf_field() }}
			 	<div class="panel-body">
			 		<div class="row">
			 			<div class="form-group col-sm-4">
				 			<label class="control-label" for="nombre">✱Giro:</label>
				 			<div class="input-group">
		  						<span class="input-group-addon" id="basic-addon3" onclick='getGiros()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
								<select type="select" name="giro_id" class="form-control" id="giro_id" required>
									<option id="sin_definir" value="">Sin Definir</option>
									@foreach ($giros as $giro)
										<option id="'{{$giro->id}}'" value="{{$giro->id}}">{{$giro->nombre}}</option>
									@endforeach
								</select>
							 </div>
			 			</div>
			 			<div class="form-group col-sm-4">
			 			<label class="control-label" for="nombre">✱Tamaño de la empresa:</label>
							<select type="select" name="tamano" class="form-control" id="tamano" required>
								<option value="">Elija el tamaño de la empresa</option>
								<option id="micro" value="micro">Micro</option>
								<option id="pequeña" value="pequeña">Pequeña</option>
								<option id="mediana" value="mediana">Mediana</option>
								<option id="grande" value="grande">Grande</option>
							</select>
			 			</div>
			 			<div class="form-group col-sm-4">
			 				
			 			</div>
			 		</div>
			 		<div class="row">
			 			<div class="form-group col-sm-4">
			 				<label class="control-label" for="web">Sitio web:</label>
			 				<input type="url" class="form-control" id="web" name="web" onblur="checkURL(this)" value="" autofocus>
			 			</div>

			 			<div class="form-group col-sm-4">
			 				<label class="control-label" for="comentario">Comentarios:</label>
			 				<textarea  class="form-control" rows="5" id="comentario" name="comentario"></textarea>
			 			</div>
			 			<div class="form-group col-sm-4">
			 				<label class="control-label" for="fechacontacto">✱Fecha de contacto:</label>
			 				<input type="date" class="form-control" id="fechacontacto" name="fechacontacto">
			 			</div>
			 		</div>
			 	</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
							<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
						</div>
						<div class="col-sm-4 text-right text-danger">
							<h5>✱Campos Requeridos</h5>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
	
	function getBancos(){
		$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
		});
		$.ajax({
			url: "{{ url('/getbancos') }}",
		    type: "GET",
		    dataType: "html",
		}).done(function(resultado){
		    $("#banco").html(resultado);
		});
	}

	function getGiros(){
		$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
		});
		$.ajax({
			url: "{{ url('/getgiros') }}",
		    type: "GET",
		    dataType: "html",
		}).done(function(resultado){
		    $("#giro_id").html(resultado);
		});
	}

	function getContacto(){
		$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
		});
		$.ajax({
			url: "{{ url('/getcontacto') }}",
		    type: "GET",
		    dataType: "html",
		}).done(function(resultado){
		    $("#forma_contacto_id").html(resultado);
		});
	}

	function checkURL(abc) {
		var string = abc.value;
		if (!~string.indexOf("http")) {
		string = "http://" + string;
		}
		abc.value = string;
		return abc;
	}

</script>

@endsection