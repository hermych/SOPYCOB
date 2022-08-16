<?php
require_once('../views/layout/header.php');
?>
<div class="container-fluid" id="container">
  <div class="card">
    <div class="card-header">
      <div class="d-sm-flex justify-content-between">
        <h3 class="mt-2">Demostraciones y Cierres</h3>
      </div>
    </div>
    <div class="card-body">
      <div class="accordion" id="accordionExample">
        <!-- PROGRAMAR DEMOSTRACION -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <b>Programar Demostracion</b>
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <table id="solicLlamadaRealizadaTable" class="display table table-hover text-center mb-4" style="width: 100%;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Red Social</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Rubro</th>
                    <th scope="col">Desea Informacion</th>
                    <th scope="col">Medio Informacion</th>
                    <th scope="col">Agendar</th>
                  </tr>
                </thead>
                <tbody id="tbody" style="font-size: 15px;">

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- DEMOSTRACIONES PENDIENTES -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <b>Demostraciones Pendientes</b>
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <table id="solicDemoPendienteTable" class="display table table-hover text-center mb-4" style="width: 100%;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Rubro</th>
                    <th scope="col" style="width: 5%;">Medio Informacion</th>
                    <th scope="col" style="width: 25%;">Fecha y Hora</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody id="tbody" style="font-size: 15px;">

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- CIERRE DE VENTAS PENDIENTES -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <b>Cierre de Ventas Pendientes</b>
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <table id="cierreVentasPendientesTable" class="display table table-hover text-center mb-4" style="width: 100%;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Rubro</th>
                    <th scope="col">Medio Informacion</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody id="tbody" style="font-size: 15px;">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer text-muted text-end">
    <?php echo "<b>" . date("d") . " de " . date("M") . " de " . date("Y"); ?>
  </div>
</div>
<!-- ########## MODALES MODALES MODALES MODALES MODALES ############# -->
<!-- Agendar Demo -->
<!-- <div class="modal fade" id="modalAgendarDemo" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true"> -->
<div class="modal fade" id="modalAgendarDemo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal"></h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-7 mb-3">
            <label for="nombres" class="form-label" style="font-weight: bold;">Nombres y Apellidos</label>
            <input type="text" class="form-control" id="nombres" name="nombres" disabled>
            <input type="hidden" class="form-control" id="idSolic" name="idSolic">
          </div>
          <div class="col-5 mb-3">
            <label for="rubro" class="form-label" style="font-weight: bold;">Rubro</label>
            <input type="text" class="form-control" id="rubro" name="rubro" disabled>
          </div>
          <div class="col-6 mb-3">
            <label for="celular" class="form-label" style="font-weight: bold;">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular" disabled>
          </div>
          <div class="col-6 mb-3">
            <label for="medioEnvioInfo" class="form-label" style="font-weight: bold;">Envio de Informacion</label>
            <select class="form-select" aria-label="Default select example" id="medioEnvioInfo" name="medioEnvioInfo" disabled>
              <option value="0" selected>-- seleccionar --</option>
              <option value="wsp">Whatsapp</i></option>
              <option value="email">Correo</option>
            </select>
          </div>
          <div class="col-6 mb-3" id="divCorreo" style="display: none;">
            <label for="correoEnvio" class="form-label" style="font-weight: bold;">Correo</label>
            <input type="text" class="form-control" id="correoEnvio" name="correoEnvio" disabled>
          </div>
          <div class="col-6 mb-3" id="divTipoDemo">
            <label for="tipoDemo" class="form-label" style="font-weight: bold;">Tipo de Demo</label>
            <select class="form-select border border-danger" id="tipoDemo" name="tipoDemo">
              <option value="0" selected>Seleccione tipo Demo</option>
              <option value="remoto">Remoto</i></option>
              <option value="presencial">Presencial</option>
            </select>
          </div>
          <div class="col-6 mb-3">
            <label for="fechaDemo" class="form-label" style="font-weight: bold;">Fecha para Demo</label>
            <input type="datetime-local" class="form-control border border-danger" id="fechaDemo" name="fechaDemo">
          </div>
          <div class="col-12 mb-3" id="divObservacionEnvioInfo" style="display: none;">
            <div class="form-floating">
              <textarea class="form-control" style="height: 100px" placeholder="Leave a comment here" id="observacionEnvioInfo" name="observacionEnvioInfo" disabled></textarea>
              <label for="observacionEnvioInfo">Observacion al momento de Realizar Llamada</label>
            </div>
          </div>
          <div class="col-12 mb-3">
            <label for="correoEnvio" class="form-label" style="font-weight: bold;">Observacion Agendar o Rechazar Demostracion</label>
            <textarea class="form-control border border-danger" style="height: 100px" id="observacionAgendarDemo" name="observacionAgendarDemo"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCerrarModalAgendarDemo" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnRechazar" class="btn btn-warning" disabled>Rechazar</button>
        <button type="button" id="btnGuardar" class="btn btn-success" disabled>Agendar</button>
      </div>
    </div>
  </div>
</div>
<!-- CONFIRMAR demo realizada -->
<div class="modal fade" id="demoRealizada" tabindex="-1" aria-labelledby="demoRealizadaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="demoRealizadaLabel">Confirmar Realizacion de Demostracion</h5>
      </div>
      <div class="modal-body">
        <div class="col">
          ¿Has realizado la demostracion para: <span class="badge rounded-pill bg-info text-dark" id="nombreCliente"></span>?
          <input type="hidden" id="idClienteDemoRealizada">
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" id="btnCerrarModalDemoRealizada" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button> -->
        <button type="button" id="btnConfirmarModalDemoRealizada" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- CANCELAR  realizar demo -->
<div class="modal fade" id="modalDemoCancelada" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="demoRealizadaLabel">Cancelar demostracion programada</h5>
      </div>
      <div class="modal-body">
        Que pena, ¿Vas a cancelar la demo de: <span class="badge rounded-pill bg-info text-dark" id="nombreClienteCancela"></span>?
        <div class="form-floating mt-2">
          <textarea class="form-control border border-danger" id="motivoCancela" name="motivoCancela" id="floatingTextarea2" style="height: 100px"></textarea>
          <label for="floatingTextarea2">Motivo</label>
        </div>
        <input type="hidden" id="idClienteCancela">
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCerrarModalDemoCancelada" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnConfirmarModalDemoCancelada" class="btn btn-success" disabled>Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- REPROGRAMAR realizar demo -->
<div class="modal fade" id="modalDemoReprogramar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title">Reprogramar demostracion</h5>
      </div>
      <div class="modal-body">
        <div class="col-6 mb-3">
          <label for="fechaDemoReprogramar" class="form-label" style="font-weight: bold;">Fecha para Demo</label>
          <input type="datetime-local" class="form-control border border-danger" id="fechaDemoReprogramar" name="fechaDemoReprogramar">
        </div>
        <div class="col mb-3">
          <label class="form-label" for="motivoReprogramar" style="font-weight: bold;">Motivo para reprogramar</label>
          <textarea class="form-control border border-danger" id="motivoReprogramar" name="motivoReprogramar" style="height: 100px"></textarea>
        </div>
        <input type="hidden" id="idClienteReprogramar">
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCerrarModalDemoReprogramar" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnConfirmarModalDemoReprogramar" class="btn btn-success" disabled>Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- CONFIRMAR demo realizada -->
<div class="modal fade" id="modalCerrarVenta" tabindex="-1" aria-labelledby="demoRealizadaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center" id="demoRealizadaLabel">¡¡ FELICIDADES POR CERRAR LA VENTA !!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col mb-2">
          Cierre de ventas del cliente: <span class="badge rounded-pill bg-info text-dark" id="clienteCierreVenta" style="font-size: 1rem;"></span>
          <input type="hidden" id="idClienteCierreVenta">
        </div>
        <hr>
        <div class="col mb-3">
          <label for="nombres" class="form-label" style="font-weight: bold;">Productos Vendidos</label>
          <div class="row">
            <div class="col-6">
              <p class="mb-1">Sistemas</p>
              <div class="row ms-2">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="pos" id="pos">
                  <label class="form-check-label" for="pos">
                    Sist. Pos
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="facturador" id="facturador">
                  <label class="form-check-label" for="facturador">
                    Sist. Facturacion
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="restoEscritorio" id="restoEscritorio">
                  <label class="form-check-label" for="restoEscritorio">
                    Restobar Escritorio
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="restoWeb" id="restoWeb">
                  <label class="form-check-label" for="restoWeb">
                    Restobar Web
                  </label>
                </div>
              </div>
            </div>
            <div class="col-6">
              <p class="mb-1">Equipos</p>
              <div class="row ms-2">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="ticketera" id="ticketera">
                  <label class="form-check-label" for="ticketera">
                    Ticketera
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="allInOne" id="allInOne">
                  <label class="form-check-label" for="allInOne">
                    All In One
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="gavetaDinero" id="gavetaDinero">
                  <label class="form-check-label" for="gavetaDinero">
                    Gaveta Dinero
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="imprPortatil" id="imprPortatil">
                  <label class="form-check-label" for="imprPortatil">
                    Impresora Portatil
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="impTermica" id="impTermica">
                  <label class="form-check-label" for="impTermica">
                    Impresora Termica
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="lecCodBarras" id="lecCodBarras">
                  <label class="form-check-label" for="lecCodBarras">
                    Lector Codigo Barras
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="termPortatil" id="termPortatil">
                  <label class="form-check-label" for="termPortatil">
                    Terminal Portatil
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="miniPc" id="miniPc">
                  <label class="form-check-label" for="miniPc">
                    PC Mini
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="suministros" id="suministros">
                  <label class="form-check-label" for="suministros">
                    Suministros
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCerrarModalCierrarVenta" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnConfirmarModalCierrarVenta" class="btn btn-success">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<?php require_once('../views/layout/footer.php'); ?>