
<div class="alert alert-danger" align="center"><strong> Ese Material ya está Registrado.</strong></div>

<table class="table">
    <thead class="thead-dark" style="background-color: darkblue;color: white;">
      <tr>
        <th>Nombre/Descripción</th>
        <th>Precio</th>
        <th>Proveedor</th>
        <th>Opciones</th>
        
      </tr>
    </thead>
    <tbody >
      @foreach($materiales as $material)
      <form action="" id="elim" method="POST">
        {{ csrf_field() }}
        
        <input type="hidden" name="_method" value="DELETE">
        
      @if($material==$first)
      <tr class="active info">
      @else
      <tr>
      @endif
      
        @isset($material->colgadera)
        <td>{{$material->colgadera}}</td>
        @else
        <td>{{$material->adhesivo}}</td>
        @endif
        
        <td>{{$material->precio}}</td>
        <td>{{$material->proveedor}}</td>
        <td><button class="btn btn-danger" 

           @isset($material->colgadera)
           onclick="deleteDos({{$material->id}})"
           @endisset
           @isset($material->adhesivo)
           onclick="deleteTres({{$material->id}})"
           @endisset

           ><strong>Eliminar</strong></button></td>
      </tr>
      </form>
      @endforeach
    </tbody>
  </table>
