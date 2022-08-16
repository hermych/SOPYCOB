<?php
session_start();
if(isset($_SESSION['identity'])) {
  require_once('../views/layout/header.php');
  ?>
    <div class="container">
        <h1 style="border-bottom: 1px dashed black; padding-bottom: 10px">Bienvenido a Sistema de Soporte y Cobranza</h1>
        <h3 class="py-3">A donde vamos <b><?= ($_SESSION['identity']->{'nombre'}); ?></b>
            <b><?= ($_SESSION['identity']->{'apellido'}); ?></b></h3>
        <div class="row pt-5">
            <div class="col-6">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- ##### DASHBOARD ###### -->
                  <?php if ($_SESSION['DS'] || $_SESSION['DC'] || $_SESSION['DCy']) : ?>
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne">
                              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseOne" aria-expanded="false"
                                      aria-controls="flush-collapseOne">
                                  DASHBOARDS
                              </button>
                          </h2>
                          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                               data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">
                                  <div class="list-group">
                                    <?php if ($_SESSION['DS']) : ?>
                                        <a href="../controllers/dashSoporteController.php?method=dashSoporte"
                                           class="list-group-item list-group-item-action">Soporte</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['DC']) : ?>
                                        <a href="../controllers/dashCobranzaController.php?method=dashCobranza"
                                           class="list-group-item list-group-item-action">Cobranza</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['DCy']) : ?>
                                        <a href="../controllers/dashComunityController.php?method=dashComunity"
                                           class="list-group-item list-group-item-action">Comunity Manager</a>
                                    <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                    <!-- CLIENTES -->
                  <?php if ($_SESSION['CL']) : ?>
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingTwo">
                              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                      aria-controls="flush-collapseTwo">
                                  CLIENTES
                              </button>
                          </h2>
                          <div id="flush-collapseTwo" class="accordion-collapse collapse"
                               aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">
                                  <div class="list-group">
                                      <a href="../controllers/ClientesController.php?method=clientes"
                                         class="list-group-item list-group-item-action">Clientes</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                    <!-- ADMINISTRADOR COBRANZA -->
                  <?php if ($_SESSION['PS'] || $_SESSION['CS'] || $_SESSION['SE']) : ?>
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingThree">
                              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseThree" aria-expanded="false"
                                      aria-controls="flush-collapseThree">
                                  ADMINISTRADOR COBRANZA
                              </button>
                          </h2>
                          <div id="flush-collapseThree" class="accordion-collapse collapse"
                               aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">
                                  <div class="list-group">
                                    <?php if ($_SESSION['PS']) : ?>
                                        <a href="../controllers/ProveedoresController.php?method=proveedores"
                                           class="list-group-item list-group-item-action">Proveedores</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['CS']) : ?>
                                        <a href="../controllers/CategoriasController.php?method=categorias"
                                           class="list-group-item list-group-item-action">Categorias Servicios</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['SE']) : ?>
                                        <a href="../controllers/ServiciosController.php?method=servicios"
                                           class="list-group-item list-group-item-action">Servicios</a>
                                    <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                    <!-- ADMINSITRADOR SOPORTE -->
                  <?php if ($_SESSION['EP'] || $_SESSION['PR']) : ?>
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingFour">
                              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseFour" aria-expanded="false"
                                      aria-controls="flush-collapseFour">
                                  ADMINISTRADOR SOPORTE
                              </button>
                          </h2>
                          <div id="flush-collapseFour" class="accordion-collapse collapse"
                               aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">
                                  <div class="list-group">
                                    <?php if ($_SESSION['EP']) : ?>
                                        <a href="../controllers/EstadosController.php?method=estados"
                                           class="list-group-item list-group-item-action">Estados</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['PR']) : ?>
                                        <a href="../controllers/ProcesosController.php?method=procesos"
                                           class="list-group-item list-group-item-action">Soporte</a>
                                    <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                    <!-- CAJA -->
                  <?php if ($_SESSION['AC'] || $_SESSION['HC']): ?>
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingFive">
                              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseFive" aria-expanded="false"
                                      aria-controls="flush-collapseFive">
                                  CAJA
                              </button>
                          </h2>
                          <div id="flush-collapseFive" class="accordion-collapse collapse"
                               aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">
                                  <div class="list-group">
                                    <?php if ($_SESSION['AC']) : ?>
                                        <a href="../controllers/CajaController.php?method=admiCaja"
                                           class="list-group-item list-group-item-action">Administrar</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['HC']) : ?>
                                        <a href="../controllers/CajaController.php?method=historial"
                                           class="list-group-item list-group-item-action">Historial</a>
                                    <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                    <!-- PAGOS -->
                  <?php if ($_SESSION['CO'] || $_SESSION['PEN'] || $_SESSION['CSE']) : ?>
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingSix">
                              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseSix" aria-expanded="false"
                                      aria-controls="flush-collapseSix">
                                  PAGOS
                              </button>
                          </h2>
                          <div id="flush-collapseSix" class="accordion-collapse collapse"
                               aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                              <div class="accordion-body">
                                  <div class="list-group">
                                    <?php if ($_SESSION['CO']) : ?>
                                        <a href="../controllers/ContratosController.php?method=contratos"
                                           class="list-group-item list-group-item-action">Realizar Contratos</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['PEN']) : ?>
                                        <a href="../controllers/PensionesController.php?method=pensionesMes"
                                           class="list-group-item list-group-item-action">Cobrar Pensiones del Mes</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['CSE']) : ?>
                                        <a href="../controllers/PensionesController.php?method=clienteServicio"
                                           class="list-group-item list-group-item-action">Servicios x Cliente</a>
                                    <?php endif; ?>
                                      <a href="../controllers/PensionesController.php?method=pagosRealizadosView"
                                         class="list-group-item list-group-item-action">Pagos Realizados Hoy</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                </div>
            </div>
            <div class="col-6">
                <div class="accordion accordion-flush" id="accordionFlushExample2">
                    <!-- COMPROBANTES -->
                  <?php if ($_SESSION['TC'] || $_SESSION['SC']) : ?>
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingUno">
                              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseUno" aria-expanded="false"
                                      aria-controls="flush-collapseUno">
                                  COMPROBANTES
                              </button>
                          </h2>
                          <div id="flush-collapseUno" class="accordion-collapse collapse" aria-labelledby="flush-headingUno"
                               data-bs-parent="#accordionFlushExample2">
                              <div class="accordion-body">
                                  <div class="list-group">
                                    <?php if ($_SESSION['TC']) : ?>
                                        <a href="../controllers/ComprobantesController.php?method=comprobantes"
                                           class="list-group-item list-group-item-action">Tipos Comprobantes</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['SC']) : ?>
                                        <a href="../controllers/TirajesController.php?method=tirajes"
                                           class="list-group-item list-group-item-action">Series Comprobantes</a>
                                    <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                    <!-- USUARIOS -->
                  <?php if ($_SESSION['identity']->{'codRol'} == 'AG' || $_SESSION['CA'] || $_SESSION['US'] || $_SESSION['PER'])  : ?>
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingDos">
                              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseDos" aria-expanded="false"
                                      aria-controls="flush-collapseDos">
                                  PERSONAL
                              </button>
                          </h2>
                          <div id="flush-collapseDos" class="accordion-collapse collapse" aria-labelledby="flush-headingDos"
                               data-bs-parent="#accordionFlushExample2">
                              <div class="accordion-body">
                                  <div class="list-group">
                                    <?php if ($_SESSION['CA']) : ?>
                                        <a href="../controllers/CargosController.php?method=cargos"
                                           class="list-group-item list-group-item-action">Cargos</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['US']) : ?>
                                        <a href="../controllers/UsuarioController.php?method=principal"
                                           class="list-group-item list-group-item-action">Usuarios</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['PER']) : ?>
                                        <a href="../controllers/PermisosController.php?method=permisos"
                                           class="list-group-item list-group-item-action">Usuarios y Permisos</a>
                                    <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                    <!-- EMPRESA -->
                  <?php if ($_SESSION['identity']->{'codRol'} == 'AG' || $_SESSION['DE'] || $_SESSION['SU']) : ?>
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingCuatro">
                              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseCuatro" aria-expanded="false"
                                      aria-controls="flush-collapseCuatro">
                                  EMPRESA
                              </button>
                          </h2>
                          <div id="flush-collapseCuatro" class="accordion-collapse collapse"
                               aria-labelledby="flush-headingCuatro"
                               data-bs-parent="#accordionFlushExample2">
                              <div class="accordion-body">
                                  <div class="list-group">
                                    <?php if ($_SESSION['DE']) : ?>
                                        <a href="../controllers/EmpresaController.php?method=datosGenerales"
                                           class="list-group-item list-group-item-action">Datos de la Empresa</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['SU']) : ?>
                                        <a href="../controllers/SucursalController.php?method=sucursales"
                                           class="list-group-item list-group-item-action">Sucursales</a>
                                    <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                    <!-- SOPORTE -->
                  <?php if ($_SESSION['TS'] || $_SESSION['SS'] || $_SESSION['DBS'] || $_SESSION['DBS']) : ?>
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingCinco">
                              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseCinco" aria-expanded="false"
                                      aria-controls="flush-collapseCinco">
                                  SOPORTE
                              </button>
                          </h2>
                          <div id="flush-collapseCinco" class="accordion-collapse collapse"
                               aria-labelledby="flush-headingCinco"
                               data-bs-parent="#accordionFlushExample2">
                              <div class="accordion-body">
                                  <div class="list-group">
                                    <?php if ($_SESSION['TS']) : ?>
                                        <a href="../controllers/ticketSopController.php?method=ticketSop"
                                           class="list-group-item list-group-item-action">Ticket - Incidencia</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['SOI']) : ?>
                                        <a href="../controllers/InstalacionController.php?method=porInstalar"
                                           class="list-group-item list-group-item-action">Realizar Instalaciones</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['SS']) : ?>
                                        <a href="../controllers/ServiciosController.php?method=suspenderSistemas"
                                           class="list-group-item list-group-item-action">Suspender Sistema</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['DBS']) : ?>
                                        <a href="../controllers/ServiciosController.php?method=darBajaSistemas"
                                           class="list-group-item list-group-item-action">Eliminar Sistema</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['SOI']) : ?>
                                        <a href="../controllers/InstalacionController.php?method=instalacionesRealizadas"
                                           class="list-group-item list-group-item-action">Instalaciones Realizadas</a>
                                    <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                    <!-- COMMUNITY MANAGER -->
                  <?php if ($_SESSION['SI'] || $_SESSION['CDS'] || $_SESSION['AS'] || $_SESSION['AGI']) : ?>
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingSeis">
                              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseSeis" aria-expanded="false"
                                      aria-controls="flush-collapseSeis">
                                  COMUNITY MANAGER
                              </button>
                          </h2>
                          <div id="flush-collapseSeis" class="accordion-collapse collapse"
                               aria-labelledby="flush-headingSeis"
                               data-bs-parent="#accordionFlushExample2">
                              <div class="accordion-body">
                                  <div class="list-group">
                                    <?php if ($_SESSION['SI']) : ?>
                                        <a href="../controllers/ConsultasCMController.php?method=consultasCM"
                                           class="list-group-item list-group-item-action">Solicitud de Informacion</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['CDS']) : ?>
                                        <a href="../controllers/ControlSolicController.php?method=demosYCierres"
                                           class="list-group-item list-group-item-action">Control de Atencion al
                                            Cliente</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['AS']) : ?>
                                        <a href="../controllers/InstalacionController.php?method=altaSistemas"
                                           class="list-group-item list-group-item-action">Solicitar Instalacion</a>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['AGI']) : ?>
                                        <a href="../controllers/InstalacionController.php?method=instalaciones"
                                           class="list-group-item list-group-item-action">Agendar Instalaciones</a>
                                    <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                    <!-- REPORTES -->
                  <?php if ($_SESSION['identity']->{'codRol'} == 'AG' || $_SESSION['identity']->{'codRol'} == 'AC' || $_SESSION['identity']->{'codRol'} == 'AS'|| $_SESSION['identity']->{'codRol'} == 'ACO') : ?>
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingSeis">
                              <button class="fw-bold accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                      data-bs-target="#flush-collapseSiete" aria-expanded="false"
                                      aria-controls="flush-collapseSiete">
                                  REPORTES
                              </button>
                          </h2>
                          <div id="flush-collapseSiete" class="accordion-collapse collapse"
                               aria-labelledby="flush-headingSeis"
                               data-bs-parent="#accordionFlushExample2">
                              <div class="accordion-body">
                                  <div class="list-group">
                                      <a href="../controllers/ReportesViewController.php?method=pagosVigentes" class="list-group-item list-group-item-action">Pagos Vigentes</a>
                                      <a href="../controllers/ReportesViewController.php?method=pagosRealizados" class="list-group-item list-group-item-action">Pagos Realizados</a>
                                      <a href="../controllers/ReportesViewController.php?method=pagosAnuales"" class="list-group-item list-group-item-action">Pagos Anuales</a>
                                      <a href="../controllers/ReportesViewController.php?method=pagosPendientesVencidos"" class="list-group-item list-group-item-action">Pagos Pendientes Vencidos</a>
                                      <a href="../controllers/ReportesViewController.php?method=pagosVencidos" class="list-group-item list-group-item-action">Pagos Realizados Vencidos</a>
                                      <a href="../controllers/ReportesViewController.php?method=serviciosSuspendidos" class="list-group-item list-group-item-action">Servicios Suspendidos</a>
                                      <a href="../controllers/ReportesViewController.php?method=bajaServicios" class="list-group-item list-group-item-action">Bajas de Servicios</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <center>
                <div class="col">
                    <img width="10%" src="../assets/image/logo_sigefac.png">
                </div>
            </center>
        </div>
    </div>
  <?php
  require_once('../views/layout/footer.php');
} else {
  header("Location:../sigefac.php");
} ?> 
