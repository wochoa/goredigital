@extends('layouts.admin')
@section('titpage')
  Gobierno digital | Chat
@endsection
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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">oficinas</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div class="container-fluid">
    {{-- <div class="row justify-content-center"> --}}
    
        @livewire('chat')
        
        
    
</div>
{{-- modal sistemas--}}

@endsection

@section('script')
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    });
    </script>
@endsection

