@extends('layouts.cotizacion')
	@section('content')

    <table class="table">
        <tr>
            <th>Nombre:</th><th>Fecha:</th><th>#Órden:</th><th>#Obras</th><th>Operación</th>
        </tr>
        @foreach($ordenes as $orden)
            <tr>
                <td>{{$orden->nombre}}</td>
                <td>{{$orden->fecha}}</td>
                <td>{{$orden->noorden}}</td>
                <td>{{$orden->nopiezas}}</td>
                <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$orden->id}}">
                    Ver
                </button>
                </td>
            </tr>
        @endforeach
    </table>
    


@foreach($ordenes as $orden)
<div class="modal fade" id="exampleModalCenter{{$orden->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">{{$orden->nombre}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
          @foreach($orden->obras as $obra)
          <li class="list-group-item">{{$obra->nombre}}</li>
          @endforeach
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
@endforeach
    @endsection