<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <script href="{{ asset('js/jquery-3.2.1.min.js') }}"></script> --}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

     <!-- Custom Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    {{-- <link href="{{asset('font-awesome5.0.1/css/fontawesome.min.css')}}" rel="stylesheet" type="text/css"> --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/peticion.js') }}"></script>
    
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
  z-index: 1000;
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
    </head>
    <body>

<!-- Navigation -->
<div id="app"> 
    <nav class="navbar navbar-default navbar-static-top" style="background-color: black;">  
        <div class="container topnav" >
          <div class="row" align="right" style="color: white;text-shadow: 2px 2px #000000;height: 0px;"><h1>{{date('d-m-Y')}}</h1></div>
            {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

             


                    {{--  Clientes  --}}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> Clientes<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#" onclick="AgregarNuevoTab('{{ url('/clientes/create')}}','Agrega Cliente')"><i class="fa fa-user-plus" aria-hidden="true"></i> Alta</a>
                                <a href="#" onclick="AgregarNuevoTab('{{ url('/clientes') }}','Buscar Cliente')"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>


                               
                                 <li class="dropdown-submenu">
                                <a tabindex="-1" 
                                   href="#">
                                   <i class="fa fa-refresh" 
                                      aria-hidden="true"></i> 
                                  Precargas:</a>
                                    <ul class="dropdown-menu">
                                      <li>
                                        <a href="#" 
                                           onclick="AgregarNuevoTab('{{ url('/giros') }}','Giros')">
                                           <i class="fa fa-refresh" aria-hidden="true"></i> 
                                       Giros</a></li>

                                      <li><a href="#" 
                                             onclick="AgregarNuevoTab('{{ url('/formacontactos') }}','Forma de Contacto')">
                                             <i class="fa fa-refresh" aria-hidden="true"></i>Forma Contactos</a></li>
                                    </ul>
                                  </li>
                                </li>
                              </ul>
                            </li>
                    {{--  Clientes  --}}


                    {{--  Tipo de Cambio  --}}
                       <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-dollar" aria-hidden="true"></i> Tipo de Cambio <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                        <a href="#" onclick="AgregarNuevoTab('{{ url('/cambio/create') }}','Tipo de Cambio')">
                                   <i class="fa fa-refresh" aria-hidden="true"></i>Gestión de Tipo de Cambio</a>  

                            </li>                     
                        </ul>
                    </li> 
                    {{--  Tipo de Cambio  --}}

                    {{--  Materiales  --}}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cubes" aria-hidden="true"></i>Materiales<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                               <li class="dropdown-submenu">
                                <a tabindex="-1" href="#" onclick="AgregarNuevoTab('{{ url('/des_montaje/create/') }}','Montajes')"><i class="fa fa-clone"></i>
                                   Montajes</a>
                              </li>
                                   <li class="dropdown-submenu">
                                <a tabindex="-1" href="#" onclick="AgregarNuevoTab('{{ url('/des_proteccion/create/') }}','Protecciónes')"><i class="fa fa-object-group"></i>
                                    Protección</a> 
                                   </li>
                                   <li class="dropdown-submenu">
                                <a tabindex="-1" href="#" onclick="AgregarNuevoTab('{{ url('/des_marco/create/') }}','Marcos y Bastidores')"><i class="fa fa-columns"></i>
                                    Marcos y Bastidores</a> 
                                   </li>
                                   <li class="dropdown-submenu">
                                <a tabindex="-1" href="#" onclick="AgregarNuevoTab('{{ url('/des_maria/create/') }}','María Luisa')"><i class="fa fa-image"></i>
                                    María Luisa</a>
                                  </li>
                                  <li class="dropdown-submenu">
                                <a tabindex="-1" href="#" onclick="AgregarNuevoTab('{{ url('/des_generales/create/') }}','Materiales Generales')"><i class="fa fa-paperclip"></i>
                                    Generales</a>
                                   </li>



                            </li>                     
                        </ul>
                    </li>
                    {{--  Materiales  --}}
                    
                    
                    <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Órdenes <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('producto/create') }}','Alta Manual')"><i class="fa fa-plus" aria-hidden="true"></i> Alta Manual</a>

                                   <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('historial_orden') }}','Historial órdenes')"><i class="fa fa-plus" aria-hidden="true"></i>Historial órdenes</a>

                                <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('productos') }}','Buqueda de Productos')">
                                   <i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>  

                            </li>                     
                        </ul>
                    </li> 

                    

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-briefcase" aria-hidden="true"></i> Recursos Humanos <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#" onclick="AgregarNuevoTab('{{url('empleados/create')}}','Nuevo Empleado')"><i class="fa fa-plus" aria-hidden="true"></i> Alta</a>
                                <a href="#" onclick="AgregarNuevoTab('{{ url('empleados') }}','Buscar Empleado')"><i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>

                               

                                {{--  <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('/sucursales')}}','Sucursales')">
                            <i class="fa fa-university" aria-hidden="true"></i> Sucursales
                                </a>

                                <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('/bonos')}}','Bonos')">
                            <i class="fa fa-gift" aria-hidden="true"></i> Bonos
                                </a>

                                 <a href="#"
                                   onclick="AgregarNuevoTab('{{ url('/comision')}}','Comisiones')">
                            <i class="fa fa-money" aria-hidden="true"></i> Comisiones
                                </a>   --}}

                                 

                                <li class="dropdown-submenu">
                                <a tabindex="-1" href="#"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas:</a>
                                    <ul class="dropdown-menu">
                                      <li><a tabindex="-1" href="#" onclick="AgregarNuevoTab('{{ url('bajas') }}','Bajas')"><i class="fa fa-refresh" aria-hidden="true"></i> Bajas</a></li>
                                      <li><a href="#" onclick="AgregarNuevoTab('{{ url('contratos') }}','Contratos')"><i class="fa fa-refresh" aria-hidden="true"></i> Contratos</a></li>
                                      <li>
                                         <a href="#" onclick="AgregarNuevoTab('{{ url('/areas') }}','Areas')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Areas</a>
                                        </li>
                                        <li>
                                          <a href="#" onclick="AgregarNuevoTab('{{ url('/puestos') }}','Puestos')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Puestos</a>
                                        </li>
                                         <li>
                                         <a href="#" onclick="AgregarNuevoTab('{{ url('/bancos') }}','Bancos')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Bancos</a>
                                        </li>
                                          <li>
                                         <a href="#" onclick="AgregarNuevoTab('{{ url('/faltas') }}','Faltas')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Faltas</a>
                                        </li>
                                    </ul>
                                  </li>
                            </li>                     
                        </ul>
                    </li>



                         <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> Proveedores<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#" onclick="AgregarNuevoTab('{{ url('/provedores/create')}}','Agrega Proveedor')"><i class="fa fa-user-plus" aria-hidden="true"></i> Alta</a>

                                <a href="#" 
                                onclick="AgregarNuevoTab('{{ url('/provedores') }}','Buscar Proveedor')">
                                <i class="fa fa-search" aria-hidden="true"></i> Busqueda</a>


                            <li class="dropdown-submenu">
                                <a tabindex="-1" 
                                   href="#">
                                   <i class="fa fa-refresh" 
                                      aria-hidden="true"></i> 
                                  Precargas:</a>
                                    <ul class="dropdown-menu">
                                      <li>
                                        <a href="#" 
                                           onclick="AgregarNuevoTab('{{ url('/giros') }}','Giros')">
                                           <i class="fa fa-refresh" aria-hidden="true"></i> 
                                       Giros</a></li>

                                      <li><a href="#" 
                                             onclick="AgregarNuevoTab('{{ url('/formacontactos') }}','Forma de Contacto')">
                                             <i class="fa fa-refresh" aria-hidden="true"></i>Forma Contactos</a></li>
                                              <li>
                                         <a href="#" onclick="AgregarNuevoTab('{{ url('/bancos') }}','Bancos')"><i class="fa fa-refresh" aria-hidden="true"></i> Precargas Bancos</a>
                                        </li>
                                    </ul>
                                  </li>



                            </li>                     
                        </ul>
                    </li>



                    {{--COTIZACIÓN--}}
                    <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-dollar" aria-hidden="true"></i>Cotización<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                        <a href="#" onclick="AgregarNuevoTab('{{ url('/historial_cotizacion/') }}','Cotización')">
                                   <i class="fa fa-refresh" aria-hidden="true"></i>Historial</a>  

                            </li>                     
                        </ul> 
                      </li>
                    </ul>
            </div>
           </div>
    </nav>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul id="coleccionde" class="list-group list-group-flush">
    <li class="list-group-item" data-toggle="collapse" data-target="#colapsado1" aria-expanded="false" aria-controls="collapseExample">
        Clientes&nbsp<i class="fa fa-users" aria-hidden="true"></i>
         <ul id="colapsado1"class="list-group collapse" data-parent="#coleccionde">
            <a href="{{ url('/clientes/create')}}"><li class="list-group-item">Alta&nbsp<i class="fa fa-user-plus" aria-hidden="true"></i></li></a>
            <a href="{{ url('/clientes') }}"></a><li class="list-group-item">Búsqueda&nbsp<i class="fa fa-search" aria-hidden="true"></i></li></a>
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
            <a href="{{ url('/cambio/create') }}"></a><li class="list-group-item">Gestión de tipo de cambio&nbsp<i class="fa fa-dollar" aria-hidden="true"></i></li></a>
        </ul>
     </li>
     <li class="list-group-item" data-toggle="collapse" data-target="#colapsado3" aria-expanded="false" aria-controls="collapseExample">
        Materiales&nbsp<i class="fa fa-cubes" aria-hidden="true"></i>
         <ul id="colapsado3"class="list-group collapse" data-parent="#coleccionde">
            <a href="{{ url('/des_montaje/create/') }}"></a><li class="list-group-item">Montajes&nbsp<i class="fa fa-clone"></i></li></a>
            <a href="{{ url('/des_proteccion/create/') }}"></a><li class="list-group-item">Protección&nbsp<i class="fa fa-object-group"></i></li></a>
            <a href="{{ url('/des_marco/create/') }}"></a><li class="list-group-item">Marcos y Bastidores&nbsp<i class="fa fa-columns"></i></li></a>
            <a href="{{ url('/des_maria/create/') }}"></a><li class="list-group-item">Maria Luisa&nbsp<i class="fa fa-image"></i></li></a>
            <a href="{{ url('/des_generales/create/') }}"></a><li class="list-group-item">Generales&nbsp<i class="fa fa-paperclip"></i></li></a>
        </ul>
     </li>
    <li class="list-group-item" data-toggle="collapse" data-target="#colapsado4" aria-expanded="false" aria-controls="collapseExample">
        Órdenes&nbsp<i class="fa fa-shopping-cart" aria-hidden="true"></i>
         <ul id="colapsado4" class="list-group collapse" data-parent="#coleccionde">
            <a href="{{ url('producto/create') }}"></a><li class="list-group-item">Alta Manual&nbsp<i class="fa fa-plus"></i></li></a>
            <a href="{{ url('historial_orden') }}"></a><li class="list-group-item">Historial órdenes&nbsp<i class="fa fa-plus"></i></li></a>
            <a href="{{ url('productos')}}"></a><li class="list-group-item">Búsqueda&nbsp<i class="fa fa-search" aria-hidden="true"></i></li></a>
        </ul>
    </li>
    <li class="list-group-item" data-toggle="collapse" data-target="#colapsado5" aria-expanded="false" aria-controls="collapseExample">
        Recursos Humanos&nbsp<i class="fa fa-briefcase" aria-hidden="true"></i>
         <ul id="colapsado5" class="list-group collapse" data-parent="#coleccionde">
            <a href="{{url('empleados/create')}}"></a><li class="list-group-item">Alta&nbsp<i class="fa fa-plus"></i></li></a>
            <a href="{{ url('empleados') }}"></a><li class="list-group-item">Búsqueda&nbsp<i class="fa fa-search" aria-hidden="true"></i></li></a>
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
            <a href="{{ url('/provedores/create')}}"></a><li class="list-group-item">Alta&nbsp<i class="fa fa-user-plus" aria-hidden="true"></i></li></a>
            <a href="{{ url('/provedores') }}"></a><li class="list-group-item">Búsqueda&nbsp<i class="fa fa-search" aria-hidden="true"></i></li></a>
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
            <a href="{{ url('/historial_cotizacion/') }}"></a><li class="list-group-item">Historial</li></al>
        </ul>
    </li>
</ul>
        </div>
    <div class="container" style="width: 100%; height: 100%;">
        <ul id="tabsApp" class="nav nav-tabs"></ul>
        <div id="contenedortab" class="tab-content"></div>
        
    </div>
</div>
    </body>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/pestanas.js') }}"></script>
    <script src="{{ asset('js/forms.js') }}"></script>
    <script>
    $(document).ready(function(){
      $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });
    });
    </script>
</html>