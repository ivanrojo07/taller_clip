@extends('layouts.blank')
	@section('content')

	<div class="container" id="tab">
		<form role="form" id="form-cambio" method="POST" name="form" >
			<div role="application" class="panel panel-group">
				<div class="panel-default">
					<div class="panel-heading" style="background-color: lightgray!important;"><h4>Tipo de Cambio:&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-dollar" aria-hidden="true"></i>
				</h4>
				</div>
				<div class="panel-body">
					<div class="row">
					 <form   method="POST" action="{{ route('cambio.update',['tipoCambio'=>null]) }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="_method" value="PUT">
							
						<div class="col-sm-3">
							<label class="control-label" for="valor">Cantidad de Pesos por Dolar:</label>
	  						<input type="number" step="any" class="form-control" id="cantidad" name="cantidad" placeholder="$--">
						</div>
						<div class="col-sm-3">
							<label class="control-label" for="fecha">Fecha Actual:</label>
	  						<input type="date" class="form-control" id="fecha" name="fecha"  value="{{date('Y-m-d')}}" readonly style="color: black;">
						</div>
						<div class="col-sm-3">
							<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="submit" class="btn btn-warning"><strong>Agregar</strong></button>
							
						</div>
					  </form>
					</div>
				</div><br>
				<div class="panel-heading">
					<h4>Historial Mensual:&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-history" aria-hidden="true"></i>
					       </h4>
				</div>
				<div class="panel-body">
					<div class="container-fluid" style=" max-height: 200px;  overflow-y: scroll;">
						  <table class="table" style="border: solid;">
						  	 <thead style="background-color: black; color: white;">
							    <tr>
							        <th  style="text-align: center;">Pesos por Dolar</th>
							        <th  style="text-align: center;">Fecha</th>
							    </tr>
							 </thead>
							 <tbody style="color: black;">
							 	@foreach($tipoCambios as $cambio)
						      <tr style="text-align: center;">
						        <td><strong>{{$cambio->cantidad}}</strong></td>
						        <td><strong>{{$cambio->fecha}}</strong></td>
						      </tr>
						      @endforeach

						     </tbody>
						  </table>
					</div>
				</div>

				</div>
			</div>
		</form>
	</div>
	@endsection