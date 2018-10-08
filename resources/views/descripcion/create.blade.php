@extends('layouts.cotizacion')
	@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<h4 class="m-3">Registrar Descripción</h4>

    <div class="container my-3">
        <form role="form" 
            method="POST" 
            action="{{ route('descripcion.store') }}">
        {{ csrf_field() }}



        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Descripción</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="descripcion" placeholder="Descripción">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Sección</label>
            <div class="col-sm-10">
                <select name="seccion" class="custom-select" id="seccion">
                    <option value="maria">Maria Luisa</option>
                    <option value="montaje">Montaje</option>
                    <option value="marco">Marco</option>
                    <option value="proteccion">Protección</option>
                    <option value="proteccion">Generales</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4 offset-4">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Guardar">
            </div>
        </div>
        </form>

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