@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perfil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            @livewire('config-cuenta')
            <!-- /.card -->


          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h4 class="float-left">Mis datos</h4>
                @livewire('updateuser',['nombre'=>$datos[0]->adm_name,'apellidos'=>$datos[0]->adm_lastname,'dni'=>$datos[0]->adm_dni,'telefono'=>$datos[0]->adm_telefono,'cargo'=>$datos[0]->adm_cargo ])
              </div><!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="inputName" class="col-form-label">Nombre</label>
                        <input type="email" class="form-control form-control-sm" id="inputName" placeholder="Name" value="{{ $datos[0]->adm_name  }}" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="inputName" class="col-form-label">Apellidos</label>
                      <input type="email" class="form-control form-control-sm" id="inputName" placeholder="Name" value="{{ $datos[0]->adm_lastname  }}" disabled>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputName" class="col-form-label">Usuario</label>
                        <input type="email" class="form-control form-control-sm" id="inputEmail" placeholder="Email" value="{{ $datos[0]->adm_email  }}" disabled>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputName" class="col-form-label">DNI</label>
                      <input type="text" class="form-control form-control-sm" id="inputName2" placeholder="Name" value="{{ $datos[0]->adm_dni  }}" disabled>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputName" class="col-form-label">Telefono</label>
                        <input type="text" class="form-control form-control-sm" id="inputName2" placeholder="Name" value="{{ $datos[0]->adm_telefono  }}" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 form-label">Mi Cargo:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control form-control-sm" id="inputName2" placeholder="Name" value="{{ $datos[0]->adm_cargo  }}" disabled>
                    </div>
                  </div>

                  
                  
                  
                  
                  <div class="dropdown-divider"></div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Dependencia labores</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" id="inputSkills" placeholder="Skills" value="{{ $datos[0]->depe_nombre  }}" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Representate dependencia</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" id="inputSkills" placeholder="Skills" value="{{ $datos[0]->depe_representante  }}" disabled>
                    </div>
                  </div>

                </form>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection
