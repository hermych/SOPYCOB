<?php require_once('../views/layout/header.php'); ?>
    <div class="container-fluid" id="container">
        <div class="card">
            <div class="card-header">
                <div class="d-sm-flex justify-content-between">
                    <h3 class="mt-2">Usuarios</h3>
                    <button type="button" id="btnAbrirModalGuardarUsuario" class="btn btn-success float-end"
                            data-bs-toggle="modal" data-bs-target="#guardaUsuario">
                        Agregar
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="display table table-hover text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sucursal</th>
                        <th scope="col">Nombre y Apellidos</th>
                        <th scope="col">Nro Documento</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
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
    <!-- Agregar Usuario-->
    <div class="modal fade" id="guardaUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="nombreUsuario" class="form-control" placeholder="Nombres"
                                   aria-label="nombres" name="nombres">
                        </div>
                        <div class="col">
                            <input type="text" id="apellidoUsuario" class="form-control" placeholder="Apellidos"
                                   aria-label="apellidos" name="apellidos">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <select id="tipoDocUsuario" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example" name="tipoDoc">
                                <option value='0' selected>Tipo Documento</option>
                                <option value="1">DNI</option>
                                <option value="2">RUC</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" id="nroDocUsuario" class="form-control" placeholder="N° de documento"
                                   aria-label="" name="nroDoc" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="celUsuario" class="form-control" placeholder="Celular"
                                   aria-label="celular" name="celular"
                                   onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                        <div class="col">
                            <input type="text" id="emailUsuario" class="form-control" placeholder="Email"
                                   aria-label="email" name="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="direcUsuario" class="form-control" placeholder="Direccion"
                                   aria-label="direccion" name="direccion">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <select id="rolUsuario" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example" name="rol">
                                <option value="0">Seleccion Rol</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="sucursalUsuario" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example" name="sucursalUsuario">
                                <option value="0">Seleccion Sucursal</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <input type="text" id="contraUsuario" class="form-control" placeholder="Contraseña"
                                   aria-label="password" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnGuardarUsuario" class="btn btn-success" disabled>Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Editar Usuario -->
    <div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Nombres" aria-label="nombres"
                                       name="editNombreUsuario" id="editNombreUsuario">
                                <input type="hidden" id="idUsuarioEditar">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Apellidos" aria-label="apellidos"
                                       name="editApellidosUsuario" id="editApellidosUsuario">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                        name="editTipoDocUsuario" id="editTipoDocUsuario">
                                    <option selected value="0">Tipo Documento</option>
                                    <option value="1">DNI</option>
                                    <option value="2">RUC</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="N° de documento" aria-label=""
                                       name="editNroDocUsuario" id="editNroDocUsuario"
                                       onkeypress="return validarInputSoloNumeros(event);">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Celular" aria-label="celular"
                                       name="editCelUsuario" id="editCelUsuario"
                                       onkeypress="return validarInputSoloNumeros(event);">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Email" aria-label="email"
                                       name="editEmailUsuario" id="editEmailUsuario">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Direccion" aria-label="direccion"
                                       name="editDirecUsuario" id="editDirecUsuario">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                        name="editRolUsuario" id="editRolUsuario">
                                    <option value="0">Seleccion Rol</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                        name="editSucursalUsuario" id="editSucursalUsuario">
                                    <option value="0">Seleccion Sucursal</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <input type="password" class="form-control" placeholder="Contraseña"
                                       aria-label="password" name="editContrUsuario" id="editContrUsuario">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnEditarUsuario" class="btn btn-success" disabled>Editar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Inhabilitar Usuario -->
    <div class="modal fade" id="modalInhabilitarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inhabilitar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <h6>¿Desea Inhabilitar a: <p class="d-inline" id="nombreUsuarioInhabilitarP">?</p>
                            </h6>
                            <input type="hidden" id="idUsuarioInhabilitar">
                        </div>
                    </form>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnInhabilitarUsuario" class="btn btn-success">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Inhabilitar Usuario -->
    <div class="modal fade" id="modalHabilitarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Habilitar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <h6>¿Desea volver habilitar a: <p class="d-inline" id="nombreUsuarioHabilitarP"></p>?
                            </h6>
                            <input type="hidden" id="idUsuarioHabilitar">
                        </div>
                    </form>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnHabilitarUsuario" class="btn btn-success">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL PARA LOADING -->
    <div class="modal fade" id="modalLoading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3>Cargando...</h3>
                </div>
            </div>
        </div>
    </div>

<?php require_once('../views/layout/footer.php'); ?>