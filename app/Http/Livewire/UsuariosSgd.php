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
    public $rolasiguser;
    //public $userSGD;

    public $iduser;
    public $nomrolasig;
    public $nombrerolanterior;
    public $nombres;

    public $contadorsgd;
    public $contadorrol;

    public $depe_id;
    public $unidades;
    public $unidad_id;
    public $personal;

    public $nombredepe;

    public $locationUsers = [];
    protected $listeners = ['Iniciacargarol'];
    
    public function mount()
    {
        $this->nombreusersel='';
        $this->asigrol='';
        $this->nomrolasig=[];
        $this->nombrerolanterior=[];
        $this->contadorsgd=0;
        $this->contadorrol=0;

        /// para identificar la id de dependencia por el usuario que ingresa al sistema
        $this->unidad_id=auth()->user()->depe_id;
        // $this->personal=DB::table('admin')->where(['depe_id'=>$this->unidad_id,'adm_estado'=>'1'])->orderBy('adm_name','asc')->get();
        $coddepe=DB::table('dependencia')->where('iddependencia',$this->unidad_id)->get();
        $this->depe_id=@$coddepe[0]->depe_depende;
       // $this->nombredepe=@$coddepe[0]->depe_depende;
        $this->nombredepe($this->depe_id);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $this->rol=DB::table('roles')->get();//select *from users join model_has_roles on(users.id=model_has_roles.model_id) join roles on(model_has_roles.role_id=roles.id)
        $this->rolasiguser=DB::table('vistadistinrolasignado')->where('depe_id',$this->unidad_id)->paginate(10);

        $contarolesasig=DB::table('admin')->join('model_has_roles','admin.id','=','model_has_roles.model_id')->join('roles','model_has_roles.role_id','=','roles.id')->select('admin.adm_name as nombres','admin.adm_lastname as apellidos','roles.name as rol','admin.id')->where('admin.adm_lastname', 'like', '%'.$this->search.'%')->get();
        $datsgd=User::where('adm_estado',1)->orderBy('id','asc')->get();
        $this->contadorsgd=count($datsgd);
        $this->contadorrol=count($contarolesasig);

        // para llenar las depedencias
        $dependencia=DB::table('dependencia')->select('depe_depende')->where(['depe_estado'=>'1','depe_tipo'=>'1'])->groupBy('depe_depende')->orderBy('depe_depende','DESC')->get();
        
        for($i=0;$i<count($dependencia);$i++)
        {
                $nomdepe=DB::table('dependencia')->where('iddependencia',$dependencia[$i]->depe_depende)->get();

                if($dependencia[$i]->depe_depende<>1034 and $dependencia[$i]->depe_depende<>1818 and $dependencia[$i]->depe_depende<>851 and $dependencia[$i]->depe_depende<>1894)
                {$datosdepe[]=array("iddepe"=>$dependencia[$i]->depe_depende,"nombredebe"=>$nomdepe[0]->depe_nombre);}
               
        }

        $this->unidades=DB::table('dependencia')->where('depe_depende',$this->depe_id)->orderBy('iddependencia','asc')->get();
        // fin de llenado de dependencias

        $this->userSGD=User::where('adm_estado',1)->where('adm_lastname', 'like', '%'.$this->search.'%')->orderBy('id','asc')->paginate(10);
        return view('livewire.usuarios-sgd',['userSGD'=>$this->userSGD,'rolasiguser'=>$this->rolasiguser,'datosdepe'=>$datosdepe]);
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

    public function cargaeditrol($id,$nombres)
    {
        $this->iduser=$id;
        $this->nomrolasig=[];
        //$datos[]=DB::table('vistarolasignados')->select('rol')->where('id',$id)->get();

        $roles = DB::table('vistarolasignados')->where('id',$id)->pluck('rol');

            foreach ($roles as $roll) {
                $this->nomrolasig[]=$roll;
            }

        $this->nombrerolanterior=$this->nomrolasig;
 
        $this->nombres=$nombres;
        //return  $this->nomrolasig;

    }

    public function Iniciacargarol($locationUsersValues)
    {
        $this->locationUsers = $locationUsersValues;
        //return $this->locationUsers;
        $this->actualizacionderol($this->locationUsers);
    }

    public function actualizacionderol($dat)
    {
        //$this->validate(['nomrolasig'=>'required']);
        $user = User::find($this->iduser);
        foreach($this->nombrerolanterior as $key)
        {
            $user->removeRole($key);
        }
        

        $user->assignRole($dat);
       
        //return $this->nomrolasig;
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

    public function unidad($id)
    {
        $this->depe_id=$id;
        $this->unidades[]=DB::table('dependencia')->where(['depe_depende'=>$this->depe_id,'depe_estado'=>'1'])->orderBy('iddependencia','asc')->get();
          
        //$this->unidad_id='';
        
    }
     public function personal($iduni)
    {
        $this->unidad_id=$iduni;
        // $this->personal=DB::table('admin')->where(['depe_id'=>$iduni,'adm_estado'=>'1'])->orderBy('adm_name','asc')->get();
        
        //return $iduni;
    }
    public function nombredepe($id)
    {
        $dato=DB::table('dependencia')->where(['iddependencia'=>$id,'depe_estado'=>'1'])->orderBy('iddependencia','asc')->get();
        $this->nombredepe=$dato[0]->depe_nombre;
        //return  
    }
}
