<?php
require_once('../views/layout/header.php');
require_once('../helpers/utils.php');
$mesAct = date('F');
$mesEsp = Utils::mesEspañol($mesAct)
?>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header mt-2">
        <h3>Pensiones Cobradas</h3>
      </div>
      <div class="card-body row">
        <!-- ##### PARAMETROS DE FECHAS PARA BUSCAR ###### -->
        <!--
        <div class="col-3 d-flex">
          <div class="col-auto me-2">
            <label for="desde" class="col-form-label">DESDE</label>
          </div>
          <div class="col-auto">
            <input type="date" id="desde" class="form-control" value="desde">
          </div>
        </div>
        <div class="col-3 d-flex">
          <div class="col-auto me-2">
            <label for="hasta" class="col-form-label">HASTA</label>
          </div>
          <div class="col-auto">
            <input type="date" id="hasta" class="form-control" value="desde">
          </div>
        </div>
        <div class="col-3">
          <button id="btnBuscar" class=" btn btn-primary">BUSCAR</button>
        </div>
        -->
        <div class="col-12 text-center mt-5 ">
          <table id="bajaServicioTable" class="display table table-hover text-center mb-4 table-responsive" style="width: 100%;">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Usuario</th>
              <th scope="col">Comprobante</th>
              <th scope="col">Estado</th>
              <th scope="col">Subtotal</th>
              <th scope="col">IGV</th>
              <th scope="col">Total</th>
            </tr>
            </thead>
            <tbody id="tbody" style="font-size: 14px;">
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer text-muted text-end">
        <?php echo "<b>" . date("d") . " de " . date("M") . " de " . date("Y"); ?>
        <!--
        <p class="text-danger"><b>Sub Total: S/ <span id="subTotal"></span></b></p>
        <p class="text-danger"><b>Mora: S/ <span id="mora"></span></b></p>
        <p class="text-danger"><b>Reconexion: S/ <span id="reconexion"></span></b></p>
        <p class="text-danger"><b>TOTAL: S/ <span id="pagoTotal"></span></b></p>
        -->
      </div>
    </div>
  </div>
<?php require_once('../views/layout/footer.php'); ?>