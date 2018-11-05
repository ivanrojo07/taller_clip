@extends('layouts.cotizacion')
@section('content')
	<div class="container-fluid">
	  <div class="card">
	    <div class="card-header">
	      <div class="row">
	        <h5>Cotización {{$cotizacion->nocotizacion}}:</h5>
	      </div>
	    </div>
	    <div class="card-body">
	      <form role="form" method="POST" id="formcotizacion" action="">
	        <div class="row">
	          <div class="col-sm-3 form-group">
	            <label class="control-label">Cliente:</label>
	            <label class="form-control">{{($cotizacion->cliente->tipopersona == "Fisica" ? $cotizacion->cliente->nombre." ".$cotizacion->cliente->apellidopaterno." ".$cotizacion->cliente->apellidomaterno : $cotizacion->cliente->razonsocial )}}</label>
	          </div>
	          <div class="col-sm-3 form-group">
	            <label class="control-label">Número de cotización:</label>
	           	<label class="form-control">{{$cotizacion->nocotizacion}}</label>
	          </div>
	          <div class="col-sm-3 form-group">
	            <label class="control-label">Fecha:</label>
	            <label class="form-control">{{$cotizacion->fechaactual}}</label>
	          </div>
	          <div class="col-sm-3 form-group">
	            <label class="control-label">Fecha de entrega:</label>
	            <label class="form-control">{{$cotizacion->fechaentrega}}</label>
	          </div>
	        </div>
	        <div class="row"><h5>Ordenes:</h5></div>
	        <div class="row">
	          <table class="table table-striped table-bordered">
	            <tbody>
	              @foreach ($cotizacion->ordens as $orden)
	                {{-- expr --}}
	                <tr class="table-info">
	                  <th scope="col" colspan="7">Orden</th>
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
	                  <td scope="row">{{$orden->noorden}}</td>
	                  <td>{{$orden->nombre}}</td>
	                  <td>{{$orden->fecha}}</td>
	                  <td colspan="2">{{$orden->descripcion}}</td>
	                  <td>${{$orden->precio_orden}}MXN</td>
	                  <td>
	                    <div class="row mt-1 mb-1 justify-content-md-center">
	                      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".collapse{{$orden->id}}" aria-expanded="false" aria-controls="collapseExample">
	                        Más detalles
	                      </button>
	                    </div>
	                  </td>
	                </tr>
	                @foreach ($orden->obras as $index=>$obra)
	                <tr class="table-success collapse collapse{{$orden->id}}">
	                  <th scope="col" colspan="7">Obra(s) de {{$orden->nombre}}</th>
	                </tr>
	                <tr class="table-success collapse collapse{{$orden->id}}">
	                  <th scope="col">Nombre</th>
	                  <th scope="col">Piezas</th>
	                  <th scope="col" colspan="2">Descripción</th>
	                  <th scope="col">Alto</th>
	                  <th scope="col">Ancho</th>
	                  <th scope="col">Profundidad</th>
	                </tr> 
	                <tr class="collapse collapse{{$orden->id}}">
	                  <td scope="row">
	                    {{$obra->nombre}}
	                  </td>
	                  <td>{{$obra->nopiezas}}</td>
	                  <td colspan="2">{{$obra->descripcion_obra}}</td>
	                  <td>{{$obra->alto_obra}} {{$obra->unidad_obra}}</td>
	                  <td>{{$obra->ancho_obra}} {{$obra->unidad_obra}}</td>
	                  <td>{{$obra->profundidad_obra}} {{$obra->unidad_obra}}</td>
	                </tr>
	                <tr class="table-secondary collapse collapse{{$orden->id}}">
	                  <th scope="col" colspan="7">Material(es) de {{$obra->nombre}}</th>
	                </tr>
	                <tr class="table-secondary collapse collapse{{$orden->id}}">
	                  <th scope="col">Clave</th>
	                  <th scope="col">Sección</th>
	                  <th scope="col">Color</th>
	                  <th scope="col">Alto</th>
	                  <th scope="col">Ancho</th>
	                  <th scope="col">Espesor</th>
	                  <th scope="col">Precio</th>
	                </tr>
	                @foreach ($obra->materiales as $material)
	                <tr class="collapse collapse{{$orden->id}}">
	                  <td scope="row">{{$material->clave}}</td>
	                  <td>{{$material->seccion}}</td>
	                  <td>{{$material->color}}</td>
	                  <td>{{$material->alto}} {{$material->medidas}}</td>
	                  <td>{{$material->ancho}} {{$material->medidas}}</td>
	                  <td>{{$material->espesor}} {{$material->medidas}}</td>
	                  <td>${{$material->precio}}MXN</td>
	                </tr>
	                @endforeach
	                @endforeach
	              @endforeach
	            </tbody>
	          </table>
	        </div>
	        
	        <div class="row">
	          <div class="col-4 offset-4">
	            <label for="totalordenes">Total de ordenes</label>
	            <div class="input-group mb-3">
	              <div class="input-group-prepend">
	                <span class="input-group-text">$</span>
	              </div>
	              <label readonly class="form-control">{</label>
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
	          <div class="col-4 offset-4">
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
	          <div class="col-4 offset-4">
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
	        <div class="row">
	          <div class="form-group col col-md-6">
	            <label for="ganacia">Porcentaje de ganancia</label>
	            <input required form="formcotizacion" name="ganancia" type="number" step="0.01" class="form-control" id="ganacia">
	          </div>
	          <div class="form-group col col-md-6">
	            <label for="incremento">Incremento</label>
	            <input required form="formcotizacion" name="incremento" type="number" step="0.01" class="form-control" id="incremento">
	          </div>
	        </div>
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
	            <button id="submit" type="submit" class="btn btn-success"><strong>Guardar</strong></button>
	          </div>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
@endsection