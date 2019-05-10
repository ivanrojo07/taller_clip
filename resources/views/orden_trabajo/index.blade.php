@extends('layouts.blank')
@section('content')

<div class="container-fluid">
	<div class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Ordenes de trabajo:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('ordentrabajo.create')}}">
							<i class="fa fa-plus" aria-hidden="true"></i><strong> Agregar ordenes de trabajo</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						{{-- @if(count($empleados) > 0) --}}
							<table class="table table-striped table-bordered table-hover" style="color: rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
								<thead>
									<tr class="info">
										<th>#</th>
										<th>Nombre</th>
										<th>Cliente</th>
										<th>Fecha de solicitud</th>
										<th>Fecha de entrega</th>
										<th>% de Avance</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Orden de trabajo X</td>
										<td>B&W</td>
										<td>13/05/2019</td>
										<td>18/05/2019</td>
										<td>50%</td>
										<td><a class="btn btn-info" href="{{ route('ordentrabajo.show',['id'=>1]) }}">Ver</a></td>
									</tr>									
								</tbody>
								
							</table>
							
						
							{{-- <h4>No hay Ordenes de trabajo agregadas.</h4> --}}
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- <script type="text/javascript" src="{{ asset('js/peticion.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vistarapida.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>  		 --}}	

@endsection
