@extends('layouts.blank')
	@section('content')
	


	<div class="container" id="tab">
		<form role="form" id="form-cliente" method="POST" name="form" >
			{{ csrf_field() }}
		<div role="application" class="panel panel-group">
			<div class="panel-default">
				<div class="panel-heading"><h4>Datos del Producto:&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos
				</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-3">
							<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i>  Nombre:</label>
							  <div class="input-group">
						 <span class="input-group-addon" id="basic-addon3" onclick='getNombre()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="nombre" class="form-control" id="nombre">
	  							<option id="Sin Definir" value="Sin Definir" selected="selected">Sin Definir</option>
	  						</select>
	  					     </div>
						</div>
						<div class="col-sm-3">
							<label class="control-label" for="tipo"><i class="fa fa-asterisk" aria-hidden="true"></i>  Tipo:</label>
							  <div class="input-group">
						 <span class="input-group-addon" id="basic-addon3" onclick='getTipo()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="tipo" class="form-control" id="tipo">
	  							<option id="Sin Definir" value="Sin Definir" selected="selected">Sin Definir</option>
	  						</select>
	  					     </div>
						</div>
						<div class="col-sm-3">
							<label class="control-label" for="unidades"><i class="fa fa-asterisk" aria-hidden="true"></i>  Unidades:</label>
							  <div class="input-group">
						 <span class="input-group-addon" id="basic-addon3" onclick='getUnidades()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="unidades" class="form-control" id="unidades">
	  							<option id="Sin Definir" value="Sin Definir" selected="selected">Sin Definir</option>
	  						</select>
	  					     </div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-3">
							<label class="control-label" for="precio"> Precio:</label>
	  						<input type="number" class="form-control" id="precio" name="precio"  t placeholder="$--">
						</div>
						<div class="col-sm-3">
							<label class="control-label" for="cambio">Tipo de Cambio: &nbsp;&nbsp;&nbsp;&nbsp;
								<b>|{{date('d-m-y')}}|</b></label>
	  						<input type="number" class="form-control" id="cambio" name="cambio"  maxlength="20" placeholder="$--" readonly value="18.4">
						</div>
						<div class="col-sm-3">
							<label class="control-label" for="ajuste">Ajuste: (Automático)</label>
	  						<input type="number" class="form-control" id="ajuste" name="ajuste"  maxlength="20" placeholder="$--" readonly>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-3">
							<label class="control-label" for="codigo">Código:</label>
	  						<input type="text" class="form-control" id="codigo" name="codigo"  maxlength="20" placeholder="Código de Producto">
						</div>
						<div class="col-sm-3">
							<label class="control-label" for="medida">Medida:</label>
	  						<input type="text" class="form-control" id="medida" name="medida"  maxlength="20" placeholder="Medidas">
						</div>
						<div class="col-sm-3">
							<label class="control-label" for="proveedor_id"><i class="fa fa-asterisk" aria-hidden="true"></i> Proveedor:</label>
							  <div class="input-group">
						 <span class="input-group-addon" id="basic-addon3" onclick='getProveedores()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="proveedor_id" class="form-control" id="proveedor_id">
	  							<option id="Sin Definir" value="Sin Definir" selected="selected">Sin Definir</option>
	  						</select>
	  					     </div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-3">
							<label class="control-label" for="utilidad"><i class="fa fa-asterisk" aria-hidden="true"></i> Utilidad:</label>						  
	  						<select type="select" name="utilidad" class="form-control" id="utilidad">
	  							<option id="default" value="default" >Seleccione Uno</option>
	  							<option id="Montajes" value="Montajes" >Montajes</option>
	  							<option id="Proteccion" value="Proteccion" >Protección</option>
	  							<option id="Marcos y Bastidores" value="Marcos y Bastidores" >Marcos y Bastidores</option>
	  							<option id="Maria Luisa" value="Maria Luisa" >María Luisa</option>
	  							<option id="Generales" value="Generales" >Generales</option>
	  						</select>
						</div>
					</div><br>

		{{-- Montaje --}}			
	<div class="container col-sm-12 jumbotron" style="border: solid; border-color: gray; display: none;" id="montajes_div">
		<div class="row">
			<h3>Montajes</h3>
		</div><br>
		<div class="row">
			<div class="col-sm-3">
				<label class="control-label" for="nombre_montaje">Nombre:</label>
	  			<input type="text" class="form-control" id="nombre_montaje" name="nombre_montaje"  maxlength="20">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="color_montaje">Color:</label>
	  			<input type="text" class="form-control" id="color_montaje" name="color_montaje"  maxlength="20">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="espesor_montaje">Espesor:</label>
	  			<input type="text" class="form-control" id="espesor_montaje" name="espesor_montaje"  maxlength="20">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="clave_montaje">Clave Montaje: (Automático)</label>
	  			<input type="text" class="form-control" id="clave_montaje" name="clave_montaje"  maxlength="20" readonly placeholder="Nombre+Color+Espesor">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3">
				<label class="control-label" for="material_montaje"><i class="fa fa-asterisk" aria-hidden="true"></i>Material:</label>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3" onclick='getMateriales()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="material_montaje" class="form-control" id="material_montaje">
	  							<option id="Sin Definir" value="Sin Definir" selected="selected">Sin Definir</option>
	  						</select>
	  				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="abreviatura_montaje">Abreviatura:</label>
	  			<input type="text" class="form-control" id="abreviatura_montaje" name="abreviatura_montaje"  maxlength="20">
			</div>
			<div class="col-sm-6">
				<label class="control-label" for="descripcion_montaje">Descripción:</label>
	  			<textarea class="form-control" id="descripcion_montaje" name="descripcion_montaje"  maxlength="20">
	  			</textarea>
			</div>
		</div>				
	</div>
	{{-- Montaje --}}

	{{-- Protección --}}
	<div class="container col-sm-12 jumbotron" style="border: solid; border-color: gray; display: none;" id="proteccion_div">
		<div class="row">
			<h3>Protección</h3>
		</div><br>
		<div class="row">
			<div class="col-sm-3">
				<label class="control-label" for="nombre_proteccion">Nombre:</label>
	  			<input type="text" class="form-control" id="nombre_proteccion" name="nombre_proteccion"  maxlength="20">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="color_proteccion">Color:</label>
	  			<input type="text" class="form-control" id="color_proteccion" name="color_proteccion"  maxlength="20">
			</div>
			
			<div class="col-sm-3">
				<label class="control-label" for="espesor_proteccion">Espesor:</label>
	  			<input type="text" class="form-control" id="espesor_proteccion" name="espesor_proteccion"  maxlength="20">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="clave_proteccion">Clave Protección: (Automático)</label>
	  			<input type="text" class="form-control" id="clave_proteccion" name="clave_proteccion"  maxlength="20" readonly placeholder="Nombre+Color+Espesor">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3">
				<label class="control-label" for="calidad_proteccion"><i class="fa fa-asterisk" aria-hidden="true"></i>Calidad:</label>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3" onclick='getCalidad()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="calidad_proteccion" class="form-control" id="calidad_proteccion">
	  							<option id="Sin Definir" value="Sin Definir" selected="selected">Sin Definir</option>
	  						</select>
	  				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="abreviatura_proteccion">Abreviatura:</label>
	  			<input type="text" class="form-control" id="abreviatura_proteccion" name="abreviatura_proteccion"  maxlength="20">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="laminado_proteccion">Laminado:</label>
	  			<input type="text" class="form-control" id="laminado_proteccion" name="laminado_proteccion"  maxlength="20">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="acrilico_proteccion">Acrílico:</label>
	  			<input type="text" class="form-control" id="acrilico_proteccion" name="acrilico_proteccion"  maxlength="20">
			</div>
			
		</div><br>
		<div class="row">
			<div class="col-sm-3">
				<label class="control-label" for="tam_max_proteccion">Tamaño Máximo:</label>
	  			<input type="text" class="form-control" id="tam_max_proteccion" name="tam_max_proteccion"  maxlength="20">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="tam_min_proteccion">Tamaño Mínimo:</label>
	  			<input type="text" class="form-control" id="tam_min_proteccion" name="tam_min_proteccion"  maxlength="20">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="vidrio_proteccion">Vidrio:</label>
	  			<input type="text" class="form-control" id="vidrio_proteccion" name="vidrio_proteccion"  maxlength="20">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-6">
				<label class="control-label" for="descripcion_proteccion">Descripción:</label>
	  			<textarea class="form-control" id="descripcion_proteccion" name="descripcion_proteccion"  maxlength="20">
	  			</textarea>
			</div>
		</div>				
	</div>
	{{-- Protección --}}

	{{-- Marcos --}}
		<div class="container col-sm-12 jumbotron" style="border: solid; border-color: gray; display: none;" id="marcos_div">
		<div class="row">
			<h3>Marcos y Bastidores</h3>
		</div><br>
		<div class="row">
			<div class="col-sm-3">
				<label class="control-label" for="nombre_marco">Nombre:</label>
	  			<input type="text" class="form-control" id="nombre_marco" name="nombre_marco"  maxlength="20">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="color_marco"><i class="fa fa-asterisk" aria-hidden="true"></i>Color:</label>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3" onclick='getColores()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="color_marco" class="form-control" id="color_marco">
	  							<option id="Sin Definir" value="Sin Definir" selected="selected">Sin Definir</option>
	  						</select>
	  				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="material_marco"><i class="fa fa-asterisk" aria-hidden="true"></i>Material:</label>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3" onclick='getMateriales()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="material_marco" class="form-control" id="material_marco">
	  							<option id="Sin Definir" value="Sin Definir" selected="selected">Sin Definir</option>
	  						</select>
	  				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="clave_montaje">Clave Marco/Bastidor:</label>
	  			<input type="text" class="form-control" id="clave_montaje" name="clave_montaje"  maxlength="20" readonly placeholder="No Definido Aún">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3">
				<label class="control-label" for="moldura_marco"><i class="fa fa-asterisk" aria-hidden="true"></i>Tipo de Moldura:</label>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3" onclick='getMoldura()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="moldura_marco" class="form-control" id="moldura_marco">
	  							<option id="Sin Definir" value="Sin Definir" selected="selected">Sin Definir</option>
	  						</select>
	  				</div>
			</div>
			<div class="col-sm-3">
							<label class="control-label" for="espesor_marco"><i class="fa fa-asterisk" aria-hidden="true"></i> Espesor de Moldura:</label>
							<select type="select" name="espesor_marco" class="form-control" id="espesor_marco">
	  							<option id="Delgada" value="Delgada" >Delgada</option>
	  							<option id="Mediana" value="Mediana" >Mediana</option>
	  							<option id="Gruesa" value="Gruesa" >Gruesa</option>
	  							
	  						</select>
	  		</div>
			<div class="col-sm-3">
				<label class="control-label" for="madera_marco"><i class="fa fa-asterisk" aria-hidden="true"></i>Tipo de Madera:</label>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3" onclick='getMaderas()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="madera_marco" class="form-control" id="madera_marco">
	  							<option id="Sin Definir" value="Sin Definir" selected="selected">Sin Definir</option>
	  						</select>
	  				</div>
			</div>
			
		</div><br>			
	</div>  
	{{-- Marcos --}} 

	{{-- MariaLuisa --}}
<div class="container col-sm-12 jumbotron" style="border: solid; border-color: gray; display: none;" id="maria_div">
		<div class="row">
			<h3>María Luisa</h3>
		</div><br>
		<div class="row">
			<div class="col-sm-3">
				<label class="control-label" for="nombre_maria">Nombre:</label>
	  			<input type="text" class="form-control" id="nombre_maria" name="nombre_maria"  maxlength="20">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="material_maria"><i class="fa fa-asterisk" aria-hidden="true"></i>Material:</label>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3" onclick='getMateriales()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
	  						<select type="select" name="material_maria" class="form-control" id="material_maria">
	  							<option id="Sin Definir" value="Sin Definir" selected="selected">Sin Definir</option>
	  						</select>
	  				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="clave_montaje">Clave María Luisa</label>
	  			<input type="text" class="form-control" id="clave_montaje" name="clave_montaje"  maxlength="20" readonly placeholder="No Definido Aún">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-6">
				<label class="control-label" for="descripcion_montaje">Descripción:</label>
	  			<textarea class="form-control" id="descripcion_montaje" name="descripcion_montaje"  maxlength="20">
	  			</textarea>
			</div>
		</div>				
	</div>
	{{-- MariaLuisa --}}

	{{-- Generales --}}	
	<div class="container col-sm-12 jumbotron" style="border: solid; border-color: gray; display: none;" id="generales_div">
		<div class="row">
			<h3>Generales</h3>
		</div><br>
		<div class="row">
			<div class="col-sm-3">
				<label class="control-label" for="nombre_generales">Nombre:</label>
	  			<input type="text" class="form-control" id="nombre_generales" name="nombre_generales"  maxlength="20">
			</div>
			<div class="col-sm-3">
				<label class="control-label" for="clave_generales">Clave Generales</label>
	  			<input type="text" class="form-control" id="clave_generales" name="clave_generales"  maxlength="20" readonly placeholder="No Definido Aún">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-6">
				<label class="control-label" for="descripcion_generales">Descripción:</label>
	  			<textarea class="form-control" id="descripcion_generales" name="descripcion_generales"  maxlength="20">
	  			</textarea>
			</div>
		</div>				
	</div>
	{{-- Generales --}}				
	  						
	  					
						
	  		
	  					
	  					
	  					
	    				

	  			</div>
			</div>
		</div>	
		</form>
	</div>
		
	

	
	@endsection
