<?php
require_once('../views/layout/header.php');
require_once('../helpers/utils.php');
$mesAct = date('F');
$mesEsp = Utils::mesEspañol($mesAct)
?>
<div class="container-fluid">
  <div class="card">
    <div class="card-header mt-2"> <!-- de <b><?= $mesEsp ?></b> -->
      <h3>Pagos Realizados</h3>
    </div>

    <!-- ##### PARAMETROS DE FECHAS PARA BUSCAR ###### -->
    <div class="row m-2">
      <div class="col-auto d-flex">
        <div class="col-auto me-2">
          <label for="desde" class="col-form-label">DESDE</label>
        </div>
        <div class="col-auto">
          <input type="date" id="desde" class="form-control" value="desde">
        </div>
      </div>
      <div class="col-auto d-flex">
        <div class="col-auto me-2">
          <label for="hasta" class="col-form-label">HASTA</label>
        </div>
        <div class="col-auto">
          <input type="date" id="hasta" class="form-control" value="desde">
        </div>
      </div>
      <div class="col-auto d-flex">
        <div class="col-auto">
          <input type="text" id="cliente" class="form-control" placeholder="Nombre del cliente">
        </div>
      </div>
      <div class="col-auto">
        <button id="btnBuscar" class="btn btn-primary">BUSCAR</button>
      </div>
    </div>
    <div class="card-body text-center">
      <table id="pensionesDataTable" class="display table table-hover text-center mb-4 table-responsive"
             style="width: 100%;">
        <thead>
        <tr>
          <th scope="col">Indice</th>
          <th scope="col">Cliente</th>
          <th scope="col">Sistema</th>
          <th scope="col">Mensualidad</th>
          <th scope="col">Mora</th>
          <th scope="col">Reconexion</th>
          <th scope="col">Mes</th>
          <th scope="col">Comprobante</th>
          <th scope="col">Fecha Pago</th>
          <th scope="col">Sunat</th>
          <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody id="tbody" style="font-size: 13px;">

        </tbody>
      </table>
    </div>
    <div class="card-footer text-muted text-end">
      <!-- <?php echo "<b>" . date("d") . " de " . date("M") . " de " . date("Y"); ?> -->
        <p class="text-danger"><b>TOTAL: S/ <span id="pagoTotal"></span></b></p>
    </div>
  </div>
</div>
<?php require_once('../views/layout/footer.php'); ?>
