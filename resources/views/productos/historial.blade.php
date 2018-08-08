@extends('layouts.cotizacion')
@section('content')
<h4>Historial de órdenes</h4>
<br>
<br>
<br>
<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr class="bg-primary">
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Operación</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                    <th scope="row">1</th>
                    <td>0</td>
                    <td>1</td>
                    <td>2</td>
                    <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Ver</button>
                    <button type="button" class="btn btn-success">Editar</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>
                    </td>           
                </tr>
                <tr>
                
            </tbody>
        </table>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    </div>
</div>




@endsection