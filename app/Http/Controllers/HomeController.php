<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Sispermiso;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('main');
    }
    public function ticket()
    {
        if(Auth::user()->can('Pagina_crearticket'))
        {
            return view('ticket');
        }
        else{
            return redirect('/');
        }
        
    }
    public function oficina()
    {
        $depe=Auth::user()->depe_id;
        $datos=DB::table('admin')->where(['depe_id'=>$depe,'adm_estado'=>1])->orderBy('id','ASC')->get();

        
        if(Auth::user()->can('Pagina_mioficina'))
        {
            return view('oficina',compact('datos'));
        }
        else{
            return redirect('/');
        }
        
    }
    public function configcuenta()
    {
        
        $iduser=Auth::user()->id;
        $datos=DB::table('admin')->join('dependencia','admin.depe_id','=','dependencia.iddependencia')->where('id',$iduser)->get();
        return view('configcuenta',compact('datos'));
        //print_r($datos);
    }
    public function chat()
    {
        if(Auth::user()->can('Pagina_chat'))
        {
            return view('chat');
        }
        else{
            return redirect('/');
        }
        
    }
    public function misticket()
    {   
        $iduser=Auth::user()->id;
        $datos=Ticket::where('iduser',$iduser)->orderBy('idticket','desc')->get();

        if(Auth::user()->can('Pagina_misticket'))
        {
            return view('misticket',compact('datos'));
        }
        else{
            return redirect('/');
        }
    }

    public function usuariossgd()
    {   if(Auth::user()->can('pagina_userSGD'))
        {
            return view('usuariossgd');
        }
        else{
            return redirect('/');
        }
        
    }
    public function catatencion()
    {
        if(Auth::user()->can('Pagina_catatenciones'))
        {
            return view('catatenciones');
        }
        else{
            return redirect('/');
        }
        
    }

    public function usersoporte()
    {
        $idofi=Auth::user()->depe_id;
        $codigodepe=DB::table('dependencia')->where('iddependencia',$idofi)->get();
        $coddependencia=$codigodepe[0]->depe_depende;

        $usersoporte=DB::table('vistausersoporte')->where('depe_depende',$coddependencia)->get();
        if(Auth::user()->can('Pagina_personalsoporte'))
        {
            return view('usersoporte',compact('usersoporte'));
        }
        else{
            return redirect('/');
        }
        
    }

    public function rolpermiso()
    {
        if(Auth::user()->can('Pagina_roles'))
        {
            return view('rolpermiso');
        }
        else{
            return redirect('/');
        }
        
    }
    public function permisos()
    {
        if(Auth::user()->can('Pagina_permisos'))
        {
            return view('permisos');
        }
        else{
            return redirect('/');
        }
        
    }

    public function reporteetnciones()
    {
        $iduser=Auth::user()->id;
        $datos=Ticket::where('idsoporte',$iduser)->get();

        if(Auth::user()->can('Pagina_reporteticket'))
        {
            return view('reporteatenciones',compact('datos'));
        }
        else{
            return redirect('/');
        }
        
    }

}
