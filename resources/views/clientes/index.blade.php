@extends('layouts.blank')
@section('content')

<div class="container-fluid">
	<div class="panel-group panel">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Clientes:</h4>
					</div>
					@if(count($clientes) > 0)
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" name="query" id="cliente" class="form-control">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
								</span>
							</div>
						</div>
					@endif
					<div class="col-sm-4 text-center">
						<a href="{{ route('clientes.create') }}" class="btn btn-success">
							<i class="fa fa-plus" aria-hidden="true"></i><strong> Agregar Cliente</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						@if(count($clientes) > 0)
							<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
								<tr class="info">
									<th>@sortablelink('nombre', 'Nombre/Razón Social')</th>
									<th>@sortablelink('Calificación')</th>
									<th>@sortablelink('Correo')</th>
									<th>@sortablelink('Teléfono')</th>
									<th>@sortablelink('Celular')</th>
									<th>Acción</th>
								</tr>
								@foreach($clientes as $cliente)
									<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" href="#{{ $cliente->id }}">
										<td>
											@if ($cliente->tipopersona == "Fisica")
												{{ $cliente->nombre }} {{ $cliente->apellidopaterno }} {{ $cliente->apellidomaterno }}
											@else
												{{ $cliente->razonsocial }}
											@endif
										</td>
										<td>{{ $cliente->prioridad }}</td>
										<td>{{ $cliente->mail }}</td>
										<td>{{ $cliente->telefono }}</td>
										<td>{{ $cliente->celular }}</td>
										<td class="text-center">
											<a class="btn btn-info btn-sm" href="{{ route('clientes.show',$cliente) }}">
												<i class="fa fa-eye" aria-hidden="true"></i> Ver
											</a>
											<a class="btn btn-warning btn-sm" href="{{ route('clientes.edit', $cliente) }}">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
											</a>
										</td>
									</tr>
								@endforeach
							</table>
						@else
							<h4>Aún no hay clientes agregados.</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ asset('js/peticion.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vistarapida.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>

@endsection
