<div>
    {{-- The whole world belongs to you. --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Registro de reuniones
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Titulo de la reunión</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Ingrese el titulo de la reunion" autofocus wire:model="titreunion">
                            @error('titreunion')
                            <span class="text-danger">El campo es obligatorio</span>
                        @enderror
                        </div>
                       
                        
                      </div>
                      <div class="col-md-6 pt-4">
                        <button class="btn btn-primary btn-xs" wire:click="registrareunion">Guardar reunión</button>
                      </div>
                  </div>
                  {{-- <hr> --}}
                  <div class="row">
                      <table class="table table-border table-hover">
                          <thead>
                              <tr>
                                  <th>N</th>
                                  <th>Título de la reunión</th>
                                  <th>Link</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              @forelse ($datos as $item)
                              <tr>
                                <td>{{ $item->idreuniones }}</td>
                                <td>{{ $item->tit_reunion }}</td>
                                <td><a href="/incripciones/{{ Str::slug($item->tit_reunion) }}">{{ env('APP_URL') }}/incripciones/{{ Str::slug($item->tit_reunion) }}</a></td>
                                <td>
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    <a href="/Lista/{{ Str::slug($item->tit_reunion) }}" class="btn btn-info btn-xs">Lista inscritos</a>
                                </td>
                              </tr> 
                              @empty
                                  No existe datos para mostrar
                              @endforelse
                          </tbody>
                      </table>
                      {{-- {{ print_r($datos) }} --}}
                  </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
