@extends('layouts.cotizacion')
@section('content')


<h3>Explosionado</h3>
<br>
<form action="" id="explosionadoForm"></form>
<div class="row mt-3">
	<div class="col-3 offset-2">

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="inputGroupSelect01">Tipo de Material</label>
			</div>
			<select class="custom-select" id="tipoMaterial" form="explosionadoForm">
				<option value="1">opción</option>
				<option value="2">opción</option>
				<option value="3">opción</option>
			</select>
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="inputGroupSelect01">Material</label>
			</div>
			<select class="custom-select" id="material" form="explosionadoForm">
				<option value="1">opción</option>
				<option value="2">opción</option>
				<option value="3">opción</option>
			</select>
		</div>

	</div>
	<div class="col-5">
		<div class="row justify-content-center">
			<p class="h5">Medidas/Especificaciones</p>
		</div>
		<div class="row mx-5">

			<div class="col-8">
				<div class="row">
					<div class="col-12">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Alto</span>
							</div>
							<input type="text" class="form-control" id="alto" aria-describedby="basic-addon3" form="explosionadoForm">
							<select class="custom-select" id="inputGroupSelect01">
								<option selected>Unidades...</option>
								<option value="1">m</option>
								<option value="2">cm</option>
								<option value="3">mm</option>
							</select>
						</div>
					</div>
					<div class="col-12">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Ancho</span>
							</div>
							<input type="text" class="form-control" id="ancho" aria-describedby="basic-addon3" form="explosionadoForm">
							<select class="custom-select" id="inputGroupSelect01">
								<option selected>Unidades...</option>
								<option value="1">m</option>
								<option value="2">cm</option>
								<option value="3">mm</option>
							</select>
						</div>
					</div>
					<div class="col-12">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Color</span>
							</div>
							<input type="text" class="form-control" id="color" aria-describedby="basic-addon3" form="explosionadoForm">
						</div>
					</div>
					<div class="col-12">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Espesor</span>
							</div>
							<input type="text" class="form-control" id="espesor" aria-describedby="basic-addon3" form="explosionadoForm">
						</div>
					</div>
				</div>
			</div>

			<div class="col-4 align-self-center">
				<button type="button" class="btn btn-warning btn-lg btn-block">Buscar</button>
				<input type="reset" class="btn btn-warning btn-lg btn-block" value="Limpiar" form="explosionadoForm">
			</div>
		</div>

	</div>
</div>


<div class="row">
	<div class="col-8 offset-2">
		<table class="table table-striped table-warning mx-3">
			<thead>
				<tr class="bg-warning">
					<th scope="col">Tipo Material</th>
					<th scope="col">Material</th>
					<th scope="col">Clave</th>
					<th scope="col"># de Piezas</th>
					<th scope="col">Monto</th>
					<th scope="col">Operación</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>tip</td>
					<td>mat</td>
					<td>clav</td>
					<td>no. p</td>
					<td>mont</td>
					<td>
						<button type="button" class="btn btn-warning">Agregar</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-8 offset-2">
		<table class="table table-striped table-warning">
			<thead>
				<tr class="bg-warning">
					<th scope="col">Tipo Material</th>
					<th scope="col">Material</th>
					<th scope="col">Clave</th>
					<th scope="col"># de Piezas</th>
					<th scope="col">Monto</th>
					<th scope="col">Operación</th>
					
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>tip</td>
					<td>mat</td>
					<td>clav</td>
					<td>no. p</td>
					<td>mont</td>
					<td>
						<button type="button" class="btn btn-warning">Quitar</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="row ">
	<div class="col justify-content-center col-4 offset-4">
		<a href="{{route('cotizacion')}}" class="btn btn-warning btn-lg btn-block" role="button" aria-pressed="true">cotizar</a>
	</div>
</div>

<script>
	
</script>
@endsection
