<?php require_once('../views/layout/header.php'); ?>
<div class="container-fluid" id="container">
  <!-- Button trigger modal -->
  <div class="card">
    <div class="card-header">
      <h2 class="mt-2">Gestionar Pautas</h2>
    </div>
    <div class="card-body">
      <button type="button" id="btnAbrirModalGuardarCliente" class="btn btn-success float-end mb-4" data-bs-toggle="modal" data-bs-target="#modalGuardarPauta">
        Agregar
      </button>
      <table id="dataTable" class="display table table-hover text-center mb-4 table-responsive" style="width: 100%;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Link</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Fecha Fin</th>
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

<!-- ################################# MODALES MODALES MODALES MODALES MODALES ######################################### -->
<!-- modal de agregar pauta -->
<div class="modal fade" id="modalGuardarPauta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Registrar Pautas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre de la Pauta</label>
          <input type="text" class="form-control border border-danger" id="nombre" name="nombre">
        </div>
        <div class="row">
          <div class="col-6 mb-3">
            <label for="f_inicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control border border-danger" id="f_inicio" name="f_inicio">
          </div>
          <div class="col-6 mb-3">
            <label for="f_fin" class="form-label">Fecha de Fin</label>
            <input type="date" class="form-control border border-danger" id="f_fin" name="f_fin">
          </div>
        </div>
        <div class="mb-3">
          <label for="link" class="form-label">Link de la Pauta</label>
          <input type="text" class="form-control border border-danger" id="link" name="link">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCerrarGuardar" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-success" id="btnGuardar" disabled>Registrar</button>
      </div>
    </div>
  </div>
</div>
<!-- modal de editar pauta -->
<div class="modal fade" id="modalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Editar Pautas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="edit_nombre" class="form-label">Nombre de la Pauta</label>
          <input type="text" class="form-control border border-success" id="edit_nombre" name="edit_nombre">
          <input type="hidden" id="id_pauta" name="id_pauta">
        </div>
        <div class="row">
          <div class="col-6 mb-3">
            <label for="edit_f_inicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control border border-success" id="edit_f_inicio" name="edit_f_inicio">
          </div>
          <div class="col-6 mb-3">
            <label for="edit_f_fin" class="form-label">Fecha de Fin</label>
            <input type="date" class="form-control border border-success" id="edit_f_fin" name="edit_f_fin">
          </div>
        </div>
        <div class="mb-3">
          <label for="edit_link" class="form-label">Link de la Pauta</label>
          <input type="text" class="form-control border border-success" id="edit_link" name="edit_link">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCerrarEditar" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-success" id="btnEditar">Editar</button>
      </div>
    </div>
  </div>
</div>
<!-- modal Inhabilitar pauta -->
<div class="modal fade" id="modalInhabilitar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inhabilitar Pauta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea Inhabilitar la pauta: <p class="d-inline fw-bolder" id="nombreInhabilitarP"></p>?
            </h6>
            <input type="hidden" id="idInhabilitar">
          </div>
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnInhabilitar" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- modal Habilitar pauta -->
<div class="modal fade" id="modalHabilitar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Habilitar Pauta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea habilitar la pauta: <p class="d-inline fw-bolder" id="nombreHabilitar"></p>?
            </h6>
            <input type="hidden" id="idHabilitar">
          </div>
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnHabilitar" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>



<?php require_once('../views/layout/footer.php'); ?>