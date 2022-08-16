<?php
require_once('../views/layout/header.php');
require_once('../helpers/utils.php');
$mes_anterior = date('F', strtotime('-1 month'));
?>

<div class="container-fluid" id="container">
  <!-- Button trigger modal -->
  <div class="card">
    <div class="card-header">
      <h2 class="mt-2">Dashboard Cobranza</h2>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-white h-100">
            <div class="card-header fw-bold" id="titleMod">PENSIONES COBRADAS</div>
            <div class="card-body d-flex align-items-center justify-content-center">
              <!-- <div class="col ">INSTALACIONES</div> -->
              <div class="col fw-bold fs-1 text-center" id="cantMod"></div>
            </div>
            <!-- <div class="card-footer d-flex justify-content-end">
              <button type="button" class="btn btn-primary btn-sm">Ver más</button>
            </div> -->
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-warning text-dark h-100">
            <div class="card-header fw-bold" id="titleInst">PAGOS FUERA DE FECHA</div>
            <div class="card-body d-flex align-items-center justify-content-center">
              <!-- <div class="col ">INSTALACIONES</div> -->
              <div class="col fw-bold fs-1 text-center" id="cantInst"></div>
            </div>
            <!-- <div class="card-footer d-flex justify-content-end">
              <button type="button" class="btn btn-warning btn-sm">Ver más</button>
            </div> -->
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-success text-white h-100">
            <div class="card-header fw-bold" id="titleImpl">INGRESOS TOTALES</div>
            <div class="card-body d-flex align-items-center justify-content-center">
              <div class="col fs-1"><i class="fas fa-dollar-sign"></i></div>
              <div class="col fw-bold fs-1 text-center" id="cantImpl"></div>
            </div>
            <!-- <div class="card-footer d-flex justify-content-end">
              <button type="button" class="btn btn-success btn-sm">Ver más</button>
            </div> -->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              Ingresos cobradas <b><?php echo (strtoupper(Utils::mesEspañol($mes_anterior))) ?></b>
            </div>
            <div class="card-body">
              <canvas id="chartMesAnterior" class="chart" width="400" height="120"></canvas>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              Ticket atendidos el mes <b><?php echo (strtoupper(Utils::mesEspañol(date('F')))) ?></b>
            </div>
            <div class="card-body">
              <canvas id="chartMesActual" class="chart" width="400" height="200"></canvas>
            </div>
          </div>
        </div> -->
      </div>
      <div style="display: none;">
        <input type="text" id="cantMod_antes">
        <input type="text" id="cantInst_antes">
        <input type="text" id="cantImpl_antes">
        <input type="text" id="cantAct_antes">
      </div>
    </div>
    <div class="card-footer text-muted text-end">
      <?php echo "<b>" . date("d") . " de " . Utils::mesEspañol(date("F")) . " de " . date("Y"); ?>
    </div>
  </div>
</div>
<?php require_once('../views/layout/footer.php'); ?>