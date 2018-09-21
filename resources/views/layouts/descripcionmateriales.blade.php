@extends('layouts.blank')
 @section('content')
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<div class="container">

<!--  -->
<!-- <h4>Descripciones Generales</h4>
<form class="formulariomaterial" id="fgeneral" method="POST" action="{{route('des_generales.store')}}">
    {{ csrf_field() }}
    <div class="col-6">
        <label>Nombre/Descripción</label>
        <input type="text" class="form-control" name="descripcion" required>
        <input type="hidden" name="atributo" value="descripcion">
    </div>
    <div class="col-6">
        <br>
        <button type="sumbit" class="btn btn-warning"><strong>Agregar</strong></button>
    </div>
</form> -->

<br>
<br>
<br>
<h4>Descripciones Marco</h4>

<form class="formulariomaterial" id="fmarco" method="POST" action="{{route('des_marco.store')}}">
    {{ csrf_field() }}
    <div class="col-6">
        <label>Nombre/Descripción</label>
        <input type="text" class="form-control" name="descripcion" required>
        <input type="hidden" name="atributo" value="descripcion">
    </div>
    <div class="col-6">
        <br>
        <button type="sumbit" class="btn btn-warning"><strong>Agregar</strong></button>
    </div>
</form>
<br>
<br>
<br>
<h4>Descripciones Marias</h4>
<form class="formulariomaterial" id="fmaria" method="POST" action="{{route('des_maria.store')}}">
    {{ csrf_field() }}
    <div class="col-6">
        <label>Nombre/Descripción</label>
        <input type="text" class="form-control" name="descripcion" required>
        <input type="hidden" name="atributo" value="descripcion">
    </div>
    <div class="col-6">
        <br>
        <button type="sumbit" class="btn btn-warning"><strong>Agregar</strong></button>
    </div>
</form>
<br>
<br>
<br>
<h4>Descripciones Montaje</h4>
<form class="formulariomaterial" id="fmontaje" method="POST" action="{{route('des_montaje.store')}}">
    {{ csrf_field() }}
    <div class="col-6">
        <label>Nombre/Descripción</label>
        <input type="text" class="form-control" name="descripcion" required>
        <input type="hidden" name="atributo" value="descripcion">
    </div>
    <div class="col-6">
        <br>
        <button type="sumbit" class="btn btn-warning"><strong>Agregar</strong></button>
    </div>
</form>

<h4>Descripciones Protección</h4>

<form class="formulariomaterial" id="fproteccion" method="POST" action="{{route('des_proteccion.store')}}">
    {{ csrf_field() }}
    <div class="col-6">
        <label>Nombre/Descripción</label>
        <input type="text" class="form-control" name="descripcion" required>
        <input type="hidden" name="atributo" value="descripcion">
    </div>
    <div class="col-6">
        <br>
        <button type="sumbit" class="btn btn-warning"><strong>Agregar</strong></button>
    </div>
</form>

</div>
     @endsection