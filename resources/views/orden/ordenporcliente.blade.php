@foreach ($ordenes as $orden)
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
                  <td>{{$orden->precio_orden}}</td>
                  <td>
                    <div class="row mt-1 mb-1 justify-content-md-center">
                      <a href="#" onclick="addOrden({{json_encode($orden)}})" class="btn btn-success">
                        Agregar
                      </a>
                    </div>
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