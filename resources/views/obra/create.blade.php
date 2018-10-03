@extends('layouts.cotizacion')
	@section('content')

    @for($i = 0; $i < $noabras; $i++)
    
    *********************************************************************************************************************************<br>
    <div class="obra" id="obra{{$i}}">
        Nombre Obra: <input type="text" name="nombre" class="nombre"><br>
        #Piezas: <input type="number" name="nopiezas" class="nopiezas"><br>
        Alto: <input type="number" name="alto" class="alto"><br>
        Ancho: <input type="number" name="ancho" class="ancho"><br>
        Medidas: <input type="text" name="medidas" class="medidas">
        Profundidad: <input type="number" name="profundidad" class="profundidad"><br>
        Descripción: <textarea name="descripcion" class="descripcion"></textarea><br><br>
        <h4>Buscar Material</h4>
        <select name="seccion" class="seccion">
            <option value="montajes">Montajes</option>
            <option value="proteccion">Protección</option>
            <option value="marcos">Marcos</option>
            <option value="maria">Maria Luisa</option>
            <option value="generales">Generales</option>
        </select>
        <br>
        <table class="table">
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
            <tr id="row{{$i}}">
                <td class="id">{{$material->id}}</td>
                <td class="descripcion">{{$material->descripcion->descripcion}}</td>
                <td class="alto">{{$material->alto}}</td>
                <td class="ancho">{{$material->ancho}}</td>
                <td class="profundidad">{{$material->espesor}}</td>
                <td class="color">{{$material->color}}</td>
                <td class="tipo">{{$material->tipo}}</td>
                <td><input type="text" name="cantidad" class="cantidad" placeholder="Cantidad" value="1"><button onclick="agregaratabla('row{{$i}}', {{$i}})">Agregar</button><button>Ver</button></td>
            </tr>
            @endforeach
        </table>
        <h4>tabla de obra</h4>
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
        <center><button class="agregarF" onclick="guardarObra('obra{{$i}}', {{$i}})" formulario="obra{{$i}}">Agregar</button></center>
</div>
        *********************************************************************************************************************************<br>
    @endfor

    <script>
        
        function agregaratabla(cosa, noobra){
            var row = $('#'+cosa);
            alert(row.html());
            var ht = '<tr><td><input type="text" name="materialid[]" readonly value='+ row.find('.id').text()+'></td>'+
                    '<td><input type="number" name="cantidad[]" readonly value='+ row.find('.cantidad').val()+'></td>'+
                    '<td>'+ row.find('.descripcion').text()+'</td>'+
                   ' <td>'+ row.find('.alto').text()+'</td>'+
                    '<td>'+ row.find('.ancho').text()+'</td>'+
                    '<td>'+ row.find('.profundidad').text()+'</td>'+
                    '<td>'+ row.find('.color').text()+'</td></tr>';
            $('#tablaconmateriales'+noobra+':last-child').append(ht);
        }
    
         function guardarObra(idofrmulario, noobra){
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
            console.log(ids);
            alert('id: '+orden_id+' n:'+nombre+' nop:'+nopiezas+' al:'+alto+' anc:'+ancho+' medi:'+medidas+' p:'+profundidad+' t:'+tipomaterial+' d'+descripcion);
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
                    alert(res);
                },
            }).done(function(resultado){
                alert('done');
            });

            alert('alerta2');
        }
    
            

    </script>

    {{$orden_id}}
    {{$noabras}}

    @endsection