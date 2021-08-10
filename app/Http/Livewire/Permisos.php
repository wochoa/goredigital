<?php

namespace App\Http\Livewire;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;
use Livewire\Component;
use App\Sispermiso;
class Permisos extends Component
{
    use WithPagination;

    public $permisos;
    public $search;
    public $idper,$nomper;
    public function render()
    {
        $this->permisos=Sispermiso::where('name', 'like', '%'.$this->search.'%')->orderBy('id','Desc')->get();

        return view('livewire.permisos');
    }

    public function validapermiso($id,$name)
    {   
        $this->idper=$id;
        $this->nomper=$name;
        $this->permisos=Sispermiso::where('id',$id)->get();        
       return  $this->permisos;
    }
    public function editarrol($id)
    {
        $permisos = Sispermiso::find($id);
        $permisos->name=$this->nomper;
        $permisos->save();

        $this->emit('permisoeditado');

    }
    
    public function eliminar($id)
    {
        Sispermiso::find($id)->delete();
        $this->emit('eliminado'); 
    }

    public function nuevopermiso()
    {
        $this->validate(['nomper'=>'required']);
        Permission::create(['name' => $this->nomper]);
        $this->emit('newpermiso');
    }
}
