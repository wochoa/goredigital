<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                        {{-- <div class="col-sm-6">
                    Esta plataforma tambien le permite generar expedientes tal como lo realiza el sistema de SGD
                </div>   --}}
                
                <div class="col-sm-6">
                    <div class="input-group input-group-sm">
                        <input type="number" class="form-control" placeholder="Ingresar Reg. expediente" wire:model="expediente" autofocus>
                        <span class="input-group-append">
                        <button type="button" class="btn btn-info btn-flat" wire:click="busexpediente"> <i class="fa fa-search"></i> Buscar expediente</button>
                        <a href="http://digital.regionhuanuco.gob.pe/tramite/enproceso/create" class="btn btn-primary btn-xs btn-flat ml-2" target="_blank"><i class="fa fa-file"></i> Crear expediente con SGD</a>
                         </span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-xs btn-danger  float-right ml-2" href="{{ route('controlexpedientes') }}"><i class="far fa-hand-point-right"></i> ir al control de expedientes</a>
                </div>
            </div>
            <div class="row">
                @if(count($array_expedientes)>0)                             
                <div class="card mt-2">
                    <div class="card-header">
                        Resultados
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-condensed table-hover table-sm">
                            <thead>
                                <tr class="bg-gray">
                                    <th style="width: 5%;"><small>Registro</small></th>
                                    <th style="width: 6%;"><small>Fecha</small></th>
                                    <th style="width: 20%;"><small>Documento</small></th>
                                    <th style="width: 29%;"><small>Asunto</small></th>
                                    <th style="width: 15%;"><small>Firma</small></th>
                                    <th style="width: 25%"><small>Unidad Org.</small></th>
                                    <th style="width:10%" nowrap><small>Inicio PAD</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($array_expedientes as $key)
                                    <tr>
                                        @php
                                           $urlregdocumento='http://digital.regionhuanuco.gob.pe/tramite/buscar/buscarModal/'.$key->iddocumento;
                                        @endphp
                                        <td><small><a href="#" onclick="abrirPopupSolicitado('{!! $urlregdocumento !!}')">{{ $key->iddocumento }}</a></small></td>
                                        <td><small>{{ date('d/m/Y', strtotime($key->docu_fecha_doc)) }}</small></td>
                                        <td><small>{{ Descri::nombre_documento($key->docu_idtipodocumento) }} N°00{{ $key->docu_numero_doc }} - {{date('Y',strtotime($key->docu_fecha_doc))  }} - {{ $key->docu_siglas_doc }}</small></td>
                                        <td><small>{{ $key->docu_asunto }}</small></td>
                                        <td><small>{{ $key->docu_firma }}</small></td>
                                        <td><small>{{ Descri::nombre_oficina($key->docu_iddependencia) }}</small></td>
                                        <td><button class="btn btn-warning btn-xs" wire:click.prevent="iniciarpad({{ $key->docu_idexma }})"><small>Iniciar</small></button></td>
                                    </tr>
                                {{-- @empty
                                .. --}}
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                        <button type="button" class="btn btn-primary">Registrar denuncias</button>
                    </div>
                </div>
                @endif
           
            </div>
    </div>
</div>
@section('script')
<script>



  Livewire.on('regdoc', url => {

      abrirPopupSolicitado(url);
  });

function abrirPopupSolicitado(url) {
  var ancho = window.innerWidth;
  var alto = window.innerHeight;  
  let referenciaObjetoVentana;
  const strCaracteristicasVentana = "scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=700,height="+alto+",left=100,top=0"
  referenciaObjetoVentana = window.open(url, "fCC_WindowName", strCaracteristicasVentana);
}


</script>
@endsection
