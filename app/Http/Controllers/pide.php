<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pide extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     // consulta PIDE
  public function pide()
  {
      return view('pide');
  }
  public function reniec($dni)
  {
    $key=env('KEY_DNI');
    $url='http://app.regionhuanuco.gob.pe/soap_pruebas/reniec.php?cdni='.$dni.'&key='.$key;
    $wsdl = file_get_contents($url);
    return $wsdl;
  }
  public function sis($dni)
  {
      $url='http://app.regionhuanuco.gob.pe/soap_pruebas/sis.php?dni='.$dni;
      $wsdl = getRemoteFile($url);
      //$datos=json_decode($wsdl);
      return $wsdl;
  }
  public function sunat($ruc)
  {
      $url='http://app.regionhuanuco.gob.pe/soap_pruebas/sunat.php?ruc='.$ruc;
      $wsdl = getRemoteFile($url);
      //$datos=json_decode($wsdl);
      return $wsdl;
  }
  public function sunedu($dni)
  {
      $url='http://app.regionhuanuco.gob.pe/soap_pruebas/sunedu.php?dni='.$dni;
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
      $url='http://app.regionhuanuco.gob.pe/soap_pruebas/infocolegio.php?id='.$id;
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
      $url='http://app.regionhuanuco.gob.pe/soap_pruebas/datosantjudget.php?nom='.$nom.'&pat='.$pat.'&mat='.$mat;
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

  public function conadis($dni)
  {
    //43709827
    $url='https://ws5.pide.gob.pe/Rest/APide/Conadis/PDiscapacidad?Username=42282733-20489250731&Password=XYlYADG7dd&DocNumber='.$dni.'&out=json';
      $wsdl = getRemoteFile($url);
      $array=json_decode($wsdl);
     
      return json_encode($array);
  }
  public function juntos($dni)
  {
    //43709827
    $url='https://ws3.pide.gob.pe/Rest/Juntos/Beneficiario?dni='.$dni.'&out=json';
      $wsdl = getRemoteFile($url);
      $array=json_decode($wsdl);
      $datos=$array->getBeneficiarioByDNIResponse->return;
      //$procesado=$datos->procesosAdjudicados;
      return json_encode($datos);
  }
  public function pension($dni)
  {
    //43709827
    $url='https://ws5.pide.gob.pe/Rest/APide/Pension65/CUsuario?usuario=42282733&clave=P3NS10N65HU4NUC0&idAppUsuario=1&numeroDocumento='.$dni.'&out=json';
      $wsdl = getRemoteFile($url);
      $array=json_decode($wsdl);
      $datos=$array->consultarUsuarioResponse->return;
      //$procesado=$datos->procesosAdjudicados;
      return json_encode($datos);
  }
  public function qaliwarma(Request $request)
  {
    $departamento=$request->query('depa');
    $provincia=$request->query('prov');
    $distrito=$request->query('dist');
    $nivel=$request->query('nivel');

      $token=$this->toke_qaliwarma();

      $url='https://ws3.pide.gob.pe/Rest/QaliWarma/IIEEs?anexo=&centro_poblado=&cod_modular=&departamento='.$departamento.'&direccion=&distrito='.$distrito.'&modalidad_atencion=&nivel_educativo='.$nivel.'&nombre=&nro_alumnos=0&provincia='.$provincia.'&rde=&token='.$token.'&ubigeo=&out=json';
      $wsdl = getRemoteFile($url);
      $array=json_decode($wsdl);
    //   $datos=$array->getIIEEsResponse;
    //   $resul=$datos->getIIEEsResult->listIIEEsResponse;
      return $wsdl;
  }
  public function toke_qaliwarma()
  {
    $pass='Gobierno Regional de Huanuco$';
    $token='hXPx2rkdkD9tRBsHaZ7ggyoiCiHb4ull5MuTUZP2mZWQ6jqzzFYJk6i8PcJZm8y';
    $usuario='qwext00008';

    $url='https://ws3.pide.gob.pe/Rest/QaliWarma/Autenticate?password=Gobierno%20Regional%20de%20Huanuco$&token=hXPx2rkdkD9tRBsHaZ7ggyoiCiHb4ull5MuTUZP2mZWQ6jqzzFYJk6i8PcJZm8y&username=qwext00008&out=json';
    $wsdl = getRemoteFile($url);
    $array=json_decode($wsdl);
    $datos=$array->authenticateQWResponse;
    $resul=$datos->authenticateQWResult->authenticationEntity;

    return $resul->token;
  }
}
