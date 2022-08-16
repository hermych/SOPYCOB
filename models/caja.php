<?php
require_once "../config/db.php";

// session_start();

class Caja
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
  }

  /* ##### METODOS ###### */
  public function consultarCajaAbierta($idUsuario)
  {
    // $$$$$$$$$$ Cerrar caja $$$$$$$$$$$$$
    $fechaCierre = date('Y-m-d h:i:s');
    $consultaCerrarCajasPendientes = "UPDATE `cajas` SET `estado` = 'cerrado', fechaCierre = '$fechaCierre' WHERE estado='abierto' AND idUsuario='$idUsuario' AND DATE(fechaApertura) != CURDATE();";
    $consultarCierreCajasPendientes = $this->db->query($consultaCerrarCajasPendientes);

    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $consulta = "SELECT * FROM `cajas` WHERE idUsuario = '$idUsuario' AND idSucursal = '$idSucursal' AND estado = 'abierto';";
    $consultar = $this->db->query($consulta);
    $caja = $consultar->fetch_all(MYSQLI_ASSOC);
    return $caja;
  }

  public function abrirCaja($montoApertura)
  {
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $respuesta = false;
    // $$$$$$$$$$ Aperturar Caja $$$$$$$$$$$$$$
    $fechaApertura = date('Y-m-d h:i:s');
    $estado = 'abierto';
    $consulta = "INSERT INTO `cajas`(`fechaApertura`, `montoApertura`, `estado`, `idUsuario`, `idSucursal`) VALUES ('$fechaApertura','$montoApertura','$estado','$idUsuario','$idSucursal')";
    $consultar = $this->db->query($consulta);
    if ($consultar) {
      $respuesta = true;
    }

    return $respuesta;
  }

  public function registrarMovimientoCaja($precio, $detallePago)
  {
    $fechaActual = date('Y-m-d');
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    // ###### OBTENER ID CAJA ABIERTA ###########
    $sql_idCaja = "SELECT * FROM `cajas` WHERE estado = 'abierto' AND idUsuario = $idUsuario AND fechaApertura LIKE '%$fechaActual%';";
    $consul_sql_idCaja = $this->db->query($sql_idCaja);
    $cajaActual = ($consul_sql_idCaja->fetch_all(MYSQLI_ASSOC))[0];
    $idCaja = $cajaActual['idCaja'];

    // ############# INSERTAR REGISTRO DE MOVIMIENTO DE CAJA ###########
    $fechaMovimiento = date('Y-m-d');
    $sql_insert = "INSERT INTO `caja_movimiento`(`idCaja`, `montoMovimiento`, `descripcionMovimiento`, `fechaMovimiento`) VALUES ('$idCaja','$precio','$detallePago','$fechaMovimiento');";
    $consul_sql_insert = $this->db->query($sql_insert);
  }

  public function movimiento()
  {
    $datos = [];
    $datosTabla = [];
    $datosTorta = [];
    $fechaActual = date('Y-m-d');
    // * Obtener el ID de caja abierta actualmente
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $sql_cajaAbierta = "SELECT * FROM `cajas` WHERE idUsuario = '$idUsuario' AND idSucursal = '$idSucursal' AND estado = 'abierto';";
    $cajaAbierta = $this->db->query($sql_cajaAbierta);
    $caja = $cajaAbierta->fetch_all(MYSQLI_ASSOC);
    $idCaja = $caja[0]['idCaja'];
    $montoInicial = $caja[0]['montoApertura'];
    // * Consulta para obtener los datos de movimiento de caja
    $sql_ingresosTabla = "SELECT COUNT(tipo) as 'cant' FROM `caja_movimiento` WHERE tipo = 'ingreso' AND fechaMovimiento LIKE '%$fechaActual%' AND idCaja = '$idCaja';";
    $sql_devolucionesTabla = "SELECT COUNT(tipo) as 'cant' FROM `caja_movimiento` WHERE tipo = 'devolucion' AND fechaMovimiento LIKE '%$fechaActual%' AND idCaja = '$idCaja';";
    $sql_prestamosTabla = "SELECT COUNT(tipo) as 'cant' FROM `caja_movimiento` WHERE tipo = 'prestamo' AND fechaMovimiento LIKE '%$fechaActual%' AND idCaja = '$idCaja';";
    $sql_gastosTabla = "SELECT COUNT(tipo) as 'cant' FROM `caja_movimiento` WHERE tipo = 'gasto' AND fechaMovimiento LIKE '%$fechaActual%' AND idCaja = '$idCaja';";
    // *******************************************************************************
    $sql_ingresosTorta = "SELECT SUM(montoMovimiento) as 'ingresosTotal' FROM `caja_movimiento` WHERE idCaja = '$idCaja' AND fechaMovimiento LIKE '%$fechaActual%' AND tipo='ingreso';";
    $sql_devolucionesTorta = "SELECT SUM(montoMovimiento) as 'devolucionesTotal' FROM `caja_movimiento` WHERE idCaja = '$idCaja' AND fechaMovimiento LIKE '%$fechaActual%' AND tipo='devolucion';";
    $sql_prestamosTorta = "SELECT SUM(montoMovimiento) as 'prestamoTotal' FROM `caja_movimiento` WHERE idCaja = '$idCaja' AND fechaMovimiento LIKE '%$fechaActual%' AND tipo='prestamo';";
    $sql_gastosTorta = "SELECT SUM(montoMovimiento) as 'gastosTotal' FROM `caja_movimiento` WHERE idCaja = '$idCaja' AND fechaMovimiento LIKE '%$fechaActual%' AND tipo='gasto';";
    // * Ejecutando las consultas
    $cons_ingresosTabla = $this->db->query($sql_ingresosTabla);
    $cons_devolucionTabla = $this->db->query($sql_devolucionesTabla);
    $cons_prestamoTabla = $this->db->query($sql_prestamosTabla);
    $cons_gastoTabla = $this->db->query($sql_gastosTabla);
    $cons_ingresosTorta = $this->db->query($sql_ingresosTorta);
    $cons_devolucionTorta = $this->db->query($sql_devolucionesTorta);
    $cons_prestamoTorta = $this->db->query($sql_prestamosTorta);
    $cons_gastoTorta = $this->db->query($sql_gastosTorta);
    // * Asociando las consultas
    $ingresosTabla = $cons_ingresosTabla->fetch_all(MYSQLI_ASSOC);
    $devolucionesTabla = $cons_devolucionTabla->fetch_all(MYSQLI_ASSOC);
    $prestamoTabla = $cons_prestamoTabla->fetch_all(MYSQLI_ASSOC);
    $gastoTabla = $cons_gastoTabla->fetch_all(MYSQLI_ASSOC);
    $ingresosTorta = ($cons_ingresosTorta->fetch_all(MYSQLI_ASSOC));
    $devolucionesTorta = $cons_devolucionTorta->fetch_all(MYSQLI_ASSOC);
    $prestamoTorta = $cons_prestamoTorta->fetch_all(MYSQLI_ASSOC);
    $gastoTorta = $cons_gastoTorta->fetch_all(MYSQLI_ASSOC);
    // * uniendo tod en un solo array de datos
    $datosTabla['ingresos'] = $ingresosTabla;
    $datosTabla['devoluciones'] = $devolucionesTabla;
    $datosTabla['prestamo'] = $prestamoTabla;
    $datosTabla['gasto'] = $gastoTabla;

    $datosTorta['ingresos'] = $ingresosTorta[0];
    $datosTorta['devoluciones'] = $devolucionesTorta[0];
    $datosTorta['prestamo'] = $prestamoTorta[0];
    $datosTorta['gasto'] = $gastoTorta[0];
    $datosTorta['montoInicial'] = $montoInicial;

    $datos['tabla'] = $datosTabla;
    $datos['torta'] = $datosTorta;

    return $datos;
  }

  public function listarIngresos()
  {
    $fechaActual = date('Y-m-d');
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    // * Obtener el ID de caja abierta actualmente
    $sql_cajaAbierta = "SELECT * FROM `cajas` WHERE idUsuario = '$idUsuario' AND idSucursal = '$idSucursal' AND estado = 'abierto';";
    $cajaAbierta = $this->db->query($sql_cajaAbierta);
    $caja = $cajaAbierta->fetch_all(MYSQLI_ASSOC);
    $idCaja = $caja[0]['idCaja'];
    $sql_ingresos = "SELECT montoMovimiento as 'monto', descripcionMovimiento as 'descripcion' FROM `caja_movimiento` WHERE tipo = 'ingreso' AND fechaMovimiento LIKE '%$fechaActual%' AND idCaja = '$idCaja';";
    $cons_ingresos = $this->db->query($sql_ingresos);
    $ingresos = $cons_ingresos->fetch_all(MYSQLI_ASSOC);
    return $ingresos;
  }

  public function listarDevoluciones()
  {

    $fechaActual = date('Y-m-d');
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    // * Obtener el ID de caja abierta actualmente
    $sql_cajaAbierta = "SELECT * FROM `cajas` WHERE idUsuario = '$idUsuario' AND idSucursal = '$idSucursal' AND estado = 'abierto';";
    $cajaAbierta = $this->db->query($sql_cajaAbierta);
    $caja = $cajaAbierta->fetch_all(MYSQLI_ASSOC);
    $idCaja = $caja[0]['idCaja'];
    $sql_ingresos = "SELECT montoMovimiento as 'monto', descripcionMovimiento as 'descripcion' FROM `caja_movimiento` WHERE tipo = 'devolucion' AND fechaMovimiento LIKE '%$fechaActual%' AND idCaja = '$idCaja';";
    $cons_ingresos = $this->db->query($sql_ingresos);
    $ingresos = $cons_ingresos->fetch_all(MYSQLI_ASSOC);
    return $ingresos;
  }

  public function listarPrestamos()
  {

    $fechaActual = date('Y-m-d');
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    // * Obtener el ID de caja abierta actualmente
    $sql_cajaAbierta = "SELECT * FROM `cajas` WHERE idUsuario = '$idUsuario' AND idSucursal = '$idSucursal' AND estado = 'abierto';";
    $cajaAbierta = $this->db->query($sql_cajaAbierta);
    $caja = $cajaAbierta->fetch_all(MYSQLI_ASSOC);
    $idCaja = $caja[0]['idCaja'];
    $sql_ingresos = "SELECT montoMovimiento as 'monto', descripcionMovimiento as 'descripcion' FROM `caja_movimiento` WHERE tipo = 'prestamo' AND fechaMovimiento LIKE '%$fechaActual%' AND idCaja = '$idCaja';";
    $cons_ingresos = $this->db->query($sql_ingresos);
    $ingresos = $cons_ingresos->fetch_all(MYSQLI_ASSOC);
    return $ingresos;
  }

  public function listarGastos()
  {
    $fechaActual = date('Y-m-d');
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    // * Obtener el ID de caja abierta actualmente
    $sql_cajaAbierta = "SELECT * FROM `cajas` WHERE idUsuario = '$idUsuario' AND idSucursal = '$idSucursal' AND estado = 'abierto';";
    $cajaAbierta = $this->db->query($sql_cajaAbierta);
    $caja = $cajaAbierta->fetch_all(MYSQLI_ASSOC);
    $idCaja = $caja[0]['idCaja'];
    $sql_ingresos = "SELECT montoMovimiento as 'monto', descripcionMovimiento as 'descripcion' FROM `caja_movimiento` WHERE tipo = 'gasto' AND fechaMovimiento LIKE '%$fechaActual%' AND idCaja = '$idCaja';";
    $cons_ingresos = $this->db->query($sql_ingresos);
    $ingresos = $cons_ingresos->fetch_all(MYSQLI_ASSOC);
    return $ingresos;
  }

  public function editarMontoInicial($monto)
  {
    $fechaActual = date('Y-m-d');
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    // ###### OBTENER ID CAJA ABIERTA ###########
    $sql_idCaja = "SELECT * FROM `cajas` WHERE estado = 'abierto' AND idUsuario = '$idUsuario' AND fechaApertura LIKE '%$fechaActual%';";
    $consul_sql_idCaja = $this->db->query($sql_idCaja);
    $cajaActual = ($consul_sql_idCaja->fetch_all(MYSQLI_ASSOC))[0];
    $idCaja = $cajaActual['idCaja'];
    // ###### EDITAR #######
    $sql_editMonto = "UPDATE `cajas` SET `montoApertura`='$monto' WHERE idCaja = '$idCaja' AND estado='abierto'";
    $consultar = $this->db->query($sql_editMonto);
    return $consultar;
  }

  public function registrarMovimiento($descripcion, $monto, $tipo)
  {
    $fechaActual = date('Y-m-d');
    $fechaHora = date('Y-m-d h:i:s');
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    // ###### OBTENER ID CAJA ABIERTA ###########
    $sql_idCaja = "SELECT * FROM `cajas` WHERE estado = 'abierto' AND idUsuario = '$idUsuario' AND fechaApertura LIKE '%$fechaActual%' AND  idSucursal='$idSucursal';";
    $consul_sql_idCaja = $this->db->query($sql_idCaja);
    $cajaActual = ($consul_sql_idCaja->fetch_all(MYSQLI_ASSOC))[0];
    $idCaja = $cajaActual['idCaja'];
    // ###### INSERTAR #######
    if ($tipo == 'devol') {
      $sql_insertMovimiento = "INSERT INTO `caja_movimiento`(`idCaja`, `montoMovimiento`, `descripcionMovimiento`, `tipo`, `fechaMovimiento`) VALUES ('$idCaja','$monto','$descripcion','devolucion','$fechaHora')";
    } elseif ($tipo == 'prest') {
      $sql_insertMovimiento = "INSERT INTO `caja_movimiento`(`idCaja`, `montoMovimiento`, `descripcionMovimiento`, `tipo`, `fechaMovimiento`) VALUES ('$idCaja','$monto','$descripcion','prestamo','$fechaHora')";
    } else {
      $sql_insertMovimiento = "INSERT INTO `caja_movimiento`(`idCaja`, `montoMovimiento`, `descripcionMovimiento`, `tipo`, `fechaMovimiento`) VALUES ('$idCaja','$monto','$descripcion','gasto','$fechaHora')";
    }
    $consultar = $this->db->query($sql_insertMovimiento);
    return $consultar;
  }

  public function cerrarCaja($monto)
  {
    $fechaActual = date('Y-m-d');
    $fechaCierre = date('Y-m-d h:i:s');
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    // ###### OBTENER ID CAJA ABIERTA ###########
    $sql_idCaja = "SELECT * FROM `cajas` WHERE estado = 'abierto' AND idUsuario = '$idUsuario' AND fechaApertura LIKE '%$fechaActual%' AND idSucursal='$idSucursal';";
    $consul_sql_idCaja = $this->db->query($sql_idCaja);
    $cajaActual = ($consul_sql_idCaja->fetch_all(MYSQLI_ASSOC))[0];
    $idCaja = $cajaActual['idCaja'];
    // ###### EDITAR #######
    $sql_cerrarCaja = "UPDATE `cajas` SET `montoCierre`='$monto', `estado` = 'cerrado', `fechaCierre`='$fechaCierre' WHERE idCaja = '$idCaja' AND estado='abierto'";
    $consultar = $this->db->query($sql_cerrarCaja);
    return $consultar;
  }

  public function historialCaja(){
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $sql_cajas = "SELECT usuarios.nombre as 'cajero' , cajas.* FROM `cajas`, usuarios WHERE cajas.idUsuario = usuarios.idUsuario AND cajas.idSucursal = '$idSucursal' ORDER BY fechaApertura DESC";
    $consultar_cajas = $this->db->query($sql_cajas);
    $cajas = $consultar_cajas->fetch_all(MYSQLI_ASSOC);
    return $cajas;
  }

  public function montoCierre($idCaja){
    $sql_inicial = "SELECT montoApertura  FROM `cajas` WHERE idCaja = $idCaja";
    $sql_ingresos = "SELECT SUM(montoMovimiento) as 'ingresos' FROM `caja_movimiento` WHERE idCaja = $idCaja AND tipo = 'ingreso'";
    $sql_prestamos = "SELECT SUM(montoMovimiento) as 'prestamos' FROM `caja_movimiento` WHERE idCaja = $idCaja AND tipo = 'prestamo'";
    $sql_devoluciones = "SELECT SUM(montoMovimiento) as 'devoluciones' FROM `caja_movimiento` WHERE idCaja = $idCaja AND tipo = 'devolucion'";
    $sql_gastos = "SELECT SUM(montoMovimiento) as 'gastos' FROM `caja_movimiento` WHERE idCaja = $idCaja AND tipo = 'gasto'";

    $cons_inicial = $this->db->query($sql_inicial);
    $cons_ingresos = $this->db->query($sql_ingresos);
    $cons_prestamos = $this->db->query($sql_prestamos);
    $cons_devoluciones = $this->db->query($sql_devoluciones);
    $cons_gastos = $this->db->query($sql_gastos);

    $inicialArray = ($cons_inicial->fetch_all(MYSQLI_ASSOC))[0];
    $ingresosArray = ($cons_ingresos->fetch_all(MYSQLI_ASSOC))[0];
    $prestamosArray = ($cons_prestamos->fetch_all(MYSQLI_ASSOC))[0];
    $devolucionesArray = ($cons_devoluciones->fetch_all(MYSQLI_ASSOC))[0];
    $gastosArray = ($cons_gastos->fetch_all(MYSQLI_ASSOC))[0];

    $inicial =  (float) (($inicialArray['montoApertura'] != null) ? $inicialArray['montoApertura'] : 0 );
    $ingreso =  (float) (($ingresosArray['ingresos'] != null) ? $ingresosArray['ingresos'] : 0 );
    $prestamo =  (float) (($prestamosArray['prestamos'] != null) ? $prestamosArray['prestamos'] : 0 );
    $devolucion =  (float) (($devolucionesArray['devoluciones'] != null) ? $devolucionesArray['devoluciones'] : 0 );
    $gasto =  (float) (($gastosArray['gastos'] != null) ? $gastosArray['gastos'] : 0 );

    $montoCierre = ($inicial + $devolucion + $ingreso) - ($prestamo+$gasto);
    $montoCierre = number_format($montoCierre, 2, '.', ' ');
    $fechaCierre = date('Y-m-d h:i:s');

    $sql_cerrarCaja = "UPDATE cajas SET montoCierre = $montoCierre , fechaCierre = '$fechaCierre', estado = 'cerrado' WHERE idCaja = $idCaja";
    $cons_cerrar = $this->db->query($sql_cerrarCaja);

    return $cons_cerrar;
  }
}

// $mov = new Caja();
// echo("<pre>");
// var_dump($mov->movimiento());
// echo("</pre>");
