@extends('layouts.cotizacion')
	@section('content')
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-sm-4">
						<h5>Obras:</h5>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="mt-1">
					<table class="table table-striped table-bordered">
						<thead>
							<tr class="table-info">
								<th scope="col" style="width: 130px;" >Nombre</th>
								<th scope="col" >Piezas</th>
								<th scope="col">Descripción</th>
								<th scope="col" >Medidas</th>
								<th scope="col" >Materiales</th>
								<th scope="col">Precio</th>
								<th style="width: 115px;" scope="col" >Accion</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach ($obras as $obra)
								{{-- expr --}}
								<tr>
									<td scope="row">
										{{$obra->nombre}} 
									</td>
									<td>{{$obra->nopiezas}}</td>
									<td>{{$obra->descripcion_obra}}</td>
									<td>{{$obra->alto_obra}} X {{$obra->ancho_obra}} X {{$obra->profundidad_obra}} {{$obra->unidad_obra}}</td>
									<td>
										@foreach ($obra->materiales as $material)
											{{-- expr --}}
											<div class="row">
												<div class="col">
													{{$material->clave}}
													<button type="button" data-toggle="modal" data-target="#modalCenter{{$material->id}}" class="btn btn-link">Ver</button>
													<!-- Modal -->
													<div class="modal fade bd-example-modal-lg" id="modalCenter{{$material->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
													  <div class="modal-dialog modal-lg">
													    <div class="modal-content">
													      <div class="modal-header">
													        <h5 class="modal-title" id="exampleModalLabel">{{$material->clave}}</h5>
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													          <span aria-hidden="true">&times;</span>
													        </button>
													      </div>
													      <div class="modal-body">
													        <div class="row">
													        	<div class="col-sm-4 form-group">
													        		<label class="control-label">Clave:</label>
													        		<label class="form-control">{{$material->clave}}</label>
													        	</div>
													        	<div class="col-sm-4 form-group">
													        		<label class="control-label">Sección:</label>
													        		<label class="form-control">{{$material->seccion}}</label>
													        	</div>
													        	<div class="col-sm-4 form-group">
													        		<label class="control-label">Cantidad:</label>
													        		<label class="form-control">{{$material->pivot->cantidad}}</label>
													        	</div>
													        </div>
													        <div class="row">
													        	<div class="col-sm-4 form-group">
													        		<label class="control-label">Alto:</label>
													        		<label class="form-control">{{$material->alto}} {{$material->medidas}}</label>
													        	</div>
													        	<div class="col-sm-4 form-group">
													        		<label class="control-label">Ancho:</label>
													        		<label class="form-control">{{$material->ancho}} {{$material->medidas}}</label>
													        	</div>
													        	<div class="col-sm-4 form-group">
													        		<label class="control-label">Profundidad:</label>
													        		<label class="form-control">{{$material->espesor}} {{$material->medidas}}</label>
													        	</div>
													        </div>
													        <div class="row">
													        	<div class="col-sm-6 form-group">
													        		<label class="control-label">Descripción:</label>
													        		<label class="form-control">{{$material->descripcion}}</label>
													        	</div>
													        	<div class="col-sm-6 form-group">
													        		<label class="control-label">Proveedor:</label>
													        		<label class="form-control">{{$material->proveedor->razonsocial ? $material->proveedor->razonsocial : $material->proveedor->nombre." ".$material->proveedor->apellidopaterno." ".$material->proveedor->apellidomaterno}}</label>
													        	</div>
													        </div>
													        <div class="row">
													        	<div class="col-sm-4 form-group">
													        		<label class="control-label">Costo:</label>
													        		<label class="form-control">${{$material->costo}}MXN</label>
													        	</div>
													        	<div class="col-sm-4 form-group">
													        		<label class="control-label">Porcentaje de ganancia:</label>
													        		<label class="form-control">{{$material->ganancia}}%</label>
													        	</div>
													        	<div class="col-sm-4 form-group">
													        		<label class="control-label">Precio venta:</label>
													        		<label class="form-control">${{$material->precio}}MXN</label>
													        	</div>
													        </div>
													      </div>
													    </div>
													  </div>
													</div>
												</div>
											</div>
										@endforeach
									</td>
									<td>${{$obra->precio_obra}}MXN</td>
									<td></td>
									
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endsection