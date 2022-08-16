<?php
require_once('../views/layout/header.php');
require_once('../helpers/utils.php');
$mesAct = date('F');
$mesEsp = Utils::mesEspañol($mesAct)
?>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header mt-2">
        <h3>Pagos Pendientes</h3>
      </div>
      <div class="card-body row">
          <div class="col-auto d-flex">
              <div class="col-auto me-2">
                  <label for="desde" class="col-form-label fw-bolder">DESDE</label>
              </div>
              <div class="col-auto">
                  <input type="date" id="desde" class="form-control" value="desde">
              </div>
          </div>
          <div class="col-auto d-flex">
              <div class="col-auto me-2">
                  <label for="hasta" class="col-form-label fw-bolder">HASTA</label>
              </div>
              <div class="col-auto">
                  <input type="text" id="hasta" class="form-control fw-bolder text-danger" value="<?=date('Y-m-31')?>" disabled>
              </div>
          </div>
          <div class="col-auto d-flex">
              <div class="col-auto">
                  <input type="text" id="cliente" class="form-control" placeholder="Nombre del cliente">
              </div>
          </div><div class="col-auto d-flex">
              <div class="col-auto me-2">
                  <label for="estado" class="col-form-label fw-bolder">ESTADO</label>
              </div>
              <div class="col-auto">
                  <select class="form-select" aria-label="Default select example" id="estado" name="estado">
                      <option value="0">TODOS</option>
                      <option value="vigente">VIGENTE</option>
                      <option value="vencido">VENCIDOS</option>
                  </select>
              </div>
          </div>
          <div class="col-auto">
              <button id="btnBuscar" class="btn btn-primary">BUSCAR</button>
          </div>
          <div class="col-auto ps-0">
              <button id="btnRepExcel" class="btn btn-success"><i class="me-2 fas fa-file-csv"></i><i class="fas fa-download"></i></button>
          </div>
        <div class="col-12 text-center mt-5 ">
            <table id="pensionesVencidasTable" class="display table table-hover text-center mb-4 table-responsive" style="width: 100%;">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Sistema</th>
                    <th scope="col">Fecha Emision</th>
                    <th scope="col">Fecha Vencimiento</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Mensualidad</th>
                </tr>
                </thead>
                <tbody id="tbody" style="font-size: 14px;">
                </tbody>
            </table>
        </div>
      </div>
      <div class="card-footer text-muted text-end">
          <p class="text-danger"><b>TOTAL: S/ <span id="pagoTotal"></span></b></p>
        <!--
        <?php echo "<b>" . date("d") . " de " . date("M") . " de " . date("Y"); ?>
        <p class="text-danger"><b>Sub Total: S/ <span id="subTotal"></span></b></p>
        <p class="text-danger"><b>Mora: S/ <span id="mora"></span></b></p>
        <p class="text-danger"><b>Reconexion: S/ <span id="reconexion"></span></b></p>
        <p class="text-danger"><b>TOTAL: S/ <span id="pagoTotal"></span></b></p>
        -->
      </div>
    </div>
  </div>
<?php require_once('../views/layout/footer.php'); ?>