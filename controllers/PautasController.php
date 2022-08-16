<?php
session_start();
require_once "../models/pautasG.php";

class PautasController
{
  public function index()
  {
    require_once "../views/comunityManager/pautasG.php";
  }
  public function guardarPautaG()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
      $f_inicio = isset($_POST['f_inicio']) ? $_POST['f_inicio'] : false;
      $f_fin = isset($_POST['f_fin']) ? $_POST['f_fin'] : false;
      $link = isset($_POST['link']) ? $_POST['link'] : false;
      if ($nombre && $f_inicio && $f_fin && $link) {
        $pautasObj = new Pautas();
        $save = $pautasObj->guardarPautaG($nombre, $f_inicio, $f_fin, $link);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se registro la pauta correctamente'
          ];
        } else {
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta a la BD, comuníquese con Soporte por favor'
          ];
        }
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta enviando los datos correctamente, comuníquese con Soporte por favor'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error de envio POST, comuníquese con Soporte por favor'
      ];
    }
    return json_encode($respuesta);
  }
  public function listarPautasGlobal(){
    $indice = 1;
		$tirajeObj = new Pautas();
		$tirajes = $tirajeObj->listarPautasGlobal();
		foreach ($tirajes as $key => $value) {
			$json['data'][$key] = $value;
		}
		for ($i = 0; $i < count($json['data']); $i++) {
			$json['data'][$i]['indice'] = $indice;
			$indice++;
		}
		return json_encode($json);
  }
  public function editarPautaG(){
    $respuesta = [];
    if (isset($_POST)) {
      $id = isset($_POST['id_pauta']) ? $_POST['id_pauta'] : false;
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
      $f_inicio = isset($_POST['f_inicio']) ? $_POST['f_inicio'] : false;
      $f_fin = isset($_POST['f_fin']) ? $_POST['f_fin'] : false;
      $link = isset($_POST['link']) ? $_POST['link'] : false;
      if ($id && $nombre && $f_inicio && $f_fin && $link) {
        $pautasObj = new Pautas();
        $save = $pautasObj->editarPautaG($id, $nombre, $f_inicio, $f_fin, $link);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se editó la pauta correctamente'
          ];
        } else {
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta a la BD, comuníquese con Soporte por favor'
          ];
        }
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta enviando los datos correctamente, comuníquese con Soporte por favor'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error de envio POST, comuníquese con Soporte por favor'
      ];
    }
    return json_encode($respuesta);
  }
  public function inhabilitarPautaG()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $id = isset($_POST['id_pauta']) ? $_POST['id_pauta'] : false;
      if ($id) {
        $pautasObj = new Pautas();
        $save = $pautasObj->inhabilitarPautaG($id);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se inhabilitó la pauta correctamente'
          ];
        } else {
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta a la BD, comuníquese con Soporte por favor'
          ];
        }
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta enviando los datos correctamente, comuníquese con Soporte por favor'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error de envio POST, comuníquese con Soporte por favor'
      ];
    }
    return json_encode($respuesta);
  }
  public function habilitarPautaG()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $id = isset($_POST['id_pauta']) ? $_POST['id_pauta'] : false;
      if ($id) {
        $pautasObj = new Pautas();
        $save = $pautasObj->habilitarPautaG($id);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se habilitó la pauta correctamente'
          ];
        } else {
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta a la BD, comuníquese con Soporte por favor'
          ];
        }
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta enviando los datos correctamente, comuníquese con Soporte por favor'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error de envio POST, comuníquese con Soporte por favor'
      ];
    }
    return json_encode($respuesta);
  }
  public function listarPautasAct()
  {
    $pautasObj = new Pautas();
		$pautas = $pautasObj->listarPautasAct();
    return json_encode($pautas);
  }
}

$pautas = new PautasController();
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'pautasG') {
    $pautas->index();
  } elseif ($_GET['method'] == 'guardarPautaG') {
    echo $pautas->guardarPautaG();
  } elseif ($_GET['method'] == 'listarPautasGlobal') {
    echo $pautas->listarPautasGlobal();
  } elseif ($_GET['method'] == 'editarPautaG') {
    echo $pautas->editarPautaG();
  } elseif ($_GET['method'] == 'inhabilitarPautaG') {
    echo $pautas->inhabilitarPautaG();
  } elseif ($_GET['method'] == 'habilitarPautaG') {
    echo $pautas->habilitarPautaG();
  } elseif ($_GET['method'] == 'listarPautasAct') {
    echo $pautas->listarPautasAct();
  }
} else {
  header("Location:../views/sinSesion.php");
}
