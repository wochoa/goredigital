<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ControlExpediente extends Component
{
    public $expedientes;
    public function render()
    {
        return view('livewire.control-expediente');
    }
    public function buscarexpedientesctrl($expe)
    {
        //$this->expedientes=DB::connection('pgsqlhelp')->table('tram_documento')->where('docu_idexma',$expe)->get();
        $url='http://digital.regionhuanuco.gob.pe/tramite/buscar/buscarExpedienteModal/'.$expe;

        //return $expedientes;
        $this->emit('datoexpedientes',$url);
        //$this->emit('postAdded', $post->id);
    }
}
