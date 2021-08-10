<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Relación de Permisos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Relación de permisos</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
    <div class="container-fluid">
          
          @can('permisos_crear')
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#nuevo">Nuevo Permiso</button>
           @endcan
        <div class="row py-2">
            <div class="col-md-4 col-sm-12">
                
                <div class="card card-gray">
                    <div class="card-header p-2">
                      <h3 class="card-title">Relación de permisos</h3>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <input type="text" placeholder="Digite su busqueda" class="form-control mb-2" wire:model="search">
                        <table class="table table-bordered table-sm table-hover">
                            <thead>
                            <tr><th>N</th><th>Problema</th><th>Tipo</th><th></th></tr>
                            </thead>                    
                            @foreach($permisos as $cat)
                            <tr><td>{{ $cat->id }}</td><td>{{ $cat->name }}</td><td>{{ $cat->guard_name }}</td><td>
                                @can('permisos_editar')
                                <button class="btn btn-warning btn-xs" wire:click="validapermiso({{ $cat->id }},'{{ $cat->name }}')" data-toggle="modal" data-toggle="modal" data-target="#edita"><i class="fa fa-edit"></i></button>@endcan
                                @can('permisos_eliminar')
                                <button class="btn btn-danger btn-xs" wire:click="validapermiso({{ $cat->id }},'{{ $cat->name }}')" data-toggle="modal" data-toggle="modal" data-target="#elimina"><i class="fa fa-trash"></i></button>@endcan</td></tr>                            
                            @endforeach
                        </table>
                    </div>
                    {{-- <div class="card-footer">
                        {{ $permisos->links() }}
                    </div> --}}
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    {{-- modal de crear editar --}}
    <div wire:ignore.self class="modal fade" id="nuevo" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">Nuevo  | <small>permiso</small> </h5>                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Permiso</label>
                                <div class="col"></div>
                                
                                <input type="text" wire:model="nomper" id="nomper"  class="form-control form-control-sm d-inline p-2 " placeholder="Ingrese el permiso" autofocus>
                                @error('nomper')  <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            {{ $nomper }}

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button  type="botton" wire:click="nuevopermiso" class="btn btn-primary" >Guardar</button>
                        </div>
                    
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- modal de crear editar --}}
    <div wire:ignore.self class="modal fade" id="edita" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Edita  | <small>permiso</small> </h5>                
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                    </button>
                </div>
              
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Permiso</label>
                            <div class="col"></div>
                            <input type="text" name="" id="" wire:model="idper" class="form-control form-control-sm d-inline p-2 " disabled>
                            <input type="text" wire:model="nomper" id="nomper"  class="form-control form-control-sm d-inline p-2 " placeholder="Ingrese el rol" autofocus>
                            @error('nomper')  <small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button  type="botton" wire:click="editarrol({{ $idper }})" class="btn btn-primary" >Guardar</button>
                    </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>

        {{-- modal de crear editar --}}
        <div wire:ignore.self class="modal fade" id="elimina" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">Elimina  | <small>permiso</small> </h5>                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Estas seguro de eliminar?</label>
                                <p><strong>codigo</strong>:{{ $idper }}</p>
                                <p><strong>Nombre</strong>:{{ $nomper }}</p>
                            </div>
    
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button  type="botton" wire:click="eliminar({{ $idper }})" class="btn btn-primary" >Eliminar</button>
                        </div>
                    
                </div>
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>


</div>

@section('script')
<script>
    $(function () {
        $('#nuevo').on('shown.bs.modal', function (e) {
        $('#nomper').focus();
        })
    });
</script>

<script>//
window.livewire.on('newpermiso',()=>{
  $('#nuevo').modal('hide');
      toastr.success('Fue creado correctamente');
});

window.livewire.on('permisoeditado',()=>{
  $('#edita').modal('hide');
  toastr.success('Fue actualizado correctamente');
  
});

window.livewire.on('eliminado',()=>{
  $('#elimina').modal('hide');
  toastr.info('Fue Eliminado correctamente');
  
});
</script>
@endsection

