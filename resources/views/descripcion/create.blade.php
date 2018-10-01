@extends('layouts.cotizacion')
	@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


        <div class="container">
        <form role="form" 
		      method="POST" 
		      action="{{ route('descripcion.store') }}">
			{{ csrf_field() }}
            descripcion: <input type="text" name="descripcion">
            <br>
            seccion:
            <select name="seccion" id="seccion">
                <option value="maria">Maria Luisa</option>
                <option value="montaje">Montaje</option>
                <option value="marco">Marco</option>
                <option value="proteccion">Protección</option>
                <option value="proteccion">Generales</option>
            </select>
            <br>
            <input type="submit" value="Guardar">
            </form>

            <br>
            Buscador:
            <input type="text" id="buscador">
            <table id="mitabla">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Seccion</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($descripciones as $descripcion)
                <tr><td>{{$descripcion->descripcion}}</td><td>{{$descripcion->seccion}}</td></tr>
                @endforeach

                </tbody>
            </table>
    <script>
    $(document).ready(function(){

     $('#mitabla').DataTable({
        "info": false,
        "language": {
            "search": "Buscar:",
            "paginate": {
            "previous": "Anterior",
            "next": "Siguiente"
            }
        }
     });

//   $("#buscador").on("keyup", function() {
//     var value = $(this).val().toLowerCase();
//     $("#mitabla tr").filter(function() {
//       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//   });
    });
</script>
        </div>
    @endsection