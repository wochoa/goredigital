<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('titpage')</title>
  <link rel="icon" type="image/png" href="{{ asset('dist/img/favicon.png') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <link rel="stylesheet" href="{{ asset('dist/css/stylo.css') }}">
  @livewireStyles

</head>
<body class="sidebar-mini layout-fixed  text-sm accent-lightblue {{ Auth::user()->darkmode }}">
  {{-- PONEMOS IMAGEN POR DEFECTO PARA EL AVATAR --}}
  @if(Auth::user()->avatar)
    @php
      $avatar=Storage::url(Auth::user()->avatar)
    @endphp
  @else
    @php
      //$avatar=asset('dist/img/avatar.png');
      $avatar=Storage::url('avatar/avatar.png')
    @endphp
  @endif
  {{-- FINALIZAMOS LA IMAGEN DE AVATAR --}}

<div class="wrapper">
@php
  $navbar=Auth::user()->darkmode;//navbar-info
  if(Auth::user()->darkmode)
  {
    $foondonavbar='';
  }
  else {
    $foondonavbar='navbar-gray';
  }
@endphp
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand border-bottom-0 navbar-dark {{ $foondonavbar }}">{{-- Auth::user()->navbar --}}
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-link">
        Bienevenido, {{ Auth::user()->name }}
      </li> --}}
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Escriba sugerencias</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> --}}
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> --}}
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">


              <!-- Message Start -->
              <div class="media">
                
                <img src="{{ $avatar }}?'" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    {{ Auth::user()->adm_name }}
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">{{ Auth::user()->adm_correo }}</p>
                  {{-- <p class="text-sm"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> --}}

                  {{-- <p class="text-sm"><i class="fa fa-cog"></i>  Configuracion de cuenta</p> --}}
                  
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-sm p-2" href="{{ route('configcuenta') }}"><i class="fa fa-cog"></i> Configuracion de cuenta</a>
            {{-- <a href="#" class="dropdown-item dropdown-footer">Cerrar sesion</a> --}}
            <a class="dropdown-item dropdown-footer p-1" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Cerrar sesion') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li>
      @livewire('fondo')
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GoreDigital</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ $avatar}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->adm_name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar..." aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-flat nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('main') }}" class="nav-link {{ activo('main') }}">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Bashboard
                  </p>
                </a>
              </li>

          <li class="nav-item {{ menuopen(['ticket','misticket','reporteetnciones'])}}">
            <a href="#" class="nav-link {{ tituloactivo(['ticket','misticket','reporteetnciones']) }}">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Ticket atencion
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('Pagina_crearticket')
              <li class="nav-item">
                <a href="{{ route('ticket') }}" class="nav-link {{ activo('ticket') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Ticket</p>
                </a>
              </li>
              @endcan
              @can('Pagina_misticket')
              <li class="nav-item">
                <a href="{{ route('misticket') }}" class="nav-link {{ activo('misticket') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mis Tickets</p>
                </a>
              </li>
              @endcan
              @can('Pagina_reporteticket')
              <li class="nav-item">
                <a href="{{ route('reporteetnciones') }}" class="nav-link {{ activo('reporteetnciones') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte atenciones</p>
                </a>
              </li>
              @endcan
              
            </ul>
          </li>
          {{-- .............. --}}
          @can('pagina_pad')
          <li class="nav-item {{ menuopen(['regdenuncia','controlexpedientes','reporteexpediente'])}}">
            <a href="#" class="nav-link {{ tituloactivo(['regdenuncia','controlexpedientes','reporteexpediente']) }}">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Sistema PAD
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('pagina_regexpediente')
              <li class="nav-item">
                <a href="{{ route('regdenuncia') }}" class="nav-link {{ activo('regdenuncia') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registro expediente</p>
                </a>
              </li>
              @endcan
              @can('pagina_controlexpedeinte')
              <li class="nav-item">
                <a href="{{ route('controlexpedientes') }}" class="nav-link {{ activo('controlexpedientes') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Control Expediente</p>
                </a>
              </li>
              @endcan
              @can('pagina_reporteexpediente')
              <li class="nav-item">
                <a href="{{ route('reporteexpediente') }}" class="nav-link {{ activo('reporteexpediente') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte control expediente</p>
                </a>
              </li>
              @endcan
              
            </ul>
          </li>
          @endcan
          {{-- .............. --}}
          @can('Pagina_chat')
          <li class="nav-item">
            <a href="{{ route('chat') }}" class="nav-link" {{ activo('chat') }}>
              <i class="nav-icon fa fa-comments"></i>
              <p>
                Chat
                {{-- <span class="right badge badge-danger">Nueva función</span> --}}
              </p>
            </a>
          </li>
          @endcan
          @can('Pagina_mioficina')
          <li class="nav-item">
            <a href="{{ route('oficina') }}" class="nav-link {{ activo('oficina') }}">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Mi oficina
              </p>
            </a>
          </li>
          @endcan
          @can('Pagina_personalsoporte')
          <li class="nav-item">
            <a href="{{ route('usersoporte') }}" class="nav-link {{ activo('usersoporte') }}">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Personal de soporte
              </p>
            </a>
          </li>
          @endcan
          {{-- listado de menus por desarrollar --}}
          @can('pagina_pide')
          <li class="nav-item">
            <a href="{{ route('pide') }}" class="nav-link {{ activo('pide') }}">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Servicios PIDE
              </p>
            </a>
          </li>
          @endcan
          
           {{-- fin de menus por desarrollar --}}
          @hasanyrole('Superadmin|Administrador')
          <li class="nav-header">Administrador</li>
          @can('pagina_userSGD')
          <li class="nav-item">
            <a href="{{ route('usuariossgd') }}" class="nav-link {{ activo('usuariossgd') }}">
              <i class="nav-icon far fa-user"></i>
              <p>
                Usuarios
                {{-- <span class="badge badge-info right">2</span> --}}
              </p>
            </a>
          </li>
          @endcan
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Usuarios soporte
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li> --}}
          @can('Pagina_roles')
          <li class="nav-item">
            <a href="{{ route('rolpermiso') }}" class="nav-link {{ activo('rolpermiso') }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          @endcan
          @can('Pagina_permisos')
          <li class="nav-item">
            <a href=" {{ route('permisos') }}" class="nav-link {{ activo('permisos') }}">
              <i class="nav-icon fas fa-person-booth"></i>
              <p>
               Permisos
              </p>
            </a>
          </li>
          @endcan
          @can('Pagina_catatenciones')
          <li class="nav-item">
            <a href="{{ route('catatencion') }}" class="nav-link {{ activo('catatencion') }}">
              <i class="nav-icon fas fa-person-booth"></i>
              <p>
                Categoria atenciones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('gestionportales') }}" class="nav-link {{ activo('gestionportales') }}">
              <i class="nav-icon fas fa-person-booth"></i>
              <p>
                Gestionportales
              </p>
            </a>
          </li>
          @endcan
          @can('Pagina_inventario')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                OCS Inventory
              </p>
            </a>
          </li>
          @endcan
          @else
              {{-- no puedo editar --}}
             
          @endhasanyrole
         

          


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a id="id01" data-toggle="modal" data-target="#modal-default">Gorehco</a>.</strong>
    Reservado todo los derechos
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
{{-- modal para popup --}}
@php
//$avatar=asset('dist/img/avatar.png');
$comunicacion=Storage::url('comunicacion/ejemplo.jpg')
@endphp
<div class="modal fade" id="modal-default" >{{-- data-backdrop="static" --}}
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
      
      <div class="modal-body" style="padding: 2px !important;" >
        <a href="#" class="bg-warning" data-dismiss="modal" style="float: right;position: relative;padding-left: 8px;border-radius: 10px;width: 23px;margin-top: -20px;margin-right: -5px;font-weight: bold;">x</a>
        <img src="{{ $comunicacion }}" alt="" class="img-fluid">
      
      </div>
      <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
  </div>
</div>
{{-- liveWire --}}

@livewireScripts
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
{{-- <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- dropzonejs -->
<script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>

  <!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>


<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@stack('scrit') --}}

@yield('script')
{{-- <script type="text/javascript">
  function redireccionar(){
    document.getElementById('id01').style.display='active';
    $("#id01").trigger("click");
  } 
  setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
  
</script> --}}
</body>
</html>
