<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\Component;
use App\Sispermiso;

class Rolpermiso extends Component
{
    public $roles;
    public $idrol,$nomrol,$listpermiso;
    public $permisos,$permisoasignado,$arraypermisoasignado;
    public $search;

    public function mount()
    {

      $this->permisos=[];
      $this->listpermiso=[];
      $this->permisoasignado=[];
    }
    public function render()
    {
        $this->roles=DB::table('roles')->where('name','like','%'.$this->search.'%')->orderBy('id','desc')->get();
        $this->permisos=Sispermiso::orderBy('id','Desc')->get();
        return view('livewire.rolpermiso');
    }
    public function validarol($id,$name)
    {   
        $this->idrol=$id;
        $this->nomrol=$name;
 
        $this->permisoasignado=DB::table('role_has_permissions')->join('permissions','role_has_permissions.permission_id','=','permissions.id')->where('role_id',$id)->orderBy('id','Desc')->get();

    }
    public function crearrol()
    {
        $this->validate(['nomrol'=>'Required','listpermiso'=>'required']);

        $role = Role::create(['name' => $this->nomrol]);

        $role->givePermissionTo(
          $this->listpermiso
      );
 
        
          //return $this->listpermiso;
        $this->emit('creacionrol');
    }

    public function agregarpermiso($nomrol,$nompermiso)
    {
      Role::findByName($nomrol)->givePermissionTo($nompermiso);
      
      $this->validarol($this->idrol,$nomrol);
    }

    public function quitarpermiso($nomrol,$nompermiso)
    {
      Role::findByName($nomrol)->revokePermissionTo($nompermiso);
      
      $this->validarol($this->idrol,$nomrol);
    }

    public function eliminarrol($rol)
    {
     DB::delete('delete from roles where name = ?', [$rol]);
     $this->emit('eliminado');
    }
    
    public function editarrol($id)
    {
      //$nombre="'".$nom."'";
      $this->validate(['nomrol'=>'Required']);
      $sql="UPDATE roles SET name='".$this->nomrol."' WHERE id=".$id;
      DB::update($sql);

      //$role  =Role::findByName($nom);

      $this->emit('edicionnrol');
      //return $nom;
    }
}
