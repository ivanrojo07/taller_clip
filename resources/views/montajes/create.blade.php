@extends('layouts.blank')
 @section('content')
 <div class="container">
 	<div class="row">
 		<div class="col">
 			<div class="form-group">
  <label for="sel1">Select list:</label>
  <select class="form-control" id="sel1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>
 		</div>
 	</div>
 </div>




 {{-- Medidas --}}
 		
					<input type="text" class="form-control" name="medidas">
	  			
 		{{-- Medidas--}}

 		{{-- Espesor --}}
 		
					<input type="text" class="form-control" name="espesor">
	  		
 		{{-- Espesor --}}

 		{{-- Color --}}
 	
					<input type="text" class="form-control" name="color">
	  			
 		{{-- Color --}}
 @endsection