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
					<div class="form-group col-sm-3">
						<label class="control-label" for="rfc">Correo Electrónico:</label>
						<dd> {{ $proveedor->email }}</dd>
					</div>
				</div>
			</div>
		</div>
		<ul class="nav nav-tabs">
			<li class="active">
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
			<li>
				<a href="{{ route('proveedores.datosBancarios.index', ['proveedor' => $proveedor]) }}">Datos Bancarios:</a>
			</li>
		</ul>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Dirección Física:</h5>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle">Calle:</label>
						<dd>{{ $proveedor->calle }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="numext">Número exterior:</label>
						<dd>{{ $proveedor->numext }}</dd>
					</div>	
					<div class="form-group col-sm-3">
						<label class="control-label" for="numinter">Número interior:</label>
						<dd>{{ $proveedor->numinter }}</dd>
					</div>
  					<div class="form-group col-sm-3">
    					<label class="control-label" for="numinter">Código Postal:</label>
    					<dd>{{ $proveedor->cp }}</dd>
  					</div>
				</div>
				<div class="row" id="perfisica">
					<div class="form-group col-sm-3">
							<label class="control-label" for="colonia">Colonia:</label>
							<dd>{{ $proveedor->colonia }}</dd>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="municipio">Delegación o Municipio:</label>
							<dd>{{ $proveedor->municipio }}</dd>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="ciudad">Ciudad:</label>
							<dd>{{ $proveedor->ciudad }}</dd>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="estado">Estado:</label>
							<dd>{{ $proveedor->estado }}</dd>
						</div>
				</div>
				<div class="row" id="perfisica">
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle1">Entre calles:</label>
						<dd>{{ $proveedor->calles }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="referencia">Referencia:</label>
						<dd>{{ $proveedor->referencia }}</dd>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-12 text-center">
						<a class="btn btn-danger" href="{{ route('proveedores.edit', ['proveedor' => $proveedor]) }}">
					       <i class="fa fa-pencil" aria-hidden="true"></i><strong> Editar</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection