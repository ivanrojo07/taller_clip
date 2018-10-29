@extends('layouts.cotizacion')
@section('content')


<div class="container-fluid ">
<h1>Crear Cotización</h1>
<form id="formcotizacion" role="form" method="POST" action="{{ route('cotizacion.store') }}">
{{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col col-md-6">
      <label for="cliente">Cliente</label>
      <input form="formcotizacion" required type="text" class="form-control" id="cliente" placeholder="Cliente">
    </div>
    <div class="form-group col  col-md-6">
      <label for="nocotizacion">#Cotizacion</label>
      <input form="formcotizacion" required type="number" class="form-control" id="nocotizacion" placeholder="Ejemp: 0001">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col col-md-6">
    <label for="fechaactual">Fecha Actual</label>
    <input form="formcotizacion" required type="date" readonly class="form-control" id="fechaactual" value="{{date('Y-m-d')}}">
  </div>
  <div class="form-group col col-md-6">
    <label for="fechaentrega">Fecha de Entrega</label>
    <input form="formcotizacion" required type="date" class="form-control" id="fechaentrega" placeholder="Apartment, studio, or floor">
  </div>
  </div>
</form>

<div class="row">

<div class="col-12">
<h3>Ordenes a agregar:</h3>
<table class="table">
  <thead>
    <tr>
      <th>Nombre</th><th>Fecha</th><th># de órden</th><th>descripción</th><th>No. de piezas</th><th>Agregar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($ordenes as $orden)
        <tr id="row{{$orden->id}}">
          <td class="nombre"> {{$orden->nombre}}</td><td class="fecha"> {{$orden->fecha}}</td><td class="noorden"> {{$orden->noorden}}</td><td class="descripcion"> {{$orden->descripcion}}</td><td class="nopiezas"> {{$orden->nopiezas}}</td>
          <td><button class="btn btn-success" onclick="agregaratabla('row{{$orden->id}}')">Agregar</button></td>
        </tr>
    @endforeach
  </tbody>
  

</table>
</div>
<h1></h1>
<div class="col-12">
<h3>Ordenes de la cotización:</h3>
<table class="table">
  <thead>
    <tr>
      <th>Nombre</th><th>Fecha</th><th># de órden</th><th>descripción</th><th>No. de piezas</th><th>Eliminar</th>
    </tr>
  </thead>
  <tbody id="tablaordenes">
  
  </tbody>
  

</table>
</div>
</div>

</div>

<hr>
<!--MANO DE OBRA-->
<div class="form-row" id="smanodeobra">
  <div class="col-8 offset-2">
  <h3>Mano de Obra</h3>
  <div class="form-row">
    <div class="form-group col col-md-4">
      <label for="desmanodeobra">Descripción</label>
      <input type="text" class="form-control" name="descripcion" id="desmanodeobra" ><br>
      <label for="puestomanodeobra">Puesto</label>
      <input type="text" class="form-control" name="puesto" id="puestomanodeobra" >
    </div>
    <div class="form-group col col-md-4">
      <label for="nombremanodeobra">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="nombremanodeobra" ><br>
      <label for="montomanodeobra">Monto</label>
      <input type="number" class="form-control" name="monto" id="montomanodeobra">
    </div>
    <div class="form-group pt-5 col col-md-4">
      <button id="agregarmanodeobra" type="button" class="mt-4 btn btn-primary btn-lg btn-block">Agregar</button>
      </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Puesto</th>
        <th scope="col">Monto</th>
        <th scope="col">Descripción</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody id="tablamanodeobras">
    </tbody>
  </table>
  </div>
</div>

<hr>

<!--VARIOS-->
<div class="form-row" id="svarios">
  <div class="col-8 offset-2">
    <h3>Varios</h3>
    <div class="form-row">
      <div class="form-group col col-md-4">
        <label for="desvario">Descripción</label>
        <input type="text" name="descripcion" class="form-control" id="desvario">
      </div>
      <div class="form-group col col-md-4">
        <label for="montovario">Monto</label>
        <input type="number" name="monto" class="form-control" id="montovario">
      </div>
      <div class="form-group col col-md-4">
        <button id="agregarvario" type="button" class="mt-4 btn btn-primary btn-lg btn-block">Agregar</button>
      </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Monto</th>
          <th scope="col">Descripción</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody id="tablavarios">
      </tbody>
    </table>
  </div>
</div>


<hr>

<!--ENVIOS-->
<div class="form-row" id="senvios">
  <div class="col-8 offset-2">
  <h3>Envios</h3>
  <div class="form-row">
    <div class="form-group col col-md-4">
      <label for="desenvio">Descripción</label>
      <input type="text" name="descripcion" class="form-control" id="desenvio">
    </div>
    <div class="form-group col col-md-4">
      <label for="montoenvio">Monto</label>
      <input type="number" name="monto" class="form-control" id="montoenvio">
    </div>
    <div class="form-group col col-md-4">
      <label for="direccionenvio">Dirección</label>
      <textarea class="form-control" name="direccion" id="direccionenvio" rows="3"></textarea>
    </div>
    <div class="form-group col col-md-4 offset-4">
      <button id="agregarenvio" type="button" class="mt-4 btn btn-primary btn-lg btn-block">Agregar</button>
      </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Dirección</th>
        <th scope="col">Descripción</th>
        <th scope="col">Monto</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody id="tablaenvios">
    </tbody>
  </table>
  </div>
</div>

<hr>

<!--TOTALES-->
<div class="form-row">
    <div class="form-group col col-md-4 offset-4">
      <label for="totalproyecto">Total Proyecto</label>
      <input  form="formcotizacion" name="totalproyecto" type="number" class="form-control" id="totalproyecto">
    </div>
</div>
<div class="form-row p-5">
    <div class="form-group col col-md-6">
      <label for="ganacia">%ganancia</label>
      <input required form="formcotizacion" name="ganancia" type="number" class="form-control" id="ganacia">
    </div>
    <div class="form-group col col-md-6">
    <label for="incremento">Incremento</label>
    <input required form="formcotizacion" name="incremento" type="number" class="form-control" id="incremento">
    </div>
  </div>
  <div class="form-row p-5">
    <div class="form-group col col-md-4">
      <label for="resultado">Resultado</label>
      <input required form="formcotizacion" type="number" name="resultado" class="form-control" id="resultado">
    </div>
    <div class="form-group col pt-4 col-md-4">
      <div class="form-check">
        <input required form="formcotizacion" class="form-check-input" type="radio" name="iva" id="coniva" value="1">
        <label class="form-check-label" for="coniva">
          con IVA
        </label>
      </div>
      <div class="form-check">
        <input required form="formcotizacion" class="form-check-input" type="radio" name="iva" id="siniva" value="0">
        <label class="form-check-label" for="siniva">
          sin IVA
        </label>
      </div>
    </div>
    <div class="form-group col col-md-4">
      <label for="totalneto">Total Neto</label>
      <input required form="formcotizacion" type="number" name="totalneto" class="form-control" id="totalneto">
    </div>
  </div>

  <div class="form-row mb-5 pb-5">
    <div class="form-group col col-md-4 offset-4">
      <button id="guardarcotizacion" type="submit" form="formcotizacion" class="btn btn-primary">Guardar</button>
      <button id="generarPDF" type="button" class="btn btn-success">PDF</button>
    </div>
</div>

</div>


<script>
var contador = 0;
$('#agregarmanodeobra').click(function(){
  contador++
  if(!$('#nombremanodeobra').val() || !$('#puestomanodeobra').val() || !$('#montomanodeobra').val() || !$('#desmanodeobra').val()){
    swal({
                    type: 'error',
                    title: 'Ups...',
                    text: 'Ingresa todos los datos!'
                    });
                    return 0;
  }
            var ht =  '<tr id="algo'+ contador+'"><td>'+ $('#nombremanodeobra').val()+'</td>'+
                   ' <td>'+ $('#puestomanodeobra').val()+'</td>'+
                    '<td>'+ $('#montomanodeobra').val()+'</td>'+
                    '<td>'+ $('#desmanodeobra').val()+'</td>'+
                    '<td><button class="btn btn-danger" onclick="quitar('+contador+')">Eliminar</button></td></tr>';
            $('#tablamanodeobras').append(ht);
});

$('#agregarvario').click(function(){
  contador++
  if(!$('#desvario').val() ||  !$('#montovario').val() ){
    swal({
                    type: 'error',
                    title: 'Ups...',
                    text: 'Ingresa todos los datos!'
                    });
                    return 0;
  }
            var ht =  '<tr id="algo'+ contador+'"><td>'+ $('#montovario').val()+'</td>'+
                   ' <td>'+ $('#desvario').val()+'</td>'+
                    '<td><button class="btn btn-danger" onclick="quitar('+contador+')">Eliminar</button></td></tr>';
            $('#tablavarios').append(ht);
});

$('#agregarenvio').click(function(){
  contador++
  if(!$('#desenvio').val() ||  !$('#montoenvio').val() ||  !$('#direccionenvio').val() ){
    swal({
                    type: 'error',
                    title: 'Ups...',
                    text: 'Ingresa todos los datos!'
                    });
                    return 0;
  }
            var ht =  '<tr id="algo'+ contador+'"><td>'+ $('#direccionenvio').val()+'</td>'+
                   ' <td>'+ $('#desenvio').val()+'</td>'+
                   ' <td>'+ $('#montoenvio').val()+'</td>'+
                    '<td><button class="btn btn-danger" onclick="quitar('+contador+')">Eliminar</button></td></tr>';
            $('#tablaenvios').append(ht);
});

function agregaratabla(cosa){
            var row = $('#'+cosa);
            var ht =  '<tr id="esoeso'+cosa+'"><td>'+ row.find('.nombre').text()+'</td>'+
                   ' <td>'+ row.find('.fecha').text()+'</td>'+
                    '<td>'+ row.find('.noorden').text()+'</td>'+
                    '<td>'+ row.find('.descripcion').text()+'</td>'+
                    '<td>'+ row.find('.nopiezas').text()+'</td>'+
                    '<td><button class="btn btn-danger" onclick="quitar1('+cosa+')">Eliminar</button></td></td>'
                    '</tr>';
            $('#tablaordenes').append(ht);

}

function quitar(e){
$('#algo'+e).remove();
}
function quitar1(e){
$('#esoeso'+e.id).remove();
}

$('#ganacia').change(function(){
  alert('gana c')
  $('#incremento').val('0');
});

$('#incremento').change(function(){
  alert('gana incre');
  $('#ganacia').val('0');
});

</script>
@endsection
