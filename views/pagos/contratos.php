<?php require_once('../views/layout/header.php'); ?>
    <div class="container" id="container">
        <div class="card text-center">
            <div class="card-header">
                <div class="d-sm-flex justify-content-between">
                    <h3 class="mt-2">Realizar Contratos</h3>
                    <button type="button" id="btnAbrirModalGuardarCliente" class="btn btn-primary btn-sm px-2"
                            data-bs-toggle="modal" data-bs-target="#modalAgregarCliente">Agregar Cliente
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <h3 class="pt-4" style="text-decoration: 2px dashed;">Datos del Cliente</h3>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="clientes" class="mb-2 fw-bold">Cliente</label>
                        <select class="clientes form form-control" id="clientes" style="width: 100%; height: 120%;">
                            <option value="0" selected>Seleccione Cliente</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="servicios" class="mb-2 fw-bold">Servicios</label>
                        <select class="servicios form form-control" id="servicios" style="width: 100%" disabled>
                            <option value="0" selected>Seleccione Servicios</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="meses" class="mb-2 fw-bold">Meses</label>
                        <input class="form-control" id="meses" name="meses" type="text" placeholder="cantidad de meses"
                               onkeypress="return validarInputSoloNumeros(event);">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 col-md-3">
                        <label for="fechaInicio" class="mb-2 fw-bold">Fecha Inicio</label>
                        <input class="form-control text-center" type="date" id="fechaInicio" name="fechaInicio">
                    </div>
                    <div class="col col-md-3">
                        <label for="tipoAfectacion" class="mb-2 fw-bold">T. Afectacion</label>
                        <select id="tipoAfectacion" class="form-select form-select-sm"
                                aria-label=".form-select-sm example" name="tipoAfectacion">
                            <option value='0'>Departamento</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-3">
                        <label for="idDepartamentoContrato" class="mb-2 fw-bold">Departamento</label>
                        <select id="idDepartamentoContrato" class="form-select form-select-sm"
                                aria-label=".form-select-sm example" name="idDepartamentoContrato">
                            <option value='0'>Departamento</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-3">
                        <label for="idProvinciaContrato" class="mb-2 fw-bold">Provincia</label>
                        <select id="idProvinciaContrato" class="form-select form-select-sm"
                                aria-label=".form-select-sm example" name="idProvinciaContrato" disabled>
                            <option value='0' selected>Provincias</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6 col-md-3">
                        <label for="idDistritoContrato" class="mb-2 fw-bold">Distrito</label>
                        <select id="idDistritoContrato" class="form-select form-select-sm"
                                aria-label=".form-select-sm example" name="idDistritoContrato" disabled>
                            <option value='0' selected>Distritos</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="row mt-5 mb-4">
                  <h4 style="border-top: 2px dashed black;" class="pt-4">Datos de la Empresa</h4>
                </div>
                <div class="row mb-4">
                  <div class="col">
                    <label for="tipoNegocio">Tipo de Negocio</label>
                    <input class="form-control" type="text" id="tipoNegocio" name="tipoNegocio" placeholder="Tipo de Negocio">
                  </div>
                  <div class="col">
                    <label for="razonSocial">Razon Social</label>
                    <input class="form-control" type="text" id="razonSocial" name="razonSocial" placeholder="Razon Social">
                  </div>
                  <div class="col">
                    <label for="nombreComercial">Nombre Comercial</label>
                    <input class="form-control" type="text" id="nombreComercial" name="nombreComercial" placeholder="Nombre Comercial">
                  </div>
                  <div class="col">
                    <label for="">Serie de Comprobante</label>
                    <input class="form-control" type="text" id="serieComprobante" name="serieComprobante" placeholder="Serie de Comprobante">
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-6">
                    <label for="tipoNegocio">Direccion Empresa</label>
                    <input class="form-control" type="text" id="direccionEmpresa" name="direccionEmpresa" placeholder="Direccion Empresa">
                  </div>
                  <div class="col-3">
                    <label for="razonSocial">Telefono</label>
                    <input class="form-control" type="text" id="telefonoEmpresa" name="telefonoEmpresa" placeholder="Telefono">
                  </div>
                  <div class="col-3">
                    <label for="nombreComercial">Email</label>
                    <input class="form-control" type="text" id="emailEmpresa" name="emailEmpresa" placeholder="Email de la Empresa">
                  </div>
                </div> -->
            </div>
            <div class="card-footer text-muted text-end">
                <!-- <button type="button" class="btn btn-danger">Cancelar</button> -->
                <button type="button" id="btnGenerarContrato" class="btn btn-success" disabled>Generar</button>
            </div>
        </div>
    </div>

    <!-- Modal Agregar Cliente-->
    <div class="modal fade" id="modalAgregarCliente" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <h4>Cliente</h4>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <input name="nroDocumento" id="nroDocumento" type="text" class="form-control border border-danger"
                                       placeholder="Nro de Documento" aria-label="Nro de Documento"
                                       onkeypress="return validarInputSoloNumeros(event);">
                                <button class="btn btn-primary" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                                          style="display: none;" id="loaderDni"></span>
                                    <i class="fas fa-search" style="display: block;" id="searchDni"></i>
                                    <span class="visually-hidden">Loading...</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="nombreCliente" class="form-control border border-danger"
                                   placeholder="Nombre legal del cliente" aria-label="nombreCliente"
                                   name="nombreProveedor" disabled>
                        </div>
                    </div>
                    <div class="row mb-3" id="divNombreComercial" style="display: none">
                        <div class="col">
                            <input type="text" id="nombreComercial" class="form-control"
                                   placeholder="Nombre comercial del cliente" aria-label="nombreComercial"
                                   name="nombreComercial">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="celuCliente" class="form-control border border-danger" placeholder="Celular Cliente"
                                   aria-label="celuCliente" name="celuCliente"
                                   onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                        <div class="col">
                            <input type="text" id="emailCliente" class="form-control" placeholder="Email Cliente"
                                   aria-label="emailCliente" name="emailCliente">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="telfCliente" class="form-control" placeholder="Telefono Cliente"
                                   aria-label="telfCliente" name="telfCliente"
                                   onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                        <div class="col">
                            <select id="idDepartamento" class="form-select form-select-sm border border-danger"
                                    aria-label=".form-select-sm example" name="idDepartamento">
                                <option value='0'>Departamento</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <select id="idProvincia" class="form-select form-select-sm border border-danger"
                                    aria-label=".form-select-sm example" name="idProvincia" disabled>
                                <option value='0' selected>Provincias</option>
                            </select>
                        </div>
                        <div class="col">
                            <select id="idDistrito" class="form-select form-select-sm border border-danger"
                                    aria-label=".form-select-sm example" name="idDistrito" disabled>
                                <option value='0' selected>Distritos</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="direcCliente" class="form-control border border-danger"
                                   placeholder="Direccion del Cliente" aria-label="direcCliente" name="direcCliente">
                        </div>
                    </div>
                    <h4>Contacto</h4>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="nombreContactoProv" class="form-control border border-danger"
                                   placeholder="Nombres y Apellidos del Contacto" aria-label="nombreContactoProv"
                                   name="nombreContactoProv">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" id="telfContactoProv" class="form-control border border-danger"
                                   placeholder="Celular del Contacto" aria-label="telfContactoProv"
                                   name="nombreContactoProv" onkeypress="return validarInputSoloNumeros(event);">
                        </div>
                        <div class="col">
                            <input type="text" id="emailContactoProv" class="form-control"
                                   placeholder="Email del Contacto" aria-label="emailContactoProv"
                                   name="nombreContactoProv">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnGuardarCliente" class="btn btn-success" disabled>Guardar</button>
                </div>
            </div>
        </div>
    </div>
<?php require_once('../views/layout/footer.php'); ?>