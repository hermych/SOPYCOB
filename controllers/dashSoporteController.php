<?php
session_start();
require_once "../models/dashSoporte.php";

class DashSoporteController
{
	public function index()
	{
		require_once "../views/dashSoporte.php";
	}

	public function obtenerDatosEstadisticosTickets()
	{
		$dashSopObj = new DashSoporte();
		$datos = $dashSopObj->obtDatosEstadisticosTickets();
		return json_encode($datos);
	}



	// *######################################################
	public function agendarDemostracion()
	{
		$respuesta = [];
		if (isset($_POST)) {
			$timeArray = explode('T', $_POST['fechaDemo']);
			$fechaDemo = $timeArray[0];
			$horaDemo = $timeArray[1];
			$idSolic = $_POST['idSolic'];
			$tipoDemo = $_POST['tipoDemo'];
			$observacionAgendarDemo =  $_POST['observacionAgendarDemo'];
			$control = new ControlSolic();
			$consultar = $control->agendarDemostracion($fechaDemo, $horaDemo, $tipoDemo, $observacionAgendarDemo, $idSolic);
			if ($consultar) {
				$respuesta = [
					'estado' => 'ok',
					'mensaje' => 'Demostracion agendada correctamente'
				];
			}
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'No se esta enviando todos los datos'
			];
		}
		return json_encode($respuesta);
	}
	public function listarSolicLlamadasRealizadas()
	{
		$indice = 1;
		$controlSolicObj = new ControlSolic();
		$solicDemoYCierre = $controlSolicObj->listarSolicLlamadasRealizadas();
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
	public function listarSolicDemoPendientes()
	{
		$indice = 1;
		$controlSolicObj = new ControlSolic();
		$solicDemoYCierre = $controlSolicObj->listarSolicDemoPendientes();
		foreach ($solicDemoYCierre as $key => $value) {
			$json['data'][$key] = $value;
		}
		for ($i = 0; $i < count($json['data']); $i++) {
			$json['data'][$i]['indice'] = $indice;
			$indice++;
		}
		for ($i = 0; $i < count($json['data']); $i++) {
			if ($json['data'][$i]['fechaDemo'] != '' || $json['data'][$i]['fechaDemo'] != null) {
				$json['data'][$i]['fechaDemo'] = date("d/m/Y", strtotime($json['data'][$i]['fechaDemo']));
			}
		}
		$jsonString = json_encode($json);
		return $jsonString;
	}
	public function listarSolicVentasPendientes()
	{
		$indice = 1;
		$controlSolicObj = new ControlSolic();
		$solicDemoYCierre = $controlSolicObj->listarSolicVentasPendientes();
		foreach ($solicDemoYCierre as $key => $value) {
			$json['data'][$key] = $value;
		}
		for ($i = 0; $i < count($json['data']); $i++) {
			$json['data'][$i]['indice'] = $indice;
			$indice++;
		}
		for ($i = 0; $i < count($json['data']); $i++) {
			if ($json['data'][$i]['fechaDemo'] != '' || $json['data'][$i]['fechaDemo'] != null) {
				$json['data'][$i]['fechaDemo'] = date("d/m/Y", strtotime($json['data'][$i]['fechaDemo']));
			}
		}
		$jsonString = json_encode($json);
		return $jsonString;
	}
	public function rechazarAgendarDemo()
	{
		// RECOGER LOS DATOS
		$controlObj = new ControlSolic();
		$idSolic = isset($_POST['idSolic']) ? $_POST['idSolic'] : false;
		$observacion = isset($_POST['observacion']) ? $_POST['observacion'] : false;
		// ENVIAR DATOS AL MODELO
		$estado = $controlObj->rechazarAgendarDemo($idSolic, $observacion);
		if ($estado) {
			$respuesta = [
				'estado' => 'ok',
				'mensaje' => 'Que pena :('
			];
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'Error al registrar, verifique la consulta'
			];
		}
		return json_encode($respuesta);
	}
	public function confirmarDemoRealizada()
	{
		// RECOGER LOS DATOS
		$controlObj = new ControlSolic();
		$idSolic = isset($_POST['idSolic']) ? $_POST['idSolic'] : false;
		// ENVIAR DATOS AL MODELO
		$estado = $controlObj->confirmarDemoRealizada($idSolic);
		if ($estado) {
			$respuesta = [
				'estado' => 'ok',
				'mensaje' => 'Felicidades, ahora esperemos que se pueda cerrar la venta'
			];
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'Error al confirmar la demostracion, verifique la consulta'
			];
		}
		return json_encode($respuesta);
	}
	public function cancelarDemo()
	{
		// RECOGER LOS DATOS
		$controlObj = new ControlSolic();
		$idSolic = isset($_POST['idSolic']) ? $_POST['idSolic'] : false;
		$motivo = isset($_POST['motivo']) ? $_POST['motivo'] : false;
		// ENVIAR DATOS AL MODELO
		$estado = $controlObj->cancelarDemo($idSolic, $motivo);
		if ($estado) {
			$respuesta = [
				'estado' => 'ok',
				'mensaje' => 'Se ha cancelada la demostracion'
			];
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'Error al cancelar demostracion, verifique la consulta'
			];
		}
		return json_encode($respuesta);
	}
	public function cerrarVenta()
	{
		$arreglo = $_POST;
		$controlObJ = new ControlSolic();
		$resultado = $controlObJ->cerrarVenta($arreglo);
		if ($resultado) {
			$respuesta = [
				'estado' => 'ok',
				'mensaje' => 'Felicidades por la venta. !Sigue asi¡'
			];
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'Ups, error en la consulta.'
			];
		}
		return json_encode($respuesta);
	}
}

$dashSoporteObj = new DashSoporteController();
if (isset($_SESSION['identity'])) {
	if ($_GET['method'] == 'dashSoporte') {
		$dashSoporteObj->index();
	}
	if ($_GET['method'] == 'datosEstadisticos') {
		echo ($dashSoporteObj->obtenerDatosEstadisticosTickets());
	}
} else {
    //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}
