<?php
require_once('../views/layout/header.php');
require_once('../helpers/utils.php');
$mesAct = date('F');
$mesEsp = Utils::mesEspañol($mesAct)
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header mt-2"> <!-- de <b><?= $mesEsp ?></b> -->
            <h3>Pensiones del mes</h3>
        </div>
        <div class="card-body text-center">
            <table id="pensionesDataTable" class="display table table-hover text-center mb-4 table-responsive"
                   style="width: 100%;">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Contacto</th>
                    <th scope="col" style="width:8%">Celular</th>
                    <th scope="col">F. Emision</th>
                    <th scope="col">F. Vencimiento</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Estado</th>
                    <th scope="col" style="width: 2%">Dias Vencidos</th>
                    <th scope="col" style="width:10%">Opciones</th>
                </tr>
                </thead>
                <tbody id="tbody" style="font-size: 14px;">

                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted text-end">
          <!-- <?php echo "<b>" . date("d") . " de " . date("M") . " de " . date("Y"); ?> -->
            <p class="text-danger"><b>TOTAL: S/ <span id="pagoTotal"></span></b></p>
        </div>
    </div>
</div>
<?php require_once('../views/layout/footer.php'); ?>

<!-- Modal de Anular Pensiones-->
<div class="modal fade" id="modalAnularPension" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anular Pension</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Motivo de Anulacion o Exoneracion"
                              id="motivoAnulacionPension"></textarea>
                    <label for="motivoAnulacionPension">Motivo de anulacion o exoneracion</label>
                    <input type="hidden" name="idPension" id="idPension">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnAnularPension" disabled>Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de pagar pension -->
<div class="modal fade" id="modalPagarPension" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-target="#staticBackdrop">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <i class="fas fa-cash-register me-4 ms-2 text-center fs-2"></i>
                        <h5 class="mt-2 text-center"><b>Pagar Pension</b></h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                <!-- ************ SERVICIO *************** -->
                <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <label for="servicio" class="form-label mb-0" style="font-size: 14px">Servicio</label>
                            <input type="text" class="form-control" id="servicio" name="servicio" disabled>
                        </div>
                    </div>
                </div>
                <!-- ************ CLIENTE *************** -->
                <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <label for="cliente" class="form-label mb-0"  style="font-size: 14px">Cliente</label>
                            <input type="text" class="form-control" id="cliente" name="cliente" disabled data-nroDoc="">
                        </div>
                    </div>
                </div>
                <!-- ************ CONTACTO *************** -->
                <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <label for="contacto" class="form-label mb-0" style="font-size: 14px">Contacto</label>
                            <input type="text" class="form-control" id="contacto" name="contacto" disabled>
                        </div>
                    </div>
                </div>
                <!-- ************ COMPROBANTE A NOMBRE DE *************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="mb-2">
                            <label for="comprobanteNombreDe" class="form-label mb-0"  style="font-size: 14px">Comprobante a nombre</label>
                            <input type="text" class="form-control" id="comprobanteNombreDe" name="comprobanteNombreDe" disabled>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label for="direccion" class="form-label mb-0"  style="font-size: 14px">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>
                    </div>
                </div>
                <!-- ************ MORA + RECONEXION + MEDIO DE PAGO + MONTO TOTAL A PAGAR *************** -->
                <div class="row">
                    <!-- ### comprobante ### -->
                    <div class="mb-2 col-6">
                        <label for="comprobante" class="form-label mb-0" style="font-size: 14px">Comprobante</label>
                        <select class="form-select" aria-label="Default select example" id="comprobante" name="comprobante">
                            <option value="ticket">Ticket</option>
                            <option value="boleta">Boleta</option>
                            <option value="factura">Factura</option>
                        </select>
                    </div>
                    <div class="mb-2 col-6">
                        <label>DNI cliente</label>
                        <div class="input-group mb-3">
                            <input name="nroDocClientePaga" id="nroDocClientePaga" type="text" class="form-control" placeholder="Nro de Documento" aria-label="Nro de Documento" onkeypress="return validarInputSoloNumeros(event);">
                            <button class="btn btn-primary" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="loaderDni"></span>
                                <i class="fas fa-search" style="display: block;" id="searchDni"></i>
                                <span class="visually-hidden">Loading...</span>
                            </button>
                        </div>
                    </div>
                    <!-- ### mora ### -->
                    <div class="mb-2 col-6">
                        <label for="mora" class="form-label mb-0" style="font-size: 14px">Mora</label>
                        <select class="form-select" aria-label="Default select example" id="mora" name="mora">
                            <option value="no">No</option>
                            <option value="si">Si</option>
                        </select>
                    </div>
                    <div class="mb-2 col-6" id="divMontoMora" style="display: none">
                        <label for="basic-url" class="form-label mb-0" for="montoMora" style="font-size: 14px">Monto Mora</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text fw-bold bg-info text-white">S/.</span>
                            <input type="text" class="form-control" id="montoMora" name="montoMora" placeholder="0.00">
                        </div>
                    </div>
                    <!-- ### reconexion ### -->
                    <div class="mb-2 col-6">
                        <label for="reconexion" class="form-label mb-0" style="font-size: 14px">Reconexion</label>
                        <select class="form-select" aria-label="Default select example" id="reconexion" name="reconexion">
                            <option value="no">No</option>
                            <option value="si">Si</option>
                        </select>
                    </div>
                    <div class="mb-2 col-6" id="divMontoReconexion" style="display: none">
                        <label for="basic-url" class="form-label mb-0" for="montoReconexion" style="font-size: 14px">Monto Reconexion</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text fw-bold bg-info text-white">S/.</span>
                            <input type="text" class="form-control" id="montoReconexion" name="montoReconexion" placeholder="0.00">
                        </div>
                    </div>
                    <!-- ### medio de pago ### -->
                    <div class="col-6">
                        <label for="tipoPago" class="form-label mb-0" style="font-size: 14px">Medio Pago</label>
                        <select class="form-select" aria-label="Default select example" id="tipoPago" name="tipoPago">
                            <option value="0">-----------</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="deposito">Deposito</option>
                            <option value="yape">Yape</option>
                            <option value="transferencia">Transferencia</option>
                            <option value="tarjeta">Tarjeta</option>
                            <option value="plin">Plin</option>
                        </select>
                    </div>
                    <div class="mb-2 col-6" id="divBanco" style="display: none">
                        <label for="banco" class="form-label mb-0" style="font-size: 14px">Banco</label>
                        <select class="form-select" aria-label="Default select example" id="banco" name="banco">
                            <option value="0">Seleccione banco</option>
                            <option value="BCP">BCP</option>
                            <option value="BBVA">BBVA</option>
                            <option value="INTERBANK">INTERBANK</option>
                            <option value="INTERBANK">SCOTIABANK</option>
                        </select>
                    </div>
                </div>
                <!-- ************ MONTO RECIBIDO - NUMERO DE OPERACION ************** -->
                <div class="row">
                    <div class="mb-2 col-6">
                        <label for="basic-url" class="form-label mb-0" for="montoRecibido" style="font-size: 14px">Monto Recibido</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text fw-bold bg-info text-white">S/.</span>
                            <input type="text" class="form-control" style="background-color: #0dcaf047;"
                                   id="montoRecibido" name="montoRecibido" placeholder="0.00">
                        </div>
                    </div>
                    <div class="mb-2 col-6">
                        <label for="basic-url" class="form-label mb-0" for="nroOperacion" style="font-size: 14px">N° de Operacion</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nroOperacion" name="nroOperacion" placeholder="0000158">
                        </div>
                    </div>
                </div>
                <!-- ************ INFO DE PAGO *************** -->
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="montoPago" class="form-label mb-0" style="font-size: 14px">A Pagar</label>
                            <input type="text" class="form-control" id="montoPago" name="montoPago" disabled>
                            <input type="hidden" class="form-control" id="precio" name="precio" disabled>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="cambioVuelto" class="form-label mb-0" style="font-size: 14px">Vuelto</label>
                            <input type="text" class="form-control" id="cambioVuelto" name="cambioVuelto" disabled placeholder="0.00">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCerrarModalPagar" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Pagar</button> -->
                <button type="submit" id="btnPagar" class="btn bg-success fw-bold" style="color: white;"><i
                            class="fas fa-file-invoice-dollar fs-5 me-2" style="color: wheat;"></i>Cobrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Abrir Caja -->
<div class="modal fade" id="modalAbrirCaja" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="staticBackdropLabel"><i
                            class="fs-2 me-2 fas fa-cash-register"></i>Aperturar Caja</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <p class="text-danger text-center">NECESITA ABRIR CAJA ANTES DE EMPEZAR A COBRAR LAS PENSIONES</p>
                    <label for="montoCajaApertura" class="form-label text-center">Monto de Inicio</label>
                    <input class="form-control form-control-lg" id="montoCajaApertura" type="text" placeholder="S/"
                           name="montoCajaApertura" onkeypress="return validarInputSoloNumeros(event);">
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnNoAbrirCaja" type="button" class="btn btn-warning">No abrir</button>
                <button id="btnAbrirCaja" type="button" class="btn btn-success" disabled>Abrir</button>
                <!-- <a href="http://www.soporteycobranza.sigefac.com/views/home.php" id="btnNoAbrirCaja" class="btn btn-warning">No abrir</a> -->
            </div>
        </div>
    </div>
</div>