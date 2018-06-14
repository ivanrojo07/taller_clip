@extends('layouts.blank')
 @section('content')
<div class="container">
 <div role="application" class="panel panel-group container-fluid">
 	<div class="panel-default">
 		<div class="panel-heading" style="background-color: lightgray!important;" ><h3>
 			<i class="{{$class}}"></i>
 		&nbsp;&nbsp;{{$nombre}}</h3>
 	   </div>

 		<div class="panel-body" style="border:solid;">
 			<div class="row">
 				<div class="col"><iframe src="{{route($ruta_frame)}}" style="height: 800px;overflow-y: auto;"></iframe></div>
 			</div><br>
		</div>
		

		

 	</div>
 </div>
</div>
 @endsection
 