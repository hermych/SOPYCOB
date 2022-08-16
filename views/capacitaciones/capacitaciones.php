<?php
require_once('../views/layout/header.php');
?>
  <div class="container-fluid" id="container">
    <div class="card">
      <div class="card-header">
        <div class="d-sm-flex justify-content-between">
          <h3 class="mt-2">Capacitaciones</h3>
          <button type="button" id="btnAbrirModalGuardarCategoria" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#modalGuardarCategoria">
            Agregar
          </button>
        </div>
      </div>
      <div class="card-body">
        
      </div>
      <div class="card-footer text-muted text-end">
        <?php echo "<b>" . date("d") . " de " . date("M") . " de " . date("Y"); ?>
      </div>
    </div>
  </div>

  <!-- ################################# MODALES MODALES MODALES MODALES MODALES ######################################### -->
  <!-- Agregar Categoria-->
  <div class="modal fade" id="modalGuardarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar categoria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col">
              <input type="text" id="categoria" class="form-control" placeholder="Categoria" aria-label="categoria" name="categoria">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" id="btnGuardarCategoria" class="btn btn-success" disabled>Guardar</button>
        </div>
      </div>
    </div>
  </div>

<?php require_once('../views/layout/footer.php'); ?>