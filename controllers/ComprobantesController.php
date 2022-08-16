<?php
session_start();
require_once "../models/comprobantes.php";

class ComprobantesController
{
	public function index()
	{
		require_once "../views/comprobantes/comprobantes.php";
	}

	public function guardarComprobante()
	{
		$respuesta = [];
		if (isset($_POST)) {
			$comprobante = isset($_POST['comprobante']) ? $_POST['comprobante'] : false;
			if ($comprobante) {
				$comprobanteObj = new Comprobantes();
				$save = $comprobanteObj->guardarComprobante($comprobante);
				if ($save) {
					$respuesta = [
						'estado' => 'ok',
						'mensaje' => 'Comprobante agregado correctamente'
					];
				} else {
					$respuesta = [
						'estado' => 'failed',
						'mensaje' => 'Error al registrar comprobante, intentelo mas tarde'
					];
				}
			}
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'No entro al if'
			];
		}
		return json_encode($respuesta);
	}

	public function listarComprobantes()
	{
		$indice = 1;
		$comprobanteObj = new Comprobantes();
		$comprobantes = $comprobanteObj->listarComprobantes();
		foreach ($comprobantes as $key => $value) {
			$json['data'][$key] = $value;
		}
		for ($i = 0; $i < count($json['data']); $i++) {
			$json['data'][$i]['indice'] = $indice;
			$indice++;
		}
		$jsonString = json_encode($json);
		return $jsonString;
	}

	public function listarComprobantesParaPagar()
	{
		$indice = 1;
		$comprobanteObj = new Comprobantes();
		$comprobantes = $comprobanteObj->listarComprobantesParaPagar();
		foreach ($comprobantes as $key => $value) {
			$json['data'][$key] = $value;
		}
		for ($i = 0; $i < count($json['data']); $i++) {
			$json['data'][$i]['indice'] = $indice;
			$indice++;
		}
		$jsonString = json_encode($json);
		return $jsonString;
	}

	public function listarComprobantesGlobal()
	{
		$indice = 1;
		$comprobanteObj = new Comprobantes();
		$comprobantes = $comprobanteObj->listarComprobantesGlobal();
		foreach ($comprobantes as $key => $value) {
			$json['data'][$key] = $value;
		}
		for ($i = 0; $i < count($json['data']); $i++) {
			$json['data'][$i]['indice'] = $indice;
			$indice++;
		}
		$jsonString = json_encode($json);
		return $jsonString;
	}
	public function editarComprobante()
	{
		// RECOGER LOS DATOS
		$categoriaObj = new Comprobantes();
		$idComprobante = isset($_POST['idComprobante']) ? $_POST['idComprobante'] : false;
		$comprobante = isset($_POST['comprobante']) ? $_POST['comprobante'] : false;
		// ENVIAR DATOS AL MODELO
		$estado = $categoriaObj->editarComprobante($idComprobante, $comprobante);
		if ($categoriaObj) {
			$respuesta = [
				'estado' => 'ok',
				'mensaje' => 'Comprobante editada correctamente'
			];
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'Error al editar comprobante, verifique los datos'
			];
		}
		return json_encode($respuesta);
	}
	public function inhabilitarComprobante()
	{
		$categoria = new Comprobantes();
		$idComprobante = isset($_POST['idComprobante']) ? $_POST['idComprobante'] : false;
		if ($idComprobante) {
			$categoriaInhabilitado = $categoria->inhabilitarComprobante($idComprobante);
			if ($categoriaInhabilitado) {
				$respuesta = [
					'estado' => 'ok',
					'mensaje' => 'Comprobante inhabilitado correctamente'
				];
			} else {
				$respuesta = [
					'estado' => 'failed',
					'mensaje' => 'Error al realizar la consulta en la bd'
				];
			}
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'Comprobante no tiene id'
			];
		}
		return json_encode($respuesta);
	}
	public function habilitarComprobante()
	{
		$categoria = new Comprobantes();
		$idComprobante = isset($_POST['idComprobante']) ? $_POST['idComprobante'] : false;
		if ($idComprobante) {
			$categoriaInhabilitado = $categoria->habilitarComprobante($idComprobante);
			if ($categoriaInhabilitado) {
				$respuesta = [
					'estado' => 'ok',
					'mensaje' => 'Comprobante habilitado correctamente'
				];
			} else {
				$respuesta = [
					'estado' => 'failed',
					'mensaje' => 'Error al realizar la consulta en la bd'
				];
			}
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'Comprobante no tiene id'
			];
		}
		return json_encode($respuesta);
	}
}

$comprobantes = new ComprobantesController();
if(isset($_SESSION['identity'])){
	if ($_GET['method'] == 'comprobantes') {
		$comprobantes->index();
	}
	if ($_GET['method'] == 'listarComprobantes') {
		echo ($comprobantes->listarComprobantes());
	}
	if ($_GET['method'] == 'listarComprobantesGlobal') {
		echo ($comprobantes->listarComprobantesGlobal());
	}
	if ($_GET['method'] == 'listarComprobantesParaPagar') {
		echo ($comprobantes->listarComprobantesParaPagar());
	}
	if ($_GET['method'] == 'guardarComprobante') {
		echo ($comprobantes->guardarComprobante());
	}
	if ($_GET['method'] == 'editarComprobante') {
		echo $comprobantes->editarComprobante();
	}
	if ($_GET['method'] == 'inhabilitarComprobante') {
		echo $comprobantes->inhabilitarComprobante();
	}
	if ($_GET['method'] == 'habilitarComprobante') {
		echo $comprobantes->habilitarComprobante();
	}
}else{
    //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}

