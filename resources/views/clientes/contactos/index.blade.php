@extends('layouts.blank')
@section('content')

<div class="container-fluid" id="tab">
	<form method="POST" action="{{ route('proveedores.direccionFiscal.store', ['proveedor' => $proveedor]) }}">
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
					<a href="{{ route('proveedores.show', ['proveedor' => $proveedor]) }}">Dirección Fìsica:</a>
				</li>
				<li>
					<a href="{{ route('proveedores.direccionFiscal.index', ['proveedor' => $proveedor]) }}">Dirección Fiscal:</a>
				</li>
				<li class="active">
					<a href="{{ route('proveedores.contacto.index', ['proveedor' => $proveedor]) }}">Contacto:</a>
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
							<h5>Contactos:</h5>
						</div>
						<div class="col-sm-4 text-center">
							<a type="button" class="btn btn-success" href="{{ route('proveedores.contacto.create', ['proveedor' => $proveedor]) }}">
								<strong>Agregar</strong>
							</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					@if(count($contactos) == 0)
						<h4>Aún no tienes contactos</h4>
					@else
						<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
							<tr class="info">
								<th>Nombre del contacto</th>
								<th>Telefono Directo</th>
								<th>Celular</th>
								<th>Correo Electronico</th>
								<th>Operaciones</th>
							</tr>
							@foreach ($contactos as $contacto)
								<tr class="active">
									<td>{{ $contacto->nombre }} {{ $contacto->apater }} {{ $contacto->amater }}</td>
									<td>{{ $contacto->telefonodir }}</td>
									<td>{{ $contacto->celular1 }}</td>
									<td>{{ $contacto->email1 }}</td>
									<td>
										<a class="btn btn-success btn-sm" href="{{ route('proveedores.contacto.show', ['proveedor' => $proveedor, 'contacto' => $contacto]) }}">
											<strong>Ver</strong>
										</a>
										<a class="btn btn-info btn-sm" href="{{ route('proveedores.contacto.edit', ['proveedor' => $proveedor, 'contacto' => $contacto]) }}">
											<strong>Editar</strong>
										</a>
									</td>
								</tr>
							@endforeach
						</table>
					@endif
				</div>
			</div>
		</div>
	</form>
</div>

@endsection