<?php
require_once('../views/layout/header.php');
?>
<div class="container-fluid" id="container">
  <div class="card">
    <div class="card-header">
      <div class="d-sm-flex justify-content-between">
        <h3 class="mt-2">Servicios</h3>
        <button type="button" id="btnAbrirModalGuardarServicio" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#modalGuardarServicio">
          Agregar
        </button>
      </div>
    </div>
    <div class="card-body">
      <table id="serviciosDataTable" class="display table table-hover text-center mb-4 table-responsive" style="width: 100%;">
        <thead style="font-size: 15px;">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio Mensual</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Categoria</th>
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
<!-- Agregar Servicio-->
<div class="modal fade" id="modalGuardarServicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Servicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="nombreServicio" class="form-control" placeholder="Nombre del Servicio" aria-label="nombreServicio" name="nombreProveedor">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="codServicio" class="form-control" placeholder="Codigo del Servicio" aria-label="codServicio" name="codServicio">
          </div>
          <div class="col">
            <input type="text" id="precioServicio" class="form-control" placeholder="Precio S/. mensual" aria-label="precioServicio" name="precioServicio" onkeypress="return validarInputSoloNumeros(event);">
          </div>

        </div>
        <div class="row mb-3">
          <div class="col">
            <select id="proveedorServicio" class="form-select form-select-sm" aria-label=".form-select-sm example" name="proveedorServicio">
              <option value='0' selected>Seleccione Proveedor</option>
            </select>
          </div>
          <div class="col">
            <select id="categoriaServicio" class="form-select form-select-sm" aria-label=".form-select-sm example" name="categoriaServicio">
              <option value='0' selected>Seleccione Categoria</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnGuardarServicio" class="btn btn-success" disabled>Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Editar Servicio -->
<div class="modal fade" id="modalEditarServicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Servicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="editNombreServicio" class="form-control" placeholder="Nombre del Servicio" aria-label="nombreServicio" name="nombreServicio">
            <input type="hidden" id="idServicio" name="idServicio">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="editCodServicio" class="form-control" placeholder="Codigo del Servicio" aria-label="codServicio" name="codServicio">
          </div>
          <div class="col">
            <input type="text" id="editPrecioServicio" class="form-control" placeholder="Precio S/." aria-label="precioServicio" name="precioServicio" onkeypress="return validarInputSoloNumeros(event);">
          </div>

        </div>
        <div class="row mb-3">
          <div class="col">
            <select id="editProveedorServicio" class="form-select form-select-sm" aria-label=".form-select-sm example" name="proveedorServicio">
              <option value='0' selected>Seleccione Proveedor</option>
            </select>
          </div>
          <div class="col">
            <select id="editCategoriaServicio" class="form-select form-select-sm" aria-label=".form-select-sm example" name="categoriaServicio">
              <option value='0' selected>Seleccione Categoria</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEditarServicio" class="btn btn-success" disabled>Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Inhabilitar Servicio -->
<div class="modal fade" id="modalInhabilitarServicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inhabilitar Servicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea Inhabilitar el servicio de: <p class="d-inline" id="nombreServicioInhabilitarP"></p>?
            </h6>
            <input type="hidden" id="idServicioInhabilitar">
          </div>
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnInhabilitarServicio" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<!-- Habilitar Servicio -->
<div class="modal fade" id="modalHabilitarServicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Habilitar Servicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea habilitar el servicio de: <p class="d-inline" id="nombreServicioHabilitar"></p>?
            </h6>
            <input type="hidden" id="idServicioHabilitar">
          </div>
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnHabilitarServicio" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>


<?php require_once('../views/layout/footer.php'); ?>