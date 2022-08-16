<?php require_once('../views/layout/header.php'); ?>
<div class="container-fluid" id="container">
  <!-- Button trigger modal -->
  <div class="card">
    <div class="card-header">
      <h2 class="mt-2">Gestionar Equipos en Ventas</h2>
    </div>
    <div class="card-body">
      <button type="button" id="btnAbrirModalGuardarCliente" class="btn btn-success float-end mb-4" data-bs-toggle="modal" data-bs-target="#modalGuardar">
        Agregar
      </button>
      <table id="dataTable" class="display table table-hover text-center mb-4 table-responsive" style="width: 100%;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
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
<!-- modal de agregar sistema -->
<div class="modal fade" id="modalGuardar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="place-self: center;">
        <h5 class="modal-title fw-bolder" id="exampleModalToggleLabel">Registrar Sistemas</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-8 mb-3">
            <label for="nombre" class="form-label">Nombre del Equipo</label>
            <input type="text" class="form-control border border-danger" id="nombre" name="nombre" placeholder="IMPRESORA CODIGO DE BARRA">
          </div>
          <div class="col-4 mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control border border-danger" id="precio" name="precio" onkeypress="return validarInputSoloNumeros(event);" placeholder="450.00">
          </div>
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
      <div class="modal-header" style="place-self: center;">
        <h5 class="modal-title fw-bolder" id="exampleModalToggleLabel">Editar Pautas</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-8 mb-3">
            <label for="nombreEdit" class="form-label">Nombre del sistema</label>
            <input type="text" class="form-control border border-success" id="nombreEdit" name="nombreEdit" placeholder="RESTOBAR">
            <input type="hidden" id="id" name="id">
          </div>
          <div class="col-4 mb-3">
            <label for="precioEdit" class="form-label">Precio</label>
            <input type="text" class="form-control border border-success" id="precioEdit" name="precioEdit" onkeypress="return validarInputSoloNumeros(event);" placeholder="75.00">
          </div>
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
      <div class="modal-header" style="place-self: center;">
        <h5 class="modal-title fw-bolder" id="exampleModalLabel">Inhabilitar Sistema</h5>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea Inhabilitar el Sistema de: <p class="d-inline fw-bolder" id="nombreInhabilitar"></p>?
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
      <div class="modal-header" style="place-self: center;">
        <h5 class="modal-title fw-bolder" id="exampleModalLabel">Habilitar Sistema</h5>
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