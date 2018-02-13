@extends('layouts.blank')
	@section('content')
		<div class="container" id="tab">
				<div role="application" class="panel panel-group" >
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Prospecto/Cliente:</h4></div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipo">Tipo de Cliente:</label>
			    					<dd>{{ $cliente->tipo }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
			    					<dd>{{ $cliente->tipopersona }}</dd>
			  					</div>	
							</div>
							@if ($cliente->tipopersona == "Fisica")
								{{-- expr --}}
							<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre">* Nombre(s):</label>
			  						<dd>{{$cliente->nombre}}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno">* Apellido Paterno:</label>
			  						<dd>{{ $cliente->apellidopaterno }}</dd>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<dd>{{ $cliente->apellidomaterno }}</dd>
			  					</div>
							</div>
							@else

							<div class="col-md-12 offset-md-2 mt-3" id="permoral">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

			  						<label class="control-label" for="razonsocial">* Razon Social:</label>
			  						<dd>{{ $cliente->razonsocial }}</dd>
			  					</div>
							</div>
							@endif
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="mail">* Correo:</label>
									<dd>{{ $cliente->mail }}</dd>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="rfc">* RFC:</label>
									<dd>{{ $cliente->rfc }}</dd>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="telefono">* Número de Telefono:</label>
									<dd>{{ $cliente->telefono }}</dd>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<label class="control-label" for="celular">* Número Celular:</label>
									<dd>{{ $cliente->celular }}</dd>
								</div>
								@if ($cliente->estadocivil)
									{{-- true expr --}}
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente2" style="display:none;">
									<label class="control-label" for="estadocivil">Estado Civil:</label>
									<dd>{{$cliente->estadocivil}}</dd>
								</div>
								@endif
							</div>
						</div>
					</div>
				<ul role="tablist" class="nav nav-tabs">
					<li class="active"><a href="#tab1">Dirección/Domicilio:</a></li>
					@if ($cliente->tipo == 'Cliente')
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datoslaborales.index',['cliente'=>$cliente]) }}" class="">Datos Laborales:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.referenciapersonales.index',['cliente'=>$cliente]) }}" class="">Referencias Personales:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.datosbeneficiario.index',['cliente'=>$cliente]) }}" class="">Datos de Beneficiarios:</a></li>
					@endif
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.producto.index',['cliente'=>$cliente]) }}" class="">Productos:</a></li>
					<li class=""><a href="{{ route('personals.product.index',['cliente'=>$cliente]) }}" class="">Productos seleccionados:</a></li>
					<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="{{ route('personals.crm.index',['cliente'=>$cliente]) }}" class="">C.R.M.:</a></li>
				</ul>
				<div class="panel-default">
					<div class="panel-heading">Dirección/Domicilio:</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
								<label class="control-label" for="calle">* Calle:</label>
								<dd>{{ $cliente->calle }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
								<label class="control-label" for="numext" >* Número Exterior:</label>
								<dd>{{ $cliente->numext }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="numinter">Número Interior:</label>
								<dd>{{ $cliente->numinter }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="cp">Código Postal:</label>
								<dd>{{ $cliente->cp }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="colonia">* Colonia:</label>
								<dd>{{ $cliente->colonia }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="municipio">* Municipio/Delegación:</label>
								<dd>{{ $cliente->municipio }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="ciudad">* Ciudad:</label>
								<dd>{{ $cliente->ciudad }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="estado">* Estado:</label>
								<dd>{{ $cliente->estado }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="calle1">Entre calle:</label>
								<dd>{{ $cliente->calle1 }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="calle2">Y calle:</label>
								<dd>{{ $cliente->calle2 }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="referencia">Referencia:</label>
								<dd>{{ $cliente->referencia }}</dd>
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente" style="display:none;">
								<label class="control-label" for="recidir">Tiempo recidiendo:</label>
								<dd>{{ $cliente->recidir }}</dd>
							</div>
							@if ($cliente->vivienda)
								{{-- expr --}}
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="vivienda">Tipo de vivienda:</label>
								<dd>{{ $cliente->vivienda }}</dd>
							</div>
							@endif
						</div>
					</div>
					<a class="btn btn-info btn-md" href="{{ route('personals.edit', [$cliente]) }}">
					<strong>Editar</strong>
				</a>
				</div>
  				</div>
		</div>
	@endsection