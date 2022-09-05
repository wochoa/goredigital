<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Reuniones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('newreunion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function incripcionesreunion($titulo)
    {
        $titulo=DB::table('reuniones')->where('slug_reunion',$titulo)->get();
        //$idreu=DB::table('reuniones')->where('slug_reunion',$titulo)->value('idreuniones');

        session(['idreunion' => $titulo[0]->idreuniones ]);
        
        return view('inscripcionreunion',compact('titulo'));
    }

    
}
