@extends('layouts.blank')
@section('content')

<div class="container-fluid" id="tab">
	<form method="POST" action="{{ route('proveedores.datosBancarios.store', ['proveedor' => $proveedor]) }}">
		{{ csrf_field() }}
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
			<li class="active">
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
							<h5>Datos Bancarios: <small><small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></small></h5>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="banco"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Banco:</label>
	    					<select class="form-control" id="banco" name="banco_id" required="">
	    						<option>Seleccionar</option>
	    						@foreach($bancos as $banco)
	    						<option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
	    						@endforeach
	    					</select>
	    				</div>
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="cuenta"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Número de Cuenta:</label>
	  						<input type="text" class="form-control" id="cuenta" name="cuenta" required="">
	  					</div>
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="clabe"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> CLABE:</label>
	  						<input type="text" class="form-control" id="clabe" name="clabe" required="">
	  					</div>
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="beneficiario"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Beneficiario:</label>
	  						<input type="text" class="form-control" id="beneficiario" name="beneficiario" required="">
	  					</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-success">
						        <strong>Guardar</strong>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection