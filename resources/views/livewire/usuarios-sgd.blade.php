<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    {{-- <h4 class="text-center display-4" style="font-size: 14px !important;">Buscar por apellido</h4> --}}
    
    <br>
    <div class="row">
        {{-- @if($contadorsgd>$contadorrol) --}}
        @role('Superadmin')
        <div class="col-sm-6">
            <div class="card card-gray">
                <div class="card-header p-2">
                  <h3 class="card-title">Relacion de personal a nivel pliego</h3>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-sm" placeholder="Escriba apellido paterno" wire:model="search" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                {{-- <small>{{ $search }}</small> --}}
                
                        </div>
                        <div class="col-md-4">
                            @role('Superadmin')
                                <button class="btn btn-xs btn-warning mb-2" wire:click="migrarslgconrol">Migrar por unica vez</button>
                                <div wire:loading>
                                    Estamos procesando...
                                </div>
                            @endrole
                        </div>
                    </div>
                    <div class="row mt-2">
                        <table class="table table-bordered table-sm" >
                            <thead>
                            <tr><th>N</th><th>Nombre y apellidos</th><th>Cargo</th><td>DNI</td><td>Cel</td><td>Acciones</td></tr>
                            </thead>                    
                        
                        
                            @forelse($userSGD as $ofina)

                            @php
                                $i=0;
                            @endphp

                            @foreach($rolasiguser as $key)
                                @if($ofina->id==$key->id)
                                    @break
                                @else 
                                @php
                                    $i++;
                                @endphp
                                @endif
                            @endforeach
                            @if(count($rolasiguser)==$i)
                            <tr><td><small>{{ $ofina->id }}</small></td><td><small>{{ $ofina->adm_name }} {{ $ofina->adm_lastname }}</small></td><td><small>{{ $ofina->adm_cargo }}</small></td><td><small>{{ $ofina->adm_dni }}</small></td><td><small>{{ $ofina->adm_telefono }}</small></td><td>
                            
                                @can('UsuarioSGD_rol')
                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#sistemas" wire:click="cargadato({{ $ofina->id }})">Rol</button>
                                @endcan                         
                            
                            </td></tr>  
                            @endif
                            
                            @empty
                            Los usuarios ya cuentan al menos con un rol  
                            @endforelse


                        </table>
                    </div>

                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix float-right">

                    
                    {{ $userSGD->links() }} 
                    
                   
                </div>
            </div>
        </div>
        @endrole
        {{-- @endif --}}
        <div class="col-sm-6">
            <div class="card card-gray">
                <div class="card-header p-2">
                    <button class=" btn btn-success btn-xs float-right">Agregar nuevo usuario</button>
                  <h3 class="card-title">Relacion de personal a nivel pliego</h3>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @hasrole('Superadmin')
                    <div class="form-gorup row">
                        <label for="" class="col-sm-3">Dependencia:</label>
                        <div class="col-sm-9">
                            <select name="" id="" class="form-control form-control-sm" wire:click="unidad($event.target.value)">
                                @for($i = 0; $i < count($datosdepe); $i++)
                                    @if($datosdepe[$i]["iddepe"]==$depe_id)
                                    <option value="{{ $datosdepe[$i]["iddepe"]}}" selected="selected">{{ $datosdepe[$i]["nombredebe"]}}</option> 
                                    @else
                                    <option value="{{ $datosdepe[$i]["iddepe"]}}">{{ $datosdepe[$i]["nombredebe"]}}</option>
                                    @endif 
                                @endfor
                            </select>
                        </div>
                    </div>
                    @else
                    <div class="form-gorup row">
                        <label for="" class="col-sm-3">Dependencia:</label>
                        <div class="col-sm-9">
                            {{ $nombredepe }}
                        </div>
                    </div>
                        
                    @endhasrole
                   
                    <div class="form-gorup row">
                        <label for="" class="col-sm-3">Unidad:</label>
                        <div class="col-sm-9">
                            <select name="" id="" class="form-control form-control-sm" wire:click="personal($event.target.value)">
                                @for($j = 0; $j < count($unidades); $j++)
                                    @if($unidades[$j]->iddependencia ==$unidad_id)
                                    <option value="{{ $unidades[$j]->iddependencia }}" selected="selected">{{ $unidades[$j]->depe_nombre }}</option>
                                    @else
                                    <option value="{{ $unidades[$j]->iddependencia }}" >{{ $unidades[$j]->depe_nombre }}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                   

                    <table class="table table-bordered table-sm mt-2" >
                        <thead>
                        <tr><th>Nombre y apellidos</th><th>Asignaciones</th></tr>
                        </thead>                    
                        @foreach($rolasiguser as $rolasig)
                        {{-- aqui indicamos que el administrador es super usuario, no tiene que modificarse por ningun rol --}}
                         @if($rolasig->id<>1)
                         <tr><td><small>{{ $rolasig->nomape }}</small></td><td>
                             <button class="btn btn-xs btn-info" wire:click="cargaeditrol({{ $rolasig->id }},'{{ $rolasig->nomape }}')" data-toggle="modal" data-target="#editar"><i class="fa fa-edit"></i> Rol</button>
                            </td></tr> 
                         @else
                         <tr><td><small>{{ $rolasig->nomape }}</small></td><td>-</td></tr>
                         @endif
                                                    
                        @endforeach


                    </table>


                    {{-- {{ groupArray($rolasiguser,'id') }} --}}
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix float-right p-1 mt-3">

                    {{ $rolasiguser->links() }}
                   
                  </div>
            </div> 
        </div>
    </div>

        {{-- modal para asignar nuevl rol--}}
        <div wire:ignore.self class="modal fade" id="sistemas" >
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h4 class="modal-title">Asignación | <small>ROL</small> </h4>                
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Usuario</strong>: {{ $nombreusersel }}</p>
                    <div class="form-group">
                        <label>Asignacion de rol</label>
                            <select name="nomrol" class="custom-select text-sm" wire:model="nomrol">
                                <option value="">Seleccion tipo de ayuda...</option>
                                @foreach($rol as $rols)                            
                                <option value="{{ $rols->name }}">{{ $rols->name }}</option>
                                @endforeach

                            </select>
                            @error('nomrol') <span class="text-danger">{{ $message }}</span> @enderror
                            
                    </div>
 

                </div>
                <div class="modal-footer justify-content-between">
                <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button  class="btn btn-primary" wire:click="asignacionrol({{ Auth::user()->id }})">Guardar</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        {{-- modal editamos el para actualizar al usuario y sus roles--}}
        <div wire:ignore.self class="modal fade" id="editar" >
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h4 class="modal-title">Actualizar | <small>ROL</small> </h4>                
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <small >{{ date('d/m/Y h:i:s') }}</small>&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Usuario</strong>: {{ $nombres }}</p>
                    <div class="form-group" >
                        <div wire:ignore>
                            <label>Asignacion de rol:</label>
                            <select name="nomrol" id="category-dropdown"class="custom-select text-sm select2" wire:model="nomrolasig" multiple>
                                {{-- <option value="">Seleccion tipo de ayuda...</option> --}}
                                @foreach($rol as $rols)                            
                                    @if($rols->name<>'Superadmin')
                                    <option value="{{ $rols->name }}" selected>{{ $rols->name }}</option>  
                                    @endif
                                 
                                  
                                @endforeach
                                @role('Superadmin')
                                <option value="Superadmin" selected>Superadmin</option> 
                                @endrole

                            </select>
                            @error('nomrolasig') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                            
                    </div>
 

                </div>
                <div class="modal-footer justify-content-between">
                <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button  class="btn btn-primary"  onclick="jecutatraslado()" >Actualizar rol</button>
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
    //Initialize Select2 Elements
    $('.select2').select2()
  });

    window.livewire.on('saverolasignado', () => {
        $('#sistemas').modal('hide');
        toastr.success('Fue asignación el rol correctamente')
    });

window.livewire.on('actualizadorol',()=>{
    $('#editar').modal('hide');
    toastr.info('Fue actualizado la asignación');
});

window.livewire.on('migracionok',()=>{
    toastr.info('La migracion termino con exito');
});
</script>

<script>
document.addEventListener("livewire:load", () => {
	Livewire.hook('message.processed', (message, component) => {
		$('#category-dropdown').select2();
        
        // @this.emit('Iniciacargarol', $('#category-dropdown').select2('val'));
    
        }); 
    
    }); 




    // document.addEventListener('livewire:load', function () {
    // $('#category-dropdown').on('select2:close', (e) => {
    //     @this.emit('Iniciacargarol', $('#category-dropdown').select2('val'));
    // });

    // $('#category-dropdown').val(@this.get('category-dropdown')).trigger('change');
    // });
 function jecutatraslado()
 {
     if($('#category-dropdown').val()!='')
     {
        @this.emit('Iniciacargarol', $('#category-dropdown').select2('val'));
     }
     else{alert('Se requiere como minimo un rol')}
 }
</script>
@endsection