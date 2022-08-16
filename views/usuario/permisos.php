<?php require_once('../views/layout/header.php'); ?>
    <div class="container-fluid" id="container">
        <div class="card">
            <div class="card-header">
                <div class="d-sm-flex justify-content-between">
                    <h3 class="mt-2">Permisos y Usuarios</h3>
                    <button type="button" id="btnAbrirModalGuardarUsuario" class="btn btn-success float-end"
                            data-bs-toggle="modal" data-bs-target="#guardaUsuario">
                        Agregar
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="usuarioDataTable" class="display table table-hover text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
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

    <!-- Brindar Permisos -->
    <div class="modal fade" id="modalBrindarPermisos" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Otorgar Permisos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="idEmpleadoPermiso">
                        <div class="col-6" id="Izquierda">
                            <div class="accordion" id="AcordionIzq">
                                <!-- DASHBOARD PERMISOS -->
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0 text-center">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                Dashboard
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse ms-2 mt-2 mb-2" aria-labelledby="headingOne"
                                         data-parent="#AcordionIzq">
                                        <div class="">
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="dashCobranza" name="dashCobranza" value="2">
                                                <label class="form-check-label" for="dashCobranza">Dashboard Cobranza</label>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="dashSoporte" name="dashSoporte" value="1">
                                                <label class="form-check-label" for="dashSoporte">Dashboard Soporte</label>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="dashComunity" name="dashComunity" value="3">
                                                <label class="form-check-label" for="dashComunity">Dashboard Comunity</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ADMINISTRACION COBRANZA -->
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0 text-center">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Administracion Cobranza
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse ms-2 mt-2 mb-2" aria-labelledby="headingTwo"
                                         data-parent="#AcordionIzq">
                                        <div class="">
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoServicio" name="permisoServicio" value="7">
                                                <label class="form-check-label" for="permisoServicio">Servicios</label>
                                            </div>
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoCategoria" name="permisoCategoria" value="6">
                                                <label class="form-check-label" for="permisoCategoria">Categoria</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoProveedor" name="permisoProveedor" value="5">
                                                <label class="form-check-label" for="permisoProveedor">Proveedores</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- CAJA -->
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0 text-center">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Caja
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse ms-2 mt-2 mb-2"
                                         aria-labelledby="headingThree" data-parent="#AcordionIzq">
                                        <div class="">
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoAdministrarCaja" name="permisoAdministrarCaja" value="10">
                                                <label class="form-check-label" for="permisoAdministrarCaja">Administrar</label>
                                            </div>
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoHistorialCaja" name="permisoHistorialCaja" value="11">
                                                <label class="form-check-label" for="permisoHistorialCaja">Historial</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COMPROBANTES -->
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h2 class="mb-0 text-center">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                Comprobantes
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse ms-2 mt-2 mb-2" aria-labelledby="headingFour"
                                         data-parent="#AcordionIzq">
                                        <div class="">
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoTiposComprobantes" name="permisoTiposComprobantes" value="15">
                                                <label class="form-check-label" for="permisoTiposComprobantes">Tipos Comprobantes</label>
                                            </div>
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoSerieComprobante" name="permisoSerieComprobante" value="16">
                                                <label class="form-check-label" for="permisoSerieComprobante">Series Comprobantes</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- EMPRESA -->
                                <div class="card">
                                    <div class="card-header" id="headingFive">
                                        <h2 class="mb-0 text-center">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                                Empresa
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFive" class="collapse ms-2 mt-2 mb-2" aria-labelledby="headingFive"
                                         data-parent="#AcordionIzq">
                                        <div class="">
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoDatos" name="permisoDatos" value="20">
                                                <label class="form-check-label" for="permisoDatos">Datos generales</label>
                                            </div>
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoSucursal" name="permisoSucursal" value="21">
                                                <label class="form-check-label" for="permisoSucursal">Sucursales</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COMMUNITY MANAGER -->
                                <div class="card">
                                    <div class="card-header" id="headingSix">
                                        <h2 class="mb-0 text-center">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                                                Community Manager
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseSix" class="collapse ms-2 mt-2 mb-2" aria-labelledby="headingSix"
                                         data-parent="#AcordionIzq">
                                        <div class="">
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoSolic" name="permisoSolic" value="25">
                                                <label class="form-check-label" for="permisoSolic">Solic. Informacion</label>
                                            </div>
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoAtencion" name="permisoAtencion" value="26">
                                                <label class="form-check-label" for="permisoAtencion">Atencion Cliente</label>
                                            </div>
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoAltaSistemas" name="permisoAltaSistemas" value="28">
                                                <label class="form-check-label" for="permisoAltaSistemas">Alta de Sistemas</label>
                                            </div>
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoAgendarInst" name="permisoAgendarInst" value="29">
                                                <label class="form-check-label" for="permisoAgendarInst">Agendar Instalaciones</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6" id="Derecha">
                            <div class="accordion" id="AcordionDer">
                                <!-- CLIENTES -->
                                <div class="card">
                                    <div class="card-header" id="cabeceraUno">
                                        <h2 class="mb-0 text-center">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#colapsoUno" aria-expanded="true" aria-controls="colapsoUno">
                                                Clientes
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="colapsoUno" class="collapse ms-2 mt-2 mb-2" aria-labelledby="cabeceraUno"
                                         data-parent="#AcordionDer">
                                        <div class="">
                                            <div class="col-4 form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoClientes"
                                                       name="permisoClientes" value="4">
                                                <label class="form-check-label" for="permisoClientes">Clientes</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ADMINISTRACION SOPORTE -->
                                <div class="card">
                                    <div class="card-header" id="cabeceraDos">
                                        <h2 class="mb-0 text-center">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#colapsoDos" aria-expanded="false" aria-controls="colapsoDos">
                                                Administracion Soporte
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="colapsoDos" class="collapse ms-2 mt-2 mb-2" aria-labelledby="cabeceraDos" data-parent="#AcordionDer">
                                        <div class="">
                                            <div class="col-4 form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoProcesos" name="permisoProcesos" value="9">
                                                <label class="form-check-label" for="permisoProcesos">Procesos</label>
                                            </div>
                                            <div class="col-4 form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoEstados" name="permisoEstados" value="8">
                                                <label class="form-check-label" for="permisoEstados">Estados</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- PAGOS -->
                                <div class="card">
                                    <div class="card-header" id="cabeceraTres">
                                        <h2 class="mb-0 text-center">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#colapsoTres" aria-expanded="false" aria-controls="colapsoTres">
                                                Pagos
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="colapsoTres" class="collapse ms-2 mt-2 mb-2" aria-labelledby="cabeceraTres"
                                         data-parent="#AcordionDer">
                                        <div class="">
                                            <div class="col-4 form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoContratos" name="permisoContratos" value="12">
                                                <label class="form-check-label" for="permisoContratos">Contratos</label>
                                            </div>
                                            <div class="col-4 form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoPensiones" name="permisoPensiones" value="13">
                                                <label class="form-check-label" for="permisoPensiones">Pensiones</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoClienteServicio" name="permisoClienteServicio" value="14">
                                                <label class="form-check-label" for="permisoClienteServicio">Clientes - Servicios</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- PERSONAL DE TRABAJO -->
                                <div class="card">
                                    <div class="card-header" id="cabeceraCuatro">
                                        <h2 class="mb-0 text-center">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#colapsoCuatro" aria-expanded="false" aria-controls="colapsoCuatro">
                                                Personal
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="colapsoCuatro" class="collapse ms-2 mt-2 mb-2"
                                         aria-labelledby="cabeceraCuatro" data-parent="#AcordionDer">
                                        <div class="">
                                            <div class="col-4 form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoCargos" name="permisoCargos" value="18">
                                                <label class="form-check-label" for="permisoCargos">Cargos</label>
                                            </div>
                                            <div class="col-4 form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoUsuarios" name="permisoUsuarios" value="17">
                                                <label class="form-check-label" for="permisoUsuarios">Usuarios</label>
                                            </div>
                                            <div class="col-4 form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoPermisos" name="permisoPermisos" value="19">
                                                <label class="form-check-label" for="permisoPermisos">Permisos</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SOPORTE -->
                                <div class="card">
                                    <div class="card-header" id="cabeceraCinco">
                                        <h2 class="mb-0 text-center">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#colapsoCinco" aria-expanded="false" aria-controls="colapsoCinco">
                                                Soporte
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="colapsoCinco" class="collapse ms-2 mt-2 mb-2"
                                         aria-labelledby="cabeceraCinco" data-parent="#AcordionDer">
                                        <div class="">
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoRegTicket" name="permisoRegTicket" value="22">
                                                <label class="form-check-label" for="permisoRegTicket">Ticket</label>
                                            </div>
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoSuspencion" name="permisoSuspencion" value="23">
                                                <label class="form-check-label" for="permisoSuspencion">Suspenciones</label>
                                            </div>
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoDarBaja" name="permisoDarBaja" value="24">
                                                <label class="form-check-label" for="permisoDarBaja">Bajas</label>
                                            </div>
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoRealizarInst" name="permisoRealizarInst" value="27">
                                                <label class="form-check-label" for="permisoRealizarInst">Instalar Sistemas</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- REPORTES -->
                                <div class="card">
                                    <div class="card-header" id="cabeceraSeis">
                                        <h2 class="mb-0 text-center">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSeis" aria-expanded="true" aria-controls="collapseUno">
                                                Reportes
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseSeis" class="collapse ms-2 mt-2 mb-2" aria-labelledby="cabeceraSeis"
                                         data-parent="#AcordionDer">
                                        <div class="">
                                            <div class="col-auto form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="permisoReportes"
                                                       name="permisoReportes" value="30">
                                                <label class="form-check-label" for="permisoReportes">Reportes</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnGuardarPermisos" class="btn btn-success">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

<?php require_once('../views/layout/footer.php'); ?>