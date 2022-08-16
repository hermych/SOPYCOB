<?php require_once('../views/layout/header.php'); ?>
<div class="container-fluid" id="container">
  <!-- Button trigger modal -->
  <div class="card">
    <div class="card-header">
      <div class="d-sm-flex justify-content-between">
        <h2 class="mt-2">Ticket Soporte</h2>
        <button type="button" id="btnAbrirmodalRegistrarTicket" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#modalRegistrarTicket">
          Agregar
        </button>
      </div>
    </div>
    <div class="card-body">
      <table id="ticketSopTable" class="display table table-hover text-center mb-4" style="width: 100%;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ticket</th>
            <th scope="col">Fecha y Hora</th>
            <th scope="col">Empresa</th>
            <th scope="col">Proceso</th>
            <th scope="col">Responsable</th>
            <th scope="col">Estado</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody id="tbody" style="font-size: 15px;">

        </tbody>
      </table>
    </div>
    <div class="card-footer text-muted text-end">
      <?php echo "<b>" . date("d") . " de " . date("M") . " de " . date("Y"); ?>
    </div>
  </div>
</div>
<!-- ################################# MODALES MODALES MODALES MODALES MODALES ######################################### -->
<!-- AGREGAR TICKET DE SOPORTE -->
<div class="modal fade" id="modalRegistrarTicket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Ticket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-2">
          <div class="col input-group">
            <input type="text" class="form-control" placeholder="Nombre Comercial / DNI / RUC" id="rucDni" name="rucDni">
            <span class="input-group-text" id="searchContainer"><i class="fas fa-search"></i></span>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <label for="cliente">Cliente</label>
            <input type="text" class="form-control" placeholder="Nombre del Cliente" id="cliente" name="cliente" disabled>
            <input type="hidden" class="form-control" placeholder="Nombre del Cliente" id="idCliente" name="idCliente" disabled>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <label for="nameContacto">Contacto</label>
            <input type="text" class="form-control" placeholder="Nombre del contacto" id="nameContacto" name="nameContacto" disabled>
          </div>
          <div class="col">
            <label for="celContacto">Cel Contacto</label>
            <input type="text" class="form-control" placeholder="N° del contacto" id="celContacto" name="celContacto" onkeypress="return validarInputSoloNumeros(event);" disabled>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <label for="nombreSolicita">Solicitante</label>
            <input type="text" class="form-control" placeholder="Nombre del Solicitante" id="nombreSolicita" name="nombreSolicita">
          </div>
          <div class="col">
            <label for="celSolicitante">Cel Solicitante</label>
            <input type="text" class="form-control" placeholder="N° del Solicitante" id="celSolicitante" name="celSolicitante" onkeypress="return validarInputSoloNumeros(event);">
          </div>
        </div>
        <hr class="mt-0 mb-2">
        <div class="row mb-2">
          <div class="col">
            <div class="form-floating">
              <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Leave a comment here" style="height: 120px"></textarea>
              <label for="floatingTextarea2" for="mensaje">Mensaje del Cliente</label>
            </div>
          </div>
        </div>
        <hr class="mt-0 mb-2">
        <div class="row mb-2">
          <div class="col">
            <label for="proceso">Proceso</label>
            <select id="proceso" name="proceso" class="form-select" aria-label="Default select example">
              <option value="0" selected>Seleccione proceso</option>
            </select>
          </div>
          <div class="col">
            <label for="responsable">Responsable</label>
            <select id="responsable" name="responsable" class="form-select" aria-label="Default select example" disabled>
              <option value="0" selected>Seleccione responsable</option>
            </select>
          </div>
        </div>
        <div class="row mb-2" style="display: none;" id="divComentario">
          <div class="col">
            <div class="form-floating">
              <textarea class="form-control" id="comentario" name="comentario" placeholder="Leave a comment here" style="height: 100px"></textarea>
              <label for="floatingTextarea2" for="comentario">Comentario</label>
            </div>
          </div>
        </div>
        <div class="row mb-2" style="display: none;" id="divNoCompeteMotivo">
          <div class="col">
            <div class="form-floating">
              <textarea class="form-control" id="motivoNoCompete" name="motivoNoCompete" placeholder="Leave a comment here" style="height: 100px"></textarea>
              <label for="floatingTextarea2" for="motivoNoCompete">Motivo para no proceder</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnRegistrarTicket" class="btn btn-success" disabled>Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- INFORMACION DE TICKET Comprobante-->
<div class="modal fade" id="modalInfoTicket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informacion de <span class="badge bg-primary" id="nroTicket"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-2">
          <div class="col">
            <label for="msjForCliente">MENSAJE PARA EL CLIENTE</label>
            <div type="text" class="form-control" id="msjForCliente" name="msjForCliente" ></div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <label for="rucDniInfo">RUC / DNI</label>
            <input type="text" class="form-control" placeholder="RUC / DNI " id="rucDniInfo" name="rucDniInfo" disabled>
          </div>
          <div class="col">
            <label for="procesoInfo">Proceso</label>
            <input type="text" class="form-control fw-bolder" id="procesoInfo" name="procesoInfo" disabled>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <label for="clienteInfo">Cliente</label>
            <input type="text" class="form-control" placeholder="Nombre del Cliente" id="clienteInfo" name="clienteInfo" disabled>
            <input type="hidden" class="form-control" placeholder="Nombre del Cliente" id="idCliente" name="idCliente" disabled>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <label for="nombreContactoInfo">Contacto</label>
            <input type="text" class="form-control" placeholder="Nombre del contacto" id="nombreContactoInfo" name="nombreContactoInfo" disabled>
          </div>
          <div class="col">
            <label for="celContactoInfo">Cel Contacto</label>
            <input type="text" class="form-control" placeholder="N° del contacto" id="celContactoInfo" name="celContactoInfo" onkeypress="return validarInputSoloNumeros(event);" disabled>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <label for="nombreSolicitaInfo">Solicitante</label>
            <input type="text" class="form-control" placeholder="Nombre del contacto" id="nombreSolicitaInfo" name="nombreSolicitaInfo" disabled>
          </div>
          <div class="col">
            <label for="celSolicitanteInfo">Cel Solicitante</label>
            <input type="text" class="form-control" placeholder="N° del contacto" id="celSolicitanteInfo" name="celSolicitanteInfo" onkeypress="return validarInputSoloNumeros(event);" disabled>
          </div>
        </div>
        <hr class="mt-0 mb-2">
        <div class="row mb-2">
          <div class="col">
            <div class="form-floating">
              <textarea class="form-control" id="mensajeInfo" name="mensajeInfo" placeholder="Leave a comment here" style="height: 130px" disabled></textarea>
              <label for="floatingTextarea2" for="mensajeInfo">Mensaje del Cliente</label>
            </div>
          </div>
        </div>
        <div class="row mb-2" style="display: none;">
          <div class="col">
            <div class="mb-3">
              <label for="mediaInfo" class="form-label">Adjuntar Archivo (opcional)</label>
              <input class="form-control form-control-sm" id="mediaInfo" name="mediaInfo" type="file">
            </div>
          </div>
        </div>
        <hr class="mt-0 mb-2">
        <div class="row mb-2" style="display: none;" id="divComentarioInfo">
          <div class="col">
            <div class="form-floating">
              <textarea class="form-control" id="comentarioInfo" name="comentarioInfo" placeholder="Leave a comment here" style="height: 80px; font-size: 14px;" disabled></textarea>
              <label for="floatingTextarea2" for="comentarioInfo">Comentario</label>
            </div>
          </div>
        </div>
        <div class="row mb-2" style="display: none;" id="divNoCompeteMotivoInfo">
          <div class="col">
            <div class="form-floating">
              <textarea class="form-control" id="motivoNoCompeteInfo" name="motivoNoCompeteInfo" placeholder="Leave a comment here" style="height: 80px; font-size: 14px;" disabled></textarea>
              <label for="floatingTextarea2" for="motivoNoCompeteInfo">Motivo para no proceder</label>
            </div>
          </div>
        </div>
        <div class="row mb-2" style="display: none;" id="divMsjFInal">
          <div class="col">
            <div class="form-floating">
              <textarea class="form-control" id="msjFinalizado" name="msjFinalizado" placeholder="Leave a comment here" style="height: 80px; font-size: 14px;" disabled></textarea>
              <label for="floatingTextarea2" for="msjFinalizado">Mensaje Final (realizado)</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info fw-bolder" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL PARA FINALIZAR TICKET -->
<div class="modal fade" id="modalFinalizarTicket" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Finalizar Ticket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="msjFinalizado2" class="col-form-label">¿Que se realizo?:</label>
          <textarea class="form-control" id="msjFinalizado2" name="msjFinalizado2"></textarea>
          <input type="hidden" id="idTicketFin" name="idTicketFin">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="finTicket">Finalizar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL AGREGAR CLIENTE -->
<div class="modal fade" id="modalGuardarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <h4>Cliente</h4>
          </div>
          <div class="col">
            <div class="input-group mb-3">
              <input name="nroDocumento" id="nroDocumento" type="text" class="form-control" placeholder="Nro de Documento" aria-label="Nro de Documento" onkeypress="return validarInputSoloNumeros(event);">
              <button class="btn btn-primary" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="loaderDni"></span>
                <i class="fas fa-search" style="display: block;" id="searchDni"></i>
                <span class="visually-hidden">Loading...</span>
              </button>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="nombreCliente" class="form-control" placeholder="Nombre legal del cliente" aria-label="nombreCliente" name="nombreProveedor" disabled>
          </div>
        </div>
        <div class="row mb-3" id="divNombreComercial" style="display: none">
          <div class="col">
            <input type="text" id="nombreComercial" class="form-control" placeholder="Nombre comercial del cliente" aria-label="nombreComercial" name="nombreComercial">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="celuCliente" class="form-control" placeholder="Celular Cliente" aria-label="celuCliente" name="celuCliente" onkeypress="return validarInputSoloNumeros(event);">
          </div>
          <div class="col">
            <input type="text" id="emailCliente" class="form-control" placeholder="Email Cliente" aria-label="emailCliente" name="emailCliente">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="telfCliente" class="form-control" placeholder="Telefono Cliente" aria-label="telfCliente" name="telfCliente" onkeypress="return validarInputSoloNumeros(event);">
          </div>
          <div class="col">
            <select id="idDepartamento" class="form-select form-select-sm" aria-label=".form-select-sm example" name="idDepartamento">
              <option value='0'>Departamento</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <select id="idProvincia" class="form-select form-select-sm" aria-label=".form-select-sm example" name="idProvincia" disabled>
              <option value='0' selected>Provincias</option>
            </select>
          </div>
          <div class="col">
            <select id="idDistrito" class="form-select form-select-sm" aria-label=".form-select-sm example" name="idDistrito" disabled>
              <option value='0' selected>Distritos</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="direcCliente" class="form-control" placeholder="Direccion del Cliente" aria-label="direcCliente" name="direcCliente">
          </div>
        </div>
        <h4>Contacto</h4>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="nombreContactoProv" class="form-control" placeholder="Nombres y Apellidos del Contacto" aria-label="nombreContactoProv" name="nombreContactoProv">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="telfContactoProv" class="form-control" placeholder="Celular del Contacto" aria-label="telfContactoProv" name="nombreContactoProv" onkeypress="return validarInputSoloNumeros(event);">
          </div>
          <div class="col">
            <input type="text" id="emailContactoProv" class="form-control" placeholder="Email del Contacto" aria-label="emailContactoProv" name="nombreContactoProv">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnGuardarCliente" class="btn btn-success" disabled>Guardar</button>
      </div>
    </div>
  </div>
</div>
<?php require_once('../views/layout/footer.php'); ?>