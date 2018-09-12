@foreach($temporales as $temporal)
<tr id='row{{$temporal->id}}'>
	<td>{{$temporal->descripcion}}</td>
	<td>{{$temporal->clave}}</td>
	<td></td>
	<td>{{$temporal->precio}}</td>
	<td>
		<button id='row{{$temporal->id}}' type="button" class="btn btn-warning botonagegar">Agregar</button>
	</td>
</tr>
<!--<option value="{{$temporal->id}}">{{$temporal->clave}}</option>-->
@endforeach
<script>
	$('.botonagegar').click(function(){
		
		var a = $('#'+$(this).attr('id'));
		$('#'+$(this).attr('id')).hide();
		alert(a);
		$('#daddy2').append(a);
		});
</script>