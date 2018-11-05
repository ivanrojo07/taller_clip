@extends('layouts.blank')
@section('content')

<div class="container-fluid" id="tab">
	<form role="form" id="form-cliente" method="POST" action="{{ route('proveedores.update', ['proveedor' => $proveedor]) }}" name="form">
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
	    					<label class="control-label" for="tipopersona">✱Tipo de Persona:</label>
	    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)" required="">
	    						<option id="Fisica" value="Fisica" @if($proveedor->tipopersona == "Fisica") selected="selected" @endif>Fisica</option>
	    						<option id="Moral" value="Moral" @if($proveedor->tipopersona == "Moral") selected="selected" @endif>Moral</option>
	    					</select>
	  					</div>
						<div id="perfisica">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="nombre">✱Nombre(s):</label>
		  						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $proveedor->nombre }}" required="">
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="apellidopaterno">✱Apellido Paterno:</label>
		  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno" value="{{ $proveedor->apellidopaterno }}" required="">
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
		  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno" value="{{ $proveedor->apellidomaterno }}">
		  					</div>
						</div>
						<div id="permoral" style="display: none;">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="razonsocial">✱Razon Social:</label>
		  						<input type="text" class="form-control" id="razonsocial" name="razonsocial" value="{{ $proveedor->razonsocial }}">
		  					</div>
						</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="rfc">RFC:</label>
	  						<input type="text" class="form-control" id="varrfc" name="rfc" minlength="12" maxlength="13" pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}" placeholder="Ingrese 13 caracteres" title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres" value="{{ $proveedor->rfc }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="rfc">Correo Electrónico:</label>
	  						<input type="email" class="form-control" id="email" name="email" value="{{ $proveedor->email }}">
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
	    					<input type="text" class="form-control" id="calle" name="calle" value="{{ $proveedor->calle }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numext">Número exterior:</label>
	    					<input type="text" class="form-control" id="numext" name="numext" value="{{ $proveedor->numext }}">
	  					</div>	
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numinter">Número interior:</label>
	    					<input type="text" class="form-control" id="numinter" name="numinter" value="{{ $proveedor->numinter }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numinter">Código Postal:</label>
	    					<input type="number" class="form-control" id="cp" name="cp" value="{{ $proveedor->cp }}">
	  					</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="colonia">Colonia:</label>
	  						<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $proveedor->colonia }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
	  						<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $proveedor->municipio }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="ciudad">Ciudad:</label>
	  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $proveedor->ciudad }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="estado">Estado:</label>
	  						<input type="text" class="form-control" id="estado" name="estado" value="{{ $proveedor->estado }}">
	  					</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Entre calles:</label>
	  						<input type="text" class="form-control" id="calles" placeholder="Calle 1, Calle 2" name="calles" value="{{ $proveedor->calles }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $proveedor->referencia }}">
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