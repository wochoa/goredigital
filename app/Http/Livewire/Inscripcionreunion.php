<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\User;

class Inscripcionreunion extends Component
{
    public $usuario, $pass;
    public $datos;

    public function render()
    {
        //$datos=$this->datos;
        return view('livewire.inscripcionreunion');
    }

    public function ingresar()
    {
        $this->validate(['usuario'=>'required','pass'=>'required']);

        $this->datos=User::where(['adm_email'=>$this->usuario,'adm_password'=>$this->pass])->get();

        // $this->validate(['titreunion'=>'required']);
        dd($this->datos);
    }
}
