<?php
require_once('../views/layout/header.php');
?>
<div class="container-fluid" id="container">
  <div class="card">
    <div class="card-header">
      <div class="d-sm-flex justify-content-between">
        <h3 class="mt-2">Categoria de Servicios</h3>
        <button type="button" id="btnAbrirModalGuardarCategoria" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#modalGuardarCategoria">
          Agregar
        </button>
      </div>
    </div>
    <div class="card-body">
      <table id="categoriasDataTable" class="display table table-hover text-center mb-4" style="width: 100%;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Categoria</th>
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

<!-- Editar Categoria -->
<div class="modal fade" id="modalEditarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="row mb-3">
            <div class="col">
              <input type="text" class="form-control" placeholder="Ingrese Categoria" aria-label="nombres" name="editNombreCategoria" id="editNombreCategoria">
              <input type="hidden" id="idCategoriaEditar">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEditarCategoria" class="btn btn-success" disabled>Editar</button>
      </div>
    </div>
  </div>
</div>

<!-- Inhabilitar Categoria -->
<div class="modal fade" id="modalInhabilitarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inhabilitar Categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea Inhabilitar la categoria: <p class="d-inline" id="nombreCategoriaInhabilitarP"></p>?
            </h6>
            <input type="hidden" id="idCategoriaInhabilitar">
          </div>
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnInhabilitarCategoria" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<!-- Habilitar Categoria -->
<div class="modal fade" id="modalHabilitarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Habilitar Categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea habilitar la categoria: <p class="d-inline" id="nombreCategoriaHabilitarP"></p>?
            </h6>
            <input type="hidden" id="idCategoriaHabilitar">
          </div>
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnHabilitarCategoria" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<?php require_once('../views/layout/footer.php'); ?>