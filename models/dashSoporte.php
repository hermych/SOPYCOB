<?php

require_once "../config/db.php";

class DashSoporte
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
  }

  /* ##### METODOS ###### */
  public function obtDatosEstadisticosTickets()
  {
    $datosArray = [];
    $año_actual = date('Y');
    $mes_anterior = date('m', strtotime('-1 month'));
    $fechaAnterior = date("Y-$mes_anterior");
    $fechaActual = date('Y-m');
    $sql_global = "SELECT procesos.nombreProceso, COUNT(tickets_soporte.idProceso) as 'cantidad' FROM `tickets_soporte`,procesos WHERE tickets_soporte.idProceso = procesos.idProceso AND tickets_soporte.fechaRegistro LIKE '%$año_actual%' GROUP BY procesos.idProceso;";
    $sql_mesAnterior = "SELECT procesos.nombreProceso, COUNT(tickets_soporte.idProceso) as 'cantidad' FROM `tickets_soporte`,procesos WHERE tickets_soporte.idProceso = procesos.idProceso AND tickets_soporte.fechaRegistro LIKE '%$fechaAnterior%' GROUP BY procesos.idProceso;";
    $sql_mesActual = "SELECT procesos.nombreProceso, COUNT(tickets_soporte.idProceso) as 'cantidad' FROM `tickets_soporte`,procesos WHERE tickets_soporte.idProceso = procesos.idProceso AND tickets_soporte.fechaRegistro LIKE '%$fechaActual%' GROUP BY procesos.idProceso;";
    $consultar = $this->db->query($sql_mesActual);
    $consultar2 = $this->db->query($sql_mesAnterior);
    $consultar3 = $this->db->query($sql_global);
    $datosMesActual = $consultar->fetch_all(MYSQLI_ASSOC);
    $datosMesAnterior = $consultar2->fetch_all(MYSQLI_ASSOC);
    $datosGlobal = $consultar3->fetch_all(MYSQLI_ASSOC);
    $datosArray['mesActual'] = $datosMesActual;
    $datosArray['mesAntes'] = $datosMesAnterior;
    $datosArray['global'] = $datosGlobal;
    return $datosArray;
  }
}