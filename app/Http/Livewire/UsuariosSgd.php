<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

use App\User;

class UsuariosSgd extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search="";
    public $rol;// conjunto de datos de la tabla roles
    public $asigrol;// variable de seleccion de de rol para su asignacion
    public $idusuariosgd;// id del usuario que se desea asignar el rol
    public $nombreusersel;
    public $nomrol;//NOMBRE DE ROL
    //public $rolasiguser;
    //public $userSGD;

    public $iduser;
    public $nomrolasig;
    public $nombrerolanterior;
    public $nombres;

    public $contadorsgd;
    public $contadorrol;


    
    public function mount()
    {
        $this->nombreusersel='';
        $this->asigrol='';
        $this->nomrolasig='';
        $this->nombrerolanterior='';
        $this->contadorsgd=0;
        $this->contadorrol=0;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $this->rol=DB::table('roles')->get();//select *from users join model_has_roles on(users.id=model_has_roles.model_id) join roles on(model_has_roles.role_id=roles.id)
        $this->rolasiguser=DB::table('admin')->join('model_has_roles','admin.id','=','model_has_roles.model_id')->join('roles','model_has_roles.role_id','=','roles.id')->select('admin.adm_name as nombres','admin.adm_lastname as apellidos','roles.name as rol','admin.id')->where('admin.adm_lastname', 'like', '%'.$this->search.'%')->paginate(10);

        $contarolesasig=DB::table('admin')->join('model_has_roles','admin.id','=','model_has_roles.model_id')->join('roles','model_has_roles.role_id','=','roles.id')->select('admin.adm_name as nombres','admin.adm_lastname as apellidos','roles.name as rol','admin.id')->where('admin.adm_lastname', 'like', '%'.$this->search.'%')->get();
        $datsgd=User::where('adm_estado',1)->orderBy('id','asc')->get();
        $this->contadorsgd=count($datsgd);
        $this->contadorrol=count($contarolesasig);

        $this->userSGD=User::where('adm_estado',1)->where('adm_lastname', 'like', '%'.$this->search.'%')->orderBy('id','asc')->paginate(10);
        return view('livewire.usuarios-sgd',['userSGD'=>$this->userSGD,'rolasiguser'=>$this->rolasiguser]);
    }

    public function cargadato($id)
    {
        $this->idusuariosgd=$id;
        
        $dato=User::where('id',$id)->get();
        $this->nombreusersel=$dato[0]->adm_name.' '.$dato[0]->adm_lastname;
    }

    public function asignacionrol()
    {
        $this->validate(['nomrol'=>'required']);// VERIFICAMOS QUE SELECCIONE ALGUNA OPCION
        //return $this->idusuariosgd;
        //User Admin
        $user = User::find($this->idusuariosgd); //Italo Morales
        $user->assignRole($this->nomrol);
        $this->emit('saverolasignado');
    }
    public function buscamodelrol($id)
    {
        $dato=DB::table('model_has_roles')->join('roles','model_has_roles.role_id','=','roles.id')->where('model_id',$id);
        return $dato[0]->name;
    }

    public function cargaeditrol($id,$rol,$nombres)
    {
        $this->iduser=$id;
        $this->nomrolasig=$rol;
        $this->nombrerolanterior=$rol;
        $this->nombres=$nombres;
    }

    public function actualizacionderol()
    {
        $this->validate(['nomrolasig'=>'required']);
        $user = User::find($this->iduser);
        $user->removeRole($this->nombrerolanterior);

        $user->assignRole($this->nomrolasig);
       

        $this->emit('actualizadorol');
    }
    public function migrarslgconrol()
    {    $userSGDs=User::where('adm_estado',1)->orderBy('id','asc')->get();
        
        $rolasigusers=DB::table('admin')->join('model_has_roles','admin.id','=','model_has_roles.model_id')->join('roles','model_has_roles.role_id','=','roles.id')->select('admin.adm_name as nombres','admin.adm_lastname as apellidos','roles.name as rol','admin.id')->get();

        foreach($userSGDs as $sgd)
        {
            $i=0;
            foreach($rolasigusers as $key)
            {
                if(@$sgd->id==@$key->id)
                {
                    break;
                }
                else{
                    $i++;
                }
            }
            if(count($rolasigusers)==$i)
            {
                $user = User::find($sgd->id);
                $user->assignRole('Usuario');
            }
        }
        $this->emit('migracionok');
       
    }
}
