<?php

require_once "../config/db.php";

class DashComunity
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
    $sql_global = "SELECT canal, COUNT(canal) as 'cantidad' FROM `solicitudesinformacion` WHERE fechaRegistro LIKE '%$año_actual%' GROUP BY canal;";
    $sql_mesAnterior = "SELECT canal, COUNT(canal) as 'cantidad' FROM `solicitudesinformacion` WHERE fechaRegistro LIKE '%$fechaAnterior%' GROUP BY canal;";
    $sql_mesActual = "SELECT canal, COUNT(canal) as 'cantidad' FROM `solicitudesinformacion` WHERE fechaRegistro LIKE '%$fechaActual%' GROUP BY canal;";
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