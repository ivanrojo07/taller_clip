@extends('layouts.cotizacion')
@section('content')

<!--CLIENTE-->
<div class="container">
<div class="row mt-3">
        <div class="col-4">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Clientes</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>elegir...</option>
                    <option value="1">cliente1</option>
                    <option value="2">cliente2</option>
                    <option value="3">cliente3</option>
                </select>
            </div>

        </div>
        <div class="col-8">
    
    <table class="table">
        <thead>
            <tr class="bg-primary">
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Datos1</th>
                <th scope="col">Datos2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>1</td>
                <td>2</td>
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
            <label for="moneda">Tipo de Cambio</label>
            <input type="text" class="form-control" id="cambio">
        </div>
        <div class="form-group col-4">
            <label for="proyecto">Nombre Proyecto</label>
            <input type="text" class="form-control" id="proyecto">
        </div>
        <div class="form-group col-4">
            <label for="fechaEntrega">Fecha de entrega</label>
            <input type="date" class="form-control" id="fechaEntrega">
        </div>
    </div>
    <hr>
    <!--MATERIALES-->
    <h1>Materiales</h4>
    <table class="table">
        <thead>
            <tr class="bg-primary">
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
            </div>
        </div>
    </div>
    <hr>
    <!--MANO DE OBRA-->
    <h1>Mano de Obra</h1>
    <div class="row mb-3">
        <div class="col-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Descripción</span>
                </div>
                <textarea class="form-control" aria-label="With textarea" style="resize: none;"></textarea>
            </div>
        </div>
        <div class="col-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Monto: $</span>
                </div>
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary btn-lg btn-block">Agregar</button>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr class="bg-primary">
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
        <div class="col-4 offset-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Total de Mano de obra</span>
                </div>
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" readonly class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>
        </div>
    </div>
    <hr>
    <!--VARIOS-->
    <h1>Varios</h1>
    <div class="row mb-3">
        <div class="col-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Descripción</span>
                </div>
                <textarea class="form-control" aria-label="With textarea" style="resize: none;"></textarea>
            </div>
        </div>
        <div class="col-2">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Monto: $</span>
                </div>
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary btn-lg btn-block">Agregar</button>
        </div>    
    </div>

    <table class="table">
        <thead>
            <tr class="bg-primary">
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
        <div class="col-4 offset-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Total Varios</span>
                </div>
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" readonly class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>
        </div>
    </div>
    <hr>
    <!--TOTAL-->
    <h1>Total de Gastos</h1>
    <div class="row">
        <div class="col-3 offset-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Total del proyecto</span>
                </div>
                <input type="text" readonly class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">USD</span>
                </div>
                <input type="number" readonly class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Mano de Obra</span>
                </div>
                <input type="text" readonly class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Materiales</span>
                </div>
                <input type="text" readonly class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Varios</span>
                </div>
                <input type="text" readonly class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
        </div>
    </div>
</div>


@endsection
