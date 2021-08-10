<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class Catatenciones extends Component
{
    public $iddependencia,$atencion;
    public $datos;
    public $idatencion;

    public function mount()
    {
        $this->atencion='';
    }
    public function render()
    {
        $idofi=Auth::user()->depe_id;
        $codigodepe=DB::table('dependencia')->where('iddependencia',$idofi)->get();
        $this->iddependencia=$codigodepe[0]->depe_depende;
        $this->mostaratenciones();
        
        //return view('catatenciones');
        return view('livewire.catatenciones');
    }
    public function newatencion()
    {
        $this->validate(['atencion'=>'Required']);
        DB::insert('insert into cat_atencions (problema, idejecutora) values (?, ?)', [$this->atencion, $this->iddependencia]);
        $this->mostaratenciones();
        $this->datosnuevos();
        $this->emit('saveatenciones');
    }
    public function mostaratenciones()
    {
        $this->datos=DB::table('cat_atencions')->where('idejecutora',$this->iddependencia)->orderBy('idatencion','ASC')->get();
    }
    public function datosnuevos()
    {
        $this->atencion='';
    }
    public function validaatencion($id,$prob)
    {
        $this->atencion=$prob;
        $this->idatencion=$id;
    }
    public function editar($id)
    {
        $this->validate(['atencion'=>'Required']);
        $problema="'".$this->atencion."'";
        DB::update('update cat_atencions set problema = '.$problema.' where idatencion = ?', [$id]);
        $this->emit('edicion');
    }

    public function elimina($id)
    {
        DB::delete('delete from cat_atencions where idatencion = ?', [$id]);
        $this->emit('eliminacion');
    }
}
