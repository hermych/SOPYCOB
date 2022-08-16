<?php

require_once "../config/db.php";

class Pensiones
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
  }

  /* ##### METODOS ###### */
  public function listarPensionesMes()
  {
    $pensiones = [];
    $mes = date("m");
    $anio = date("Y");
    $consulta = "SELECT detalle_pensiones.*, clientes.nombreCliente, servicios.precio, clientes.nroDocumento, clientes.nombreComercial, clientes.nombreContacto as 'contacto', clientes.nroContacto as 'contactoCel', clientes.nroDocContacto, TIMESTAMPDIFF(DAY, Date_format(now(),'%Y/%m/%d'), detalle_pensiones.fechaVencimiento) AS dias_transcurridos FROM `detalle_pensiones`, clientes_servicios, clientes, servicios WHERE detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes_servicios.idServicio = servicios.idServicio AND detalle_pensiones.estadoPago='pendiente' AND detalle_pensiones.estadoPension='pendiente' AND detalle_pensiones.fechaEmisionRecibo <= '$anio-$mes-31'";
    //$aumto =  "AND detalle_pensiones.fechaEmisionRecibo <= '$anio-$mes-31'";
    $consultar = $this->db->query($consulta);
    $pensiones = $consultar->fetch_all(MYSQLI_ASSOC);
    return $pensiones;
  }
  public function anularPension($idPension, $motivo)
  {
    $result = false;
    $sql = "UPDATE detalle_pensiones SET motivoAnulacion='$motivo', estadoPension='anulado', estadoPago='anulado' WHERE idDetallePensiones='$idPension';";
    $consultar = $this->db->query($sql);
    if ($consultar) {
      $result = true;
    }
    return $result;
  }
  public function pagarPension($nroOperacion, $tipoComprobante, $idDetallePensiones, $nroDocCliente, $nroDocClientePaga,$detallePago, $clienteServicio, $clientePaga, $banco, $totalPago, $tipoPago, $pagoEfectivo, $cambioVuelto, $fechaPagoRealizado, $idSucursal, $idUsuarioRealizaPago, $recorte, $precioSinIGV, $montoIGV, $exento, $retenido, $descuento, $totalPagar, $totalLetras, $mora, $precioServ, $direccion)
  {
    $respuesta = false;

    if($tipoComprobante == 'ticket'){
      $sql1 = "SELECT tirajes.idTiraje, tirajes.serie, tirajes.idSucursal, tirajes.disponible, (tirajes.utilizados+1) as 'numComprobante', comprobantes.nombreComprobante FROM tirajes, comprobantes WHERE tirajes.idSucursal = $idSucursal AND tirajes.idComprobante = 3 AND tirajes.idComprobante = comprobantes.idComprobante";
    }elseif ($tipoComprobante == 'boleta'){
      $sql1 = "SELECT tirajes.idTiraje, tirajes.serie, tirajes.idSucursal, tirajes.disponible, (tirajes.utilizados+1) as 'numComprobante', comprobantes.nombreComprobante FROM tirajes, comprobantes WHERE tirajes.idSucursal = $idSucursal AND tirajes.idComprobante = 1 AND tirajes.idComprobante = comprobantes.idComprobante";
    }else{
      $sql1 = "SELECT tirajes.idTiraje, tirajes.serie, tirajes.idSucursal, tirajes.disponible, (tirajes.utilizados+1) as 'numComprobante', comprobantes.nombreComprobante FROM tirajes, comprobantes WHERE tirajes.idSucursal = $idSucursal AND tirajes.idComprobante = 2 AND tirajes.idComprobante = comprobantes.idComprobante";
    }

    $consultar1 = $this->db->query($sql1);
    $tiraje = $consultar1->fetch_assoc();
    $numDisponible = $tiraje['disponible'];
    $idTiraje = $tiraje['idTiraje'];
    $serieComprobante = $tiraje['serie'];
    $numComprobante = $tiraje['numComprobante'];
    $tipoComprobante = $tiraje['nombreComprobante'];

    // Registrar movimiento en caja_movimiento
    $fechaActual = date('Y-m-d');
    $fechaHora = date('Y-m-d h:i:s');
    $idSucursal = $_SESSION['identity']->{'idSucursal'};
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    // ######Obtener id de caja abierta ###########
    $sql_idCaja = "SELECT * FROM `cajas` WHERE estado = 'abierto' AND idUsuario = '$idUsuario' AND fechaApertura LIKE '%$fechaActual%' AND  idSucursal='$idSucursal';";
    $consul_sql_idCaja = $this->db->query($sql_idCaja);
    $cajaActual = ($consul_sql_idCaja->fetch_all(MYSQLI_ASSOC))[0];
    $idCaja = $cajaActual['idCaja'];

    if ($tipoPago == 'efectivo') {
      $sql2 = "UPDATE detalle_pensiones SET direccionPaga='$direccion', detallePago='$detallePago', nroOperacion='$nroOperacion', serieComprobante='$serieComprobante', numeroComprobante='$numComprobante', tipoComprobante='$tipoComprobante', fechaPagoRealizado='$fechaPagoRealizado', tipoPago='$tipoPago', precioSinIGV='$precioSinIGV', nroDocumentoPaga = '$nroDocClientePaga', clientePaga = '$clientePaga', montoIGV='$montoIGV', exento='$exento', retenido='$retenido', totalPagar='$totalPagar', totalLetras='$totalLetras', pagoEfectivo='$pagoEfectivo', pago_tarjeta='0.00', cambioVuelto='$cambioVuelto', idCajero='$idCaja', idSucursal='$idSucursal', mora='$mora', precioServicio='$precioServ', recorte='$recorte', estadoPago='pagado', estadoPension ='pagado' WHERE idDetallePensiones='$idDetallePensiones';";
    } else if ($tipoPago == 'tarjeta' || $tipoPago == 'transferencia' || $tipoPago == 'deposito' ) {
      $sql2 = "UPDATE detalle_pensiones SET direccionPaga='$direccion', detallePago='$detallePago', nroOperacion='$nroOperacion', serieComprobante='$serieComprobante', numeroComprobante='$numComprobante', tipoComprobante='$tipoComprobante', fechaPagoRealizado='$fechaPagoRealizado', tipoPago='$tipoPago', precioSinIGV='$precioSinIGV', nroDocumentoPaga = '$nroDocClientePaga', clientePaga = '$clientePaga', montoIGV='$montoIGV', exento='$exento', retenido='$retenido', totalPagar='$totalPagar', totalLetras='$totalLetras', pagoEfectivo='0.00', pago_tarjeta='$pagoEfectivo', banco='$banco',cambioVuelto='$cambioVuelto', idCajero='$idCaja', idSucursal='$idSucursal', mora='$mora', precioServicio='$precioServ', recorte='$recorte', estadoPago='pagado', estadoPension ='pagado' WHERE idDetallePensiones='$idDetallePensiones';";
    } else{
      $sql2 = "UPDATE detalle_pensiones SET direccionPaga='$direccion', detallePago='$detallePago', nroOperacion='$nroOperacion', serieComprobante='$serieComprobante', numeroComprobante='$numComprobante', tipoComprobante='$tipoComprobante', fechaPagoRealizado='$fechaPagoRealizado', tipoPago='$tipoPago', nroDocumentoPaga = '$nroDocClientePaga', clientePaga = '$clientePaga', precioSinIGV='$precioSinIGV', montoIGV='$montoIGV', exento='$exento', retenido='$retenido', totalPagar='$totalPagar', totalLetras='$totalLetras', pagoEfectivo='0.00', pago_tarjeta='$pagoEfectivo',cambioVuelto='$cambioVuelto', idCajero='$idCaja', idSucursal='$idSucursal', mora='$mora', precioServicio='$precioServ', recorte='$recorte', estadoPago='pagado', estadoPension ='pagado' WHERE idDetallePensiones='$idDetallePensiones';";
    }

    $consultar2 = $this->db->query($sql2);

    $newNumDisponible = $numDisponible - 1;
    $sql3 = "UPDATE tirajes SET disponible=$newNumDisponible, utilizados='$numComprobante' WHERE  idTiraje = '$idTiraje'";
    $consultar3 = $this->db->query($sql3);
    // ###### Insertar movimiento de caja #######
    $sql_insertMovimiento = "INSERT INTO `caja_movimiento`(`idCaja`, `idPension`, `montoMovimiento`, `descripcionMovimiento`, `tipo`, `fechaMovimiento`) VALUES ('$idCaja','$idDetallePensiones','$totalPagar','$detallePago','ingreso','$fechaHora')";
    $cons_insertMovimiento = $this->db->query($sql_insertMovimiento);

    // ########### Validar resultados de las consultas ###########
    if ($consultar1 && $consultar2 && $consultar3 && $cons_insertMovimiento) {
      $respuesta = $serieComprobante;
    }
    return $respuesta;
  }
  public function jsonFactura($idDetallePensiones)
  {
    $sql1 = "SELECT detalle_pensiones.precioSinIGV, detalle_pensiones.montoIGV, detalle_pensiones.exento as 'descuento', detalle_pensiones.exento as 'exoneradas', detalle_pensiones.totalPagar as 'montoTotal', detalle_pensiones.totalLetras, detalle_pensiones.serieComprobante, detalle_pensiones.numeroComprobante, DATE_FORMAT(detalle_pensiones.fechaPagoRealizado,'%Y-%m-%d') AS 'f_comprobante', DATE_FORMAT(detalle_pensiones.fechaPagoRealizado,'%Y-%m-%d') AS 'f_vto_comprobante', currency.currencyISO as 'cod_moneda', sucursales.idSucursal AS 'idusursal', sucursales.nombre as 'nombre_sucursal', sucursales.direccion as 'direccion_sucursal', usuarios.idUsuario as 'idusuario', (SELECT CONCAT(usuarios.nombre,' ',usuarios.apellido) FROM usuarios, detalle_pensiones as dtp, cajas as caj WHERE dtp.idCajero = caj.idCaja AND caj.idUsuario = usuarios.idUsuario LIMIT 1) as 'vendedor', tipoafectacion_igv.codigotributo as 'codigo_afecta_igv', datos_empresa.numeroRuc as 'ruc', sucursales.codigoFiscal as 'codigo_anexo', detalle_pensiones.totalPagar as 'txtPRECIO_DET', detalle_pensiones.precioSinIGV as 'txtSUB_TOTAL_DET', detalle_pensiones.montoIGV as 'txtIGV', detalle_pensiones.precioSinIGV as 'txtIMPORTE_DET', detalle_pensiones.totalPagar as 'txtIMPORTE_TOTAL', tipoafectacion_igv.codigo_igv as 'txtCOD_TIPO_OPERACION', tipoafectacion_igv.codigo_igv as 'txtCOD_TIPO_OPERACION_VALIDA', detalle_pensiones.detallePago as 'txtDESCRIPCION_DET', detalle_pensiones.precioSinIGV as 'txtPRECIO_SIN_IGV_DET', tipoafectacion_igv.codigotributo AS 'txtCOD_AFECTACION_IGV' FROM `detalle_pensiones`, tipo_documentos, clientes_servicios, clientes, cajas, datos_empresa, sucursales, currency, usuarios, tipoafectacion_igv WHERE detalle_pensiones.idDetallePensiones = '$idDetallePensiones' AND detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes.idTipoDocumento = tipo_documentos.idTipoDocumento AND detalle_pensiones.idCajero = cajas.idCaja AND cajas.idSucursal = sucursales.idSucursal AND cajas.idUsuario = usuarios.idUsuario AND clientes_servicios.idafectacionigv = tipoafectacion_igv.idafectacionigv";

    $sql2 = "select detalle_pensiones.nroDocumentoPaga as 'cliente_numerodocumento', detalle_pensiones.clientePaga as 'cliente_nombre', if(LENGTH(detalle_pensiones.nroDocumentoPaga)=8,'1','6') as 'cliente_tipodocumento', clientes.direccionCliente as 'cliente_direccion', departamentos.nombreDepa as 'cliente_ciudad', departamentos.nombreDepa as 'cliente_departamento', provincias.nombreProvincia as 'cliente_provincia', distritos.nombreDistrito as 'cliente_distrito' FROM clientes, detalle_pensiones, clientes_servicios, tipo_documentos, departamentos, provincias, distritos WHERE idDetallePensiones = '$idDetallePensiones' AND detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes.idTipoDocumento = tipo_documentos.idTipoDocumento AND clientes.idDepartamento = departamentos.idDepartamento AND clientes.idProvincia = provincias.idProvincia AND clientes.idDistrito = distritos.idDistrito";

    $consulta1 = $this->db->query($sql1);
    $consulta2 = $this->db->query($sql2);

    $datos["1"] = ($consulta1->fetch_all(MYSQLI_ASSOC))[0];
    $datos["2"] = ($consulta2->fetch_all(MYSQLI_ASSOC))[0];
    return $datos;

  }
  public function listarPensionesXCliente($id){
    $sql_pensiones = "SELECT clientes.nombreCliente as 'cliente', detalle_pensiones.detallePago as 'servicio', detalle_pensiones.fechaPago, TIMESTAMPDIFF(DAY, Date_format(now(),'%Y/%m/%d'), detalle_pensiones.fechaVencimiento) AS dias_transcurridos, detalle_pensiones.estadoPension, date_format(detalle_pensiones.fechaPagoRealizado, '%d-%m-%Y') as 'fPagoRealizado' FROM detalle_pensiones, clientes_servicios, clientes, servicios WHERE detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idServicio = servicios.idServicio AND clientes_servicios.idCliente = clientes.idCliente AND detalle_pensiones.idClienteServicio = $id";
    $listar = $this->db->query($sql_pensiones);
    $pensiones = $listar->fetch_all(MYSQLI_ASSOC);
    return $pensiones;
  }
  public function listarPagosRealizados($desde, $hasta, $cliente){
    $sql_pagosRealizados = "SELECT detalle_pensiones.idDetallePensiones as idPension, clientes.nombreComercial as 'cliente', replace(detalle_pensiones.detallePago, 'Servicio de: ', '') as 'servicio', servicios.precio as 'mensualidad', DATE_FORMAT(detalle_pensiones.fechaPago , '%m') as 'mes', DATE_FORMAT(detalle_pensiones.fechaPagoRealizado , '%d-%m-%Y') as 'fPago', detalle_pensiones.tipoComprobante,detalle_pensiones.serieComprobante as 'serie', detalle_pensiones.numeroComprobante as 'numero', CONCAT(detalle_pensiones.serieComprobante,'-', LPAD(detalle_pensiones.numeroComprobante,8,'0')) as 'comprobante',detalle_pensiones.mora, detalle_pensiones.recorte, detalle_pensiones.totalPagar, detalle_pensiones.estadoPension as 'estado', detalle_pensiones.estadoSunat, CONCAT(detalle_pensiones.serieComprobante,'-', LPAD(detalle_pensiones.numeroComprobante,8,'0')) as 'comprobante', detalle_pensiones.serieComprobante as 'serie',detalle_pensiones.tipoPago as 'medioPago', detalle_pensiones.banco, detalle_pensiones.nroOperacion, usuarios.nombre FROM detalle_pensiones, clientes_servicios, clientes, servicios, usuarios, cajas WHERE detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes_servicios.idServicio = servicios.idServicio AND detalle_pensiones.idCajero = cajas.idCaja AND cajas.idUsuario = usuarios.idUsuario AND detalle_pensiones.estadoPension = 'pagado' AND fechaPagoRealizado BETWEEN '$desde 00:00:00' AND '$hasta 23:59:59' AND clientes.nombreComercial LIKE '%$cliente%' ORDER BY detalle_pensiones.fechaPagoRealizado DESC";
    $listar = $this->db->query($sql_pagosRealizados);
    $pensiones = $listar->fetch_all(MYSQLI_ASSOC);
    return $pensiones;
  }
  public function cambiarEstadoSunat($idPension, $estado, $mensaje){
    $sql_estadoSunat = "UPDATE `detalle_pensiones` SET `estadoSunat`='$estado', `mensajeSunat`='$mensaje' WHERE `idDetallePensiones`='$idPension'";
    $cambiar = $this->db->query($sql_estadoSunat);
    return $cambiar;
  }
  public function anularPagoPension($idPension, $motivo){
    $registrar_anulacion = $this->registrarPagoAnulado($idPension, $motivo);
    $respuesta = 'error';
    if($registrar_anulacion){
      $sql_anularPago = "UPDATE `detalle_pensiones` SET `fechaPagoRealizado` = NULL, `tipoPago` = NULL, `banco` = NULL, `nroOperacion` = NULL, `nroDocumentoPaga` = NULL, `clientePaga` = NULL, `direccionPaga` = NULL, `serieComprobante` = NULL, `numeroComprobante` = NULL, `tipoComprobante` = NULL, `precioSinIGV` = NULL, `montoIGV` = NULL, `totalPagar` = NULL, `totalLetras` = NULL, `pagoEfectivo` = NULL, `pago_tarjeta` = NULL, `cambioVuelto` = NULL, `idCajero` = NULL, `idSucursal` = NULL, `estadoSunat` = NULL, `mensajeSunat` = NULL, `estadoPAgo` = 'pendiente', `estadoPension` = 'pendiente' WHERE `detalle_pensiones`.`idDetallePensiones` = '$idPension';";
      $anular = $this->db->query($sql_anularPago);
      if($anular){
        $respuesta = 'ok';
      }else{
        $respuesta = "error_borrar_datos_pension";
      }
    }else{
      $respuesta = 'error_registrar_pago';
    }
    return $respuesta;
  }
  public function registrarPagoAnulado($idPension, $motivo){
    // ###### anular movimiento de caja #######
    $sql_anularMov = "UPDATE `caja_movimiento` SET `tipo`='anulado' WHERE idPension = '$idPension'";
    $cons_anulMov = $this->db->query($sql_anularMov);

    $sql_buscarPension = "SELECT * FROM `detalle_pensiones` WHERE idDetallePensiones = '$idPension'";
    $buscar = $this->db->query($sql_buscarPension);
    $pension = $buscar->fetch_all(MYSQLI_ASSOC)[0];
    $idClienteServicio = $pension['idClienteServicio'];
    $fechaEmisionRecibo = $pension['fechaEmisionRecibo'];
    $fechaPago = $pension['fechaPago'];
    $fechaVencimiento = $pension['fechaVencimiento'];
    $fechaPagoRealizado = $pension['fechaPagoRealizado'];
    $fechaRegistro = $pension['fechaRegistro'];
    $detallePago = $pension['detallePago'];
    $tipoPago = $pension['tipoPago'];
    $banco = $pension['banco'];
    $nroOperacion = $pension['nroOperacion'];
    $nroDocumentoPaga = $pension['nroDocumentoPaga'];
    $clientePaga = $pension['clientePaga'];
    $direccionPaga = $pension['direccionPaga'];
    $serieComprobante = $pension['serieComprobante'];
    $numeroComprobante = $pension['numeroComprobante'];
    $tipoComprobante = $pension['tipoComprobante'];
    $precioSinIGV = $pension['precioSinIGV'];
    $montoIGV = $pension['montoIGV'];
    $exento = $pension['exento'];
    $retenido = $pension['retenido'];
    $totalPagar = $pension['totalPagar'];
    $totalLetras = $pension['totalLetras'];
    $pagoEfectivo = $pension['pagoEfectivo'];
    $pago_tarjeta = $pension['pago_tarjeta'];
    $cambioVuelto = $pension['cambioVuelto'];
    $idUsuario = $pension['idUsuario'];
    $idCajero = $pension['idCajero'];
    $idSucursal = $pension['idSucursal'];
    $fechaAnulacion= date('Y-m-d h:i:s');
    $precioServicio = $pension['precioServicio'];
    $mora = $pension['mora'];
    $recorte = $pension['recorte'];
    $idafectacionigv = $pension['idafectacionigv'];
    $motivoAnulacion = $motivo;

    $sql_insertarAnulacion = "INSERT INTO `pagos_anulados`(`idClienteServicio`, `fechaEmisionRecibo`, `fechaPago`, `fechaVencimiento`, `fechaPagoRealizado`, `fechaRegistro`, `detallePago`, `tipoPago`, `banco`, `nroOperacion`, `nroDocumentoPaga`, `clientePaga`, `direccionPaga`, `serieComprobante`, `numeroComprobante`, `tipoComprobante`, `precioSinIGV`, `montoIGV`, `exento`, `retenido`, `totalPagar`, `totalLetras`, `pagoEfectivo`, `pago_tarjeta`, `cambioVuelto`, `idUsuario`, `idCajero`, `idSucursal`, `precioServicio`, `mora`, `recorte`, `idafectacionigv`, `motivoAnulacion`, `fechaAnulacion`) VALUES ('$idClienteServicio','$fechaEmisionRecibo','$fechaPago','$fechaVencimiento','$fechaPagoRealizado','$fechaRegistro','$detallePago','$tipoPago','$banco','$nroOperacion','$nroDocumentoPaga','$clientePaga','$direccionPaga','$serieComprobante','$numeroComprobante','$tipoComprobante','$precioSinIGV','$montoIGV','$exento','$retenido','$totalPagar','$totalLetras','$pagoEfectivo','$pago_tarjeta','$cambioVuelto','$idUsuario','$idCajero','$idSucursal','$precioServicio','$mora','$recorte','$idafectacionigv','$motivoAnulacion','$fechaAnulacion')";
    $consultar = $this->db->query($sql_insertarAnulacion);
    if ($consultar) {
      $result = true;
    }
    return $result;
  }
  public function totalMontoPensionesCobrar(){
    $mes = date("m");
    $anio = date("Y");
    $sql_totalMonto = "SELECT SUM(detalle_pensiones.precioServicio) as 'monto' FROM `detalle_pensiones`, clientes_servicios, clientes, servicios WHERE detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes_servicios.idServicio = servicios.idServicio AND detalle_pensiones.estadoPago='pendiente' AND detalle_pensiones.estadoPension='pendiente' AND detalle_pensiones.fechaEmisionRecibo <= '$anio-$mes-31'";
    $consultar = $this->db->query($sql_totalMonto);
    $monto = ($consultar->fetch_all(MYSQLI_ASSOC))[0];
    return $monto;
  }
  public function totalMontoPagosRealizados($desde, $hasta, $cliente){
    $sql_totalMonto = "SELECT SUM(detalle_pensiones.totalPagar) as 'monto' FROM `detalle_pensiones`, clientes_servicios, clientes, servicios WHERE detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes_servicios.idServicio = servicios.idServicio AND detalle_pensiones.estadoPago='pagado' AND detalle_pensiones.estadoPension='pagado' AND detalle_pensiones.fechaPagoRealizado BETWEEN '$desde 00:00:00' AND '$hasta 23:59:59' AND clientes.nombreComercial LIKE '%$cliente%'";
    $consultar = $this->db->query($sql_totalMonto);
    $monto = ($consultar->fetch_all(MYSQLI_ASSOC))[0];
    return $monto;
  }
}
