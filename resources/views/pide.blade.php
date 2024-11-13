@extends('layouts.admin')
@section('titpage')
  Gobierno digital | Servicios PIDE
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Relación de servicios PIDE</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">oficinas</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div class="container-fluid">
    {{-- <div class="row justify-content-center"> --}}
      @can('pagina_pide')
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-gray">
                    <div class="card-header p-2">
                      <h3 class="card-title">Servicios PIDE(Plataforma de Interoperabilidad del Estado) 
                        {{-- <button class="btn btn-success btn-xs" onclick="desarrollador();">Integre en tu plataforma</button> --}}
                      </h3>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-outline-primary btn-xs" data-toggle="modal" data-target="#reniec">
                                    <i class="fas fa-inbox fa-2x"></i><br> <small>Reniec</small></button>
                            </div>
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-outline-primary btn-xs" data-toggle="modal" data-target="#sis">
                                    <i class="fa fa-heartbeat fa-2x"></i><br> <small>Sistema Integrado de Salud(SIS)</small></button>
                            </div>
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-outline-primary btn-xs" data-toggle="modal" data-target="#essalud">
                                    <i class="fa fa-ambulance fa-2x"></i><br> <small>ESSALUD</small></button>
                            </div>
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-outline-primary btn-xs" data-toggle="modal" data-target="#sunat">
                                    <i class="fa fa-leaf fa-2x"></i><br> <small>SUNAT</small></button>
                            </div>
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-outline-primary btn-xs" data-toggle="modal" data-target="#antejudicial">
                                    <i class="fa fa-flask fa-2x"></i><br>  <small>Antecedentes judiciales</small></button>
                            </div>
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-outline-primary btn-xs">
                                    <i class="fa fa-leaf fa-2x"></i><br> <small>SUNARP</small></button>
                            </div>
                          
                            
                        </div>
                        <div class="row pt-2">
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#proveedorsancionado">
                                    <i class="fa fa-gavel fa-2x"></i><br>  <small>PROVEEDOR SANCIONADO-OSCE</small></button>
                            </div>
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#busprocselxexpediente">
                                    <i class="fa fa-gavel fa-2x"></i><br>  <small>Proceso seleccion por expediente-OSCE</small></button>
                            </div>
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#busprocselrucaniomes">
                                    <i class="fa fa-gavel fa-2x"></i><br>  <small>Proceso seleccion (Ruc,mes y año) -OSCE</small></button>
                            </div>
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#proveedoradjudicadoxexpe">
                                    <i class="fa fa-gavel fa-2x"></i><br>  <small>Proveedor adjudicado por expediente-OSCE</small></button>
                            </div>
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#proveedoradjudicadoxrucanio">
                                    <i class="fa fa-gavel fa-2x"></i><br>  <small>Proveedor adjudicado por Ruc y Año-OSCE</small></button>
                            </div>
                            {{-- sobra uno --}}
                        </div>
                        <div class="row pt-2">
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-outline-info btn-xs" data-toggle="modal" data-target="#sunedu">
                                    <i class="fa fa-university fa-2x"></i><br> <small>SUNEDU</small></button>
                            </div>
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-outline-info btn-xs" data-toggle="modal" data-target="#gradotitinsttecnyped">
                                    <i class="fa fa-home fa-2x"></i><br> <small>Grados y Títulos de Institutos por DNI</small></button>
                            </div>
                            <div class="col-xs-4 col-sm-3 pt-1">
                                <button type="button" class="btn btn-block btn-outline-info btn-xs" data-toggle="modal" data-target="#infocolnacioparticular">
                                    <i class="fa fa-book fa-2x"></i><br> <small>Información de colegio nacional y particular</small></button>
                            </div>
                            
                        </div>
                        <div class="row pt-2">
                          <div class="col-xs-4 col-sm-3 pt-1">
                              <button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#conadis">
                                  <i class="fa fa-desktop fa-2x"></i><br> <small>CONADIS</small></button>
                          </div>
                          <div class="col-xs-4 col-sm-3 pt-1">
                              <button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#juntos">
                                  <i class="fa fa-users fa-2x"></i><br> <small>Programa juntos</small></button>
                          </div>
                          <div class="col-xs-4 col-sm-3 pt-1">
                              <button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#pension65">
                                <i class="fas fa-book-reader fa-2x"></i><br> <small>Pension65</small></button>
                          </div>
                          <div class="col-xs-4 col-sm-3 pt-1">
                            <button type="button" class="btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#Qaliwarma">
                              <i class="fab fa-accusoft fa-2x"></i><br> <small>Qaliwarma</small></button>
                        </div>
                          
                      </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card card-gray">
                    <div class="card-header">Resultados <span id="textoresul"></span></div>
                    <div class="card-body resultado">
                        En esta seccion se mostrará los resultados de la consulta
                    </div>
                    <div class="overlay dark" style="display: none;"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-danger" role="alert">
          No tines acceso a este módulo
        </div> 
        <a href="/" class="btn btn-primary btn-sm"> Volver</a>
      @endcan
</div>
{{-- modal sistemas--}}


{{-- modal RENIEC --}}
<div class="modal fade" id="reniec">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Consulta DNI</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form class="form">
              <div class="modal-body">                  
                      <div class="form-group">
                          <label for="exampleInputEmail1">Ingresar DNI</label>
                          <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE DNI" id="ndni">
                      </div>  
              </div>
              <div class="modal-footer justify-content-between">
                {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                <button type="button" class="btn btn-primary" id="btndni" onclick="reniec();">Consultar</button>
              </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
{{-- modal SIS --}}
<div class="modal fade" id="sis">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta SIS</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">
              <p>Ejemplo: <b>22484119</b></p>                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar DNI</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE DNI" id="numdni">
                    </div>  
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" id="btndnisis" onclick="sis();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>
{{-- modal ESSALUD --}}
<div class="modal fade" id="essalud">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta ESSALUD</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar DNI</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE DNI" id="essaluddni">
                    </div>  
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" id="btndnisis" onclick="essalud();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>

{{-- modal SUNAT --}}
<div class="modal fade" id="sunat">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta SUNAT</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar RUC</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE RUC" id="ruc">
                    </div>  
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" id="btndnisis" onclick="sunat();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>
{{-- modal SUNEDU --}}
<div class="modal fade" id="sunedu">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta SUNEDU</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar DNI</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE DNI" id="dnisunedu">
                    </div>  
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" id="btndnisis" onclick="sunedu();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>

{{-- proveedorsancionado --}}
<div class="modal fade" id="proveedorsancionado">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta estado Proveedor</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                      <p>
                        Ejemplos<br>
                        proveedor habilitado(vigente): 20574746966, proveedor ihnabilitado: 10081287886
                      </p>
                      <hr>
                        <label for="exampleInputEmail1">Ingresar RUC</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE RUC" id="rucsancionado">
                    </div>  
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" id="btndnisis" onclick="proveesancionado();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>

{{-- Buscar proceso seleccion por expediente --}}
<div class="modal fade" id="busprocselxexpediente">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta proceso de seleccion</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar Expediente(Ejemplo:429538)</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE EXPEDIENTE" id="expedinteproceso">
                    </div>  
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" id="btndnisis" onclick="busprocselxexpediente();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>

{{-- Buscar proceso seleccion por rucaniomes --}}
<div class="modal fade" id="busprocselrucaniomes">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta proceso de seleccion</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                      <p align="center">
                        Ejemplo<br>
                        Ruc: 20204176681, 
                        Año: 2018, 
                        mes: 02
                      </p>
                        <label for="exampleInputEmail1">Ingresar RUC</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE RUC" id="rucprocesosel">
                    </div>
                    <div class="form-group">
                     <div class="row">
                       <div class="col-sm-6">
                        <label for="exampleInputEmail1">Año</label>
                        
                        <select class="form-control form-control-sm" id="anioproc">
                          <option selected>Seleccione...</option>
                          @php
                            $fechai=date('Y');
                          @endphp
                          @for($i=$fechai;$i>1960;$i--)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                          {{-- <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option> --}}
                        </select>
                       </div>
                       <div class="col-sm-6">
                        <label for="exampleInputEmail1">Mes</label>
                        <select class="form-control form-control-sm" id="procmes">
                          <option selected>Seleccione...</option>
                          <option value="01">Enero</option>
                          <option value="02">Febrero</option>
                          <option value="03">marzo</option>
                          <option value="04">Abril</option>
                          <option value="05">Mayo</option>
                          <option value="06">Junio</option>
                          <option value="07">Julio</option>
                          <option value="08">Agosto</option>
                          <option value="09">Setiembre</option>
                          <option value="10">Octubre</option>
                          <option value="11">Noviembre</option>
                          <option value="12">Diciembre</option>
                        </select>
                       </div>
                     </div>
                    </div>
 
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" id="btndnisis" onclick="procesoseleccionporaniomesruc();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>

{{-- Buscar informacion de colegio nacional y particular --}}
<div class="modal fade" id="infocolnacioparticular">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Información de colegio nacional y particular</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                      <p align="center">
                        Ejemplo<br>
                        Codigo modular del I.E.: 0214874
                      </p>
                        <label for="exampleInputEmail1">Código Modular de la Institución Educativa</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR EL CÓDIGO" id="codmod">
                    </div>
                    
 
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" id="btndnisis" onclick="informacioncolnacioparticular();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>

{{-- modal grados y titulos de Institutos --}}
<div class="modal fade" id="gradotitinsttecnyped">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta Grados y Títulos de Institutos Tecnológicos y Pedagógicos por DNI</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar DNI(ejemplo:47643796)</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE DNI" id="dniinstitutos">
                    </div>  
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" id="btndnisis" onclick="gradoinstituto();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>

{{-- modal Antecedentes Judiciales --}}
<div class="modal fade" id="antejudicial">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta Antecedentes Judiciales </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">

                  <div class="form-group">
                      <label for="exampleInputEmail1">Ingrese su DNI</label>
                      <input type="number" class="form-control form-control-sm"  placeholder="Ingresar su número DNI" id="dniaj">
                  </div>                
                  <div class="form-group" style="display: none;">
                      <label for="exampleInputEmail1">Apellido Paterno</label>
                      <input type="hidden" class="form-control form-control-sm"  placeholder="Ingresar Apellido Paterno" id="apepataj">
                  </div> 
                  <div class="form-group" style="display: none;">
                    <label for="exampleInputEmail1">Apellido Materno</label>
                    <input type="hidden" class="form-control form-control-sm"  placeholder="Ingresar Apellido Materno" id="apemataj">
                  </div> 
                  <div class="form-group" style="display: none;">
                      <label for="exampleInputEmail1">Nombres</label>
                      <input type="hidden" class="form-control form-control-sm"  placeholder="Ingresar Nombres" id="nombreaj">
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" id="btnantejudi" onclick="antecedentejudicial();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>

{{-- Buscar proveedor adjudicado por expediente --}}
<div class="modal fade" id="proveedoradjudicadoxexpe">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h6 class="modal-title">Proveedor adjudicado por expediente</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar Expediente(Ejemplo:445241)</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE EXPEDIENTE" id="proveadjxexpediente">
                    </div>  
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" id="btndnisis" onclick="proveedoradjudicadoxexpediente();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>
{{-- Buscar proveedor adjudicado por ruc y año --}}
<div class="modal fade" id="proveedoradjudicadoxrucanio">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Proveedor adjudicado por Ruc y Año</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
              <p align="center">
                Ejemplo<br>
                Ruc: 20477159380, 
                Año: 2018
              </p>
                    <div class="form-group">
                      
                     <div class="row">
                       
                       <div class="col-sm-6">
                        
                          <label for="exampleInputEmail1">Ingresar RUC</label>
                          <input type="number" class="form-control form-control-sm"  placeholder="INGERSAR NUMERO DE RUC" id="rucproveeadj">
                       </div>
                       <div class="col-sm-6">
                        <label for="exampleInputEmail1">Año</label>
                        
                        <select class="form-control form-control-sm" id="anioproveeadj">
                          <option selected>Seleccione...</option>
                          @php
                            $fechai=date('Y');
                          @endphp
                          @for($i=$fechai;$i>1960;$i--)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                          {{-- <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option> --}}
                        </select>
                       </div>
                       
                     </div>
                    </div>
 
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" id="btndnisis" onclick="proveeadjxrucyanio();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>

{{-- modal CONADIS --}}
<div class="modal fade" id="conadis">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta CONADIS</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">
              <p>Ejemplo: <b>43709827</b></p>                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar DNI</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE DNI" id="dniconadis">
                    </div>  
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" onclick="conadis();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>

{{-- modal JUNTOS --}}
<div class="modal fade" id="juntos">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta JUNTOS</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">
              <p>Ejemplo: <b>63076171</b></p>                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar DNI</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE DNI" id="dnijuntos">
                    </div>  
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" onclick="juntos();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>
{{-- modal PENSION65 --}}
<div class="modal fade" id="pension65">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta PENSION65</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">
              <p>Ejemplo: <b>00913648</b></p>                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar DNI</label>
                        <input type="number" class="form-control form-control-sm"  placeholder="INGRESAR NUMERO DE DNI" id="dnipension65">
                    </div>  
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" onclick="pension65();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>

{{-- modal PENSION65 --}}
<div class="modal fade" id="Qaliwarma">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Consulta Qaliwarma</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">
                    
                    <div class="row form-group">
                      <div class="col-sm-4">
                        <label for="exampleInputEmail1">Departamento</label>
                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm"  placeholder="Ejem:HUANUCO" value="HUANUCO" required id="depart">
                      </div>
                      <div class="col-sm-4">
                        <label for="exampleInputEmail1">Provincia(OPCIONAL)</label>
                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm"  placeholder="Ejem:HUANUCO" value="HUANUCO" id="prov">
                      </div>
                      <div class="col-sm-4">
                        <label for="exampleInputEmail1">Distrito(OPCIONAL)</label>
                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm"  placeholder="Ejem:HUANUCO" value="HUANUCO" id="dist">
                      </div>
                    </div>
                    <div class="row form-group">
                      <label for="">Nivel educativo</label>
                      <div class="col-sm-4">
                        <select id="niveducat" class="form-control form-control-sm form-control form-control-sm-sm">
                          <option value="INICIAL">INICIAL</option>
                          <option value="PRIMARIA">PRIMARIA</option>
                          <option value="SECUNDARIA">SECUNDARIA</option>
                        </select>
                      </div>
                      
                    </div>
                    
                    
            </div>
            <div class="modal-footer justify-content-between">
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
              <button type="button" class="btn btn-primary" onclick="qaliwarma();">Consultar</button>
            </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  // CONSULTA DNI PARA RENIEC

function reniec()
{
  var valdni = $('#ndni').val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('reniec') }}/'+valdni,
          dataType: "json",
          success:function(data){

        nombre=data.prenombres + ' ' + data.apPrimer + ' ' + data.apSegundo;
        direccion=data.direccion;
        estadocivil=data.estadoCivil;
        ubigeo=data.ubigeo;
        foto='<img src="data:image/jpg;base64,'+ data.foto+'">';

        tabla='<table class="table table-bordered table-sm table-hover"><tr><td><strong>DNI</strong></td><td>'+valdni+'</td></tr><tr><td>Nombre y apellido</td><td>'+nombre+'</td></tr><tr><td>Direccion:</td><td>'+direccion+'</td></tr><tr><td>Estado civil:</td><td>'+estadocivil+'</td></tr><tr><td>Ubigeo:</td><td>'+ubigeo+'</td></tr><tr><td>Foto</td><td>'+foto+'</td></tr></table>';
        
        $('.resultado').html(tabla);
        $('#textoresul').html(' - Consulta RENIEC');
        // ocultamos modal       
        $('#reniec').modal('hide')
        $('.overlay').hide();
        $("#ndni" ).focus();
      },
      error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#reniec').modal('hide')
              }

  });
}
  // CONSULTA DNI PARA SIS

function sis()
{
  var valdni = $('#numdni').val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('sis') }}/'+valdni,
          dataType: "json",
          success:function(data){
            //alert(data.afiliadoDetalle.resultado);
            cod=data.afiliadoDetalle.codError

            if(cod=="1001")// si no es afiliado
            {
              tabla=`<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Resultado!</h5>
                  `+data.afiliadoDetalle.resultado+`
                </div>`;

            }
            else{// si esta afiliado
              tabla=`<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Resultado!</h5>
                  `+data.afiliadoDetalle.resultado+`
                </div>`;
                tabla+=`<table class="table table-bordered table-sm table-hover">
                  <tr><td class='bg-lightblue disabled color-palette'><strong>DNI</strong></td><td>`+data.afiliadoDetalle.nroDocumento+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Apellidos y nombres</strong></td><td>`+data.afiliadoDetalle.apePaterno+` `+data.afiliadoDetalle.apeMaterno+`, `+data.afiliadoDetalle.nombres+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>fecha afiliacion</strong></td><td>`+data.afiliadoDetalle.fecAfiliacion+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Establecimiento de salud</strong></td><td>`+data.afiliadoDetalle.eess+`(`+data.afiliadoDetalle.descEESS+`)</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Ubigeo establecimiento /Descripcion</strong></td><td>`+data.afiliadoDetalle.eessUbigeo+`(`+data.afiliadoDetalle.descEESSUbigeo+`)</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Regimen</strong></td><td>`+data.afiliadoDetalle.regimen+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Tipo seguro</strong></td><td>`+data.afiliadoDetalle.tipoSeguro+` - `+data.afiliadoDetalle.descTipoSeguro+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Contrato</strong></td><td>`+data.afiliadoDetalle.contrato+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Fecha caducidad</strong></td><td>`+data.afiliadoDetalle.fecCaducidad+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Estado</strong></td><td>`+data.afiliadoDetalle.estado+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Tabla</strong></td><td>`+data.afiliadoDetalle.tabla+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>idNumReg</strong></td><td>`+data.afiliadoDetalle.idNumReg+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Genero</strong></td><td>`+data.afiliadoDetalle.genero+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Fecha nacimiento</strong></td><td>`+data.afiliadoDetalle.fecNacimiento+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Ubigeo</strong></td><td>`+data.afiliadoDetalle.idUbigeo+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Direccion</strong></td><td>`+data.afiliadoDetalle.direccion+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Disa</strong></td><td>`+data.afiliadoDetalle.disa+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Tipo formato</strong></td><td>`+data.afiliadoDetalle.tipoFormato+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Nro contrato</strong></td><td>`+data.afiliadoDetalle.nroContrato+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Correlativo</strong></td><td>`+data.afiliadoDetalle.correlativo+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>idPlan</strong></td><td>`+data.afiliadoDetalle.idPlan+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>idGrupoPoblacional</strong></td><td>`+data.afiliadoDetalle.idGrupoPoblacional+`</td></tr>
                  <tr><td class='bg-lightblue disabled color-palette'><strong>Msg de Confidencialidad</strong></td><td>`+data.afiliadoDetalle.msgConfidencial+`</td></tr>
                 </table>`;
            }

        
        $('.resultado').html(tabla);
        $('#textoresul').html(' - Consulta SIS');
        // // ocultamos modal       
        $('#sis').modal('hide')
        $('.overlay').hide();
        // $("#ndni" ).focus();
      },
      error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#sis').modal('hide')
              }

  });
}
function sunat()
{
  var valruc = $('#ruc').val();
  $('.overlay').show();  
  $.ajax({
          type:'GET',
          url:'{{ url('sunat') }}/'+valruc,
          dataType: "json",
          success:function(data)
          {  

            //alert(data[0].desc_dep);
            tabla=`<table class="table table-bordered table-sm">
            <tr><td class='bg-lightblue disabled color-palette'>Departamente</td><td>`+data['desc_dep']+`</td><td class='bg-lightblue disabled color-palette'>Razón-Social</td><td>`+data['ddp_nombre']+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Provincia</td><td>`+data['desc_prov']+`</td><td class='bg-lightblue disabled color-palette'>Actividad economica</td><td>`+data['ddp_ciiu']+`-`+data['desc_ciiu']+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Distrito</td><td>`+data['desc_dist']+`</td><td class='bg-lightblue disabled color-palette'>Dependencia</td><td>`+data['desc_numreg']+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Tipo via</td><td>`+data['desc_tipvia']+`</td><td class='bg-lightblue disabled color-palette'>Tipo contribuyente</td><td>`+data['desc_tpoemp']+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Tipo zona</td><td>`+data['desc_tipzon']+`</td><td class='bg-lightblue disabled color-palette'>Fecha alta</td><td>`+data['ddp_fecalt']+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Nombre via</td><td>`+data['ddp_nomvia']+`</td><td class='bg-lightblue disabled color-palette'>Fecha actualización</td><td>`+data['ddp_fecact']+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Nombre Zona</td><td>`+data['ddp_nomzon']+`</td><td class='bg-lightblue disabled color-palette'>Estado</td><td>`+data['desc_estado']+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Referencia</td><td>`+data['ddp_refer1']+`</td><td class='bg-lightblue disabled color-palette'>Condicion de domicilio</td><td>`+data['desc_flag22']+`</td></tr>
            </table>`;

            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta SUNAT');
            // // // ocultamos modal       
            $('#sunat').modal('hide')          
            $('.overlay').hide();
            
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#sunat').modal('hide') 
                      }

  });
}
function sunedu()
{
  var dni = $('#dnisunedu').val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('sunedu') }}/'+dni,
          dataType: "json",
          // data:{cruc:valruc},
          success:function(data)
          {  
            //console.log(data);
            dato=data.length;
            tabla='<table class="table-bordered table-sm"><thead class="thead-light"><tr><td>USUARIO</td><td>GRADO O TITULO</td><td>INSTITUCION</td><td>FECHA DIPLOMA</td><td>RESOLUCION</td><td>FECHA INSCRIPCION</td></tr></thead><tbody>';
            if(dato>1)
            {
              for(i=0;i<dato;i++)
              {
                tabla+=`<tr>
                        <td>`+data[i].nroDocumento+`<br>`+data[i].nombres+` `+ data[i].apellidoPaterno+` `+ data[i].apellidoMaterno+`</td>
                        <td><span class="badge badge-danger">`+data[i].abreviaturaTitulo+`</span>`+data[i].tituloProfesional+`</td>
                        <td>`+data[i].universidad+`<br><span class="badge badge-dark">`+data[i].tipoInstitucion+`</span><span class="badge badge-warning">`+data[i].tipoGestion+`</span><span class="badge badge-danger">`+data[i].pais+`</span></td>
                        <td>`+data[i].fechaEmision+`</td>
                        <td>`+data[i].resolucion+`</td>
                        <td>`+data[i].fechaResolucion+`</td>
                        </tr>`;

              }
            }
            else{
              tabla+=`<tr>
                        <td>`+data.nroDocumento+`<br>`+data.nombres+` `+ data.apellidoPaterno+` `+ data.apellidoMaterno+`</td>
                        <td><span class="badge badge-danger">`+data.abreviaturaTitulo+`</span>`+data.tituloProfesional+`</td>
                        <td>`+data.universidad+`<br><span class="badge badge-dark">`+data.tipoInstitucion+`</span><span class="badge badge-warning">`+data.tipoGestion+`</span><span class="badge badge-danger">`+data.pais+`</span></td>
                        <td>`+data.fechaEmision+`</td>
                        <td>`+data.resolucion+`</td>
                        <td>`+data.fechaResolucion+`</td>
                        </tr>`;
            }
            tabla+='</tbody></table>';
            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta SUNAT');
            // // // ocultamos modal       
            $('#sunedu').modal('hide')          
            $('.overlay').hide();
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#sunedu').modal('hide') 
                      }

  });
}
function essalud()
{
  var dni = $('#essaluddni').val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('essalud') }}/'+dni,
          dataType: "json",
          // data:{cruc:valruc},
          success:function(data)
          {  
            console.log(data);
            //dato=data.length;
            Result=data.respuesta.ACCRED[0].ce_ads;
            fechaini=data.respuesta.ACCRED[0].in_vig;
            fechafin=data.respuesta.ACCRED[0].fi_vig;
            //alert(Result);
            //print(Result);
            tabla=`<table class="table table-bordered table-sm">
                  <tr><td>Tipo de documento de identidad:</td><td>`+data.respuesta.ACCRED[0].tp_doc+`</td></tr>
                  <tr><td>DNI:</td><td>`+data.respuesta.ACCRED[0].nu_doc+`</td></tr>
                  <tr><td>Centro de adscripción del asegurado:</td><td>`+data.respuesta.ACCRED[0].ce_ads+`</td></tr>
                  <tr><td>Fecha inicio vigencia:</td><td>`+fechaini.substr(6,2)+`/`+fechaini.substr(4,2)+`/`+fechaini.substr(0,4)+`</td></tr>
                  <tr><td>Fecha fin vigencia:</td><td>`+fechafin.substr(6,2)+`/`+fechafin.substr(4,2)+`/`+fechafin.substr(0,4)+`</td></tr>`;
            
            tabla+=`</tbody></table>`;
            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta ESSALUD');
            // // // ocultamos modal       
            $('#essalud').modal('hide')          
            $('.overlay').hide();
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#essalud').modal('hide')
                      }

  });
}

function proveesancionado()
{
  var ruc = $('#rucsancionado').val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('proveedorsancionado') }}/'+ruc,
          dataType: "json",
          // data:{cruc:valruc},
          success:function(data)
          {  
            console.log(data);
            //dato=data.length;
            resultado=data.resultado;
            mensage=data.mensage;
            registro=data.registro;
            if(resultado==1){// inscricpion vigente
              tabla=`<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Resultado!</h5>
                  `+data.mensage+`
                </div>`;
              cantidad=registro.length;
              if(cantidad>1)
                {
                  tabla+='<table class="table table-bordered table-sm">';
                  for(i=0;i<cantidad;i++)
                  {
                    tabla+='<tr><td>NombreRazonSocial<br>email<br>Origen<br>CodigoRNP<br>TipoRegistro<br>CMC<br>EspecialidadesCategorias<br>FechaInicioVigencia<br>FechaFinVigencia</td><td>'+registro[i].nombreRazonSocial+'<br>'+registro[i].email+'<br>'+registro[i].origen+'<br>'+registro[i].codigoRNP+'<br>'+registro[i].tipoRegistro+'<br>'+registro[i].CMC+'<br>'+registro[i].especialidadesCategorias+'<br>'+registro[i].fechaInicioVigencia+'<br>'+registro[i].fechaFinVigencia+'</td></tr>';
                  }
                  tabla+=`</tbody></table>`;

                }
                else{
                  tabla+='<table class="table table-bordered table-sm">';
                 
                    tabla+='<tr><td>NombreRazonSocial<br>email<br>Origen<br>CodigoRNP<br>TipoRegistro<br>CMC<br>EspecialidadesCategorias<br>FechaInicioVigencia<br>FechaFinVigencia</td><td>'+registro.nombreRazonSocial+'<br>'+registro.email+'<br>'+registro.origen+'<br>'+registro.codigoRNP+'<br>'+registro.tipoRegistro+'<br>'+registro.CMC+'<br>'+registro.especialidadesCategorias+'<br>'+registro.fechaInicioVigencia+'<br>'+registro.fechaFinVigencia+'</td></tr>';
                 
                  tabla+=`</tbody></table>`;
                }
            }
            else{// sancion vigente
              tabla=`<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Resultado!</h5>
                  `+data.mensage+`
                </div>`;
                cantidad=registro.length;
                
                  tabla+='<table class="table table-bordered table-sm">';
                 
                  tabla+='<tr><td>tipoInhabilitacion<br>nombreRazonSocial<br>resolucion<br>fechaResolucion<br>montoMulta<br>periodoInhabilitacion<br>fechaInicio<br>fechaFin</td><td>'+registro.tipoInhabilitacion+' - [T Temporal, D Definitiva, M Multa]<br>'+registro.nombreRazonSocial+'<br>'+registro.resolucion+'<br>'+registro.fechaResolucion+'<br>'+registro.montoMulta+'<br>'+registro.periodoInhabilitacion+'<br>'+registro.fechaInicio+'<br>'+registro.fechaFin+'</td></tr><tr><td>Descripcion</td><td> - '+registro.listadoInfraccion.infraccion[0].descripcionInfraccion+'<br>- '+registro.listadoInfraccion.infraccion[1].descripcionInfraccion+'</td></tr>';
              
                    tabla+=`</tbody></table>`;
            }
                

            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta PROVEEDOR SANCIONADO/VIGENTE');
            // // // // ocultamos modal       
            $('#proveedorsancionado').modal('hide');
            $('.overlay').hide();     
            
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#proveedorsancionado').modal('hide');
                      }

  });
}

function busprocselxexpediente()
{
  var exp=$('#expedinteproceso').val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('busprocselxexpediente') }}/'+exp,
          dataType: "json",
          // data:{cruc:valruc},
          success:function(data)
          {  
            console.log(data);
            //dato=data.length;
            tabla='<table class="table table-bordered table-sm">';
            
            tabla+="<tr><td>Expediente:</td><td>"+data.idExpediente+"</td></tr>";
            tabla+="<tr><td>Ruc entidad convocante:</td><td>"+data.rucEntidadConvocante+"</td></tr>";
            tabla+="<tr><td>Nombre entidad convocante:</td><td>"+data.nombreEntidadConvocante+"</td></tr>";
            tabla+="<tr><td>Nomenclatura de proceso:</td><td>"+data.nomenclaturaProceso+"</td></tr>";
            tabla+="<tr><td>Tipo Compra Seleccion:</td><td>"+data.tipoCompraSeleccion+"</td></tr>";
            tabla+="<tr><td>Norma Aplicable:</td><td>"+data.normaAplicable+"</td></tr>";
            tabla+="<tr><td>Objeto Contratacion:</td><td>"+data.objetoContratacion+"</td></tr>";
            tabla+="<tr><td>Descripcion Objeto Contratacion:</td><td>"+data.descripcionObjetoContratacion+"</td></tr>";
            tabla+="<tr><td>Valor Referencial:</td><td>"+data.valorReferencial+"</td></tr>";
            tabla+="<tr><td>Moneda:</td><td>"+data.moneda+"</td></tr>";
            tabla+="<tr><td>Fecha y Hora Publicacion:</td><td>"+data.fechaYHoraPublicacion+"</td></tr>";
            tabla+="<tr><td>Fecha y hora publicacion reinicio:</td><td>"+data.fechaYHoraPublicacionReinicio+"</td></tr>";

            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta de Proceso de Seleccion Por Expediente');
            // // // // ocultamos modal       
            $('#busprocselxexpediente').modal('hide')  
            $('.overlay').hide();        
            
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#busprocselxexpediente').modal('hide')
                      }

  });
}
function procesoseleccionporaniomesruc()
{
  var ruc=$('#rucprocesosel').val();
  var anio=$('#anioproc').val();
  var mes=$('#procmes').val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('busprocselxrucaniomes') }}/'+ruc+'/'+anio+'/'+mes,
          dataType: "json",
          // data:{cruc:valruc},
          success:function(data)
          {  
            console.log(data);
            cantidad=data.length;
             tabla='<table class="table table-bordered table-sm">';
            for(i=0;i<cantidad;i++)//i=0;i<dato;i++
            {
              tabla+="<tr style='background:#ccc;'><td>Expediente:</td><td>"+data[i].idExpediente+"</td></tr>";
              tabla+="<tr><td>Ruc entidad convocante:</td><td>"+data[i].rucEntidadConvocante+"</td></tr>";
              tabla+="<tr><td>Nombre entidad convocante:</td><td>"+data[i].nombreEntidadConvocante+"</td></tr>";
              tabla+="<tr><td>Nomenclatura de proceso:</td><td>"+data[i].nomenclaturaProceso+"</td></tr>";
              tabla+="<tr><td>Tipo Compra Seleccion:</td><td>"+data[i].tipoCompraSeleccion+"</td></tr>";
              tabla+="<tr><td>Norma Aplicable:</td><td>"+data[i].normaAplicable+"</td></tr>";
              tabla+="<tr><td>Objeto Contratacion:</td><td>"+data[i].objetoContratacion+"</td></tr>";
              tabla+="<tr><td>Descripcion Objeto Contratacion:</td><td>"+data[i].descripcionObjetoContratacion+"</td></tr>";
              tabla+="<tr><td>Valor Referencial:</td><td>"+data[i].valorReferencial+"</td></tr>";
              tabla+="<tr><td>Moneda:</td><td>"+data[i].moneda+"</td></tr>";
              tabla+="<tr><td>Fecha y Hora Publicacion:</td><td>"+data[i].fechaYHoraPublicacion+"</td></tr>";
              tabla+="<tr><td>Fecha y hora publicacion reinicio:</td><td>"+data[i].fechaYHoraPublicacionReinicio+"</td></tr>";

            }
                

            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta de Proceso de Seleccion Por RUC,AÑO Y MES');
            // // // // ocultamos modal       
            $('#busprocselrucaniomes').modal('hide')  
            $('.overlay').hide();        
            
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#busprocselrucaniomes').modal('hide')  
                      }

  });
}
function informacioncolnacioparticular()
{
  var codmod=$('#codmod').val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('infocolnacioparticular') }}/'+codmod,
          dataType: "json",
          // data:{cruc:valruc},
          success:function(data)
          {  
            console.log(data);
            lista=data.lstInstitucionesEducativas.InstitucionEducativa;

            // cantidad=data.length;
             tabla='<table class="table table-bordered table-sm table-hover">';

              tabla+="<tr><td>Número de anexo a una institución educativa</td><td>"+lista.anexo+"</td></tr>";
              tabla+="<tr><td>Número y/o nombre que identifica a la institución educativa:</td><td>"+lista.cenEdu+"</td></tr>";
              tabla+="<tr><td>Nombre del centro poblado en el padrón de centros poblados con servicio educativo de la UEE-MINEDU:</td><td>"+lista.cenPob+"</td></tr>";
              tabla+="<tr><td>Código de ubicación geográfica:</td><td>"+lista.codGeo+"</td></tr>";
              tabla+="<tr><td>Código de identificación local en que funciona la institución educativa:</td><td>"+lista.codLocal+"</td></tr>";
              tabla+="<tr style='background:#ccc'><td><strong>Código modular de la institución educativa:</strong></td><td>"+lista.codMod+"</td></tr>";
              tabla+="<tr><td>Código de la DRE o UGEL que supervisa la institución educativa:</td><td>"+lista.codooii+"</td></tr>";
              tabla+="<tr><td>Descripción de la denominación de la DRE o UGEL que supervisa la IE:</td><td>"+lista.dDreUgel+"</td></tr>";
              tabla+="<tr><td>Descripción de la forma en que se imparte enseñanza:</td><td>"+lista.dForma+"</td></tr>";
              tabla+="<tr><td>Descripción de la dependencia o entidad que gestiona la institución educativa:</td><td>"+lista.dGesDep+"</td></tr>";
              tabla+="<tr><td>Descripción del tipo de gestión de la institución educativa:</td><td>"+lista.dGestion+"</td></tr>";
              tabla+="<tr><td>Descripción de nivel educativo y modalidad que ofrece la institución educativa:</td><td>"+lista.dNivMod+"</td></tr>";
              tabla+="<tr><td>Descripción de la dirección del local en que funciona la institución educativa:</td><td>"+lista.dirCen+"</td></tr>";
              tabla+=`<tr><td>Código de nivel educativo y modalidad que ofrece la institución educativa<br>
                                                                                                            A1 Inicial-Cuna<br>
                                                                                                            A2 Inicial-Jardín<br>
                                                                                                            A3 Inicial-Cuna-Jardín<br>
                                                                                                            B0 Primaria<br>
                                                                                                            F0 Secundaria<br>
                                                                                                            E1 Básica Especial-Inicial<br>
                                                                                                            E2 Básica Especial-Primaria
                                                                                                            :</td><td>`+lista.nivMod+`</td></tr>`;
              tabla+="<tr><td>Referencia:</td><td>"+lista.referencia+"</td></tr>";    


            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta de informacion del colegio nacional y particular');
            // // // // ocultamos modal       
            $('#infocolnacioparticular').modal('hide')  
            $('.overlay').hide();
            
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#infocolnacioparticular').modal('hide') 
                      }

  });
  //lert(codmod);
}

function gradoinstituto()
{
  var dni = $('#dniinstitutos').val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('gradoinstituto') }}/'+dni,
          dataType: "json",
          // data:{cruc:valruc},
          success:function(data)
          {  
            console.log(data);
            //dato=data.length;
            tabla='<table class="table table-bordered table-hover table-sm">';
            tabla+='<tr><td>Apellido paterno</td><td>'+data.APEPAT+'</td></tr>';
            tabla+='<tr><td>Apellido materno</td><td>'+data.APEMAT+'</td></tr>';
            tabla+='<tr><td>Nombres</td><td>'+data.NOMBRES+'</td></tr>';
            tabla+='<tr><td>Tipo documento</td><td>'+data.DOCU_TIP+'</td></tr>';
            tabla+='<tr><td>Numero documento</td><td>'+data.DOCU_NUM+'</td></tr>';
            tabla+='<tr><td>Nivel</td><td>'+data.NIVEL+'</td></tr>';
            tabla+='<tr><td>Nombre de Institucion Educativa</td><td>'+data.NOMBRE_IE+'</td></tr>';
            tabla+='<tr><td>Nombre titulo</td><td>'+data.NOMBRE_TITU+'</td></tr>';
            tabla+='<tr><td>Numero de titulo</td><td>'+data.NUM_TITU+'</td></tr>';
            tabla+='<tr><td>Region</td><td>'+data.PAIS_REGION+'</td></tr>';
            tabla+='<tr><td>Fecha titulo</td><td>'+data.TITU_FEC+'</td></tr>';

            tabla+='</tbody></table>';
            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta Grados y Títulos de Institutos Tecnológicos y Pedagógicos');
            // // // ocultamos modal       
            $('#gradotitinsttecnyped').modal('hide')          
            $('.overlay').hide();
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#gradotitinsttecnyped').modal('hide') 
                      }

  });
}

function antecedentejudicial()
{
  var appat=$("#apepataj").val();
  var apmat=$("#apemataj").val();
  var nombres=$("#nombreaj").val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('antecedentejudicial') }}/'+appat+'/'+apmat+'/'+nombres,
          dataType: "json",
          // data:{cruc:valruc},
          success:function(data)
          {  
            console.log(data);
            tabla='<table class="table table-bordered table-hover table-sm">';
            tabla+='<tr><td>Resultado</td><td>'+data.getAntecedenteJudicialReturn+'</td></tr>';

            tabla+='<tr class="bg-info"><td colspan="2">Leyenda</td></tr>';
            tabla+='<tr><td>Observado:</td><td>Existen coincidencias con nombres de internos</td></tr>';
            tabla+='<tr><td>No registra antecedentes judiciales:</td><td>No tiene coincidencias</td></tr>';
            tabla+='</table>';
            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta Antecedentes Judiciales');
            // // // ocultamos modal       
            $('#antejudicial').modal('hide')          
            $('.overlay').hide();
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#antejudicial').modal('hide')
                      }

  });
}

// keyup para antecedente judicial
$("#dniaj").keyup(function() {//keypress -> para cuando realiza enter en el btn guardar 
  $("#btnantejudi").prop('disabled',true)
           var valdni = $('#dniaj').val();
           var cantcaracter=$('#dniaj').val().length;
           $('.overlay').show();
           if(cantcaracter==8)
           {
              $.ajax({
                           type:'GET',
                           url:'{{ url('reniec') }}/'+valdni,
                           dataType: "json",
                           //data:{cruc:valruc},
                           success:function(data)
                           {  
                            // nombre=data.prenombres + ' ' + data.apPrimer + ' ' + data.apSegundo;
                            $("#apepataj").val(data.apPrimer);
                            $("#apemataj").val(data.apSegundo);
                            $("#nombreaj").val(data.prenombres);
                            $('.overlay').hide();
                            $("#btnantejudi").prop('disabled',false)
                            }
                            

                    });
           }



      //alert("presionaste enter");
    });
function proveedoradjudicadoxexpediente()
{
  var exp=$("#proveadjxexpediente").val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('proveedoradjudicadoxexpediente') }}/'+exp,
          dataType: "json",
          // data:{cruc:valruc},
          success:function(data)
          {  
            console.log(data);
            //dato=data.length;
            tabla='<table class="table table-bordered table-sm table-hover">';
            
            tabla+="<tr><td>Identificador de propuesta:</td><td>"+data.idPropuesta+"</td></tr>";
            tabla+="<tr style='background:#ccc;'><td>Expediente:</td><td>"+data.idExpediente+"</td></tr>";
            tabla+="<tr><td>Ruc:</td><td>"+data.ruc+"</td></tr>";
            tabla+="<tr><td>Nombre Razon social:</td><td>"+data.nombreRazonSocial+"</td></tr>";
            tabla+="<tr><td>Proveedor que presenta propuesta en consorcio:</td><td>"+data.esConsorcio+"</td></tr>";
            tabla+="<tr><td>RUC de la entidad convocante:</td><td>"+data.rucEntidadConvocante+"</td></tr>";
            tabla+="<tr><td>Nombre de la entidad convocante:</td><td>"+data.nombreEntidadConvocante+"</td></tr>";
            tabla+="<tr><td>Nomenclatura del procedimiento de selección:</td><td>"+data.nomenclaturaProceso+"</td></tr>";
            tabla+="<tr><td>Tipo de compra o selección:</td><td>"+data.tipoCompraSeleccion+"</td></tr>";
            tabla+="<tr><td>objetoContratacion:</td><td>"+data.objetoContratacion+"</td></tr>";
            tabla+="<tr><td>descripcionObjetoContratacion:</td><td>"+data.descripcionObjetoContratacion+"</td></tr>";
            tabla+="<tr><td>Nombre de moneda:</td><td>"+data.moneda+"</td></tr>";
            tabla+="<tr><td>Monto del valor referencial:</td><td>"+data.valorReferencial+"</td></tr>";
            tabla+="<tr><td>Monto del valor referencial equivalente en soles:</td><td>"+data.valorReferencialEnSoles+"</td></tr>";
            tabla+="<tr><td>Monto del valor adjudicado:</td><td>"+data.valorAdjudicadoTotal+"</td></tr>";
            tabla+="<tr><td>Monto del valor adjudicado equivalente en soles:</td><td>"+data.valorAdjudicadoTotalEnSoles+"</td></tr>";
            tabla+="<tr><td>Fecha y hora de la publicación del proceso:</td><td>"+data.fechaYHoraPublicacion+"</td></tr>";
            tabla+="<tr><td>Fecha y hora de la publicación en caso el procedimiento el procedimiento de selección haya sufrido una nulidad y posterior reinicio a una etapa distinta a la convocatoria :</td><td>"+data.fechaYHoraPublicacionReinicio+"</td></tr>";

            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta de Proveedores Adjudicados por Expediente');
            // // // // ocultamos modal       
            $('#proveedoradjudicadoxexpe').modal('hide')  
            $('.overlay').hide();       
            
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#proveedoradjudicadoxexpe').modal('hide') 
                      }

  });
}
function proveeadjxrucyanio()
{
  var ruc=$("#rucproveeadj").val();
  var anio=$("#anioproveeadj").val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('proveeadjxrucyanio') }}/'+ruc+'/'+anio,
          dataType: "json",
          // data:{cruc:valruc},
          success:function(data)
          {  
            //console.log(data);
            //dato=data.length;
            tabla='<table class="table table-bordered table-sm table-hover">';
            
            tabla+="<tr><td>Identificador de propuesta:</td><td>"+data.idPropuesta+"</td></tr>";
            tabla+="<tr style='background:#ccc;'><td>Expediente:</td><td>"+data.idExpediente+"</td></tr>";
            tabla+="<tr><td>Ruc:</td><td>"+data.ruc+"</td></tr>";
            tabla+="<tr><td>Nombre Razon social:</td><td>"+data.nombreRazonSocial+"</td></tr>";
            tabla+="<tr><td>Proveedor que presenta propuesta en consorcio:</td><td>"+data.esConsorcio+"</td></tr>";
            tabla+="<tr><td>RUC de la entidad convocante:</td><td>"+data.rucEntidadConvocante+"</td></tr>";
            tabla+="<tr><td>Nombre de la entidad convocante:</td><td>"+data.nombreEntidadConvocante+"</td></tr>";
            tabla+="<tr><td>Nomenclatura del procedimiento de selección:</td><td>"+data.nomenclaturaProceso+"</td></tr>";
            tabla+="<tr><td>Tipo de compra o selección:</td><td>"+data.tipoCompraSeleccion+"</td></tr>";
            tabla+="<tr><td>objetoContratacion:</td><td>"+data.objetoContratacion+"</td></tr>";
            tabla+="<tr><td>descripcionObjetoContratacion:</td><td>"+data.descripcionObjetoContratacion+"</td></tr>";
            tabla+="<tr><td>Nombre de moneda:</td><td>"+data.moneda+"</td></tr>";
            tabla+="<tr><td>Monto del valor referencial:</td><td>"+data.valorReferencial+"</td></tr>";
            tabla+="<tr><td>Monto del valor referencial equivalente en soles:</td><td>"+data.valorReferencialEnSoles+"</td></tr>";
            tabla+="<tr><td>Monto del valor adjudicado:</td><td>"+data.valorAdjudicadoTotal+"</td></tr>";
            tabla+="<tr><td>Monto del valor adjudicado equivalente en soles:</td><td>"+data.valorAdjudicadoTotalEnSoles+"</td></tr>";
            tabla+="<tr><td>Fecha y hora de la publicación del proceso:</td><td>"+data.fechaYHoraPublicacion+"</td></tr>";
            tabla+="<tr><td>Fecha y hora de la publicación en caso el procedimiento el procedimiento de selección haya sufrido una nulidad y posterior reinicio a una etapa distinta a la convocatoria :</td><td>"+data.fechaYHoraPublicacionReinicio+"</td></tr>";

            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta de Proveedores Adjudicados por RUC y AÑO');
            // // // // ocultamos modal       
            $('#proveedoradjudicadoxrucanio').modal('hide')  
            $('.overlay').hide();        
            
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#proveedoradjudicadoxrucanio').modal('hide')
                      }

  });
}
function conadis()
{
  var dni=$("#dniconadis").val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('conadis') }}/'+dni,
          dataType: "json",
          success:function(data)
          {  
            apellidopat=data["ApellidoPaterno"];
            apellidomat=data["ApellidoMaterno"];
            nombre=data["Nombre"];
            estado=data["Estado"];
            fallecido=data["Fallecido"];
            gravedad=data["Gravedad"];

            //alert(apellidopat);
            tabla=`<table class="table table-bordered table-sm table-hover">
            <tr><td class='bg-lightblue disabled color-palette'>DNI</td><td>`+dni+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Apellido paterno</td><td>`+apellidopat+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Apellido materno</td><td>`+apellidomat+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Nombres</td><td>`+nombre+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Estado<br><b>lectura</b>:<br>Si se encuentra Inscrito [0 No, 1 Inscrito]</td><td>`+estado+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Fallecido</td><td>`+fallecido+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Gravedad<br><b>lectura</b>:<br>Nivel de Gravedad [1. Entero, 2 Moderado, 3 Severo, 9 NEP]</td><td>`+gravedad+`</td></tr>
            
            </table>`;

            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta CONADIS');
            // // // ocultamos modal       
            $('#conadis').modal('hide')          
            $('.overlay').hide();;
            
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#conadis').modal('hide')
                      }

  });
}
//
function juntos()
{
  var dni=$("#dnijuntos").val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('juntos') }}/'+dni,
          dataType: "json",
          success:function(data)
          {  
            apellidopat=data["primerApellido"];
            apellidomat=data["segundoApellido"];
            nombre=data["nombres"];
            ut=data["ut"];
            

            //alert(apellidopat);
            tabla=`<table class="table table-bordered table-sm table-hover">
            <tr><td class='bg-lightblue disabled color-palette'>DNI</td><td>`+dni+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Apellido paterno</td><td>`+apellidopat+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Apellido materno</td><td>`+apellidomat+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Nombres</td><td>`+nombre+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>Unidad Territorial</td><td>`+ut+`</td></tr>
            
            
            </table>`;

            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta JUNTOS');
                  
            $('#juntos').modal('hide'); 
            $('.overlay').hide();
            
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#juntos').modal('hide'); 
                      }

  });
}

function pension65()
{
  var dni=$("#dnipension65").val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'{{ url('pension') }}/'+dni,
          dataType: "json",
          success:function(data)
          {  
            anho=data["anho"];
            dni=data["dni"];
            //header=data["header"];
            localidad=data["localidad"];
            periodo=data["periodo"];
            puntoPago=data["puntoPago"];
            totalRegistros=data["totalRegistros"];

            // alert(data['dni']);
            tabla=`<table class="table table-bordered table-sm table-hover">
            <tr><td class='bg-lightblue disabled color-palette'>año</td><td>`+anho+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>DNI paterno</td><td>`+dni+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>LOCALIDAD</td><td>`+localidad+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>PERIODO</td><td>`+periodo+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>PUNTO DE PAGO</td><td>`+puntoPago+`</td></tr>
            <tr><td class='bg-lightblue disabled color-palette'>TOTAL REGISTROS</td><td>`+totalRegistros+`</td></tr>
            
            </table>`;

            $('.resultado').html(tabla);
            $('#textoresul').html(' - Consulta PENSION65');
                  
            $('#pension65').modal('hide'); 
            $('.overlay').hide();
            
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#pension65').modal('hide');
                      }

  });
}

function qaliwarma()
{
  departamneto=$("#depart").val();
  provincia=$("#prov").val();
  distrito=$("#dist").val();
  nivel=$("#niveducat").val();
  $('.overlay').show();
  $.ajax({
          type:'GET',
          url:'qaliwarma?depa='+departamneto+'&prov='+provincia+'&dist='+distrito+'&nivel='+nivel,
          dataType: "json",
          success:function(data)
          {  
            lista=data.getIIEEsResponse.getIIEEsResult;
            dato=lista.listIIEEsResponse.BE_IIEEsEntity
            //alert(dato.length);
            // alert(data['dni']);
            tabla1='<table class="table table-bordered table-sm table-hover">';
            tabla1='';
            cantidad=dato.length;
            //alert(dato[0].centro_poblado)
            for(i=0;i<cantidad;i++)
            {tabla1+='<tr><td>';

                tabla='<table class="table table-sm">';
                tabla+="<tr><td>Anexo:</td><td>"+dato[i].anexo+"</td></tr>";
                tabla+="<tr class='bg-info'><td>centro poblado:</td><td>"+dato[i].centro_poblado+"</td></tr>";
                tabla+="<tr><td>Codigo modular:</td><td>"+dato[i].cod_modular+"</td></tr>";
                tabla+="<tr><td>Departamento:</td><td>"+dato[i].departamento+"</td></tr>";
                tabla+="<tr><td>Provincia:</td><td>"+dato[i].provincia+"</td></tr>";
                tabla+="<tr><td>Distrito:</td><td>"+dato[i].direccion+"</td></tr>";
                tabla+="<tr><td>Direccción:</td><td>"+dato[i].distrito+"</td></tr>";
                tabla+="<tr><td>Modalidad de atención:</td><td>"+dato[i].modalidad_atencion+"</td></tr>";
                tabla+="<tr><td>Nivel educativo:</td><td>"+dato[i].nivel_educativo+"</td></tr>";
                tabla+="<tr><td>Nombre:</td><td>"+dato[i].nombre+"</td></tr>";
                tabla+="<tr><td>Numero de alumnos:</td><td>"+dato[i].nro_alumnos+"</td></tr>";
                tabla+="<tr><td>RDE:</td><td>"+dato[i].rde+"</td></tr>";
                tabla+="<tr><td>Ubigeo:</td><td>"+dato[i].ubigeo+"</td></tr>";
                tabla+="</table>";

                tabla1+=tabla+'</td></tr>';
                
            }
            tabla1+='</table>';
            
           text="Cantidad de resultado:"+cantidad+"<br>"+tabla1;

            $('.resultado').html(text);
            $('#textoresul').html(' - Consulta de Qaliwarma');
            // ocultamos modal       
            $('#Qaliwarma').modal('hide') 
            $('.overlay').hide();
            
          },
              error: function(e){
                $('.resultado').html('No se pudo conectar al PIDE*(Plataforma de Interoperabilidad del Estado)');
                $('.overlay').hide();
                $('#Qaliwarma').modal('hide') 
                      }

  });
}
// para desarrollador
function desarrollador()
{
  $('.overlay').show();
  tabla='<table class="table table-bordered table-sm table-hover">';
            
            tabla+="<tr><td>1</td><td><spam class='badge badge-primary'>RENIEC</spam>:<small>http://goredigital.regionhuanuco.gob.pe/reniec/<b>nrodni<b></small></td></tr>";
            tabla+="<tr><td>2</td><td><spam class='badge badge-primary'>SIS</spam>:<small>:<small>http://goredigital.regionhuanuco.gob.pe/sis/<b>nrodni<b></small></td></tr>";
            tabla+="<tr><td>3</td><td><small class='badge badge-primary'>ESSALUD</small>:<small>http://goredigital.regionhuanuco.gob.pe/essalud/<b>nrodni<b></small></td></tr>";
            tabla+="<tr><td>4</td><td><small class='badge badge-primary'>SUNAT</small>:<small>http://goredigital.regionhuanuco.gob.pe/sunat/<b>nruc<b></small></td></tr>";
            tabla+="<tr><td>5</td><td><small class='badge badge-primary'>Antecedentes judiciales:</small>:<small>http://goredigital.regionhuanuco.gob.pe/antecedentejudicial/<b>Appaterno</b>/<b>Apmaterno</b>/<b>Nombres</b></small></td></tr>";
            tabla+="<tr><td>6</td><td><small class='badge badge-primary'>SUNARP</small>:<small class='text-danger'>En adecuacion por cambio de webservice en la PIDE</small></td></tr>";
            tabla+="<tr><td>7</td><td><small class='badge badge-warning'>PROVEEDOR SANCIONADO-OSCE</small>:<small>http://goredigital.regionhuanuco.gob.pe/proveedorsancionado/<b>nruc<b></small></td></tr>";
            tabla+="<tr><td>8</td><td><small class='badge badge-warning'>Proceso seleccion por expediente-OSCE</small>:<small>http://goredigital.regionhuanuco.gob.pe/busprocselxexpediente/<b>Nroexpediente<b></small></td></tr>";
            tabla+="<tr><td>9</td><td><small class='badge badge-warning'>Proceso seleccion (Ruc,mes y año) -OSCE</small>:<small>http://goredigital.regionhuanuco.gob.pe/busprocselxrucaniomes//<b>ruc</b>/<b>año</b>/<b>Nromes</b></small></td></td></tr>";
            tabla+="<tr><td>10</td><td><small class='badge badge-warning'>Proveedor adjudicado por expediente-OSCE</small>:<small>http://goredigital.regionhuanuco.gob.pe/proveedoradjudicadoxexpediente/<b>Nroexpediente<b></small></td></td></tr>";
            tabla+="<tr><td>11</td><td><small class='badge badge-warning'>Proveedor adjudicado por Ruc y Año-OSCE</small>:<small>http://goredigital.regionhuanuco.gob.pe/proveeadjxrucyanio/<b>Ruc<b>/<b>Año<b></small></td></td></tr>";
            tabla+="<tr><td>12</td><td><small class='badge badge-info'>SUNEDU</small>:<small>http://goredigital.regionhuanuco.gob.pe/sunedu/<b>Nrodni<b></small></td></td></tr>";
            tabla+="<tr><td>13</td><td><small class='badge badge-info'>GRADOS Y TITULOS DE INSTITUTOS TECNOLOGICOS Y PEDAGOGICOS POR DNI</small>:<small>http://goredigital.regionhuanuco.gob.pe/gradoinstituto/<b>Nrodni<b></small></td></td></tr>";
            tabla+="<tr><td>14</td><td><small class='badge badge-info'>Información de colegio nacional y particular</small>:<small>http://goredigital.regionhuanuco.gob.pe/infocolnacioparticular/<b>Codmodular<b></small></td></td></tr>";
            tabla+="<tr><td>15</td><td><small class='badge badge-danger'>CONADIS</small>:<small>http://goredigital.regionhuanuco.gob.pe/conadis/<b>Nrodni<b></small></td></td></tr>";
            tabla+="<tr><td>16</td><td><small class='badge badge-danger'>PROGRAMA JUNTOS</small>:<small>http://goredigital.regionhuanuco.gob.pe/juntos/<b>Nrodni<b></small></td></td></tr>";
            tabla+="<tr><td>17</td><td><small class='badge badge-danger'>PENSION 65</small>:<small>http://goredigital.regionhuanuco.gob.pe/pension/<b>Nrodni<b></small></td></td></tr>";
            tabla+="<tr><td>18</td><td><small class='badge badge-danger'>QALIWARMA</small>:<small>http://goredigital.regionhuanuco.gob.pe/qaliwarma?depa=HUANUCO&prov=HUANUCO&dist=HUANUCO&nivel=SECUNDARIA(INICIAL,PRIMARIA,SECUNDARIA)</small></td></td></tr>";

            $('.resultado').html(tabla);
            $('#textoresul').html(' - Integracion para el  desarrollador');
            $('.overlay').hide();

}
</script>
@endsection

