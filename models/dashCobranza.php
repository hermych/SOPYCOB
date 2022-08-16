<?php

require_once "../config/db.php";

class DashCobranza
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

    $sql_pagoTotal = "SELECT COUNT(idDetallePensiones) as 'cantidad' FROM `detalle_pensiones` WHERE estadoPension = 'pendiente';";
    $sql_ingresos = "SELECT if(sum(totalPagar)=NULL,sum(totalPagar),0) as 'ingresos' FROM `detalle_pensiones`";
    $sql_pagoFueraFecha = "SELECT count(idDetallePensiones) as 'cantidad' FROM `detalle_pensiones` WHERE fechaVencimiento > DATE_FORMAT(fechaPagoRealizado,'%Y-%m-%d');";
    $sql_ingresosMensuales = "SELECT MONTH(fechaPago) as 'mes', sum(totalPagar) as 'ingresos' FROM `detalle_pensiones` WHERE totalPagar != 'NULL' AND fechaPago LIKE '%2022%' GROUP BY MONTH(fechaPago);";

    $consultar = $this->db->query($sql_pagoTotal);
    $consultar2 = $this->db->query($sql_pagoFueraFecha);
    $consultar3 = $this->db->query($sql_ingresos);
    $consultar4 = $this->db->query($sql_ingresosMensuales);

    $pagoTotal = ($consultar->fetch_all(MYSQLI_ASSOC))[0];
    $pagoFueraFecha = ($consultar2->fetch_all(MYSQLI_ASSOC))[0];
    $ingresosTotales = ($consultar3->fetch_all(MYSQLI_ASSOC))[0];
    $ingresosMensuales = ($consultar4->fetch_all(MYSQLI_ASSOC));

    // echo('<pre>');
    // var_dump($ingresosMensuales);
    // echo('</pre>');
    
    $datosArray['global']['pagoTotal'] = $pagoTotal['cantidad'];
    $datosArray['global']['ingresoTotal'] = $ingresosTotales['ingresos'];
    $datosArray['global']['pagoFueraFecha'] = $pagoFueraFecha['cantidad'];
    $datosArray['global']['pagosMensuales'] = $ingresosMensuales;
    return $datosArray;
  }
}