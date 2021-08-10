<div>
{{-- PONEMOS IMAGEN POR DEFECTO PARA EL AVATAR --}}
@if(Auth::user()->avatar)
  @php
  $avatar=Storage::url(Auth::user()->avatar)
  @endphp
@else
  @php
  $avatar=asset('dist/img/avatar.png');
  @endphp
@endif
  {{-- FINALIZAMOS LA IMAGEN DE AVATAR --}}
    {{-- Be like water. --}}
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                 src="{{ $avatar }}"
                 alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">{{ Auth::user()->adm_name }} {{ Auth::user()->adm_lastname }}</h3>

          <p class="text-muted text-center">{{ Auth::user()->adm_cargo }}</p>

          {{-- <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Oficina</b> <a class="float-right">{{ $datos[0]->depe_nombre }}</a>
            </li>
            <li class="list-group-item">
              <b>DNI</b> <a class="float-right">{{ $datos[0]->dni }}</a>
            </li>
            <li class="list-group-item">
              <b>Telefono</b> <a class="float-right">{{ $datos[0]->telefono }}</a>
            </li>
          </ul> --}}

          <button class="btn btn-primary btn-block" wire:click="cargaavatar" data-toggle="modal" data-target="#avatar"><b>Cargar nueva foto</b></button>
          
        </div>
        <!-- /.card-body -->
      </div>

      {{-- MODAL --}}
      <div wire:ignore.self  class="modal fade" id="avatar" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cambiar Avatar</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form wire:submit.prevent="cargaavatar({{ Auth::user()->id }})">
            <div class="modal-body">
              
                <div class="form-group">
                    @if ($foto)
                        Photo Preview:
                        <img src="{{ $foto->temporaryUrl() }}" class="img-thumbnail">
                    @endif
                </div>
              
                <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="foto">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  <div wire:loading wire:target="foto">Cargando...</div>
                {{-- <input type="file" wire:model="foto"> --}}
            
                @error('foto') <span class="error">{{ $message }}</span> @enderror
            
                
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal" wire:click="cancelafoto">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar foto</button>
            </div>
        </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>

@section('script')
<script>

    window.livewire.on('saveavatar', () => {
        $('#avatar').modal('hide');
    });

</script>
@endsection
