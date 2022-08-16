<?php
require_once('../views/layout/header.php');
require_once('../helpers/utils.php');
?>

<div class="container-fluid" id="container">
  <div class="card">
    <div class="card-header">
      <h2 class="mt-2">Movimiento de caja</h2>
    </div>
    <div class="card-body">
      <!-- ### MENU DE OPCIONES DE MOVIMIENTO DE CAJA ### -->
      <div class="row mb-3">
        <div class="col d-flex justify-content-end mb-3">
          <div id="btnImprimir" class="btn-group mx-2" role="group" style="display: none;">
            <button type="button" class="btn btn-danger">
              <span class="me-2"><i class="fas fa-print"></i></span> IMPRIMIR
            </button>
          </div>
          <div id="btnOpciones" class="btn-group mx-2" role="group" style="display: none;">
            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="me-2"><i class="fas fa-filter"></i></span> Opciones
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <li><a class="dropdown-item btn" data-bs-toggle="modal" data-bs-target="#modaMontoInicial"><span class="me-2"><i class="fas fa-highlighter"></i> Editar Monto Inicial</span></a></li>
              <li><a class="dropdown-item btn" id="btnModalCerrarCaja"><span class="me-2"><i class="fas fa-store-alt-slash"></i> Cerrar Caja</span></a></li>
            </ul>
          </div>
          <div id="btnMovimiento" class="btn-group" role="group" style="display: none;">
            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="me-2"><i class="fas fa-dollar-sign"></i></span> Movimiento de caja
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <li id="btnMovDevo"><a class="dropdown-item btn" data-bs-toggle="modal" data-bs-target="#modalMovCaja"><span class="me-2"><i class="fas fa-redo"></i></span>Devolucion</a></li>
              <li id="btnMovPresta"><a class="dropdown-item btn" data-bs-toggle="modal" data-bs-target="#modalMovCaja"><span class="me-2"><i class="fas fa-money-bill"></i></span>Prestamo</a></li>
              <li id="btnMovGasto"><a class="dropdown-item btn" data-bs-toggle="modal" data-bs-target="#modalMovCaja"><span class="me-2"><i class="fas fa-money-bill"></i></span>Gasto</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row mx-2 mb-3">
        <!-- ### CARD CON DATOS ### -->
        <div class="col-1"></div>
        <div class="col-4" style="border: 2px solid rgba(0,0,0,0.3);">
          <div class="row" style="border-bottom: 2px solid rgba(0,0,0,0.3);">
            <div class="col-1 my-1"><i class="fas fa-square text-dark"></i></div>
            <div class="col-7 my-1">MONTO INICIAL</div>
            <div class="col-4 my-1 text-end" id="montoInicialCard">S/. 0.00</div>
          </div>
          <div class="row" style="border-bottom: 2px solid rgba(0,0,0,0.3);">
            <div class="col-1 my-1"><i class="fas fa-square text-success"></i></div>
            <div class="col-7 my-1">INGRESOS</div>
            <div class="col-4 my-1 text-end" id="ingresoCard">S/. 0.00</div>
          </div>
          <div class="row" style="border-bottom: 2px solid rgba(0,0,0,0.3);">
            <div class="col-1 my-1"><i class="fas fa-square text-danger"></i></div>
            <div class="col-7 my-1">DEVOLUCIONES</div>
            <div class="col-4 my-1 text-end" id="devolucionCard">S/. 0.00</div>
          </div>
          <div class="row" style="border-bottom: 2px solid rgba(0,0,0,0.3);">
            <div class="col-1 my-1"><i class="fas fa-square text-warning"></i></div>
            <div class="col-7 my-1">PRÉSTAMOS</div>
            <div class="col-4 my-1 text-end" id="prestamoCard">S/. 0.00</div>
          </div>
          <div class="row" style="border-bottom: 2px solid rgba(0,0,0,0.3);">
            <div class="col-1 my-1"><i class="fas fa-square text-info"></i></div>
            <div class="col-7 my-1">GASTOS</div>
            <div class="col-4 my-1 text-end" id="gastoCard">S/. 0.00</div>
          </div>
          <div class="row" style="border-bottom: 2px solid rgba(0,0,0,0.3);">
            <div class="col-8 my-3 text-success fw-bold fs-5">INGRESOS TOTALES</div>
            <div class="col-4 my-3 text-success fw-bold fs-5 text-end" id="ingresosTotales">S/. 0</div>
          </div>
          <div class="row" style="border-bottom: 2px solid rgba(0,0,0,0.3);">
            <div class="col-8 my-3 text-danger fw-bold fs-5">EGRESOS TOTALES</div>
            <div class="col-4 my-3 text-danger fw-bold fs-5 text-end" id="egresosCard">S/. 0</div>
          </div>
          <div class="row" style="border-bottom: 2px solid rgba(0,0,0,0.3);">
            <div class="col-1 my-1"></div>
            <div class="col-7 my-3 text-dark fw-bold fs-5">SALDO</div>
            <div class="col-4 my-3 text-dark fw-bold fs-5 text-end" id="saldoCard">S/. 0</div>
          </div>
          <div class="row" style="border-bottom: 2px solid rgba(0,0,0,0.3);">
            <div class="col-1 my-1"></div>
            <div class="col-7 my-3 text-info fw-bold" style="font-size: 1rem">GANANCIA GLOBAL</div>
            <div class="col-4 my-3 text-info fw-bold text-end" id="montoSaldo" style="font-size: 1rem">S/. 0</div>
          </div>
        </div>
        <!-- ### GRAFICA DE TORTA ### -->
        <div class="col-6 px-4">
          <div class="col" style="width: 70%; margin: auto;">
            <canvas class="align-middle" id="myChart"></canvas>
          </div>
        </div>
      </div>
      <!-- TABLA DE MOVIMIENTO DE CAJA -->
      <div class="row my-5">
        <div class="col-1"></div>
        <div class="col-10">
          <div class="card" style="width: 100%;">
            <div class="card-header row">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <button type="button" class="btn ms-2" id="btnIngresos">
                    INGRESOS <span id="cantIngresos" class="badge" style="background-color: #5cb85c; font-size: 1rem;"></span>
                  </button>
                </li>
                <li class="nav-item">
                  <button type="button" class="btn ms-2" id="btnDevoluciones">
                    DEVOLUCIONES <span id="cantDevoluciones" class="badge bg-danger" style="font-size: 1rem;"></span>
                  </button>
                </li>
                <li class="nav-item">
                  <button type="button" class="btn ms-2" id="btnPrestamos">
                    PRESTAMOS <span id="cantPrestamos" class="badge bg-warning text-dark" style="font-size: 1rem;"></span>
                  </button>
                </li>
                <li class="nav-item">
                  <button type="button" class="btn ms-2" id="btnGastos">
                    GASTOS <span id="cantGastos" class="badge bg-info text-dark" style="font-size: 1rem;"></span>
                  </button>
                </li>
              </ul>
            </div>
            <div class="card-body" id="divTablaIngresos">
              <table id="tablaIngresos" class="display table table-hover text-center mb-4" style="width: 100%;">
                <thead>
                  <tr>
                    <th scope=" col">#</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Monto (S/.)</th>
                  </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
              </table>
            </div>
            <div class="card-body" id="divTablaDevolucion" style="display: none;">
              <table id="tablaDevolucion" class="display table table-hover text-center mb-4" style="width: 100%;">
                <thead>
                  <tr>
                    <th scope=" col">#</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Monto (S/.)</th>
                  </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
              </table>
            </div>
            <div class="card-body" id="divTablaPrestamo" style="display: none;">
              <table id="tablaPrestamo" class="display table table-hover text-center mb-4" style="width: 100%;">
                <thead>
                  <tr>
                    <th scope=" col">#</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Monto (S/.)</th>
                  </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
              </table>
            </div>
            <div class="card-body" id="divTablaGastos" style="display: none;">
              <table id="tablaGasto" class="display table table-hover text-center mb-4" style="width: 100%;">
                <thead>
                  <tr>
                    <th scope=" col">#</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Monto (S/.)</th>
                  </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer text-muted text-end">
      <?php echo "<b>" . date("d") . " de " . Utils::mesEspañol(date("F")) . " de " . date("Y"); ?>
    </div>
  </div>
</div>
<!-- Modal Abrir Caja -->
<div class="modal fade" id="modalAbrirCaja" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center"><i class="fs-2 me-2 fas fa-cash-register"></i>Aperturar Caja</h5>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <p class="text-danger text-center">RUERDA QUE DEBES ABRIR CAJA PARA PODER ADMINISTRARLA</p>
          <label for="montoCajaApertura" class="form-label text-center">Monto de Inicio</label>
          <input class="form-control form-control-lg" id="montoCajaApertura" type="text" placeholder="S/" name="montoCajaApertura" onkeypress="return validarInputSoloNumeros(event);">
        </div>
      </div>
      <div class="modal-footer">
        <a href="http://www.soporteycobranza.sigefac.com/views/home.php" id="btnNoAbrirCaja" class="btn btn-warning">No abrir</a>
        <button id="btnAbrirCaja" type="button" class="btn btn-success" disabled>Abrir</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Editar Monto Inicial -->
<div class="modal fade" id="modaMontoInicial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Monto Inicial</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">S/</span>
          <input id="montoInicial" name="montoInicial" type="text" class="form-control" placeholder="Ingresar nuevo monto inicial" onkeypress="return validarInputSoloNumeros(event);">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button id="btnEditarMontoInicial" type="button" class="btn btn-success" disabled>Editar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal ingresar movimiento de caja -->
<div class="modal fade" id="modalMovCaja" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ingresar nuevo movimiento de Caja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col mb-3">
          <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" id="descripcion">
        </div>
        <div class="row">
          <div class="col-5 pe-1">
            <input type="text" class="form-control" placeholder="Monto (S/.)" name="montoMov" id="montoMov" onkeypress="return validarInputSoloNumeros(event);">
          </div>
          <div class="col-7">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tipoMov" id="tipoMov" disabled>
              <option value="0" selected>Seleccion tipo de movimiento</option>
              <option value="devol">Devolucion</option>
              <option value="prest">Préstamo</option>
              <option value="gasto">Gasto</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button id="btnIngresarMov" type="button" class="btn btn-success" disabled>Editar</button>
      </div>
    </div>
  </div>
</div>
<?php require_once('../views/layout/footer.php'); ?>