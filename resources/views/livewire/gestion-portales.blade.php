<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Gestión de portales y acceso</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Gestión de portales</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

    <div class="row">
        <div class="col-sm-6">
            <div class="card card-gray">
                <div class="card-header">Páginas creadas por dependencia</div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column">
                    <table class="table table-sm table-bordered table-hover">
                       <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre direccion web</th>
                          <th>cod_dependencia</th>
                          <th></th>
                        </tr>
                      </thead>                
                    @forelse($paginas as $pag)
                    
                      <tr>
                        <td>{{ $pag->iddirecciones_web }}</td><td>{!! utf8_encode($pag->nom_direcciones_web )!!}<br><small class="bg-info">{!! $pag->linkdirecciones_web !!}-{!! $pag->dns_direcciones_web !!}</small></td><td>{!! utf8_encode($pag->iddependencia )!!}</td><td nowrap><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editdirweb" wire:click="Buscardirweb({{ $pag->iddirecciones_web }},'{!! utf8_encode($pag->nom_direcciones_web) !!}')"><i class="fa fa-edit"></i></button> <button class="btn btn-xs btn-info" wire:click="unidad({{ $pag->iddirecciones_web }},{{ $pag->iddependencia }},'{!! utf8_encode($pag->nom_direcciones_web) !!}')"><i class="fa fa-user-plus" data-toggle="modal" data-target="#asignarpag"></i></button></td>
                      </tr>
                    @empty
                        <h4>No se encontro ninguna pagina </h4>
                    @endforelse
                  </table>
                </div>
                
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-gray">
                <div class="card-header">Administradores de portales </div>
                <div class="card-body">
                  <table class="table table-bordered table-sm table-hover">
                    <thead>
                      <tr>
                        <th>Id user</th>
                        <th>usuario</th>
                        <th>Id pagina</th>
                      </tr>
                    </thead>
                  
                  @forelse($userportales as $userpor)
                    <tr>
                      <td>{{ $userpor->iduser }}</td>
                      <td>{{ $userpor->nombreuser }}</td>
                      <td>{{ $userpor->iddirecciones_web }}</td>
                    </tr>
                  @empty
                    <h4>No hay administradores de portales web</h4>
                  @endforelse
                </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
{{-- modal  editar direccion web creada--}}
<div wire:ignore.self class="modal fade" id="editdirweb" >
  <div class="modal-dialog">
  <div class="modal-content p-0">
      <div class="modal-header"><h5 class="modal-title">Asignar usuarios a | <small>Página]</small> </h5>                
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Pagina web</label>
          <input type="text" class="form-control" value="{!! $nombreweb!!}">
          {{-- <input type="text" name="" id="" value="{{ $codpag }}"> --}}
        </div>
        <div class="form-group">
          <label for="">Dependencia</label>
          <select  class="form-control" wire:model="coddepe">
            @for($i = 0; $i < count($datosdepe); $i++)
            <option value="{{ $datosdepe[$i]['iddepe'] }}">{!! $datosdepe[$i]['nombredebe']!!}</option>
            @endfor
            {{-- @forelse($datosdepe as $depe)
              <option value="{{ $depe["iddepe"] }}">{!! utf8_encode($depe["nombredebe "]) !!}</option>
            @empty
              
            @endforelse --}}
          </select>
          {{-- {{ print_r($datosdepe) }} --}}
        </div>

          
      </div>
      <div class="modal-footer justify-content-between">
      <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
      <button  class="btn btn-primary" wire:click="guarda_webedit">Guardar</button>
      </div>
  </div>
  <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

{{-- modal  asignar pagina a usuarios--}}
<div wire:ignore.self class="modal fade" id="asignarpag" >
  <div class="modal-dialog">
  <div class="modal-content p-0">
      <div class="modal-header"><h5 class="modal-title">Asignar usuarios a | <small>Página]</small> </h5>                
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        {{-- <input type="text" value="{{ $codpag }}"> --}}
        <div class="form-group">
          <label for="">Direccion web</label>
          <input type="text" class="form-control form-control-sm" value="{{ $nombreweb }}">
        </div>
        <div class="form-group">
          <label for="">Unidades organicas</label>
          <select  class="form-control" wire:click="personal($event.target.value)">
            {{-- <option value="" selected>Seleccione la unidad</option> --}}
            @for($j = 0; $j < count($unidades); $j++)
             @if($j==0)
             <option value="{{ $unidades[$j]->iddependencia }}" selected>{!! $unidades[$j]->depe_nombre  !!}</option>
             @else
             <option value="{{ $unidades[$j]->iddependencia }}" >{!! $unidades[$j]->depe_nombre !!}</option>
             @endif
            
             
            @endfor
          </select>
        </div>
        
        <div class="form-group">
          <label for="">usuarios</label>
          <select class="form-control form-control-sm " wire:model="iduser">
            <option value="" selected>Seleccione el usuario</option>

            @for($k = 0; $k < @count($personal); $k++)
                  
                <option value="{{ $personal[$k]->id }}">{{ @$personal[$k]->adm_name }} {{ @$personal[$k]->adm_lastname }}</option>
            @endfor

          </select>
        </div>
          
      </div>
      <div class="modal-footer justify-content-between">
      <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
      <button  class="btn btn-primary" wire:click="userasignado">Finalizar</button>
      </div>
  </div>
  <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

</div>

@section('script')
<script>

  window.livewire.on('editadoweb', () => {
      $('#editdirweb').modal('hide');
      toastr.success('Fue actualizado exitosamente')
  });

  window.livewire.on('userasignado', () => {
      $('#asignarpag').modal('hide');
      toastr.success('Fue asignado exitosamente')
  });

</script>
@endsection