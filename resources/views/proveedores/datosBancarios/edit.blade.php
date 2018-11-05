@extends('layouts.blank')
@section('content')
<div class="container-fluid" id="tab">
	<form role="form" id="form-cliente" method="POST" action="{{ route('proveedores.datosBancarios.update', ['proveedor' => $proveedor, 'bancario' => $bancario]) }}" name="form">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
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
				<li>
					<a href="{{ route('proveedores.datosGenerales.index', ['proveedor' => $proveedor]) }}">Datos Generales:</a>
				</li>
				<li class="active">
					<a href="{{ route('proveedores.datosBancarios.index', ['proveedor' => $proveedor]) }}">Datos Bancarios:</a>
				</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h5>Datos Bancarios:</h5>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="banco">✱Banco:</label>
	    					<select class="form-control" id="banco" name="banco_id" required="">
	    						<option>Seleccionar</option>
	    						@foreach($bancos as $banco)
	    							<option value="{{ $banco->id }}"<?php echo $bancario->banco->id == $banco->id ? ' selected=""' : '' ?>>{{ $banco->nombre }}</option>
	    						@endforeach
	    					</select>
	    				</div>
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="cuenta">✱Número de Cuenta:</label>
	  						<input type="text" class="form-control" id="cuenta" name="cuenta" required="" value="{{ $bancario->cuenta }}">
	  					</div>
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="clabe">✱CLABE:</label>
	  						<input type="text" class="form-control" id="clabe" name="clabe" required="" value="{{ $bancario->clabe }}">
	  					</div>
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="beneficiario">✱Beneficiario:</label>
	  						<input type="text" class="form-control" id="beneficiario" name="beneficiario" required="" value="{{ $bancario->beneficiario }}">
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
			</div>
		</div>
	</form>
</div>
@endsection