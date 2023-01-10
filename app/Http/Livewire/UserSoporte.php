<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Component;

class UserSoporte extends Component
{
    public function render()
    {
        $idofi=Auth::user()->depe_id;
        $codigodepe=DB::table('dependencia')->where('iddependencia',$idofi)->value('depe_depende');
        $coddependencia=$codigodepe;//$codigodepe[0]->depe_depende;

        $usersoporte=DB::table('vistausersoporte')->where(['depe_depende'=>$coddependencia,'adm_estado'=>1])->get();
        
        return view('livewire.user-soporte',compact('usersoporte'));
    }

    public function roles()
    {

    }
}
