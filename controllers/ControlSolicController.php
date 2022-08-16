<?php
session_start();
require_once "../models/controlSolic.php";

class ControllSolicController
{
  public function index()
  {
    require_once "../views/comunityManager/controlSolic.php";
  }
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
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'Error la consulta, por favor comniquese con soporte'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al comunicarse con el servidor, por favor comniquese con soporte'
      ];
    }
    return json_encode($respuesta);
  }
  public function reprogramarDemo()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $idSolic = isset($_POST['idSolic']) ? $_POST['idSolic'] : false;
      $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : false;
      $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
      // $fechaPasada = isset($_POST['fechaPasada']) ? $_POST['fechaPasada'] : false;
      // $horaPasada = isset($_POST['horaPasada']) ? $_POST['horaPasada'] : false;
      if ($idSolic && $motivo && $fecha) {
        $timeArray = explode('T', $fecha);
        $fechaDemo = $timeArray[0];
        $horaDemo = $timeArray[1];
        $control = new ControlSolic();
        $consultar = $control->reprogramarDemo($fechaDemo, $horaDemo, $idSolic, $motivo);
        if($consultar){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se reprogramó la demo correctamente'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta en la bd, por favor comniquese con soporte'
          ];
        }
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta recibiendo todos los parametros, por favor comniquese con soporte'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al enviar datos por POST, por favor comniquese con soporte'
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
    $respuesta = [];
    if (isset($_POST)) {
      $idSolic = isset($_POST['idSolic']) ? $_POST['idSolic'] : false;
      $observacion = isset($_POST['observacion']) ? $_POST['observacion'] : false;
      $controlObj = new ControlSolic();
      $estado = $controlObj->rechazarAgendarDemo($idSolic, $observacion);
      if ($estado) {
        $respuesta = [
          'estado' => 'ok',
          'mensaje' => 'Se ha rechazado la programacion de demo correctamente'
        ];
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'Error la consulta, por favor comniquese con soporte'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al comunicarse con el servidor, por favor comniquese con soporte'
      ];
    }
    return json_encode($respuesta);
  }
  public function confirmarDemoRealizada()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $idSolic = isset($_POST['idSolic']) ? $_POST['idSolic'] : false;
      if ($idSolic) {
        $controlObj = new ControlSolic();
        $estado = $controlObj->confirmarDemoRealizada($idSolic);
        if ($estado) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Felicidades, ahora esperemos que se pueda cerrar la venta'
          ];
        } else {
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta en la BD, comuníquese con soporte por favor'
          ];
        }
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta recibiendo los parametros necesarios, comuníquese con soporte por favor'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al momento de enviar el POST, comuníquese con soporte por favor'
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

$controlSolic = new ControllSolicController();
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'demosYCierres') {
    $controlSolic->index();
  } elseif ($_GET['method'] == 'agendarDemostracion') {
    echo ($controlSolic->agendarDemostracion());
  } elseif ($_GET['method'] == 'listarSolicLlamadasRealizadas') {
    echo ($controlSolic->listarSolicLlamadasRealizadas());
  } elseif ($_GET['method'] == 'listarSolicDemoPendientes') {
    echo ($controlSolic->listarSolicDemoPendientes());
  } elseif ($_GET['method'] == 'listarSolicVentasPendientes') {
    echo ($controlSolic->listarSolicVentasPendientes());
  } elseif ($_GET['method'] == 'rechazarAgendarDemo') {
    echo ($controlSolic->rechazarAgendarDemo());
  } elseif ($_GET['method'] == 'confirmarDemoRealizada') {
    echo ($controlSolic->confirmarDemoRealizada());
  } elseif ($_GET['method'] == 'cancelarDemo') {
    echo ($controlSolic->cancelarDemo());
  } elseif ($_GET['method'] == 'cerrarVenta') {
    echo ($controlSolic->cerrarVenta());
  } elseif ($_GET['method'] == 'reprogramarDemo') {
    echo ($controlSolic->reprogramarDemo());
  }
} else {
  //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}
