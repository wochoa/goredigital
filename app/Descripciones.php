<?php

namespace App;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Model;

class Descripciones //extends Model
{
    
    public static function nombre_oficina($id)
    {
        $buscar=DB::connection('pgsqlhelp')->table('tram_dependencia')->where('iddependencia',$id)->value('depe_nombre');
        return $buscar;
        
    }
    public static function nombre_documento($id)
    {
        $buscar=DB::connection('pgsqlhelp')->table('tram_tipodocumento')->where('idtdoc',$id)->value('tdoc_descripcion');
        return $buscar;
    }

}
