@extends('layouts.cotizacion')
	@section('content')
    <form role="form" 
		      method="POST" 
		      action="{{ route('material.store') }}">
			{{ csrf_field() }}
            Seccion:
            <select name="seccion" id="seccion">
                <option value="maria">Maria Luisa</option>
                <option value="montaje">Montaje</option>
                <option value="marco">Marco</option>
                <option value="proteccion">Protección</option>
                <option value="proteccion">Generales</option>
            </select>
            <br>
            Descripcion:
            <select name="descripcion" id="descripcion">
                @foreach($descripciones as $descripcion)
                    <option value="{{$descripcion->id}}">{{$descripcion->descripcion}}</option>
                @endforeach
            </select>
            <br>
            Clave:
            <input type="text" name="clave" id="clave">
            <br>
            Ancho:
            <input type="number" name="ancho" id="ancho">
            <br>
            Alto: 
            <input type="number" name="alto" id="alto">
            <br>
            Espesor:
            <input type="number" name="espesor" id="espesor">
            <br>
            Tipo de medidas:
            <input type="text" name="medidas" id="medidas">
            <br>
            Color:
            <input type="text" name="color" id="color">
            <br>
            Proveedor:
            <input type="text" name="proveedor" id="proveedor">
            <!-- <select name="s" id="proveedor">
            
            </select> -->
            <br>
            Precio:
            <input type="number" name="precio" id="precio">
            <br>
            <input type="submit" value="Agregar">
    </form>
<br>
    <input type="text" id="buscador">
            <table id="mitabla">
                <thead>
                    <tr>
                        <th>Sección</th>
                        <th>Descripción</th>
                        <th>Alto</th>
                        <th>Ancho</th>
                        <th>Espesor</th>
                        <th>Color</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materiales as $material)
                    <tr>
                        <td>{{$material->seccion}}</td>
                        <td>{{$material->descripcion->descripcion}}</td>
                        <td>{{$material->alto}}</td>
                        <td>{{$material->ancho}}</td>
                        <td>{{$material->espesor}}</td>
                        <td>{{$material->color}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    <script>
   $(document).ready(function(){
  $("#buscador").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mitabla tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
    @endsection