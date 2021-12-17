<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="row">
        <div class="col-sm-6">
            Esta plataforma tambien le permite generar expedientes tal como lo realiza el sistema de SGD
        </div>  
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card mt-2">
                
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-xs-2 col-sm-2 col-md-2">Expediente</label>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <input type="text" class="form-control form-control-sm" placeholder="N°">
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            <span></span>
                            <strong></strong>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Tipo de registro</label>
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="1">Por tramite(Mesa de Partes Virtual)</option>
                            <option value="2">Por llamada anónima(Secretaria Tecnica)</option>
                            <option value="3">Por escrito anónima(Secretaria Tecnica)</option>
                        </select>
                    </div>
                    <h5>Datos del inputado</h5>
                    <div class="dropdown-divider"></div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2">DNI:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-sm float-left" placeholder="Ingresar DNI">
                           
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-primary btn-xs float-left">Buscar Reniec</button>&nbsp;<button class="btn btn-danger btn-xs">Sancion(SERVIR)</button>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="">Nombres y apellidos</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nombres y apellidos">
                    </div>
                    <div class="form-group">
                        <label for="">Documento adjuntar</label>
                        <input type="file" class="form-control form-control-sm" placeholder="Nombres y apellidos">
                    </div>
                    <div class="form-group">
                        <label for="">Detalles de la denuncia</label>
                        <textarea name="" id="" cols="30" rows="6" placeholder="Digite la denuncia" class="form-control form-control-sm"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                    <button type="button" class="btn btn-primary">Registrar denuncias</button>
                  </div>
            </div>
        </div>
    </div>
</div>
