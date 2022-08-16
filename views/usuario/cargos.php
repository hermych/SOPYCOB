<?php require_once('../views/layout/header.php'); ?>
<div class="container-fluid" id="container">
  <div class="card">
    <div class="card-header">
      <div class="d-sm-flex justify-content-between">
        <h3 class="mt-2">Cargos - Roles</h3>
        <button type="button" id="btnAbrirModalGuardarCargo" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#modalGuardarCargo">
    Agregar
  </button>
      </div>
    </div>
    <div class="card-body">
    <table id="cargosDataTable" class="display table table-hover text-center mb-4" style="width: 100%;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Codigo</th>
        <th scope="col">Cargos</th>
        <th scope="col">Sueldo (S/.)</th>
        <th scope="col">Estado</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody id="tbody" style="font-size: 15px;">

    </tbody>
  </table>
    </div>
    <div class="card-footer text-muted text-end">
      <?php echo "<b>" . date("d") . " de " . date("M") . " de " . date("Y"); ?>
    </div>
  </div>
</div>

<!-- ################################# MODALES MODALES MODALES MODALES MODALES ######################################### -->
<!-- Agregar Cargo-->
<div class="modal fade" id="modalGuardarCargo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Cargo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="nombreCargo" class="form-control" placeholder="Nombre del Cargo" aria-label="nombreCargo" name="nombreCargo">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="codigoCargo" class="form-control" placeholder="Codigo" aria-label="codigoCargo" name="codigoCargo">
          </div>
          <div class="col">
            <input type="text" id="sueldoCargo" class="form-control" placeholder="Sueldo" aria-label="sueldoCargo" name="sueldoCargo" onkeypress="return validarInputSoloNumeros(event);">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnGuardarCargo" class="btn btn-success" disabled>Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Editar Cargo -->
<div class="modal fade" id="modalEditarCargo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Cargo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="editNombreCargo" class="form-control" placeholder="Nombre del Cargo" aria-label="editnombreCargo" name="editNombreCargo">
            <input type="hidden" id="idCargo" name="idCargo">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="editCodigoCargo" class="form-control" placeholder="Codigo" aria-label="editCodigoCargo" name="editCodigoCargo">
          </div>
          <div class="col">
            <input type="text" id="editSueldoCargo" class="form-control" placeholder="Sueldo" aria-label="editSueldoCargo" name="editSueldoCargo" onkeypress="return validarInputSoloNumeros(event);">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEditarCargo" class="btn btn-success" disabled>Editar</button>
      </div>
    </div>
  </div>
</div>

<!-- Inhabilitar Cargo -->
<div class="modal fade" id="modalInhabilitarCargo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inhabilitar Cargo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea Inhabilitar el cargo de: <p class="d-inline" id="nombreCargoInhabilitarP"></p>?
            </h6>
            <input type="hidden" id="idCargoInhabilitar">
          </div>
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnInhabilitarCargo" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>

    <!-- habilitar Comprobante -->
    <div class="modal fade" id="modalHabilitarCargo" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Habilitar Cargo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <h6>¿Desea Habilitar: "<p class="d-inline"
                                                                    id="nombreCargoHabilitar"></p>"?
                            </h6>
                            <input type="hidden" id="idCargoHabilitar">
                        </div>
                    </form>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnHabilitarCargo" class="btn btn-success">Confirmar</button>
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