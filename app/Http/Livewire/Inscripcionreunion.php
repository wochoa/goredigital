<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Inscripcionreunion extends Component
{
    public $usuario='', $pass='';
    public $datos;

    // datos de las personas
    public $nombre='';
    public $dni='';
    public $numcel='';
    public $cargo='';
    public $dependencia='';
    public $correo='';
    public $pregunta='';
    public $iduser='';
    public $nombredepe='';


    // variables para inscribir
    public $mensage='';
    public $codmensage=0;

    public function mount()
    {
        $this->datos='';

    }
    public function render()
    {
        //$datos=$this->datos;
       
        return view('livewire.inscripcionreunion');
    }

    public function ingresar()
    {
        $this->validate(['usuario'=>'required','pass'=>'required']);
        $clave=Hash::make($this->pass);

        //$this->datos=DB::table('admin')->where(['adm_email'=>$this->usuario,'adm_password'=>$clave])->get();
        $this->datos=DB::table('admin')->where('adm_email',$this->usuario)->get();

        //$this->pregunta=$this->datos[0]->adm_dni;//depe_id

        if (Hash::check($this->pass, $this->datos[0]->adm_password)) {
            $this->nombre=$this->datos[0]->adm_name.' '.$this->datos[0]->adm_lastname;
            $this->dni=$this->datos[0]->adm_dni;
            $this->numcel=$this->datos[0]->adm_telefono;
            $this->cargo=$this->datos[0]->adm_cargo;
            $this->correo=$this->datos[0]->adm_correo;
            $this->dependencia=$this->datos[0]->depe_id;
            $this->iduser=$this->datos[0]->id;

            $this->nombredepe=DB::table('dependencia')->where('iddependencia',$this->dependencia)->value('depe_nombre');
            $this->mensage='La contraseña es correcta';
            $this->codmensage=1;
        }
        else{
            $this->mensage='La contraseña es incorrecta';
            $this->codmensage=2;
        }

    }

    public function registrar()
    {
        //dd($this->nombre);
        $fecha=date('Y-m-d H:i:s');
        $idreu=session('idreunion');
        DB::insert('insert into reunionesdetalles (id_reuniones, iduser,iddependencia,nombres,dni,celular,cargo,email,preguntaincluida,created_at) values (?, ?,?,?,?,?,?,?,?,?)', [$idreu,$this->iduser,$this->dependencia,$this->nombre,$this->dni,$this->numcel,$this->cargo,$this->correo,$this->pregunta,$fecha]);

        $this->emit('registrado');
    }
}
