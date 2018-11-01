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
						<a class="btn btn-success" href="{{ route('proveedores.create')}}">
							<strong>Agregar Proveedor</strong>
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
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="alias">Alias:</label>
  						<dd>{{ $proveedor->alias }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="rfc">RFC:</label>
  						<dd>{{ $proveedor->rfc }}</dd>
  					</div>
  					<div class="form-group col-sm-3">
  						<label class="control-label" for="vendedor">Vendedor:</label>
  						<dd>{{ $proveedor->vendedor }}</dd>
  					</div>
				</div>
				@if ($proveedor->tipopersona == "Fisica")
				<div class="row" id="perfisica">
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
				</div>
				@else
				<div class="row" id="permoral">
					<div class="form-group col-sm-3">
  						<label class="control-label" for="razonsocial">Razon Social:</label>
  						<dd>{{ $proveedor->razonsocial }}</dd>
  					</div>
				</div>
				@endif
			</div>
		</div>
		<ul role="tablist" class="nav nav-tabs">
			<li class="active">
				<a href="#tab1">Dirección Física:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.direccionFiscal.index',['cliente'=>$proveedor]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Dirección Fiscal:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.contacto.index',['cliente'=>$proveedor]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.datosGenerales.index',['cliente'=>$proveedor]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a>
			</li>
			<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.datosBancarios.index', ['cliente' => $proveedor]) }}" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Datos Bancarios:</a>
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
						<label class="control-label" for="numext">Numero exterior:</label>
						<dd>{{ $proveedor->numext }}</dd>
					</div>	
					<div class="form-group col-sm-3">
						<label class="control-label" for="numinter">Numero interior:</label>
						<dd>{{ $proveedor->numinter }}</dd>
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
						<label class="control-label" for="calle1">Entre calle:</label>
						<dd>{{ $proveedor->calle1 }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="calle2">Y calle:</label>
						<dd>{{ $proveedor->calle2 }}</dd>
					</div>
					<div class="form-group col-sm-3">
						<label class="control-label" for="referencia">Referencia:</label>
						<dd>{{ $proveedor->referencia }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<a class="btn btn-warning" href="{{ route('proveedores.edit', ['proveedor'=>$proveedor]) }}">
					       <strong>Editar</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection