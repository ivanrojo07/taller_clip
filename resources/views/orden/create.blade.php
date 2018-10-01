@extends('layouts.cotizacion')
	@section('content')
    <div class="row">
        <div class="col-6">










    <form role="form" 
		      method="POST" 
		      action="{{ route('orden.store') }}">
			{{ csrf_field() }}

        Nombre:<input type="text" name="nombre" id="nombre"><br>
        Fecha: <input type="date" name="fecha" id="fecha" readonly value="{{date('Y-m-d')}}"><br>
        #Órden: <input type="number" name="noorden" id="noorden"><br>
        Descripcion <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea><br>
        #Obras: <input type="number" name="noobras" id="noobras"><br>
        <input type="submit" value="Guardar">
    

    </form>







        </div>
        <div class="col-6">
        








        </div>
    </div>

    @endsection