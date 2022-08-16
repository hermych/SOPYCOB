<?php
session_start();
require_once "../models/tirajes.php";

class TirajesController
{
	public function index()
	{
		require_once "../views/comprobantes/tirajes.php";
	}

	public function guardaTiraje()
	{
		$respuesta = [];
		if (isset($_POST)) {
			$sucursal = isset($_POST['sucursal']) ? $_POST['sucursal'] : false;
			$comprobante = isset($_POST['comprobante']) ? $_POST['comprobante'] : false;
			$serie = isset($_POST['serie']) ? $_POST['serie'] : false;
			$desde = isset($_POST['desde']) ? $_POST['desde'] : false;
			$hasta = isset($_POST['hasta']) ? $_POST['hasta'] : false;
			$fecha = date('Y-m-d h:i:s');
			$disponibles = $_POST['hasta'];
			if ($sucursal && $comprobante && $serie && $desde && $hasta && $fecha && $disponibles) {
				$tirajeObj = new Tirajes();
				$save = $tirajeObj->guardaTiraje($sucursal, $comprobante, $serie, $desde, $hasta, $fecha, $disponibles);
				if ($save) {
					$respuesta = [
						'estado' => 'ok',
						'mensaje' => 'Tiraje agregado correctamente'
					];
				} else {
					$respuesta = [
						'estado' => 'failed',
						'mensaje' => 'Error al registrar tiraje, intentelo mas tarde'
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

	public function listarTirajes()
	{
		$indice = 1;
		$tirajeObj = new Tirajes();
		$tirajes = $tirajeObj->listarTirajes();
		foreach ($tirajes as $key => $value) {
			$json['data'][$key] = $value;
		}
		for ($i = 0; $i < count($json['data']); $i++) {
			$json['data'][$i]['indice'] = $indice;
			$indice++;
		}
		$jsonString = json_encode($json);
		return $jsonString;
	}

	public function listarTirajesGlobal()
	{
		$indice = 1;
		$tirajeObj = new Tirajes();
		$tirajes = $tirajeObj->listarTirajesGlobal();
		foreach ($tirajes as $key => $value) {
			$json['data'][$key] = $value;
		}
		for ($i = 0; $i < count($json['data']); $i++) {
			$json['data'][$i]['indice'] = $indice;
			$indice++;
		}
		$jsonString = json_encode($json);
		return $jsonString;
	}

	public function editarTiraje()
	{
		if(isset($_POST)){
      // RECOGER LOS DATOS
      $tirajeObj = new Tirajes();
      $idTirajeEdit = isset($_POST['idTirajeEdit']) ? $_POST['idTirajeEdit'] : false;
      $sucursalEdit = isset($_POST['sucursalEdit']) ? $_POST['sucursalEdit'] : false;
      $comprobanteEdit = isset($_POST['comprobanteEdit']) ? $_POST['comprobanteEdit'] : false;
      $serieEdit = isset($_POST['serieEdit']) ? $_POST['serieEdit'] : false;
      $hastaEdit = isset($_POST['hastaEdit']) ? $_POST['hastaEdit'] : false;
      $desdeEdit = isset($_POST['desdeEdit']) ? $_POST['desdeEdit'] : false;
      $utilEdit = isset($_POST['utilEdit']) ? $_POST['utilEdit'] : false;
      // ENVIAR DATOS AL MODELO
      $estado = $tirajeObj->editarTiraje($idTirajeEdit, $sucursalEdit, $comprobanteEdit, $serieEdit, $hastaEdit, $desdeEdit, $utilEdit);
      if ($estado) {
        $respuesta = [
          'estado' => 'ok',
          'mensaje' => 'Tiraje editada correctamente'
        ];
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'Error al editar tiraje, verifique los datos'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error de comunicacion con el servidor, comuniquese con soporte por favor'
      ];
    }
		return json_encode($respuesta);
	}

	public function inhabilitarTiraje()
	{
		$tirajeObj = new Tirajes();
		$idTirajeInhabilitar = isset($_POST['idTiraje']) ? $_POST['idTiraje'] : false;
		if ($idTirajeInhabilitar) {
			$categoriaInhabilitado = $tirajeObj->inhabilitarTiraje($idTirajeInhabilitar);
			if ($categoriaInhabilitado) {
				$respuesta = [
					'estado' => 'ok',
					'mensaje' => 'Tiraje eliminado correctamente'
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
				'mensaje' => 'Tiraje no tiene id'
			];
		}
		return json_encode($respuesta);
	}

    public function listarSucursales(){
        $tirajeObj = new Tirajes();
        $sucursales = $tirajeObj->listarSucursales();
        return json_encode($sucursales);
    }

    public function listarComprobantes(){
        $tirajeObj = new Tirajes();
        $comprobantes = $tirajeObj->listarComprobantes();
        return json_encode($comprobantes);
    }
}

$tirajeObj = new TirajesController();
if(isset($_SESSION['identity'])){
	if ($_GET['method'] == 'tirajes') {
		$tirajeObj->index();
	}
	if ($_GET['method'] == 'listarTirajes') {
		echo ($tirajeObj->listarTirajes());
	}
	if ($_GET['method'] == 'listarTirajesGlobal') {
		echo ($tirajeObj->listarTirajesGlobal());
	}
	if ($_GET['method'] == 'guardaTiraje') {
		echo ($tirajeObj->guardaTiraje());
	}
	if ($_GET['method'] == 'editarTiraje') {
		echo $tirajeObj->editarTiraje();
	}
	if ($_GET['method'] == 'inhabilitarTiraje') {
		echo $tirajeObj->inhabilitarTiraje();
	}
	if ($_GET['method'] == 'listarSucursales') {
		echo $tirajeObj->listarSucursales();
	}
	if ($_GET['method'] == 'listarComprobantes') {
		echo $tirajeObj->listarComprobantes();
	}
}else{
    //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}


