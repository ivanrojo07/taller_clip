@extends('layouts.blank')
 @section('content')
 <div role="application" class="panel panel-group container-fluid">
 	<div class="panel-default">
 		<div class="panel-heading" style="background-color: lightgray!important;" ><h3><i class="fa fa-clone"></i>
 		&nbsp;&nbsp;Montajes</h3></div>
 		<div class="panel-body" >
 			<div class="row">
 				<div class="col-sm-12">
 					<div class="col-sm-3">
					<span class="badge badge-secondary"><i class="fa fa-clipboard" aria-hidden="true"></i>&nbsp;&nbsp;DESCRIPCIÓN</span>
					<input type="radio" class="option-input radio" name="problema_visual" value="LEJOS" required>
				</div>
				<div class="col-sm-3">
					<span class="badge badge-secondary"><i class="fa fa-expand" aria-hidden="true"></i>&nbsp;&nbsp;MEDIDAS</span>
					<input type="radio" class="option-input radio" name="problema_visual" value="CERCA">
				</div>
				<div class="col-sm-3">
					<span class="badge badge-secondary"><i class="fa fa-cube" aria-hidden="true"></i>&nbsp;&nbsp;ESPESOR</span>
					<input type="radio" class="option-input radio" name="problema_visual" value="AMBAS">
				</div>
				<div class="col-sm-3">
					<span class="badge badge-secondary"><i class="fa fa-tint" aria-hidden="true"></i>&nbsp;&nbsp;COLOR</span>
					<input type="radio" class="option-input radio" name="problema_visual" value="AMBAS">
				</div>
	 				</div>
 			</div><br>
 			{{--  Descripción --}}
 		<div class="row jumbotron" id="descripcion_div" style="display: none;">
 				<div class="row">
 				 <div class="col-sm-4"><h4><i class="fa fa-clipboard" aria-hidden="true"></i>
 				&nbsp;&nbsp;Descripción:</h4>
 				 
					<input type="text" class="form-control" name="descripcion">
	  			 <br>
	  			 <div class="row">
	  			 	<div class="col-sm-4">
 						<button class="btn btn-success"><strong>Agregar</strong></button>
 					</div>
 					<div class="col-sm-4">
 						<button class="btn btn-primary"><strong>Actualizar</strong></button>
 					</div>
	  			 </div>
 			    </div>
 			    <div class="col-sm-7 container-fluid pull-right" style="border:solid; border-color: gray; border-radius: 3px; overflow: scroll;max-height: 350px;">
 					<h3>Lista de Descripciones</h3>
 				    <div class="list-group" id="descripcion_lista">
					    <a href="#" class="list-group-item list-group-item-action">First item</a>
					    <a href="#" class="list-group-item list-group-item-action">Second item</a>
					    <a href="#" class="list-group-item list-group-item-action">Third item</a>
					    <a href="#" class="list-group-item list-group-item-action">First item</a>
					    <a href="#" class="list-group-item list-group-item-action">Second item</a>
					    <a href="#" class="list-group-item list-group-item-action">Third item</a>
					    <a href="#" class="list-group-item list-group-item-action">First item</a>
					    <a href="#" class="list-group-item list-group-item-action">Second item</a>
					    <a href="#" class="list-group-item list-group-item-action">Third item</a>
					    <a href="#" class="list-group-item list-group-item-action">First item</a>
					    <a href="#" class="list-group-item list-group-item-action">Second item</a>
					    <a href="#" class="list-group-item list-group-item-action">Third item</a>
					    <a href="#" class="list-group-item list-group-item-action">First item</a>
					    <a href="#" class="list-group-item list-group-item-action">Second item</a>
					    <a href="#" class="list-group-item list-group-item-action">Third item</a>
					    <a href="#" class="list-group-item list-group-item-action">First item</a>
					    <a href="#" class="list-group-item list-group-item-action">Second item</a>
					    <a href="#" class="list-group-item list-group-item-action">Third item</a>
					  </div>
	 				</div>
 			</div><br>
 		</div>
 		{{-- Descripción --}}

 		{{-- Medidas --}}
 		<div class="row jumbotron" id="medidas_div" style="display: none;">
 				<div class="row">
 				 <div class="col-sm-4"><h4><i class="fa fa-expand" aria-hidden="true"></i>
 				&nbsp;&nbsp;Medidas:</h4>
 				 
					<input type="text" class="form-control" name="medidas">
	  			 <br>
	  			 <div class="row">
	  			 	<div class="col-sm-4">
 						<button class="btn btn-success"><strong>Agregar</strong></button>
 					</div>
 					<div class="col-sm-4">
 						<button class="btn btn-primary"><strong>Actualizar</strong></button>
 					</div>
	  			 </div>
 			    </div>
 			    <div class="col-sm-7 container-fluid pull-right" style="border:solid; border-color: gray; border-radius: 3px; overflow: scroll;max-height: 350px;">
 					<h3>Lista de Medidas</h3>
 				    <div class="list-group" id="medidas_lista">
					    <a href="#" class="list-group-item list-group-item-action">122 x 188</a>
					    <a href="#" class="list-group-item list-group-item-action">144 x 120</a>
					    <a href="#" class="list-group-item list-group-item-action">135 x 200</a>
					    <a href="#" class="list-group-item list-group-item-action">122 x 188</a>
					    <a href="#" class="list-group-item list-group-item-action">144 x 120</a>
					    <a href="#" class="list-group-item list-group-item-action">135 x 200</a>
					    <a href="#" class="list-group-item list-group-item-action">122 x 188</a>
					    <a href="#" class="list-group-item list-group-item-action">144 x 120</a>
					    <a href="#" class="list-group-item list-group-item-action">135 x 200</a>
					    <a href="#" class="list-group-item list-group-item-action">122 x 188</a>
					    <a href="#" class="list-group-item list-group-item-action">144 x 120</a>
					    <a href="#" class="list-group-item list-group-item-action">135 x 200</a>
					    <a href="#" class="list-group-item list-group-item-action">122 x 188</a>
					    <a href="#" class="list-group-item list-group-item-action">144 x 120</a>
					    <a href="#" class="list-group-item list-group-item-action">135 x 200</a>
					    <a href="#" class="list-group-item list-group-item-action">122 x 188</a>
					    <a href="#" class="list-group-item list-group-item-action">144 x 120</a>
					    <a href="#" class="list-group-item list-group-item-action">135 x 200</a>
					  </div>
	 				</div>
 			</div><br>
 		</div>
 		{{-- Medidas--}}

 		{{-- Espesor --}}
 		<div class="row jumbotron" id="espesor_div" style="display: none">
 				<div class="row">
 				 <div class="col-sm-4"><h4><i class="fa fa-cube" aria-hidden="true"></i>
 				&nbsp;&nbsp;Espesor:</h4>
 				 
					<input type="text" class="form-control" name="espesor">
	  			 <br>
	  			 <div class="row">
	  			 	<div class="col-sm-4">
 						<button class="btn btn-success"><strong>Agregar</strong></button>
 					</div>
 					<div class="col-sm-4">
 						<button class="btn btn-primary"><strong>Actualizar</strong></button>
 					</div>
	  			 </div>
 			    </div>
 			    <div class="col-sm-7 container-fluid pull-right" style="border:solid; border-color: gray; border-radius: 3px; overflow: scroll;max-height: 350px;">
 					<h3>Lista de Espesor</h3>
 				    <div class="list-group" id="espesor_lista">
					    <a href="#" class="list-group-item list-group-item-action">1 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">2.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">2.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">2.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">2.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">2.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">2.5 mm</a>
					  </div>
	 				</div>
 			</div><br>
 		</div>
 		{{-- Espesor --}}

 		{{-- Color --}}
 		<div class="row jumbotron" id="color_div">
 				<div class="row">
 				 <div class="col-sm-4"><h4><i class="fa fa-cube" aria-hidden="true"></i>
 				&nbsp;&nbsp;color:</h4>
 				 
					<input type="text" class="form-control" name="color">
	  			 <br>
	  			 <div class="row">
	  			 	<div class="col-sm-4">
 						<button class="btn btn-success"><strong>Agregar</strong></button>
 					</div>
 					<div class="col-sm-4">
 						<button class="btn btn-primary"><strong>Actualizar</strong></button>
 					</div>
	  			 </div>
 			    </div>
 			    <div class="col-sm-7 container-fluid pull-right" style="border:solid; border-color: gray; border-radius: 3px; overflow: scroll;max-height: 350px;">
 					<h3>Lista de color</h3>
 				    <div class="list-group" id="color_lista">
					    <a href="#" class="list-group-item list-group-item-action">1 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">2.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">2.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">2.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">2.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">2.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">1.5 mm</a>
					    <a href="#" class="list-group-item list-group-item-action">2.5 mm</a>
					  </div>
	 				</div>
 			</div><br>
 		</div>
 		{{-- Color --}}
 		</div>
 	</div>
 </div>

 @endsection
 