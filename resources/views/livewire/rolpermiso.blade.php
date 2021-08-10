<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Relacion de roles</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Relacion de roles</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
    <div class="container-fluid">
          @can('roles_crear')
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#nuevo">Nuevo Rol</button>
          @endcan
        <div class="row py-2">
            <div class="col-md-4 col-sm-12">
                <div class="card card-gray">
                    <div class="card-header p-2">
                      <h3 class="card-title">Relacion de roles</h3>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <input type="text" placeholder="Digite su busqueda" class="form-control mb-2" wire:model="search">
                        <table class="table table-bordered table-sm table-hover">
                            <thead>
                            <tr><th>N</th><th>Problema</th><th>Tipo</th><th></th></tr>
                            </thead>                    
                            @foreach($roles as $cat)
                            <tr><td>{{ $cat->id }}</td><td>{{ $cat->name }}</td><td>{{ $cat->guard_name }}</td><td>
                              @can('roles_editar')
                                <button class="btn btn-warning btn-xs" wire:click="validarol({{ $cat->id }},'{{ $cat->name }}')" data-toggle="modal" data-toggle="modal" data-target="#edita"><i class="fa fa-edit"></i></button>@endcan
                                @can('roles_eliminar')
                                <button class="btn btn-danger btn-xs" wire:click="validarol({{ $cat->id }},'{{ $cat->name }}')" data-toggle="modal" data-toggle="modal" data-target="#elimina"><i class="fa fa-trash"></i></button>@endcan</td></tr>                            
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
 {{-- modal de crear nuevo --}}
  <div wire:ignore.self class="modal fade" id="nuevo" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Nuevo  | <small>rol</small> </h5>                
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                    </button>
                </div>
              
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nuevo rol</label>
                            <input type="text" wire:model="nomrol" id="nomrol" class="form-control form-control-sm" placeholder="Ingrese el rol" autofocus>
                            @error('nomrol')  <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                          <label for="">Permisos</label>
                          <div wire:ignore>
                            <select class="form-control select2"id="category-dropdown" multiple="multiple" data-placeholder="Seleccione permisos.." style="width: 100%;" wire:model="listpermiso">                               
                              @foreach($permisos as $newp)
                              <option value="{{ $newp->name }}">{{ $newp->name }}</option>                               
                              @endforeach
                              
                           </select>
                          </div>
                          
                          @error('listpermiso')  <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button  type="botton" wire:click="crearrol" class="btn btn-primary" >Guardar</button>
                    </div>
                
            </div>
            <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>

   {{-- modal de crear nuevo --}}
   <div wire:ignore.self class="modal fade" id="elimina" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Eliminar  | <small>rol</small> </h5>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                </button>
            </div>
          
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Esta seguro de eliminar el rol: </label>
                        <p class="badge badge-danger">{{ $nomrol }}</p>
                        @error('nomrol')  <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button  type="botton" wire:click="eliminarrol('{{ $nomrol }}')" class="btn btn-primary" >Eliminar</button>
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
            <div class="modal-header"><h5 class="modal-title">Editar  | <small>rol</small> </h5>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                </button>
            </div>
           
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Editar rol</label>
                        <input type="text" wire:model="nomrol" value="{{ $nomrol }}"  class="form-control form-control-sm" placeholder="Ingrese el rol" autofocus>
                        {{-- @error('nomrol')  <small class="text-danger">{{ $message }}</small>@enderror --}}
                    </div>
                   
                     <div class="row">
                      <div class="col-md-6">
                        <label for="">Permisos por asignar</label>
                        <table>
                          @foreach($permisos as $peredit)
                            @php
                                $i=0;
                            @endphp
                            @forelse ($permisoasignado as $item)
                              
                                @if(@$peredit->name==@$item->name)
                                   @break
                                  @else
                                  @php
                                    $i++
                                  @endphp
                                @endif
                              @empty
                              {{-- <tr><td> <small>{{ $peredit->name }}</small></td><td><button class="btn btn-danger btn-xs float-right"><i class="fa fa-minus-circle"></i></button></td></tr>   --}}
                            @endforelse
                          
                           @if(count($permisoasignado)==$i)
                           <tr><td><span class="badge badge-secondary">{{ $peredit->id }}</span> <small>{{ $peredit->name }}</small></td><td><button class="btn btn-primary btn-xs float-right" wire:click="agregarpermiso('{{ $nomrol }}','{{ $peredit->name  }}')"><i class="fa fa-check-circle"></i></button></td></tr>
                           @endif
                           
                          
                          
                          @endforeach
                        </table>
                       </div>
                       <div class="col-md-6">
                          <label for="">Permisos asignados</label>
                          <table>
                          @foreach($permisoasignado as $kper)
                          <tr><td><span class="badge badge-secondary">{{ @$kper->id }}</span>  <small>{{ @$kper->name }}</small></td><td><button class="btn btn-danger btn-xs float-right" wire:click="quitarpermiso('{{ @$nomrol }}','{{ @$kper->name  }}')"><i class="fa fa-minus-circle"></i></button></td></tr>
                          
                          @endforeach
                        </table>
                       </div>
                       
                     </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button  type="botton" wire:click="editarrol({{ $idrol }})" class="btn btn-primary" >Actualizar</button>
                </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

</div>
@section('script')

<script>
  $(document).ready(function () {
      $('#category-dropdown').select2();
      $('#category-dropdown').on('change', function (e) {
          let data = $(this).val();
           @this.set('listpermiso', data);
      });
      window.livewire.on('creacionrol', () => {
          $('#category-dropdown').select2();
          $('#nuevo').modal('hide');
        toastr.success('Fue creado correctamente');
      });

      
  }); 
 
</script>

<script>
  $(function () {
      $('#nuevo').on('shown.bs.modal', function (e) {
      $('#nomrol').focus();
      })
  });
</script>
<script>

  window.livewire.on('edicionnrol',()=>{
    $('#edita').modal('hide');
    toastr.success('Fue actualizado correctamente');
  });

  window.livewire.on('eliminado',()=>{
    $('#elimina').modal('hide');
    toastr.error('Fue Eliminado correctamente');
  });
</script>
@endsection
