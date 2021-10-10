<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Ticket;
use Illuminate\Support\Facades\Auth;



// use Livewire\WithPagination;
// use App\Post;

class PagContenido extends Component
{
    use WithPagination;
  

    public $tipoayuda,$detalle,$prioridad;
    public $ticketcreados;// array de ticket creados
    public $idticket;// capturamos id ticket para psara a modal
    ///////////////////////////////////////////////////////////////////////
    public $pedidodetalle;// pedido mensage para pasar a modal
    public $prioridadpedido;// para ver pedido
    ///////////////////////////////////////////////////////////////////////
    public $ticketenproceso;
    public $ticketatendido;
    public $ticketpendiente;
    ////////////////////////////////////////////////////////////////////////
    public $iddependencia;
    public $usersoporte;
    ///////////////////////////////////////////////////////////////////////

    public $problemas;
    public $textsolucion;
    public $ayudasede;

    protected $listeners=['mostrarTickets'];
    
    public function mount()
    {
        $this->pedidodetalle='';
        $this->ticketcreados='';
        $this->ticketenproceso='';
        $this->ticketpendiente='';
        $this->ticketatendido='';
        $this->ayudasede=0;


    }

    public function render()
    {
        $idofi=Auth::user()->depe_id;
        $codigodepe=DB::table('dependencia')->where('iddependencia',$idofi)->value('depe_depende');
        $this->iddependencia=$codigodepe;//$codigodepe[0]->depe_depende;

        // para ver usuarios de soporte
        $this->usersoporte=DB::table('vistausersoporte')->where(['depe_depende'=>$this->iddependencia,'rolasignado'=>'Soporte'])->get();

        // PARA MOSTRAR LOS TICKET QUE SON<> DE FINALIZADO por que los finalizados ya no aparecen en la lista
        if($this->iddependencia==3)
        {
            $this->ticketcreados=DB::table('vistaticket')->join('dependencia','vistaticket.idoficina','=','dependencia.iddependencia')->where('codejecutora',$this->iddependencia)->orWhere('ayudasede',$this->iddependencia)->get();
        }
        else{
            $this->ticketcreados=DB::table('vistaticket')->join('dependencia','vistaticket.idoficina','=','dependencia.iddependencia')->where('codejecutora',$this->iddependencia)->get();
        }
        

        $this->numticket();
        
        // categoria de atenciones sirve para crear ticket creados para cada unidad ejecutora
        $this->problemas=DB::table('cat_atencions')->where('idejecutora',$this->iddependencia)->orderBy('idatencion','ASC')->get();


        return view('livewire.pag-contenido');
    }
    // para agregar nuevo ticket
    public function nuevoticket($iduser,$depeid)
    {
        
        $this->validate(['tipoayuda'=>'required','detalle'=>'required','prioridad'=>'required']);
        $fecha=date('Y-m-d H:i:s');
        // creados nuevos tickets
        DB::insert('insert into tickets (iduser, idoficina,codejecutora,ayudasede,tipoayuda,detalleayuda,prioridad,estado_atencion,created_at) values (?, ?,?,?,?,?,?,?,?)', [$iduser,$depeid,$this->iddependencia,$this->ayudasede,$this->tipoayuda,$this->detalle,$this->prioridad,'ENVIADO',$fecha]);

        $this->emit('saveticket');

        return event(new \App\Events\RegistrarTicket($iduser));
        // return $this->ayudasede;

    }
    // para mostrar los ticket
    public function mostrarTickets($data)
    {
        $this->ticketcreados=DB::table('vistaticket')->join('dependencia','vistaticket.depe_id','=','dependencia.iddependencia')->where('codejecutora',$this->iddependencia)->orderBy('idticket','DESC')->get();

        $this->numticket();

    }
    // para capturar los valores del ticket en cuestion
    public function validticket($id)
    {
        $this->idticket=$id;
        $datos=Ticket::where('idticket','=',$id)->get();
        //$datos=DB::table('tickets')->where('idticket',$this->idticket)->get();

        $this->pedidodetalle=$datos[0]->detalleayuda;
        $this->prioridadpedido=$datos[0]->prioridad;
    }
    // para recepcionar los ticket
    public function recepcionarticket($iduseraten,$idtcket)
    {
        $ticket = Ticket::find($idtcket);

        $ticket->estado_atencion = 'RECEPCIONADO';
        $ticket->idsoporte = $iduseraten;
        $ticket->fecha_recepcion = date('Y-m-d H:i:s');
        $ticket->save();

        //$this->numticket();

        $this->emit('ticketrecepcion');

        return event(new \App\Events\RecepcionTicket($iduseraten,$idtcket));
    }
    // para atender los ticket
    public function atenderticket($iduseraten,$idtcket)
    {
        $ticket = Ticket::find($idtcket);
        $ticket->estado_atencion = 'FINALIZADO';
        $ticket->solucion = $this->textsolucion;
        $ticket->fecha_resuelto = date('Y-m-d');
        $ticket->hora_resuelto = date('H:i:s');

        //$this->numticket();

        $ticket->save();

        $this->emit('ticketatendido');

        return event(new \App\Events\TicketAtendido($idtcket));
    }
    public function numticket()
    {
        $this->ticketenproceso=DB::table('tickets')->where('estado_atencion','RECEPCIONADO')->where('codejecutora',$this->iddependencia)->count();
        $this->ticketpendiente=DB::table('tickets')->where('estado_atencion','ENVIADO')->where('codejecutora',$this->iddependencia)->count();
        $this->ticketatendido=DB::table('tickets')->where('estado_atencion','FINALIZADO')->where('codejecutora',$this->iddependencia)->count();
    }
}
