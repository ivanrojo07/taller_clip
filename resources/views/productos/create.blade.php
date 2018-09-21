@extends('layouts.cotizacion')
@section('content')

<div class="container pt-2">
	<h3>GENERAR ÓRDEN</h3>
	<br>
		
	<form method="POST" action="{{ url('/orden/store/') }}" id="explosionadoForm1">{{ csrf_field() }}</form>
	<input name="_method" type="hidden" form="explosionadoForm1" value="POST">
	<!-- <form id="explosionadoForm">{{ csrf_field() }}</form> -->
			<div class="row">


				<div class="col-12 mb 2" id="app">
					<h4>Datos Órden</h4>
				</div>

				

					<input type="hidden" name="montajes[]" form="explosionadoForm1">
					<input type="hidden" name="protecciones[]" form="explosionadoForm1">
					<input type="hidden" name="marcos[]" form="explosionadoForm1">
					<input type="hidden" name="marias[]" form="explosionadoForm1">
					<input type="hidden" name="generales[]" form="explosionadoForm1">

					<div class="col-6 mb-2">
						<!--espe-->
						<div class="input-group ">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Nombre</span>
							</div>
							<input required type="text" class="form-control" id="nombre" aria-describedby="basic-addon3" form="explosionadoForm1">
						</div>
					</div>
					<div class="col-6 mb-2">
						<!--espe-->
						<div class="input-group ">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Fecha</span>
							</div>
							<input type="date" class="form-control" id="fecha" aria-describedby="basic-addon3" form="explosionadoForm1" readonly>
						</div>
					</div>
					<div class="col-6 mb-2">
						<!--espe-->
						<div class="input-group ">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">ID</span>
							</div>
							<input type="text" class="form-control" id="id" aria-describedby="basic-addon3" form="explosionadoForm1" readonly>
						</div>
					</div>
					<div class="col-6 mb-2">
						<label for="exampleFormControlTextarea1">Descripción</label>
						<textarea form="explosionadoForm1" class="form-control" id="descripcion" rows="3"></textarea>
					</div>

				
				
				<div class="col-12 mb 2">
					<h4>Buscar Materiales</h4>
				</div>

				
					<div class="col-6 mb-2">
						<!--Tipo de mat-->
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">Sección</label>
							</div>
							<select name="seccion" required class="custom-select" id="tipoMaterial" form="explosionadoForm">
								<option value="">SELECCIONAR</option>
								<option value="montaje">Montaje</option>
								<option value="proteccion">Protección</option>
								<option value="marcos">Marcos y Bastidores</option>
								<option value="marialuisa">Maria Luisa</option>
								<option value="generales">Generales</option>
							</select>
						</div>
					</div>
					<div class="col-6 mb-2">
						<!--mat-->
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">Material</label>
							</div>
							<select name="descripcion" required class="custom-select" id="materiales" form="explosionadoForm">
							</select>
						</div>
					</div>
					<div class="col-6 mb-2">
						<!--Alto-->
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Alto</span>
							</div>
							<input required name="alto" type="text" class="form-control" id="alto" aria-describedby="basic-addon3" form="explosionadoForm">
							<select required name="tipo_medidas" class="custom-select" id="unidades1">
								<option value="Metros">m</option>
								<option value="Centimetros">cm</option>
								<option value="Milimetros">mm</option>
							</select>
						</div>
					</div>
					<div class="col-6 mb-2">
						<!--ancojh-->
						<div class="input-group ">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Ancho</span>
							</div>
							<input required name="ancho" type="text" class="form-control" id="ancho" aria-describedby="basic-addon3" form="explosionadoForm">
							<select required class="custom-select" id="unidades2">
								<option value="Metros">m</option>
								<option value="Centimetros">cm</option>
								<option value="Milimetros">mm</option>
							</select>
						</div>
					</div>
					<div class="col-6 mb-2">
						<!--color-->
						<div class="input-group ">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Color</span>
							</div>
							<input required name="color" type="text" class="form-control" name="color" id="color" aria-describedby="basic-addon3" form="explosionadoForm">
						</div>
					</div>
					<div class="col-6 mb-2">
						<!--espe-->
						<div class="input-group ">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Espesor</span>
							</div>
							<input required name="espesor" type="text" class="form-control" id="espesor" aria-describedby="basic-addon3" form="explosionadoForm">
						</div>
					</div>
					
					<div class="col-6 my-3">
						<button id="buscarMateriales" class="btn btn-warning btn-lg btn-block">Buscar</button>
					</div>
					<div class="col-6 my-3">
						<input type="reset" class="btn btn-warning btn-lg btn-block" value="Limpiar" form="explosionadoForm">
					</div>

				


			</div>
		
				<!--MEDIDAS y dalkjsdkans-->
							<p class="h5">Medidas/Especificaciones</p>
				
				<!--Inputs-->

			<table class="table table-striped table-warning">
				<thead>
					<tr class="bg-warning">
						<th>Descripción</th>
						<th>Clave</th>
						<th># de Piezas</th>
						<th>Precio</th>
						<th>Operación</th>
					</tr>
				</thead>
				<tbody id='daddy'>
				</tbody>
			</table>

			<table class="table table-striped table-warning" id="daddy2">
				<thead>
					<tr class="bg-warning">
						<th>Tipo Material</th>
						<th>Descripción</th>
						<th>Clave</th>
						<th># de Piezas</th>
						<th>Monto</th>
						<th>Operación</th>
						
					</tr>
				</thead>
				<tbody >
				</tbody>
			</table>
			<button type="submit" class="btn btn-warning btn-lg btn-block" role="button" aria-pressed="true" form="explosionadoForm1">Cotizar</a>
			<!-- <a href="{{route('cotizacion')}}" class="btn btn-warning btn-lg btn-block" role="button" aria-pressed="true">Cotizar</a> -->

	<script> 

//CONFIG

		var ids = 0;
		$(document).ready(function(){
			var now = new Date();
			var day = ("0" + now.getDate()).slice(-2);
			var month = ("0" + (now.getMonth() + 1)).slice(-2);
			var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
			$('#fecha').val(today);

		});

		$('#color').keyup(function() {
			this.value = this.value.toUpperCase();
		});

		$('#unidades1').on('change', function(){
			$('#unidades2').val($('#unidades1').val());

		});

		$('#unidades2').on('change', function(){
			$('#unidades1').val($('#unidades2').val());

		});


//BUSCAR CON SELECT
		$('#tipoMaterial').change(function(){
			//alert('nani');
			var a = '';
			switch($(this).val()){
				case 'montaje':
					a = 'montaje2'
					c = 'Montaje'
					break;
				case 'proteccion':
					a = 'proteccion2';
					c = 'Protección'
					break;
				case 'marcos':
					a = 'marco2';
					c = 'Marco'
					break;
				case 'marialuisa':
					c = 'Maria Luisa'
					a = 'maria2';
					break;
				case 'generales':
					c = 'Generales'
					a = 'generales2';
					break;
			}

			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: '../'+a,
			    type: "GET",
			    dataType: "html",
			    success: function(res){
					//$('#daddy').html(res);
					//alert('../'+a);
					$('#materiales').html(res);		
                },
                error: function (){
					//$('#daddy').html('');
					$('#materiales').html('');
                }
			});	
		});

		/*
		function aberalcine2(a){
			console.log(a);
			console.log($('#'+a).html());
		}
*/
	




//BUSCAR CON BOTÓN
			$('#buscarMateriales').click(function(){
			//alert('nani');
			var a = '';
			switch($('#tipoMaterial').val()){
				case 'montaje':
					a = 'montaje22'
					c = 'Montaje'
					break;
				case 'proteccion':
					a = 'proteccion22';
					c = 'Protección'
					break;
				case 'marcos':
					a = 'marco22';
					c = 'Marco'
					break;
				case 'marialuisa':
					c = 'Maria Luisa'
					a = 'maria22';
					break;
				case 'generales':
					c = 'Generales'
					a = 'generales22';
					break;
			}
			seccion = $('#tipoMaterial').val();
			alto = $('#alto').val();
			ancho = $('#ancho').val(); 
			descripcion = $('#materiales').val();
			color = $('#color').val();
			espesor = $('#espesor').val();
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: '/buscarparaorden/',
				type: "GET",
				data:{
					seccion: seccion,
					alto: alto,
					ancho: ancho,
					espesor: espesor,
					color: color,
					descripcion: descripcion
				},
			    dataType: "html",
			    success: function(res){
					//$('#daddy').html(res);
					//alert('../'+a);
					$('#daddy').html(res);		
                },
                error: function (){
					//$('#daddy').html('');
					$('#daddy').html('');
                }
			});	
		});
		

		
		function aberalcine(data){
			data.tipomaterial = c;
			var idstr = "tr" + ids;
			$('#daddy2 tr:last').after('<tr id=\"tr'+ids+'\"><td>'+data.tipomaterial+'</td><td>'+data.descripcion+'</td><td>'+data.clave+'</td><td>'+data.nop+'</td><td>'+data.precio+'</td><td><button  id=\"tr'+ids+'\" type=\"button\" class=\"btn btn-warning bquitar\">Quitar</button></td></tr>');
			tabla2.push(data);

			ids++;
			//alert(tabla2);
			//alert(tabla2[0].tipomaterial);
			//alert(tabla2.length);
			$('button#'+idstr).click(function(){
				//alert($('tr#'+idstr).prevAll().length-1);
				//alert("padres: "+$(this).parent().parent().prevAll().length);
				$('tr#'+idstr).remove();
				//alert('antes de');

				//delete tabla2[$('tr#'+idstr).prevAll().length]
				console.log($(this).parent().parent().html());
				tabla2.splice($(this).parent().parent().prevAll().length, 1);
				//alert('depues de');


			});
		}

		function preaberalcine(){
			$('.botonagegar').click(function(){
				var fila = {
					descripcion: $(this).parent().parent().find('.descripcion').html(),
					clave: $(this).parent().parent().find('.clave').html(),
					nop: $(this).parent().parent().find('.nop').html(),
					precio: $(this).parent().parent().find('.precio').html()
					
				};
				aberalcine(fila);
			});
		}

	</script>
</div>

@endsection
