<?php
require_once('../views/layout/header.php');
?>
    <div class="container-fluid" id="container">
        <div class="card">
            <div class="card-header">
                <div class="d-sm-flex justify-content-between">
                    <h3 class="mt-2">Comprobantes</h3>
                    <button type="button" id="btnAbrirmodalGuardarComprobante" class="btn btn-success float-end"
                            data-bs-toggle="modal" data-bs-target="#modalGuardarComprobante">
                        Agregar
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="comprobantesDataTable" class="display table table-hover text-center mb-4"
                       style="width: 100%;">
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
    <!-- Agregar Comprobante-->
    <div class="modal fade" id="modalGuardarComprobante" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Tipo de Comprobante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="comprobante" class="form-control" placeholder="Tipo de Comprobante"
                                   aria-label="comprobante" name="comprobante">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnGuardarComprobante" class="btn btn-success" disabled>Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Editar Comprobante -->
    <div class="modal fade" id="modalEditarComprobante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Comprobante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Ingrese Comprobante"
                                       aria-label="nombres" name="editNombreComprobante" id="editNombreComprobante">
                                <input type="hidden" id="idComprobanteEditar">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnEditarComprobante" class="btn btn-success" disabled>Editar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Inhabilitar Comprobante -->
    <div class="modal fade" id="modalInhabilitarComprobante" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inhabilitar Comprobante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <h6>¿Desea Inhabilitar la comprobante: <p class="d-inline"
                                                                      id="nombreComprobanteInhabilitar"></p>?
                            </h6>
                            <input type="hidden" id="idComprobanteInhabilitar">
                        </div>
                    </form>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnInhabilitarComprobante" class="btn btn-success">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- habilitar Comprobante -->
    <div class="modal fade" id="modalHabilitarComprobante" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Habilitar Comprobante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <h6>¿Desea Habilitar el comprobante: <p class="d-inline"
                                                                    id="nombreComprobanteHabilitar"></p>?
                            </h6>
                            <input type="hidden" id="idComprobanteHabilitar">
                        </div>
                    </form>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnHabilitarComprobante" class="btn btn-success">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

<?php require_once('../views/layout/footer.php'); ?>