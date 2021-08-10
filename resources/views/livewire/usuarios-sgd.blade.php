<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    {{-- <h4 class="text-center display-4" style="font-size: 14px !important;">Buscar por apellido</h4> --}}
    <div class="row">
        <div class="col-md-8 offset-md-2">

                <div class="input-group">
                    <input type="search" class="form-control form-control-lg" placeholder="Escriba apellido paterno" wire:model="search" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    <div class="input-group-append">
                        <button class="btn btn-lg btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                {{-- <small>{{ $search }}</small> --}}

        </div>
    </div>
    <br>
    <div class="row">
        @if($contadorsgd<>$contadorrol)
        <div class="col-sm-7">
            <div class="card card-gray">
                <div class="card-header p-2">
                  <h3 class="card-title">Relacion de personal a nivel pliego</h3>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{-- {{ print_r($usuariossgd) }} --}}

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
                <!-- /.card-body -->
                <div class="card-footer clearfix float-right">

                    
                    {{ $userSGD->links() }} 
                    
                   
                </div>
            </div>
        </div>
        @endif
        <div class="col-sm-5">
            <div class="card card-gray">
                <div class="card-header p-2">
                  <h3 class="card-title">Relacion de personal a nivel pliego</h3>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                    @role('Superadmin')
                    <button class="btn btn-xs btn-warning mb-2" wire:click="migrarslgconrol">Migrar por unica vez</button>
                    <div wire:loading>
                        Estamos procesando...
                    </div>
                    @endrole

                    <table class="table table-bordered table-sm" >
                        <thead>
                        <tr><th>Nombre y apellidos</th><th>Rol</th><th></th></tr>
                        </thead>                    
                        @foreach($rolasiguser as $rolasig)
                         @if($rolasig->rol<>'Superadmin')
                         <tr><td><small>{{ $rolasig->nombres }} {{ $rolasig->apellidos }}</small></td><td><small>{{ $rolasig->rol }}</small></td><td>
                             <button class="btn btn-xs btn-info" wire:click="cargaeditrol({{ $rolasig->id }},'{{ $rolasig->rol }}','{{ $rolasig->nombres }} {{ $rolasig->apellidos }}')" data-toggle="modal" data-target="#editar"><i class="fa fa-edit"></i> Rol</button>
                            </td></tr> 
                         @else
                         <tr><td><small>{{ $rolasig->nombres }} {{ $rolasig->apellidos }}</small></td><td><small>{{ $rolasig->id }}{{ $rolasig->rol }}</small></td><td>-</td></tr>
                         @endif
                                                    
                        @endforeach


                    </table>

                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix float-right">

                    {{-- {{ $rolasiguser->links() }} --}}
                   
                  </div>
            </div> 
        </div>
    </div>

        {{-- modal sistemas--}}
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

        {{-- modal sistemas--}}
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
                    <div class="form-group">
                        <label>Asignacion de rol:{{ $nomrolasig }} </label>
                            <select name="nomrol" class="custom-select text-sm" wire:model="nomrolasig">
                                <option value="">Seleccion tipo de ayuda...</option>
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
                <div class="modal-footer justify-content-between">
                <button  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button  class="btn btn-primary" wire:click="actualizacionderol">Actualizar rol</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

</div>

@section('script')
<script>

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
@endsection