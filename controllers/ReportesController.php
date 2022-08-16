<?php
session_start();
require_once "../models/reportes.php";
require_once "../models/pensiones.php";
require_once "../helpers/utils.php";

class ReporteController
{
  public function precuenta()
  {
    // Limpiando las sesiones
    unset($_SESSION['precuenta']['cliente']);
    unset($_SESSION['precuenta']['f_emision']);
    unset($_SESSION['precuenta']['f_pago']);
    unset($_SESSION['precuenta']['f_vence']);
    unset($_SESSION['precuenta']['nro_doc']);
    unset($_SESSION['precuenta']['direccion']);
    unset($_SESSION['precuenta']['detalle_pago']);
    unset($_SESSION['precuenta']['precio']);
    unset($_SESSION['precuenta']['mes']);
    unset($_SESSION['empresa']['direccion']);
    unset($_SESSION['empresa']['numeroRuc']);
    unset($_SESSION['empresa']['telefono']);
    unset($_SESSION['empresa']['email']);
    unset($_SESSION['empresa']['logoEmpresa']);

    // Obteniendo datos de empresa
    $reportesObj = new Reportes();
    $datosEmpresa = ($reportesObj->datosEmpresa())[0];
    $_SESSION['empresa']['direccion'] = $datosEmpresa['direccion'];
    $_SESSION['empresa']['numeroRuc'] = $datosEmpresa['numeroRuc'];
    $_SESSION['empresa']['telefono'] = $datosEmpresa['telefono'];
    $_SESSION['empresa']['email'] = $datosEmpresa['email'];
    $_SESSION['empresa']['logo'] = $datosEmpresa['logoEmpresa'];

    // Guardando datos en las sesiones
    $_SESSION['precuenta']['cliente'] = $_POST['cliente'];
    $_SESSION['precuenta']['f_emision'] = $_POST['f_emision'];
    $_SESSION['precuenta']['f_pago'] = $_POST['f_pago'];
    $_SESSION['precuenta']['f_vence'] = $_POST['f_vence'];
    $_SESSION['precuenta']['nro_doc'] = $_POST['nro_doc'];
    $_SESSION['precuenta']['direccion'] = $_POST['direccion'];
    $_SESSION['precuenta']['detalle_pago'] = $_POST['detalle_pago'];
    $_SESSION['precuenta']['precio'] = $_POST['precio'];
    $arrayFecha = explode("-", $_POST['f_pago']);
    $_SESSION['precuenta']['mes'] = $arrayFecha[1];
  }

  public function movimientoCaja()
  {
    // **************** Limpiando las sesiones para actualizarlas luego ******************
    unset($_SESSION['empresa']['direccion']);
    unset($_SESSION['empresa']['numeroRuc']);
    unset($_SESSION['empresa']['celular']);
    unset($_SESSION['empresa']['email']);
    unset($_SESSION['empresa']['logo']);
    unset($_SESSION['cajero']['cajero']);
    unset($_SESSION['cajero']['fApertura']);
    unset($_SESSION['cajero']['nroCaja']);
    unset($_SESSION['detalleVenta']['efectivo']);
    unset($_SESSION['detalleVenta']['yape']);
    unset($_SESSION['detalleVenta']['plin']);
    unset($_SESSION['detalleVenta']['tarjeta']);
    unset($_SESSION['detalleVenta']['transferencia']);
    unset($_SESSION['detalleMovCaja']['montoInicial']);
    unset($_SESSION['detalleMovCaja']['prestamo']);
    unset($_SESSION['detalleMovCaja']['gasto']);
    unset($_SESSION['detalleMovCaja']['devolucion']);
    unset($_SESSION['detalleMovCaja']['ingresos']);
    unset($_SESSION['detalleCuadreFinal']['egresosTotales']);
    unset($_SESSION['detalleCuadreFinal']['saldo']);
    unset($_SESSION['detalleCuadreFinal']['montoTotal']);
    unset($_SESSION['montoFinal']['caja']);
    unset($_SESSION['montoFinal']['banco']);
    unset($_SESSION['montoFinal']['cajaBanco']);
    unset($_SESSION['montoFinal']['cajaBancoLetra']);

    // **************** Obteniendo los datos necesarios *******************
    $idCaja = false;
    $fechaApertura = false;
    $reporteModel = new Reportes();
    $datosEmpresa = ($reporteModel->datosEmpresa())[0];
    $datosCajero = ($reporteModel->datosCajero($idCaja, $fechaApertura))[0];
    $datosVenta = ($reporteModel->detalleVenta($idCaja));
    $datosMovCaja = ($reporteModel->detalleMovCaja($idCaja));
    $datosFinal = ($reporteModel->detalleFinal($idCaja));

    // **************** Asignando valores a las sesiones ********************
    $_SESSION['empresa']['direccion'] = $datosEmpresa['direccion'];
    $_SESSION['empresa']['numeroRuc'] = $datosEmpresa['numeroRuc'];
    $_SESSION['empresa']['celular'] = $datosEmpresa['celular'];
    $_SESSION['empresa']['email'] = $datosEmpresa['email'];
    $_SESSION['empresa']['logo'] = $datosEmpresa['logoEmpresa'];

    $_SESSION['cajero']['cajero'] = $datosCajero['nombre'];
    $_SESSION['cajero']['fApertura'] = $datosCajero['fechaApertura'];
    $_SESSION['cajero']['nroCaja'] = $datosCajero['idCaja'];

    $_SESSION['detalleVenta']['efectivo'] = ($datosVenta['efectivo'] != null) ? $datosVenta['efectivo'] : '0.00';
    $_SESSION['detalleVenta']['yape'] = ($datosVenta['yape'] != null) ? $datosVenta['yape'] : '0.00';
    $_SESSION['detalleVenta']['plin'] = ($datosVenta['plin'] != null) ? $datosVenta['plin'] : '0.00';
    $_SESSION['detalleVenta']['tarjeta'] = ($datosVenta['tarjeta'] != null) ? $datosVenta['tarjeta'] : '0.00';
    $_SESSION['detalleVenta']['transferencia'] = ($datosVenta['transferencia'] != null) ? $datosVenta['transferencia'] : '0.00';
    $_SESSION['detalleVenta']['deposito'] = ($datosVenta['deposito'] != null) ? $datosVenta['deposito'] : '0.00';

    $_SESSION['detalleMovCaja']['montoInicial'] = ($datosCajero['montoApertura'] != null) ? $datosCajero['montoApertura'] : '0.00';
    $_SESSION['detalleMovCaja']['prestamo'] = ($datosMovCaja['prestamo'] != null) ? $datosMovCaja['prestamo'] : '0.00';
    $_SESSION['detalleMovCaja']['gasto'] = ($datosMovCaja['gasto'] != null) ? $datosMovCaja['gasto'] : '0.00';
    $_SESSION['detalleMovCaja']['devolucion'] = ($datosMovCaja['devolucion'] != null) ? $datosMovCaja['devolucion'] : '0.00';
    $_SESSION['detalleMovCaja']['ingresos'] = ($datosMovCaja['ingresos'] != null) ? $datosMovCaja['ingresos'] : '0.00';

    $_SESSION['detalleCuadreFinal']['egresosTotales'] = (float) $_SESSION['detalleMovCaja']['gasto']  + (float) $_SESSION['detalleMovCaja']['prestamo'] - (float) $_SESSION['detalleMovCaja']['devolucion'];
    $ingresos = $nombre_format_francais = number_format((float) $_SESSION['detalleMovCaja']['ingresos'], 2, '.', ' ');
    $devolucion = $nombre_format_francais = number_format((float) $_SESSION['detalleMovCaja']['devolucion'], 2, '.', ' ');
    $gasto = $nombre_format_francais = number_format((float) $_SESSION['detalleMovCaja']['gasto'], 2, '.', ' ');
    $prestamo = $nombre_format_francais = number_format((float) $_SESSION['detalleMovCaja']['prestamo'], 2, '.', ' ');
    $_SESSION['detalleCuadreFinal']['saldo'] = $ingresos + $devolucion - $gasto - $prestamo;
    $_SESSION['detalleCuadreFinal']['montoTotal'] = ((float) $_SESSION['detalleMovCaja']['montoInicial'] ) + ((float) $_SESSION['detalleCuadreFinal']['saldo']);

    $_SESSION['montoFinal']['caja'] = ((float) $_SESSION['detalleMovCaja']['montoInicial'] + (float) $_SESSION['detalleVenta']['efectivo'] - (float) $_SESSION['detalleCuadreFinal']['egresosTotales'] );
    $_SESSION['montoFinal']['banco'] = ($datosFinal['montoCuenta'] != null) ? $datosFinal['montoCuenta'] : '0.00';
    $_SESSION['montoFinal']['cajaBanco'] = ((float) $_SESSION['montoFinal']['caja'] ) + ((float) $_SESSION['montoFinal']['banco']);
    $montoFinal = $_SESSION['montoFinal']['cajaBanco'];
    $montoFinalLetras = utils::num2letras($montoFinal);
    $_SESSION['montoFinal']['cajaBancoLetra'] = $montoFinalLetras;
  }

  public function verTicketCaja(){
    // **************** Limpiando las sesiones para actualizarlas luego ******************
    unset($_SESSION['empresa']['direccion']);
    unset($_SESSION['empresa']['numeroRuc']);
    unset($_SESSION['empresa']['celular']);
    unset($_SESSION['empresa']['email']);
    unset($_SESSION['empresa']['logo']);

    unset($_SESSION['cajero']['cajero']);
    unset($_SESSION['cajero']['fApertura']);
    unset($_SESSION['cajero']['nroCaja']);

    unset($_SESSION['detalleVenta']['efectivo']);
    unset($_SESSION['detalleVenta']['yape']);
    unset($_SESSION['detalleVenta']['plin']);
    unset($_SESSION['detalleVenta']['tarjeta']);

    unset($_SESSION['detalleMovCaja']['montoInicial']);
    unset($_SESSION['detalleMovCaja']['prestamo']);
    unset($_SESSION['detalleMovCaja']['gasto']);
    unset($_SESSION['detalleMovCaja']['devolucion']);
    unset($_SESSION['detalleMovCaja']['ingresos']);

    unset($_SESSION['detalleCuadreFinal']['egresosTotales']);
    unset($_SESSION['detalleCuadreFinal']['saldo']);
    unset($_SESSION['detalleCuadreFinal']['montoTotal']);

    unset($_SESSION['montoFinal']['caja']);
    unset($_SESSION['montoFinal']['banco']);
    unset($_SESSION['montoFinal']['cajaBanco']);
    unset($_SESSION['montoFinal']['cajaBancoLetra']);

    // **************** Obteniendo los datos necesarios *******************
    $idCaja = $_POST['idCaja'];
    $fechaApertura = $_POST['fApertura'];
    echo $idCaja;
    echo $fechaApertura;
    $reporteModel = new Reportes();
    $datosEmpresa = ($reporteModel->datosEmpresa())[0];
    $datosCajero = ($reporteModel->datosCajero($idCaja, $fechaApertura))[0];
    $datosVenta = ($reporteModel->detalleVenta($idCaja));
    $datosMovCaja = ($reporteModel->detalleMovCaja($idCaja));
    $datosFinal = ($reporteModel->detalleFinal($idCaja));

    // **************** Asignando valores a las sesiones ********************
    $_SESSION['empresa']['direccion'] = $datosEmpresa['direccion'];
    $_SESSION['empresa']['numeroRuc'] = $datosEmpresa['numeroRuc'];
    $_SESSION['empresa']['celular'] = $datosEmpresa['celular'];
    $_SESSION['empresa']['email'] = $datosEmpresa['email'];
    $_SESSION['empresa']['logo'] = $datosEmpresa['logoEmpresa'];

    $_SESSION['cajero']['cajero'] = $datosCajero['nombre'];
    $_SESSION['cajero']['fApertura'] = $datosCajero['fechaApertura'];
    $_SESSION['cajero']['fCierre'] = ($datosCajero['fechaCierre']!= null) ? $datosCajero['fechaCierre'] : date('d-m-Y');
    $_SESSION['cajero']['nroCaja'] = $datosCajero['idCaja'];

    $_SESSION['detalleVenta']['efectivo'] = ($datosVenta['efectivo'] != null) ? $datosVenta['efectivo'] : '0.00';
    $_SESSION['detalleVenta']['yape'] = ($datosVenta['yape'] != null) ? $datosVenta['yape'] : '0.00';
    $_SESSION['detalleVenta']['plin'] = ($datosVenta['plin'] != null) ? $datosVenta['plin'] : '0.00';
    $_SESSION['detalleVenta']['tarjeta'] = ($datosVenta['tarjeta'] != null) ? $datosVenta['tarjeta'] : '0.00';

    $_SESSION['detalleMovCaja']['montoInicial'] = ($datosCajero['montoApertura'] != null) ? $datosCajero['montoApertura'] : '0.00';
    $_SESSION['detalleMovCaja']['prestamo'] = ($datosMovCaja['prestamo'] != null) ? $datosMovCaja['prestamo'] : '0.00';
    $_SESSION['detalleMovCaja']['gasto'] = ($datosMovCaja['gasto'] != null) ? $datosMovCaja['gasto'] : '0.00';
    $_SESSION['detalleMovCaja']['devolucion'] = ($datosMovCaja['devolucion'] != null) ? $datosMovCaja['devolucion'] : '0.00';
    $_SESSION['detalleMovCaja']['ingresos'] = ($datosMovCaja['ingresos'] != null) ? $datosMovCaja['ingresos'] : '0.00';

    $_SESSION['detalleCuadreFinal']['egresosTotales'] = ((float) $_SESSION['detalleMovCaja']['gasto'] ) + ((float) $_SESSION['detalleMovCaja']['devolucion']);
    $_SESSION['detalleCuadreFinal']['saldo'] = (((float) $_SESSION['detalleMovCaja']['ingresos']) + ((float) $_SESSION['detalleMovCaja']['devolucion'])) - (((float) $_SESSION['detalleMovCaja']['gasto']) + ((float) $_SESSION['detalleMovCaja']['prestamo']));
    $_SESSION['detalleCuadreFinal']['montoTotal'] = ((float) $_SESSION['detalleMovCaja']['montoInicial'] ) + ((float) $_SESSION['detalleCuadreFinal']['saldo']);


    $_SESSION['montoFinal']['caja'] = ((float) $_SESSION['detalleMovCaja']['montoInicial'] + (float) $_SESSION['detalleVenta']['efectivo'] - (float) $_SESSION['detalleCuadreFinal']['egresosTotales'] );
    $_SESSION['montoFinal']['banco'] = ($datosFinal['montoCuenta'] != null) ? $datosFinal['montoCuenta'] : '0.00';
    $_SESSION['montoFinal']['cajaBanco'] = ((float) $_SESSION['montoFinal']['caja'] ) + ((float) $_SESSION['montoFinal']['banco']);
    $montoFinal = $_SESSION['montoFinal']['cajaBanco'];
    $montoFinalLetras = utils::num2letras($montoFinal);
    $_SESSION['montoFinal']['cajaBancoLetra'] = $montoFinalLetras;
  }

  public function comprobantePago($idDetallePension){
    // Limpiando las sesiones
    unset($_SESSION['empresa']['direccion']);
    unset($_SESSION['empresa']['numeroRuc']);
    unset($_SESSION['empresa']['telefono']);
    unset($_SESSION['empresa']['logo']);

    unset($_SESSION['pension']['serie']);
    unset($_SESSION['pension']['numero']);
    unset($_SESSION['pension']['f_emision']);
    unset($_SESSION['pension']['hora']);
    unset($_SESSION['pension']['cajero']);
    unset($_SESSION['pension']['cliente']);
    unset($_SESSION['pension']['nro_doc']);
    unset($_SESSION['pension']['direccion']);
    unset($_SESSION['pension']['detalle']);
    unset($_SESSION['pension']['totalPago']);
    unset($_SESSION['pension']['igv']);
    unset($_SESSION['pension']['OPgravadas']);
    unset($_SESSION['pension']['totalLetras']);

    // Obteniendo datos de empresa
    $reportesObj = new Reportes();
    $datosEmpresa = ($reportesObj->datosEmpresa())[0];
    $datosPension = ($reportesObj->datosPension($idDetallePension))[0];
    $_SESSION['empresa']['direccion'] = $datosEmpresa['direccion'];
    $_SESSION['empresa']['numeroRuc'] = $datosEmpresa['numeroRuc'];
    $_SESSION['empresa']['telefono'] = $datosEmpresa['telefono'];
    $_SESSION['empresa']['email'] = $datosEmpresa['email'];
    $_SESSION['empresa']['logo'] = $datosEmpresa['logoEmpresa'];

    // Guardando datos en las sesiones
    $_SESSION['pension']['serie'] = $datosPension['serie'];
    $_SESSION['pension']['numero'] = str_pad($datosPension['numero'], 8, "0", STR_PAD_LEFT) ;
    $_SESSION['pension']['f_emision'] = $datosPension['fEmision'];
    $_SESSION['pension']['hora'] = $datosPension['hEmision'];
    $_SESSION['pension']['cajero'] = $datosPension['cajero'];
    $_SESSION['pension']['mes'] = $datosPension['mes'];
    $_SESSION['pension']['clienteServ'] = $datosPension['clienteServicio'];
    $_SESSION['pension']['nro_docServ'] = $datosPension['documentoServicio'];
    $_SESSION['pension']['razonSocial'] = $datosPension['razonSocial'];
    $_SESSION['pension']['formaPago'] = $datosPension['formaPago'];
    $_SESSION['pension']['cliente'] = $datosPension['clientePaga'];
    $_SESSION['pension']['nro_doc'] = $datosPension['nroDocumentoPaga'];
    $_SESSION['pension']['direccion'] = $datosPension['Cdireccion'];
    $_SESSION['pension']['detalle'] = $datosPension['detalle'];
    $_SESSION['pension']['totalPago'] = $datosPension['total'];
    $_SESSION['pension']['igv'] = $datosPension['igv'];
    $_SESSION['pension']['OPgravadas'] = $datosPension['OPgravadas'];
    $_SESSION['pension']['totalLetras'] = $datosPension['totalLetras'];

  }

}

$reporteObj = new ReporteController();

if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'precuenta') {
    echo($reporteObj->precuenta());
  }
  if ($_GET['method'] == 'movimientoCaja') {
    echo($reporteObj->movimientoCaja());
  }
  if ($_GET['method'] == 'verTicketCaja') {
    echo($reporteObj->verTicketCaja());
  }
  if ($_GET['method'] == 'comprobantePago') {
    $idPension = $_POST['idPension'];
    echo($reporteObj->comprobantePago($idPension));
  }
} else {
  //header("Location:../" . $_SESSION['dbname'] . ".php");
  header("Location:../views/sinSesion.php");
}
