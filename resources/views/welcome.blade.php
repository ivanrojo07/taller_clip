<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                color: white;
                text-decoration: none;
              } 
              a:hover{
                color: white;
                text-decoration: none;
              }

        .btn-secondary{
            background-color: #050554;
            color: white;
        }

        .btn-secondary:hover{
            background-color: #050554;
        }

        body {
          overflow-x: hidden;
        }

        #wrapper {
          padding-left: 0;
          -webkit-transition: all 0.5s ease;
          -moz-transition: all 0.5s ease;
          -o-transition: all 0.5s ease;
          transition: all 0.5s ease;
        }

        #wrapper.toggled {
          padding-left: 250px;
        }

        #sidebar-wrapper {
          z-index: 9000;
          position: fixed;
          left: 250px;
          width: 0;
          height: 100%;
          margin-left: -250px;
          overflow-y: auto;
          background: #000;
          -webkit-transition: all 0.5s ease;
          -moz-transition: all 0.5s ease;
          -o-transition: all 0.5s ease;
          transition: all 0.5s ease;
        }

        #wrapper.toggled #sidebar-wrapper {
          width: 250px;
        }

        #page-content-wrapper {
          width: 100%;
          position: absolute;
          padding: 15px;
        }

        #wrapper.toggled #page-content-wrapper {
          position: absolute;
          margin-right: -250px;
        }


        /* Sidebar Styles */

        .list-group-item{
         cursor: pointer;
         background-color: #050554;
         color: white;
        }
        .list-group-item:hover{
            background-color: #3f3fa3;
        }

        .sidebar-nav {
          position: absolute;
          top: 0;
          width: 250px;
          margin: 0;
          padding: 0;
          list-style: none;
        }

        .sidebar-nav li {
          text-indent: 20px;
          line-height: 40px;
        }

        .sidebar-nav li a {
          display: block;
          text-decoration: none;
          color: #999999;
        }

        .sidebar-nav li a:hover {
          text-decoration: none;
          color: #fff;
          background: rgba(255, 255, 255, 0.2);
        }

        .sidebar-nav li a:active, .sidebar-nav li a:focus {
          text-decoration: none;
        }

        .sidebar-nav>.sidebar-brand {
          height: 65px;
          font-size: 18px;
          line-height: 60px;
        }

        .sidebar-nav>.sidebar-brand a {
          color: #999999;
        }

        .sidebar-nav>.sidebar-brand a:hover {
          color: #fff;
          background: none;
        }

        @media(min-width:768px) {
          #wrapper {
            padding-left: 0;
          }
          #wrapper.toggled {
            padding-left: 250px;
          }
          #sidebar-wrapper {
            width: 0;
          }
          #wrapper.toggled #sidebar-wrapper {
            width: 250px;
          }
          #page-content-wrapper {
            padding: 20px;
            position: relative;
          }
          #wrapper.toggled #page-content-wrapper {
            position: relative;
            margin-right: 0;
          }
        }
    </style>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul id="coleccionde" class="list-group list-group-flush">
                <li class="list-group-item" data-toggle="collapse" data-target="#colapsado1" aria-expanded="false" aria-controls="collapseExample">
                    Clientes&nbsp<i class="fa fa-users" aria-hidden="true"></i>
                     <ul id="colapsado1"class="list-group collapse" data-parent="#coleccionde">
                        <a href="#" onclick="AgregarNuevoTab('{{ url('/clientes/create')}}','Agrega Cliente')"><li class="list-group-item">Alta&nbsp<i class="fa fa-user-plus" aria-hidden="true"></i></li></a>
                        <a href="{{ url('/clientes') }}"><li class="list-group-item">Búsqueda&nbsp<i class="fa fa-search" aria-hidden="true"></i></li></a>
                        <li class="list-group-item">
                            <div class="dropdown-toggle m-0 p-0" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Precargas&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> 
                            </div>
                            <div class="dropdown-menu m-0 p-0" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/giros') }}">Giros&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>
                                <a class="dropdown-item" href="{{ url('/formacontactos') }}">Forma Contactos&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>
                            </div>
                        </li>
                    </ul>
                 </li>
                 <li class="list-group-item" data-toggle="collapse" data-target="#colapsado2" aria-expanded="false" aria-controls="collapseExample">
                    Tipo de Cambio&nbsp<i class="fa fa-dollar" aria-hidden="true"></i>
                     <ul id="colapsado2"class="list-group collapse" data-parent="#coleccionde">
                        <a href="{{ url('/cambio/create') }}"><li class="list-group-item">Gestión de tipo de cambio&nbsp<i class="fa fa-dollar" aria-hidden="true"></i></li></a>
                    </ul>
                 </li>
                 <li class="list-group-item" data-toggle="collapse" data-target="#colapsado3" aria-expanded="false" aria-controls="collapseExample">
                    Materiales&nbsp<i class="fa fa-cubes" aria-hidden="true"></i>
                     <ul id="colapsado3"class="list-group collapse" data-parent="#coleccionde">
                        <a href="{{ url('/des_montaje/create/') }}"><li class="list-group-item">Montajes&nbsp<i class="fa fa-clone"></i></li></a>
                        <a href="{{ url('/des_proteccion/create/') }}"><li class="list-group-item">Protección&nbsp<i class="fa fa-object-group"></i></li></a>
                        <a href="{{ url('/des_marco/create/') }}"><li class="list-group-item">Marcos y Bastidores&nbsp<i class="fa fa-columns"></i></li></a>
                        <a href="{{ url('/des_maria/create/') }}"><li class="list-group-item">Maria Luisa&nbsp<i class="fa fa-image"></i></li></a>
                        <a href="{{ url('/des_generales/create/') }}"><li class="list-group-item">Generales&nbsp<i class="fa fa-paperclip"></i></li></a>
                    </ul>
                 </li>
                <li class="list-group-item" data-toggle="collapse" data-target="#colapsado4" aria-expanded="false" aria-controls="collapseExample">
                    Órdenes&nbsp<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                     <ul id="colapsado4" class="list-group collapse" data-parent="#coleccionde">
                        <a href="{{ url('producto/create') }}"><li class="list-group-item">Alta Manual&nbsp<i class="fa fa-plus"></i></li></a>
                        <a href="{{ url('historial_orden') }}"><li class="list-group-item">Historial órdenes&nbsp<i class="fa fa-plus"></i></li></a>
                        <a href="{{ url('productos')}}"><li class="list-group-item">Búsqueda&nbsp<i class="fa fa-search" aria-hidden="true"></i></li></a>
                    </ul>
                </li>
                <li class="list-group-item" data-toggle="collapse" data-target="#colapsado5" aria-expanded="false" aria-controls="collapseExample">
                    Recursos Humanos&nbsp<i class="fa fa-briefcase" aria-hidden="true"></i>
                     <ul id="colapsado5" class="list-group collapse" data-parent="#coleccionde">
                        <a href="{{url('empleados/create')}}"><li class="list-group-item">Alta&nbsp<i class="fa fa-plus"></i></li></a>
                        <a href="{{ url('empleados') }}"><li class="list-group-item">Búsqueda&nbsp<i class="fa fa-search" aria-hidden="true"></i></li></a>
                        <li class="list-group-item">
                            <div class="dropdown-toggle m-0 p-0" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Precargas&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> 
                            </div>
                            <div class="dropdown-menu m-0 p-0" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('bajas') }}">Bajas&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>
                                <a class="dropdown-item" href="{{ url('contratos') }}">Contratos&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>
                                <a class="dropdown-item" href="{{ url('/areas') }}">Precargas Áreas&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>
                                <a class="dropdown-item" href="{{ url('/puestos') }}">Precargas Puestos&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>
                                <a class="dropdown-item" href="{{ url('/bancos') }}">Precargas Bancos&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>
                                <a class="dropdown-item" href="{{ url('/faltas') }}">Precargas Faltas&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="list-group-item" data-toggle="collapse" data-target="#colapsado6" aria-expanded="false" aria-controls="collapseExample">
                    Proveedores&nbsp<i class="fa fa-users" aria-hidden="true"></i>
                     <ul id="colapsado6" class="list-group collapse" data-parent="#coleccionde">
                        <a href="{{ url('/provedores/create')}}"><li class="list-group-item">Alta&nbsp<i class="fa fa-user-plus" aria-hidden="true"></i></li></a>
                        <a href="{{ url('/provedores') }}"><li class="list-group-item">Búsqueda&nbsp<i class="fa fa-search" aria-hidden="true"></i></li></a>
                        <li class="list-group-item">
                            <div class="dropdown-toggle m-0 p-0" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Precargas&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> 
                            </div>
                            <div class="dropdown-menu m-0 p-0" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/giros') }}">Giros&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>
                                <a class="dropdown-item" href="{{ url('/formacontactos') }}">Forma Contactos&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>
                                <a class="dropdown-item" href="{{ url('/bancos') }}">Precargas Bancos&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="list-group-item" data-toggle="collapse" data-target="#colapsado7" aria-expanded="false" aria-controls="collapseExample">
                    Cotización&nbsp<i class="fa fa-dollar" aria-hidden="true"></i>
                     <ul id="colapsado7" class="list-group collapse" data-parent="#coleccionde">
                        <a href="{{ url('/historial_cotizacion/') }}"><li class="list-group-item">Historial</li></al>
                    </ul>
                </li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle"><i class="fa fa-list-ul" style="font-size:36px;"></i></a>
            </div>
            
        </div>
                <div class="container">
                    <ul id="tabsApp" class="nav nav-tabs"></ul>
                    <div style="width: 100%; height: 100%;" id="contenedortab" class="tab-content"></div>
                    
                </div>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

    <script src="{{ asset('js/pestanas.js') }}"></script>
    <script src="{{ asset('js/forms.js') }}"></script>

</body>

</html>








