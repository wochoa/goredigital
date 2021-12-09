<style>
    .page-break {
        page-break-after: always;
    }
    .table{
        font-size: 12px
    }
    .center {
  margin: auto;
  width: 50%;
  /* border: 3px solid green; */
  padding: 10px;
  font-size: 15px;
  text-align: center
}
</style>


    <h2 class="center">Ticket atendidos</h2>



<table class="table" border="1" cellspacing="0">
    <thead>
        <tr style="background:#ccc;"><td>N</td><td>CODIGO</td><td>ESTADO</td><td>DETALLE AYUDA</td><td>SOLUCION</td><td>FECHA_PEDIDO</td><td>FECHA_SOLUCION</td></tr>
    </thead>
    <tbody>
        @php
            $i=0;
        @endphp
        @foreach($datos as $tickets)
        @php
            $i++;
        @endphp
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
                <tr><td>{{ $i }}</td><td>{{ str_pad($tickets->idticket,6,"0",STR_PAD_LEFT)  }}</td><td>{!! $estado??'' !!}</td><td>{{ $tickets->detalleayuda }}</td><td>{!! $tickets->solucion??'<span class="badge badge-warning">En proceso de solución...</span>' !!}</td><td><small>{{ date("d M g:ia", strtotime($tickets->created_at)) }}</small></td><td>
                    @if($tickets->fecha_resuelto)
                    <small>{{ date("d M ", strtotime($tickets->fecha_resuelto)) }}</small><small>{{ date("g:ia", strtotime($tickets->hora_resuelto)) }}</small>
                    @else
                    -  
                    @endif
                    
                </td></tr>
        @endforeach
    </tbody>
</table>