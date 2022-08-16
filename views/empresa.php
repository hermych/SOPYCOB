<?php
require_once('../views/layout/header.php');
require_once('../helpers/utils.php');
$mes_anterior = date('F', strtotime('-1 month'));
?>

<div class="container" id="container">
  <!-- Button trigger modal -->
  <div class="card">
    <div class="card-header">
      <h2 class="mt-2">Datos Generales</h2>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6 mb-3">
          <img style="margin-left: 25%; width: 50%; height: 80%; text-align: center;" src="../assets/image/logoTicket.jpg" alt="" id="logoEmpresa">
        </div>
        <div class="col-12 col-sm-6 mb-3 align-middle">
          <label for="logo" class="form-label"><b>Ingresar logo de la empresa</b></label>
          <input class="form-control" type="file" id="logo">
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-6 mb-3">
          <label for="ruc" class="form-label"><b>NRO RUC</b></label>
          <input type="text" class="form-control" id="ruc" name="ruc" required>
          <input type="text" class="form-control" id="idEmpresa" name="idEmpresa" style="display: none;" required>
        </div>
        <div class="col-12 col-sm-6 mb-3">
          <label for="telefono" class="form-label"><b>TELEFONO</b></label>
          <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>
          <div class="col-12 col-sm-6 mb-3">
              <label for="email" class="form-label"><b>EMAIL</b></label>
              <input type="text" class="form-control" id="email" name="email" required>
          </div>
        <div class="col-12 col-sm-6 mb-3">
          <label for="celular" class="form-label"><b>CELULAR</b></label>
          <input type="text" class="form-control" id="celular" name="celular" required>
        </div>
        <div class="col-12 col-sm-6 mb-3">
          <label for="propietario" class="form-label"><b>PROPIETARIO</b></label>
          <input type="text" class="form-control" id="propietario" name="propietario" required>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-3">
          <label for="direccion" class="form-label"><b>DIRECCION</b></label>
          <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        <div class="col-12 col-sm-6 mb-3">
          <label for="razonSocial" class="form-label"><b>RAZON SOCIAL</b></label>
          <input type="text" class="form-control" id="razonSocial" name="razonSocial" required>
        </div>
        <div class="col-12 col-sm-6 mb-3">
          <label for="nombreComercial" class="form-label"><b>NOMBRE COMERCIAL</b></label>
          <input type="text" class="form-control" id="nombreComercial" name="nombreComercial" required>
        </div>
      </div>
      <div class="row text-center">
        <div class="col">
          <button id="btnEditarEmpresa" type="text" class="btn btn-success" disabled>Editar</button>
        </div>
      </div>
      </form>
    </div>
    <div class="card-footer text-muted text-end">
      <?php echo "<b>" . date("d") . " de " . Utils::mesEspañol(date("F")) . " de " . date("Y"); ?>
    </div>
  </div>
</div>
<div class="modal fade" id="modalLoading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h3>Cargando...</h3>
      </div>
    </div>
  </div>
</div>
<?php require_once('../views/layout/footer.php'); ?>