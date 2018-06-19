	@foreach($materiales as $material)
      <form action="" id="elim" method="POST">
        {{ csrf_field() }}
        
        <input type="hidden" name="_method" value="DELETE">
        
      
      <tr>
        <td>{{$material->material}}</td>
        <td>{{$material->precio}}</td>
        <td>{{$material->proveedor}}&nbsp;&nbsp;{{$provedor->apellidopaterno}}</td>
        <td><button class="btn btn-danger" onclick="deleteFunction('elim')"><strong>Eliminar</strong></button></td>
      </tr>
      </form>
      @endforeach