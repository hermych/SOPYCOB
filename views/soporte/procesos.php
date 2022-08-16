<?php require_once('../views/layout/header.php'); ?>
<div class="container-fluid" id="container">
  <div class="card">
    <div class="card-header">
      <div class="d-sm-flex justify-content-between">
        <h3 class="mt-2">Procesos</h3>
        <button type="button" id="btnAbrirModalGuardarUsuario" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#guardarProceso">
          Agregar
        </button>
      </div>
    </div>
    <div class="card-body">
      <table id="example" class="display table table-hover text-center" style="width: 100%;">
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
<!-- Agregar Proceso-->
<div class="modal fade" id="guardarProceso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Proceso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="nombreProceso" class="form-control" placeholder="Nombre del Proceso" aria-label="nombreProceso" name="nombreProceso">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnGuardarProceso" class="btn btn-success" disabled>Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Editar Usuario -->
<div class="modal fade" id="modalEditarProceso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Proceso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col">
            <input type="hidden" id="idProcesoEdit">
            <input type="text" id="editNombreProceso" class="form-control" placeholder="Nombre del Proceso" aria-label="editNombreProceso" name="editNombreProceso">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEditarProceso" class="btn btn-success">Editar</button>
      </div>
    </div>
  </div>
</div>

<!-- Inhabilitar Proceso -->
<div class="modal fade" id="modalInhabilitarProceso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inhabilitar Proceso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea Inhabilitar el proceso de: <p class="d-inline" id="nombreProcesoInhabilitar">?</p>
            </h6>
            <input type="hidden" id="idProcesoInhabilitar">
          </div>
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnInhabilitarProceso" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<!-- Habilitar Proceso -->
<div class="modal fade" id="modalHabilitarProceso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Habilitar Proceso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea habilitar el proceso de: <p class="d-inline" id="nombreProcesoHabilitar">?</p>
            </h6>
            <input type="hidden" id="idProcesoHabilitar">
          </div>
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnHabilitarProceso" class="btn btn-success">Confirmar</button>
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