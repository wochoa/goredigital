<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Pad extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('newexpediente');
    }
    public function controlexpedientes()
    {
        return view('controlexpediente');
    }
    public function reporteexpediente()
    {
        return view('reporteexpediente');
    }
    public function userpad()
    {
        $idofi=Auth::user()->depe_id;
        $codigodepe=DB::table('dependencia')->where('iddependencia',$idofi)->value('depe_depende');
        $coddependencia=$codigodepe;//$codigodepe[0]->depe_depende;

        $usersoporte=DB::table('vistausersoporte')->where('depe_depende',$coddependencia)->get();
        if(Auth::user()->can('Pagina_personalsoporte'))
        {
            return view('userpad',compact('usersoporte'));
        }
        else{
            return redirect('/');
        }
    }

    
}
