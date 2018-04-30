@extends('layouts.blank')
 @section('content')
<div class="container">
 <div role="application" class="panel panel-group container-fluid">
 	<div class="panel-default">
 		<div class="panel-heading" style="background-color: lightgray!important;" ><h3>
 			<i class="fa fa-paperclip"></i>
 		&nbsp;&nbsp;Materiales Generales</h3></div>
 		<div class="panel-body" >
 			<div class="row">
 				<div class="col-sm-12">
 					<div class="col-sm-3">
					<span class="badge badge-secondary"><i class="fa fa-angle-up" aria-hidden="true"></i>&nbsp;&nbsp;COLGADERAS</span>
					<input type="radio" class="option-input radio" name="atributo" value="COLGADERAS" id="atributo_1">
				</div>
				<div class="col-sm-3">
					<span class="badge badge-secondary"><i class="fa fa-tape" aria-hidden="true"></i>&nbsp;&nbsp;ADHESIVOS</span>
					<input type="radio" class="option-input radio" name="atributo" value="ADHESIVOS"  id="atributo_2">
				</div>
			 </div>
 			</div><br>
 			{{--  COLGADERAS --}}
 		<div class="row jumbotron" id="descripcion_div" style="display: none;">
 				<div class="row">
 				 <div class="col-sm-4"><h4><i class="fa fa-angle-up" aria-hidden="true"></i>
 				&nbsp;&nbsp;<strong>Colgaderas:</strong></h4>

 				 <form role="form" id="form-cliente" method="POST" action="{{ route('des_generales.store') }}" name="form">
				{{ csrf_field() }}
					<input type="hidden" name="atributo" value="colgaderas">
					<input type="text" class="form-control" name="colgadera">
	  			 <br>
	  			 <div class="row">
	  			 	<div class="col-sm-4">
 						<button class="btn btn-primary"><strong>Agregar</strong></button>
 					</div>
 				</form>
 					<div class="col-sm-4">
 						<button class="btn btn-warning" disabled=""><strong>Actualizar</strong></button>
 					</div>
	  			 </div>
 			    </div>
 			    <div class="col-sm-7 container-fluid pull-right" style="border:solid; border-color: gray; border-radius: 3px; overflow: scroll;max-height: 350px;">
 					<div class="row">
 			    		<div class="col-sm-6"><h3>Lista de Colgaderas</h3></div>
 			    		
					</div>
 				    <div class="list-group" id="colgaderas_lista">
 				    	@foreach($colgaderas as $colgadera)
					    <a href="#" class="list-group-item list-group-item-action">{{$colgadera->colgadera}}</a>
					    @endforeach
					</div>
	 				</div>
 			</div><br>
 		</div>
 		{{-- COLGADERAS --}}

 		{{-- Adhesivos --}}
 		<div class="row jumbotron" id="medidas_div" style="display: none;">
 				<div class="row">
 				 <div class="col-sm-4"><h4><i class="fa fa-tape" aria-hidden="true"></i>
 				&nbsp;&nbsp;<strong>Adhesivos:</strong></h4>
 			 <form role="form" id="form-cliente" method="POST" action="{{ route('des_generales.store') }}" name="form">
				{{ csrf_field() }} 
				    <input type="hidden" name="atributo" value="adhesivos">
					<input type="text" class="form-control" name="adhesivo">
	  			 <br>
	  			 <div class="row">
	  			 	<div class="col-sm-4">
 						<button class="btn btn-primary"><strong>Agregar</strong></button>
 					</div>
 					</form>
 					<div class="col-sm-4">
 						<button class="btn btn-warning"><strong>Actualizar</strong></button>
 					</div>
	  			 </div>
 			    </div>
 			    <div class="col-sm-7 container-fluid pull-right" style="border:solid; border-color: gray; border-radius: 3px; overflow: scroll;max-height: 350px;">
 					<div class="row">
 			    		<div class="col-sm-6"><h3>Lista de Adhesivos</h3></div>
 			    		
					</div>
 				    <div class="list-group" id="adhesivos_lista">
					    @foreach($adhesivos as $adhesivo)
					    <a href="#" class="list-group-item list-group-item-action">{{$adhesivo->adhesivo}}</a>
					    @endforeach
					  </div>
	 				</div>
 			</div><br>
 		</div>
 		{{-- Adhesivos--}}
		</div>
 	</div>
 </div>
</div>
 @endsection
 