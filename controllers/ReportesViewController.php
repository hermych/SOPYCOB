<?php
session_start();
require_once "../models/reportesView.php";
require_once "../helpers/utils.php";

class ReporteViewController
{
  /** Vistas */
  public function pagosVigentesView(){
    require_once "../views/reportesView/pagosVigentes.php";
  }
  public function pagosRealizadosView(){
    require_once "../views/reportesView/pagosRealizados.php";
  }
  public function pagosAnualesView(){
    require_once "../views/reportesView/pagosAnuales.php";
  }
  public function pagosVencidosView(){
    require_once "../views/reportesView/pagosVencidos.php";
  }
  public function pagosPendientesVencidosView(){
    require_once "../views/reportesView/pagosPendientesVencidos.php";
  }
  public function serviciosSuspendidosView(){
    require_once "../views/reportesView/serviciosSuspendidos.php";
  }
  public function bajaServiciosView(){
    require_once "../views/reportesView/bajaServicios.php";
  }
  public function pagosAnuladosView(){
    require_once "../views/reportesView/pagosAnulados.php";
  }

  /** Tablas */
  public function pagosVigentesFecha($desde, $hasta, $cliente)
  {
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->pagosVigentesFecha($desde, $hasta, $cliente);
    foreach ($pensiones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }
  public function pagosRealizadosFecha($desde, $hasta, $cliente)
  {
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->pagosRealizadosFecha($desde, $hasta, $cliente);
    foreach ($pensiones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }
  public function pagosAnuladosFecha($desde, $hasta, $cliente)
  {
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->pagosAnuladosFecha($desde, $hasta, $cliente);
    foreach ($pensiones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }
  public function pagosAnualesFecha($anio, $cliente)
  {
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->pagosAnualesFecha($anio, $cliente);
    foreach ($pensiones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }
  public function pensionesVencidasFecha($desde, $hasta, $cliente)
  {
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->pensionesVencidasFecha($desde, $hasta, $cliente);
    foreach ($pensiones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }
  public function pagosPendientesVencidosFecha($desde, $hasta, $cliente, $estado)
  {
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->pagosPendientesVencidosFecha($desde, $hasta, $cliente, $estado);
    foreach ($pensiones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }
  public function serviciosSuspendidosFecha($desde, $hasta)
  {
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->serviciosSuspendidosFecha($desde, $hasta);
    foreach ($pensiones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }
  public function bajaServiciosFecha($desde, $hasta)
  {
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->bajaServiciosFecha($desde, $hasta);
    foreach ($pensiones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  /** Pagos vigentes monto total  */
  public function totalMontoFecha($desde, $hasta, $cliente){
    $monto = '0.00';
    $desde1 = $desde;
    $hasta1 = $hasta;
    $reportesViewObj = new ReportesView();
    $montoArray = $reportesViewObj->totalMontoFecha($desde1, $hasta1, $cliente);
    if($montoArray['monto'] != NULL ) {
      $monto = $montoArray['monto'];
    }
    return json_encode($monto);
  }
  public function totalPagosRealizadosFecha($desde, $hasta, $cliente){
    $monto = [];
    $reportesViewObj = new ReportesView();
    $montoArray = $reportesViewObj->totalPagosRealizadosFecha($desde, $hasta, $cliente);
    $monto = [
      'mora' => ($montoArray['mora'] == NULL) ? '0.00' : $montoArray['mora'],
      'recorte' => ($montoArray['recorte'] == NULL) ? '0.00' : $montoArray['recorte'],
      'pension' => ($montoArray['pension'] == NULL) ? '0.00' : $montoArray['pension'],
      'global' => ($montoArray['global'] == NULL) ? '0.00' : $montoArray['global'],
    ];
    return json_encode($monto);
  }
  public function totalPagosVencidasFecha($desde, $hasta, $cliente){
    $monto = [];
    $reportesViewObj = new ReportesView();
    $montoArray = $reportesViewObj->totalPagosVencidasFecha($desde, $hasta, $cliente);
    $monto = [
      'mora' => ($montoArray['mora'] == NULL) ? '0.00' : $montoArray['mora'],
      'recorte' => ($montoArray['recorte'] == NULL) ? '0.00' : $montoArray['recorte'],
      'pension' => ($montoArray['pension'] == NULL) ? '0.00' : $montoArray['pension'],
      'global' => ($montoArray['global'] == NULL) ? '0.00' : $montoArray['global'],
    ];
    return json_encode($monto);
  }
  public function totalPagosAnuladosFecha($desde, $hasta, $cliente){
    $monto = [];
    $reportesViewObj = new ReportesView();
    $montoArray = $reportesViewObj->totalPagosAnuladosFecha($desde, $hasta, $cliente);
    $monto = [
      'mora' => ($montoArray['mora'] == NULL) ? '0.00' : $montoArray['mora'],
      'recorte' => ($montoArray['recorte'] == NULL) ? '0.00' : $montoArray['recorte'],
      'pension' => ($montoArray['pension'] == NULL) ? '0.00' : $montoArray['pension'],
      'global' => ($montoArray['global'] == NULL) ? '0.00' : $montoArray['global'],
    ];
    return json_encode($monto);
  }
  public function totalPagosPendientesVencidosFecha($desde, $hasta, $cliente, $estado){
    $monto = '0.00';
    $reportesViewObj = new ReportesView();
    $montoArray = $reportesViewObj->totalPagosPendientesVencidosFecha($desde, $hasta, $cliente, $estado);
    if($montoArray['monto'] != NULL ) {
      $monto = $montoArray['monto'];
    }
    return json_encode($monto);
  }

  /** Reportes de Excel */
  // Pagos vigentes
  public function reportePagosPendientesVencidosFecha($desde, $hasta, $cliente, $estado){
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->pagosPendientesVencidosFecha($desde, $hasta, $cliente, $estado);
    foreach ($pensiones as $key => $value) {
      $datos['data'][$key] = $value;
    }
    for ($i = 0; $i < count($datos['data']); $i++) {
      $datos['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $datos_2 = $datos['data'];
    $total = 0;
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=pagos-pendientes.xls");
    $thead = "<table border='1'>
            <caption>Pagos Pendientes hasta ".Utils::mesEspañol(date('m'))."</caption>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Contacto</th>
                <th>Servicio</th>
                <th>Fecha Emision</th>
                <th>Fecha Vencimiento</th>
                <th>Estado</th>
                <th>Mensualidad</th>
            </tr>";
    for ($i=0; $i < count($datos_2); $i++){
      $total += $datos_2[$i]['precio'];
      $fila = "<tr style='text-center'><td>".$datos_2[$i]['indice']."</td><td>".$datos_2[$i]['cliente']."</td><td>".$datos_2[$i]['contacto']."</td><td>".utf8_decode($datos_2[$i]['servicio'])."</td><td>".$datos_2[$i]['fEmision']."</td><td>".$datos_2[$i]['fVencimiento']."</td><td>".$datos_2[$i]['estados']."</td><td>S/".$datos_2[$i]['precio']."00"."</td></tr>";
      $thead .= $fila;
    }
    echo $thead."<tr><td></td><td></td><td></td><td></td><td></td><td></td><td>TOTAL</td><td>S/$total.00</td></tr></table>";
  }
  public function reportePagosVigentes($desde, $hasta, $cliente){
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->pagosVigentesFecha($desde, $hasta, $cliente);
    foreach ($pensiones as $key => $value) {
      $datos['data'][$key] = $value;
    }
    for ($i = 0; $i < count($datos['data']); $i++) {
      $datos['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $datos_2 = $datos['data'];
    $mensualidadTotal = 0;
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=pagos-vigentes.xls");
    $thead = "<table border='1'>
            <caption>Pagos Vigentes</caption>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Contacto</th>
                <th>Servicio</th>
                <th>Mensualidad</th>
                <th>Mes</th>
                <th>F. Emision</th>
                <th>F. Vencimiento</th>
            </tr>";
    for ($i=0; $i < count($datos_2); $i++){
      $mes = Utils::mesEspañol($datos_2[$i]['mes']);
      $mensualidadTotal += $datos_2[$i]['mensualidad'];
      $fila = "<tr style='text-center'><td>".$datos_2[$i]['indice']."</td><td>".$datos_2[$i]['cliente']."</td><td>".$datos_2[$i]['contacto']."</td><td>".utf8_decode($datos_2[$i]['servicio'])."</td><td>S/".$datos_2[$i]['mensualidad']."</td><td>".$mes."</td><td>".$datos_2[$i]['fEmision']."</td><td>".$datos_2[$i]['fVencimiento']."</td></tr>";
      $thead .= $fila;
    }
    echo $thead."<tr><td></td><td></td><td></td><td></td><td>TOTAL</td><td>S/$mensualidadTotal.00</td><td></td><td></td><td></td></tr></table>";
  }
  public function reportePagosRealizadosFecha($desde, $hasta, $cliente){
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->pagosRealizadosFecha($desde, $hasta, $cliente);
    foreach ($pensiones as $key => $value) {
      $datos['data'][$key] = $value;
    }
    for ($i = 0; $i < count($datos['data']); $i++) {
      $datos['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $datos_2 = $datos['data'];
    $mensualidaTotal = 0;
    $moraTotal = 0;
    $reconexionTotal = 0;
    $pagoTotal = 0;
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=pagos-realizados.xls");
    $thead = "<table border='1'>
            <caption>Pagos Realizados</caption>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Mensualidad</th>
                <th>Mora</th>
                <th>Reconexion</th>
                <th>Mes</th>
                <th>F. Pago</th>
                <th>Comprobante</th>
                <th>Medio Pago</th>
                <th>".utf8_decode('N° Operacion')."</th>
                <th>Total</th>
                <th>Cajero</th>
            </tr>";
    for ($i=0; $i < count($datos_2); $i++){
      $mensualidaTotal += $datos_2[$i]['mensualidad'];
      $moraTotal += $datos_2[$i]['mora'];
      $reconexionTotal += $datos_2[$i]['recorte'];
      $pagoTotal += $datos_2[$i]['totalPagar'];
      $mes = Utils::mesEspañol($datos_2[$i]['mes']);
      $fila = "<tr style='text-center'><td>".$datos_2[$i]['indice']."</td><td>".$datos_2[$i]['cliente']."</td><td>".utf8_decode($datos_2[$i]['servicio'])."</td><td>S/".$datos_2[$i]['mensualidad']."</td><td>S/".$datos_2[$i]['mora']."</td><td>S/".$datos_2[$i]['recorte']."</td><td>".$mes."</td><td>".$datos_2[$i]['fPago']."</td><td>".$datos_2[$i]['comprobante']."</td><td>".$datos_2[$i]['medioPago']."/".$datos_2[$i]['banco']."</td><td>".$datos_2[$i]['nroOperacion']."</td><td>S/".$datos_2[$i]['totalPagar']."00"."</td><td>".$datos_2[$i]['nombre']."</td></tr>";
      $thead .= $fila;
    }
    echo $thead."<tr><td></td><td></td><td>TOTAL</td><td>S/$mensualidaTotal.00</td><td>S/$moraTotal.00</td><td>S/$reconexionTotal.00</td><td></td><td></td><td></td><td></td><td></td><td>S/$pagoTotal.00</td></tr></table>";
  }
  public function reportePagosAnuladosFecha($desde, $hasta, $cliente){
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->pagosAnuladosFecha($desde, $hasta, $cliente);
    foreach ($pensiones as $key => $value) {
      $datos['data'][$key] = $value;
    }
    for ($i = 0; $i < count($datos['data']); $i++) {
      $datos['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $datos_2 = $datos['data'];
    $mensualidaTotal = 0;
    $moraTotal = 0;
    $reconexionTotal = 0;
    $pagoTotal = 0;
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=pagos-anulados.xls");
    $thead = "<table border='1'>
            <caption>Pagos Anulados</caption>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Mensualidad</th>
                <th>Mora</th>
                <th>Reconexion</th>
                <th>Mes</th>
                <th>Fecha Realizado Pago</th>
                <th>Comprobante</th>
                <th>Total</th>
                <th>Estado</th>
            </tr>";
    for ($i=0; $i < count($datos_2); $i++){
      $mensualidaTotal += $datos_2[$i]['mensualidad'];
      $moraTotal += $datos_2[$i]['mora'];
      $reconexionTotal += $datos_2[$i]['recorte'];
      $pagoTotal += $datos_2[$i]['totalPagar'];
      $mes = Utils::mesEspañol($datos_2[$i]['mes']);
      $fila = "<tr><td>".$datos_2[$i]['indice']."</td><td>".$datos_2[$i]['cliente']."</td><td>".utf8_decode($datos_2[$i]['servicio'])."</td><td>S/".$datos_2[$i]['mensualidad']."</td><td>S/".$datos_2[$i]['mora']."</td><td>S/".$datos_2[$i]['recorte']."</td><td>".$mes."</td><td>".$datos_2[$i]['fPago']."</td><td>".$datos_2[$i]['comprobante']."</td><td>S/".$datos_2[$i]['totalPagar']."</td><td>Anulado</td></tr>";
      $thead .= $fila;
    }
    echo $thead."<tr><td></td><td></td><td>TOTAL</td><td>S/$mensualidaTotal.00</td><td>S/$moraTotal.00</td><td>S/$reconexionTotal.00</td><td></td><td></td><td></td><td>S/$pagoTotal.00</td></tr></table>";
  }
  public function reportePagosAnualesFecha($anio, $cliente){
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->pagosAnualesFecha($anio, $cliente);
    foreach ($pensiones as $key => $value) {
      $datos['data'][$key] = $value;
    }
    for ($i = 0; $i < count($datos['data']); $i++) {
      $datos['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $datos_2 = $datos['data'];
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=registros-anuales.xls");
    $thead = "<table border='1'>
            <caption>Pagos Anuales</caption>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Contacto</th>
                <th>Servicio</th>
                <th>Mensualidad</th>
                <th>Fecha Inicio</th>
                <th>Fecha Culminacion</th>
                <th>Periodo</th>
                <th>Meses Restantes</th>
            </tr>";
    for ($i=0; $i < count($datos_2); $i++){
      $mes = Utils::mesEspañol($datos_2[$i]['mes']);
      $fila = "<tr style='text-center'><td>".$datos_2[$i]['indice']."</td><td>".$datos_2[$i]['cliente']."</td><td>".$datos_2[$i]['contacto']."</td><td>".utf8_decode($datos_2[$i]['servicio'])."</td><td>S/".$datos_2[$i]['mensualidad']."</td><td>".$datos_2[$i]['fInicio']."</td><td>".$datos_2[$i]['fFin']."</td><td>".$datos_2[$i]['periodo']."</td><td>".$datos_2[$i]['mesesRestantes']."</td>";
      $thead .= $fila;
    }
    echo $thead."</table>";
  }
  public function reportePensionesVencidasFecha($desde, $hasta, $cliente){
    $indice = 1;
    $reportesViewObj = new ReportesView();
    $pensiones = $reportesViewObj->pensionesVencidasFecha($desde, $hasta, $cliente);
    foreach ($pensiones as $key => $value) {
      $datos['data'][$key] = $value;
    }
    for ($i = 0; $i < count($datos['data']); $i++) {
      $datos['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $datos_2 = $datos['data'];
    $mensualidaTotal = 0;
    $moraTotal = 0;
    $reconexionTotal = 0;
    $pagoTotal = 0;
    header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=pagos-realizados-vencidos.xls");
    $thead = "<table border='1'>
            <!-- <caption>Pagos Realizados Vencidos el mes de: ".Utils::mesEspañol(date('m'))."</caption> -->
            <caption>Pagos Realizados Vencidos</caption>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Mensualidad</th>
                <th>Mora</th>
                <th>Reconexion</th>
                <th>Mes</th>
                <th>Fecha Vencimiento</th>
                <th>Fecha Realizado Pago</th>
                <th>Dias de retraso</th>
                <th>Total</th>
            </tr>";
    for ($i=0; $i < count($datos_2); $i++){
      $mes = Utils::mesEspañol($datos_2[$i]['mes']);
      $total = $datos_2[$i]['mensualidad'] + $datos_2[$i]['mora'] + $datos_2[$i]['recorte'];
      $mensualidaTotal += $datos_2[$i]['mensualidad'];
      $moraTotal += $datos_2[$i]['mora'];
      $reconexionTotal += $datos_2[$i]['recorte'];
      $pagoTotal += $total;
      $fila = "<tr style='text-center'><td>".$datos_2[$i]['indice']."</td><td>".$datos_2[$i]['cliente']."</td><td>".utf8_decode($datos_2[$i]['servicio'])."</td><td>S/".$datos_2[$i]['mensualidad']."</td><td>S/".$datos_2[$i]['mora']."</td><td>S/".$datos_2[$i]['recorte']."</td><td>".$mes."</td><td>".$datos_2[$i]['fVencimiento']."</td><td>".$datos_2[$i]['fPago']."</td><td>".$datos_2[$i]['diasRetraso']."</td><td>S/".$total.".00</td></tr>";
      $thead .= $fila;
    }
    echo $thead."<tr><td></td><td></td><td>TOTAL</td><td>S/$mensualidaTotal.00</td><td>S/$moraTotal.00</td><td>S/$reconexionTotal.00</td><td></td><td></td><td></td><td></td><td>S/$pagoTotal.00</td></tr></table>";
  }
}

$reporteViewObj = new ReporteViewController();

if (isset($_SESSION['identity'])) {
  /** ##### PAGOS VIGENTES ##### */
  if ($_GET['method'] == 'pagosVigentes') {
    echo($reporteViewObj->pagosVigentesView());
  }
  if ($_GET['method'] == 'pagosVigentesFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01') : $_GET['desde'];
    $hasta = $_GET['hasta'] == '' ? date('2024-12-31') : $_GET['hasta'];
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->pagosVigentesFecha($desde, $hasta, $cliente));
  }
  if ($_GET['method'] == 'reportePagosVigentes') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01') : $_GET['desde'];
    $hasta = $_GET['hasta'] == '' ? date('2023-12-31') : $_GET['hasta'];
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->reportePagosVigentes($desde, $hasta, $cliente));
  }
  if ($_GET['method'] == 'totalMontoFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01') : $_GET['desde'];
    $hasta = $_GET['hasta'] == '' ? date('2025-12-31') : $_GET['hasta'];
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->totalMontoFecha($desde, $hasta, $cliente));
  }

  /** ##### PAGOS REALIZADOS ##### */
  if ($_GET['method'] == 'pagosRealizados') {
    echo($reporteViewObj->pagosRealizadosView());
  }
  if ($_GET['method'] == 'pagosRealizadosFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01 00:00:00') : $_GET['desde']." 00:00:00";
    $hasta = $_GET['hasta'] == '' ? date('2024-12-31 23:59:59') : $_GET['hasta']." 23:59:59";
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->pagosRealizadosFecha($desde, $hasta, $cliente));
  }
  if ($_GET['method'] == 'totalPagosRealizadosFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01 00:00:00') : $_GET['desde']." 00:00:00";
    $hasta = $_GET['hasta'] == '' ? date('2024-12-31 23:59:59') : $_GET['hasta']." 23:59:59";
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->totalPagosRealizadosFecha($desde, $hasta, $cliente));
  }
  if ($_GET['method'] == 'reportePagosRealizadosFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01 00:00:00') : $_GET['desde']." 00:00:00";
    $hasta = $_GET['hasta'] == '' ? date('2024-12-31 23:59:59') : $_GET['hasta']." 23:59:59";
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->reportePagosRealizadosFecha($desde, $hasta, $cliente));
  }

  /** ##### PAGOS ANULADOS ######### */
  if ($_GET['method'] == 'pagosAnulados') {
    echo($reporteViewObj->pagosAnuladosView());
  }
  if ($_GET['method'] == 'pagosAnuladosFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-m-d 00:00:00') : $_GET['desde']." 00:00:00";
    $hasta = $_GET['hasta'] == '' ? date('Y-m-d 23:59:59') : $_GET['hasta']." 23:59:59";
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->pagosAnuladosFecha($desde, $hasta, $cliente));
  }
  if ($_GET['method'] == 'totalPagosAnuladosFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-m-d 00:00:00') : $_GET['desde']." 00:00:00";
    $hasta = $_GET['hasta'] == '' ? date('Y-m-d 23:59:59') : $_GET['hasta']." 23:59:59";
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->totalPagosAnuladosFecha($desde, $hasta, $cliente));
  }
  if ($_GET['method'] == 'reportePagosAnuladosFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-m-d 00:00:00') : $_GET['desde']." 00:00:00";
    $hasta = $_GET['hasta'] == '' ? date('Y-m-d 23:59:59') : $_GET['hasta']." 23:59:59";
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->reportePagosAnuladosFecha($desde, $hasta, $cliente));
  }

  /** ##### PAGOS ANUALES ##### */
  if ($_GET['method'] == 'pagosAnuales') {
    echo($reporteViewObj->pagosAnualesView());
  }
  if ($_GET['method'] == 'pagosAnualesFecha') {
    $anio = $_GET['anio'] == '' ? date('Y') : $_GET['anio'];
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->pagosAnualesFecha($anio, $cliente));
  }
  if ($_GET['method'] == 'reportePagosAnualesFecha') {
    $anio = $_GET['anio'] == '' ? date('Y') : $_GET['anio'];
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->reportePagosAnualesFecha($anio, $cliente));
  }

  /** ##### PAGOS PENDIENTES VENCIDOS ##### */
  if ($_GET['method'] == 'pagosPendientesVencidos') {
    echo($reporteViewObj->pagosPendientesVencidosView());
  }
  if ($_GET['method'] == 'pagosPendientesVencidosFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01') : $_GET['desde'];
    $hasta = date('Y-m-31');
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    $estado = $_GET['estado'] == '0' ? false : $_GET['estado'];
    echo($reporteViewObj->pagosPendientesVencidosFecha($desde, $hasta, $cliente, $estado));
  }
  if ($_GET['method'] == 'totalPagosPendientesVencidosFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01') : $_GET['desde'];
    $hasta = date('Y-m-31');
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    $estado = $_GET['estado'] == '0' ? false : $_GET['estado'];
    echo($reporteViewObj->totalPagosPendientesVencidosFecha($desde, $hasta, $cliente, $estado));
  }
  if ($_GET['method'] == 'reportePagosPendientesVencidosFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01') : $_GET['desde'];
    $hasta = date('Y-m-31');
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    $estado = $_GET['estado'] == '0' ? false : $_GET['estado'];
    echo($reporteViewObj->reportePagosPendientesVencidosFecha($desde, $hasta, $cliente, $estado));
  }


  /** ##### PAGOS VENCIDOS ##### */
  if ($_GET['method'] == 'pagosVencidos') {
    echo($reporteViewObj->pagosVencidosView());
  }
  if ($_GET['method'] == 'pensionesVencidasFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01') : $_GET['desde'];
    $hasta = $_GET['hasta'] == '' ? date('Y-12-31') : $_GET['hasta'];
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->pensionesVencidasFecha($desde, $hasta, $cliente));
  }
  if ($_GET['method'] == 'totalPagosVencidasFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01 00:00:00') : $_GET['desde']." 00:00:00";
    $hasta = $_GET['hasta'] == '' ? date('2024-12-31 23:59:59') : $_GET['hasta']." 23:59:59";
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->totalPagosVencidasFecha($desde, $hasta, $cliente));
  }
  if ($_GET['method'] == 'reportePensionesVencidasFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01') : $_GET['desde'];
    $hasta = $_GET['hasta'] == '' ? date('2024-12-31') : $_GET['hasta'];
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($reporteViewObj->reportePensionesVencidasFecha($desde, $hasta, $cliente));
  }

  /* ######################### REPORTE PARA SOPORTE ######################### */

  /** ##### SERVICIOS SUSPENDIDOSq ##### */
  if ($_GET['method'] == 'serviciosSuspendidos') {
    echo($reporteViewObj->serviciosSuspendidosView());
  }
  if ($_GET['method'] == 'serviciosSuspendidosFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01') : $_GET['desde'];
    $hasta = $_GET['hasta'] == '' ? date('Y-12-31') : $_GET['hasta'];
    echo($reporteViewObj->serviciosSuspendidosFecha($desde, $hasta));
  }

  /** ##### BAJA DE SERVICIOS ######### */
  if ($_GET['method'] == 'bajaServicios') {
    echo($reporteViewObj->bajaServiciosView());
  }
  if ($_GET['method'] == 'bajaServiciosFecha') {
    $desde = $_GET['desde'] == '' ? date('Y-01-01') : $_GET['desde'];
    $hasta = $_GET['hasta'] == '' ? date('Y-12-31') : $_GET['hasta'];
    echo($reporteViewObj->bajaServiciosFecha($desde, $hasta));
  }

} else {
  //header("Location:../" . $_SESSION['dbname'] . ".php");
  header("Location:../views/sinSesion.php");
}
