@extends('layouts.cotizacion')
@section('content')

<!--CLIENTE-->
<h1 class="display-4">Cliente</h1>
<div class="row">
    <div class="col-4">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>

    </div>
    <div class="col-8">
  
<table class="table table-striped table-warning">
    <thead>
        <tr class="bg-warning">
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
    </tbody>
</table>


    </div>
</div>

<div class="form-row">
    <div class="form-group col-4">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" id="fecha">
    </div>
    <div class="form-group col-4">
        <label for="coti">#Cotización</label>
        <input type="text" class="form-control" id="coti">
    </div>
    <div class="form-group col-4">
        <label for="moneda">Tipo de Moneda</label>
        <input type="text" class="form-control" id="moneda">
    </div>
    <div class="form-group col-4">
        <label for="proyecto">Nombre Proyecto</label>
        <input type="text" class="form-control" id="proyecto">
    </div>
    <div class="form-group col-4">
        <label for="fechaEntrega">Fecha</label>
        <input type="date" class="form-control" id="fechaEntrega">
    </div>
</div>

<!--MATERIALES-->
<h1 class="display-4">Materiales</h1>
<table class="table table-striped table-warning">
    <caption>Lista de Materiales</caption>
    <thead>
        <tr class="bg-warning">
            <th scope="col">Tipo Material</th>
            <th scope="col">Material</th>
            <th scope="col">Clave</th>
            <th scope="col"># de Piezas</th>
            <th scope="col">Monto</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>tip</td>
            <td>mat</td>
            <td>clav</td>
            <td>no. p</td>
            <td>mont</td>
        </tr>
    </tbody>
</table>
<div class="row">
    <div class="col-3 offset-5">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Total de Material</span>
            </div>
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" readonly class="form-control" aria-label="Amount (to the nearest dollar)">
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>
    </div>
</div>


<!--MANO DE OBRA-->
<h1 class="display-4">Mano de Obra</h1>
<div class="row">
    <div class="col mb-2">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Descripción</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" style="resize: none;"></textarea>
        </div>
    </div>
    <div class="col">

        <div class="row">
            <div class="col-3 offset-5 mb-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
            </div>
            <div class="col-3 offset-5 mb-3">
                <button type="button" class="btn btn-warning btn-lg btn-block">Agregar</button>
            </div>
        </div>

    </div>
</div>

<table class="table table-striped table-warning">
    <thead>
        <tr class="bg-warning">
            <th scope="col">Descripción</th>
            <th scope="col">Monto</th>
            <th scope="col">Operación</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>des</td>
            <td>mont</td>
            <td>boton eliminar</td>
        </tr>
    </tbody>
</table>
<div class="row">
    <div class="col-3 offset-5">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Total de Mano de obra</span>
            </div>
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" readonly class="form-control" aria-label="Amount (to the nearest dollar)">
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>
    </div>
</div>

<!--VARIOS-->
**Varios**
<div class="row">
    <div class="col">input</div>
    <div class="col">monto <br> botón agregar</div>
</div>

titulotabla3
<table class="table table-striped table-warning">
    <thead>
        <tr class="bg-warning">
            <th scope="col">Descripción</th>
            <th scope="col">Monto</th>
            <th scope="col">Operación</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>des</td>
            <td>mont</td>
            <td>boton eliminar</td>
        </tr>
    </tbody>
</table>
<div class="row">
    <div class="col-3 offset-5">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Total Varios</span>
            </div>
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" readonly class="form-control" aria-label="Amount (to the nearest dollar)">
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>
    </div>
</div>

<!--TOTAL-->
**Total**
<div class="row">
    <div class="col">
        Total del proyecto<input type="number" name="" id="">
    </div>
    <div class="col">
        Mano de obra<input type="number"> <br>
        Materiales<input type="number"> <br>
        Varios<input type="number">

    </div>
</div>

@endsection
