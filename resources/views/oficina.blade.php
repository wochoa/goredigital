
@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Relacion de personal activos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">oficinas</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div class="container-fluid">
    {{-- <div class="row justify-content-center"> --}}
    <div class="row">
        <div class="col-sm-10">
            <div class="card card-gray">
                <div class="card-header p-2">
                  <h3 class="card-title">Relacion de personal de la oficina</h3>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-sm table-hover">
                        <thead>
                        <tr><th>N</th><th>Nombre y apellidos</th><th>Cargo</th><th>celular</th><th>Correo</th></tr>
                        </thead>                    
                        @foreach($datos as $ofina)
                        <tr><td><small>{{ $ofina->id }}</small></td><td><small>{{ $ofina->adm_name }} {{ $ofina->adm_lastname }}</small></td><td><small>{{ $ofina->adm_cargo }}</small></td><td><small>{{ $ofina->adm_telefono }}</small></td><td><small>{{ $ofina->adm_correo }}</small></td></tr>                            
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
{{-- modal sistemas--}}

@endsection
