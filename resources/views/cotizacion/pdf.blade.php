<!DOCTYPE html>
<html>
	<div class="container-fluid">
	  <div class="card">
	    <div class="card-header">
	      <div class="row">
	        <div class="col-sm-8">
	        	<h5>Cotización {{$cotizacion->nocotizacion}}:</h5>
	        </div>	        
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
	        
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		        <div class="row"><h5>Ordenes:</h5></div>
		       {{--  <div class="row"> --}}
	        	<table class="table table-striped table-bordered">
		            
		                <thead>
		                <tr class="table-info">
		                  <th scope="col" colspan="7">Orden</th>
		                </tr>
		                <tr class="table-info">
		                  <th scope="col">Número</th>
		                  <th scope="col">Orden</th>
		                  <th scope="col">Fecha</th>
		                  <th scope="col">Descripción</th>
		                  {{-- <th scope="col">Precio</th> --}}
		                  
		                </tr>
		                <tbody>
		        @if($cotizacion->ordens)
		         @foreach ($cotizacion->ordens as $orden)
			          
			                <tr>
			                  <td scope="row">{{$orden->noorden}}</td>
			                  <td>{{$orden->nombre}}</td>
			                  <td>{{$orden->fecha}}</td>
			                  <td>{{$orden->descripcion}}</td>
			                 {{--  <td>${{$orden->precio_orden}}MXN</td> --}}
			                  
			                </tr>
			                {{-- </tbody>
		          		</table> --}}
              	@endforeach
              		</tbody>
		        </table>

		        {{-- @foreach ($cotizacion->ordens as $orden)
		          <table class="table table-striped table-bordered">
		            <tbody>
		                
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
		                @if($orden->obras)
		                @foreach ($orden->obras as $index=>$obra)
			                <table class="table table-striped table-bordered">
				                <tr class="table-success collapse collapse{{$orden->id}} tr-space">
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
				                  <td>{{$obra->alto_obra}} cm</td>
				                  <td>{{$obra->ancho_obra}} cm</td>
				                  <td>{{$obra->profundidad_obra}} cm</td>
				                </tr>
					                <table class="table table-striped table-bordered">
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
						                @if($obra->materiales)
						                @foreach ($obra->materiales as $material)
							                <tr class="collapse collapse{{$orden->id}} tr-space">
							                  <td scope="row">{{$material->clave}}</td>
							                  <td>{{$material->seccion}}</td>
							                  <td>{{$material->color}}</td>
							                  <td>{{$material->alto}} cm</td>
							                  <td>{{$material->ancho}} cm</td>
							                  <td>{{$material->espesor}} cm</td>
							                  <td>${{$material->precio}} MXN</td>
							                </tr>
						                @endforeach
						            </table>
				            </table>
		                @endforeach
		            </tbody>
		          </table>
              	@endforeach --}}
              	@endif
			  	</div>
			  </div>
			  {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
		        <div class="row"><h5>Mano de obra:</h5></div>
		        <div class="row">
		          <table class="table table-striped table-bordered">
		            <thead>
		              <tr class="table-info">
		                <th scope="col">Nombre</th>
		                <th scope="col">Puesto</th>
		                <th scope="col">Monto</th>
		                <th scope="col">Descripción</th>
		              </tr>
		            </thead>
		            <tbody id="tablamanodeobras">
		            @if($cotizacion->manodeobras)
		            	@foreach($cotizacion->manodeobras as $manodeobras)
		            		<tr>
		            			<td>{{ $manodeobras->nombre }}</td>
		            			<td>{{ $manodeobras->puesto }}</td>
		            			<td>${{ $manodeobras->monto }}</td>
		            			<td>{{ $manodeobras->descripcion }}</td>
		            		</tr>
		        		@endforeach
		        	@endif
		            </tbody>
		          </table>
		        </div>	
			  </div> --}}
			  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
		        {{-- <div class="row"><h5>Varios:</h5></div>
		        <div class="row">
		          <table class="table  table-striped table-bordered">
		            <thead class="table-info">
		              <tr>
		                <th scope="col">Monto</th>
		                <th scope="col">Descripción</th>
		              </tr>
		            </thead>
		            <tbody id="tablavarios">
		            @if($cotizacion->varios)
		            	@foreach($cotizacion->varios as $varios)
		            		<tr>
		            			<td>{{ $varios->monto }}</td>
		            			<td>{{ $varios->descripcion }}</td>
		            		</tr>
		        		@endforeach
		        	@endif
		            </tbody>
		          </table>
		        </div> --}}
			  </div>
			  {{-- <div class="tab-pane fade" id="envios" role="tabpanel" aria-labelledby="envios-tab">
		        <div class="row"><h5>Envios:</h5></div>
		        <div class="row">
		          <table class="table table-striped table-bordered">
		            <thead class="table-info">
		              <tr>
		                <th scope="col">Dirección</th>
		                <th scope="col">Descripción</th>
		                <th scope="col">Monto</th>
		              </tr>
		            </thead>
		            <tbody id="tablaenvios">
		            @if($cotizacion->envios)
		            	@foreach($cotizacion->envios as $envios)
		            		<tr>
		            			<td>{{ $envios->direccion }}</td>
		            			<td>{{ $envios->descripcion }}</td>
		            			<td>{{ $envios->monto }}</td>
		            		</tr>
		        		@endforeach
		        	@endif
		            </tbody>
		          </table>
		        </div>	
			  </div> --}}
	        </div>
	        {{-- <div class="row"><h5>Total:</h5></div> --}}
	        <div class="row">
	          <div class="col-sm-3 form-group">
	           {{--  <label class="control-label">Total orden(es): ${{ $cotizacion->totalordenes }} MXN</label> --}}
	            {{-- <div class="input-group mb-3">
	              <div class="input-group-prepend">
	                <span class="input-group-text">$</span>
	              </div>
	              <label readonly type="number" step="0.01" class="form-control" name="totalordenes"  id="inputtotalordenes">{{ $cotizacion->totalordenes }} </label>
	              <div class="input-group-append">
	                <span class="input-group-text">MXN</span>
	              </div>
	            </div> --}}
	          </div>
	          <div class="col-sm-3 form-group">
	           {{--  <label class="control-label">Total mano(s) de obra(s): ${{ $cotizacion->totalmanodeobra }} MXN</label> --}}
	            {{-- <div class="input-group mb-3">
	              <div class="input-group-prepend">
	                <span class="input-group-text">$</span>
	              </div>
	              <label readonly type="number" step="0.01" class="form-control" name="totalmanodeobra"  id="inputtotalmanodeobra">{{ $cotizacion->totalmanodeobra }} </label>
	              <div class="input-group-append">
	                <span class="input-group-text">MXN</span>
	              </div>
	            </div> --}}
	          </div>
	          {{-- <div class="col-sm-3 form-group">
	            <label class="control-label">Total varios: ${{ $cotizacion->totalvarios }} MXN</label> --}}
	            {{-- <div class="input-group mb-3">
	              <div class="input-group-prepend">
	                <span class="input-group-text">$</span>
	              </div>
	              <label readonly type="number" step="0.01" class="form-control" name="totalvarios"  id="inputtotalvarios">{{ $cotizacion->totalvarios }} </label>
	              <div class="input-group-append">
	                <span class="input-group-text">MXN</span>
	              </div>
	            </div> --}}
	          {{-- </div> --}}
	          {{-- <div class="col-sm-3 form-group">
	            <label class="control-label">Total envio(s): ${{ $cotizacion->totalenvios }} MXN</label> --}}
	            {{-- <div class="input-group mb-3">
	              <div class="input-group-prepend">
	                <span class="input-group-text">$</span>
	              </div>
	              <label readonly type="number" step="0.01" class="form-control" name="totalenvios"  id="inputtotalenvios">{{ $cotizacion->totalenvios }} </label>
	              <div class="input-group-append">
	                <span class="input-group-text">MXN</span>
	              </div>
	            </div>
	          </div> --}}
	       {{--  </div> --}}
	        {{-- <div class="row">
	          <div class="form-group col col-md-4 offset-4">
	            <label for="totalproyecto">Costo Proyecto ${{ $cotizacion->totalproyecto }}</label> --}}
	            {{-- <label required readonly form="formcotizacion" name="totalproyecto" type="number" step="0.01" class="form-control" id="totalproyecto">{{ $cotizacion->totalproyecto }}</label> --}}
	          {{-- </div>
	        </div> --}}
	        <div class="row">
	          <div class="form-group col col-md-4">
	            <label for="resultado">Subtotal: ${{ $cotizacion->totalproyecto }}</label>
	            {{-- <label required readonly form="formcotizacion" type="number" step="0.01" name="resultado" class="form-control" id="resultado">{{ $cotizacion->totalproyecto }} </label> --}}
	          </div>
	          <div class="form-group col pt-4 col-md-4">
	          @if( $cotizacion->totalproyecto != $cotizacion->totalneto )
	            <div class="form-check">
	              <input required form="formcotizacion" class="form-check-input" type="radio" name="iva" id="coniva" value="16" checked>
	              <label class="form-check-label" for="coniva">
	                con IVA
	              </label>
	            </div>
	          @else
	            <div class="form-check">
	              <input required form="formcotizacion" class="form-check-input" type="radio" name="iva" id="siniva" value="1" checked>
	              <label class="form-check-label" for="siniva">
	                sin IVA
	              </label>
	            </div>
	          @endif
	          </div>
	          <div class="form-group col col-md-4">
	            <label for="totalneto">Total Neto: ${{ $cotizacion->totalneto }}</label>
	            {{-- <label required readonly form="formcotizacion" type="number" step="0.01" name="totalneto" class="form-control" id="totalneto">{{ $cotizacion->totalneto }} </label> --}}
	          </div>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
