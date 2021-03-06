@extends('layouts.blank')
	@section('content') 
		<div class="container" id="tab">
			<div role="application" class="panel panel-group" >
				<div class="panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-3">
								<h4>Datos del cliente:</h4>
							</div>
							<div class="col-sm-3">
								<a class="btn btn-info" href="{{ route('clientes.create') }}"><strong>Nuevo Cliente</strong></a>
							</div>
							<div class="col-sm-3">
								<a class="btn btn-primary" href="{{ route('clientes.index') }}"><strong>Ver Clientes</strong></a>
							</div>
						</div>
						
						
					</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
		    					<dd>{{ $cliente->tipopersona }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="alias">Alias:</label>
		  						<dd>{{ $cliente->alias }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="rfc">RFC:</label>
		  						<dd>{{ $cliente->rfc }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="vendedor">Vendedor:</label>
		  						<dd>{{ $cliente->vendedor }}</dd>
		  					</div>
						</div>
					@if ($cliente->tipopersona == "Fisica")
							{{-- true expr --}}
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="nombre">Nombre(s):</label>
		  						<dd>{{ $cliente->nombre }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
		  						<dd>{{ $cliente->apellidopaterno }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
		  						<dd>{{ $cliente->apellidomaterno }}</dd>
		  					</div>
						</div>
					@else
							{{-- false expr --}}
						<div class="col-md-12 offset-md-2 mt-3" id="permoral">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

		  						<label class="control-label" for="razonsocial">Razon Social:</label>
		  						<dd>{{ $cliente->razonsocial }}</dd>
		  					</div>
						</div>
					@endif
					</div>
				</div>

				@yield('cliente')
			</div>
		</div>
	@endsection













