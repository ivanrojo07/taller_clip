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
				<li class="active">
					<a href="{{ route('proveedores.direccionFiscal.index', ['proveedor' => $proveedor]) }}">Dirección Fiscal:</a>
				</li>
				<li>
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
							<h5>Dirección Fiscal:</h5>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label" for="calle">Calle:</label>
							<input type="text" class="form-control" id="calle" name="calle" autofocus>
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="numext">Número exterior:</label>
							<input type="text" class="form-control" id="numext" name="numext">
						</div>	
						<div class="form-group col-sm-3">
							<label class="control-label" for="numint">Número interior:</label>
							<input type="text" class="form-control" id="numint" name="numint">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="cp">Código postal:</label>
							<input type="text" class="form-control" id="cp" name="cp"  minlength="5" maxlength="5">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label" for="colonia">Colonia:</label>
							<input type="text" class="form-control" id="colonia" name="colonia">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="municipio">Delegación o Municipio:</label>
							<input type="text" class="form-control" id="municipio" name="municipio">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="ciudad">Ciudad:</label>
							<input type="text" class="form-control" id="ciudad" name="ciudad">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="estado">Estado:</label>
							<input type="text" class="form-control" id="estado" name="estado">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3">
							<label class="control-label" for="calle1">Entre calles:</label>
							<input type="text" class="form-control" id="calles" placeholder="Calle 1, Calle 2" name="calles">
						</div>
						<div class="form-group col-sm-3">
							<label class="control-label" for="referencia">Referencia:</label>
							<input type="text" class="form-control" id="referencia" name="referencia">
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
			</div>
		</div>
	</form>
</div>

@endsection