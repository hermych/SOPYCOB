<?php
session_start();
require_once "../models/dashComunity.php";

class DashComunityController
{
	public function index()
	{
		require_once "../views/dashComunity.php";
	}

	public function obtenerDatosEstadisticosTickets()
	{
		$dashComObj = new DashComunity();
		$datos = $dashComObj->obtDatosEstadisticosTickets();
		return json_encode($datos);
	}
}

$dashComunityObj = new DashComunityController();
if (isset($_SESSION['identity'])) {
	if ($_GET['method'] == 'dashComunity') {
		$dashComunityObj->index();
	}
	if ($_GET['method'] == 'datosEstadisticos') {
		echo ($dashComunityObj->obtenerDatosEstadisticosTickets());
	}
} else {
    //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}
