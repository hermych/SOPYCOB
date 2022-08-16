<?php
$porciones = explode("?", $_SERVER["REQUEST_URI"]);
if (count($porciones) > 1) {
  $porciones2 = explode("=", $porciones[1]);
  if ($porciones2[1] == 'categorias') {
    $title = 'Categorias';
  } elseif ($porciones2[1] == 'principal') {
    $title = 'Usuarios';
  } elseif ($porciones2[1] == 'proveedores') {
    $title = 'Proveedores';
  } elseif ($porciones2[1] == 'cargos') {
    $title = 'Cargos';
  } elseif ($porciones2[1] == 'permisos') {
    $title = 'Permisos';
  } elseif ($porciones2[1] == 'procesos') {
    $title = 'Procesos';
  } elseif ($porciones2[1] == 'estados') {
    $title = 'Estados';
  } elseif ($porciones2[1] == 'servicios') {
    $title = 'Servicios';
  } elseif ($porciones2[1] == 'clientes') {
    $title = 'Clientes';
  } elseif ($porciones2[1] == 'comprobantes') {
    $title = 'Comprobantes';
  } elseif ($porciones2[1] == 'tirajes') {
    $title = 'Tirajes';
  } elseif ($porciones2[1] == 'contratos') {
    $title = 'Realizar Contratos';
  } elseif ($porciones2[1] == 'pensionesMes') {
    $title = 'Pensiones del Mes';
  } elseif ($porciones2[1] == 'consultasCM') {
    $title = 'Solicitud de Informacion';
  } elseif ($porciones2[1] == 'demosYCierres') {
    $title = 'Demostraciones y Cierres';
  } elseif ($porciones2[1] == 'dashSoporte') {
    $title = 'Dashboard Soporte';
  } elseif ($porciones2[1] == 'dashCobranza') {
    $title = 'Dashboard Cobranza';
  } elseif ($porciones2[1] == 'dashComunity') {
    $title = 'Dashboard Comunity Manager';
  } elseif ($porciones2[1] == 'ticketSop') {
    $title = 'Ticket Soporte';
  } elseif ($porciones2[1] == 'suspenderSistemas') {
    $title = 'Suspenciones de Sistemas';
  } elseif ($porciones2[1] == 'darBajaSistemas') {
    $title = 'Dar de Baja Sistemas';
  } elseif ($porciones2[1] == 'admiCaja') {
    $title = 'Administrar Caja';
  } elseif ($porciones2[1] == 'historial') {
    $title = 'Historial Caja';
  } elseif ($porciones2[1] == 'datosGenerales') {
    $title = 'Datos Generales';
  } elseif ($porciones2[1] == 'clienteServicio') {
    $title = 'Clientes x Servicio';
  } elseif ($porciones2[1] == 'sucursales') {
    $title = 'Sucursales';
  } elseif ($porciones2[1] == 'pensionesXFecha') {
    $title = 'Reporte Pensiones';
  } elseif ($porciones2[1] == 'ticketsAtendidos') {
    $title = 'Reporte de Tickets';
  } elseif ($porciones2[1] == 'pagosVigentes') {
    $title = 'Pagos Vigentes';
  } elseif ($porciones2[1] == 'pagosRealizados') {
    $title = 'Pagos Realizados';
  } elseif ($porciones2[1] == 'pagosAnulados') {
    $title = 'Pagos Anulados';
  } elseif ($porciones2[1] == 'pagosAnuales') {
    $title = 'Pagos Anuales';
  } elseif ($porciones2[1] == 'pagosVencidos') {
    $title = 'Pagos Realizados Vencidos';
  } elseif ($porciones2[1] == 'pagosPendientesVencidos') {
    $title = 'Pagos Pendientes';
  } elseif ($porciones2[1] == 'serviciosSuspendidos') {
    $title = 'Servicios Suspendidos';
  } elseif ($porciones2[1] == 'bajaServicios') {
    $title = 'Servicios dados de Baja';
  } elseif ($porciones2[1] == 'capacitaciones') {
    $title = 'Capacitaciones';
  } elseif ($porciones2[1] == 'altaSistemas') {
    $title = 'Alta de Sistemas';
  } elseif ($porciones2[1] == 'instalaciones') {
    $title = 'Agendar Instalaciones';
  } elseif ($porciones2[1] == 'porInstalar') {
    $title = 'Instalaciones Pendientes';
  } elseif ($porciones2[1] == 'misSolicInsta') {
    $title = 'Mis Solicitudes de Instalacion';
  } elseif ($porciones2[1] == 'pagosRealizadosView') {
    $title = 'Pagos Realizados';
  } elseif ($porciones2[1] == 'equiposG') {
    $title = 'Gestion de Equipos';
  } elseif ($porciones2[1] == 'sistemasG') {
    $title = 'Gestion de Sistemas';
  } elseif ($porciones2[1] == 'pautasG') {
    $title = 'Gestion de Pautas';
  }
} else {
  $title = 'Home';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../assets/image/favicon-100x100.png">
  <!-- LINKS DE JS DE BOOTRSTRAP 5.* -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <!-- LINKS DE JS DE BOOTRSTRAP 4.* -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <!-- ETIQUETA TITLE -->
  <title><?= $title ?></title>
  <!-- CSS Link -->
  <link rel="stylesheet" href="../assets/css/home.css">
  <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Font Awesome Link -->
  <script src="https://kit.fontawesome.com/ec57de0117.js" crossorigin="anonymous"></script>
  <!-- DATATABLE Link -->
  <link rel="stylesheet" href="../assets/css/librerias/datatables.min.css">
  <!-- SWEET ALERT 2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- SELECT2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body id="body">
  <div class="sidebar close">
    <div class="logo-details">
      <a href="../views/home.php" style="margin-top: 50px; text-decoration: none;">
        <i class="fas fa-building"></i>
        <span class="logo_name">SIGEFAC</span>
      </a>
    </div>
    <ul class="nav-links">
      <!-- DASHBOARDS -->
      <?php if ($_SESSION['DS'] || $_SESSION['DC'] || $_SESSION['DCy']) : ?>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="fas fa-chart-line"></i>
              <span class="link_name">Dashboards</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Dashboards</a></li>
            <?php if ($_SESSION['DS']) : ?>
              <li><a href="../controllers/dashSoporteController.php?method=dashSoporte">Soporte</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['DC']) : ?>
              <li><a href="../controllers/dashCobranzaController.php?method=dashCobranza">Cobranza</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['DCy']) : ?>
              <li><a href="../controllers/dashComunityController.php?method=dashComunity">Community Manager</a></li>
            <?php endif; ?>
          </ul>
        </li>
      <?php endif; ?>
      <!-- CLIENTES -->
      <?php if ($_SESSION['CL']) : ?>
        <li>
          <a href="../controllers/ClientesController.php?method=clientes">
            <i class="fas fa-hand-holding-usd"></i>
            <span class="link_name">Clientes</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="../controllers/ClientesController.php?method=clientes">Clientes</a></li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- ADMINISTRADOR COBRANZA -->
      <?php if ($_SESSION['PS'] || $_SESSION['CS'] || $_SESSION['SE']) : ?>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="fas fa-calculator"></i>
              <span class="link_name">Administrar Cobranza</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Administrar Cobranza</a></li>
            <?php if ($_SESSION['PS']) : ?>
              <li><a href="../controllers/ProveedoresController.php?method=proveedores">Proveedores</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['CS']) : ?>
              <li><a href="../controllers/CategoriasController.php?method=categorias">Categorias Servicios</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['SE']) : ?>
              <li><a href="../controllers/ServiciosController.php?method=servicios">Servicios</a></li>
            <?php endif; ?>
          </ul>
        </li>
      <?php endif; ?>
      <!-- CAJA -->
      <?php if ($_SESSION['AC'] || $_SESSION['HC']) : ?>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="fas fa-cash-register"></i>
              <span class="link_name">Caja</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Caja</a></li>
            <?php if ($_SESSION['AC']) : ?>
              <li><a href="../controllers/CajaController.php?method=admiCaja">Administrar Caja</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['HC']) : ?>
              <li><a href="../controllers/CajaController.php?method=historial">Historial de Caja</a></li>
            <?php endif; ?>
          </ul>
        </li>
      <?php endif; ?>
      <!-- PAGOS -->
      <?php if ($_SESSION['CO'] || $_SESSION['PEN'] || $_SESSION['CSE']) : ?>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="fas fa-money-bill-wave"></i>
              <span class="link_name">Pagos</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Pagos</a></li>
            <?php if ($_SESSION['CO']) : ?>
              <li><a href="../controllers/ContratosController.php?method=contratos">Realizar Contratos</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['PEN']) : ?>
              <li><a href="../controllers/PensionesController.php?method=pensionesMes">Cobrar Pensiones del Mes</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['CSE']) : ?>
              <li><a href="../controllers/PensionesController.php?method=clienteServicio">Cliente x Servicios</a></li>
            <?php endif; ?>
            <li><a href="../controllers/PensionesController.php?method=pagosRealizadosView">Pagos Realizados</a></li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- ADMINSITRADOR SOPORTE -->
      <?php if ($_SESSION['EP'] || $_SESSION['PR']) : ?>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="fas fa-user-cog"></i>
              <span class="link_name">Administrar Soporte</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Administrar Soporte</a></li>
            <?php if ($_SESSION['EP']) : ?>
              <li><a href="../controllers/EstadosController.php?method=estados">Estados</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['PR']) : ?>
              <li><a href="../controllers/ProcesosController.php?method=procesos">Procesos</a></li>
            <?php endif; ?>
          </ul>
        </li>
      <?php endif; ?>
      <!-- SOPORTE -->
      <?php if ($_SESSION['TS'] || $_SESSION['SS'] || $_SESSION['DBS'] || $_SESSION['SOI']) : ?>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="fas fa-tools"></i>
              <span class="link_name">Soporte</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Soporte</a></li>
            <?php if ($_SESSION['TS']) : ?>
              <li><a href="../controllers/ticketSopController.php?method=ticketSop">Ticket</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['SOI']) : ?>
              <li><a href="../controllers/InstalacionController.php?method=porInstalar">Realizar Instalaciones</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['SS']) : ?>
              <li><a href="../controllers/ServiciosController.php?method=suspenderSistemas">Suspender Sistemas</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['DBS']) : ?>
              <li><a href="../controllers/ServiciosController.php?method=darBajaSistemas">Dar Baja Sistemas</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['SOI']) : ?>
              <li><a href="../controllers/InstalacionController.php?method=instalacionesRealizadas">Instalaciones Realizadas</a></li>
            <?php endif; ?>
          </ul>
        </li>
      <?php endif; ?>
      <!-- ADMINSITRADOR COMMUNITY MANAGER -->
      <?php if ($_SESSION['EP'] || $_SESSION['PR']) : ?>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="fas fa-users-cog"></i>
              <span class="link_name">Administrador Community</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Administrador Community</a></li>
              <li><a href="../controllers/PautasController.php?method=pautasG">Gestionar Pautas</a></li>
              <li><a href="../controllers/SistemasController.php?method=sistemasG">Gestionar Sistemas</a></li>
              <li><a href="../controllers/EquiposController.php?method=equiposG">Gestionar Equipos</a></li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- COMMUNITY MANAGER -->
      <?php if ($_SESSION['SI'] || $_SESSION['CDS'] || $_SESSION['AS'] || $_SESSION['AGI']) : ?>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="fas fa-headset"></i>
              <span class="link_name">Community Manager</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Community Manager</a></li>
            <?php if ($_SESSION['SI']) : ?>
              <li><a href="../controllers/ConsultasCMController.php?method=consultasCM">Solicitud de Informacion</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['CDS']) : ?>
              <li><a href="../controllers/ControlSolicController.php?method=demosYCierres">Control Atenion al cliente</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['AS']) : ?>
              <li><a href="../controllers/InstalacionController.php?method=altaSistemas">Solicitar Instalacion</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['AS']) : ?>
              <li><a href="../controllers/InstalacionController.php?method=misSolicInsta">Mis solicitudes de Instalacion</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['AGI']) : ?>
              <li><a href="../controllers/InstalacionController.php?method=instalaciones">Agendar Instalaciones</a></li>
            <?php endif; ?>
          </ul>
        </li>
      <?php endif; ?>
      <!-- USUARIOS -->
      <?php if ($_SESSION['CA'] || $_SESSION['US'] || $_SESSION['PER']) : ?>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="fas fa-user"></i>
              <span class="link_name">Personal</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Personal</a></li>
            <?php if ($_SESSION['CA']) : ?>
              <li><a href="../controllers/CargosController.php?method=cargos">Cargos</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['US']) : ?>
              <li><a href="../controllers/UsuarioController.php?method=principal">Usuarios</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['PER']) : ?>
              <li><a href="../controllers/PermisosController.php?method=permisos">Usuarios y Permisos</a></li>
            <?php endif; ?>
          </ul>
        </li>
      <?php endif; ?>
      <!-- AJUSTES -->
      <?php if ($_SESSION['identity']->{'codRol'} == 'AG' || $_SESSION['identity']->{'codRol'} == 'AC' || $_SESSION['identity']->{'codRol'} == 'AS') : ?>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="fas fa-cog"></i>
              <span class="link_name">AJUSTES</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Ajustes</a></li>
            <?php if ($_SESSION['TC']) : ?>
              <li><a href="../controllers/ComprobantesController.php?method=comprobantes">Tipos Comprobantes</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['SC']) : ?>
              <li><a href="../controllers/TirajesController.php?method=tirajes">Serie Comprobantes</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['DE']) : ?>
              <li><a href="../controllers/EmpresaController.php?method=datosGenerales">Datos de la Empresa</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['SU']) : ?>
              <li><a href="../controllers/SucursalController.php?method=sucursales">Sucursales</a></li>
            <?php endif; ?>
          </ul>
        </li>
      <?php endif; ?>
      <!-- REPORTES -->
      <?php if ($_SESSION['identity']->{'codRol'} == 'AG' || $_SESSION['identity']->{'codRol'} == 'AC' || $_SESSION['identity']->{'codRol'} == 'AS'  || $_SESSION['identity']->{'codRol'} == 'ACO' || $_SESSION['REP']) : ?>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="fas fa-paste"></i>
              <span class="link_name">Reportes</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Reportes</a></li>
            <li><a href="../controllers/ReportesViewController.php?method=pagosPendientesVencidos">Pagos Pendientes</a></li>
            <li><a href="../controllers/ReportesViewController.php?method=pagosVigentes">Pagos Vigentes</a></li>
            <li><a href="../controllers/ReportesViewController.php?method=pagosRealizados">Pagos Realizados</a></li>
            <li><a href="../controllers/ReportesViewController.php?method=pagosAnulados">Pagos Anulados</a></li>
            <li><a href="../controllers/ReportesViewController.php?method=pagosAnuales">Pagos Anuales</a></li>
            <li><a href="../controllers/ReportesViewController.php?method=pagosVencidos">Pagos Realizados Vencidos</a></li>
            <li><a href="../controllers/ReportesViewController.php?method=serviciosSuspendidos">Servicios Suspendidos</a></li>
            <li><a href="../controllers/ReportesViewController.php?method=bajaServicios">Bajas de Servicios</a></li>
          </ul>
        </li>
      <?php endif; ?>
      <!-- Cerrar Sesion -->
      <li>
        <div class="profile-details">
          <div class="profile-content" id="logoutImg">
            <img src="../assets/image/profile.jpg" alt="profileImg">
          </div>
          <div class="name-job">
            <div class="profile_name"><?= $_SESSION['identity']->{'nombre'} ?></div>
            <div style="font-size: 8px" class="job"><?= $_SESSION['identity']->{'rol'} ?></div>
          </div>
          <a id="logout">
            <i class='bx bx-log-out'></i>
          </a>
        </div>
      </li>
      <!-- COMPROBANTES (YA NO VA)-->
      <?php if ($_SESSION['TC'] || $_SESSION['SC']) : ?>
        <!-- <li>
              <div class="iocn-link">
                  <a href="#">
                      <i class="fas fa-file-alt"></i>
                      <span class="link_name">Comprob.</span>
                  </a>
                  <i class='bx bxs-chevron-down arrow'></i>
              </div>
              <ul class="sub-menu">
                  <li><a class="link_name" href="#">Comprobantes</a></li>
                <?php if ($_SESSION['TC']) : ?>
                    <li><a href="../controllers/ComprobantesController.php?method=comprobantes">Tipos Comprobantes</a></li>
                <?php endif; ?>
                <?php if ($_SESSION['SC']) : ?>
                    <li><a href="../controllers/TirajesController.php?method=tirajes">Serie Comprobantes</a></li>
                <?php endif; ?>
              </ul>
          </li> -->
      <?php endif; ?>
      <!-- EMPRESA (YA NO VA) -->
      <?php if ($_SESSION['DE'] || $_SESSION['SU']) : ?>
        <!-- <li>
              <div class="iocn-link">
                  <a href="#">
                      <i class="fas fa-building"></i>
                      <span class="link_name">Empresa</span>
                  </a>
                  <i class='bx bxs-chevron-down arrow'></i>
              </div>
              <ul class="sub-menu">
                  <li><a class="link_name" href="#">Empresa</a></li>
                <?php if ($_SESSION['DE']) : ?>
                    <li><a href="../controllers/EmpresaController.php?method=datosGenerales">Datos Generales</a></li>
                <?php endif; ?>
                <?php if ($_SESSION['SU']) : ?>
                    <li><a href="../controllers/SucursalController.php?method=sucursales">Sucursales</a></li>
                <?php endif; ?>
              </ul>
          </li> -->
      <?php endif; ?>
    </ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <!-- BTN HAMBURGUESA MENU -->
      <i class='bx bx-menu'></i>
    </div>