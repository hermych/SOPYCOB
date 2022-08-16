<?php
require_once('../views/layout/header.php');
require_once('../helpers/utils.php');
$mesAct = date('F');
$mesEsp = Utils::mesEspañol($mesAct)
?>
<div class="container-fluid">
  <div class="card">
    <div class="card-header mt-2">
      <h3>Dar de Baja Sistemas</h3>
    </div>
    <div class="card-body text-center">
      <table id="darBajaTable" class="display table table-hover text-center mb-4 table-responsive">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Cliente</th>
          <th scope="col">Servicio</th>
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



