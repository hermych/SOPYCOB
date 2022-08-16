<?php
require_once('../views/layout/header.php');
?>
    <div class="container-fluid" id="container">
        <div class="card">
            <div class="card-header">
                <div class="d-sm-flex justify-content-between">
                    <h3 class="mt-2">Proveedores de Servicios</h3>
                    <button type="button" id="btnAbrirModalGuardarProveedor" class="btn btn-success float-end"
                            data-bs-toggle="modal" data-bs-target="#modalGuardarProveedor">
                        Agregar
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="proveedoresDataTable" class="display table table-hover text-center mb-4 table-responsive" style="width: 100%;">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Nro Documento</th>
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
    <!-- Agregar Proveedor-->
    <div class="modal fade" id="modalGuardarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <h4>Proveedor</h4>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <input name="nroDocumento" id="nroDocumento" type="text" class="form-control" placeholder="Nro de Documento" aria-label="Nro de Documento" onkeypress="return validarInputSoloNumeros(event);">
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
                            <input type="text" id="nombreProveedor" class="form-control" placeholder="Nombres y Apellidos del Proveedor" aria-label="nombreProveedor" name="nombreProveedor">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="celProveedor" class="form-control" placeholder="Celular Proveedor" aria-label="telfProveedor" name="celProveedor" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                        <div class="col">
                            <input type="text" id="telfProveedor" class="form-control" placeholder="Telefono Proveedor" aria-label="telfProveedor" name="telfProveedor" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="emailProveedor" class="form-control" placeholder="Email Proveedor" aria-label="emailProveedor" name="emailProveedor">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="direcProveedor" class="form-control" placeholder="Direccion del Proveedor" aria-label="direcProveedor" name="direcProveedor">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="nombreContactoProv" class="form-control" placeholder="Nombres y Apellidos del Contacto" aria-label="nombreContactoProv" name="nombreContactoProv">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="telfContactoProv" class="form-control" placeholder="Celular del Contacto" aria-label="telfContactoProv" name="telfContactoProv" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                        <div class="col">
                            <input type="text" id="emailContactoProv" class="form-control" placeholder="Email del Contacto" aria-label="emailContactoProv" name="nombreContactoProv">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnGuardarProveedor" class="btn btn-success" disabled>Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Editar Proveedor -->
    <div class="modal fade" id="modalEditarProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <span>Nombre</span>
                            <input type="text" id="editNombreProveedor" class="form-control border border-danger border-1" placeholder="Nombres y Apellidos del Proveedor" aria-label="editNombreProveedor" name="editNombreProveedor">
                            <input type="hidden" id="idProveedorEdit" class="form-control" aria-label="nombreProveedor" name="idProveedorEdit">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <span>Celular</span>
                            <input type="text" id="editCelProveedor" class="form-control border border-danger border-1" placeholder="Celular Proveedor" aria-label="editCelProveedor" name="editCelProveedor" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                        <div class="col">
                            <span>Telefono</span>
                            <input type="text" id="editTelfProveedor" class="form-control" placeholder="Telefono Proveedor" aria-label="editTelfProveedor" name="editTelfProveedor" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="col">
                                <span>Email</span>
                                <input type="text" id="editEmailProveedor" class="form-control" placeholder="Email Proveedor" aria-label="editEmailProveedor" name="editEmailProveedor">
                            </div>
                        </div>
                        <div class="col">
                            <span>Nro Documento</span>
                            <input type="text" id="editNroDocProveedor" class="form-control border border-danger border-1" placeholder="N° documento Proveedor" aria-label="editNroDocProveedor" name="editNroDocProveedor" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <span>Direccion</span>
                            <input type="text" id="editDirecProveedor" class="form-control border border-danger border-1" placeholder="Direccion del Proveedor" aria-label="editDirecProveedor" name="editDirecProveedor">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <span>Nombre Contacto</span>
                            <input type="text" id="editNombreContactoProv" class="form-control border border-danger border-1" placeholder="Nombres y Apellidos del Contacto" aria-label="editNombreContactoProv" name="editNombreContactoProv">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <span>Cel/Tel Contacto</span>
                            <input type="text" id="editTelfContactoProv" class="form-control border border-danger border-1" placeholder="Celular del Contacto" aria-label="editTelfContactoProv" name="editTelfContactoProv" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                        <div class="col">
                            <span>Email Contacto</span>
                            <input type="text" id="editEmailContactoProv" class="form-control" placeholder="Email del Contacto" aria-label="emailContactoProv" name="editEmailContactoProv">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnEditarProveedor" class="btn btn-success" disabled>Editar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Inhabilitar Proveedor -->
    <div class="modal fade" id="modalInhabilitarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inhabilitar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <h6>¿Desea Inhabilitar al proveedor: <p class="d-inline"
                                                                    id="nombreProveedorInhabilitarP"></p>?
                            </h6>
                            <input type="hidden" id="idProveedorInhabilitar">
                        </div>
                    </form>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnInhabilitarProveedor" class="btn btn-success">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Inhabilitar Proveedor -->
    <div class="modal fade" id="modalHabilitarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Habilitar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <h6>¿Desea habilitar al proveedor: <p class="d-inline" id="nombreProveedorHabilitarP"></p>?
                            </h6>
                            <input type="hidden" id="idProveedorHabilitar">
                        </div>
                    </form>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnHabilitarProveedor" class="btn btn-success">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Ver Contacto de Proveedor -->
    <div class="modal fade" id="modalVerContacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contacto del Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombreContacto">Nombres y Apellidos</label>
                                <input type="text" class="form-control" id="nombreContacto" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="emailContacto">Email</label>
                                <input type="text" class="form-control" id="emailContacto" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="telefonoContacto">Telefono</label>
                                <input type="text" class="form-control" id="telefonoContacto" readonly>
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

<?php require_once('../views/layout/footer.php'); ?>