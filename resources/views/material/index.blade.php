@extends('layouts.cotizacion')
	@section('content')
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-sm-4">
						<h5>Materiales:</h5>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="mt-1">
					<table class="table table-striped table-bordered">
						<thead>
							<tr class="table-info">
								<th scope="col" style="width: 130px;" >Clave</th>
								<th scope="col" >Sección / descripción / Proveedor</th>
								<th scope="col" >Medidas</th>
								<th scope="col" >Color</th>
								<th scope="col" >Costo / Ganancia</th>
								<th scope="col" >Precio venta</th>
								<th style="width: 115px;" scope="col" >Fecha</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ($materiales as $material)
								{{-- expr --}}
								<tr>
									<td scope="row">
										<div class="row mt-1 mb-1 justify-content-md-center">
											{{$material->clave}}
										</div> 
										<div class="row mt-1 mb-1 justify-content-md-center">
											<a  href="{{ route('material.edit',['material'=>$material->id]) }}" class="btn btn-info">Editar</a>
										</div>
									</td>
									<td>{{$material->seccion}} / {{$material->descripcion}} / {{$material->proveedor->razonsocial ? $material->proveedor->alias : $material->proveedor->nombre." ".$material->proveedor->apellidopaterno." ".$material->proveedor->apellidomaterno}}</td>
									<td>{{$material->alto}} X {{$material->ancho}} X {{$material->espesor}} {{$material->medidas}}</td>
									<td>{{$material->color}}</td>
									<td>${{$material->costo}} <br> {{$material->ganancia}}%</td>
									<td>${{$material->precio}}</td>
									<td>{{date('d-m-Y', strtotime($material->created_at))}}</td>
									
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endsection