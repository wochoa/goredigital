<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Message;
use App\User;


class Chat extends Component
{
    public $depe_id;
    public $unidad_id;
    public $unidades;
    public $personal;
    public $iduserchat;
    public $userenviador;
    public $nombrepersonachat;
    public $nombrepersonaavatar;
    public $msgbdchat;
    public $mensage;

    protected $listeners=['mostrarchat'];

    public function mount()
    {
        $this->unidad_id=auth()->user()->depe_id;
        $this->personal=DB::table('admin')->where(['depe_id'=>$this->unidad_id,'adm_estado'=>'1'])->orderBy('adm_name','asc')->get();
        $coddepe=DB::table('dependencia')->where('iddependencia',$this->unidad_id)->get();
        $this->depe_id=@$coddepe[0]->depe_depende;
        $this->iduserchat=0;
        $this->userenviador=auth()->user()->id;
        $this->mensage='';
        $this->msgbdchat='';
        //return $this->depe_id;
    }
    public function render()
    {
       
        $dependencia=DB::table('dependencia')->select('depe_depende')->where(['depe_estado'=>'1','depe_tipo'=>'1'])->groupBy('depe_depende')->orderBy('depe_depende','DESC')->get();
        
        for($i=0;$i<count($dependencia);$i++)
        {
                $nomdepe=DB::table('dependencia')->where('iddependencia',$dependencia[$i]->depe_depende)->get();

                if($dependencia[$i]->depe_depende<>1034 and $dependencia[$i]->depe_depende<>1818 and $dependencia[$i]->depe_depende<>851 and $dependencia[$i]->depe_depende<>1894)
                {$datosdepe[]=array("iddepe"=>$dependencia[$i]->depe_depende,"nombredebe"=>$nomdepe[0]->depe_nombre);}
               
        }

        $this->unidades=DB::table('dependencia')->where(['depe_depende'=>$this->depe_id,'depe_estado'=>'1'])->orderBy('iddependencia','asc')->get();
        $this->personal=DB::table('admin')->where(['depe_id'=>$this->unidad_id,'adm_estado'=>'1'])->orderBy('adm_name','asc')->get();



        return view('livewire.chat',compact('datosdepe'));
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
        $this->personal=DB::table('admin')->where(['depe_id'=>$iduni,'adm_estado'=>'1'])->orderBy('adm_name','asc')->get();
        
        //return $iduni;
    }
    public function abrechat($id)
    {   $this->mensage='';

        $this->personal($this->unidad_id);

        $this->iduserchat=$id;
        $idenviador=$this->userenviador;
        
        $datos=DB::table('admin')->where('id',$id)->get();
        $this->nombrepersonachat=$datos[0]->adm_name.' '.$datos[0]->adm_lastname;
        $this->nombrepersonaavatar=$datos[0]->avatar;



        $msgchatenviador=Message::where(['id_enviador'=>$idenviador,'id_receptor'=>$this->iduserchat]);
        $msgchatreceptor=Message::where(['id_enviador'=>$this->iduserchat,'id_receptor'=>$idenviador])->union($msgchatenviador)->orderBy('id','asc')->get();
        
        $this->msgbdchat=$msgchatreceptor;
        //return $this->msgbdchat;
    }   
    public function enviarMensaje()
    {
        $this->validate([
            "mensage"=>"required"
        ]);

        $idenviador=$this->userenviador;// id del suario que envia el mensage
        $idreceptor=$this->iduserchat;// id del chat que recibe el mensage
        $mensage=$this->mensage;// mensage del chat

        Message::create(['id_enviador'=>$idenviador,'id_receptor'=>$idreceptor,'body'=>$mensage]);
        $this->emit('mensageenviado');

        //$this->abrechat($this->iduserchat);

        


        return event(new \App\Events\EnviarMensaje($idreceptor,$idenviador,$mensage));

    }

    public function mostrarchat($iuser)
    {
        //$iuser['enviador']
        $receptor=$iuser['receptor'];
        $enviador=$iuser['enviador'];

      
        $msgchatenviador=Message::where(['id_enviador'=>$enviador,'id_receptor'=>$receptor]);
        $msgchatreceptor=Message::where(['id_enviador'=>$receptor,'id_receptor'=>$enviador])->union($msgchatenviador)->orderBy('id','asc')->get();
        
        $this->msgbdchat=$msgchatreceptor;

    }
    
   
}
