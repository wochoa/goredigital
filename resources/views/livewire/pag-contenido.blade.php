<div>
    {{-- Success is as dangerous as failure. --}}
    
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Bienvenido, {{ Auth::user()->adm_name }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Nuevo Ticket</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
  <!-- /.content-header -->
    <div class="container-fluid">
        {{-- <div class="row justify-content-center"> --}}
        <div class="row">
            <div class="col-md-3">

                <div class="info-box bg-secondary">
                    <div class="info-box-content">
                        <h4 style="text-align: center">Creacion de Ticket</h4>
                    <p>Estimado usuario, esta plataforma es para poder ayudarlo mediante ticket y el personal indicado coordinará con Usted.</p>
                    @can('Ticket_crear')
                    <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#sistemas"><i class="fas fa-cog"></i> Crea su Ticket para recibir ayuda</button>
                    @endcan
                    </div>
                    <!-- /.info-box-content -->
                </div>

                <div class="card card-info collapsed-card">
                    <div class="card-header p-2">
                        <h3 class="card-title">Ver colaboradores de soporte.</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p>Personal encargado de dar soporte en temas de redes, sistemas, acceso y equipos tecnológicos</p>
                        <table class="table table-sm">
                            @foreach($usersoporte as $keyuser)
                            <tr><td class="list-inline-item"><img alt="Avatar" class="table-avatar" src="{{ Storage::url($keyuser->avatar) }}" width="20"></td><td><small>{{ $keyuser->adm_name }} {{ $keyuser->adm_lastname }} <spa class=" badge badge-info float-right">{{ $keyuser->adm_telefono }}</span></small> </td></tr>
                            @endforeach
                        
                        {{-- <tr><td class="list-inline-item"><img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png" width="20"></td><td>Adolfo H. Carlos Mendoza</td></tr>
                        <tr><td class="list-inline-item"><img alt="Avatar" class="table-avatar" src="../../dist/img/avatar5.png" width="20"></td><td>Andres Duran Espinoza</td></tr> --}}
                        </table>
                        {{-- <hr> --}}
                        {{-- <h5 class="text-warning">SOPORTE SISTEMAS</h5>
                        <table>
                        <tr><td class="list-inline-item"><img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png" width="20"></td><td>Darwin F. Campos Soto</td></tr>
                        <tr><td class="list-inline-item"><img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png" width="20"></td><td>Pedro Cardozo Zanabria</td></tr>
                        <tr><td class="list-inline-item"><img alt="Avatar" class="table-avatar" src="../../dist/img/avatar5.png" width="20"></td><td>Wilmer Ochoa Alvarado</td></tr>
                        </table> --}}
                    </div>
                <!-- /.card-body -->
                </div>
                @if($ticketenproceso+$ticketpendiente+$ticketatendido<>0)
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Total de atenciones</h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="progress-group">
                            <span class="progress-text">Atendido</span>
                            <span class="float-right"><b>{{ $ticketatendido }}</b>/{{ $ticketenproceso+$ticketpendiente+$ticketatendido }}</span>
                            <div class="progress progress-sm">
                              <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: {{ round($ticketatendido*100/($ticketenproceso+$ticketpendiente+$ticketatendido),0) }}%">{{ round($ticketatendido*100/($ticketenproceso+$ticketpendiente+$ticketatendido),0) }}%</div>
                            </div>
                        </div>
                        <div class="progress-group">
                            <span class="progress-text">En proceso</span>
                            <span class="float-right"><b>{{ $ticketenproceso }}</b>/{{ $ticketenproceso+$ticketpendiente+$ticketatendido }}</span>
                            <div class="progress progress-sm">
                              <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" style="width: {{ round($ticketenproceso*100/($ticketenproceso+$ticketpendiente+$ticketatendido),0) }}%">{{ round($ticketenproceso*100/($ticketenproceso+$ticketpendiente+$ticketatendido),0) }}%</div>
                            </div>
                        </div>
                        <div class="progress-group">
                            <span class="progress-text">Por atender</span>
                            <span class="float-right"><b>{{ $ticketpendiente }}</b>/{{ $ticketenproceso+$ticketpendiente+$ticketatendido }}</span>
                            <div class="progress progress-sm">
                              <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: {{ round($ticketpendiente*100/($ticketenproceso+$ticketpendiente+$ticketatendido),0) }}%">{{ round($ticketpendiente*100/($ticketenproceso+$ticketpendiente+$ticketatendido),0) }}%</div>
                            </div>
                        </div>

                        {{-- <div id="chart">

                        </div> --}}
                    </div>
                    <!-- /.card-body -->
                    

                    
                </div>
                  <!-- /.card -->  
                @endif
                
            

                
            </div>
            @if(count($ticketcreados)>0)
            <div class="col-md-9 col-sm-12 ">   
               <div class="card ">
                  <div class="card-header bg-secondary">
                    Ticket en atención y por atender
                  </div>
                  <div class="card-body">
                       <div class="table-responsive">
                           <table class="table table-bordered table-hover table-sm table-striped" style="z-index: -1">
                               <thead class="bg-secondary">
                                   <tr><td>CODIGO</td><td>USUARIO|UNIDAD|CARGO</td><td>DETALLE PEDIDO</td><td>FECHA</td><td></td></tr>
                               </thead>
                               <tbody>
                                   {{-- <tr><td></td><td></td></tr> --}}
                                   @foreach($ticketcreados as $tickets)
                                           @switch($tickets->estado_atencion)
                                               @case('ENVIADO')
                                                    @php 
                                                            $estado='<span class="right badge badge-danger">ESTADO: '.$tickets->estado_atencion.'</span><br><small><strong>TIPO PRIORIDAD</strong> : '.$tickets->prioridad.'</small>'; 
                                                            $boton='<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#recpecionar" wire:click="validticket('.$tickets->idticket.')">Recepcionar</button>';
                                                            $fecharecpcion='';
                                                            $tiemportranscurrido='';
                                                    @endphp
                                                   @break
                                               @case('RECEPCIONADO')
                                                    @php           
                                                    $creado = Carbon\Carbon::parse($tickets->fechaticket);
                                                    $recpecionadoss = Carbon\Carbon::parse($tickets->fecha_recepcion);
                                                    $fechaatendido=$creado->diffInDays($recpecionadoss);

                                                            $estado='<span class="right badge badge-primary">ESTADO: '.$tickets->estado_atencion.'</span><br><small><strong>TIPO PRIORIDAD</strong> : '.$tickets->prioridad.'</small><br><small><strong>Será atendido por</strong> : '.$tickets->nombre_atencion.'</small>';
                                                    
                                                            //$boton='<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#atender" wire:click="validticket('.$tickets->idticket.')">Finalizar</button>';
                                                            $boton2='<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#atender" wire:click="validticket('.$tickets->idticket.')">Finalizar</button>';
                                                            $fecharecpcion='<br><small> <strong>Recepción: </strong>'.date("d M g:ia", strtotime($tickets->fecha_recepcion)).'</small>';
                                                            $tiemportranscurrido='<br><small> <strong>Transcurrido: </strong>'.$fechaatendido.' dias</small>';
                                                    @endphp
                                                   @break
                                                   
                                           @endswitch
                                           {{-- yo mismo no me puedo atender --}}
                                           @if($tickets->iduser==Auth::user()->id)
                                                       <tr class="bg-gray disabled color-palette"><td>{{ str_pad($tickets->idticket,6,"0",STR_PAD_LEFT)  }} </td>
                                                            <td><small><strong>Usuario</strong>:{{ $tickets->nombre_pedido }},</small><small class="right badge badge-primary"><strong>Celular:</strong>{{ $tickets->adm_telefono }}</small><br>
                                                                <small><strong>cargo</strong>: {{ $tickets->adm_cargo }}</small><br>
                                                                <small> <strong>Unidad</strong>: {{ $tickets->depe_nombre }}</small></td>
                                                            <td>{!! $estado??'' !!}<br><small><strong>Pedido: </strong>{{ $tickets->detalleayuda }}</small></td>
                                                            <td><small><strong>Registrado: </strong> {{ date("d M g:ia", strtotime($tickets->fechaticket)) }}</small><span class="right badge badge-info">{{ $diff = Carbon\Carbon::parse($tickets->fechaticket)->diffForHumans() }}</span>{!! $fecharecpcion !!}{!! $tiemportranscurrido !!}</td>
                                                           <td>
                                                               {{-- solo los que hacen soporte o administrador o superadmin pueden recepcionar el tramite --}}
                                                               {{-- @if($tickets->idsoporte==Auth::user()->id)
                                                                    @hasanyrole('Superadmin|Soporte|Administrador') 
                                                                    {!! $boton ?? ''!!} 

                                                                    @endhasanyrole  
                                                               @endif     --}}
                                                           </td>
                                                       </tr> 
                                                   @else
                                                   <tr><td>{{ str_pad($tickets->idticket,6,"0",STR_PAD_LEFT)  }} </td>
                                                    <td><small><strong>Usuario</strong>:{{ $tickets->nombre_pedido }}, </small><small class="right badge badge-info"><strong>Celular : </strong>{{ $tickets->adm_telefono }}</small><br>
                                                        <small><strong>cargo</strong>: {{ $tickets->adm_cargo }}</small><br>
                                                        <small> <strong>Unidad</strong>: {{ $tickets->depe_nombre }}</small></td>
                                                    <td>{!! $estado??'' !!}<br><small><strong>Pedido: </strong>{{ $tickets->detalleayuda }}</small></td>
                                                    <td><small><strong>Registrado: </strong> {{ date("d M g:ia", strtotime($tickets->fechaticket)) }}</small><span class="right badge badge-info">{{ $diff = Carbon\Carbon::parse($tickets->fechaticket)->diffForHumans() }}</span>{!! $fecharecpcion !!}{!! $tiemportranscurrido !!}</td>
                                                       <td>
                                                        {{-- @hasanyrole('Superadmin|Soporte|Administrador') --}}
                                                                {{-- {!! $boton ?? ''!!}  --}}
                                                                {{-- @else
                                                                    no puedo editar --}}
                                                                {{-- @endhasanyrole      --}}
                                                                @can('Ticket_editar')
                                                                    @if($tickets->idsoporte==Auth::user()->id)
                                                                    
                                                                        {!! $boton2 ?? ''!!}
                                                                       
                                                                    @endif
                                                                    @if($tickets->idsoporte==null)
                                                                    {!! $boton ?? ''!!}
                                                                    @endif
                                                                @endcan
                                                                
                                                       </td>
                                                   </tr>
                                            @endif
                                            
                                   @endforeach

                                   {{-- {{ print_r($ticketcreados) }} --}}
                               </tbody>
                           </table>
                       </div>  
                  </div>
               </div>

            </div>

            @endif
        </div>


    </div>
    {{-- modal atender por administradores--}}
    <div wire:ignore.self class="modal fade" id="atender" >
        <div class="modal-dialog">
        <div class="modal-content p-0">
            <div class="modal-header"><h5 class="modal-title">Atencion | <small>Ticket</small> </h5>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p align="center">Hola, {{ Auth::user()->adm_name }}, estas atendiendo el siguiente Ticket: <strong>{{ str_pad($idticket,6,"0",STR_PAD_LEFT)  }}</strong> <span class="right badge badge-danger">Tipo prioridad : <strong>{{ $prioridadpedido }}</strong></span></p>
                
                <p>Detalle pedido:</p>
                <div class="bg-light disabled color-palette">
                    <P class="p-1">{{ $pedidodetalle }}</P>
                </div>

                <div class="form-group">
                    <label for="">Descripcion de la solucion</label>
                    <textarea name="" rows="4" class="form-control" wire:model="textsolucion"></textarea>
                </div>
                {{-- <small>{{ $solucion }}</small> --}}
            </div>
            <div class="modal-footer justify-content-between">
            <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button  class="btn btn-primary" wire:click="atenderticket({{ Auth::user()->id }},{{ $idticket }})">Finalizar</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- modal recepcionar por administradores--}}
    <div wire:ignore.self class="modal fade" id="recpecionar" >
        <div class="modal-dialog">
        <div class="modal-content p-0">
            <div class="modal-header"><h5 class="modal-title">Recepción | <small>Ticket</small> </h5>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p align="center">Hola, {{ Auth::user()->adm_name }}, está seguro de atender el siguiente Ticket: <strong>{{ str_pad($idticket,6,"0",STR_PAD_LEFT)  }}</strong> <span class="right badge badge-danger">Tipo prioridad : <strong>{{ $prioridadpedido }}</strong></span></p>
                
                <p>Detalle pedido:</p>
                <div class="bg-light disabled color-palette">
                    <P class="p-1">{{ $pedidodetalle }}</P>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button  class="btn btn-primary" wire:click="recepcionarticket({{ Auth::user()->id }},{{ $idticket }})">Recepcionar</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- modal creacion de tcicket nuievo--}}
    <div wire:ignore.self class="modal fade" id="sistemas" >
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Nuevo | <small>Ticket</small> </h5>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <input type="text" value="{{ $iddependencia }}" wire:model="iddependencia" >
                @error('iddependencia') <span class="text-danger">{{ $message }}</span> @enderror --}}
                <div class="form-group">
                    <label>Tipo</label>
                        <select name="" id="" class="custom-select text-sm" wire:model="tipoayuda">
                        <option value="">Seleccion tipo de ayuda...</option>
                        @foreach($problemas as $prob)
                        <option value="{{ $prob->idatencion }}">{{ $prob->problema }}</option> 
                        @endforeach
                        </select>
                        @error('tipoayuda') <span class="text-danger">{{ $message }}</span> @enderror
                        
                </div>
                {{-- <div class="form-group">
                <label>Asunto</label>
                    <input type="text" class="form-control" placeholder="Enter ...">
            </div> --}}
                <div class="form-group">
                    <label>Detalle su pedido para recibir atención</label>
                    <textarea class="form-control form-control-sm" rows="3" placeholder="Detalle su requerimiento de servicio" wire:model="detalle"></textarea>
                    @error('detalle') <span class="text-danger">{{ $message }}</span> @enderror
                    {{-- {{ $detalle }} --}}
                </div>
                <div class="form-group">
                    <label>Prioridad atencion</label>
                    <select class="custom-select text-sm" wire:model="prioridad">
                        <option selected>Seleccione.....</option>
                        <option>Baja</option>
                        <option>Intermedia</option>
                        <option>Alta</option>
                    </select>
                    @error('prioridad') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                {{-- {{ $this->iddependencia }} --}}
                @if($this->iddependencia<>3)
                <div class="form-group row">
                    <div class="col-sm-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="ayudasede" value="3">
                            <label class="form-check-label">Pedir ayuda a la Sede Central del GRH</label>
                          </div>
                    </div>
                </div> 
                @endif
                
            </div>
            <div class="modal-footer justify-content-between">
            <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button  class="btn btn-primary reproductor" wire:click="nuevoticket({{ Auth::user()->id }},{{ Auth::user()->depe_id }})">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
{{-- {{ $ticketenproceso }} --}}
{{-- <button class="reproductor">Reproduce tu audio</button> --}}
<audio src=""></audio>
</div>
@section('script')
<script>
    

    window.livewire.on('saveticket', () => {
        $('#sistemas').modal('hide');
        toastr.success('Fue creado correctamente el Ticket');
        // char({{ $ticketpendiente }},{{ $ticketatendido }},{{ $ticketenproceso }});
    });

</script>

<script>

    window.livewire.on('ticketrecepcion', () => {
        $('#recpecionar').modal('hide');
        toastr.success('Fue Recepcionado correctamente');
        // char({{ $ticketpendiente }},{{ $ticketatendido }},{{ $ticketenproceso }});
    });

</script>
<script>

    window.livewire.on('ticketatendido', () => {
        $('#atender').modal('hide');
        toastr.success('Fue Atendido exitosamente')
        // char({{ $ticketpendiente }},{{ $ticketatendido }},{{ $ticketenproceso }});
    });

</script>

<script>
    // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;
  
      var pusher = new Pusher('a76c31fae9dcda3d79a4', {
        cluster: 'us2'//,
        //forceTLS:true
      });
  
      var channel = pusher.subscribe('ticket-channel');
      channel.bind('ticket-event', function(data) {
        //alert(JSON.stringify(data));
        // char({{ $ticketpendiente }},{{ $ticketatendido }},{{ $ticketenproceso }});
        window.livewire.emit('mostrarTickets',data);
        
      });



  </script>
  
  <script>
      let boton = document.querySelector(".reproductor")
      let audioEtiqueta = document.querySelector("audio")
  
      boton.addEventListener("click", () => {
        audioEtiqueta.setAttribute("src", "dist/img/sms.mp3")
        audioEtiqueta.play()
        console.log(`Reproduciendo: ${audioEtiqueta.src}`)
      })
  </script>
  {{-- <script>

$(document).ready(function() {
    char({{ $ticketpendiente }},{{ $ticketatendido }},{{ $ticketenproceso }});

});
      function char(pendiente,atendido,enproceso)
      {
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = {
            labels: [
            'Pendientes',
            'Atendidos',
            'En proceso'
            ],
            datasets: [
            {
                data: [pendiente, atendido, enproceso],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12']
            }
            ]
        }
        var pieOptions = {
            legend: {
            display: false
            }
        }
        // Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        // eslint-disable-next-line no-unused-vars
        var pieChart = new Chart(pieChartCanvas, {
            type: 'doughnut',
            data: pieData,
            options: pieOptions
        })
      }
  </script> --}}
  {{-- @push('scrit')
    <script>
        var options = {
          series: [44, 55, 41, 17, 15],
          chart: {
          type: 'donut',
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>  
  @endpush --}}
@endsection

