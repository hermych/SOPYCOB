<?php
require_once('../views/layout/header.php');
?>
    <div class="container-fluid" id="container">
        <div class="card">
            <div class="card-header">
                <div class="d-sm-flex justify-content-between">
                    <h3 class="mt-2">Sucursales</h3>
                    <button type="button" id="btnAbrirModalGuardarSucursal" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#modalGuardarSucursal">
                        Agregar
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="sucursalesDataTable" class="display table table-hover text-center mb-4 table-responsive" style="width: 100%;">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Direccion</th>
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
    <!-- Agregar Sucursal-->
    <div class="modal fade" id="modalGuardarSucursal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Sucursal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="nombreSucursal" class="form-control" placeholder="Nombre de la Sucursal" aria-label="nombreSucursal" name="nombreSucursal">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="direccionSucursal" class="form-control" placeholder="Dirección"  name="direccionSucursal">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="codigoSucursal" class="form-control" placeholder="Codigo de Sucursal"  name="codigoSucursal">
                        </div>
                        <div class="col">
                            <input type="text" id="codigoFiscal" class="form-control" placeholder="Codigo Fiscal"  name="codigoFiscal">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnGuardarSucursal" class="btn btn-success" disabled>Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Editar Sucursal -->
    <div class="modal fade" id="modalEditarSucursal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="editNombreSucursal" class="form-control" placeholder="Nombre de la Sucursal" name="editNombreSucursal">
                            <input type="hidden" id="idSucursal" name="idSucursal">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="editDireccionSucursal" class="form-control" placeholder="Dirección"  name="editDireccionSucursal">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="editCodigoSucursal" class="form-control" placeholder="Codigo de Sucursal"  name="editCodigoSucursal">
                        </div>
                        <div class="col">
                            <input type="text" id="editCodigoFiscal" class="form-control" placeholder="Codigo Fiscal"  name="editCodigoFiscal">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnEditarSucursal" class="btn btn-success" disabled>Editar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Inhabilitar Sucursal -->
    <div class="modal fade" id="modalInhabilitarSucursal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inhabilitar Sucursal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <h6>¿Desea Inhabilitar la sucursal de: <p class="d-inline" id="nombreSucursalInhabilitarP"></p>?
                            </h6>
                            <input type="hidden" id="idSucursalInhabilitar">
                        </div>
                    </form>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnInhabilitarSucursal" class="btn btn-success">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Inhabilitar Sucursal -->
    <div class="modal fade" id="modalHabilitarSucursal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Habilitar Sucursal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <h6>¿Desea habilitar la sucursal de: <p class="d-inline" id="nombreSucursalHabilitarP"></p>?
                            </h6>
                            <input type="hidden" id="idSucursalHabilitar">
                        </div>
                    </form>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnHabilitarSucursal" class="btn btn-success">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

<?php require_once('../views/layout/footer.php'); ?>