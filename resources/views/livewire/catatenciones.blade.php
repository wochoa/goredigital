<div>
    {{-- Be like water. --}}
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Relacion de tipo de atenciones</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Relacion de tipo de atenciones</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div class="container-fluid">
    {{-- <div class="row justify-content-center"> --}}
      @can('catatenciones_crear')
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#atencion">Agregar tipo de atención</button>
      @endcan   
    <div class="row py-2">
        <div class="col-md-6 col-sm-12">
            <div class="card card-gray">
                <div class="card-header p-2">
                  <h3 class="card-title">Relacion de tipo de atenciones</h3>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-sm table-hover">
                        <thead>
                        <tr><th>N</th><th>Problema</th><th>Codigo Ejecutora</th><th></th></tr>
                        </thead>                    
                        @foreach($datos as $cat)
                        <tr><td>{{ $cat->idatencion }}</td><td>{{ $cat->problema }}</td><td>{{ $cat->idejecutora }}</td><td nowrap>
                            @can('catatenciones_editar')
                            <button class="btn btn-warning btn-xs" wire:click="validaatencion({{ $cat->idatencion }},'{{ $cat->problema }}')" data-toggle="modal" data-toggle="modal" data-target="#edita"><i class="fa fa-edit"></i></button> @endcan
                            @can('catatenciones_eliminar')
                            <button class="btn btn-danger btn-xs" wire:click="validaatencion({{ $cat->idatencion }},'{{ $cat->problema }}')" data-toggle="modal" data-toggle="modal" data-target="#elimina"><i class="fa fa-trash"></i></button>@endcan</td></tr>                            
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

{{-- modal atencion--}}

        <div wire:ignore.self class="modal fade" id="atencion" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">Nuevo servicio  | <small>de atencion</small> </h5>                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   
                        <div class="modal-body">
                        {{-- <input type="hidden" value="{{ $iddependencia }}" name="coddepe"> --}}
                            <div class="form-group">
                                <label for="">Nuevo servicio</label>
                                <input type="text" wire:model="atencion" id="atenciones"  class="form-control form-control-sm" placeholder="Ingrese el servicio a atender" autofocus>
                                @error('atencion')  <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button  type="botton" wire:click="newatencion" class="btn btn-primary" >Guardar</button>
                        </div>
                    
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


    {{-- modal edita--}}

        <div wire:ignore.self class="modal fade" id="edita" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">Editar servicio  | <small>de atencion</small> </h5>                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   
                        <div class="modal-body">
                        {{-- <input type="hidden" value="{{ $iddependencia }}" name="coddepe"> --}}
                            <div class="form-group">
                                <label for="">El tipo de servicio:</label>
                                <input type="text" wire:model="atencion" id="atenciones"  class="form-control form-control-sm" placeholder="Ingrese el servicio a atender" autofocus>
                                @error('atencion')  <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button  type="botton" wire:click="editar({{ $idatencion }})" class="btn btn-primary" >Guardar edicion</button>
                        </div>
                    
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- modal edita--}}

        <div wire:ignore.self class="modal fade" id="elimina" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"><h5 class="modal-title">Elimar servicio  | <small>de atencion</small> </h5>                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   
                        <div class="modal-body">
                        {{-- <input type="hidden" value="{{ $iddependencia }}" name="coddepe"> --}}
                            <div class="form-group">
                                <label for="">Estas seguro de eliminar el servicio:</label>
                                <p>{{ $atencion }}</p>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button  type="botton" wire:click="elimina({{ $idatencion }})" class="btn btn-primary" >Eliminar</button>
                        </div>
                    
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
{{-- final componente livewire --}}
</div>
@section('script')
<script>
    $(function () {
        $('#atencion').on('shown.bs.modal', function (e) {
        $('#atenciones').focus();
        })
    });
</script>
<script>
    window.livewire.on('saveatenciones', () => {
        $('#atencion').modal('hide');
        toastr.success('Fue creado correctamente tipo de atenciones');

    });
</script>
<script>
    window.livewire.on('edicion', () => {
        $('#edita').modal('hide');
        toastr.info('Fue editado correctamente el tipo de atenciones');

    });
</script>
<script>
    window.livewire.on('eliminacion', () => {
        $('#elimina').modal('hide');
        toastr.error('Fue eliminado correctamente el tipo de atenciones');

    });
</script>
@endsection