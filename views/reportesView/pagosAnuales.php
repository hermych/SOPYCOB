<?php
require_once('../views/layout/header.php');
require_once('../helpers/utils.php');
$mesAct = date('F');
$mesEsp = Utils::mesEspañol($mesAct)
?>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header mt-2">
        <h3>Pagos Anuales</h3>
      </div>
      <div class="card-body row">
          <div class="col-auto d-flex">
              <div class="col-auto me-2">
                  <label for="anio" class="col-form-label fw-bolder">AÑO</label>
              </div>
              <div class="col-auto">
                  <input type="text" id="anio" class="form-control" name="anio" placeholder="Ingrese año">
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
          <div class="col-auto ps-0">
              <button id="btnRepExcel" class="btn btn-success"><i class="me-2 fas fa-file-csv"></i><i class="fas fa-download"></i></button>
          </div>
        <div class="col-12 text-center mt-5 ">
          <table id="pagosAnualesTable" class="display table table-hover text-center mb-4 table-responsive" style="width: 100%;">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Cliente</th>
              <th scope="col">Contacto</th>
              <th scope="col">Sistemas</th>
              <th scope="col">Mensualidad</th>
              <th scope="col">Fecha Inicio</th>
              <th scope="col">Fecha Culminacion</th>
              <th scope="col">Periodo</th>
              <th scope="col">Meses Restantes</th>
              <th scope="col">Estado</th>
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