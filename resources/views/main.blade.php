@extends('layouts.admin')
@section('titpage')
  Gobierno digital | Dashboard
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Bienvenido, {{ Auth::user()->adm_name }} </h1>
          <p>Nuestros servicios disponibles</p>
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
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            @livewire('dashticket')

            <p>Ticket Creados</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('ticket') }}" class="small-box-footer">Crear Ticket <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Sistema de Gestion Digital</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="http://digital.regionhuanuco.gob.pe" class="small-box-footer" target="_blanck">Ir a SGD <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-gray">
          <div class="inner">
            <h3>44</h3>

            <p>Gestion de portales</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="http://gestionportales.regionhuanuco.gob.pe" class="small-box-footer" target="_blanck">Ir a GP <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p>Convocatoria virtual</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="http://selecciondepersonal.regionhuanuco.gob.pe/" class="small-box-footer" target="_blanck">Ir a Convocatorias <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>65</h3>

            <p>Registro de visitas</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">Ir a Visitas <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>16</h3>

            <p>Consultas PIDE</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ route('pide') }}" class="small-box-footer">Ir a PIDE <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>16</h3>

            <p>Intranet</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-cog"></i>
          </div>
          <a href="http://www2.regionhuanuco.gob.pe/portal/admin/" class="small-box-footer" target="_blanck">Ir a Intranet <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>20</h3>

            <p>Promype</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-cog"></i>
          </div>
          <a href="http://doceditor.regionhuanuco.gob.pe/promype/public/" class="small-box-footer" target="_blanck">Ir a promype <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
</div>
{{-- modal sistemas--}}

@endsection
