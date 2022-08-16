<?php require_once('../views/layout/header.php'); ?>
    <div class="container-fluid" id="container">
        <div class="card text-center">
            <div class="card-header">
                <div class="d-sm-flex justify-content-between">
                    <h4 class="mt-2">Programar Instalaciones</h4>
                    <!-- <button type="button" id="btnAbrirModalRegistrar" class="btn btn-primary btn-sm px-2" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Agregar Cliente -->
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-6 mb-1">
                        <label for="titulo" class="form-label fw-bolder">Titulo</label>
                        <input type="text" class="form-control border border-danger" id="titulo" name="titulo" placeholder="Ejemplo: SISTEMA POS BOTICA INTEGRADO CON SISTEMA DE FACTURACIÓN ELECTRÓNICA">
                    </div>
                    <div class="col-auto mb-1">
                        <label for="tipo_sistema" class="form-label fw-bolder">Tipo de Sistema</label>
                        <select class="form-select" id="tipo_sistema" name="tipo_sistema">
                            <option selected value="0">Seleccione Sistema</option>
                            <option value="1">Sistema Pos</option>
                            <option value="2">Sistema Factura</option>
                            <option value="3">Sistema Restobar Escritorio</option>
                            <option value="4">Sistema Restobar Web</option>
                            <option value="5">Sistema Pos + Facturacion</option>
                            <option value="6">Sistema Restobar + Facturacion</option>
                            <option value="7">Sistema Restobar Web + Facturacion</option>
                        </select>
                    </div>
                    <div class="col mb-1">
                        <label for="asesor" class="form-label fw-bolder">Asesor Comercial</label>
                        <input type="text" class="form-control border border-danger" id="asesor" name="asesor" placeholder="Nombre de Asesor Comercial">
                    </div>
                </div>
                <!-- Dominios -->
                <div class="row mb-2">
                    <div class="col mb-1">
                        <label for="dominioPos" class="form-label fw-bolder">Dominio POS</label>
                        <input type="text" class="form-control" id="dominioPos" name="dominioPos" placeholder="Ejemplo: posboticalurenfarma.sigefac.com" disabled>
                    </div>
                    <div class="col mb-1">
                        <label for="dominioFactura" class="form-label fw-bolder">Dominio Factura</label>
                        <input type="text" class="form-control" id="dominioFactura" name="dominioFactura" placeholder="Ejemplo: facturaboticalurenfarma.sigefac.com" disabled>
                    </div>
                    <div class="col mb-1">
                        <label for="dominioRestobar" class="form-label fw-bolder">Dominio Rest. Web</label>
                        <input type="text" class="form-control" id="dominioRestobar" name="dominioRestobar" placeholder="Ejemplo: restobartoshimey.sigefac.com" disabled>
                    </div>
                    <div class="col-auto mb-1">
                        <label for="tipo_negocio" class="form-label fw-bolder">Tipo Negocio</label>
                        <input type="text" class="form-control" id="tipo_negocio" name="tipo_negocio" placeholder="Ejemplo: POLLERÍA" disabled>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col mb-1">
                        <label for="dni" class="form-label fw-bolder">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" placeholder="Ejemplo: 15967838" disabled>
                    </div>
                    <div class="col mb-1">
                        <label for="ruc" class="form-label fw-bolder">RUC</label>
                        <input type="text" class="form-control" id="ruc" name="ruc" placeholder="Ejemplo: 10159678381" disabled>
                    </div>
                    <div class="col mb-1">
                        <label for="celular" class="form-label fw-bolder">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" placeholder="Ejemplo: 975963741" disabled>
                    </div>
                    <div class="col mb-1">
                        <label for="telefono" class="form-label fw-bolder">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ejemplo: 3271754" disabled>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col mb-1">
                        <label for="cliente" class="form-label fw-bolder">Cliente</label>
                        <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Ejemplo: INAFUKO INAFUKO JUAN RAMON" disabled>
                    </div>
                    <div class="col mb-1">
                        <label for="name_comercial" class="form-label fw-bolder">Nombre Comercial</label>
                        <input type="text" class="form-control" id="name_comercial" name="name_comercial" placeholder="Ejemplo: TOSHIMEY" disabled>
                    </div>
                    <div class="col mb-1">
                        <label for="razonSocial" class="form-label fw-bolder">Razon Social</label>
                        <input type="text" class="form-control" id="razonSocial" name="razonSocial" placeholder="Ejemplo: INAFUKO INAFUKO JUAN RAMON" disabled>
                    </div>
                    <div class="col mb-1">
                        <label for="correo" class="form-label fw-bolder">Correo</label>
                        <input type="text" class="form-control" id="correo" name="correo" placeholder="Ejemplo: yoserpascual@gmail.com" disabled>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col mb-1">
                        <label for="direc_fiscal" class="form-label fw-bolder">Direccion Fiscal</label>
                        <textarea class="form-control" id="direc_fiscal" rows="4" name="direc_fiscal" disabled placeholder="(0000) -> Av las pruebas 325"></textarea>
                    </div>
                    <div class="col mb-1">
                        <label for="serie_compro" class="form-label fw-bolder">Serie Comprobantes</label>
                        <textarea class="form-control" id="serie_compro" rows="4" name="serie_compro" disabled placeholder="(0000) -> TICKET: TK01 / BOLETA: B001 / FACTURA: F001 "></textarea>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col mb-1">
                        <label for="especificacion" class="form-label fw-bolder">Especificacion</label>
                        <textarea class="form-control" id="especificacion" rows="4" name="especificacion" disabled placeholder="1. EN BUSQUEDA DE DNI Y RUC 10 DEBE IR POR DEFECTO:  HUARAL - LIMA"></textarea>
                    </div>
                    <div class="col mb-1">
                        <label for="observacion" class="form-label fw-bolder">Observacion</label>
                        <textarea class="form-control" id="observacion" rows="4" name="observacion" disabled placeholder="1. SISTEMA RESTOBAR WEB INTEGRADO CON SISTEMA DE FACTURACIÓN ELECTRÓNICA"></textarea>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col mb-1">
                        <label for="persona_contacto" class="form-label fw-bolder">Persona de Contacto</label>
                        <input type="text" class="form-control" id="persona_contacto" name="persona_contacto" disabled placeholder="Carlos Quispe">
                    </div>
                    <div class="col-auto mb-1">
                        <label for="cel_contacto" class="form-label fw-bolder">Celular del Contacto</label>
                        <input type="text" class="form-control" id="cel_contacto" name="cel_contacto" disabled placeholder="932681121">
                    </div>
                    <div class="col mb-1">
                        <label for="equipo_principal" class="form-label fw-bolder">Equipo en caja Principal</label>
                        <input type="text" class="form-control" id="equipo_principal" name="equipo_principal" disabled placeholder="ticketera">
                    </div>
                    <div class="col mb-1">
                        <label for="equipo_cocina" class="form-label fw-bolder">Equipo en cocina</label>
                        <input type="text" class="form-control" id="equipo_cocina" name="equipo_cocina" disabled placeholder="Ticketera (no es de nosotros)">
                    </div>
                    <div class="col mb-1">
                        <label for="equipo_bar" class="form-label fw-bolder">Equipo en bar</label>
                        <input type="text" class="form-control" id="equipo_bar" name="equipo_bar" disabled placeholder="Ticketera por red">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-auto mb-1">
                        <label for="total_impresoras" class="form-label fw-bolder">Total de impresoras</label>
                        <input type="text" class="form-control" id="total_impresoras" name="total_impresoras" disabled placeholder="3">
                    </div>
                    <div class="col mb-1">
                        <label for="usuario" class="form-label fw-bolder">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" disabled placeholder="ASESORIA">
                    </div>
                    <div class="col mb-1">
                        <label for="clave_sol" class="form-label fw-bolder">Clave Sol</label>
                        <input type="text" class="form-control" id="clave_sol" name="clave_sol" disabled placeholder="EFECTIVAsac7">
                    </div>
                    <div class="col mb-1">
                        <label for="logo" class="form-label fw-bolder">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo" multiple disabled>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted text-end">
                <!-- <button type="button" class="btn btn-danger">Cancelar</button> -->
                <button type="button" id="btnAgendar" class="btn btn-success">Agendar</button>
            </div>
        </div>
    </div>

    <!-- ################################# MODALES MODALES MODALES MODALES MODALES ######################################### -->
    <!-- Modal Agregar Cliente-->
    <div class="modal fade" id="modalRegistrar" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
                    <div class="row mb-3" id="divNombreComercial" style="display: none">
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
                    <button class="btn btn-success" id="btnGuardar">Registrar</button>
                </div>
            </div>
        </div>
    </div>
<?php require_once('../views/layout/footer.php'); ?>