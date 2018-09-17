@foreach($temporales as $temporal)
<tr id='row{{$temporal->id}}'>
	<td class="descripcion">{{$temporal->descripcion}}</td>
	<td class="clave">{{$temporal->clave}}</td>
	<td class="nop">23</td>
	<td class="precio">{{$temporal->precio}}</td>
	<td>
		<button id='row{{$temporal->id}}' type="button" class="btn btn-warning botonagegar">Agregar</button>
	</td>
</tr>
<!--<option value="{{$temporal->id}}">{{$temporal->clave}}</option>-->
@endforeach
<script>
	$('.botonagegar').click(function(){
		var fila = {
			descripcion: $(this).parent().parent().find('.descripcion').html(),
			clave: $(this).parent().parent().find('.clave').html(),
			nop: $(this).parent().parent().find('.nop').html(),
			precio: $(this).parent().parent().find('.precio').html()
			
		};
		aberalcine(fila);
	});


</script>