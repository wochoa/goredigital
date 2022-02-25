<?php

namespace App\Http\Livewire;
//use App\Http\Livewire\Str;
use Illuminate\Support\Str;
use App\Reuniones;
use Livewire\Component;

class Newreunion extends Component
{
    public $titreunion;
    public function mount()
    {
        $this->titreunion='';
    }
    public function render()
    {
        $datos=Reuniones::all();
        return view('livewire.newreunion',compact('datos'));
    }
    public function registrareunion()
    {
        $this->validate(['titreunion'=>'required']);
        $iduser=auth()->user()->id;// id user
        $idependencia=auth()->user()->depe_id;// id dependencia
        $titulo=$this->titreunion;
        $slug=Str::slug($titulo);
        //'desc_reunion','id_userreunion','id_depereunion'
        $reunion=new Reuniones;
        $reunion->id_userreunion=$iduser;
        $reunion->id_depereunion=$idependencia;
        $reunion->tit_reunion=$titulo;
        $reunion->slug_reunion=$slug;
        //dd($iduser);
        $reunion->save();
    }
}
