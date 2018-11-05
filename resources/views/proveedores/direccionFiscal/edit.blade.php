@extends('layouts.blank')
@section('content')

<div class="container-fluid">
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
			<li class="active">
				<a href="{{ route('proveedores.direccionFiscal.index', ['proveedor' => $proveedor]) }}">Dirección Fiscal:</a>
			</li>
			<li>
				<a href="{{ route('proveedores.contacto.index', ['proveedor' => $proveedor]) }}">Contactos:</a>
			</li>
			<li>
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
						<h5>Dirección Fiscal:</h5>
					</div>
				</div>
			</div>
			<form method="POST" action="{{ route('proveedores.direccionFiscal.update', ['proveedor' => $proveedor, 'direccion' => $direccion]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="calle">Calle:</label>
	    					<input type="text" class="form-control" id="calle" name="calle" value="{{ $direccion->calle }}" autofocus>
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numext">Numero exterior:</label>
	    					<input type="text" class="form-control" id="numext" name="numext" value="{{ $direccion->numext }}">
	  					</div>	
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numint">Numero interior:</label>
	    					<input type="text" class="form-control" id="numint" name="numint" value="{{ $direccion->numint }}">
	  					</div>
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="cp">Código postal:</label>
	    					<input type="text" class="form-control" id="cp" name="cp"  minlength="5" maxlength="5">
	  					</div>	
					</div>
					<div class="row">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="colonia">Colonia:</label>
	  						<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $direccion->colonia }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
	  						<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $direccion->municipio }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="ciudad">Ciudad:</label>
	  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $direccion->ciudad }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="estado">Estado:</label>
	  						<input type="text" class="form-control" id="estado" name="estado" value="{{ $direccion->estado }}">
	  					</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Entre calles:</label>
	  						<input type="text" class="form-control" id="calles" name="calles" value="{{ $direccion->calles }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $direccion->referencia }}">
	  					</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4 text-center">
							<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection