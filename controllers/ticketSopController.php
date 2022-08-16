<?php
session_start();
require_once "../models/ticketSop.php";

class regTicketController
{
	public function index()
	{
		require_once "../views/soporte/ticketSop.php";
	}
	public function registrarTicket()
	{
		$respuesta = [];
		if (isset($_POST)) {
			$comentario = '';
			$motivoNoCompete = '';
			$idCliente =  $_POST['idCliente'];
			$mensaje =  $_POST['mensaje'];
			$responsable =  $_POST['responsable'];
			$proceso =  $_POST['proceso'];
			$nombreSolicita =  $_POST['nombreSolicita'];
			$celSolicitante =  $_POST['celSolicitante'];
			if ($_POST['proceso'] == 6) {
				$comentario =  $_POST['comentario'];
			} 
			if($_POST['proceso'] == 4){
				$motivoNoCompete =  $_POST['motivoNoCompete'];
			}
			$ticketObj = new TicketSoporte();
			$consultar = $ticketObj->registrarTicket($idCliente, $mensaje, $proceso, $comentario, $nombreSolicita, $celSolicitante, $motivoNoCompete, $responsable);
			if ($consultar) {
				$respuesta = [
					'estado' => 'ok',
					'mensaje' => 'Se ha registrado el ticket correctamente'
				];
			} else {
				$respuesta = [
					'estado' => 'failed',
					'mensaje' => 'Error al momento de realizar la consulta, revise el modelo'
				];
			}
		}
		else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'Llene todos los campos necesarios por favor'
			];
		}
		return json_encode($respuesta);
	}
	public function listarTicketsPendientes()
	{
		$indice = 1;
		$ticketObj = new TicketSoporte();
		$solicDemoYCierre = $ticketObj->listarTicketsPendientes();
		foreach ($solicDemoYCierre as $key => $value) {
			$json['data'][$key] = $value;
		}
		for ($i = 0; $i < count($json['data']); $i++) {
			$json['data'][$i]['indice'] = $indice;
			$indice++;
		}
		$jsonString = json_encode($json);
		return $jsonString;
	}
	public function iniciarTicket()
	{
		$respuesta = [];
		$idTicket = $_POST['idTicket'];
		$ticketObj = new TicketSoporte();
		$resultado = $ticketObj->iniciarTicket($idTicket);
		if($resultado){
			$respuesta = [
				'estado' => 'ok',
				'idTicket' => $idTicket
			];
		}else{
			$respuesta = [
				'estado' => 'failed'
			];
		}
		return json_encode($respuesta);
	}
	public function finalizarTicket()
	{
		$respuesta = [];
		$idTicket = $_POST['idTicket'];
		$msjFinalizado = $_POST['msjFinalizado'];
		$ticketObj = new TicketSoporte();
		$resultado = $ticketObj->finalizarTicket($idTicket, $msjFinalizado);
		if($resultado){
			$respuesta = [
				'estado' => 'ok',
				'idTicket' => $idTicket
			];
		}else{
			$respuesta = [
				'estado' => 'failed'
			];
		}
		return json_encode($respuesta);
	}
}

$regTicketObj = new regTicketController();
if (isset($_SESSION['identity'])) {
	if ($_GET['method'] == 'ticketSop') {
		$regTicketObj->index();
	}
	if ($_GET['method'] == 'registrarTicket') {
		echo ($regTicketObj->registrarTicket());
	}
	if ($_GET['method'] == 'listarTicketsPendientes') {
		echo ($regTicketObj->listarTicketsPendientes());
	}
	if ($_GET['method'] == 'iniciarTicket') {
		echo ($regTicketObj->iniciarTicket());
	}
	if ($_GET['method'] == 'finalizarTicket') {
		echo ($regTicketObj->finalizarTicket());
	}
} else {
    //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}
