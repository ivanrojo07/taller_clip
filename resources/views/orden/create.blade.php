@extends('layouts.cotizacion')
	@section('content')
    <div class="container my-3"> 
        <div class="row">
            <h4>Generar orden</h4>
        </div>
        <div class="row">
            <div class="col-6 offset-3">
                <form role="form" 
                        method="POST" 
                        action="{{ route('orden.store') }}">
                        {{ csrf_field() }}
            
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" required placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" name="fecha" class="form-control" id="fecha" readonly value="{{date('Y-m-d')}}">
                    </div>
                    <div class="form-group">
                        <label for="noorden">#Orden:</label>
                        <input type="number" value="{{++$preclave}}" readonly name="noorden" class="form-control" id="noorden" required placeholder="No. de orden">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" required  rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="noobras">#Obras:</label>
                        <input type="number" name="noobras" class="form-control" id="noobras" required placeholder="No. de obras">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                

                </form>
            </div>
        </div>

    </div>
    
    @endsection