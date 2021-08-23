<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GestionPortales extends Component
{
    //public $paginas;
    public $iduser;

    public $depe_id;
    public $unidad_id;
    public $unidades;
    public $personal;

    public $codpag;
    public $nombreweb;
    public $coddepe;

    public function mount()
    {
        // $this->unidad_id=auth()->user()->depe_id;
        // $this->personal=DB::table('admin')->where(['depe_id'=>$this->unidad_id,'adm_estado'=>'1'])->orderBy('adm_name','asc')->get();
        // $coddepe=DB::table('dependencia')->where('iddependencia',$this->unidad_id)->get();
        // $this->depe_id=@$coddepe[0]->depe_depende;
    }
    public function render()
    {
        $paginas=DB::connection('mysql')->table('direcciones_web')->get();
        $userportales=DB::connection('mysql')->table('userportales')->get();
        

        $dependencia=DB::table('dependencia')->select('depe_depende')->where(['depe_estado'=>'1','depe_tipo'=>'1'])->groupBy('depe_depende')->orderBy('depe_depende','DESC')->get();
        
        for($i=0;$i<count($dependencia);$i++)
        {
                $nomdepe=DB::table('dependencia')->where('iddependencia',$dependencia[$i]->depe_depende)->get();

                if($dependencia[$i]->depe_depende<>1034 and $dependencia[$i]->depe_depende<>1818 and $dependencia[$i]->depe_depende<>851 and $dependencia[$i]->depe_depende<>1894)
                {$datosdepe[]=array("iddepe"=>$dependencia[$i]->depe_depende,"nombredebe"=>$nomdepe[0]->depe_nombre);}
               
        }

        $this->unidades=DB::table('dependencia')->where(['depe_depende'=>$this->depe_id,'depe_estado'=>'1'])->orderBy('iddependencia','asc')->get();
        $this->personal=DB::table('admin')->where(['depe_id'=>$this->unidad_id,'adm_estado'=>'1'])->orderBy('adm_name','asc')->get();

        return view('livewire.gestion-portales', compact('paginas','datosdepe','userportales'));
    }

    public function unidad($idpagina,$id,$nombre)
    {
        $this->codpag=$idpagina;
        $this->depe_id=$id;
        $this->nombreweb=$nombre;
        //$this->unidades[]=DB::table('dependencia')->where(['depe_depende'=>$this->depe_id,'depe_estado'=>'1'])->orderBy('iddependencia','asc')->get();
        
    }
    public function Buscardirweb($id,$nombre)
    {
        //$data=DB::connection('mysql')->table('direcciones_web')->where('iddirecciones_web',$id)->get();
        //$nombre=$data->nom_direcciones_web;
        // return $nombre;
        $this->codpag=$id;
        $this->nombreweb=$nombre;
    }
    public function guarda_webedit()
    {
       //return $this->coddepe;
       $sql='UPDATE direcciones_web SET iddependencia='.$this->coddepe.' where iddirecciones_web='.$this->codpag;
       DB::connection('mysql')->update($sql);
       $this->emit('editadoweb');
    }
    public function personal($iduni)
    {
        $this->unidad_id=$iduni;
        //$this->personal=DB::table('admin')->where(['depe_id'=>$iduni,'adm_estado'=>'1'])->orderBy('adm_name','asc')->get();
        
        //return $iduni;
    }
    public function userasignado()
    {
        $this->validate(['iduser'=>'Required']);
        //return $this->codpag.'-'.$this->iduser;
        $fecha=date('Y-m-d H:i:s');
        $nombre=$this->nombrecompleto($this->iduser);
        DB::connection('mysql')->insert('insert into userportales (iduser, iddirecciones_web,nombreuser,created_at,updated_at) values (?, ?,?,?,?)', [$this->iduser, $this->codpag,$nombre,$fecha,$fecha]);
        $this->emit('userasignado');
    }

    public function nombrecompleto($id)
    {
        $datos=DB::table('admin')->where('id',$id)->get();
        $nombres=$datos[0]->adm_name.' '.$datos[0]->adm_lastname;
        return $nombres;
    }
}
