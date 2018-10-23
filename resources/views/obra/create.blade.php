@extends('layouts.cotizacion')
	@section('content')
    <div class="container my-3">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alerta!</strong> <br> No cierre ni cambie esta pestaña si quiere que se guarden correctamente las obras de la orden.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @for($i = 0; $i < $noabras; $i++)
                <li class="nav-item">
                    <a class="nav-link @if ($i==0) active @endif" id="pills-{{$i}}-tab" data-toggle="pill" href="#pills-{{$i}}" role="tab"  >Obra {{$i+1}}</a>
                </li>
            @endfor
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @for($i = 0; $i < $noabras; $i++)
               
                <div class="tab-pane fade @if ($i==0) show active @endif" id="pills-{{$i}}" role="tabpanel" >
                    <div class="obra" id="obra{{$i}}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="nombre">Nombre Obra:</label>
                            <input type="text" class="form-control nombre" name="nombre" id="nombre{{$i}}" placeholder="Nombre de la obra">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="nopiezas">#Piezas:</label>
                            <input type="number" class="form-control nopiezas" name="nopiezas"  id="nopiezas{{$i}}" placeholder="Número de piezas">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="alto">Alto:</label>
                            <input type="number" class="form-control alto" name="alto" id="alto{{$i}}" placeholder="Alto">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="ancho">Ancho:</label>
                            <input type="number" class="form-control ancho" name="ancho"  id="ancho{{$i}}" placeholder="Ancho">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="profundidad">Profundidad:</label>
                            <input type="number" class="form-control profundidad" name="profundidad" id="profundidad{{$i}}" placeholder="Profundidad">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="medidas">Medidas:</label>
                            <select name="medidas"  id="medidas{{$i}}" class="form-control medidas">
                            <option>cm</option>
                            <option>mm</option>
                            <option>m</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control descripcion" name="descripcion" id="descripcion{{$i}}" rows="3"></textarea>
                            </div>
                        </div>
                        <h4>Buscar Material</h4>
                        <div id="busquedademat{{$i}}" class="form-group col-md-4 busquedademat{{$i}}">
                            <label for="seccion">Sección:</label>
                            <select name="seccion" id="seccion" class="seccion form-control">
                                <option value="">---</option>
                                <option value="montaje">Montajes</option>
                                <option value="proteccion">Protección</option>
                                <option value="marcos">Marcos</option>
                                <option value="maria">Maria Luisa</option>
                                <option value="generales">Generales</option>
                            </select>
                        </div>
                        <table class="table busquedademat{{$i}}">
                            <tr>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Alto</th>
                                <th>Ancho</th>
                                <th>Profundidad</th>
                                <th>Color</th>
                                <th>Tipo</th>
                                <th>Operación</th>
                            </tr>
                            @foreach($materiales as $material)
                            <tr id="row{{$i.'m'.$material->id}}">
                                <td class="id">{{$material->id}}</td>
                                <td class="descripcion">{{$material->descripcion->descripcion}}</td>
                                <td class="alto">{{$material->alto}}</td>
                                <td class="ancho">{{$material->ancho}}</td>
                                <td class="profundidad">{{$material->espesor}}</td>
                                <td class="color">{{$material->color}}</td>
                                <td class="tipo">{{$material->tipo}}</td>
                                <td>
                                    <input type="number" name="cantidad" class="cantidad" placeholder="Cantidad" value="1">
                                    <button class="btn btn-success mx-2 my-2" onclick="agregaratabla('row{{$i.'m'.$material->id}}', {{$i}})">Agregar</button>
                                    <button class="btn btn-primary mx-2 my-2">Ver</button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <h4>Materiales de obra</h4>
                        <table id="tablachida" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cantidad</th>
                                    <th>Descripción</th>
                                    <th>Alto</th>
                                    <th>Ancho</th>
                                    <th>Profundidad</th>
                                    <th>Color</th>
                                </tr>
                            </thead>
                            <tbody id="tablaconmateriales{{$i}}">
                            </tbody>
                            
                            
                        </table>
                        <center><button class="agregarF btn btn-primary" onclick="guardarObra('obra{{$i}}', {{$i}})" formulario="obra{{$i}}">Guardar Obra</button></center>
                    </div>
                </div>
            @endfor
        </div>
    </div>


    <script>
        var vaci = true;
        $(document).ready(function(){
            $("input.nombre").change(function(){
                var id = $(this).parent().parent().parent().attr('id');
                var idfinal = id.split("obra")[1];
                var nombre = $(this).val();
                $('#pills-'+idfinal+'-tab').text(nombre);
            });
        });

        function agregaratabla(cosa, noobra){
            // alert('cosa:'+cosa);
            // alert('noobra:'+noobra);
            var cantidadparamulti = $('#nopiezas'+noobra).val();
            if($('#nopiezas'+noobra).val()==''){
                swal({
                    type: 'error',
                    title: 'Ups...',
                    text: 'Ingresa el número de piezas!'
                    });
                return 0;
            }
                
                
            var row = $('#'+cosa);
            var ht = '<tr><td><input type="text"  class="form-control" name="materialid[]" readonly value='+ row.find('.id').text()+'></td>'+
                    '<td><input type="number" class="form-control" name="cantidad[]" readonly value='+ row.find('.cantidad').val()*cantidadparamulti+'></td>'+
                    '<td>'+ row.find('.descripcion').text()+'</td>'+
                   ' <td>'+ row.find('.alto').text()+'</td>'+
                    '<td>'+ row.find('.ancho').text()+'</td>'+
                    '<td>'+ row.find('.profundidad').text()+'</td>'+
                    '<td>'+ row.find('.color').text()+'</td></tr>';
            $('#tablaconmateriales'+noobra+':last-child').append(ht);
            vaci = false;
        }
    
        function guardarObra(idofrmulario, noobra){
            if(vaci){
                swal({
                    type: 'error',
                    title: 'Ups...',
                    text: 'Tienes que elegir al menos un material!'
                    });
                return 0;
            }
             var formulario = $('#'+idofrmulario);
            var orden_id = '{{$orden_id}}';
            var nombre = formulario.find('.nombre').val();
            var nopiezas = formulario.find('.nopiezas').val();
            var alto = formulario.find('.alto').val();
            var ancho = formulario.find('.ancho').val();
            var medidas = formulario.find('.medidas').val();
            var profundidad = formulario.find('.profundidad').val();
            var tipomaterial = 'tipo1';
            var descripcion = formulario.find('.descripcion').val();
            var ids = formulario.find('input[name="materialid[]"]').map(function(){
                return $(this).val();
            }).get();
            var cantidades = formulario.find('input[name="cantidad[]"]').map(function(){
                return $(this).val();
            }).get();
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('obra.store') }}",
                type: "POST",
                dataType: "html",
                data: {
                    orden_id: orden_id,
                    nombre:nombre,
                    nopiezas:nopiezas,
                    alto:alto,
                    ancho:ancho,
                    medidas:medidas,
                    profundidad:profundidad,
                    tipomaterial:tipomaterial,
                    descripcion:descripcion,
                    materiaids:ids,
                    cantidades: cantidades
                },
                success:function(res){
                    swal(
                    'Obra ha sido registrada',
                    'Continúe con las siguientes obras!',
                    'success'
                    );
                    $('.busquedademat'+noobra).hide();
                },
                error:function(){
                    swal({
                    type: 'error',
                    title: 'Ups...',
                    text: 'Asegúrate que llenaste todos los campos!'
                    });
                },
            });

        }

        $('#seccion').change(function(){
            alert($(this).parent().parent().attr('id'));
            var eso = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('material.index') }}",
                type: "GET",
                data: {
                    seccion: eso
                },
                dataType: "json",
            }).done(function(resultado){
                var b = JSON.stringify(resultado);
                var r = '';
                 for(var i = 0; i < resultado.length; i++){
                //     r += resultado[i].id+'\n';
                //     r += resultado[i].descripcion.descripcion+'\n';
                //     r += resultado[i].alto+'\n';
                //     r += resultado[i].ancho+'\n';
                //     r += resultado[i].profundidad+'\n';
                //     r += resultado[i].color+'\n';
                //     r += resultado[i].tipo+'\n';
                 }
            });
        });
            

    </script>

    {{--$orden_id--}}
    {{--$noabras--}}

    @endsection