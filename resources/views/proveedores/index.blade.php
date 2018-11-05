@extends('layouts.blank')
@section('content')

<div class="container-fluid">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Proveedores:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a href="{{ route('proveedores.create') }}" class="btn btn-success">
							<i class="fa fa-plus" aria-hidden="true"></i><strong> Agregar Proveedor</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div id="datos" name="datos">
							@if(count($proveedores) > 0)
								<table class="table table-striped table-bordered table-hover" style="color:rgb(51, 51, 51); border-collapse: collapse; margin-bottom: 0px">
									<tr class="info">
										<th>@sortablelink('tipopersona', 'Tipo de persona')</th>
										<th>@sortablelink('nombre', 'Nombre/Razón Social')</th>
										<th>@sortablelink('rfc', 'RFC')</th>
										<th>Operacion</th>
									</tr>
									@foreach($proveedores as $proveedor)
										<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" href="#{{ $proveedor->id }}">
											<td>{{ $proveedor->tipopersona }}</td>
											<td>
												@if($proveedor->tipopersona == "Fisica")
													{{ $proveedor->nombre }} {{ $proveedor->apellidopaterno }} {{ $proveedor->apellidomaterno }}
												@else
													{{ $proveedor->razonsocial }}
												@endif
											</td>
											<td>{{ $proveedor->rfc }}</td>
											<td class="text-center">
												<a class="btn btn-primary btn-sm" href="{{ route('proveedores.show', ['proveedor' => $proveedor]) }}">
													<i class="fa fa-eye" aria-hidden="true"></i> <strong>Ver</strong>
												</a>
												<a class="btn btn-danger btn-sm" href="{{ route('proveedores.edit', ['proveedor' => $proveedor]) }}">
													<i class="fa fa-pencil" aria-hidden="true"></i> <strong>Editar</strong>
												</a>
											</td>
										</tr>
									@endforeach
								</table>
							@else
								<h4>Aún no hay proveedores agregados.</h4>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- @foreach($provedores as $provedore)
	<div class="persona" id="{{ $provedore->id }}">
		<div class="container" id="tab">
			<div role="application" class="panel panel-group" >
				<div class="panel-default">
					<div class="panel-heading">
						<h4>
							@if ($provedore->tipopersona == "Fisica")
								{{ ucwords($provedore->nombre) . " " . ucwords($provedore->apellidopaterno) . " " . ucwords($provedore->apellidomaterno) }}
							@else
								{{ ucwords($provedore->razonsocial) }}
							@endif
						:</h4>
					</div>
				</div>
				<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
					<li role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active">
						<a href="#tab1{{ $provedore->id }}" tabindex="-1">Dirección Fìsica:</a>
					</li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
						<a href="#tab2{{ $provedore->id }}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Dirección Fiscal:</a>
					</li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
						<a href="#tab3{{ $provedore->id }}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a>
					</li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-4" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
						<a href="#tab4{{ $provedore->id }}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Datos Generales:</a>
					</li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-5" aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false">
						<a href="#tab5{{ $provedore->id }}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-5">Datos Bancarios:</a>
					</li>
				</ul>
				<div class="panel-default pestana" aria-hidden="false" id="tab1{{ $provedore->id }}" style="display: block;">
					<div class="panel-heading">
						Dirección Fisìca:
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="form-group col-sm-3">
		    					<label class="control-label" for="calle">Calle:</label>
		    					<dd>{{ $provedore->calle }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		    					<label class="control-label" for="numext">Numero exterior:</label>
		    					<dd>{{ $provedore->numext }}</dd>
		  					</div>	
		  					<div class="form-group col-sm-3">
		    					<label class="control-label" for="numinter">Numero interior:</label>
		    					<dd>{{ $provedore->numinter }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		    					<label class="control-label" for="cp">Código postal:</label>
		    					<dd>{{ $provedore->cp }}</dd>
		  					</div>		
						</div>
						<div class="row" id="perfisica">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="colonia">Colonia:</label>
		  						<dd>{{ $provedore->colonia }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
		  						<dd>{{ $provedore->municipio }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="ciudad">Ciudad:</label>
		  						<dd>{{ $provedore->ciudad }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="estado">Estado:</label>
		  						<dd>{{ $provedore->estado }}</dd>
		  					</div>
						</div>
						<div class="row" id="perfisica">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="calle1">Entre calle:</label>
		  						<dd>{{ $provedore->calle1 }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="calle2">Y calle:</label>
		  						<dd>{{ $provedore->calle2 }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="referencia">Referencia:</label>
		  						<dd>{{ $provedore->referencia }}</dd>
		  					</div>
						</div>
					</div>
				</div>
				<div class="panel-default pestana" id="tab2{{ $provedore->id }}">
					<div class="panel-heading">
						Dirección Fiscal:
					</div>
					<div class="panel-body">
						@if(!isset($provedore->direccionFisicaProvedor))
						<h3>Aun no tiene direccion Fisica</h3>
						@else
						<div class="row">
							<div class="form-group col-sm-3">
		    					<label class="control-label" for="calle">Calle:</label>
		    					<dd>{{ $provedore->direccionFisicaProvedor->calle }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		    					<label class="control-label" for="numext">Numero exterior:</label>
		    					<dd>{{ $provedore->direccionFisicaProvedor->numext }}</dd>
		  					</div>	
		  					<div class="form-group col-sm-3">
		    					<label class="control-label" for="numint">Numero interior:</label>
		    					<dd>{{ $provedore->direccionFisicaProvedor->numint }}</dd>
		  					</div>		
						</div>
						<div class="row" id="perfisica">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="colonia">Colonia:</label>
		  						<dd>{{ $provedore->direccionFisicaProvedor->colonia }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
		  						<dd>{{ $provedore->direccionFisicaProvedor->municipio }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="ciudad">Ciudad:</label>
		  						<dd>{{ $provedore->direccionFisicaProvedor->ciudad }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="estado">Estado:</label>
		  						<dd>{{ $provedore->direccionFisicaProvedor->estado }}</dd>
		  					</div>
						</div>
						<div class="row" id="perfisica">
							<div class="form-group col-sm-3">
		  						<label class="control-label" for="calle1">Entre calle:</label>
		  						<dd>{{ $provedore->direccionFisicaProvedor->calle1 }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="calle2">Y calle:</label>
		  						<dd>{{ $provedore->direccionFisicaProvedor->calle2 }}</dd>
		  					</div>
		  					<div class="form-group col-sm-3">
		  						<label class="control-label" for="referencia">Referencia:</label>
		  						<dd>{{ $provedore->direccionFisicaProvedor->referencia }}</dd>
		  					</div>
						</div>
						@endif
					</div>
				</div>
				<div class="panel-default pestana" id="tab3{{ $provedore->id }}">
					<div class="panel-heading">
						contactos Provedor:
					</div>
					@if (!isset($provedore->contactosProvedor))
					<div class="panel-body">
						<h3>Aún no tienes contactos Provedor</h3>
					</div>
					@else
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
							<tr class="info">
								<th>Nombre del contacto</th>
								<th>Telèfono Directo</th>
								
								<th>Telèfono celular</th>
							</tr>
							@foreach ($provedore->contactosProvedor as $contacto)
							<tr class="active">
								<td>{{ $contacto->nombre }} {{ $contacto->apater }} {{ $contacto->amater }}</td>

								<td>{{ $contacto->telefono1 }}</td>
								
								<td>{{ $contacto->celular1 }}</td>
							</tr>
							@endforeach
						</table>
					</div>
					@endif
				</div>	
				<div class="panel-default pestana" id="tab4{{ $provedore->id }}">
				 	<div class="panel-heading">Datos Generales:</div>
				 	@if ($provedore->datosGeneralesProvedor == null)
						<div class="panel-body">
							<h3>Aún no tienes datos generales</h3>
						</div>
					@else
				 	<div class="panel-body">
				 		<div class="row">
				 			<div class="form-group col-sm-3">
				 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
								<dd>{{ $provedore->datosGeneralesProvedor->nombre }}</dd>
				 			</div>
				 		</div>
				 		<div class="row">
				 			<div class="form-group col-sm-3">
				 				<label class="control-label" for="web">Sitio web:</label>
				 				<dd>{{ $provedore->datosGeneralesProvedor->web }}</dd>
				 			</div>

				 			<div class="form-group col-sm-3">
				 				<label class="control-label" for="comentario">Comentarios:</label>
				 				<dd>{{ $provedore->datosGeneralesProvedor->comentario }}</dd>
				 			</div>
				 			<div class="form-group col-sm-3">
				 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
				 				<dd>{{ $provedore->datosGeneralesProvedor->fechacontacto }}</dd>
				 			</div>
				 		</div>
				 	</div>
				 	@endif
				</div>
				<div class="panel-default pestana" id="tab5{{ $provedore->id }}">
				 	<div class="panel-heading">
					 	Datos Bancarios:
					 </div>
			 		@if ($provedore->datosBancarios == null)
					<div class="panel-body">
						<h3>Aún no tienes datos bancario</h3>
					</div>
					@else
			 		<div class="panel-body">
				 		<div class="row">
				 			<div class="form-group col-sm-3">
				 				<label class="control-label" for="nombre">Banco:</label>
								<dd>{{ $provedore->datosBancarios->banco->nombre }}</dd>
				 			</div>
				 			<div class="form-group col-sm-3">
				 				<label class="control-label" for="nombre">Número de Cuenta:</label>
								<dd>{{ $provedore->datosBancarios->cuenta }}</dd>
				 			</div>
				 			<div class="form-group col-sm-3">
				 				<label class="control-label" for="nombre">CLABE:</label>
								<dd>{{ $provedore->datosBancarios->clabe }}</dd>
				 			</div>
				 			<div class="form-group col-sm-3">
				 				<label class="control-label" for="nombre">Beneficiario:</label>
								<dd>{{ $provedore->datosBancarios->beneficiario }}</dd>
				 			</div>
				 		</div>
				 	</div>
				 	@endif
				</div>
			</div>
		</div>
	</div>
	@endforeach --}}
</div>

@endsection