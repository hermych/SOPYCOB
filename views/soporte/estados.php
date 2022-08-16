<?php require_once('../views/layout/header.php'); ?>
<div class="container-fluid" id="container">
  <div class="card">
    <div class="card-header">
      <div class="d-sm-flex justify-content-between">
        <h3 class="mt-2">Estados de los Procesos</h3>
        <button type="button" id="btnAbrirModalGuardarEstado" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#guardarEstado">
          Agregar
        </button>
      </div>
    </div>
    <div class="card-body">
      <table id="estadosDataTable" class="display table table-hover text-center" style="width: 100%;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
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
<!-- Agregar Estado-->
<div class="modal fade" id="guardarEstado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Estado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="nombreEstado" class="form-control" placeholder="Nombre del Estado" aria-label="nombreEstado" name="nombreEstado">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnGuardarEstado" class="btn btn-success" disabled>Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Editar Estado -->
<div class="modal fade" id="modalEditarEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Estado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col">
            <input type="hidden" id="idEstadoEdit">
            <input type="text" id="editNombreEstado" class="form-control" placeholder="Nombre del Estadi" aria-label="editNombreEstado" name="editNombreEstado">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEditarEstado" class="btn btn-success" disabled>Editar</button>
      </div>
    </div>
  </div>
</div>

<!-- Inhabilitar Estado -->
<div class="modal fade" id="modalInhabilitarEstado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inhabilitar Estado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea Inhabilitar el estado de: <p class="d-inline" id="nombreEstadoInhabilitar">?</p>
            </h6>
            <input type="hidden" id="idEstadoInhabilitar">
          </div>
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnInhabilitarEstado" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<!-- Habilitar Estado -->
<div class="modal fade" id="modalHabilitarEstado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Habilitar Estado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea habilitar el estado de: <p class="d-inline" id="nombreEstadoHabilitar">?</p>
            </h6>
            <input type="hidden" id="idEstadoHabilitar">
          </div>
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnHabilitarEstado" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL PARA LOADING -->
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