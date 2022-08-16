<?php
session_start();
require_once "../models/procesos.php";

class ProcesosController
{
  public function index()
  {
    require_once "../views/soporte/procesos.php";
  }

  public function guardarProceso()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $nombres = isset($_POST['nombreProceso']) ? $_POST['nombreProceso'] : false;
      if ($nombres) {
        $usuario = new Procesos();
        $save = $usuario->guardarProceso($nombres);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Proceso registrado correctamente'
          ];
        } else {
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al registrar proceso, intentelo mas tarde'
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

  public function listarProcesos()
  {
    $indice = 1;
    $usuario = new Procesos();
    $usuarios = $usuario->listarProcesos();
    foreach ($usuarios as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function listarProcesosGlobal()
  {
    $indice = 1;
    $usuario = new Procesos();
    $usuarios = $usuario->listarProcesosGlobal();
    foreach ($usuarios as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function editarProceso()
  {
    // RECOGER LOS DATOS
    $usuario = new Procesos();
    $idProceso = isset($_POST['idProceso']) ? $_POST['idProceso'] : false;
    $nombreProceso = isset($_POST['nombreProceso']) ? $_POST['nombreProceso'] : false;
    // ENVIAR DATOS AL MODELO
    $usuario->editarProceso($idProceso, $nombreProceso);
    if ($usuario) {
      $respuesta = [
        'estado' => 'ok',
        'mensaje' => 'Proceso editado correctamente'
      ];
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al editar proceso, verifique los datos'
      ];
    }
    return json_encode($respuesta);
  }

  public function inhabilitarProceso()
  {
    $usuario = new Procesos();
    $idProceso = isset($_POST['idProceso']) ? $_POST['idProceso'] : false;
    if ($idProceso) {
      $usuarioInhabilitado = $usuario->inhabilitarProceso($idProceso);
      if ($usuarioInhabilitado) {
        $respuesta = [
          'estado' => 'ok',
          'mensaje' => 'Proceso inhabilitado correctamente'
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
        'mensaje' => 'Proceso no tiene idProceso'
      ];
    }
    return json_encode($respuesta);
  }
  
  public function HabilitarProceso()
  {
    $usuario = new Procesos();
    $idProceso = isset($_POST['idProceso']) ? $_POST['idProceso'] : false;
    if ($idProceso) {
      $usuarioInhabilitado = $usuario->HabilitarProceso($idProceso);
      if ($usuarioInhabilitado) {
        $respuesta = [
          'estado' => 'ok',
          'mensaje' => 'Proceso habilitado correctamente'
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
        'mensaje' => 'Proceso no tiene idProceso'
      ];
    }
    return json_encode($respuesta);
  }
}

$usuario = new ProcesosController();
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'procesos') {
    $usuario->index();
  }
  if ($_GET['method'] == 'listarProcesos') {
    echo ($usuario->listarProcesos());
  }
  if ($_GET['method'] == 'listarProcesosGlobal') {
    echo ($usuario->listarProcesosGlobal());
  }
  if ($_GET['method'] == 'guardarProceso') {
    echo ($usuario->guardarProceso());
  }
  if ($_GET['method'] == 'editarProceso') {
    echo ($usuario->editarProceso());
  }
  if ($_GET['method'] == 'inhabilitarProceso') {
    echo ($usuario->inhabilitarProceso());
  }
  if ($_GET['method'] == 'HabilitarProceso') {
    echo ($usuario->HabilitarProceso());
  }
} else {
    //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}
