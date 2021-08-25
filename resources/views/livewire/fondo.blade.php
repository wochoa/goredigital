<div>
    {{-- Stop trying to control. --}}
    
        <a wire:click="cambiofondo({{ Auth::user()->id }},'{{ Request::url() }}')" class="nav-link"  role="button" >
          @if(Auth::user()->darkmode)
          <i class="fas fa-adjust"></i> 
          @else
          <i class="far fa-moon"></i>
          @endif
        </a>

</div>
