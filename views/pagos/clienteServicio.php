<?php
require_once('../views/layout/header.php');
require_once('../helpers/utils.php');
$mesAct = date('F');
$mesEsp = Utils::mesEspañol($mesAct)
?>
<div class="container-fluid">
  <div class="card">
    <div class="card-header mt-2">
      <h3>Servicios por Cliente</h3>
    </div>
    <div class="card-body text-center">
      <table id="servicioClienteTable" class="display table table-hover text-center mb-4 table-responsive"
             style="width: 100%;">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Empresa</th>
          <th scope="col">Contacto</th>
          <th scope="col">Celular</th>
          <th scope="col">Servicio</th>
          <th scope="col">Fecha Inicio</th>
          <th scope="col">Meses</th>
          <th scope="col">Estado</th>
          <th scope="col">Suspencion</th>
          <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody id="tbody" style="font-size: 14px;">

        </tbody>
      </table>
    </div>
    <div class="card-footer text-muted text-end">
      <?php echo "<b>" . date("d") . " de " . date("M") . " de " . date("Y"); ?>
    </div>
  </div>
</div>
<?php require_once('../views/layout/footer.php'); ?>

<!-- Modal de SUSPENDER -->
<div class="modal fade" id="modalAnularContrato" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suspender Servicio - cliente: <span id="cliente">ALEJANDRO</span> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Motivo de Anulacion o Exoneracion" id="motivoSuspencion"></textarea>
                    <label for="motivoAnulacionPension">Motivo de suspencion de servicio</label>
                    <input type="hidden" name="idClienteServicio" id="idClienteServicio">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnSuspender" disabled>Confirmar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal de ELIMINAR - DAR DE BAJA -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dar de baja - cliente: <span id="clienteDelete">ALEJANDRO</span> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Motivo de Anulacion o Exoneracion"
                              id="motivoEliminar"></textarea>
                    <label for="motivoEliminar">Motivo de suspencion de servicio</label>
                    <input type="hidden" name="idClienteServicioDelete" id="idClienteServicioDelete">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnEliminar" disabled>Confirmar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal de MOSTRAR LISTA DE PENSIONES POR CLIENTE -->
<div class="modal fade" id="modalListaPensiones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Historial de Pensiones del cliente: <span id="clientePensiones"></span> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                    <table id="listaPensiones" class="display table table-hover text-center mb-4 table-responsive"
                           style="width: 100%;">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Servicio</th>
                            <th scope="col">Fecha Pago</th>
                            <th scope="col">Fecha Pago Realizado</th>
                            <th scope="col">Estado</th>
                        </tr>
                        </thead>
                        <tbody id="tbody" style="font-size: 14px;">

                        </tbody>
                    </table>
                </div>
            </div>
            <!--
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnEliminar" disabled>Confirmar</button>
            </div>
            -->
        </div>
    </div>
</div>
<!-- Modal para editar contrato -->
<div class="modal fade" id="modalEditarContrato" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Contrato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label for="clienteEdit">Cliente</label>
                        <input type="text" id="clienteEdit" class="form-control" name="clienteEdit" disabled>
                        <input type="hidden" id="idContratoEdit" class="form-control" name="idContratoEdit" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 mb-2">
                        <label for="servicioEdit">Servicio</label>
                        <select id="servicioEdit" class="form-select form-select-sm" aria-label=".form-select-sm example" name="servicioEdit">
                            <option value='0' selected>Seleccione Servicio</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="fechaInicioEdit">Fecha de Inicio</label>
                        <input type="date" id="fechaInicioEdit" class="form-control" name="fechaInicioEdit">
                    </div>
                    <div class="col-6">
                        <label for="tiempoContratoEdit">Tiempo de Contrato</label>
                        <input type="text" id="tiempoContratoEdit" class="form-control" name="tiempoContratoEdit">
                        <input type="hidden" id="servicio_edit" name="servicio_edit">
                        <input type="hidden" id="id_servicio_edit" name="id_servicio_edit">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar     </button>
                <button type="button" id="btnEditarContrato" class="btn btn-success">Editar</button>
            </div>
        </div>
    </div>
</div>


