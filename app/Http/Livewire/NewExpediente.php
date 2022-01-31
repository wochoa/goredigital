<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewExpediente extends Component
{
    public $expediente;
    public $array_expedientes;
    public $urlregdocumento='';

    public $iddoc;

    public function render()
    {
        
        if($this->expediente){$this->busexpediente();}
        else{
            $this->array_expedientes=[];
        }
        return view('livewire.new-expediente');
    }

    public function busexpediente()
    {
        $this->validate(['expediente'=>'required']);
        $this->array_expedientes=DB::connection('pgsqlhelp')->table('tram_documento')->where('docu_idexma',$this->expediente)->orderBy('docu_fecha_doc','ASC')->get();
        

    }
   public function iniciarpad($iddoc,$idexpe)
   {
    $this->iddoc=$iddoc;
    $this->expediente=$idexpe;
   }
}
