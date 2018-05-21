@extends('layouts.cotizacion')
@section('content')


<h1 class="display-4">Explosionado</h1>
<br>
<div class="row ">
	<div class="col mt-3">

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="inputGroupSelect01">Tipo de Material</label>
			</div>
			<select class="custom-select" id="inputGroupSelect01">
				<option value="1">opción</option>
				<option value="2">opción</option>
				<option value="3">opción</option>
			</select>
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="inputGroupSelect01">Material</label>
			</div>
			<select class="custom-select" id="inputGroupSelect01">
				<option value="1">opción</option>
				<option value="2">opción</option>
				<option value="3">opción</option>
			</select>
		</div>

	</div>
	<div class="col">
		<div class="row justify-content-center">
			<p class="h3">Medidas/Especificaciones</p>
		</div>
		<div class="row mx-5">

			<div class="col-8">
				<div class="row">
					<div class="col-12">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Alto</span>
							</div>
							<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
						</div>
					</div>
					<div class="col-12">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Ancho</span>
							</div>
							<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
						</div>
					</div>
					<div class="col-12">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Color</span>
							</div>
							<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
						</div>
					</div>
					<div class="col-12">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">Espesor</span>
							</div>
							<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
						</div>
					</div>
				</div>
			</div>

			<div class="col-4 align-self-center">
				<button type="button" class="btn btn-warning btn-lg btn-block">Buscar</button>
				<button type="button" class="btn btn-warning btn-lg btn-block">Limpiar</button>
			</div>
		</div>

	</div>
</div>


<div class="row">

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

<div class="row mx-5">

	<table class="table table-striped table-warning">
		<thead>
			<tr class="bg-warning">
				<th scope="col">Tipo Material</th>
				<th scope="col">Material</th>
				<th scope="col">Clave</th>
				<th scope="col"># de Piezas</th>
				<th scope="col">Monto</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>tip</td>
				<td>mat</td>
				<td>clav</td>
				<td>no. p</td>
				<td>mont</td>
			</tr>
		</tbody>
	</table>

</div>

<div class="row ">
	<div class="col justify-content-center col-4 offset-4">
		<a href="{{route('cotizacion')}}" class="btn btn-warning btn-lg btn-block" role="button" aria-pressed="true">cotizar</a>
	</div>
</div>


@endsection
