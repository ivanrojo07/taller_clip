@extends('layouts.blank')

@section('content')
<div class="container clearfix">
		<div class="row">
	<div class="panel-body">
			<div class="col-xs-12">
			<form action="{{ url('cliente') }}">
				<div class="input-group">

					<input type="text" 
					       name="query" 
					       id="cliente" 
					       class="form-control" 
					       placeholder="Buscar..."
					       autofocus
					       onKeypress="if(event.keyCode == 13) event.returnValue = false;"> 
			
					<!-- <span class="input-group-btn">
						<button class="btn btn-default" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
					</span> -->	
			<div class="col-xs-3">

				<input id="cli" 
				       href="/clientes" 
				       type="checkbox" 
				       data-toggle="toggle" 
				       data-on="Sí" 
				       data-off="No" 
				       data-style="ios" 
				       checked="true" 
				       name="cliente"  
				       class="intro">

				<label>&nbsp;&nbsp;Clientes
			</label>

		</div>
		<div  class="col-xs-3">

				<input href="/prospectos" 
				       id="pros" 
				       type="checkbox" 
				       data-toggle="toggle" 
				       data-on="Sí" 
				       name="prospecto" 
				       data-off="No" 
				       data-style="ios" 
				       checked="true" 
				       class="ortni">

				<label>&nbsp;&nbsp;Prospectos
			</label>
		
					</div>	
				</div>	
			</form>
	</div>
</div>
</div>


	<div class="jumbotron" id="datos" name="datos">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('id','#')</th>
					<th>@sortablelink('nombre', 'Nombre/Razón Social'){{-- Nombre --}}</th>
					<th>@sortablelink('prioridad', 'Prioridad')</th>
					<th>@sortablelink('tipo', 'Tipo de cliente')</th>
					<th>@sortablelink('calificacion', 'Calificación')</th>
					<th>@sortablelink('giro', 'Giro')</th>
					<th>@sortablelink('created_at','Fecha de alta')</th>
					
					<th>Operacion</th>
				</tr>
			</thead>
			<tbody>
			@foreach($clientes as $cliente)

				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					href="#{{$cliente->id}}">

					<td>{{$cliente->id}}</td>
					<td>
						@if ($cliente->tipopersona == "Fisica")
						{{$cliente->nombre}} {{ $cliente->apellidopaterno }} {{ $cliente->apellidomaterno }}
						@else
						{{$cliente->razonsocial}}
						@endif
					</td>
					<td>{{ $cliente->prioridad }}</td>
					<td>{{ $cliente->tipo }}</td>
					<td>{{ strtoupper($cliente->calificacion) }}</td>
					@isset($cliente->datoGen)
					
					<td>{{$cliente->datoGen->giro->nombre}}</td>
					@else
					<td>Indefinido</td>
					@endisset
					
					<td>{{date('d-m-Y', strtotime($cliente->created_at))}}</td>
					
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('clientes.show',$cliente) }}"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
						<a class="btn btn-info btn-sm" href="{{ route('clientes.edit', $cliente) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
					</td>
				</tr>
					
				
			@endforeach
			</tbody>
		</table>
		{{ $clientes->links() }}
	</div>


	






	
</div>





{{--   TABLA VISTA RÀPIDA  --}}
@foreach ($clientes as $cliente)
	
	<div class="persona" id="{{$cliente->id}}">
		<div class="container" id="tab">
			<div role="application" class="panel panel-group" >
				<div class="panel-default">
					<div class="panel-heading"><h4>
											{{ucwords($cliente->tipo)}}
					</h4></div>
					
				</div>
				<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
					<li role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active"><a href="#tab1{{$cliente->id}}" tabindex="-1">Datos Personales:</a></li>

					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab2{{$cliente->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Dirección:</a></li>
					
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab4{{$cliente->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">CMR:</a></li>
					
				</ul>



				<div class="panel-default pestana" aria-hidden="false" id="tab1{{$cliente->id}}" style="display: block;">
					<div class="panel-heading">Datos Personales:</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">

							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								@if($cliente->tipopersona=='Fisica')
		    					<label class="control-label" for="calle">Nombre Completo:</label>
		    					<dd>{{ $cliente->nombre }}&nbsp;{{ $cliente->apellidopaterno }}
		    					&nbsp;{{ $cliente->apellidomaterno }}</dd>
		    					@else
		    					<label class="control-label" for="calle">Razón Social:</label>
		    					<dd>{{ $cliente->razonsocial}}</dd>
		    					@endif
		    					
		  					</div>

		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">RFC:</label>
		    					<dd>{{ $cliente->rfc }}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numinter">Teléfono Peronal:</label>
		    					<dd>{{ $cliente->celular }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="cp">Telèfono:</label>
		    					<dd>{{ $cliente->telefono }}</dd>
		  					</div>		
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">Correo/Mail:</label>
		  						<dd>{{ $cliente->mail }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="municipio">Calificación:</label>
		  						<dd>{{ $cliente->calificacion }}</dd>
		  					</div>
		  					
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="estado">Prioridad:</label>
		  						<dd>{{ $cliente->prioridad }}</dd>
		  					</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Calle:</label>
		  						<dd>{{ $cliente->calle }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Nùmero Exterior:</label>
		  						<dd>{{ $cliente->numext }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Nùmero Interior:</label>
		  						<dd>{{ $cliente->numint }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Còdigo Postal:</label>
		  						<dd>{{ $cliente->cp }}</dd>
		  					</div>
						</div>
					</div>
				</div>


				<div class="panel-default pestana" id="tab2{{$cliente->id}}">

					<div class="panel-heading">Dirección:</div>

					<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Calle:</label>
		  						<dd>{{ $cliente->calle }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Nùmero Exterior:</label>
		  						<dd>{{ $cliente->numext }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Nùmero Interior:</label>
		  						<dd>{{ $cliente->numint }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Còdigo Postal:</label>
		  						<dd>{{ $cliente->cp }}</dd>
		  					</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Colonia:</label>
		  						<dd>{{ $cliente->colonia }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Delegación/Municipio:</label>
		  						<dd>{{ $cliente->municipio }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Ciudad:</label>
		  						<dd>{{ $cliente->ciudad }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Estado:</label>
		  						<dd>{{ $cliente->estado }}</dd>
		  					</div>
						</div>
					</div>
				</div>



				
				
				
							
				<div class="panel-default pestana" id="tab4{{$cliente->id}}">
				 	<div class="panel-heading">CRM:</div>
				 	@if (count($cliente->crm)==0)
						<div class="panel-body">
							<h3>Aún no tiene datos de crm</h3>
						</div>
						@else
						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
							<thead>
								<tr class="info">
									<th>Fecha de Contacto </th>
									<th>Hora de Contacto</th>
									
									<th>Forma de Contacto</th>
									<th>Estado </th>
								</tr>
							</thead>
							<tbody>
								@foreach($cliente->crm as $crm)
								<tr class="active">

									<td>{{ $crm->fecha_cont }}  </td>

									<td>{{ $crm->hora }}</td>
									
									<td>{{ $crm->tipo_cont }}</td>

									<td>{{ $crm->status }}</td>
									
								</tr>
								@endforeach
							
								</tbody>
						
						</table>
						

						
				 	
				 	@endif
				</div>





			</div>
		</div>
	</div>
@endforeach
					{{--   TABLA VISTA RÀPIDA  --}}





@endsection

@section('scripts')
	{{-- expr --}}
	<script type="text/javascript" src="{{ asset('js/peticion.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/vistarapida.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>
@endsection