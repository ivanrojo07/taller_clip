@extends('layouts.cotizacion')
	@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h5>Crear orden:</h5>
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
                <form role="form" method="POST" action="{{$edit ? route('orden.update',['orden'=>$orden]) : route('orden.store')}} ">
                    {{csrf_field()}}
                    @if ($edit)
                        {{method_field('PUT')}}
                    @endif
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label class="control-label">Nombre:</label>
                            <input required class="form-control" type="text" name="nombre" id="nombre" value="{{($edit && $orden) ? $orden->nombre : ""}}">
                        </div>
                        <div class="col-sm-3 form-group">
                            <label class="control-label">Fecha:</label>
                            <input type="date" name="fecha" id="nombre" class="form-control" value="{{($edit && $orden) ? $orden->nombre : date('Y-m-d') }}" readonly>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label class="control-label">Número de orden:</label>
                            <input required type="number" step="1" name="noorden" id="noorden" class="form-control" value="{{ ($edit && $orden) ? $orden->noorden : ++$preclave}}" readonly>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label class="control-label">Número de obras:</label>
                            <input required type="number" step="1" min="1" name="noobras" id="noobras" class="form-control" value="{{ ($edit && $orden) ? $orden->noobras : ""}}" onchange="setHTML(this.value)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="control-label">Cliente:</label>
                            <select required class="form-control" name="cliente_id" id="cliente_id">
                                <option value="">---</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class=" col-sm-6">
                            <label class="control-label">Descripción:</label>
                            <textarea required class="form-control" name="descripcion" id="descripcion">{{ ($edit && $orden) ? $orden->descripcion : ""}}</textarea>
                        </div>

                        <div class="col-sm-3 form-group">
                            <label class="control-label">Precio total de venta:</label>
                            <input required type="number" step="0.00001" id="total" name="precio_orden" class="form-control" value="0" readonly="">
                        </div>
                    </div>
                    <div id="obras">

                    </div>
                    <div class="col-sm-12 mt-2 text-center form-group">
                        <button id="submit" type="submit" class="btn btn-success"><strong>Guardar</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var esprimero = true;

        $(document).ready(function() {
            $('#total').val('0');
        });

        function setHTML(obras) {
            //console.log(obras);
            // body...
            $("#obras").empty();
            for (var i = 0; i < obras; i++) {
                var rowHTML=`
                    <div class="card-header mt-5">
                        <h5>Obra ${i+1}</h5>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home${i+1}-tab" data-toggle="tab" href="#home${i+1}" role="tab" aria-controls="home" aria-selected="true">Datos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile${i+1}-tab" data-toggle="tab" href="#profile${i+1}" role="tab" aria-controls="profile" aria-selected="false">Materiales</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home${i+1}" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">Nombre de la obra:</label>
                                    <input required type="text" name="nombre_obra[]" value="{{($edit && $obra) ? $obra->nombre : ""}}" id="nombre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">Número de piezas:</label>
                                    <input required type="number" name="nopiezas_obra[]" step="1" min="1"  value="{{($edit && $obra) ? $obra->nopiezas : "1"}}" id="nopiezas" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">Alto de la obra:</label>
                                    <input required type="number" name="alto_obra[]" step="0.01" min="0"  value="{{($edit && $obra) ? $obra->alto_obra : ""}}" id="alto_obra" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">Ancho de la obra:</label>
                                    <input required type="number" name="ancho_obra[]" step="0.01" min="0" value="{{($edit && $obra) ? $obra->ancho_obra : ""}}" id="ancho_obra" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">Alto marco(cm):</label>
                                    <input required type="number" onchange="cambiarPrecio(0,${i+1})" name="alto_obra_marco[]" step="0.01" min="0" value="0" id="alto_obra_marco${i+1}" class="form-control controladordeprecio">
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">Ancho marco(cm):</label>
                                    <input required type="number" onchange="cambiarPrecio(0,${i+1})" name="ancho_obra_marco[]" step="0.01" min="0" value="0" id="ancho_obra_marco${i+1}" class="form-control controladordeprecio">
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">Profundidad marco(cm):</label>
                                    <input required type="number"  onchange="cambiarPrecio(0,${i+1})" name="profundidad_obra_marco[]" step="0.01" min="0" value="0" id="profundidad_obra_marco${i+1}" class="form-control controladordeprecio">
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">Precio por medidas:</label>
                                    <input readonly value="0" class="form-control totalO" type="number" name="total_obra[]" id="total_obra${i+1}" step="0.0000001" min="0">
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">Profundidad de la obra:</label>
                                    <input required type="number" name="profundidad_obra[]" step="0.01" min="0" value="{{($edit && $obra) ? $obra->profundidad_obra : "0"}}" id="profundidad_obra" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">Medidas de la obra:</label>
                                    <select required class="custom-select" name="unidad_obra[]" id="unidad_obra">
                                        <option value="mm" {{($edit && $material->unidad_obra == "mm") ? "selected" : ""}}>mm</option>
                                        <option value="cm" {{($edit && $material->unidad_obra == "cm") ? "selected" : ""}}>cm</option>
                                        <option value="m" {{($edit && $material->unidad_obra == "m") ? "selected" : ""}}>m</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="control-label">Descripción de la obra:</label>
                                    <textarea required name="descripcion_obra[]" id="descripcion_obra" class="form-control">{{($edit && $obra) ? $obra->descripcion_obra : ""}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile${i+1}" role="tabpanel" aria-labelledby="profile${i+1}-tab">
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label class="control-label">Buscar material:</label>
                                    <select required class="custom-select seccion2" id="seccion${i+1}" required onchange="agregarATabla(this.id)">
                                        <option value="">---</option>
                                        <option value="Maria Luisa">Maria Luisa</option>
                                        <option value="Montaje">Montaje</option>
                                        <option value="Marco">Marco</option>
                                        <option value="Protección">Protección</option>
                                        <option value="Generales">Generales</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <h3>Resultados de búsqueda</h3>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="table-info">
                                            <th scope="col">Clave</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Alto</th>
                                            <th scope="col">Ancho</th>
                                            <th scope="col">Profundidad</th>
                                            <th scope="col">Color</th>
                                            <th scope="col">Precio metro cuadrado</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="listaM" id="listaM${i+1}"></tbody>
                                </table>
                            </div>
                            <div class="row">
                                <h3>Materiales de la obra ${i+1}</h3>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="table-info">
                                            <th scope="col">Clave</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Alto</th>
                                            <th scope="col">Ancho</th>
                                            <th scope="col">Profundidad</th>
                                            <th scope="col">Color</th>
                                            <th scope="col">Precio metro cuadrado</th>
                                            <th>Cantidad</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myMaterials${i+1}"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                `;
                
                $("#obras").append(rowHTML);
                
            }
            
        }

        function agregarATabla(id){
            $.ajax({
                url: '../buscarMaterial/'+$('#'+id).val() + '/'+ id.replace('seccion',''),
                type:"GET",
                success: function(res){
                    $("#listaM" + id.replace('seccion','')).html(res);
                },
                error: function(){
                }
            })

        }
        function getObra(obra_id,index){
            $.ajax({
                url:"../getObra/"+obra_id,
                type:"GET",
                success: function(res){
                    obra= res.obra;
                    if(obra){
                        $("#alto_obra"+index).val(obra.alto_obra+" "+obra.unidad_obra);
                        $("#ancho_obra"+index).val(obra.ancho_obra+" "+obra.unidad_obra);
                        $("#profundidad_obra"+index).val(obra.profundidad_obra+" "+obra.unidad_obra);
                        $("#nopiezas"+index).val(obra.nopiezas+" pz(s)");
                        $("#precio_obra"+index).val("$"+obra.precio_obra+"MXN");
                        $("#descripcion_obra"+index).val(obra.descripcion_obra);
                        descripcion_material = "";
                        obra.materiales.forEach(function(material){
                            descripcion_material = descripcion_material.concat(`Clave: ${material.clave}, Sección: ${material.seccion}, Descripción: ${material.descripcion} \n`);
                        })
                        $("#materiales_obra"+index).val(descripcion_material);


                        //TOTAL ORDEN CON PRECIOS OBR
                        // totaltemp += parseFloat(obra.precio_obra);
                        // $('#total').val(totaltemp);
                    }
                }
            });
        }
    
           

        function addMaterial(material, id){
            var rowHTML = 
            `<tr id="row${material.id}">
                <td scope="row">
                    ${material.clave}
                </td>
                <td>${material.descripcion}</td>
                <td>${material.alto} ${material.medidas}</td>
                <td>${material.ancho} ${material.medidas} </td>
                <td>${material.espesor} ${material.medidas}</td>
                <td>${material.color}</td>
                <td class="precioporm2">$${material.precio}</td>
                <td>
                    <input type="hidden" name="materiales_obra[` +  (id - 1 ) + `][]" value="${material.id}">
                    <input required type="number" step="1" min="0" name="cantidad_material_obra[` +  (id-1 ) + `][]" value="1" id="cantidad_material" class="form-control cant_input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required onchange="actualizarPreicoMedidas(${id})">
                </td>
                <td>
                    <div class="row mt-1 mb-1 justify-content-md-center">
                        <a href="#/" onclick="removeMaterial('row${material.id}')" class="btn btn-danger remove_button">
                            Eliminar
                        </a>
                    </div>
                </td>
                
            </tr>`;
            $("#myMaterials" + id).append(rowHTML);
            cambiarPrecio(material.precio, id);
            //alert(id);
        }
        
        function removeMaterial(id) {
            var cantaquitar = parseFloat($('#'+id).find('td.precioporm2').text().replace('$',''));
            console.log('cantidad a quitar: ' + cantaquitar);
            var obra = $('#'+id).parent().attr('id').replace('myMaterials','');
            console.log('obra: ' + obra);
            //alert('cantidad a quitar:\n' + cantaquitar + '\nid obra:\n' + obra);
            cambiarPrecio(-cantaquitar, obra);
            $(`#${id}`).remove();
        }

        function cambiarPrecio(preciom2, obra_id){
            var ancho_marco = parseFloat($('#ancho_obra_marco' + obra_id).val()) / 100;
            var alto_marco = parseFloat($('#alto_obra_marco' + obra_id).val()) / 100;
            var profundidad_marco = parseFloat($('#profundidad_obra_marco' + obra_id).val());
            if (profundidad_marco != 0) {
                var volumen = (ancho_marco * alto_marco * profundidad_marco);
            }
            else{
                var volumen = (ancho_marco * alto_marco);
            }
            //alert('medidads:\n' + ancho_marco + '\n' + alto_marco + '\n' + profundidad_marco);
            //console.log($('input#cantidad_material.form-control')[0].value);
            var temp = volumen *preciom2;
            console.log('temp: ' + temp);
            //alert('cantiad:\n' + preciom2);
            //alert('volumen:\n' + volumen);
            var valor =  parseFloat($('#total_obra'+obra_id).val()) + (temp);
            var valor_anterior = parseFloat($('#total_obra'+obra_id).val());
            var precio_total = parseFloat($('#total').val());
            console.log('valor: ' + valor);
            if (valor > 0.5){
                precio_total -= valor_anterior;
                $('#total_obra'+obra_id).val(valor);
                precio_total += valor;
                $('#total').val(precio_total.toString());
            }else{
                $('#total_obra'+obra_id).val(0);
                precio_total += (temp);
                if (precio_total < 0.5) 
                    $('#total').val('0');
                else
                    $('#total').val(precio_total.toString());
            }
            
        }

        function actualizarPreicoMedidas(obra_id) {
            console.log('obraid  ' + obra_id);
            for (var i = 0; i < $('.cant_input').length; i++) {
                var num_obra = $('.cant_input').eq(i).attr('name').replace('cantidad_material_obra\[', '').replace(/\]\[\]/, '');
                var total_obra = 0;
                if (obra_id-1 == num_obra) {
                    var precio_m2 = parseFloat($('.cant_input')[i].parentElement.parentElement.children[6].innerHTML.replace('$', ''));
                    var cantidad_material = parseInt($('.cant_input')[i].value);
                    var ancho_marco = parseFloat($('#ancho_obra_marco' + obra_id).val()) / 100;
                    var alto_marco = parseFloat($('#alto_obra_marco' + obra_id).val()) / 100;
                    var profundidad_marco = parseFloat($('#profundidad_obra_marco' + obra_id).val());

                    if (profundidad_marco != 0) {
                        var volumen = (ancho_marco * alto_marco * profundidad_marco);
                    }
                    else{
                        var volumen = (ancho_marco * alto_marco);
                    }

                    total_obra += (precio_m2 * cantidad_material * volumen);
                }
            }
            $('#total_obra' + obra_id).val(total_obra.toString());
            var total_orden = 0;
            for (var i = 0; i < $('.totalO').length; i++) {
                total_orden += parseFloat($('.totalO').eq(i).val());
            }
            $('#total').val(total_orden.toString());
        }

    </script>
    @endsection