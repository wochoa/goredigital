<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Ticket;
class Dashticket extends Component
{
    public $totalticket;

    public function mount()
    {
        $this->totalticket=Ticket::count();
    }
    public function render()
    {
        
        return view('livewire.dashticket');
    }
    public function tickettotal()
    {
        $this->totalticket=Ticket::count();
    }
}
