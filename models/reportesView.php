<?php

require_once "../config/db.php";
class ReportesView
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']);
  }

  /* ##### METODOS ###### */
  /** #### PAGOS VIGENTES #### */
  public function pagosVigentesFecha($desde, $hasta, $cliente){
    $sql_pagosVigentes = "SELECT detalle_pensiones.idDetallePensiones, clientes.nombreComercial  as 'cliente', clientes.nombreContacto as 'contacto', clientes.celularCliente as 'celular' ,servicios.nombreServicio as 'servicio', servicios.precio as 'mensualidad', DATE_FORMAT(detalle_pensiones.fechaPago , '%M') as 'mes', detalle_pensiones.estadoPension as 'estado', DATE_FORMAT(detalle_pensiones.fechaEmisionRecibo , '%d-%m-%Y') as 'fEmision', DATE_FORMAT(detalle_pensiones.fechaVencimiento , '%d-%m-%Y') as 'fVencimiento' FROM detalle_pensiones, clientes_servicios, clientes, servicios WHERE detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes_servicios.idServicio = servicios.idServicio AND detalle_pensiones.estadoPension = 'pendiente' AND detalle_pensiones.fechaEmisionRecibo >= '$desde' AND detalle_pensiones.fechaEmisionRecibo <= '$hasta'";
    if($cliente != ''){
      $sql_pagosVigentes = "$sql_pagosVigentes AND clientes.nombreComercial LIKE '%$cliente%' ORDER BY detalle_pensiones.fechaEmisionRecibo ASC";
    }else{
      $sql_pagosVigentes = "$sql_pagosVigentes  ORDER BY detalle_pensiones.fechaEmisionRecibo ASC";
    }
    $listar = $this->db->query($sql_pagosVigentes);
    $pensiones = $listar->fetch_all(MYSQLI_ASSOC);
    return $pensiones;
  }
  public function totalMontoFecha($desde, $hasta, $cliente){
    $sql_totalMonto = "SELECT SUM(precioServicio) as 'monto' FROM detalle_pensiones, clientes_servicios, clientes WHERE fechaEmisionRecibo >= '$desde' AND fechaEmisionRecibo <= '$hasta' AND detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes.nombreComercial LIKE '%$cliente%' AND detalle_pensiones.estadoPago = 'pendiente' AND detalle_pensiones.estadoPension = 'pendiente' ";
    $consultar = $this->db->query($sql_totalMonto);
    $monto = ($consultar->fetch_all(MYSQLI_ASSOC))[0];
    return $monto;
  }

  /** ##### PAGOS REALIZADOS ##### */
  public function pagosRealizadosFecha($desde, $hasta, $cliente){
    $sql_pagosRealizados = "SELECT clientes.nombreComercial as 'cliente', servicios.nombreServicio as 'servicio',  servicios.precio as 'mensualidad', DATE_FORMAT(detalle_pensiones.fechaPago , '%m') as 'mes', DATE_FORMAT(detalle_pensiones.fechaPagoRealizado , '%d-%m-%Y') as 'fPago', CONCAT(detalle_pensiones.serieComprobante,'-', LPAD(detalle_pensiones.numeroComprobante,8,'0')) as 'comprobante',detalle_pensiones.mora, detalle_pensiones.recorte, detalle_pensiones.totalPagar,  detalle_pensiones.estadoPension as 'estado', detalle_pensiones.tipoPago as 'medioPago', detalle_pensiones.banco, detalle_pensiones.nroOperacion, usuarios.nombre FROM detalle_pensiones, clientes_servicios, clientes, servicios, usuarios, cajas WHERE detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes_servicios.idServicio = servicios.idServicio AND detalle_pensiones.idCajero = cajas.idCaja AND cajas.idUsuario = usuarios.idUsuario AND detalle_pensiones.estadoPension = 'pagado' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
    if($cliente != ''){
      $sql_pagosRealizados = "$sql_pagosRealizados AND clientes.nombreComercial LIKE '%$cliente%' ORDER BY detalle_pensiones.fechaPagoRealizado ASC";
    }else{
      $sql_pagosRealizados = "$sql_pagosRealizados ORDER BY detalle_pensiones.fechaPagoRealizado ASC";
    }
    $listar = $this->db->query($sql_pagosRealizados);
    $pensiones = $listar->fetch_all(MYSQLI_ASSOC);
    return $pensiones;
  }
  public function totalPagosRealizadosFecha($desde, $hasta, $cliente){
    $montos = [];
    $sql_totalMora = "SELECT SUM(detalle_pensiones.mora) as 'mora' FROM detalle_pensiones WHERE detalle_pensiones.estadoPension = 'pagado' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
    $sql_recorte = "SELECT SUM(detalle_pensiones.recorte) as 'recorte' FROM detalle_pensiones WHERE detalle_pensiones.estadoPension = 'pagado' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
    $sql_pension = "SELECT SUM(detalle_pensiones.precioServicio) as 'mensualidad' FROM detalle_pensiones WHERE detalle_pensiones.estadoPension = 'pagado' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
    $sql_global = "SELECT SUM(detalle_pensiones.totalPagar) as 'global' FROM detalle_pensiones WHERE detalle_pensiones.estadoPension = 'pagado' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";

    if($cliente != ''){
      $sql_pension = "SELECT SUM(detalle_pensiones.precioServicio) as 'mensualidad' FROM detalle_pensiones, clientes_servicios, clientes WHERE detalle_pensiones.estadoPension = 'pagado' AND detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes.nombreComercial LIKE '%$cliente%' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
      $sql_recorte = "SELECT SUM(detalle_pensiones.recorte) as 'recorte' FROM detalle_pensiones, clientes_servicios, clientes WHERE detalle_pensiones.estadoPension = 'pagado' AND detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes.nombreComercial LIKE '%$cliente%' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
      $sql_totalMora = "SELECT SUM(detalle_pensiones.mora) as 'mora' FROM detalle_pensiones, clientes_servicios, clientes WHERE detalle_pensiones.estadoPension = 'pagado' AND detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes.nombreComercial LIKE '%$cliente%' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
      $sql_global = "SELECT SUM(detalle_pensiones.totalPagar) as 'global' FROM detalle_pensiones, clientes_servicios, clientes WHERE detalle_pensiones.estadoPension = 'pagado' AND detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes.nombreComercial LIKE '%$cliente%' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
    }

    $cons_mora = $this->db->query($sql_totalMora);
    $cons_recorte = $this->db->query($sql_recorte);
    $cons_pension = $this->db->query($sql_pension);
    $cons_global = $this->db->query($sql_global);

    $mora = ($cons_mora->fetch_all(MYSQLI_ASSOC))[0]['mora'];
    $recorte = ($cons_recorte->fetch_all(MYSQLI_ASSOC))[0]['recorte'];
    $mensualidad = ($cons_pension->fetch_all(MYSQLI_ASSOC))[0]['mensualidad'];
    $global = ($cons_global->fetch_all(MYSQLI_ASSOC))[0]['global'];

    $montos = [
      'mora' => $mora,
      'recorte' => $recorte,
      'pension' => $mensualidad,
      'global' => $global,
    ];
    return $montos;
  }

  /** #### PAGOS ANULADOS #### */
  public function pagosAnuladosFecha($desde, $hasta, $cliente){
    $sql_pagosAnulados = "SELECT clientes.nombreComercial as 'cliente', servicios.nombreServicio as 'servicio', pagos_anulados.precioServicio as 'mensualidad', DATE_FORMAT(pagos_anulados.fechaPago , '%m') as 'mes', DATE_FORMAT(pagos_anulados.fechaPagoRealizado , '%d-%m-%Y') as 'fPago', CONCAT(pagos_anulados.serieComprobante,'-', LPAD(pagos_anulados.numeroComprobante,8,'0')) as 'comprobante',pagos_anulados.mora, pagos_anulados.recorte, pagos_anulados.totalPagar, pagos_anulados.estadoPension as 'estado', pagos_anulados.tipoPago as 'medioPago', pagos_anulados.banco, pagos_anulados.nroOperacion, usuarios.nombre FROM pagos_anulados, clientes_servicios, clientes, servicios, usuarios, cajas WHERE pagos_anulados.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes_servicios.idServicio = servicios.idServicio AND pagos_anulados.idCajero = cajas.idCaja AND cajas.idUsuario = usuarios.idUsuario AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
    if($cliente != ''){
      $sql_pagosAnulados = "$sql_pagosAnulados AND clientes.nombreComercial LIKE '%$cliente%' ORDER BY pagos_anulados.fechaPagoRealizado ASC";
    }else{
      $sql_pagosAnulados = "$sql_pagosAnulados ORDER BY pagos_anulados.fechaPagoRealizado ASC";
    }
    $listar = $this->db->query($sql_pagosAnulados);
    $anulados = $listar->fetch_all(MYSQLI_ASSOC);
    return $anulados;
  }
  public function totalPagosAnuladosFecha($desde, $hasta, $cliente){
    $montos = [];
    $sql_totalMora = "SELECT SUM(pagos_anulados.mora) as 'mora' FROM pagos_anulados  WHERE fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
    $sql_recorte = "SELECT SUM(pagos_anulados.recorte) as 'recorte' FROM pagos_anulados  WHERE fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
    $sql_pension = "SELECT SUM(pagos_anulados.precioServicio) as 'mensualidad' FROM pagos_anulados  WHERE fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
    $sql_global = "SELECT SUM(pagos_anulados.totalPagar) as 'global' FROM pagos_anulados  WHERE fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";

    if($cliente != ''){
      $sql_pension = "SELECT SUM(pagos_anulados.precioServicio) as 'mensualidad' FROM pagos_anulados, clientes_servicios, clientes WHERE pagos_anulados.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes.nombreComercial LIKE '%$cliente%' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
      $sql_recorte = "SELECT SUM(pagos_anulados.recorte) as 'recorte' FROM pagos_anulados, clientes_servicios, clientes WHERE pagos_anulados.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes.nombreComercial LIKE '%$cliente%' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
      $sql_totalMora = "SELECT SUM(pagos_anulados.mora) as 'mora' FROM pagos_anulados, clientes_servicios, clientes WHERE pagos_anulados.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes.nombreComercial LIKE '%$cliente%' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
      $sql_global = "SELECT SUM(pagos_anulados.totalPagar) as 'global' FROM pagos_anulados, clientes_servicios, clientes WHERE pagos_anulados.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes.nombreComercial LIKE '%$cliente%' AND fechaPagoRealizado BETWEEN '$desde' AND '$hasta'";
    }
    
    $cons_mora = $this->db->query($sql_totalMora);
    $cons_recorte = $this->db->query($sql_recorte);
    $cons_pension = $this->db->query($sql_pension);
    $cons_global = $this->db->query($sql_global);

    $mora = ($cons_mora->fetch_all(MYSQLI_ASSOC))[0]['mora'];
    $recorte = ($cons_recorte->fetch_all(MYSQLI_ASSOC))[0]['recorte'];
    $mensualidad = ($cons_pension->fetch_all(MYSQLI_ASSOC))[0]['mensualidad'];
    $global = ($cons_global->fetch_all(MYSQLI_ASSOC))[0]['global'];

    $montos = [
      'mora' => $mora,
      'recorte' => $recorte,
      'pension' => $mensualidad,
      'global' => $global,
    ];
    return $montos;
  }

  /** ###### PAGOS ANUALES ######## */
  public function pagosAnualesFecha($anio, $cliente){
    $sql_pagosAnuales = "SELECT c.nombreComercial as 'cliente', c.nombreContacto as 'contacto', s.nombreServicio as 'servicio', s.precio as 'mensualidad',cs.fechaInicioServicio as 'fInicio', DATE_ADD(cs.fechaInicioServicio, interval cs.tiempoContrato month) as 'fFin', tiempoContrato as 'periodo',(SELECT COUNT(idDetallePensiones) FROM `detalle_pensiones` WHERE detalle_pensiones.idClienteServicio = cs.idClienteServicio AND estadoPago = 'pendiente') as 'mesesRestantes', IF((DATE_ADD(cs.fechaInicioServicio, interval cs.tiempoContrato month) >= curdate() ), 'vigente', 'vencido') as 'estado' FROM `clientes_servicios` as cs, clientes as c, servicios as s WHERE cs.idCliente = c.idCliente AND cs.idServicio = s.idServicio AND cs.fechaInicioServicio LIKE '%$anio%' AND c.nombreComercial LIKE '%$cliente%'";
    $listar = $this->db->query($sql_pagosAnuales);
    $pensiones = $listar->fetch_all(MYSQLI_ASSOC);
    return $pensiones;
  }

  /** ###### PAGOS PENDIENTES DE PENSIONES VENCIDAS ######## */
  public function pagosPendientesVencidosFecha($desde, $hasta, $cliente, $estado){
    $sql_pagosPendVencidas = "SELECT clientes.nombreComercial as 'cliente', clientes.nombreContacto as 'contacto', clientes.nroContacto as 'celular',  replace(detalle_pensiones.detallePago, 'Servicio de: ', '')  as 'servicio', detalle_pensiones.fechaEmisionRecibo as 'fEmision', detalle_pensiones.fechaVencimiento as 'fVencimiento',DATE_FORMAT(detalle_pensiones.fechaPagoRealizado, '%Y-%m-%d') as 'frealizado', IF(curdate() > detalle_pensiones.fechaVencimiento, 'vencido', 'vigente') as 'estados', servicios.precio FROM `clientes_servicios`, servicios, clientes, detalle_pensiones WHERE detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes_servicios.idServicio = servicios.idServicio AND detalle_pensiones.estadoPension = 'pendiente' AND detalle_pensiones.fechaVencimiento > '$desde' AND detalle_pensiones.fechaVencimiento < '$hasta' AND clientes.nombreComercial LIKE '%$cliente%' ";
    if($estado){
      $sql_pagosPendVencidas = $sql_pagosPendVencidas . " AND IF(curdate() > detalle_pensiones.fechaVencimiento, 'vencido', 'vigente')='$estado' ORDER BY `fEmision` ASC";
    }else{
      $sql_pagosPendVencidas = $sql_pagosPendVencidas . " ORDER BY `fEmision` ASC";
    }
    $listar = $this->db->query($sql_pagosPendVencidas);
    $pensiones = $listar->fetch_all(MYSQLI_ASSOC);
    return $pensiones;
  }
  public function totalPagosPendientesVencidosFecha($desde, $hasta, $cliente, $estado){
    $sql_totalMonto = "SELECT SUM(detalle_pensiones.precioServicio) as 'monto' FROM `clientes_servicios`, servicios, clientes, detalle_pensiones WHERE detalle_pensiones.idClienteServicio = clientes_servicios.idClienteServicio AND clientes_servicios.idCliente = clientes.idCliente AND clientes_servicios.idServicio = servicios.idServicio AND detalle_pensiones.estadoPension = 'pendiente' AND detalle_pensiones.fechaVencimiento >= '$desde' AND detalle_pensiones.fechaVencimiento <= '$hasta' AND clientes.nombreComercial LIKE '%$cliente%'";
    if($estado){
      $sql_totalMonto = $sql_totalMonto . " AND IF(curdate() > detalle_pensiones.fechaVencimiento, 'vencido', 'vigente')='$estado'";
    }
    $consultar = $this->db->query($sql_totalMonto);
    $monto = ($consultar->fetch_all(MYSQLI_ASSOC))[0];
    return $monto;
  }

  /** ###### PAGOS REALIZADOS DE PENSIONES VENCIDAS ######## */
  public function pensionesVencidasFecha($desde, $hasta, $cliente){
    $sql_pagosVencidas = "SELECT c.nombreComercial as cliente, s.nombreServicio as servicio, s.precio as mensualidad, dt.mora, dt.recorte, DATE_FORMAT(dt.fechaPagoRealizado, '%M') as mes, dt.fechaVencimiento as fVencimiento, DATE_FORMAT(dt.fechaPagoRealizado, '%Y-%m-%d') as fPago, TIMESTAMPDIFF(DAY, dt.fechaVencimiento, dt.fechaPagoRealizado) as 'diasRetraso' FROM detalle_pensiones as dt, clientes_servicios as cs, clientes as c, servicios as s WHERE dt.idClienteServicio = cs.idClienteServicio AND cs.idCliente = c.idCliente AND cs.idServicio = s.idServicio AND dt.estadoPension = 'pagado' AND dt.fechaVencimiento < DATE_FORMAT(dt.fechaPagoRealizado, '%Y-%m-%d') AND dt.fechaPagoRealizado > '$desde 00:00:00' AND dt.fechaPagoRealizado < '$hasta 23:59:59' and c.nombreComercial LIKE '%$cliente%'";
    $listar = $this->db->query($sql_pagosVencidas);
    $pensiones = $listar->fetch_all(MYSQLI_ASSOC);
    return $pensiones;
  }
  public function totalPagosVencidasFecha($desde, $hasta, $cliente){
    $montos = [];
    $sql_totalMora = "SELECT SUM(dt.mora) as 'mora' FROM detalle_pensiones as dt, clientes_servicios as cs, clientes as c, servicios as s WHERE dt.idClienteServicio = cs.idClienteServicio AND cs.idCliente = c.idCliente AND cs.idServicio = s.idServicio AND dt.estadoPension = 'pagado' AND dt.fechaVencimiento < DATE_FORMAT(dt.fechaPagoRealizado, '%Y-%m-%d') AND dt.fechaPagoRealizado > '$desde' AND dt.fechaPagoRealizado < '$hasta' and c.nombreComercial LIKE '%$cliente%'";
    $sql_recorte = "SELECT SUM(dt.recorte) as 'recorte' FROM detalle_pensiones as dt, clientes_servicios as cs, clientes as c, servicios as s WHERE dt.idClienteServicio = cs.idClienteServicio AND cs.idCliente = c.idCliente AND cs.idServicio = s.idServicio AND dt.estadoPension = 'pagado' AND dt.fechaVencimiento < DATE_FORMAT(dt.fechaPagoRealizado, '%Y-%m-%d') AND dt.fechaPagoRealizado > '$desde' AND dt.fechaPagoRealizado < '$hasta' and c.nombreComercial LIKE '%$cliente%'";
    $sql_pension = "SELECT SUM(dt.precioServicio) as 'mensualidad' FROM detalle_pensiones as dt, clientes_servicios as cs, clientes as c, servicios as s WHERE dt.idClienteServicio = cs.idClienteServicio AND cs.idCliente = c.idCliente AND cs.idServicio = s.idServicio AND dt.estadoPension = 'pagado' AND dt.fechaVencimiento < DATE_FORMAT(dt.fechaPagoRealizado, '%Y-%m-%d') AND dt.fechaPagoRealizado > '$desde' AND dt.fechaPagoRealizado < '$hasta' and c.nombreComercial LIKE '%$cliente%'";
    $sql_global = "SELECT SUM(dt.totalPagar) as 'global' FROM detalle_pensiones as dt, clientes_servicios as cs, clientes as c, servicios as s WHERE dt.idClienteServicio = cs.idClienteServicio AND cs.idCliente = c.idCliente AND cs.idServicio = s.idServicio AND dt.estadoPension = 'pagado' AND dt.fechaVencimiento < DATE_FORMAT(dt.fechaPagoRealizado, '%Y-%m-%d') AND dt.fechaPagoRealizado > '$desde' AND dt.fechaPagoRealizado < '$hasta' and c.nombreComercial LIKE '%$cliente%'    ";

    $cons_mora = $this->db->query($sql_totalMora);
    $cons_recorte = $this->db->query($sql_recorte);
    $cons_pension = $this->db->query($sql_pension);
    $cons_global = $this->db->query($sql_global);

    $mora = ($cons_mora->fetch_all(MYSQLI_ASSOC))[0]['mora'];
    $recorte = ($cons_recorte->fetch_all(MYSQLI_ASSOC))[0]['recorte'];
    $mensualidad = ($cons_pension->fetch_all(MYSQLI_ASSOC))[0]['mensualidad'];
    $global = ($cons_global->fetch_all(MYSQLI_ASSOC))[0]['global'];

    $montos = [
      'mora' => $mora,
      'recorte' => $recorte,
      'pension' => $mensualidad,
      'global' => $global,
    ];
    return $montos;
  }

  /** ###### SERVICIOS SUSPENDIDOS ######## */
  public function serviciosSuspendidosFecha($desde, $hasta){
    $sql_serviciosSuspendidos = "SELECT cs.idClienteServicio, c.nombreComercial as 'cliente', s.nombreServicio as 'servicio', s.precio as 'mensualidad', (SELECT count(idDetallePensiones) FROM detalle_pensiones as dt, clientes_servicios as css WHERE dt.idClienteServicio = cs.idClienteServicio AND dt.estadoPago = 'pendiente' AND dt.idClienteServicio = css.idClienteServicio AND cs.estadoClienteServicio = 'suspendido') as 'mesesPendientes', ((SELECT count(idDetallePensiones) FROM detalle_pensiones as dt, clientes_servicios as css WHERE dt.idClienteServicio = cs.idClienteServicio AND dt.estadoPago = 'pendiente' AND dt.idClienteServicio = css.idClienteServicio AND cs.estadoClienteServicio = 'suspendido')*s.precio) as 'deudaTotal', 'suspendido' as 'estado' FROM clientes_servicios as cs, clientes as c, servicios as s WHERE cs.estadoClienteServicio = 'suspendido' AND cs.idServicio = s.idServicio AND cs.idCliente = c.idCliente AND cs.fechaSuspencion BETWEEN '$desde' AND '$hasta'";
    $listar = $this->db->query($sql_serviciosSuspendidos);
    $servicios = $listar->fetch_all(MYSQLI_ASSOC);
    return $servicios;
  }

  /** ###### SERVICIOS DADOS DE BAJO ######## */
  public function bajaServiciosFecha($desde, $hasta){
    $sql_pagosVencidas = "SELECT c.nombreCliente as 'cliente', s.nombreServicio as 'servicio', 'baja' as estado, cs.motivoSuspencion as 'motivo', cs.fechaEliminacion as 'fBaja', u.nombre as 'responsable' FROM clientes as c, servicios as s, clientes_servicios as cs, usuarios as u WHERE cs.idCliente = c.idCliente AND cs.idServicio = s.idServicio AND (cs.motivoSuspencion != '-' OR cs.motivoSuspencion != NULL) AND cs.estadoClienteServicio = 'eliminado' AND cs.idUsuarioElimina = u.idUsuario AND cs.fechaEliminacion BETWEEN '$desde' AND '$hasta'";
    $listar = $this->db->query($sql_pagosVencidas);
    $pensiones = $listar->fetch_all(MYSQLI_ASSOC);
    return $pensiones;
  }

}
