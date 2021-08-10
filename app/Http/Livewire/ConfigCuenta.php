<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConfigCuenta extends Component
{
    use WithFileUploads;
    public $foto;

    public function render()
    {
        return view('livewire.config-cuenta');
    }

    public function cargaavatar()
    {
        $this->validate(['foto'=>'nullable|image|max:1024']);
        if($this->foto){
            $ubicacion=$this->foto->store('avatar');  
            $id=Auth::user()->id;
            DB::update("update users set avatar = '".$ubicacion."' where id = ?", [$id]);
            return redirect('/configcuenta');
        }
      
        //return view('configcuenta');
        $this->emit('saveavatar');
       
    }
    public function cancelafoto()
    {
        $this->foto="";
    }
}
