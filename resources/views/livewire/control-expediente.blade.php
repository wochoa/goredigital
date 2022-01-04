<div>
  {{-- The best athlete wants his opponent at his best. --}}
 <div class="card">
     
     <div class="card-body">
      <table class="table table-responsive table-bordered table-hover table-striped">
      
        <thead>
          <tr class="bg-gray text-sm">
            <th><small>EXPEDIENTE</small></th>
            <th><small>INPUTADOS</small></th>
            <th  class="bg-warning text-center"><small>INICIO</small></th>
            <th   class="bg-primary text-center"><small>SANCION</small></th>
            <td ><small>PROCESOS</small></td>
            <th  class="bg-pink text-center"><small>APELACION</small></th>
          </tr>
        </thead>
        <tbody class="p-0">
          
          
          
          <tr>
              <td> <small><a href="#" wire:click="buscarexpedientesctrl(895514)">895514</a></small></td>
            <td>
              <small> 
                <strong>IMPUTADOS (S)</strong>:CELSO ESPINOZA SAMANIEGO<br>
                <strong>CASO</strong>:COBRO POR LICIENCIA<br>
                <strong>FALTA</strong>:INCUMPLIMIENTO DE DEBERES<br>
                <strong>DOC.INGRESO</strong>:11/01/2019 - (INFORME 10-2019-ORAJ)<br>
                <strong>MES</strong>:ENERO<br>
                <strong>AÑO</strong>:2019<br>
                <strong>TOMA CONOCIMIENTO</strong>:RECURSOS HUMANOS                
              </small>
            </td>
            <td >
              <small>
                @php
                  $toma_conocimiento='';//"RECURSOS HUMANOS";//default='';---------- para SECCION INICIO
                  $Fecha_ingreso2='25/12/2021';
                  $Fecha_ingreso = Carbon\Carbon::createFromFormat('d/m/Y', $Fecha_ingreso2)->format('d-m-Y');//---------- para SECCION INI

                  $fechaActual = Carbon\Carbon::now();
                

                  if($toma_conocimiento='RECURSOS HUMANOS')
                    {
                      $date_future = strtotime('+365 day', strtotime($Fecha_ingreso));
                      $fecha_vencimiento = date('d/m/Y', $date_future);//---------- para SECCION INICIO
                    }
                  else
                  {$date_future = strtotime('+1095 day', strtotime($Fecha_ingreso));
                   $fecha_vencimiento = date('d/m/Y', $date_future);//---------- para SECCION INICIO
                  }
                  ////

                  $fecha_vencimiento2 = Carbon\Carbon::createFromFormat('d/m/Y', $fecha_vencimiento)->format('d-m-Y');
                  $plazo=$fechaActual->diffInDays($fecha_vencimiento2);//N6
                  if($fecha_vencimiento2>$fechaActual){$plazo=$plazo;}
                  else {$plazo=(-1)*$plazo;}
                  

                  // importante para el siguiente consulta :=SI(N6<0;"Vencido hace "&N6&" días";SI(N6=0;"Vence Hoy";SI(N6>15;"Tiene "&N6&" días";"Faltan "&N6&" días")))
                  //---------- para SECCION INICIO
                  if($plazo<0){$alerta="<spam class='badge badge-danger'>Vencido hace ".$plazo." días</spam>";}
                  elseif ($plazo==0) {$alerta="<spam class='badge badge-warning'>Vence hoy</spam>";}
                  elseif ($plazo>15) {$alerta="<spam class='badge badge-success'>Tiene ".$plazo." días</spam>";
                  }
                  else{$alerta="<spam class='badge badge-info'>Faltan ".$plazo." días</spam>";}
                 //------------------ SECCION PARA SANSION------------------------------------
                 $fechainicio2='1/11/2019';
                 $fechainicio = Carbon\Carbon::createFromFormat('d/m/Y', $fechainicio2)->format('d-m-Y');

                 $date_vencimiento = strtotime('+365 day', strtotime($fechainicio));//O6+365
                 $vencimiento = date('d-m-Y', $date_vencimiento);//O6+365
                 $fecha_vencimiento = date('d/m/Y', $date_vencimiento);//O6+365

                
                  $diasvencido=$fechaActual->diffInDays($vencimiento);//P6
                  if($vencimiento>$fechaActual){$diasvencido=$diasvencido;}
                  else {$diasvencido=(-1)*$diasvencido;}
                  //=SI(R6<0;"Vencido hace "&R6&" días";SI(R6=0;"Vence Hoy";SI(R6>15;"Tiene "&R6&" días";"Faltan "&R6&" días")))
                  if($diasvencido<0){$alerta2="<spam class='badge badge-danger'>Vencido hace ".$diasvencido." días</spam>";}
                  elseif ($diasvencido==0) {$alerta2="<spam class='badge badge-warning'>Vence hoy</spam>";}
                  elseif ($diasvencido>15) {$alerta2="<spam class='badge badge-success'>Tiene ".$diasvencido." días</spam>";
                  }
                  else{$alerta2="<spam class='badge badge-info'>Faltan ".$diasvencido." días</spam>";}
                  
                @endphp 
                <strong>FECHA DE INGRESO:</strong> {{ $Fecha_ingreso2 }}<br>
                <strong>VENCIMIENTO:</strong> {{ $fecha_vencimiento  }}<br>
                <strong>ALERTAS:</strong> {!! $alerta !!}

              </small>
            </td>
            <td >
              <small> 
                <strong>FECHA DE INICIO:</strong> {{ $fechainicio2 }}<br>
                <strong>VENCIMIENTO:</strong> {{ $fecha_vencimiento }}<br>
                <strong>ALERTAS:</strong> {!! $alerta2 !!}
              </small>
            </td>
            <td >
              <small>
                <strong>ESTADO:</strong> CALIFICACION<br>
                <strong>RESULTADO:</strong> <br>
                <strong>DETALLES:</strong> <br>
                <strong>FOLIO:</strong> 44<br>
                <strong>OBSERVACIONES:</strong> SE EMITE CARTA 000014-2020-GRH/GR/SG<br>
                <strong>ABOGADO RESPONSABLE:</strong> <br>
                
              </small>
            </td>
            <td nowrap>
              <small> 
                <strong>DOCUMENTO DE APELACIÓN:</strong> --<br>
                <strong>FECHA:</strong> --<br>
                <strong>VENCE:</strong> --<br>
                <div class="dropdown-divider"></div>
                <strong>ELEVACION A SERVIR:</strong> --<br>
                <strong>FECHA:</strong> --<br>
                <strong>RESULTADO:</strong> --<br>
              </small>
            </td>
            
          </tr>
          <tr>
            <td>
              <small>1087815</small>
            </td>
            <td>
              <small>
                <strong>IMPUTADOS (S)</strong>:MARIA CLELIA SALCEDO ZUÑIGA<br>
                <strong>CASO</strong>:ACCIONES ADMINISTRATIVAS OCI INFORME DE CONTROL ESPECÍFICO N° 3317-2019-CG/GRHC-SCE ---- PAGO DE INCENTIVOS LABORALES A SERVIDORES ADMINISTRATIVOS DE ENERO A NOVIEMBRE 2018<br>
                <strong>FALTA</strong>:INCUMPLIMIENTO DE DEBERES<br>
                <strong>DOC.INGRESO</strong>:09/12/2019 - (MEMORANDO N° 1701-2019-GRH/GRDS)<br>
                <strong>MES</strong>:DICIEMBRE<br>
                <strong>AÑO</strong>:2019<br>
                <strong>TOMA CONOCIMIENTO</strong>:SECRETARÌA TÈCNICA                
              </small>
            </td>
            <td >
              <small> 
                <strong>FECHA DE INGRESO:</strong> <br>
                <strong>VENCIMIENTO:</strong> 12/30/1902<br>
                <strong>ALERTAS:</strong> Faltan #REF! días

              </small>
            </td>
            <td >
              <small> 
                <strong>FECHA DE INICIO:</strong> 1/13/2020<br>
                <strong>VENCIMIENTO:</strong> 1/12/2021<br>
                <strong>ALERTAS:</strong> Vencido hace -342 días
              </small>
            </td>
            <td >
              <small>
                <strong>ESTADO:</strong> CALIFICACION<br>
                <strong>RESULTADO:</strong> <br>
                <strong>DETALLES:</strong> <br>
                <strong>FOLIO:</strong> 82<br>
                <strong>OBSERVACIONES:</strong> PRESENTÓ DESCARGO<br>
                <strong>ABOGADO RESPONSABLE:</strong> <br>
                
              </small>
            </td>
            <td >
              <small> 
                <strong>DOCUMENTO DE APELACIÓN:</strong> --<br>
                <strong>FECHA:</strong> --<br>
                <strong>VENCE:</strong> --<br>
                <div class="dropdown-divider"></div>
                <strong>ELEVACION A SERVIR:</strong> --<br>
                <strong>FECHA:</strong> --<br>
                <strong>RESULTADO:</strong> --<br>
              </small>
            </td>
          </tr>
          
          <tr>
            <td>
              <small>847938</small>
            </td>
            <td>
              <small>
                <strong>IMPUTADOS (S)</strong>:OCTAVIO VILLANUEVA CARDICH<br>
                <strong>CASO</strong>:CONSENTIMIENTO DE LIQUIDACIÓN TÉCNICA FINANCIERA QUE NO REFLEJA EL HECHO REAL<br>
                <strong>FALTA</strong>:NEGLIGENCIA<br>
                <strong>DOC.INGRESO</strong>:16/01/2019 - (INFORME 11-2019-GRI)<br>
                <strong>MES</strong>:ENERO<br>
                <strong>AÑO</strong>:2019<br>
                <strong>TOMA CONOCIMIENTO</strong>:SECRETARÌA TÈCNICA                
              </small>
            </td>
            <td >
              <small> 
                <strong>FECHA DE INGRESO:</strong> <br>
                <strong>VENCIMIENTO:</strong> 12/30/1902<br>
                <strong>ALERTAS:</strong> Faltan #REF! días

              </small>
            </td>
            <td >
              <small> 
                <strong>FECHA DE INICIO:</strong> 1/16/2020<br>
                <strong>VENCIMIENTO:</strong> 1/15/2021<br>
                <strong>ALERTAS:</strong> Vencido hace -342 días
              </small>
            </td>
            <td >
              <small>
                <strong>ESTADO:</strong> CALIFICACION<br>
                <strong>RESULTADO:</strong> <br>
                <strong>DETALLES:</strong> <br>
                <strong>FOLIO:</strong> 45<br>
                <strong>OBSERVACIONES:</strong> <br>
                <strong>ABOGADO RESPONSABLE:</strong> <br>
                
              </small>
            </td>
            <td >
              <small> 
                <strong>DOCUMENTO DE APELACIÓN:</strong> --<br>
                <strong>FECHA:</strong> --<br>
                <strong>VENCE:</strong> --<br>
                <div class="dropdown-divider"></div>
                <strong>ELEVACION A SERVIR:</strong> --<br>
                <strong>FECHA:</strong> --<br>
                <strong>RESULTADO:</strong> --<br>
              </small>
            </td>
          </tr>
          <tr>
            <td>
              <small>605018</small>
            </td>
            <td>
              <small>
                <strong>IMPUTADOS (S)</strong>:MARIA CLELIA SALCEDO ZUÑIGA<br>
                <strong>CASO</strong>:INCADECUADO MANEJO DE RESIDUOS SOLIDOS LLICUA<br>
                <strong>FALTA</strong>:NEGLIGENCIA<br>
                <strong>DOC.INGRESO</strong>:21/01/2019  - (OFICIO 952019-DRS)<br>
                <strong>MES</strong>:ENERO<br>
                <strong>AÑO</strong>:2019<br>
                <strong>TOMA CONOCIMIENTO</strong>:               
              </small>
            </td>
            <td >
              <small> 
                <strong>FECHA DE INGRESO:</strong> <br>
                <strong>VENCIMIENTO:</strong> 12/30/1902<br>
                <strong>ALERTAS:</strong> Faltan #REF! días

              </small>
            </td>
            <td >
              <small> 
                <strong>FECHA DE INICIO:</strong> 1/21/2020<br>
                <strong>VENCIMIENTO:</strong> 1/20/2021<br>
                <strong>ALERTAS:</strong> Vencido hace -342 días
              </small>
            </td>
            <td >
              <small>
                <strong>ESTADO:</strong> CALIFICACION<br>
                <strong>RESULTADO:</strong> <br>
                <strong>DETALLES:</strong> <br>
                <strong>FOLIO:</strong> 488<br>
                <strong>OBSERVACIONES:</strong>SE EMITE LA CARTA 000074-2020-GRH/GR/SG<br>
                <strong>ABOGADO RESPONSABLE:</strong> <br>
                
              </small>
            </td>
            <td >
              <small> 
                <strong>DOCUMENTO DE APELACIÓN:</strong> --<br>
                <strong>FECHA:</strong> --<br>
                <strong>VENCE:</strong> --<br>
                <div class="dropdown-divider"></div>
                <strong>ELEVACION A SERVIR:</strong> --<br>
                <strong>FECHA:</strong> --<br>
                <strong>RESULTADO:</strong> --<br>
              </small>
            </td>
          </tr>
          <tr>
            <td>
              <small>896878</small>
            </td>
            <td>
              <small>
                <strong>IMPUTADOS (S)</strong>:CECY HERMILIA HUANUCO ALBORNOZ<br>
                <strong>CASO</strong>:CONSENTIMIENTO CAMBIO DE RESIDENTE DE OBRA<br>
                <strong>FALTA</strong>:NEGLIGENCIA<br>
                <strong>DOC.INGRESO</strong>:05/02/2019  - (MEMORANDO 120-2019-SGOS)<br>
                <strong>MES</strong>:FEBRERO<br>
                <strong>AÑO</strong>:2019<br>
                <strong>TOMA CONOCIMIENTO</strong>:               
              </small>
            </td>
            <td >
              <small> 
                <strong>FECHA DE INGRESO:</strong> <br>
                <strong>VENCIMIENTO:</strong> 12/30/1902<br>
                <strong>ALERTAS:</strong> Faltan #REF! días

              </small>
            </td>
            <td>
              <small> 
                <strong>FECHA DE INICIO:</strong> 1/31/2020<br>
                <strong>VENCIMIENTO:</strong> 1/30/2021<br>
                <strong>ALERTAS:</strong> Vencido hace -342 días
              </small>
            </td>
            <td>
              <small>
                <strong>ESTADO:</strong> CALIFICACION<br>
                <strong>RESULTADO:</strong> <br>
                <strong>DETALLES:</strong> <br>
                <strong>FOLIO:</strong> 54<br>
                <strong>OBSERVACIONES:</strong><br>
                <strong>ABOGADO RESPONSABLE:</strong> <br>
                
              </small>
            </td>
            <td >
              <small> 
                <strong>DOCUMENTO DE APELACIÓN:</strong> --<br>
                <strong>FECHA:</strong> --<br>
                <strong>VENCE:</strong> --<br>
                <div class="dropdown-divider"></div>
                <strong>ELEVACION A SERVIR:</strong> --<br>
                <strong>FECHA:</strong> --<br>
                <strong>RESULTADO:</strong> --<br>
              </small>
            </td>
          </tr>
          
        </tbody>
      </table>
     </div>
 </div>
</div>

@section('script')
<script>



Livewire.on('datoexpedientes', url => {
    //alert('url: ' + url);
    //console.log(url);
    abrirPopupSolicitado(url);
})

;

function abrirPopupSolicitado(url) {
var ancho = window.innerWidth;
var alto = window.innerHeight;  
let referenciaObjetoVentana;
const strCaracteristicasVentana = "scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=700,height="+alto+",left=100,top=0"
referenciaObjetoVentana = window.open(url, "fCC_WindowName", strCaracteristicasVentana);
}


</script>
@endsection