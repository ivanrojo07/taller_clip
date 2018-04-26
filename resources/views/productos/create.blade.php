@extends('layouts.blank')
	@section('content')
	


	
		
		<div role="application" class="panel panel-group">
			<div class="panel-default">
				<div class="panel-heading" style="background-color:lightgrey !important; "><h4><srtong>Productos:</srtong></h4>
					<!-- &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos -->
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-2">
                    		<label class=" label-text"><h4><strong>Montaje</strong></h4></label><br>
                    		<input type="radio" class="option-input radio" name="prod_sel" value="montaje" id="chk_montaje">
                    	</div>
                    					
                    	<div class="col-sm-2">
                    		<label class=" label-text"><h4><strong>Protección</strong></h4></label><br>
                    		<input type="radio" class="option-input radio" name="prod_sel" value="proteccion" id="chk_proteccion">
                    	</div>

                    	<div class="col-sm-2">
                    		<label class=" label-text"><h4><strong>Marcos y Bastidores</strong></h4></label><br>
                    		<input type="radio" class="option-input radio" name="prod_sel" value="marcos" id="chk_marcos">
                    	</div>
                    	<div class="col-sm-2">
                    		<label class=" label-text"><h4><strong>María Luísa</strong></h4></label><br>
                    		<input type="radio" class="option-input radio" name="prod_sel" value="maria" id="chk_maria">
                    	</div>
                    	<div class="col-sm-2">
                    		<label class=" label-text"><h4><strong>Generales</strong></h4></label><br>
                    		<input type="radio" class="option-input radio" name="prod_sel" value="generales" id="chk_generales">
                    	</div>
					</div>
				 </div><hr>

				 {{-- Montaje --}}
					<div class="panel-body col-sm-6" style="background-color: white; display: none;" id="montajes_div">
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
							<label class="control-label" for="clave_montaje">Clave Montaje:(Automático)</label>
				  			<input type="text" class="form-control" id="clave_montaje" name="clave_montaje"  maxlength="20"  placeholder="Descripción+Medida+Color+Espesor" style="color: black;">
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
	  						<input type="number" step="any" class="form-control" id="precio_montaje" name="precio"  maxlength="20" placeholder="$--" >
						</div>
						<br>
						<div class="col-sm-5">
							<button class="btn btn-primary" onclick="montaje('montaje');"><strong>Aceptar</strong></button>
						</div>
					</div>
				</div>
				 {{-- Montaje --}}

				 {{-- Proteción --}}
					<div class="panel-body col-sm-6" style="background-color: white; display: none;" id="protecciones_div">
						<div class="row">
							<div class="col-sm-3">
								<h4><srtong><b>Protección</b></srtong></h4>
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
							<label class="control-label" for="clave_proteccion">Clave Protección:(Automático)</label>
				  			<input type="text" class="form-control" id="clave_proteccion" name="clave_proteccion"  maxlength="20"  placeholder="Descripción+Medida+Color+Espesor" style="color: black;">
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
	  						<input type="number" step="any" class="form-control" id="precio_proteccion" name="precio"  maxlength="20" placeholder="$--">
						</div>
						<br>
						<div class="col-sm-5">
							<button class="btn btn-primary" onclick="montaje('proteccion');"><strong>Aceptar</strong></button>
						</div>
					</div>
				</div>
				 {{-- Protección --}}

				  {{-- Marcos y Bastidores --}}
					<div class="panel-body col-sm-6" style="background-color: white; display: none;" id="marcos_div">
						<div class="row">
							<div class="col-sm-4">
								<h4><srtong><b>Marcos y Bastidores</b></srtong></h4>
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
							<label class="control-label" for="clave_marcos">Clave Marco/Bastidor:(Automático)</label>
				  			<input type="text" class="form-control" id="clave_marcos" name="clave_marcos"  maxlength="20"  placeholder="Descripción+Medida+Color+Espesor" style="color: black;">
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
	  						<input type="number" step="any" class="form-control" id="precio_marcos" name="precio"  maxlength="20" placeholder="$--">
						</div>
						<br>
						<div class="col-sm-5">
							<button class="btn btn-primary" onclick="montaje('marcos');"><strong>Aceptar</strong></button>
						</div>
					</div>
				</div>
				 {{-- Marcos y Bastidores --}}

				 {{-- María Luisa --}}
					<div class="panel-body col-sm-6" style="background-color: white; display: none;" id="maria_div">
						<div class="row">
							<div class="col-sm-4">
								<h4><srtong><b>María Luisa</b></srtong></h4>
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
							<label class="control-label" for="clave_maria">Clave María Luisa:(Automático)</label>
				  			<input type="text" class="form-control" id="clave_maria" name="clave_maria"  maxlength="20"  placeholder="Descripción+Medida+Color+Espesor" style="color: black;">
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
	  						<input type="number" step="any" class="form-control" id="precio_maria" name="precio"  maxlength="20" placeholder="$--">
						</div>
						<br>
						<div class="col-sm-5">
							<button class="btn btn-primary" onclick="montaje('maria');"><strong>Aceptar</strong></button>
						</div>
					</div>
				</div>
				 {{-- María Luisa --}}

				 {{-- Generales --}}
					<div class="panel-body col-sm-6" style="background-color: white; display: none;" id="generales_div">
						<div class="row">
							<div class="col-sm-4">
								<h4><srtong><b>Generales</b></srtong></h4>
							</div>
						</div><br>
					<div class="row">
						<div class="col-sm-5">
							<label class="control-label" for="descripcion">Adhesivos:</label>
							  <div class="input-group">
						 <span class="input-group-addon" id="basic-addon3" onclick='getDescripcion()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="descripcion" class="form-control" id="descripcion">
	  							<option value="Sin Definir">Seleccionar</option>
	  						</select>
	  					     </div>
						</div>
						<div class="col-sm-5">
							<label class="control-label" for="medidas">Colgaderas:</label>
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
							<label class="control-label" for="clave_generales">Clave Generales:(Automático)</label>
				  			<input type="text" class="form-control" id="clave_generales" name="clave_generales"  maxlength="20"  placeholder="Adhesivos/Colgaderas" style="color: black;">
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
	  						<input type="number" step="any" class="form-control" id="precio_generales" name="precio"  maxlength="20" placeholder="$--">
						</div>
						<br>
						<div class="col-sm-5">
							<button class="btn btn-primary" onclick="montaje('generales');"><strong>Aceptar</strong></button>
						</div>
					</div>
				</div>
				 {{-- Generales --}}

				 {{--  Cotización --}}
			<form role="form" id="form-cliente" method="POST" name="form" >
			  {{ csrf_field() }}
				<div class="panel-body col-sm-6" style="background-color: white; border:solid; border-color: grey;">
				  <div class="row">
				  	<div class="col-sm-3">
				  		<strong><h4><b>Producto</b></h4></strong>
				  	</div>
				  	<div class="col-sm-3">
				  		<a class="btn btn-primary"><strong>Mandar a Cotización</strong></a>
				  	</div>
				  	<div class="col-sm-3">
				  		<button class="btn btn-warning"><strong>Limpiar</strong></button>
				  	</div>
				  </div><br>
				  <div class="row">
				  	<div class="col-sm-5">
						<label class="control-label" for="montaje_sel">Montaje:</label>
	  					<input type="text" class="form-control" id="montaje_sel" name="montaje_sel"  maxlength="20" placeholder="Clave" readonly>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="precio-montaje_sel">Precio:</label>
	  					<input type="text" class="form-control" id="precio_montaje_sel" name="precio_montaje_sel"  maxlength="20" placeholder="$--" readonly>
					</div><br>
					<div class="col-sm-3">
				  		<button class="btn btn-warning"><strong>Quitar</strong></button>
				  	</div>
				  </div><br>
				  <div class="row">
				  	<div class="col-sm-5">
						<label class="control-label" for="proteccion_sel">Protección:</label>
	  					<input type="text" class="form-control" id="proteccion_sel" name="proteccion_sel"  maxlength="20" placeholder="Clave" readonly>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="precio_proteccion_sel">Precio:</label>
	  					<input type="text" class="form-control" id="precio_proteccion_sel" name="precio_proteccion_sel"  maxlength="20" placeholder="$--" readonly>
					</div><br>
					<div class="col-sm-3">
				  		<button class="btn btn-warning"><strong>Quitar</strong></button>
				  	</div>
				  </div><br>
				  <div class="row">
				  	<div class="col-sm-5">
						<label class="control-label" for="marcos_sel">Marcos y Bastidores:</label>
	  					<input type="text" class="form-control" id="marcos_sel" name="marcos_sel"  maxlength="20" placeholder="Clave" readonly>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="precio_marcos_sel">Precio:</label>
	  					<input type="text" class="form-control" id="precio_marcos_sel" name="precio_marcos_sel"  maxlength="20" placeholder="$--" readonly>
					</div><br>
					<div class="col-sm-3">
				  		<button class="btn btn-warning"><strong>Quitar</strong></button>
				  	</div>
				  </div><br>
				  <div class="row">
				  	<div class="col-sm-5">
						<label class="control-label" for="maria_sel">María Luisa:</label>
	  					<input type="text" class="form-control" id="maria_sel" name="maria_sel"  maxlength="20" placeholder="Clave" readonly>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="precio_maria_sel">Precio:</label>
	  					<input type="text" class="form-control" id="precio_maria_sel" name="precio_maria_sel"  maxlength="20" placeholder="$--" readonly>
					</div><br>
					<div class="col-sm-3">
				  		<button class="btn btn-warning"><strong>Quitar</strong></button>
				  	</div>
				  </div><br>
				  <div class="row">
				  	<div class="col-sm-5">
						<label class="control-label" for="generales_sel">Generales:</label>
	  					<input type="text" class="form-control" id="generales_sel" name="generales_sel"  maxlength="20" placeholder="Clave" readonly>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="precio_generales_sel">Precio:</label>
	  					<input type="text" class="form-control" id="precio_generales_sel" name="precio_generales_sel"  maxlength="20" placeholder="$--" readonly>
					</div><br>
					<div class="col-sm-3">
				  		<button class="btn btn-warning"><strong>Quitar</strong></button>
				  	</div>
				  </div>	
					
				</div>
				</form>
				{{--  Cotización --}}
					

	  			{{-- --------------------------------------------- --}}
			</div>
		</div>	
		
	
		
	

	
	@endsection
