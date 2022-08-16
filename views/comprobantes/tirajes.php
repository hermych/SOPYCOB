<?php
require_once('../views/layout/header.php');
?>
    <div class="container-fluid" id="container">
        <div class="card">
            <div class="card-header">
                <div class="d-sm-flex justify-content-between">
                    <h3 class="mt-2">Tiraje</h3>
                    <button type="button" id="btnAbrirmodalGuardarTiraje" class="btn btn-success float-end"
                            data-bs-toggle="modal" data-bs-target="#modalGuardarTiraje">
                        Agregar
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="tirajesDataTable" class="display table table-hover text-center mb-4" style="width: 100%;">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sucursal</th>
                        <th scope="col">Serie</th>
                        <th scope="col">Comprobante</th>
                        <th scope="col">Disponibles</th>
                        <th scope="col">Utilizados</th>
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
    <!-- Agregar Tiraje-->
    <div class="modal fade" id="modalGuardarTiraje" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Tiraje</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <select class="form-select" id="sucursal" name="sucursal">
                                <option selected value="0">SUCURSALES</option>
                                <option value="1">One</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" id="comprobante" name="comprobante">
                                <option selected value="0">COMPROBANTES</option>
                                <option value="1">One</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label>SERIE</label>
                            <input type="text" class="form-control" id="serie" name="serie" placeholder="SERIE">
                        </div>
                        <div class="col">
                            <label>DESDE</label>
                            <input type="text" class="form-control" id="desde" name="desde" placeholder="DESDE" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                        <div class="col">
                            <label>HASTA</label>
                            <input type="text" class="form-control" id="hasta" name="hasta" placeholder="HASTA" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnGuardarTiraje" class="btn btn-success" disabled>Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Editar Comprobante -->
    <div class="modal fade" id="modalEditarTiraje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Comprobante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <select class="form-select" id="sucursalEdit" name="sucursalEdit">
                                <option selected value="0">SUCURSALES</option>
                                <option value="1">One</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" id="comprobanteEdit" name="comprobanteEdit">
                                <option selected value="0">COMPROBANTES</option>
                                <option value="1">One</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label>SERIE</label>
                            <input type="text" class="form-control" id="serieEdit" name="serieEdit" placeholder="SERIE">
                            <input type="hidden" class="form-control" id="idTirajeEdit">
                        </div>
                        <div class="col">
                            <label>DESDE</label>
                            <input type="text" class="form-control" id="desdeEdit" name="desdeEdit" placeholder="DESDE" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                        <div class="col">
                            <label>HASTA</label>
                            <input type="text" class="form-control" id="hastaEdit" name="hastaEdit" placeholder="HASTA" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                        <div class="col">
                            <label>UTILIZADOS</label>
                            <input type="text" class="form-control" id="utilEdit" name="utilEdit" placeholder="UTILIZADOS" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnEditarTiraje" class="btn btn-success" disabled>Editar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Inhabilitar Comprobante -->
    <div class="modal fade" id="modalInhabilitarTiraje" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Tiraje</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <h6>¿Desea eliminar el comprobante: <p class="d-inline" id="nombreTirajeInhabilitar"></p> de
                                serie <p class="d-inline" id="serieTirajeInhabilitar"></p>?
                            </h6>
                            <input type="hidden" id="idTirajeInhabilitar">
                        </div>
                    </form>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnInhabilitarTiraje" class="btn btn-success">Confirmar</button>
                </div>
            </div>
        </div>
    </div>


<?php require_once('../views/layout/footer.php'); ?>