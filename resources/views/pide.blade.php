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
          <h1 class="m-0">Relacion de personal activos</h1>
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
    <div class="row">
        <div class="col-sm-7">
            <div class="card card-gray">
                <div class="card-header p-2">
                  <h3 class="card-title">Relacion de servicios PIDE(Plataforma de Interoperabilidad del Estado)</h3>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-outline-primary btn-xs" data-toggle="modal" data-target="#reniec">
                                <i class="fas fa-inbox fa-2x"></i><br> Reniec</button>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-outline-primary btn-xs" data-toggle="modal" data-target="#sis">
                                <i class="fa fa-heartbeat fa-2x"></i><br> Sistema Integrado de Salud(SIS)</button>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-outline-primary btn-xs" data-toggle="modal" data-target="#essalud">
                                <i class="fa fa-ambulance fa-2x"></i><br> ESSALUD</button>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-outline-primary btn-xs" data-toggle="modal" data-target="#sunat">
                                <i class="fa fa-leaf fa-2x"></i><br> SUNAT</button>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-outline-primary btn-xs" data-toggle="modal" data-target="#antejudicial">
                                <i class="fa fa-flask fa-2x"></i><br>  Antecedentes judiciales</button>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-outline-primary btn-xs">
                                <i class="fa fa-leaf fa-2x"></i><br> Sunarp</button>
                        </div>
                       
                        
                    </div>
                    <div class="row pt-2">
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#proveedorsancionado">
                                <i class="fa fa-gavel fa-2x"></i><br>  PROVEEDOR SANCIONADO-OSCE</button>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#busprocselxexpediente">
                                <i class="fa fa-gavel fa-2x"></i><br>  Proceso seleccion por expediente-OSCE</button>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#busprocselrucaniomes">
                                <i class="fa fa-gavel fa-2x"></i><br>  Proceso seleccion(Ruc,mes y año) -OSCE</button>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#proveedoradjudicadoxexpe">
                                <i class="fa fa-gavel fa-2x"></i><br>  Proveedor adjudicado por expediente</button>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#proveedoradjudicadoxrucanio">
                                <i class="fa fa-gavel fa-2x"></i><br>  Proveedor adjudicado por Ruc y Año</button>
                        </div>
                        {{-- sobra uno --}}
                    </div>
                    <div class="row pt-2">
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-outline-info btn-xs" data-toggle="modal" data-target="#sunedu">
                                <i class="fa fa-university fa-2x"></i><br> SUNEDU</button>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-outline-info btn-xs" data-toggle="modal" data-target="#gradotitinsttecnyped">
                                <i class="fa fa-home fa-2x"></i><br> Grados y Títulos de Institutos Tecnológicos y Pedagógicos por DNI</button>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <button type="button" class="btn btn-block btn-outline-info btn-xs" data-toggle="modal" data-target="#infocolnacioparticular">
                                <i class="fa fa-book fa-2x"></i><br> Información de colegio nacional y particular</button>
                        </div>
                        
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header">Resultados</div>
                <div class="card-body">
                    ....
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal sistemas--}}


{{-- modal RENIEC --}}
<div class="modal fade" id="reniec">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Consulta DNI</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form class="form">
              <div class="modal-body">                  
                      <div class="form-group">
                          <label for="exampleInputEmail1">Ingresar DNI</label>
                          <input type="number" class="form-control"  placeholder="INGERSAR NUMERO DE DNI" id="ndni">
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
        <h4 class="modal-title">Consulta SIS</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar DNI</label>
                        <input type="number" class="form-control"  placeholder="INGERSAR NUMERO DE DNI" id="numdni">
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
        <h4 class="modal-title">Consulta ESSALUD</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar DNI</label>
                        <input type="number" class="form-control"  placeholder="INGERSAR NUMERO DE DNI" id="essaluddni">
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
        <h4 class="modal-title">Consulta SUNAT</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar RUC</label>
                        <input type="number" class="form-control"  placeholder="INGERSAR NUMERO DE RUC" id="ruc">
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
        <h4 class="modal-title">Consulta SUNEDU</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar DNI</label>
                        <input type="number" class="form-control"  placeholder="INGERSAR NUMERO DE DNI" id="dnisunedu">
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
        <h4 class="modal-title">Consulta estado Proveedor</h4>
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
                        <input type="number" class="form-control"  placeholder="INGERSAR NUMERO DE RUC" id="rucsancionado">
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
        <h4 class="modal-title">Consulta proceso de seleccion</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar Expediente(Ejemplo:429538)</label>
                        <input type="number" class="form-control"  placeholder="INGERSAR NUMERO DE EXPEDIENTE" id="expedinteproceso">
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
        <h4 class="modal-title">Consulta proceso de seleccion</h4>
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
                        <input type="number" class="form-control"  placeholder="INGERSAR NUMERO DE RUC" id="rucprocesosel">
                    </div>
                    <div class="form-group">
                     <div class="row">
                       <div class="col-sm-6">
                        <label for="exampleInputEmail1">Año</label>
                        
                        <select class="form-control" id="anioproc">
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
                        <select class="form-control" id="procmes">
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
        <h4 class="modal-title">Información de colegio nacional y particular</h4>
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
                        <input type="number" class="form-control"  placeholder="INGERSAR EL CÓDIGO" id="codmod">
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
        <h4 class="modal-title">Consulta Grados y Títulos de Institutos Tecnológicos y Pedagógicos por DNI</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar DNI(ejemplo:47643796)</label>
                        <input type="number" class="form-control"  placeholder="INGERSAR NUMERO DE DNI" id="dniinstitutos">
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
        <h4 class="modal-title">Consulta Antecedentes Judiciales </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">

                  <div class="form-group">
                      <label for="exampleInputEmail1">Ingrese su DNI</label>
                      <input type="number" class="form-control"  placeholder="Ingresar Apellido Paterno" id="dniaj">
                  </div>                
                  <div class="form-group" style="display: none;">
                      <label for="exampleInputEmail1">Apellido Paterno</label>
                      <input type="hidden" class="form-control"  placeholder="Ingresar Apellido Paterno" id="apepataj">
                  </div> 
                  <div class="form-group" style="display: none;">
                    <label for="exampleInputEmail1">Apellido Materno</label>
                    <input type="hidden" class="form-control"  placeholder="Ingresar Apellido Materno" id="apemataj">
                  </div> 
                  <div class="form-group" style="display: none;">
                      <label for="exampleInputEmail1">Nombres</label>
                      <input type="hidden" class="form-control"  placeholder="Ingresar Nombres" id="nombreaj">
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
        <h4 class="modal-title">Proveedor adjudicado por expediente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form">
            <div class="modal-body">                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ingresar Expediente(Ejemplo:445241)</label>
                        <input type="number" class="form-control"  placeholder="INGERSAR NUMERO DE EXPEDIENTE" id="proveadjxexpediente">
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
        <h4 class="modal-title">Proveedor adjudicado por Ruc y Año</h4>
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
                          <input type="number" class="form-control"  placeholder="INGERSAR NUMERO DE RUC" id="rucproveeadj">
                       </div>
                       <div class="col-sm-6">
                        <label for="exampleInputEmail1">Año</label>
                        
                        <select class="form-control" id="anioproveeadj">
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
@endsection
