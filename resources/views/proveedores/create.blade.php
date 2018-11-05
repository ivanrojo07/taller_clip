@extends('layouts.blank')
@section('content')

<div class="container-fluid">
	<form role="form" id="form-cliente" method="POST" action="{{ route('proveedores.store') }}">
		{{ csrf_field() }}
		<div role="application" class="panel panel-group" >
			<div class="panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h4>Datos del Proveedor:</h4>
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
	    						<option id="Fisica" value="Fisica">Fisica</option>
	    						<option id="Moral" value="Moral">Moral</option>
	    					</select>
	  					</div>
						<div id="perfisica">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="nombre">✱Nombre(s):</label>
		  						<input type="text" class="form-control" id="idnombre" name="nombre">
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="apellidopaterno">✱Apellido Paterno:</label>
		  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno" required>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
		  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno">
		  					</div>
						</div>
						<div id="permoral" style="display:none;">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="razonsocial">✱Razon Social:</label>
		  						<input type="text" class="form-control" id="razonsocial" name="razonsocial">
		  					</div>
						</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="rfc">RFC:</label>
	  						<input type="text" class="form-control" id="varrfc" name="rfc" minlength="12" maxlength="13" pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}" placeholder="Ingrese 13 caracteres" title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres">
	  					</div>
					</div>
				</div>
			</div>
			<div class="panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h5>Dirección Fisica:</h5>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="calle">Calle:</label>
	    					<input type="text" class="form-control" id="calle" name="calle">
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numext">Número exterior:</label>
	    					<input type="number" class="form-control" id="numext" name="numext">
	  					</div>	
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numinter">Número interior:</label>
	    					<input type="number" class="form-control" id="numinter" name="numinter">
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numinter">Código Postal:</label>
	    					<input type="number" class="form-control" id="cp" name="cp">
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
	  						<input type="text" class="form-control" placeholder="Calle 1, Calle 2" id="calles" name="calles">
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