@foreach ($materiales as $material)
	{{-- expr --}}
	<tr>
		<td scope="row">
			{{$material->clave}}
		</td>
		<td>{{$material->descripcion}}</td>
		<td>{{$material->alto}} {{$material->medidas}}</td>
		<td>{{$material->ancho}} {{$material->medidas}} </td>
		<td>{{$material->espesor}} {{$material->medidas}}</td>
		<td>{{$material->color}}</td>
		<td>${{$material->precio}}</td>
		<td>
			<div class="row mt-1 mb-1 justify-content-md-center">
				<a href="#" onclick="addMaterial({{json_encode($material)}} , {{$idtabla}})" class="btn btn-success">
					Agregar
				</a>
			</div>
		</td>
		
	</tr>
@endforeach