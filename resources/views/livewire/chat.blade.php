<div>
    {{-- Do your work, then step back. --}}
  


  <div class="row">
      <div class="col-sm-4">
        <div class="card card-gray">
            <div class="card-header p-2">
              <h3 class="card-title">Personal por dependencia y unidad</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Dependencia</label>
                    <select class="form-control " style="width: 100%;" wire:click="unidad($event.target.value)">
                      {{-- @if($depe_id<>3)
                      <option value="">Seleccione la dependencia....</option>
                      @else
                      <option selected="selected" value="">Seleccione la dependencia....</option>
                      @endif --}}
                      

                      @for($i = 0; $i < count($datosdepe); $i++)
                        @if($datosdepe[$i]["iddepe"]==$depe_id)
                        <option value="{{ $datosdepe[$i]["iddepe"]}}" selected="selected">{{ $datosdepe[$i]["nombredebe"]}}</option> 
                        @else
                        <option value="{{ $datosdepe[$i]["iddepe"]}}">{{ $datosdepe[$i]["nombredebe"]}}</option>
                        @endif 
                      @endfor
                      
                    </select>
                    {{-- {{ print_r($datosdepe) }} --}}
                    {{-- <small>{{ $depe_id }}</small> --}}
                  </div>
                  <div class="form-group">
                    <label>Unidad</label>
                    <select class="form-control" style="width: 100%;" wire:click="personal($event.target.value)">{{-- $unidades  --}}
                      {{-- <option selected="selected" value="">seleccione la unidad...</option> --}}
                      
                        @for($j = 0; $j < count($unidades); $j++)
                          @if($unidades[$j]->iddependencia ==$unidad_id)
                          <option value="{{ $unidades[$j]->iddependencia }}" selected="selected">{{ $unidades[$j]->depe_nombre }}</option>
                          @else
                          <option value="{{ $unidades[$j]->iddependencia }}" >{{ $unidades[$j]->depe_nombre }}</option>
                          @endif
                        @endfor
                    
                    </select>
                  </div>
                  <small>Cantidad de Unidades: {{ count($unidades) }}</small>
                  {{-- {{ print_r($unidades )}} --}}

                  <table>
                    @if($unidad_id)
                        @for($k = 0; $k < @count($personal); $k++)
                              
                            <tr><td class="list-inline-item"><img alt="Avatar" class="table-avatar" src="../../dist/img/avatar5.png" width="20"></td><td><a href="#" wire:click="abrechat({{ @$personal[$k]->id }})">{{ @$personal[$k]->adm_name }} {{ @$personal[$k]->adm_lastname }}<span class="float-right badge badge-info">{{ @$personal[$k]->adm_telefono }}</span></a></td></tr>
                        @endfor
                    @endif
                  
                  </table>
                  {{-- {{ print_r($personal) }} --}}
            </div>
            <!-- /.card-body -->
        </div>
      </div>
      <div class="col-sm-8">
            {{-- {{ $msgbdchat }}   --}}
      </div>
  </div>

  <!-- DIRECT CHAT SUCCESS -->
  @if($iduserchat<>0)
  <div class="card card-success card-outline direct-chat direct-chat-success shadow-sm toasts-bottom-right fixed" id="chat" style="font-size: 12px">
    <div class="card-header">
      <h3 class="card-title card-title-sm" style="font-size: 12px">{{ $nombrepersonachat }}</h3>

      <div class="card-tools">
        <span title="3 New Messages" class="badge bg-success">3</span>
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
          <i class="fas fa-comments"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <!-- Conversations are loaded here -->
      <div class="direct-chat-messages">


        
        @php
          $avatar1=Storage::url(Auth::user()->avatar);
          //echo  $avatar1;
       
          //$avatar=asset('dist/img/avatar.png');
          $avatar2=Storage::url('avatar/avatar.png');

          //echo '<br>'. $avatar2;
        @endphp
      
        @if($userenviador==Auth::user()->id)
            @foreach($msgbdchat as $msg)
              
              @if($msg->id_enviador==$iduserchat)
                    <!-- cuando me escriben - left-->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">{{ $nombrepersonachat }}</span>
                        <span class="direct-chat-timestamp float-right"> {{ date("d M g:ia", strtotime($msg->created_at)) }}</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="{{ is_null($nombrepersonaavatar) ? $avatar2:Storage::url($nombrepersonaavatar) }}" alt="Message User Image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        {{ $msg->body }}
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
              @endif
              @if($msg->id_enviador==Auth::user()->id)
                      <!-- cuando yo le escribo - right -->
                      <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
                          <span class="direct-chat-timestamp float-left"> {{ date("d M g:ia", strtotime($msg->created_at)) }}</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="{{ is_null(Auth::user()->avatar) ? $avatar2: $avatar1 }}" alt="Message User Image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          {{ $msg->body }} 
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->                 
                
              @endif

              

            @endforeach

        @endif
        




      </div>
      <!--/.direct-chat-messages-->

      <!-- Contacts are loaded here -->
      <div class="direct-chat-contacts">
        <ul class="contacts-list">
          <li>
            <a href="#">
              <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Avatar">

              <div class="contacts-list-info">
                <span class="contacts-list-name">
                  {{ $nombrepersonachat }}
                  <small class="contacts-list-date float-right">2/28/2015</small>
                </span>
                <span class="contacts-list-msg">How have you been? I was...</span>
              </div>
              <!-- /.contacts-list-info -->
            </a>
          </li>
          <!-- End Contact Item -->
        </ul>
        <!-- /.contatcts-list -->
      </div>

      <!-- /.direct-chat-pane -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <form action="#" method="post">
        <div class="input-group">
          <input type="hidden" name="receptor" wire:model="iduserchat" value="{{ $iduserchat }}">
          <input type="hidden" name="enviador" wire:model="userenviador" value="{{ $userenviador}}">
          <input type="text" name="mensage" placeholder="Escribir mensaje ..." class="form-control" autocomplete="off" wire:model="mensage" id='mensage'>
          
          <span class="input-group-append">
            <button type="button" class="btn btn-success" wire:click="enviarMensaje">Enviar</button>
          </span>
          
        </div>
        @error('mensage')  <small class="text-danger">No puede enviar vacio</small> @enderror
      </form>
    </div>
    <!-- /.card-footer-->
  </div>
  @endif
  <!--/.direct-chat -->




  {{-- <button type="button" class="btn btn-default toastsDefaultBottomRight">
    Launch Default Toast (bottomRight)
  </button> --}}




</div>

@section('script')
<script>

    window.livewire.on('mensageenviado', () => {
        //$('#sistemas').modal('hide');
        $("#mensage").val('');
        $("#mensage").focus();
    });

</script>

<script>
  // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('a76c31fae9dcda3d79a4', {
      cluster: 'us2'//,
      //forceTLS:true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      //alert(JSON.stringify(data));
      window.livewire.emit('mostrarchat',data);
    });
</script>
@endsection
