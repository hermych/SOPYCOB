<?php
session_start();
require_once "../models/sistemas.php";

class SistemasController
{
  public function index()
  {
    require_once "../views/comunityManager/sistemasG.php";
  }
  public function guardarSistemaG()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
      $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
      if ($nombre && $precio) {
        $sistemasObj = new Sistemas();
        $save = $sistemasObj->guardarSistemaG($nombre, $precio);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se registro el sistema correctamente'
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
  public function listarSistemasGlobal()
  {
    $indice = 1;
    $tirajeObj = new Sistemas();
    $tirajes = $tirajeObj->listarSistemasGlobal();
    foreach ($tirajes as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    return json_encode($json);
  }
  public function editarSistemaG()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $id = isset($_POST['id']) ? $_POST['id'] : false;
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
      $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
      if ($id && $nombre && $precio) {
        $sistemaObj = new Sistemas();
        $save = $sistemaObj->editarSistemaG($id, $nombre, $precio);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se editó el sistema correctamente'
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
  public function inhabilitarSistemaG()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $id = isset($_POST['id']) ? $_POST['id'] : false;
      if ($id) {
        $pautasObj = new Sistemas();
        $save = $pautasObj->inhabilitarSistemaG($id);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se inhabilitó el sistema correctamente'
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
  public function habilitarSistemaG()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $id = isset($_POST['id']) ? $_POST['id'] : false;
      if ($id) {
        $pautasObj = new Sistemas();
        $save = $pautasObj->habilitarSistemaG($id);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se habilitó el sistema correctamente'
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
    $pautasObj = new Sistemas();
    $pautas = $pautasObj->listarPautasAct();
    return json_encode($pautas);
  }
}

$sistemas = new SistemasController();
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'sistemasG') {
    $sistemas->index();
  } elseif ($_GET['method'] == 'guardarSistemaG') {
    echo $sistemas->guardarSistemaG();
  } elseif ($_GET['method'] == 'listarSistemasGlobal') {
    echo $sistemas->listarSistemasGlobal();
  } elseif ($_GET['method'] == 'editarSistemaG') {
    echo $sistemas->editarSistemaG();
  } elseif ($_GET['method'] == 'inhabilitarSistemaG') {
    echo $sistemas->inhabilitarSistemaG();
  } elseif ($_GET['method'] == 'habilitarSistemaG') {
    echo $sistemas->habilitarSistemaG();
  } elseif ($_GET['method'] == 'listarPautasAct') {
    echo $sistemas->listarPautasAct();
  }
} else {
  header("Location:../views/sinSesion.php");
}
