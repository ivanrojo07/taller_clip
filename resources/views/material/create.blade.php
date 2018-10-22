@extends('layouts.cotizacion')
	@section('content')
    <div class="container my-3">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <h4>Registrar Material</h4>
  <div class="container my-3">
  <form role="form" 
              method="POST" 
              action="{{ route('material.store') }}">
              {{ csrf_field() }}

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <label class="input-group-text" for="seccion">Sección</label>
              </div>
              <select required class="custom-select" name="seccion" id="seccion">
                  <option value="">---</option>
                  <option value="maria">Maria Luisa</option>
                  <option value="montaje">Montaje</option>
                  <option value="marco">Marco</option>
                  <option value="proteccion">Protección</option>
                  <option value="proteccion">Generales</option>
              </select>
              </div>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <label class="input-group-text" for="descripcion">Descripción</label>
              </div>
              <select required class="custom-select" name="descripcion" id="descripcion">
                  {{--@foreach($descripciones as $descripcion)
                      <option value="{{$descripcion->id}}">{{$descripcion->descripcion}}</option>
                  @endforeach--}}
              </select>
              </div>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Clave</span>
              </div>
              <input required type="text" name="clave" id="clave" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Ancho</span>
              </div>
              <input required type="number" name="ancho" id="ancho" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Alto</span>
              </div>
              <input required type="number" name="alto" id="alto" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Espesor</span>
              </div>
              <input required type="number" name="espesor" id="espesor" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <label class="input-group-text" for="medidas">Medidas:</label>
              </div>
              <select required class="custom-select" name="medidas" id="medidas">
                  <option value="mm">mm</option>
                  <option value="cm">cm</option>
                  <option value="m">m</option>
              </select>
              </div>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Color</span>
              </div>
              <input required type="text" name="color" id="color" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Proveedor</span>
              </div>
              <input required type="text" name="proveedor" id="proveedor" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>

              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Precio $</span>
              </div>
              <input required type="text" name="precio" id="precio" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>

              <div class="row mb-4">
                  <div class="col-4 offset-4">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Agregar">
                  </div>
              </div>
      </form>
  </div>
  
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
    $('#seccion').change(function(){
        var eso = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('descripcion.index') }}",
            type: "GET",
            data: {
                seccion: eso
            },
            dataType: "json",
        }).done(function(resultado){
            $('#descripcion').empty();
            {{--//$('#descripcion').append('<option value="{{$descripcion->id}}">{{$descripcion->descripcion}}</option>');--}}
            var b = JSON.stringify(resultado);
            for(var i = 0; i < resultado.length; i++){
                $('#descripcion').append('<option value="'+resultado[i].id+'">'+resultado[i].descripcion+'</option>');
            }
           //alert(b);
        });
    });
});
</script>
    </div>
    
    @endsection