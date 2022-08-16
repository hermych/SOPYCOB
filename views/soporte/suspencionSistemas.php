<?php
require_once('../views/layout/header.php');
require_once('../helpers/utils.php');
$mesAct = date('F');
$mesEsp = Utils::mesEspañol($mesAct)
?>
<div class="container-fluid">
  <div class="card">
    <div class="card-header mt-2">
      <h3>Suspenciones de Sistemas</h3>
    </div>
    <div class="card-body text-center">
      <table id="suspencionesTable" class="display table table-hover text-center mb-4 table-responsive">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Cliente</th>
          <th scope="col">Servicio</th>
          <th scope="col">Motivo</th>
          <th scope="col">Estado</th>
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
<div class="modal fade" id="modalSuspender" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



