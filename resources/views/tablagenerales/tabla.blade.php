
<table class="table">
    <thead class="thead-dark" style="background-color: darkblue;color: white;">
      <tr>
        <th>Nombre/Descripción</th>
        <th>Precio</th>
        <th>Proveedor</th>
        <th>Fecha de Creación</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody >
      @foreach($materiales as $material)
      
        
       @isset($material->colgadera)
       <input type="hidden" name="atributo_c" value="colgaderas" id="atributo_c">
        @endisset
       @isset($material->adhesivo) 
        <input type="hidden" name="atributo_a" value="adhesivos" id="atributo_a">
        @endisset
        
      
     
      @if($material==$first)
      <tr class="active info">
      @else
      <tr>
      @endif

        @isset($material->colgadera)
        <td>{{$material->colgadera}}</td>
        @endisset
        @isset($material->adhesivo) 
        <td>{{$material->adhesivo}}</td>
        @endisset
        
        <td>{{$material->precio}}</td>
        <td>{{$material->proveedor}}</td>
        <td>{{$material->created_at}}</td>
        <td><button class="btn btn-danger" 

           @isset($material->colgadera)
           onclick="deleteDos({{$material->id}})"
           @endisset
           @isset($material->adhesivo)
           onclick="deleteTres({{$material->id}})"
           @endisset
       
          
          ><strong>Eliminar</strong></button></td>
      </tr>
      
      @endforeach
    </tbody>
  </table>
