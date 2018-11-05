<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .fixed-top2{
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
    }
    </style>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</head>

<body>
    <style>
              a{
                color: black;
                text-decoration: none;
              } 
              a:hover{
                color: black;
                text-decoration: none;
              }
              li{
                  cursor:pointer;
              }

              li.list-group-item:hover{
                  background-color:#00000008;
              }
      
              .card-header.active {
                    background-color: #22178D;
                    color: white;
                }
    

        #frameg{
            width: 100%;
            height: 380%;
            z-index: unset;
        }
        
    </style>

    <div class="container-fluid" style="overflow-y: hidden;">
        <div class="row">
            <div class="col-3 fixed-top2" id="acoreond">

                @auth
                <!-- LOGIN -->
                <div class="row my-2">
                    <div class="col">
                        <div class="card">
                            <div id="clase8" class="card-header nave" data-toggle="collapse" data-target="#collapseExample8">
                                <p class="mb-0" style="float: left;">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="mb-0" style="float: right;"><i class="fa fa-angle-double-down"></i></p>
                            </div>
                            <ul id="collapseExample8" class="list-group list-group-flush collapse" data-parent="#acoreond">
                                <li class="list-group-item">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- SEGURIDAD -->
                @foreach(Auth::user()->perfil->modulos as $modulo)
                @if($modulo->nombre == "seguridad")
                <div class="row my-2">
                    <div class="col">
                        <div class="card">
                            <div id="clase9" class="card-header nave" data-toggle="collapse" data-target="#collapseExample9">
                                <p class="mb-0" style="float: left;">Seguridad&nbsp<i class="fa fa-lock" aria-hidden="true"></i></p>
                                <p class="mb-0" style="float: right;"><i class="fa fa-angle-double-down"></i></p>
                            </div>
                            <ul id="collapseExample9" class="list-group list-group-flush collapse" data-parent="#acoreond">
                                <a class="nave9" target="frame1" href="{{ url('perfil')}}">
                                    <li class="list-group-item">
                                        Perfiles&nbsp<i class="fa fa-universal-access" aria-hidden="true"></i>
                                    </li>
                                </a>
                                <a class="nave9" target="frame1" href="{{ url('usuario') }}">
                                    <li class="list-group-item">
                                        Usuarios&nbsp<i class="fa fa-user-circle" aria-hidden="true"></i>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <!--Clientes-->
                @foreach(Auth::user()->perfil->modulos as $modulo)
                @if($modulo->nombre == "clientes")
                <div class="row my-2">
                    <div class="col">
                        <div class="card">
                            <div id="clase6" class="card-header  nave" data-toggle="collapse" data-target="#collapseExample6">
                                <p class="mb-0" style="float: left;">Clientes&nbsp<i class="fa fa-users" aria-hidden="true"></i></p>
                                <p class="mb-0" style="float: right;"><i class="fa fa-angle-double-down"></i></p>
                            </div>
                            <ul id="collapseExample6" class="list-group list-group-flush collapse" data-parent="#acoreond">
                                <a class="nave6" target="frame1" href="{{ url('/clientes/create')}}"><li class="list-group-item">Alta&nbsp<i class="fa fa-user-plus" aria-hidden="true"></i></li></a>
                                <a class="nave6" target="frame1" href="{{ url('/clientes') }}"><li class="list-group-item">Búsqueda&nbsp<i class="fa fa-search" aria-hidden="true"></i></li></a>
                                <li class="list-group-item dropright" style="z-index: 999999;">
                                    <div class="dropdown-toggle m-0 p-0" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Precargas&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> 
                                    </div>
                                    <div class="dropdown-menu m-0 p-0 nave6" aria-labelledby="dropdownMenuButton">
                                         <a class="nave6" class="dropdown-item" target="frame1" href="{{ url('/formacontactos') }}">Forma Contactos&nbsp<i class="fa fa-refresh" aria-hidden="true"></i></a><br>
                                        <!--<a class="nave6" class="dropdown-item" target="frame1" href="{{ url('/bancos') }}">Precargas Bancos&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>-->
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- --------------- -->
                <div class="row my-2">
                    <div class="col">
                        <div class="card">
                            <div id="clase10" class="card-header  nave" data-toggle="collapse" data-target="#collapseExample10">
                                <p class="mb-0" style="float: left;">CRM&nbsp<i class="fa fa-calendar" aria-hidden="true"></i></p>
                                <p class="mb-0" style="float: right;"><i class="fa fa-angle-double-down"></i></p>
                            </div>
                            <ul id="collapseExample10" class="list-group list-group-flush collapse" data-parent="#acoreond">
                                <a class="nave10" target="frame1" href="{{ url('/crm/create')}}"><li class="list-group-item">CRMS&nbsp<i class="fa fa-user-plus" aria-hidden="true"></i></li></a>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <!--RH-->
                @foreach(Auth::user()->perfil->modulos as $modulo)
                @if($modulo->nombre == "rh")
                <div class="row my-2">
                    <div class="col">
                        <div class="card">
                            <div id="clase5" class="card-header nave" data-toggle="collapse" data-target="#collapseExample5">
                                <p class="mb-0" style="float: left;">Recursos Humanos&nbsp<i class="fa fa-briefcase" aria-hidden="true"></i></p>
                                <p class="mb-0" style="float: right;"><i class="fa fa-angle-double-down"></i></p>
                            </div>
                            <ul id="collapseExample5" class="list-group list-group-flush collapse" data-parent="#acoreond">
                                <a class="nave5" target="frame1" href="{{url('empleados/create')}}"><li class="list-group-item">Alta&nbsp<i class="fa fa-plus"></i></li></a>
                                <a class="nave5" target="frame1" href="{{ url('empleados') }}"><li class="list-group-item">Búsqueda&nbsp<i class="fa fa-search" aria-hidden="true"></i></li></a>
                                <li class="list-group-item dropright" style="z-index: 999999;">
                                    <div class="dropdown-toggle m-0 p-0" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Precargas&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> 
                                    </div>
                                    <div class="dropdown-menu m-0 p-0 nave5" aria-labelledby="dropdownMenuButton">
                                        <a class="nave5" target="frame1" class="dropdown-item" href="{{ url('bajas') }}">Bajas&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a><br>
                                        <a class="nave5" target="frame1" class="dropdown-item" href="{{ url('contratos') }}">Contratos&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a><br>
                                        <a class="nave5" target="frame1" class="dropdown-item" href="{{ url('/areas') }}">Precargas Áreas&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a><br>
                                        <a class="nave5" target="frame1" class="dropdown-item" href="{{ url('/puestos') }}">Precargas Puestos&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a><br>
                                        <a class="nave5" target="frame1" class="dropdown-item" href="{{ url('/bancos') }}">Precargas Bancos&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a><br>
                                        <a class="nave5" target="frame1" class="dropdown-item" href="{{ url('/faltas') }}">Precargas Faltas&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <!--Materiales-->
                @foreach(Auth::user()->perfil->modulos as $modulo)
                @if($modulo->nombre == "materiales")
                <div class="row my-2">
                    <div class="col">
                        <div class="card">
                            <div id="clase3" class="card-header nave" data-toggle="collapse" data-target="#collapseExample3">
                                <p class="mb-0" style="float: left;">Materiales&nbsp<i class="fa fa-cubes"></i></p>
                                <p class="mb-0" style="float: right;"><i class="fa fa-angle-double-down"></i></p>
                            </div>
                            <ul id="collapseExample3" class="list-group list-group-flush collapse" data-parent="#acoreond">
                                <a class="nave3" target="frame1" href="{{ url('material') }}"><li class="list-group-item">Materiales&nbsp<i class="fa fa-clone"></i></li></a>
                                <a class="nave3" target="frame1" href="{{ url('/material/create/') }}"><li class="list-group-item">Crear material&nbsp<i class="fa fa-object-group"></i></li></a>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <!--Obras-->
                @foreach(Auth::user()->perfil->modulos as $modulo)
                @if($modulo->nombre == "obras")
                <div class="row my-2">
                    <div class="col">
                        <div class="card">
                            <div id="clase3" class="card-header nave" data-toggle="collapse" data-target="#obras">
                                <p class="mb-0" style="float: left;">Obras&nbsp<i class="fa fa-cubes"></i></p>
                                <p class="mb-0" style="float: right;"><i class="fa fa-angle-double-down"></i></p>
                            </div>
                            <ul id="obras" class="list-group list-group-flush collapse" data-parent="#acoreond">
                                <a class="nave3" target="frame1" href="{{ url('obra') }}"><li class="list-group-item">Obras&nbsp<i class="fa fa-clone"></i></li></a>
                                <a class="nave3" target="frame1" href="{{ url('/obra/create/') }}"><li class="list-group-item">Crear obra&nbsp<i class="fa fa-object-group"></i></li></a>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <!--Órdenes-->
                @foreach(Auth::user()->perfil->modulos as $modulo)
                @if($modulo->nombre == "ordenes")
                <div class="row my-2">
                    <div class="col">
                        <div class="card">
                            <div id="clase4" class="card-header nave" data-toggle="collapse" data-target="#collapseExample4">
                                <p class="mb-0" style="float: left;">Órdenes&nbsp<i class="fa fa-shopping-cart" aria-hidden="true"></i></p>
                                <p class="mb-0" style="float: right;"><i class="fa fa-angle-double-down"></i></p>
                            </div>
                            <ul id="collapseExample4" class="list-group list-group-flush collapse" data-parent="#acoreond">
                                <a class="nave4" target="frame1" href="{{ url('/orden/create') }}"><li class="list-group-item">Generar orden&nbsp<i class="fa fa-plus"></i></li></a>
                                    <a class="nave4" target="frame1" href="{{ url('/orden') }}"><li class="list-group-item">Historial órdenes&nbsp<i class="fa fa-plus"></i></li></a>
                                    <!--<a class="nave4" target="frame1" href="{{ url('productos')}}"><li class="list-group-item">Búsqueda&nbsp<i class="fa fa-search" aria-hidden="true"></i></li></a>-->
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <!--Cotización-->
                @foreach(Auth::user()->perfil->modulos as $modulo)
                @if($modulo->nombre == "cotizacion")
                <div class="row my-2">
                    <div class="col">
                        <div class="card">
                            <div id="clase7" class="card-header nave" data-toggle="collapse" data-target="#collapseExample7">
                                <p class="mb-0" style="float: left;">Cotización&nbsp<i class="fa fa-dollar" aria-hidden="true"></i></p>
                                <p class="mb-0" style="float: right;"><i class="fa fa-angle-double-down"></i></p>
                            </div>
                            <ul id="collapseExample7" class="list-group list-group-flush collapse" data-parent="#acoreond">
                                <a class="nave7" target="frame1" href="{{ route('cotizacion.create') }}"><li class="list-group-item">Cotizar</li></a>
                                <a class="nave7" target="frame1" href="{{ route('cotizacion.index') }}"><li class="list-group-item">Historial</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <!--Proveedores-->
                @foreach(Auth::user()->perfil->modulos as $modulo)
                @if($modulo->nombre == "proveedores")
                <div class="row my-2">
                    <div class="col">
                        <div class="card">
                            <div id="clase1" class="card-header nave" data-toggle="collapse" data-target="#collapseExample1">
                                <p class="mb-0" style="float: left;">Proveedores&nbsp<i class="fa fa-users"></i></p>
                                <p class="mb-0" style="float: right;"><i class="fa fa-angle-double-down"></i></p>
                            </div>
                            <ul id="collapseExample1" class="list-group list-group-flush collapse" data-parent="#acoreond">
                                <a class="nave1" target="frame1" href="{{ url('/proveedores/create')}}"><li class="list-group-item">Alta&nbsp<i class="fa fa-user-plus" aria-hidden="true"></i></li></a>
                                <a class="nave1" target="frame1" href="{{ url('/proveedores') }}"><li class="list-group-item">Búsqueda&nbsp<i class="fa fa-search" aria-hidden="true"></i></li></a>
                                <li class="list-group-item dropright" style="z-index: 999999;">
                                    <div class="dropdown-toggle m-0 p-0" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Precargas&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> 
                                    </div>
                                    <div class="dropdown-menu m-0 p-0 nave1" aria-labelledby="dropdownMenuButton">
                                        <a class="nave6" class="dropdown-item" target="frame1" href="{{ url('/giros') }}">Giros&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a><br>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <!--Tipo de cambio-->
                @foreach(Auth::user()->perfil->modulos as $modulo)
                @if($modulo->nombre == "cambio")
                <div class="row my-2">
                    <div class="col">
                        <div class="card">
                            <div id="clase2" class="card-header nave" data-toggle="collapse" data-target="#collapseExample2">
                                <p class="mb-0" style="float: left;">Tipo de Cambio&nbsp<i class="fa fa-dollar"></i></p>
                                <p class="mb-0" style="float: right;"><i class="fa fa-angle-double-down"></i></p>
                            </div>
                            <ul id="collapseExample2" class="list-group list-group-flush collapse" data-parent="#acoreond">
                                <a class="nave2" target="frame1" href="{{ url('/cambio/create') }}"><li class="list-group-item">Gestión de tipo de cambio&nbsp<i class="fa fa-dollar" aria-hidden="true"></i></li></a>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endauth
            
            </div>

            <div class="offset-3 col-9 fixed-top">
                <div class="row">
                    <div class="col-12 mb-2">
                        <img src="{{asset('img/header.jpg')}}" class="img-fluid" alt="Clip Taller.">
                    </div>
                    <div class="col-12">
                        <iframe id="frameg" name="frame1" src=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.nave1').click(function(e){
            $('.nave').removeClass("active");
            $('#clase1').addClass("active");
        });
        $('.nave2').click(function(e){
            $('.nave').removeClass("active");
            $('#clase2').addClass("active");
        });
        $('.nave3').click(function(e){
            $('.nave').removeClass("active");
            $('#clase3').addClass("active");
        });
        $('.nave4').click(function(e){
            $('.nave').removeClass("active");
            $('#clase4').addClass("active");
        });
        $('.nave5').click(function(e){
            $('.nave').removeClass("active");
            $('#clase5').addClass("active");
        });
        $('.nave6').click(function(e){
            $('.nave').removeClass("active");
            $('#clase6').addClass("active");
        });
        $('.nave7').click(function(e){
            $('.nave').removeClass("active");
            $('#clase7').addClass("active");
        });
        $('.nave8').click(function(e){
            $('.nave').removeClass("active");
            $('#clase8').addClass("active");
        });
        $('.nave9').click(function(e){
            $('.nave').removeClass("active");
            $('#clase9').addClass("active");
        });
        $('.nave10').click(function(e){
            $('.nave').removeClass("active");
            $('#clase10').addClass("active");
        });
    </script>



    <script src="{{ asset('js/pestanas.js') }}"></script>
    <script src="{{ asset('js/forms.js') }}"></script>

</body>

</html>








