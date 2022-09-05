<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row justify-content-center">
 
    
        <!-- /.col-md-6 -->
        <div class="col-md-4">
          
    
          <div class="card card-info ">
            <div class="card-header">
              <h5 class="card-title m-0">Cuentas con sgd</h5>
            </div>
            <div class="card-body">
              <p class="text-justify">Si usted cuenta con usuario y contraseña de SGD, se recomienda ingresar usuario y contraseña para su inscripción</p>
              <hr>
    
              
                  <form wire:submit.prevent="ingresar">
                    <div class="form-group row">
                      <label for="" class="col-sm-5">Usuario</label>
                      <div class="col-md-7">
                          <input type="text" class="form-control form-control-sm" placeholder="Ingrese usuario" wire:model="usuario" autofocus onkeyup="javascript:this.value=this.value.toUpperCase();" tabindex="1">
                      </div>
                      @error('usuario')
                          <small class="text-danger">Requiere usuario</small>
                      @enderror
                      {{-- {{ $usuario }} --}}
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-5">Contraseña:</label>
                    <div class="col-md-7">
                        <input type="password" class="form-control form-control-sm" placeholder="Ingrese contraseña" wire:model="pass">
                        @if($codmensage==1)
                        <small class="text-success" >{{ $mensage }}</small>
                        @else
                        <small class="text-danger" >{{ $mensage }}</small>
                        @endif
                    </div>
                    @error('pass')
                    <small class="text-danger">Requiere contraseña</small>
                     @enderror
                     
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-sm" >Ingresar</button>
                </div>
                  </form>
    
              
            </div>
          </div>
    
        </div>

        <div class="col-md-8" >
          
          <div class="card card-primary">
            <div class="card-header">
              <h5 class="card-title m-0">Registro de datos para la reunión/capacitación</h5>
            </div>
            <div class="card-body">
              
              {{-- {{ print_r($datos) }} --}}
    
              <form wire:submit.prevent="registrar">
                  <div class="form-group row">
                      <label for="" class="col-sm-4">Nombres y apellidos</label>
                      <div class="col-md-7">
                          <input type="hidden" value="{{ session('idreunion')}}" wire:model="idreunion">
                          <input type="hidden" value="{{ $iduser }}" wire:model="iduser">
                          <input type="text" class="form-control form-control-sm" placeholder="Ingrese su nombres y apellidos" value="{{ $nombre }}" wire:model="nombre" readonly>
                          
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-4">Numero de DNI</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control form-control-sm" placeholder="Ingrese su numero dni" value="{{ $dni }}" readonly wire:model="dni">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-4">Numero de celular</label>
                  <div class="col-md-7">
                      <input type="text" class="form-control form-control-sm" placeholder="Ingrese su numero celular" value="{{ $numcel }}" wire:model="numcel">
                  </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-4">Cargo en la entidad</label>
                <div class="col-md-7">
                    <input type="text" class="form-control form-control-sm" placeholder="Ingrese su cargo" value="{{ $cargo }}" wire:model="cargo">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-4">Dependencia</label>
                <div class="col-md-7">
                    <input type="hidden" value="{{ $dependencia }}">
                    <input type="text" class="form-control form-control-sm" placeholder="Dependencia" value="{{ $nombredepe }}" wire:model="nombredepe">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-4">Correo electrónico</label>
                <div class="col-md-7">
                    <input type="text" class="form-control form-control-sm" placeholder="Ingrese su correo electronico" value="{{ $correo }}" wire:model="correo">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-4">Si desea, puede incluir alguna pregunta para que se precise la pacitación?</label>
                <div class="col-md-7">
                    <textarea name="" id="" cols="30" rows="2" class="form-control form-control-sm"placeholder="Ingrese su pregunta" wire:model="pregunta">{{ $pregunta }}</textarea>
                </div>
              </div>
              <hr>
              <div class="justify-content-center">
                @if($codmensage==1)
                <button class="btn btn-primary btn-sm">Inscribirte</button>
                @else
                <button class="btn btn-primary btn-sm" disabled>Inscribirte</button>
                @endif
               
              </div>
              </form>
            </div>
          </div>
    
    
        </div>
        
    </div>
</div>

@section('script')
<script>

  window.livewire.on('registrado', () => {
      //$('#recpecionar').modal('hide');
      toastr.success('Fue registrado correctamente');
      
  });

</script>
@endsection