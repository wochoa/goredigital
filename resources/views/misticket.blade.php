
@extends('layouts.admin')
@section('titpage')
  Gobierno digital | Mis ticket
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Relacion de mis ticket</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">mis ticket</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div class="container-fluid">
    {{-- <div class="row justify-content-center"> --}}
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-gray">
                <div class="card-header p-2">
                  <h3 class="card-title">Relacion de mis ticket creados</h3>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @if(count($datos)>0)

                    <table class="table table-bordered table-hover table-sm table-striped">
                        <thead>
                            <tr><td>CODIGO</td><td>ESTADO</td><td>DETALLE AYUDA</td><td>SOLUCION</td><td>FECHA_PEDIDO</td></tr>
                        </thead>
                        <tbody>
                            {{-- <tr><td></td><td></td></tr> --}}
                            @foreach($datos as $tickets)
                                    @switch($tickets->estado_atencion)
                                        @case('ENVIADO')
                                            @php $estado='<span class="right badge badge-danger">'.$tickets->estado_atencion.'</span>'; @endphp
                                            @break
                                        @case('RECEPCIONADO')
                                            @php $estado='<span class="right badge badge-primary">'.$tickets->estado_atencion.'</span>';@endphp
                                            @break
                                        @case('FINALIZADO')
                                            @php $estado='<span class="right badge badge-success">'.$tickets->estado_atencion.'</span>';@endphp
                                            @break
                                        @default

                                    @endswitch
                                    <tr><td>{{ str_pad($tickets->idticket,6,"0",STR_PAD_LEFT)  }}</td><td>{!! $estado??'' !!}</td><td>{{ $tickets->detalleayuda }}</td><td>{!! $tickets->solucion??'<span class="badge badge-warning">En proceso de solución...</span>' !!}</td><td><small>{{ date("d M g:ia", strtotime($tickets->created_at)) }}</small></td></tr>
                            @endforeach
                        </tbody>
                    </table>

                    @else


                        <div class="callout callout-info">
                            <h5>Usted aun no tiene Ticket creados</h5>
                            {{-- <p>Follow the steps to continue to payment.</p> --}}
                          </div>

                    @endif

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
{{-- modal sistemas--}}

@endsection

