@extends('layouts.cotizacion')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <h5>Crear Cotización:</h5>
      </div>
    </div>
    <div class="card-body">
      @if (session("alert"))
          <div class="alert alert-{{session("alert")['class']}} alert-dismissible fade show" role="alert">
             {{session('alert')['message']}}
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      @endif
      <form role="form" method="POST" id="formcotizacion" action="{{$edit ? route('cotizacion.update',['cotizacion'=>$cotizacion]) : route('cotizacion.store')}}">
        {{csrf_field()}}
        @if ($edit)
            {{method_field('PUT')}}
        @endif
        <div class="row">
        <div class="col-sm-3 form-group">
            <label class="control-label">Cliente destino:</label>
            <select required class="form-control"  name="cliente_id" onchange="searchDescuentos(this.value)">
              <option value="">Selecciona el cliente</option>
              @foreach ($clientes as $cliente)
                <option value="{{$cliente->id}}">{{($cliente->tipopersona == "Moral" ? $cliente->razonsocial : $cliente->nombre." ".$cliente->apellidopaterno." ".$cliente->apellidomaterno)}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-3 form-group">
            <label class="control-label">Número de cotización:</label>
            <input required readonly type="number" class="form-control" name="nocotizacion" id="nocotizacion" value="{{$nocotizaciones}}" placeholder="Ejemp: 0001">
          </div>
          <div class="col-sm-3 form-group">
            <label class="control-label">Fecha:</label>
            <input required type="date" readonly class="form-control" name="fechaactual" id="fechaactual" value="{{date('Y-m-d')}}">
          </div>
          <div class="col-sm-3 form-group">
            <label class="control-label">Fecha de entrega:</label>
            <input required type="date" class="form-control" name="fechaentrega" id="fechaentrega" min="{{date('Y-m-d')}}">
          </div>
        </div>
        <div class="row">
        <div class="col-sm-4 form-group">
            <label class="control-label">Órdenes de Cliente:</label>
            <select required class="form-control" id="cliente_id" >
              <option value="">Selecciona el cliente</option>
              @foreach ($clientes as $cliente)
                <option value="{{$cliente->id}}">{{($cliente->tipopersona == "Moral" ? $cliente->razonsocial : $cliente->nombre." ".$cliente->apellidopaterno." ".$cliente->apellidomaterno)}}</option>
              @endforeach
            </select>
          </div>
          <!-- <div class="col-4">
            <label for="totalordenes">Descuento al cliente:</label>
            <select required class="form-control" id="clienteDescuento">
              <option value="">Selecciona el descuento</option>
              <option value="0">Sin descuento</option>
            </select>
          </div> -->
          <div class="col-sm-4 form-group">
            <label class="control-label">Correo de cliente:</label>
            <input required type="text" class="form-control" name="correo" id="correo"  placeholder="Sin correo">
          </div>
        </div>
        <div class="row"><h5>Ordenes:</h5></div>
        <div class="row">
          <table class="table table-striped table-bordered">
            <tbody id="ordenesdelcliente">
              
            </tbody>
          </table>
        </div>
        <div class="row">
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="table-info">
                  <th scope="col" colspan="7">Orden en cotización</th>
                </tr>
                <tr class="table-info">
                  <th scope="col">Número</th>
                  <th scope="col">Orden</th>
                  <th scope="col">Fecha</th>
                  <th scope="col" colspan="2">Descripción</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Acción</th>
                </tr>
                <tr>
            </thead>
            <tbody id="myOrdenes"></tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-4 offset-2">
          <label for="totalordenes">Descuento de obras</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="number" step="0.01" class="form-control" value="0" id="desordenes">
              <div class="input-group-append">
                <span class="input-group-text">MXN</span>
              </div>
            </div>
          </div>
          <div class="col-4">
            <label for="totalordenes">Total de obras</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <label readonly type="number" step="0.01" class="form-control"  id="totalordenes"></label>
              <div class="input-group-append">
                <span class="input-group-text">MXN</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row"><h5>Mano de obra:</h5></div>
        <div class="row" id="smanodeobra">
          <div class="col-sm-3 form-group">
            <label class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombremanodeobra">
          </div>
          <div class="col-sm-3 form-group">
            <label class="control-label">Descripción:</label>
            <textarea type="text" class="form-control" id="desmanodeobra"></textarea>
          </div>
          <div class="col-sm-3 form-group">
            <label class="control-label">Puesto:</label>
            <input type="text" class="form-control" id="puestomanodeobra">
          </div>
          <div class="col-sm-3 form-group">
            <label class="control-label">Monto</label>
            <input type="number" step="0.01" step="0.01" class="form-control" id="montomanodeobra">
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-sm-3 form-group ">
            <button id="agregarmanodeobra" type="button" class="btn btn-primary">Agregar</button>
          </div>
        </div>
        <div class="row">
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="table-info">
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
        <div class="row">
          <div class="col-4 offset-2">
            <label for="totalordenes">Descuento Mano de obra</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="number" value="0" step="0.01" class="form-control"  id="descmano">
              <div class="input-group-append">
                <span class="input-group-text">MXN</span>
              </div>
            </div>
          </div>
          <div class="col-4">
            <label for="totalmanodeobra">Total mano de obra</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <label readonly type="number" step="0.01" class="form-control"  id="totalmanodeobra"></label>
              <div class="input-group-append">
                <span class="input-group-text">MXN</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row"><h5>Varios:</h5></div>
        <div class="row" id="svarios">
          <div class="offset-sm-3 col-sm-3 form-group">
            <label class="control-label">Descripción:</label>
            <input type="text" class="form-control" id="desvario">
          </div>
          <div class="col-sm-3 form-group">
            <label class="control-label">Monto:</label>
            <input type="number" step="0.01" class="form-control" id="montovario">
          </div>
          <div class="col-sm-3 form-group">
            <button id="agregarvario" type="button" class="mt-4 btn btn-primary">Agregar</button>
          </div>
        </div>
        <div class="row">
          <table class="table  table-striped table-bordered">
            <thead class="table-info">
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
        <div class="row">
          <div class="col-4 offset-2">
            <label for="totalordenes">Descuento Varios</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="number" value="0" step="0.01" class="form-control"  id="desvario">
              <div class="input-group-append">
                <span class="input-group-text">MXN</span>
              </div>
            </div>
          </div>
          <div class="col-4">
            <label for="totlavario">Total varios</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <label readonly type="number" step="0.01" class="form-control"  id="totalvarios"></label>
              <div class="input-group-append">
                <span class="input-group-text">MXN</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row"><h5>Envios:</h5></div>
        <div class="row">
          <div class="col-sm-3 form-group">
            <label class="control-label">Descripción:</label>
            <input type="text" class="form-control" id="desenvio">
          </div>
          <div class="col-sm-3 form-group">
            <label class="control-label">Monto:</label>
            <input type="number" step="0.01" class="form-control" id="montoenvio">
          </div>
          <div class="col-sm-3 form-group">
            <label class="control-label">Dirección:</label>
            <textarea class="form-control" id="direccionenvio" rows="3"></textarea>
          </div>
          <div class="col-sm-3 form-group">
            <button id="agregarenvio" type="button" class="mt-4 btn btn-primary">Agregar</button>
          </div>
        </div>
        <div class="row">
          <table class="table table-striped table-bordered">
            <thead class="table-info">
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
        <div class="row">
          <div class="col-4 offset-4">
            <label for="totalenvio">Total Envios</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <label readonly type="number" step="0.01" class="form-control"  id="totalenvios"></label>
              <div class="input-group-append">
                <span class="input-group-text">MXN</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row"><h5>Total:</h5></div>
        <div class="row">
          <div class="col-sm-3 form-group">
          <label class="control-label">Total mano(s) de obra(s):</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input readonly type="number" step="0.01" class="form-control" name="totalmanodeobra"  id="inputtotalmanodeobra">
              <div class="input-group-append">
                <span class="input-group-text">MXN</span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 form-group">
            <label class="control-label">Total orden(es):</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input readonly type="number" step="0.01" class="form-control" name="totalordenes"  id="inputtotalordenes">
              <div class="input-group-append">
                <span class="input-group-text">MXN</span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 form-group">
            <label class="control-label">Total varios:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input readonly type="number" step="0.01" class="form-control" name="totalvarios"  id="inputtotalvarios">
              <div class="input-group-append">
                <span class="input-group-text">MXN</span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 form-group">
            <label class="control-label">Total envio(s):</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input readonly type="number" step="0.01" class="form-control" name="totalenvios"  id="inputtotalenvios">
              <div class="input-group-append">
                <span class="input-group-text">MXN</span>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="form-group col col-md-6">
            <label for="ganacia">Porcentaje de ganancia</label>
            <input required form="formcotizacion" name="ganancia" type="number" step="0.01" class="form-control" id="ganacia">
          </div>
          <div class="form-group col col-md-6">
            <label for="incremento">Incremento</label>
            <input required form="formcotizacion" name="incremento" type="number" step="0.01" class="form-control" id="incremento">
          </div>
        </div> -->
        <div class="row">
          <div class="form-group col col-md-4 offset-4">
            <label for="totalproyecto">Costo Proyecto</label>
            <input required readonly form="formcotizacion" name="totalproyecto" type="number" step="0.01" class="form-control" id="totalproyecto">
          </div>
        </div>
        <div class="row">
          <div class="form-group col col-md-4">
            <label for="resultado">Subtotal:</label>
            <input required readonly form="formcotizacion" type="number" step="0.01" name="resultado" class="form-control" id="resultado">
          </div>
          <div class="form-group col pt-4 col-md-4">
            <div class="form-check">
              <input required form="formcotizacion" class="form-check-input" type="radio" name="iva" id="coniva" value="16">
              <label class="form-check-label" for="coniva">
                con IVA
              </label>
            </div>
            <div class="form-check">
              <input required form="formcotizacion" class="form-check-input" type="radio" name="iva" id="siniva" value="1">
              <label class="form-check-label" for="siniva">
                sin IVA
              </label>
            </div>
          </div>
          <div class="form-group col col-md-4">
            <label for="totalneto">Total Neto:</label>
            <input required readonly form="formcotizacion" type="number" step="0.01" name="totalneto" class="form-control" id="totalneto">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 text-center form-group">
            <button id="submit" type="submit" onclick="checar()"class="btn btn-success"><strong>Guardar</strong></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
function checar(){
  if ($('#tablamanodeobras').children().length == 0){
    swal({
        type: 'error',
        title: 'Ups...',
        text: 'Ingresa por lo menos una mano de obra!'
      });
    return false;
}
  if($('#myOrdenes').children().length == 0){
    swal({
        type: 'error',
        title: 'Ups...',
        text: 'Ingresa por lo menos una orden!'
      });
    return false;
  }
  return false;
}
$('#cliente_id').change(function(){
  $('#ordenesdelcliente').empty();
  var cliente = $(this).val();
      $.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		  });
		  $.ajax({
        url: "{{ url('/buscarordenporcliente') }}",
        data: {
          cliente_id: cliente
        },
		    type: "GET",
		    dataType: "html",
		  }).done(function(resultado){
        $("#ordenesdelcliente").html(resultado);
		  });

});
  /*function searchDescuentos(usuario_id) {
    // body...
    $("#clienteDescuento").empty();
    
    $.ajax({
      url:'../getDescuentos/'+usuario_id,
      type:'GET',
      success: function(res){
        console.log(res.correo);
        $('#correo').val(res.correo);
        $("#clienteDescuento").append('<option value="0">Sin descuento</option>');
        for (var i = res.descuentos.length - 1; i >= 0; i--) {
          optiondesc= `<option value="${res.descuentos[i].descuento}">${res.descuentos[i].nombre}</option>`;
          $("#clienteDescuento").append(optiondesc);
        }

      },

    })
  }*/

  var totalcotizacion=0.00;
  function addOrden(orden){
      console.log(orden);
      var rowHTML = 
      `<tr id="row${orden.id}">
          <td scope="row">
              ${orden.noorden}
          </td>
          <td>${orden.nombre}</td>
          <td>${orden.fecha}</td>
          <td colspan="2">${orden.descripcion}</td>
          <td>$${orden.precio_orden}</td>
          <td>
            <input type="hidden" name="ordenes[]" value="${orden.id}">
              <div class="row mt-1 mb-1 justify-content-md-center">
                  <a href="#" onclick="removeOrden('row${orden.id}',${orden.precio_orden})" class="btn btn-danger remove_button">
                      Eliminar
                  </a>
              </div>
          </td>
          
      </tr>`;
      $("#myOrdenes").append(rowHTML);
      totalcotizacion = +totalcotizacion+ +parseFloat(orden.precio_orden);
      console.log(totalcotizacion.toFixed(2));
      $("#totalordenes").text(totalcotizacion.toFixed(2));
      $("#inputtotalordenes").val(totalcotizacion.toFixed(2));
      calcular();
  }
  function removeOrden(id, precio) {
      totalcotizacion = +totalcotizacion+-precio;
      $("#totalordenes").text(totalcotizacion.toFixed(2));
      $("#inputtotalordenes").val(totalcotizacion.toFixed(2));
      $(`#${id}`).remove();
      calcular();
      // body...
  }
  var contador = 0;
  var totalmo=0.00;
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
    var ht =  '<tr id="algo'+ contador+'"><td> <input type="hidden" form="formcotizacion" name="manodeobrasn[]" value="'+ $('#nombremanodeobra').val()+'"> '+ $('#nombremanodeobra').val()+'</td>'+
           ' <td><input type="hidden" form="formcotizacion" name="manodeobrasp[]" value="'+ $('#puestomanodeobra').val()+'" >'+ $('#puestomanodeobra').val()+'</td>'+
            '<td class="montomanodeobra"> <input type="hidden" form="formcotizacion" name="manodeobrasm[]" value="'+ $('#montomanodeobra').val()+'">$'+ $('#montomanodeobra').val()+'MXN</td>'+
            '<td><input type="hidden" form="formcotizacion" name="manodeobrasd[]" value="'+ $('#desmanodeobra').val()+'"> '+ $('#desmanodeobra').val()+'</td>'+
            '<td><button class="btn btn-danger" type="button" onclick="removeManoO('+"'algo"+contador+"'"+','+$("#montomanodeobra").val()+')">Eliminar</button></td></tr>';
    console.log(parseFloat($('#montomanodeobra').val()));
    totalmo = +totalmo+ +parseFloat($('#montomanodeobra').val());
    console.log(totalmo);
    $("#totalmanodeobra").text(totalmo.toFixed(2));
    $("#inputtotalmanodeobra").val(totalmo.toFixed(2));
    $('#tablamanodeobras').append(ht);
    calcular();
  });

  function removeManoO(id,precio) {
      totalmo = +totalmo+ -precio;
      $("#totalmanodeobra").text(totalmo.toFixed(2));
      $("#inputtotalmanodeobra").val(totalmo.toFixed(2));
      console.log(id);
      $(`#${id}`).remove();
      calcular()
  }

  var totalva = 0.00;
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
    var ht =  '<tr id="algo'+ contador+'"><td class="montovario"><input type="hidden" form="formcotizacion" name="variosm[]" value="'+ $('#montovario').val()+'" > '+ $('#montovario').val()+'</td>'+
           ' <td> <input type="hidden" form="formcotizacion" name="variosd[]" value="'+ $('#desvario').val()+'" > '+ $('#desvario').val()+'</td>'+
            '<td><button class="btn btn-danger" onclick="removeVario('+"'algo"+contador+"'"+','+$("#montovario").val()+')">Eliminar</button></td></tr>';
    totalva = +totalva+ +parseFloat($('#montovario').val());
    console.log(totalva);
    $("#totalvarios").text(totalva.toFixed(2));
    $("#inputtotalvarios").val(totalva.toFixed(2));
    $('#tablavarios').append(ht);
    calcular();
  });

  function removeVario(id,precio) {
      totalva = +totalva+ -precio;
      $("#totalvarios").text(totalva.toFixed(2));
      $("#inputtotalvarios").val(totalva.toFixed(2));
      console.log(id);
      $(`#${id}`).remove();
      calcular();
  }

  var totalenvio = 0.00;
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
    var ht =  '<tr id="algo'+ contador+'"><td> <input type="hidden" form="formcotizacion" name="enviosdi[]" value="'+ $('#direccionenvio').val()+'" > '+ $('#direccionenvio').val()+'</td>'+
           ' <td> <input type="hidden" form="formcotizacion" name="enviosd[]" value="'+ $('#desenvio').val()+'" >'+ $('#desenvio').val()+'</td>'+
           ' <td class="montoenvio"> <input type="hidden" form="formcotizacion" name="enviosm[]" value="'+ $('#montoenvio').val()+'"  > '+ $('#montoenvio').val()+'</td>'+
            '<td><button class="btn btn-danger" onclick="removeEnvio('+"'algo"+contador+"'"+','+$("#montoenvio").val()+')">Eliminar</button></td></tr>';
    totalenvio = +totalenvio+ +parseFloat($('#montoenvio').val());
    console.log(totalenvio);
    $("#totalenvios").text(totalenvio.toFixed(2));
    $("#inputtotalenvios").val(totalenvio.toFixed(2));
    $('#tablaenvios').append(ht);
    calcular();
  });

  function removeEnvio(id,precio) {
      totalenvio = +totalenvio+ -precio;
      $("#totalenvios").text(totalenvio.toFixed(2));
      $("#inputtotalenvios").val(totalenvio.toFixed(2));
      console.log(id);
      $(`#${id}`).remove();
      calcular();
  }

  $('.form-check-input').change(function(){
    calcular();
  });

  function agregaratabla(cosa){
    var row = $('#'+cosa);
    var ht =  '<tr id="esoeso'+cosa+'"><td>'+ row.find('.nombre').text()+'</td>'+
           '<input type="hidden" form="formcotizacion" name="ordenids[]" value="'+ row.find('.idere').val().replace('orden', '')+'"> <td>'+ row.find('.fecha').text()+'</td>'+
            '<td>'+ row.find('.noorden').text()+'</td>'+
            '<td>'+ row.find('.descripcion').text()+'</td>'+
            '<td>'+ row.find('.nopiezas').text()+'</td>'+
            '<td><button class="btn btn-danger" onclick="quitar1('+cosa+')">Eliminar</button></td></td>'
            '</tr>';
    $('#tablaordenes').append(ht);
    calcular();
  }

  function quitar(e){
    $('#algo'+e).remove();
    calcular();
  }
  function quitar1(e){
    $('#esoeso'+e.id).remove();
    calcular();
  }

  $('#ganacia').change(function(){
    $('#incremento').val('0');
    calcular();
  });

  $('#incremento').change(function(){
    $('#ganacia').val('0');
    calcular();
  });
  var subtotal = 0.00;
  $("#inputtotalordenes").change(function(e){
    $
  });

  function calcular(){
    // var totalmanodeobra = 0;
    // var  totalvarios = 0;
    // var totalenvio = 0;
    // $('.montomanodeobra').each(function(){
    //   totalmanodeobra += parseFloat($(this).text(), 10);
    // });
    // $('#totalmanodeobra').val(totalmanodeobra);

    // $('.montovario').each(function(){
    //   totalvarios += parseFloat($(this).text(), 10);
    // });
    // $('#totalvario').val(totalvarios);

    // $('.montoenvio').each(function(){
    //   totalenvio += parseFloat($(this).text(), 10);
    // });
    // $('#totalenvio').val(totalenvio);
    costo =totalcotizacion + totalmo + totalva + totalenvio;
    $('#totalproyecto').val(costo.toFixed(2));

    var descobra = $('#desordenes').val();
    var descvario = $('#desvario').val(); 
    var descmano = $('#descmano');.val()
    var resul = parseFloat( $('#totalproyecto').val(), 10) - descobra - descvario - descmano;//  + parseFloat($('#incremento').val(), 10) ;
    // if($('#incremento').val() == 0){
    //   resul = $('#totalproyecto').val() * (1 + ($('#ganacia').val() / 100));
    // }

    $('#resultado').val(resul.toFixed(2));
    if($('input[name=iva]:checked').val()){
      if( $('input[name=iva]:checked').val() == 1){
        totaliva = resul;
      }
      else{
        totaliva = resul * (1 + $('input[name=iva]:checked').val())/100;
        
      }
      $('#totalneto').val(totaliva.toFixed(2));
    }

  }
</script>


@endsection