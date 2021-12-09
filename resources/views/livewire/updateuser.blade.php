<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    
        <button class="btn btn-primary btn-xs float-right" wire:click="update" data-toggle="modal" data-target="#updatedatuser">Actualizar datos</button>
        {{-- <button class="btn btn-primary btn-xs" wire:click="cargaavatar" data-toggle="modal" data-target="#avatar"><b>Cargar nueva foto</b></button> --}}


      {{-- MODAL --}}
      <div wire:ignore.self  class="modal fade" id="updatedatuser" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Actualizar mis datos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {{-- <form wire:submit.prevent="saveupdate()"> --}}
                <div class="modal-body text-sm">
                    <div class="form-group row">
                        <label for="" class="col-sm-2">DNI</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control form-control-sm" wire:model="dni">
                        </div>
                        <div class="col-sm-5">
                        <button class="btn btn-primary btn-xs" wire:click="buscardni">Buscar</button>  
                        </div>                
                    </div>
                    <div class="form-group ">
                        <label for="" >Nombres:</label>     
                        {{ $nombre }} {{ $apellidos }}                
                        {{-- <input type="text" class="form-control form-control-sm" wire:model="nombre"> --}}
                    </div>
                    {{-- <div class="form-group">
                        <label for="" >Apellidos</label>
                        <input type="text" class="form-control form-control-sm" wire:model="apellidos">                    
                    </div> --}}
                    
                    <div class="form-group">
                        <label for="" >Telefono</label>
                        <input type="text" class="form-control form-control-sm" wire:model="telefono">                    
                    </div>
                    <div class="form-group">
                        <label for="" >Cargo</label>
                        <input type="text" class="form-control form-control-sm" wire:model="cargo">                    
                    </div>  
                    
                
                    {{-- @error('foto') <span class="error">{{ $message }}</span> @enderror --}}             
                    
                
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal" wire:click="cancelafoto">Cerrar</button>
                <button type="submit" class="btn btn-primary" wire:click="saveupdate">Actualizar</button>
                </div>
            {{-- </form> --}}
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


</div>


