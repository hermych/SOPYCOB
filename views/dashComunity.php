<?php
require_once('../views/layout/header.php');
require_once('../helpers/utils.php');
$mes_anterior = date('F', strtotime('-1 month'));
?>

<div class="container-fluid" id="container">
  <!-- Button trigger modal -->
  <div class="card">
    <div class="card-header">
      <h2 class="mt-2">Dashboard Comunity Manager</h2>
    </div>
    <div class="card-body">
      <!-- <div class="row">
        <div class="col-md-12">
          <h4>Dashboard</h4>
        </div>
      </div> -->
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-white h-100">
            <div class="card-header fw-bold" id="titleMod">FACEBOOK</div>
            <div class="card-body d-flex align-items-center justify-content-center">
              <div class="col text-center fs-1"><i class="fab fa-facebook-square"></i></div>
              <div class="col fw-bold fs-1 text-center" id="cantMod"></div>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <button type="button" class="btn btn-primary btn-sm">Ver más</button>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card text-dark h-100" style="background: #fa5343;">
            <div class="card-header fw-bold" id="titleInst">INSTAGRAM</div>
            <div class="card-body d-flex align-items-center justify-content-center">
              <div class="col text-center fs-1"><img src="../assets/image/ig.png" width="35%"></div>
              <!-- <div class="col text-center fs-1"><i class="fab fa-instagram"></i></div> -->
              <div class="col fw-bold fs-1 text-center" id="cantInst"></div>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <button type="button" class="btn btn-sm" style="background: #fa5343;">Ver más</button>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-danger text-white h-100">
            <div class="card-header fw-bold" id="titleImpl">YOUTUBE</div>
            <div class="card-body d-flex align-items-center justify-content-center">
              <div class="col text-center fs-1"><i class="fab fa-youtube"></i></div>
              <div class="col fw-bold fs-1 text-center" id="cantImpl"></div>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <button type="button" class="btn btn-danger btn-sm">Ver más</button>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-dark text-white h-100">
            <div class="card-header fw-bold" id="titleAct">TIKTOK</div>
            <div class="card-body d-flex align-items-center justify-content-center">
              <div class="col text-center fs-1"><i class="fab fa-tiktok"></i></div>
              <div class="col fw-bold fs-1 text-center" id="cantAct"></div>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <button type="button" class="btn btn-dark btn-sm">Ver más</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              # de Solicitudes ingresadas el mes <b><?php echo (strtoupper(Utils::mesEspañol($mes_anterior))) ?></b>
            </div>
            <div class="card-body">
              <canvas id="chartMesAnterior" class="chart" width="400" height="200"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              # de Solicitudes ingresadas el mes <b><?php echo (strtoupper(Utils::mesEspañol(date('F')))) ?></b>
            </div>
            <div class="card-body">
              <canvas id="chartMesActual" class="chart" width="400" height="200"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer text-muted text-end">
      <?php echo "<b>" . date("d") . " de " . Utils::mesEspañol(date("F")) . " de " . date("Y"); ?>
    </div>
  </div>
</div>
<?php require_once('../views/layout/footer.php'); ?>