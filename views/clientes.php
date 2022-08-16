<?php require_once('../views/layout/header.php'); ?>
<div class="container-fluid" id="container">
  <!-- Button trigger modal -->
  <div class="card">
    <div class="card-header"><h2 class="mt-2">Clientes</h2></div>
    <div class="card-body">
      <button type="button" id="btnAbrirModalGuardarCliente" class="btn btn-success float-end mb-4" data-bs-toggle="modal" data-bs-target="#modalGuardarCliente">
        Agregar
      </button>
      <table id="clientesDataTable" class="display table table-hover text-center mb-4 table-responsive" style="width: 100%;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre Legal</th>
            <th scope="col">Nombre Comercial</th>
            <th scope="col">Celular</th>
            <!-- <th scope="col">Email</th> -->
            <th scope="col" style="width: 25%;">Direccion</th>
            <th scope="col" style="width: 5%;">Nro Documento</th>
            <th scope="col" style="width: 12%;">Opciones</th>
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
<!-- Agregar Cliente-->
<div class="modal fade" id="modalGuardarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Registrar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h4>Cliente</h4>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <input name="nroDocumento" id="nroDocumento" type="text" class="form-control border border-danger" placeholder="Nro de Documento" aria-label="Nro de Documento" onkeypress="return validarInputSoloNumeros(event);">
                            <button class="btn btn-primary" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="loaderDni"></span>
                                <i class="fas fa-search" style="display: block;" id="searchDni"></i>
                                <span class="visually-hidden">Loading...</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" id="nombreCliente" class="form-control border border-danger" placeholder="Nombre legal del cliente" aria-label="nombreCliente" name="nombreProveedor" disabled>
                    </div>
                </div>
                <div class="row mb-3" id="divNombreComercial">
                    <div class="col">
                        <input type="text" id="nombreComercial" class="form-control" placeholder="Nombre comercial del cliente" aria-label="nombreComercial" name="nombreComercial">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" id="celuCliente" class="form-control border border-danger" placeholder="978654132" aria-label="celuCliente" name="celuCliente" onkeypress="return validarInputSoloNumeros(event);">
                    </div>
                    <div class="col">
                        <input type="text" id="emailCliente" class="form-control" placeholder="Email Cliente" aria-label="emailCliente" name="emailCliente">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" id="telfCliente" class="form-control" placeholder="Telefono Cliente" aria-label="telfCliente" name="telfCliente" onkeypress="return validarInputSoloNumeros(event);">
                    </div>
                    <div class="col">
                        <select id="idDepartamento" class="form-select form-select-sm border border-danger" aria-label=".form-select-sm example" name="idDepartamento">
                            <option value='0'>Seleccione departamento</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <select id="idProvincia" class="form-select form-select-sm border border-danger" aria-label=".form-select-sm example" name="idProvincia" disabled>
                            <option value='0' selected>Seleccione provincia</option>
                        </select>
                    </div>
                    <div class="col">
                        <select id="idDistrito" class="form-select form-select-sm border border-danger" aria-label=".form-select-sm example" name="idDistrito" disabled>
                            <option value='0' selected>Seleccione distrito</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" id="direcCliente" class="form-control border border-danger" placeholder="Direccion del Cliente" aria-label="direcCliente" name="direcCliente">
                    </div>
                </div>
                <h4>Contacto</h4>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" id="nombreContacto" class="form-control border border-danger" placeholder="Nombres y Apellidos del Contacto" aria-label="nombreContacto" name="nombreContacto">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" id="telfContacto" class="form-control border border-danger" placeholder="Celular del Contacto" aria-label="telfContacto" name="telfContacto" onkeypress="return validarInputSoloNumeros(event);">
                    </div>
                    <div class="col">
                        <input type="text" id="dniContacto" class="form-control border border-danger" placeholder="DNI del contacto" aria-label="dniContacto" name="dniContacto">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="btnGuardar" disabled>Registrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Editar Cliente -->
<div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <h5>Cliente</h5>
          </div>
          <div class="col">
            <div class="input-group mb-3">
              <input name="nroDocumentoEdit" id="nroDocumentoEdit" type="text" class="form-control" placeholder="Nro de Documento" aria-label="Nro de Documento" onkeypress="return validarInputSoloNumeros(event);">
              <button class="btn btn-primary" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="loaderDni"></span>
                <i class="fas fa-search" style="display: block;" id="searchDni"></i>
                <span class="visually-hidden">Loading...</span>
              </button>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="nombreClienteEdit" class="form-control" placeholder="Nombres y Apellidos del Cliente" aria-label="nombreClienteEdit" name="nombreClienteEdit" disabled>
            <input type="hidden" id="idClienteEdit">
          </div>
        </div>
        <div class="row mb-3" id="divNombreComercialEdit">
          <div class="col">
            <input type="text" id="nombreComercialEdit" class="form-control" placeholder="Nombre comercial del cliente" aria-label="nombreComercialEdit" name="nombreComercialEdit">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="celuClienteEdit" class="form-control" placeholder="Celular Cliente" aria-label="celuClienteEdit" name="celuClienteEdit" onkeypress="return validarInputSoloNumeros(event);">
          </div>
          <div class="col">
            <input type="text" id="emailClienteEdit" class="form-control" placeholder="Email Cliente" aria-label="emailClienteEdit" name="emailClienteEdit">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="telfClienteEdit" class="form-control" placeholder="Telefono Cliente" aria-label="telfClienteEdit" name="telfClienteEdit" onkeypress="return validarInputSoloNumeros(event);">
          </div>
          <div class="col">
            <select id="idDepartamentoEdit" class="form-select form-select-sm" aria-label=".form-select-sm example" name="idDepartamentoEdit">
              <option value='0'>Departamento</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <select id="idProvinciaEdit" class="form-select form-select-sm" aria-label=".form-select-sm example" name="idProvinciaEdit">
              <option value='0' selected>Provincias</option>
            </select>
          </div>
          <div class="col">
            <select id="idDistritoEdit" class="form-select form-select-sm" aria-label=".form-select-sm example" name="idDistritoEdit">
              <option value='0' selected>Distritos</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="direcClienteEdit" class="form-control" placeholder="Direccion del Cliente" aria-label="direcClienteEdit" name="direcClienteEdit">
          </div>
        </div>
        <h5>Contacto</h5>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="nombreContactoProvEdit" class="form-control" placeholder="Nombres y Apellidos del Contacto" aria-label="nombreContactoProvEdit" name="nombreContactoProvEdit">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" id="telfContactoProvEdit" class="form-control" placeholder="Celular del Contacto" aria-label="telfContactoProvEdit" name="telfContactoProvEdit" onkeypress="return validarInputSoloNumeros(event);">
          </div>
          <div class="col">
            <input type="text" id="dniContactoEdit" class="form-control" placeholder="DNI del contacto" aria-label="dniContactoEdit" name="dniContactoEdit">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEditarCliente" class="btn btn-success">Editar</button>
      </div>
    </div>
  </div>
</div>

<!-- Inhabilitar Cliente -->
<div class="modal fade" id="modalInhabilitarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inhabilitar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <h6>¿Desea Inhabilitar al cliente: <p class="d-inline" id="nombreClienteInhabilitarP"></p>?
            </h6>
            <input type="hidden" id="idClienteInhabilitar">
          </div>
        </form>
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnInhabilitarCliente" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<!-- Ver Contacto de Cliente -->
<div class="modal fade" id="modalVerContacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contacto del Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col">
            <div class="form-group">
              <label for="nombreContacto">Nombres y Apellidos</label>
              <input type="text" class="form-control" id="nombreContacto2" readonly>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <div class="form-group">
              <label for="telefonoContacto">Celular</label>
              <input type="text" class="form-control" id="telefonoContacto" readonly>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="nroDocConta">DNI Contacto</label>
              <input type="text" class="form-control" id="nroDocConta" readonly>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnInhabilitarProveedor" class="btn btn-success">Confirmar</button>
      </div> -->
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