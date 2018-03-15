@extends('layouts.blank')
	@section('content')

	<div class="container" id="tab">
		<form role="form" id="form-cambio" method="POST" name="form" >
			<div role="application" class="panel panel-group">
				<div class="panel-default">
					<div class="panel-heading"><h4>Tipo de Cambio:&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-dollar" aria-hidden="true"></i>
				</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-3">
							<label class="control-label" for="valor">Cantidad de Pesos por Dolar:</label>
	  						<input type="number" class="form-control" id="valor" name="valor" placeholder="$--">
						</div>
						<div class="col-sm-3">
							<label class="control-label" for="fecha">Fecha Actual:</label>
	  						<input type="date" class="form-control" id="fecha" name="fecha"  value="{{date('Y-m-d')}}" readonly style="color: black;">
						</div>
						<div class="col-sm-3">
							<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" name="submit" value="Agregar" class="btn btn-primary" disabled>
						</div>
					</div>
				</div><br>
				<div class="panel-heading">
					<h4>Historial Mensual:&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-history" aria-hidden="true"></i>
					       </h4>
				</div>
				<div class="panel-body">
					<div class="container-fluid">
						  <table class="table" style="border: solid;">
						  	 <thead style="background-color: black; color: white; ">
							    <tr>
							        <th  style="text-align: center;">Pesos por Dolar</th>
							        <th  style="text-align: center;">Fecha</th>
							    </tr>
							 </thead>
							 <tbody style="color: black;">
						      <tr style="text-align: center;">
						        <td><strong>18.4</strong></td>
						        <td><strong>{{date('d/m/Y')}}</strong></td>
						      </tr>
						       <tr style="text-align: center;">
						        <td><strong>18.17</strong></td>
						        <td><strong>14/03/2018</strong></td>
						      </tr>
						      <tr>
						     </tbody>
						  </table>
					</div>
				</div>

				</div>
			</div>
		</form>
	</div>
	@endsection