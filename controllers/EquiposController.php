<?php
session_start();
require_once "../models/equipos.php";

class EquiposController
{
  public function index()
  {
    require_once "../views/comunityManager/equiposG.php";
  }
  public function guardarEquipoG()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
      $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
      if ($nombre && $precio) {
        $sistemasObj = new Equipos();
        $save = $sistemasObj->guardarEquipoG($nombre, $precio);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se registro el equipo correctamente'
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
  public function listarEquiposGlobal()
  {
    $indice = 1;
    $tirajeObj = new Equipos();
    $tirajes = $tirajeObj->listarEquiposGlobal();
    foreach ($tirajes as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    return json_encode($json);
  }
  public function editarEquipoG()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $id = isset($_POST['id']) ? $_POST['id'] : false;
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
      $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
      if ($id && $nombre && $precio) {
        $sistemaObj = new Equipos();
        $save = $sistemaObj->editarEquipoG($id, $nombre, $precio);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se editó el Equipo correctamente'
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
  public function inhabilitarEquipoG()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $id = isset($_POST['id']) ? $_POST['id'] : false;
      if ($id) {
        $pautasObj = new Equipos();
        $save = $pautasObj->inhabilitarEquipoG($id);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se inhabilitó el equipo correctamente'
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
  public function habilitarEquipoG()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $id = isset($_POST['id']) ? $_POST['id'] : false;
      if ($id) {
        $pautasObj = new Equipos();
        $save = $pautasObj->habilitarEquipoG($id);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se habilitó el equipo correctamente'
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
    $pautasObj = new Equipos();
    $pautas = $pautasObj->listarPautasAct();
    return json_encode($pautas);
  }
}

$equipos = new EquiposController();
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'equiposG') {
    $equipos->index();
  } elseif ($_GET['method'] == 'guardarEquipoG') {
    echo $equipos->guardarEquipoG();
  } elseif ($_GET['method'] == 'listarEquiposGlobal') {
    echo $equipos->listarEquiposGlobal();
  } elseif ($_GET['method'] == 'editarEquipoG') {
    echo $equipos->editarEquipoG();
  } elseif ($_GET['method'] == 'inhabilitarEquipoG') {
    echo $equipos->inhabilitarEquipoG();
  } elseif ($_GET['method'] == 'habilitarEquipoG') {
    echo $equipos->habilitarEquipoG();
  } elseif ($_GET['method'] == 'habilitarEquipoG') {
    echo $equipos->listarPautasAct();
  }
} else {
  header("Location:../views/sinSesion.php");
}
