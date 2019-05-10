@extends('layouts.blank')
@section('content')
<div class="container-fluid">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos de la orden de trabajo:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('ordentrabajo.create') }}">
							<i class="fa fa-plus" aria-hidden="true"></i><strong> Agregar Orden de trabajo</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-primary" href="{{ route('ordentrabajo.index') }}">
							<i class="fa fa-bars" aria-hidden="true"></i><strong> Lista de ordenes de trabajo</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="nombre">Nombre(s):</label>
						<dd>Orden de trabajo X</dd>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="appaterno">Cliente:</label>
						<dd>B&W</dd>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="apmaterno">Fecha de solicitud:</label>
						<dd>13/05/2019</dd>
					</div>
					
					<div class="col-sm-3">
						<label class="control-label" for="rfc">Fecha de entrega:</label>
						<dd>18/05/2019</dd>
					</div>
					
				</div>
			</div>
		</div>		
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-4">
						<h5>Actividades:</h5>
					</div>
				</div>
			</div>
			 <div class="panel-body">
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="rfc">% realizado: <p id="total">0%</p></label>
						
					</div>
					<div class="col-sm-12">
						<table class="table table-striped table-bordered table-hover" style="color: rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
							<thead>
									<tr class="info">
										<th>Orden</th>
										<th>Nombre</th>
										<th>Valor porcentual de la orden</th>
										<th>Realizada</th>						
									</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>cortar</td>
									<td>20%</td>
									<td><input type="checkbox" id="1" value="20"></td>
								</tr>
								<tr>
									<td>2</td>
									<td>pegar</td>
									<td>30%</td>
									<td><input type="checkbox" name="2" value="30"></td>
								</tr>
								<tr>
									<td>2</td>
									<td>lijar</td>
									<td>25%</td>
									<td><input type="checkbox" name="2" value="25"></td>
								</tr>
								<tr>
									<td>3</td>
									<td>pintar</td>
									<td>25%</td>
									<td><input type="checkbox" name="3" value="25"></td>
								</tr>
							</tbody>
						</table>
					</div>					
			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-12 text-center">
						<a class="btn btn-danger" href="{{-- {{ route('empleados.edit', ['empleado' => $empleado]) }} --}}">
							<i class="fa fa-pencil" aria-hidden="true"></i><strong> Guardar</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="app"></div>

<script type="text/javascript">
	//All of the checkboxes
var $checkboxes = $("input[type=checkbox][name=2]");
var $allCheckboxes=$("input[type=checkbox]");

//The event handler
$checkboxes.on("click", function() {
    //Get the state of the check box you clicked
    var checkedState = this.checked    

    //Make it the state of all the checkboxes
    $checkboxes.each(function() {
        this.checked = checkedState;
        //console.log(this.checked);
    });
});

$(document).ready(function() {
		var favorite = [];
		var total=parseInt(0);
        $allCheckboxes.on("click", function() {
            favorite=[];
            total=parseInt(0);
            $.each($("input[type=checkbox]:checked"), function(){ 
            	total=parseInt(0);
                favorite.push($(this).val());
                //console.log($(this).val());
                for(i=0;i<favorite.length;i++)
                {         
                	total+=parseInt(favorite[i]);
                }
                //if(favorite.length)
                // document.getElementById("total").innerHTML=total;
            });
            document.getElementById("total").innerHTML=total;            
        });
    });
</script>
@endsection

