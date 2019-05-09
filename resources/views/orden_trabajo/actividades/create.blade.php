@extends('layouts.blank')
@section('content')

<div class="container-fluid">
	{{-- @if($edit)
		<form role="form" method="POST" action="{{ route('empleados.update', ['empleado' => $empleado]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
	@else --}}
		<form role="form" id="form-empleado" method="POST" action="" name="form">
			{{ csrf_field() }}
			<input type="hidden" name="id">
	{{-- @endif --}}
		<div role="application" class="panel panel-group">
			<div class="panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h4>Datos de la Actividad:</h4>
						</div>
						<div class="col-sm-4 text-center">
							<a href="{{ route('actividades.index') }}" class="btn btn-primary">
								<i class="fa fa-bars" aria-hidden="true"></i><strong> Lista de Actividades</strong>
							</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-3">
							<label class="control-label" for="appaterno">✱Nombre de la actividad:</label>
							<input type="text" class="form-control" id="appaterno" name="appaterno" required="">
						</div>
						<div class="col-sm-3">
							<label class="control-label" for="apmaterno">Descripción:</label>
							<input type="text" id="apmaterno" class="form-control" name="apmaterno" required="">
						</div>
						
						
					</div>
				</div>
			</div>			
		</div>
	</form>
</div>
@endsection