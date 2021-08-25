<?php
use Carbon\Carbon;
function activo($ruta)
{
	return request()->routeIs($ruta) ? 'active' : '';
}
function menuopen($ruta=[])
{
	return request()->routeIs($ruta) ? 'menu-open' : '';
}

function tituloactivo($ruta=[])
{
	return request()->routeIs($ruta) ? 'active' : '';
}

function groupArray($array,$groupkey)
{
 if (count($array)>0)
 {
 	$keys = array_keys($array[0]);
 	$removekey = array_search($groupkey, $keys);		
	 if ($removekey===false)
 		return array("Clave \"$groupkey\" no existe");
 	else
 		unset($keys[$removekey]);
 	$groupcriteria = array();
 	$return=array();
 	foreach($array as $value)
 	{
 		$item=null;
 		foreach ($keys as $key)
 		{
 			$item[$key] = $value[$key];
 		}
 	 	$busca = array_search($value[$groupkey], $groupcriteria);
 		if ($busca === false)
 		{
 			$groupcriteria[]=$value[$groupkey];
 			$return[]=array($groupkey=>$value[$groupkey],'groupeddata'=>array());
 			$busca=count($return)-1;
 		}
 		$return[$busca]['groupeddata'][]=$item;
 	}
 	return $return;
 }
 else
 	return array();
}

?>