<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Updateuser extends Component
{
    public $nombre;
    public $apellidos;
    public $dni;
    public $telefono;
    public $cargo;
    
    public function render()
    {
        return view('livewire.updateuser');
    }

    public function update()
    {

    }

    public function buscardni()
    {
        $url='http://goredigital.regionhuanuco.gob.pe/reniec/'.$this->dni;
        $wsdl = file_get_contents($url);
        // return json_encode($wsdl);
      
        //return "hola mundo";
        return ($wsdl);
    }
}
