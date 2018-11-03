@extends('layouts.cotizacion')
	@section('content')
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <div class="col-sm-4">
          <h5>Ordenes:</h5>
        </div>
      </div>
      <div class="card-body">
        <div class="mt-1">
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="table-info">
                <th scope="col">Número de orden</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col">Descripción</th>
                <th scope="col">Obras</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ordenes as $orden)
              <tr>
                <td scope="row">
                  {{$orden->noorden}}
                </td>
                <td>
                  {{$orden->nombre}}
                </td>
                <td>
                  {{$orden->fecha}}
                </td>
                <td>{{$orden->descripcion}}</td>
                <td>
                  <div class="row justify-content-md-center">
                    {{$orden->noobras}} obra(s): <br>
                    @foreach ($orden->obras as $obra)
                      {{$obra->nombre}} <br>
                    @endforeach
                  </div>
                  <div class="modal fade" tabindex="-1" role="dialog" id="infObra{{$orden->id}}" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="min-width: 100%!important;margin: 0!important;">
                          <div class="modal-content" style="min-height: 50vh!important;">
                            <div class="modal-header">
                              <h5 class="modal-title">Obras de {{$orden->nombre}}:</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table class="table table-striped table-bordered">
                                <tbody>
                                  @foreach ($orden->obras as $index=>$obra)
                                    <tr class="table-info">
                                      <th class="span" colspan="7" scope="colgroup">Obra {{$index+1}}</th>
                                    </tr>
                                    <tr class="table-info">
                                      <th scope="col">Nombre</th>
                                      <th scope="col">Piezas</th>
                                      <th scope="col" colspan="2">Descripción</th>
                                      <th scope="col">Alto</th>
                                      <th scope="col">Ancho</th>
                                      <th scope="col">Profundidad</th>
                                    </tr>
                                    <tr>
                                      <td scope="row">
                                        {{$obra->nombre}}
                                      </td>
                                      <td>{{$obra->nopiezas}}</td>
                                      <td colspan="2">{{$obra->descripcion_obra}}</td>
                                      <td>{{$obra->alto_obra}} {{$obra->unidad_obra}}</td>
                                      <td>{{$obra->ancho_obra}} {{$obra->unidad_obra}}</td>
                                      <td>{{$obra->profundidad_obra}} {{$obra->unidad_obra}}</td>
                                    </tr>
                                    <tr class="table-info">
                                      <th class="span" colspan="7" scope="colgroup">Materiales</th>
                                    </tr>
                                    <tr class="table-info">
                                      <th scope="col">Clave</th>
                                      <th scope="col">Sección</th>
                                      <th scope="col">Color</th>
                                      <th scope="col">Alto</th>
                                      <th scope="col">Ancho</th>
                                      <th scope="col">Espesor</th>
                                      <th scope="col">Precio</th>
                                    </tr>
                                    @foreach ($obra->materiales as $material)
                                    <tr>
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
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                  <div class="row mt-1 mb-1 justify-content-md-center">
                    <button type="button" data-toggle="modal" data-target="#infObra{{$orden->id}}" href="#" class="btn btn-info">Ver</button>
                  </div>
                </td>
                <td>
                  
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection