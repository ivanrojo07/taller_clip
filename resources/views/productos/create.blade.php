@extends('layouts.blank')
	@section('content')
	


	<div class="container" id="tab">
		<form role="form" id="form-cliente" method="POST" name="form" >
			{{ csrf_field() }}
		<div role="application" class="panel panel-group">
			<div class="panel-default">
				<div class="panel-heading" style="background-color:lightgrey !important;"><h4><srtong>Productos:</srtong></h4>
					<!-- &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos -->
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-2">
                    		<label class=" label-text"><h4><strong>Montaje</strong></h4></label><br>
                    		<input type="checkbox" class="squaredTwo" value="Catarata">
                    	</div>
                    					
                    	<div class="col-sm-2">
                    		<label class=" label-text"><h4><strong>Protección</strong></h4></label><br>
                    		<input type="checkbox" class="squaredTwo" value="Glaucoma">
                    	</div>

                    	<div class="col-sm-2">
                    		<label class=" label-text"><h4><strong>Marco y Bastidor</strong></h4></label><br>
                    		<input type="checkbox" class="squaredTwo" value="Retinopatía Diabética">
                    	</div>
                    	<div class="col-sm-2">
                    		<label class=" label-text"><h4><strong>María Luísa</strong></h4></label><br>
                    		<input type="checkbox" class="squaredTwo" value="Retinopatía Diabética">
                    	</div>
                    	<div class="col-sm-2">
                    		<label class=" label-text"><h4><strong>Generales</strong></h4></label><br>
                    		<input type="checkbox" class="squaredTwo" value="Retinopatía Diabética">
                    	</div>
					</div>
				 </div><hr>
				 {{-- Montaje --}}
					<div class="panel-body col-sm-7" style="background-color: white;" id="montajes_div">
						<div class="row">
							<div class="col-sm-3">
								<h4><srtong><b>Montaje</b></srtong></h4>
							</div>
						</div><br>
					<div class="row">
						<div class="col-sm-5">
							<label class="control-label" for="descripcion">Descripción:</label>
							  <div class="input-group">
						 <span class="input-group-addon" id="basic-addon3" onclick='getDescripcion()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="descripcion" class="form-control" id="descripcion">
	  							<option value="Sin Definir">Seleccionar</option>
	  						</select>
	  					     </div>
						</div>
						<div class="col-sm-5">
							<label class="control-label" for="medidas">Medidas:</label>
							  <div class="input-group">
						 <span class="input-group-addon" id="basic-addon3" onclick='getmedidas()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="medidas" class="form-control" id="medidas">
	  							<option value="Sin Definir">Seleccionar</option>
	  						</select>
	  					     </div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-5">
							<label class="control-label" for="espesor">Espesor:</label>
							  <div class="input-group">
						 <span class="input-group-addon" id="basic-addon3" onclick='getEspesor()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="espesor" class="form-control" id="espesor">
	  							<option value="Sin Definir">Seleccionar</option>
	  						</select>
	  					     </div>
						</div>
						<div class="col-sm-5">
							<label class="control-label" for="color">Color:</label>
							  <div class="input-group">
						 <span class="input-group-addon" id="basic-addon3" onclick='getColor()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="color" class="form-control" id="color">
	  							<option value="Sin Definir">Seleccionar</option>
	  						</select>
	  					     </div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-5">
							<label class="control-label" for="clave_montaje">Clave Montaje: (Automático)</label>
				  			<input type="text" class="form-control" id="clave_montaje" name="clave_montaje"  maxlength="20" readonly placeholder="Descripción+Medida+Color+Espesor" style="color: black;">
			           </div>
			           <div class="col-sm-5">
							<label class="control-label" for="proveedor">Proveedor:</label>
							  <div class="input-group">
						 <span class="input-group-addon" id="basic-addon3" onclick='getProveedor()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="proveedor" class="form-control" id="proveedor">
	  							<option value="Sin Definir">Seleccionar</option>
	  						</select>
	  					     </div>
						</div>
						
					</div><br>
					<div class="row">
						<div class="col-sm-5">
							<label class="control-label" for="precio">Precio:</label>
	  						<input type="text" class="form-control" id="precio" name="precio"  maxlength="20" placeholder="$--">
						</div>
					</div>
				</div>
				<div class="panel-body col-sm-5" style="background-color: white; border:solid; border-color: grey;"><strong><h4><b>trabajo</b></h4></strong></div>
					

	  			{{-- --------------------------------------------- --}}
			</div>
		</div>	
		</form>
	</div>
		
	

	
	@endsection
