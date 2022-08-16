<?php
require_once('../views/layout/header.php');
?>
<div class="container-fluid" id="container">
  <div class="card">
    <div class="card-header">
      <div class="d-sm-flex justify-content-between">
        <h3 class="mt-2">Solicitud de Información</h3>
        <button type="button" id="btnAbrirmodalGuardarSolicInfo" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#modalGuardarSoliInformacion">
          Agregar
        </button>
      </div>
    </div>
    <div class="card-body">
      <table id="solicInfoDataTable" class="display table table-hover text-center mb-4" style="width: 100%;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">Red Social</th>
            <th scope="col">Celular</th>
            <th scope="col">Rubro</th>
            <th scope="col">Desea Información</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody id="tbody" style="font-size: 15px;">

        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer text-muted text-end">
    <?php echo "<b>" . date("d") . " de " . date("M") . " de " . date("Y"); ?>
  </div>
</div>
</div>

<!-- ################################# MODALES MODALES MODALES MODALES MODALES ######################################### -->
<!-- Agregar Solicitud de Información-->
<div class="modal fade" id="modalGuardarSoliInformacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Solicitud de Información</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-7 mb-3">
            <label for="nombres" class="form-label" style="font-weight: bold;">Nombres y Apellidos</label>
            <input type="text" class="form-control border border-danger" id="nombres" name="nombres" placeholder="Luis">
          </div>
          <div class="col-5 mb-3">
            <label for="rubro" class="form-label" style="font-weight: bold;">Rubro</label>
            <input type="text" class="form-control border border-warning" id="rubro" name="rubro" placeholder="Ferretería">
          </div>
          <div class="col-6 input-group mb-3">
            <span class="input-group-text primary" style="background-color: #fff;" id="iconoRedSocial"><i style="color: #1194f5;" class="fab fa-facebook-f"></i></span>
            <input type="text" class="form-control border border-warning" placeholder="Link de Facebook" id="face" name="face">
          </div>
          <div class="col-6 mb-3">
            <label for="tipoInformacion" class="form-label" style="font-weight: bold;">¿Que solicita?</label>
            <select class="form-select border border-danger" aria-label="Default select example" id="tipoInformacion" name="tipoInformacion">
              <option value="0" selected>Seleccione informacion</option>
              <option value="noEspecifica">No especifica</option>
              <option value="sist">Sistemas</i></option>
              <option value="equi">Equipos</option>
              <option value="gen">General</option>
            </select>
          </div>
          <div class="col-6 mb-3">
            <label for="canal" class="form-label" style="font-weight: bold;">Canal</label>
            <select class="form-select border border-danger" aria-label="Default select example" id="canal" name="canal">
              <option value="0" selected>Seleccione canal</option>
              <option value="facebook">Facebook</i></option>
              <option value="instagram">Instagram</option>
              <option value="whatsapp">Whatsapp</option>
              <option value="tiktok">Tik Tok</option>
              <option value="youtube">YouTube</option>
            </select>
          </div>
          <div class="col-6 mb-3">
            <label for="celular" class="form-label" style="font-weight: bold;">Celular</label>
            <input type="text" class="form-control border border-danger" id="celular" name="celular" onkeypress="return validarInputSoloNumeros(event);" placeholder="925 125 987">
          </div>
          <div class="col-6 mb-3">
            <label for="pauta" class="form-label" style="font-weight: bold;">Pauta</label>
            <select class="form-select border border-warning" id="pauta" name="pauta">
              <option value="0" selected>Seleccione Pauta</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCerrarModalGuardarSolicInfo" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnGuardarSoliInfo" class="btn btn-success" disabled>Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal de llamar al posible cliente (solicitud de informacion) -->
<div class="modal fade" id="modalLLamarCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Llamada Realizada al cliente</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-7 mb-3">
            <label for="nombresLlamar" class="form-label" style="font-weight: bold;">Nombres y Apellidos</label>
            <input type="text" class="form-control border border-success" id="nombresLlamar" name="nombresLlamar" disabled>
            <input type="hidden" class="form-control" id="idSolic" name="idSolic" disabled>
          </div>
          <div class="col-5 mb-3">
            <label for="rubroLlamar" class="form-label" style="font-weight: bold;">Rubro</label>
            <input type="text" class="form-control  border border-danger" id="rubroLlamar" name="rubroLlamar" disabled>
          </div>
          <div class="col-6 mb-3">
            <label for="celularLlamar" class="form-label" style="font-weight: bold;">Celular</label>
            <input type="text" class="form-control border border-success" id="celularLlamar" name="celularLlamar" onkeypress="return validarInputSoloNumeros(event);" disabled>
          </div>
          <div class="col-6 mb-3">
            <label for="tipoInformacionLlamar" class="form-label" style="font-weight: bold;">¿Que solicita?</label>
            <select class="form-select border border-danger" aria-label="Default select example" id="tipoInformacionLlamar" name="tipoInformacionLlamar">
              <option value="noEspecifica" selected>Seleccione informacion</option>
              <option value="sist">Sistemas</i></option>
              <option value="equi">Equipos</option>
              <option value="gen">General</option>
            </select>
          </div>
          <div class="col-6 mb-3">
            <label for="medioEnvioInfoLlamar" class="form-label" style="font-weight: bold;">Envio de Informacion</label>
            <select class="form-select border border-danger" aria-label="Default select example" id="medioEnvioInfoLlamar" name="medioEnvioInfoLlamar">
              <option value="0" selected>-- seleccionar --</option>
              <option value="wsp">Whatsapp</i></option>
              <option value="email">Correo</option>
            </select>
          </div>
          <div class="col-6 mb-3" id="divCorreo">
            <label for="correoEnvio" class="form-label" style="font-weight: bold;">Correo</label>
            <input type="text" class="form-control border border-warning" id="correoEnvio" name="correoEnvio" disabled>
          </div>
          <div class="col-6 mb-3" id="divTipoDemo">
            <label for="tipoDemo" class="form-label" style="font-weight: bold;">Tipo de Demo</label>
            <select class="form-select border border-warning" aria-label="Default select example" id="tipoDemo" name="tipoDemo">
              <option value="0" selected>Seleccione tipo Demo</option>
              <option value="remoto">Remoto</i></option>
              <option value="presencial">Presencial</option>
            </select>
          </div>
          <div class="col-6 mb-3">
            <label for="fechaDemoLlamar" class="form-label" style="font-weight: bold;">Fecha para Demo</label>
            <input type="datetime-local" class="form-control border border-warning" id="fechaDemoLlamar" name="fechaDemoLlamar" disabled>
          </div>
          <div class="col-12 mb-3">
            <label for="pautaLlamar" class="form-label" style="font-weight: bold;">Pauta</label>
            <select class="form-select border border-warning" id="pautaLlamar" name="pautaLlamar">
              <option value="0" selected>Seleccione Pauta</option>
            </select>
          </div>
          <div class="col-12 mb-3">
            <label for="mensajePauta" class="form-label" style="font-weight: bold;">Mensaje de la Pauta</label>
            <textarea class="form-control border border-danger" style="height: 100px" id="mensajePauta" name="mensajePauta"></textarea>
          </div>
          <div class="col-12 mb-3">
            <label for="observacionEnvioInfo" class="form-label" style="font-weight: bold;">Observacion o Motivo de Rechazo</label>
            <textarea class="form-control border border-danger" style="height: 100px" id="observacionEnvioInfo" name="observacionEnvioInfo"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCerrarModalLlamarCliente" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnRechazarSolic" class="btn btn-warning" disabled>Rechazar</button>
        <button type="button" id="btnEditarSoliInfoLlamada" class="btn btn-success" disabled>Guardar</button>
      </div>
    </div>
  </div>
</div>

<?php require_once('../views/layout/footer.php'); ?>