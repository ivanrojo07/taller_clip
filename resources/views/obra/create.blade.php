@extends('layouts.cotizacion')
	@section('content')

    @for($i = 0; $i < $nopiezas; $i++)
    
    *********************************************************************************************************************************<br>
    <form role="form" 
		      method="POST" 
		      action="{{ route('orden.store') }}">
			{{ csrf_field() }}
        Nombre Obra: <input type="text" name="nombre" id="nombre"><br>
        #Piezas: <input type="number" name="nopiezas" id="nopiezas"><br>
        Alto: <input type="number" name="alto" id="alto"><br>
        Ancho: <input type="number" name="ancho" id="ancho"><br>
        Profundidad: <input type="number" name="profundidad" id="profundidad"><br>
        Descripción: <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea><br><br>
        <h4>Buscar Material</h4>
        <select name="seccion" id="seccion">
            <option value="montajes">Montajes</option>
            <option value="proteccion">Protección</option>
            <option value="marcos">Marcos</option>
            <option value="maria">Maria Luisa</option>
            <option value="generales">Generales</option>
        </select>
        <br>
        <table class="table">
            <tr>
                <th>Descripción</th>
                <th>Alto</th>
                <th>Ancho</th>
                <th>Profundidad</th>
                <th>Color</th>
                <th>Tipo</th>
                <th>Operación</th>
            </tr>
            @foreach($materiales as $material)
            <tr>
                <td>{{$material->descripcion->descripcion}}</td>
                <td>{{$material->alto}}</td>
                <td>{{$material->ancho}}</td>
                <td>{{$material->espesor}}</td>
                <td>{{$material->color}}</td>
                <td>{{$material->tipo}}</td>
                <td><input type="text" name="cantidad" id="cantidad" placeholder="Cantidad"><button>Agregar</button><button>Ver</button></td>
            </tr>
            @endforeach
        </table>
        <h4>tabla de obra</h4>
        <table class="table">
            <tr>
                <th>Descripción</th>
                <th>Alto</th>
                <th>Ancho</th>
                <th>Profundidad</th>
                <th>Color</th>
            </tr>
        </table>
        <center><input type="submit" value="Agregar"></center>
        </form>
        *********************************************************************************************************************************<br>
    @endfor

    {{$orden_id}}
    {{$nopiezas}}

    @endsection