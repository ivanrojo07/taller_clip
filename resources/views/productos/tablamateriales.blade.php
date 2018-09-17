<!-- <h1>HOLA</h1> -->
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
@endforeach
