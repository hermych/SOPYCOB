<?php
session_start();
require_once "../controllers/ReportesController.php";
require_once "../models/pensiones.php";
require_once "../models/caja.php";
require_once "../helpers/utils.php";

class PensionesController
{
  /** VISTAS */
  public function index()
  {
    require_once "../views/pagos/pensiones.php";
  }
  public function pagosRealizadosView(){
    require_once "../views/pagos/pagosRealizados.php";
  }

  /** METODOS */
  public function listarPensionesMes()
  {
    $indice = 1;
    $pensionesObj2 = new Pensiones();
    $pensiones = $pensionesObj2->listarPensionesMes();
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
  public function anularPension()
  {
    $idPension = ($_POST['idPension']) ? $_POST['idPension'] : false;
    $motivo = ($_POST['motivo']) ? $_POST['motivo'] : false;
    $pensionObj = new Pensiones();
    $result = $pensionObj->anularPension($idPension, $motivo);
    if ($result) {
      $respuesta = [
        'estado' => 'ok',
        'mensaje' => 'La pension ha sido anulada correctamente'
      ];
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al realizar la consulta'
      ];
    }
    return json_encode($respuesta);
  }
  public function pagarPension()
  {
    $respuesta = [];
    $mora = isset($_POST['mora']) ? $_POST['mora'] : '0.00';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : 'Lima - Lima';
    $recorte = isset($_POST['reconexion']) ? $_POST['reconexion'] : '0.00';
    $nroDocCliente = $_POST['nroDocCliente'];
    $nroDocClientePaga = $_POST['nroDocClientePaga'];
    $tipoComprobante = $_POST['comprobante'];
    $idDetallePensiones = $_POST['idDetallePensiones'];
    $nroOperacion = $_POST['nroOperacion'];
    $detallePago = $_POST['detallePago'];
    if ($mora != '0.00') {
      $detallePago = $detallePago . " + mora";
    }
    if ($recorte != '0.00') {
      $detallePago = $detallePago . " + reconexion";
    }
    $clienteServicio = $_POST['clienteServicio'];
    $clientePaga = $_POST['clientePaga'];
    $precioServ = $_POST['precioServ'];
    $totalPago = $_POST['totalPago'];
    $tipoPago = $_POST['tipoPago'];
    $banco = ($_POST['banco']!='0') ? $_POST['banco'] : '';
    $pagoEfectivo = $_POST['montoRecibido'];
    $cambioVuelto = $_POST['cambioVuelto'];
    $fechaPagoRealizado = date('Y-m-d h:i:s');
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $idUsuarioRealizaPago = $_SESSION['identity']->{'idUsuario'};

    if ($_POST['idafectacionigv'] > 0 && $_POST['idafectacionigv'] < 9) {
      $precioSinIGV = round(($totalPago / 1.18), 2, PHP_ROUND_HALF_EVEN);
      $montoIGV = $totalPago - $precioSinIGV;
      $exento = 0;
      $retenido = 0;
      $descuento = 0;
      $totalPagar = $totalPago;
    } else {
      $precioSinIGV = $totalPago;
      $montoIGV = 0;
      $exento = 0;
      $retenido = 0;
      $descuento = 0;
      $totalPagar = $totalPago;
    }
    $totalLetras = Utils::num2letras($totalPagar);

    $cajaObj = new Caja();
    $pensionObj = new Pensiones();

    //$cajaObj->registrarMovimientoCaja($totalPago, $detallePago); /*Esta linea ya no va, peor igual la dejo porsiacaaaaso*/
    $serieComprobante = $pensionObj->pagarPension($nroOperacion, $tipoComprobante, $idDetallePensiones, $nroDocCliente, $nroDocClientePaga, $detallePago, $clienteServicio, $clientePaga, $banco, $totalPago, $tipoPago, $pagoEfectivo, $cambioVuelto, $fechaPagoRealizado, $idSucursal, $idUsuarioRealizaPago, $recorte, $precioSinIGV, $montoIGV, $exento, $retenido, $descuento, $totalPagar, $totalLetras, $mora, $precioServ, $direccion);
    if ($serieComprobante) {
      // tipo de documento de comprobante
      $datos = $pensionObj->jsonFactura($idDetallePensiones);
      if ($serieComprobante[0] == 'B') {
        $cod_tipo_documento = "03";
        // otros datos del json
        if ($_POST['idafectacionigv'] > 0 && $_POST['idafectacionigv'] < 9) {
          $txtNOMBRE_AFECTACION_IGV = "IGV";
          $total_exoneradas = "0.00";
          $sub_total = $datos[1]['precioSinIGV'];
          $total_gravadas = $datos[1]['precioSinIGV'];
        } else {
          $txtNOMBRE_AFECTACION_IGV = "EXO";
          $total_exoneradas = $datos[1]['precioSinIGV'];
          $sub_total = "0.00";
        }
      }
      if ($serieComprobante[0] == 'F') {
        $cod_tipo_documento = "01";
        //OTROS DATOS DEL JSON
        if ($_POST['idafectacionigv'] > 0 && $_POST['idafectacionigv'] < 9) {
          $txtNOMBRE_AFECTACION_IGV = "IGV";
          $total_exoneradas = "0.00";
          $sub_total = $datos[1]['precioSinIGV'];
          $total_gravadas = $datos[1]['precioSinIGV'];
        } else {
          $total_gravadas = "0.00";
          $txtNOMBRE_AFECTACION_IGV = "EXO";
          $total_exoneradas = $datos[1]['precioSinIGV'];
          $sub_total = "0.00";
        }
      }

      $numeroComprobante = str_pad($datos[1]['numeroComprobante'], 8, "0", STR_PAD_LEFT);
      $datos2 = [
        "tipo_operacion" => "0101",
        "total_gravadas" => $total_gravadas,
        "total_inafecta" => "0",
        "total_exoneradas" => $total_exoneradas,
        "total_gratuitas" => "0",
        "total_exportacion" => "0",
        "total_descuento" => $datos[1]['descuento'],
        "sub_total" => $sub_total,
        "porcentaje_igv" => "18.00",
        "total_igv" => $datos[1]['montoIGV'],
        "total_isc" => "0",
        "total_icbper" => "0.00",
        "total_otr_imp" => "0",
        "total" => $datos[1]['montoTotal'],
        "total_letras" => $datos[1]['totalLetras'],
        "nro_guia_remision" => "",
        "cod_guia_remision" => "",
        "nro_otr_comprobante" => "",
        "serie_comprobante" => $datos[1]['serieComprobante'],
        "numero_comprobante" => $numeroComprobante,
        "fecha_comprobante" => $datos[1]['f_comprobante'],
        "fecha_vto_comprobante" => $datos[1]['f_vto_comprobante'],
        "cod_tipo_documento" => $cod_tipo_documento,
        "cod_moneda" => $datos[1]['cod_moneda'],
        "FormaPago" => "Contado",
        "idusursal" => $datos[1]['idusursal'],
        "nombre_sucursal" => $datos[1]['nombre_sucursal'],
        "direccion_sucursal" => $datos[1]['direccion_sucursal'],
        "idusuario" => $datos[1]['idusuario'],
        "vendedor" => $datos[1]['vendedor'],
        "cliente_numerodocumento" => $datos[2]['cliente_numerodocumento'],
        "cliente_nombre" => $datos[2]['cliente_nombre'],
        "cliente_tipodocumento" => $datos[2]['cliente_tipodocumento'],
        "cliente_direccion" => $direccion,
        "cliente_pais" => "PE",
        "cliente_ciudad" => $datos[2]['cliente_ciudad'],
        "cliente_codigoubigeo" => "",
        "cliente_departamento" => $datos[2]['cliente_departamento'],
        "cliente_provincia" => $datos[2]['cliente_provincia'],
        "cliente_distrito" => $datos[2]['cliente_distrito'],
        "codigo_afecta_igv" => "1000",
        "tipo_esquena_name" => "IGV",
        "descuento_global" => "0.00",
        "emisor" => [
          "ruc" => $datos[1]['ruc'],
          "codigo_anexo" => $datos[1]['codigo_anexo']
        ],
        "detalle" => [
          [
            "txtITEM" => 1,
            "txtUNIDAD_MEDIDA_DET" => "ZZ",
            "txtCANTIDAD_DET" => "1.00",
            "txtPRECIO_DET" => $datos[1]['txtPRECIO_DET'],
            "txtSUB_TOTAL_DET" => $datos[1]['txtSUB_TOTAL_DET'],
            "txtPRECIO_TIPO_CODIGO" => "01",
            "txtIGV" => $datos[1]['txtIGV'],
            "txtISC" => "0",
            "txtICBPER_DET" => 0,
            "txtIMPORTE_DET" => $datos[1]['txtIMPORTE_DET'],
            "txtIMPORTE_TOTAL" => $datos[1]['txtIMPORTE_TOTAL'],
            "txtCOD_TIPO_OPERACION" => $datos[1]['txtCOD_TIPO_OPERACION'],
            "txtCOD_TIPO_OPERACION_VALIDA" => $datos[1]['txtCOD_TIPO_OPERACION_VALIDA'],
            "txtPORCENTAJE_IGV" => "18.00",
            "txtCODIGO_DET" => "PS001",
            "txtDESCRIPCION_DET" => $datos[1]['txtDESCRIPCION_DET'],
            "txtPRECIO_SIN_IGV_DET" => $datos[1]['txtPRECIO_SIN_IGV_DET'],
            "txtCOD_PRODUCTO_SUNAT" => "",
            "txtCOD_AFECTACION_IGV" => $datos[1]['codigo_afecta_igv'],
            "txtNOMBRE_AFECTACION_IGV" => $txtNOMBRE_AFECTACION_IGV,
            "txtTIPO_AFECTACION_IGV" => "VAT",
            "txt_IDUNIDADMEDIDA" => "2",
            "txt_IDTIPOAFECTACION" => $_POST['idafectacionigv'],
            "txt_AFECTO_ICBPER" => "0"
          ]
        ],
        "arraynumeros" => null,
        "arraycuotas" => null,
        "arrayfechas" => null,
        "totalcuotas" => null,
      ];
      $reportesObj = new ReporteController();
      $reportesObj->comprobantePago($idDetallePensiones);
      $respuesta = [
        'estado' => 'ok',
        'mensaje' => 'Se ha realizado el pago correctamente'
      ];
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => "Error al realizar el pago"
      ];
    }
    return json_encode($datos2);
  }
  public function servicioXCliente()
  {
    require_once "../views/pagos/clienteServicio.php";
  }
  public function listarPensionesXCliente()
  {
    $id = $_GET['id'];
    $indice = 1;
    $pensionesObj2 = new Pensiones();
    $pensiones = $pensionesObj2->listarPensionesXCliente($id);
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
  public function listarPagosRealizados($desde, $hasta, $cliente){
    $indice = 1;
    $pensionesObj = new Pensiones();
    $pensiones = $pensionesObj->listarPagosRealizados($desde, $hasta, $cliente);
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
  public function cambiarEstadoSunat(){
    $respuesta = [];
    if($_POST){
      $idPension = isset($_POST['idPension']) ? $_POST['idPension'] : false;
      $estado = isset($_POST['estado']) ? $_POST['estado'] : false;
      $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : false;
      if($idPension){
        $pensionObj = new Pensiones();
        $result = $pensionObj->cambiarEstadoSunat($idPension, $estado, $mensaje);
        if($result == '1'){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se cambio el estado en de la pension'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta recibiendo los datos necesarios'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'No existe metodo de envio POST'
      ];
    }
    return json_encode($respuesta);
  }
  public function anularPagoPension(){
    $respuesta = [];
    if (isset($_POST)){
      $idPension = ($_POST['idPension']) ? $_POST['idPension'] : false;
      $motivo = ($_POST['motivo']) ? $_POST['motivo'] : false;
      if ($idPension){
        $pensionObj = new Pensiones();
        $result = $pensionObj->anularPagoPension($idPension, $motivo);
        if($result = 'ok'){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se anulo el pago correctamente'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta en la bd'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta recibiendo los parametros necesarios'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error de comunicacion con el POST'
      ];
    }
    return json_encode($respuesta);
  }
  public function totalMontoPensionesCobrar(){
    $monto = '0.00';
    $pensionObj = new Pensiones();
    $montoArray = $pensionObj->totalMontoPensionesCobrar();
    if($montoArray['monto'] != NULL ) {
      $monto = $montoArray['monto'];
    }
    return json_encode($monto);
  }
  public function totalMontoPagosRealizados($desde, $hasta, $cliente){
    $monto = '0.00';
    $pensionObj = new Pensiones();
    $montoArray = $pensionObj->totalMontoPagosRealizados($desde, $hasta, $cliente);
    if($montoArray['monto'] != NULL ) {
      $monto = $montoArray['monto'];
    }
    return json_encode($monto);
  }
}

$pensionesObj = new PensionesController();
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'pensionesMes') {
    $pensionesObj->index();
  }elseif ($_GET['method'] == 'listarPensionesMes') {
    echo($pensionesObj->listarPensionesMes());
  }elseif ($_GET['method'] == 'anularPension') {
    echo($pensionesObj->anularPension());
  }elseif ($_GET['method'] == 'pagarPension') {
    echo($pensionesObj->pagarPension());
  }elseif ($_GET['method'] == 'clienteServicio') {
    echo($pensionesObj->servicioXCliente());
  }elseif ($_GET['method'] == 'listarPensionesXCliente') {
    echo($pensionesObj->listarPensionesXCliente());
  }elseif($_GET['method'] == 'pagosRealizadosView'){
    echo($pensionesObj->pagosRealizadosView());
  }elseif($_GET['method'] == 'listarPagosRealizados'){
    $desde = $_GET['desde'] == '' ? date('Y-m-d') : $_GET['desde'];
    $hasta = $_GET['hasta'] == '' ? date('Y-m-d') : $_GET['hasta'];
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($pensionesObj->listarPagosRealizados($desde, $hasta, $cliente));
  }elseif($_GET['method'] == 'cambiarEstadoSunat'){
    echo($pensionesObj->cambiarEstadoSunat());
  }elseif($_GET['method'] == 'anularPagoPension'){
    echo($pensionesObj->anularPagoPension());
  }elseif($_GET['method'] == 'totalMontoPensionesCobrar'){
    echo($pensionesObj->totalMontoPensionesCobrar());
  }elseif($_GET['method'] == 'totalMontoPagosRealizados'){
    $desde = $_GET['desde'] == '' ? date('Y-m-d') : $_GET['desde'];
    $hasta = $_GET['hasta'] == '' ? date('Y-m-d') : $_GET['hasta'];
    $cliente = $_GET['cliente'] == '' ? '' : $_GET['cliente'];
    echo($pensionesObj->totalMontoPagosRealizados($desde, $hasta, $cliente));
  }
} else {
  //header("Location:../" . $_SESSION['dbname'] . ".php");
  header("Location:../views/sinSesion.php");
}
