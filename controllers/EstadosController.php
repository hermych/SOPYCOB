<?php
session_start();
require_once "../models/estados.php";

class EstadosController
{
  public function index()
  {
    require_once "../views/soporte/estados.php";
  }

  public function guardarEstado()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $nombres = isset($_POST['nombreEstado']) ? $_POST['nombreEstado'] : false;
      if ($nombres) {
        $usuario = new Estados();
        $save = $usuario->guardarEstado($nombres);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Estado registrado correctamente'
          ];
        } else {
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al registrar estado, intentelo mas tarde'
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

  public function listarEstados()
  {
    $indice = 1;
    $estado = new Estados();
    $estados = $estado->listarEstados();
    foreach ($estados as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function listarEstadosGlobal()
  {
    $indice = 1;
    $estado = new Estados();
    $estados = $estado->listarEstadosGlobal();
    foreach ($estados as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function editarEstado()
  {
    // RECOGER LOS DATOS
    $usuario = new Estados();
    $idEstado = isset($_POST['idEstado']) ? $_POST['idEstado'] : false;
    $nombreEstado = isset($_POST['nombreEstado']) ? $_POST['nombreEstado'] : false;
    // ENVIAR DATOS AL MODELO
    $usuario->editarEstado($idEstado, $nombreEstado);
    if ($usuario) {
      $respuesta = [
        'estado' => 'ok',
        'mensaje' => 'Estado editado correctamente'
      ];
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al editar estado, verifique los datos'
      ];
    }
    return json_encode($respuesta);
  }

  public function inhabilitarEstado()
  {
    $usuario = new Estados();
    $idEstado = isset($_POST['idEstado']) ? $_POST['idEstado'] : false;
    if ($idEstado) {
      $usuarioInhabilitado = $usuario->inhabilitarEstado($idEstado);
      if ($usuarioInhabilitado) {
        $respuesta = [
          'estado' => 'ok',
          'mensaje' => 'Estado habilitado correctamente'
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
        'mensaje' => 'Estado no tiene idEstado'
      ];
    }
    return json_encode($respuesta);
  }

  public function HabilitarEstado()
  {
    $usuario = new Estados();
    $idEstado = isset($_POST['idEstado']) ? $_POST['idEstado'] : false;
    if ($idEstado) {
      $usuarioInhabilitado = $usuario->HabilitarEstado($idEstado);
      if ($usuarioInhabilitado) {
        $respuesta = [
          'estado' => 'ok',
          'mensaje' => 'Estado inhabilitado correctamente'
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
        'mensaje' => 'Estado no tiene idEstado'
      ];
    }
    return json_encode($respuesta);
  }
  
}

$usuario = new EstadosController();
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'estados') {
    $usuario->index();
  }
  if ($_GET['method'] == 'listarEstados') {
    echo ($usuario->listarEstados());
  }
  if ($_GET['method'] == 'listarEstadosGlobal') {
    echo ($usuario->listarEstadosGlobal());
  }
  if ($_GET['method'] == 'guardarEstado') {
    echo ($usuario->guardarEstado());
  }
  if ($_GET['method'] == 'editarEstado') {
    echo ($usuario->editarEstado());
  }
  if ($_GET['method'] == 'inhabilitarEstado') {
    echo ($usuario->inhabilitarEstado());
  }
  if ($_GET['method'] == 'HabilitarEstado') {
    echo ($usuario->HabilitarEstado());
  }
} else {
    //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}
