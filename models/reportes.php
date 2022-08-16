<?php
require_once "../config/db.php";

class Reportes
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']);
  }

  /* ##### METODOS ###### */
  public function datosEmpresa()
  {
    $sql_datosEmpresa = "SELECT direccionEmpresa as 'direccion', numeroRuc, telefono, celular, email, logoEmpresa FROM `datos_empresa`;";
    $consultar = $this->db->query($sql_datosEmpresa);
    $datosEmpresa = $consultar->fetch_all(MYSQLI_ASSOC);
    return $datosEmpresa;
  }

  public function datosCajero($idCaja, $fechaApertura)
  {
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    $fecha = date('Y-m-d');
    if($idCaja && $fechaApertura){
      $sql_cajero = "SELECT cajas.idCaja, cajas.montoApertura, cajas.fechaApertura, cajas.fechaCierre, concat(usuarios.nombre,' ',usuarios.apellido) as 'nombre' FROM `cajas`, usuarios WHERE cajas.idUsuario = usuarios.idUsuario AND cajas.fechaApertura LIKE '%$fechaApertura%' AND cajas.idCaja = '$idCaja'";
    }else{
      $sql_cajero = "SELECT cajas.idCaja, cajas.montoApertura, cajas.fechaApertura, cajas.fechaCierre, concat(usuarios.nombre,' ',usuarios.apellido) as 'nombre' FROM `cajas`, usuarios WHERE cajas.idUsuario = usuarios.idUsuario AND cajas.estado = 'abierto' AND cajas.fechaApertura LIKE '%$fecha%' AND usuarios.idUsuario = '$idUsuario'";
    }
    $consulta_caja = $this->db->query($sql_cajero);
    $datosCajero = $consulta_caja->fetch_all(MYSQLI_ASSOC);
    return $datosCajero;
  }

  public function detalleVenta($idCajaEntra)
  {
    $datosVentas = [];
    $idCaja = '';
    if($idCajaEntra == false){
      $datosCajero = $this->datosCajero(false, false);
      $idCaja = $datosCajero[0]['idCaja'];
    }else{
      $idCaja = $idCajaEntra;
    }

    //************ MONTO EFECTIVO ********************
    $sql_efectivo = "SELECT SUM(totalPagar) AS 'efectivo' FROM `detalle_pensiones` WHERE tipoPago = 'efectivo' AND idCajero = '$idCaja'";
    $consulta_efectivo = $this->db->query($sql_efectivo);
    $efectivo = ($consulta_efectivo->fetch_all(MYSQLI_ASSOC))[0];
    //************ MONTO YAPE **************************
    $sql_yape = "SELECT SUM(totalPagar) AS 'yape' FROM `detalle_pensiones` WHERE tipoPago = 'yape' AND idCajero = '$idCaja'";
    $consulta_yape = $this->db->query($sql_yape);
    $yape = ($consulta_yape->fetch_all(MYSQLI_ASSOC))[0];
    //************ MONTO PLIN **************************
    $sql_plin = "SELECT SUM(totalPagar) AS 'plin' FROM `detalle_pensiones` WHERE tipoPago = 'plin' AND idCajero = '$idCaja'";
    $consulta_plin = $this->db->query($sql_plin);
    $plin = ($consulta_plin->fetch_all(MYSQLI_ASSOC))[0];
    //************ MONTO TARJETA **************************
    $sql_tarjeta = "SELECT SUM(totalPagar) AS 'tarjeta' FROM `detalle_pensiones` WHERE tipoPago = 'tarjeta' AND idCajero = '$idCaja'";
    $consulta_tarjeta = $this->db->query($sql_tarjeta);
    $tarjeta = ($consulta_tarjeta->fetch_all(MYSQLI_ASSOC))[0];
    //************ MONTO TRASNFERENCIA **************************
    $sql_transferencia = "SELECT SUM(totalPagar) AS 'transferencia' FROM `detalle_pensiones` WHERE tipoPago = 'transferencia' AND idCajero = '$idCaja'";
    $consulta_transferencia = $this->db->query($sql_transferencia);
    $transferencia = ($consulta_transferencia->fetch_all(MYSQLI_ASSOC))[0];
    //************ MONTO DEPOSITO **************************
    $sql_deposito= "SELECT SUM(totalPagar) AS 'deposito' FROM `detalle_pensiones` WHERE tipoPago = 'deposito' AND idCajero = '$idCaja'";
    $consulta_deposito = $this->db->query($sql_deposito);
    $deposito = ($consulta_deposito->fetch_all(MYSQLI_ASSOC))[0];

    //************ ARMANDO EL ARREGLO DE DATOS **************
    $datosVentas['efectivo'] = $efectivo['efectivo'];
    $datosVentas['yape'] = $yape['yape'];
    $datosVentas['plin'] = $plin['plin'];
    $datosVentas['tarjeta'] = $tarjeta['tarjeta'];
    $datosVentas['transferencia'] = $transferencia['transferencia'];
    $datosVentas['deposito'] = $deposito['deposito'];

    return $datosVentas;
  }

  public function detalleMovCaja($idCajaEntra)
  {
    $datosMovCaja = [];
    $datosVentas = [];
    $idCaja = '';
    if($idCajaEntra == false){
      $datosCajero = $this->datosCajero(false,false);
      $idCaja = $datosCajero[0]['idCaja'];
    }else{
      $idCaja = $idCajaEntra;
    }
    //************ MONTO PRESTAMOS ********************
    $sql_prestamo = "SELECT SUM(montoMovimiento) as 'prestamos' FROM `caja_movimiento` WHERE idCaja = '$idCaja' AND tipo = 'prestamo'";
    $consulta_prestamo = $this->db->query($sql_prestamo);
    $prestamo = ($consulta_prestamo->fetch_all(MYSQLI_ASSOC))[0];
    //************ MONTO GASTOS ********************
    $sql_gastos = "SELECT SUM(montoMovimiento) as 'gastos' FROM `caja_movimiento` WHERE idCaja = '$idCaja' AND tipo = 'gasto'";
    $consulta_gasto = $this->db->query($sql_gastos);
    $gasto = ($consulta_gasto->fetch_all(MYSQLI_ASSOC))[0];
    //************ MONTO DEVOLUCION ********************
    $sql_devolucion = "SELECT SUM(montoMovimiento) as 'devolucion' FROM `caja_movimiento` WHERE idCaja = '$idCaja' AND tipo = 'devolucion'";
    $consulta_devolucion = $this->db->query($sql_devolucion);
    $devolucion = ($consulta_devolucion->fetch_all(MYSQLI_ASSOC))[0];
    //************ MONTO DEVOLUCION ********************
    $sql_ingresos = "SELECT SUM(montoMovimiento) as 'ingresos' FROM `caja_movimiento` WHERE idCaja = '$idCaja' AND tipo = 'ingreso'";
    $consulta_ingresos = $this->db->query($sql_ingresos);
    $ingresos = ($consulta_ingresos->fetch_all(MYSQLI_ASSOC))[0];

    //************ ARMANDO EL ARREGLO DE DATOS **************
    $datosMovCaja['prestamo'] = $prestamo['prestamos'];
    $datosMovCaja['gasto'] = $gasto['gastos'];
    $datosMovCaja['devolucion'] = $devolucion['devolucion'];
    $datosMovCaja['ingresos'] = $ingresos['ingresos'];
    return $datosMovCaja;
  }

  public function detalleFinal($idCajaEntra)
  {
    $datosMovCaja = [];
    $datosVentas = [];
    $idCaja = '';
    if($idCajaEntra == false){
      $datosCajero = $this->datosCajero(false, false);
      $idCaja = $datosCajero[0]['idCaja'];
    }else{
      $idCaja = $idCajaEntra;
    }
    //************ MONTO EN CAJA ********************
    $sql_montoCaja = "SELECT SUM(totalPagar) as 'monto' FROM `detalle_pensiones` WHERE tipoPago = 'efectivo' AND idCajero = '$idCaja'";
    $consulta_monto = $this->db->query($sql_montoCaja);
    $montoCaja = ($consulta_monto->fetch_all(MYSQLI_ASSOC))[0];
    //************ MONTO EN CUENTA BANCARIA ********************
    $sql_montoCuenta = "SELECT SUM(totalPagar) as 'monto' FROM `detalle_pensiones` WHERE (tipoPago = 'yape' OR tipoPago = 'plin' OR tipoPago = 'tarjeta' OR tipoPago = 'transferencia' OR tipoPago = 'deposito') AND idCajero = '$idCaja'";
    $consulta_montoCuenta = $this->db->query($sql_montoCuenta);
    $montoCuenta = ($consulta_montoCuenta->fetch_all(MYSQLI_ASSOC))[0];

    //************ ARMANDO EL ARREGLO DE DATOS **************
    $datosMovCaja['montoCaja'] = $montoCaja['monto'];
    $datosMovCaja['montoCuenta'] = $montoCuenta['monto'];
    return $datosMovCaja;
  }

  public function datosPension($idPension){
    $sql_pension = "SELECT dt.serieComprobante as 'serie', dt.numeroComprobante as 'numero', DATE_FORMAT(dt.fechaPagoRealizado, '%Y-%m-%d') as 'fEmision', DATE_FORMAT(dt.fechaPagoRealizado, '%h:%i:%s') as 'hEmision', u.nombre as 'cajero', cl.nombreComercial as 'clientePaga', EXTRACT(MONTH FROM dt.fechaPago) as 'mes', cl.nroDocumento as 'documentoServicio', cl.nombreCliente as 'razonSocial', dt.nroDocumentoPaga, dt.clientePaga, UPPER (dt.tipoPago) as 'formaPago', dt.direccionPaga as 'Cdireccion', dt.detallePago as 'detalle', dt.precioSinIGV as 'OPgravadas', dt.montoIGV as 'igv', dt.totalPagar as 'total', dt.totalLetras FROM `detalle_pensiones` as dt, cajas as ca, usuarios as u, clientes as cl, clientes_servicios as cs WHERE idDetallePensiones = '$idPension' AND dt.idCajero = ca.idCaja AND ca.idUsuario = u.idUsuario AND dt.idClienteServicio = cs.idClienteServicio AND cs.idCliente = cl.idCliente";
    $consultar = $this->db->query($sql_pension);
    $pension = $consultar->fetch_all(MYSQLI_ASSOC);
    return $pension;
  }
}
