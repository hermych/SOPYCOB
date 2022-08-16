<?php
session_start();
require_once "../models/dashCobranza.php";

class DashCobranzaController
{
	public function index()
	{
		require_once "../views/dashCobranza.php";
	}
	
	public function obtenerDatosEstadisticosTickets()
	{
		$dashComObj = new DashCobranza();
		$datos = $dashComObj->obtDatosEstadisticosTickets();
		return json_encode($datos);
	}
}

$dashCobranzaObj = new DashCobranzaController();
if(isset($_SESSION['identity'])){
	if ($_GET['method'] == 'dashCobranza') {
		$dashCobranzaObj->index();
	}
	if ($_GET['method'] == 'datosEstadisticos') {
		echo ($dashCobranzaObj->obtenerDatosEstadisticosTickets());
	}
}else{
    //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}

