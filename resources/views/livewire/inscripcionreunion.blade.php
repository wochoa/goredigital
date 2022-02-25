<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row justify-content-center">
 
    
        <!-- /.col-md-6 -->
        <div class="col-md-3">
          
    
          <div class="card card-info ">
            <div class="card-header">
              <h5 class="card-title m-0">Cuentas con sgd</h5>
            </div>
            <div class="card-body">
              <p class="text-justify">Si usted cuenta con usuario y contraseña de SGD, se recomienda ingresar usuario y contraseña para su inscripción</p>
              <hr>
    
              
                  <div class="form-group row">
                      <label for="" class="col-sm-5">Usuario</label>
                      <div class="col-md-7">
                          <input type="text" class="form-control form-control-sm" placeholder="Ingrese usuario" wire:model="usuario" autofocus onkeyup="javascript:this.value=this.value.toUpperCase();">
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
                    </div>
                    @error('pass')
                    <small class="text-danger">Requiere contraseña</small>
                @enderror
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-sm" wire:click="ingresar">Ingresar</button>
                </div>
    
              
            </div>
          </div>
    
        </div>
        <div class="col-md-9">
          
          <div class="card card-primary">
            <div class="card-header">
              <h5 class="card-title m-0">Registro de datos para la reunión</h5>
            </div>
            <div class="card-body">
              
              {{ print_r($datos) }}
    
              <form action="">
                  <div class="form-group row">
                      <label for="" class="col-sm-4">Nombres y apellidos</label>
                      <div class="col-md-7">
                          <input type="text" class="form-control form-control-sm" placeholder="Ingrese su nombres y apellidos">
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-4">Numero de DNI</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control form-control-sm" placeholder="Ingrese su numero dni">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-4">Numero de celular</label>
                  <div class="col-md-7">
                      <input type="text" class="form-control form-control-sm" placeholder="Ingrese su numero celular">
                  </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-4">Cargo en la entidad</label>
                <div class="col-md-7">
                    <input type="text" class="form-control form-control-sm" placeholder="Ingrese su cargo">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-4">Dependencia</label>
                <div class="col-md-7">
                    <input type="text" class="form-control form-control-sm" placeholder="Dependencia">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-4">Correo electrónico</label>
                <div class="col-md-7">
                    <input type="text" class="form-control form-control-sm" placeholder="Ingrese su correo electronico">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-4">Si desea, puede incluir alguna pregunta para que se precise la pacitación?</label>
                <div class="col-md-7">
                    <textarea name="" id="" cols="30" rows="10" class="form-control form-control-sm"placeholder="Ingrese su pregunta"></textarea>
                </div>
              </div>
              <div class="justify-content-center">
                <button class="btn btn-primary btn-sm">Inscribirte</button>
              </div>
              </form>
            </div>
          </div>
    
    
        </div>
        
    </div>
</div>
