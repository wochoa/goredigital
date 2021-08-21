<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pide extends Controller
{
     // consulta PIDE
  public function pide()
  {
      return view('pide');
  }
  public function reniec($dni)
  {
      
      $url='https://app.regionhuanuco.gob.pe/soap_pruebas/reniec.php?cdni='.$dni;

      $wsdl = file_get_contents($url);
      return $wsdl;
  }
  public function sis($dni)
  {
      $url='https://app.regionhuanuco.gob.pe/soap_pruebas/sis.php?dni='.$dni;
      $wsdl = getRemoteFile($url);
      //$datos=json_decode($wsdl);
      return $wsdl;
  }
  public function sunat($ruc)
  {
      $url='https://app.regionhuanuco.gob.pe/soap_pruebas/sunat.php?ruc='.$ruc;
      $wsdl = getRemoteFile($url);
      //$datos=json_decode($wsdl);
      return $wsdl;
  }
  public function sunedu($dni)
  {
      $url='https://app.regionhuanuco.gob.pe/soap_pruebas/sunedu.php?dni='.$dni;
      $wsdl = getRemoteFile($url);
      //$datos=json_decode($wsdl);
      return $wsdl;
  }
  public function essalud($dni)
  {
      $url='https://ws3.pide.gob.pe/Rest/EsSalud/Asegurados?tipodoc=01&numdoc='.$dni.'&user=42282733&pass=42woa33&out=json';
      $wsdl = getRemoteFile($url);
      //$datos=json_decode($wsdl);
      return $wsdl;
  }
  
  public function proveedorsancionado($ruc)
  {
      $url='https://ws3.pide.gob.pe/Rest/Osce/VigenteProveedor?ruc='.$ruc.'&out=json';
      $wsdl = getRemoteFile($url);

      $array=json_decode($wsdl);
      $datos=$array->obtenerProveedorVigenteResponse->output;
      $resultado=$datos->resultado;

      if($resultado==1){// proveedor vigente no esta sancionado resultado==1
          $mensage=$datos->mensaje;
          $registro=$datos->registro;
          $nuevoarray=array('resultado'=>$resultado,'mensage'=>$mensage,'registro'=>$registro);
      }
      else{// proveedor esta sancionado resultado==2
          $url2='https://ws3.pide.gob.pe/Rest/Osce/VigenteSancion?ruc='.$ruc.'&out=json';
          $wsdl2 = getRemoteFile($url2);

          $array2=json_decode($wsdl2);
          $datos2=$array2->obtenerSancionVigenteResponse->output;
          $resultado2=$datos2->resultado;
          $mensaje2=$datos2->mensaje;
          $registro2=$datos2->sancion;

          $nuevoarray=array('resultado'=>2,'mensage'=>$mensaje2,'registro'=>$registro2);
      }
      
      //return $wsdl;
      return $nuevoarray;
  }
  public function busprocselxexpediente($exp)
  {
      $url='https://ws3.pide.gob.pe/Rest/ROsce/SeleccionXExpediente?idExpediente='.$exp.'&out=json';
      $wsdl = getRemoteFile($url);
      $array=json_decode($wsdl);
      $datos=$array->buscarProcesoDeSeleccionPorExpedienteResponse->output;
      $procesado=$datos->procesoDeSeleccion;

  //    print_r($procesado);
      return json_encode($procesado);
  }

  public function busprocselxrucaniomes($ruc,$anio,$mes)
  {
      $url='https://ws3.pide.gob.pe/Rest/ROsce/SeleccionXRuc?ruc='.$ruc.'&anio='.$anio.'&numMes='.$mes.'&out=json';
      $wsdl = getRemoteFile($url); 
      $array=json_decode($wsdl);
      $datos=$array->buscarProcesosDeSeleccionResponse->output;
      $procesos=$datos->procesosDeSeleccion;
      return $procesos;
  }

  public function infocolnacioparticular($id)
  {
      $url='https://app.regionhuanuco.gob.pe/soap_pruebas/infocolegio.php?id='.$id;
      $wsdl = getRemoteFile($url);
      $datos=json_decode($wsdl);
      $ObtenerResult=$datos->ObtenerResult;
      return json_encode($ObtenerResult);
  }
  public function gradoinstituto($dni)
  {
      $url='https://ws3.pide.gob.pe/Rest/Minedu/Titulo?nroDocumento='.$dni.'&out=json';
      $wsdl = getRemoteFile($url);
      $datos=json_decode($wsdl);
      $GetDataResponse=$datos->GetDataResponse->GetDataResult;
      $data=$GetDataResponse->DATA->TituloContract;
      return json_encode($data);
  }
  public function antecedentejudicial($pat,$mat,$nom)
  {
      $url='https://app.regionhuanuco.gob.pe/soap_pruebas/datosantjudget.php?nom='.$nom.'&pat='.$pat.'&mat='.$mat;
      $wsdl = getRemoteFile($url);
      return $wsdl;
  }
  public function proveedoradjudicadoxexpediente($exp)
  {
      //https://ws3.pide.gob.pe/Rest/ROsce/AdjudicadoXExpediente?idExpediente=445241&out=json
      $url='https://ws3.pide.gob.pe/Rest/ROsce/AdjudicadoXExpediente?idExpediente='.$exp.'&out=json';
      $wsdl = getRemoteFile($url);
      $array=json_decode($wsdl);
      $datos=$array->obtenerProcesoAdjudicadoPorExpedienteResponse->output;
      $procesado=$datos->procesosAdjudicados;

  //    print_r($procesado);
      return json_encode($procesado);
  }

  public function proveeadjxrucyanio($ruc,$anio)
  {
      //https://ws3.pide.gob.pe/Rest/ROsce/AdjudicadoXExpediente?idExpediente=445241&out=json
      $url='https://ws3.pide.gob.pe/Rest/ROsce/AdjudicadoXRuc?anio='.$anio.'&ruc='.$ruc.'&out=json';
      $wsdl = getRemoteFile($url);
      $array=json_decode($wsdl);
      $datos=$array->obtenerProcesosAdjudicadosResponse->output;
      $procesado=$datos->procesosAdjudicados;

  //    print_r($procesado);
      return json_encode($procesado);
      //return $wsdl;
  }
}
