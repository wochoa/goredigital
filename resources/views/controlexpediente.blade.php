
@extends('layouts.admin')
@section('titpage')
  Gobierno digital | Usuarios SGD
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Control de expedientes <button class="btn btn-xs btn-info">Agregar expedientes al control</button></h1><span class="badge badge-secondary navbar-badge"><strong>FECHA ACTUAL :</strong> {{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Registro de denuncias</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div class="container-fluid">
    {{-- <div class="row justify-content-center"> --}}
    
    @livewire('control-expediente')
</div>
{{-- modal sistemas--}}

@endsection


