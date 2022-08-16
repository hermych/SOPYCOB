<?php
session_start();
require_once "../models/consultasCM.php";

class ConsultasCMCOntroller
{
  public function index()
  {
    require_once "../views/comunityManager/consultas.php";
  }
  public function guardarSolicInfo()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : false;
      $celular = isset($_POST['celular']) ? $_POST['celular'] : false;
      $canal = isset($_POST['canal']) ? $_POST['canal'] : false;
      $tipoInformacion = isset($_POST['tipoInformacion']) ? $_POST['tipoInformacion'] : false;
      $rubro = isset($_POST['rubro']) ? $_POST['rubro'] : '';
      $face = isset($_POST['face']) ? $_POST['face'] : '';
      $pauta = (isset($_POST['pauta']) && $_POST['pauta'] != '0') ? $_POST['pauta'] : '';
      if ($nombres && $celular && $canal) {
        $consultaMCObj = new ConsultasMC();
        $save = $consultaMCObj->guardarSolicInfo($nombres, $rubro, $celular, $canal, $face, $tipoInformacion, $pauta);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Solicitud de Informacion registrada correctamente'
          ];
        } else {
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al registrar solicitud de informacion, intentelo mas tarde'
          ];
        }
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No esta recibiendo todos los campos'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'No entro al if'
      ];
    }
    return json_encode($respuesta);
  }
  public function listarSolicInfo()
  {
    $indice = 1;
    $consultaMCObj = new ConsultasMC();
    $comprobantes = $consultaMCObj->listarSolicInfo();
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
  public function editarSolicInfoLlamar()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $idSolic = isset($_POST['idSolic']) ? $_POST['idSolic'] : false;
      $rubro = isset($_POST['rubro']) ? $_POST['rubro'] : false;
      $tipo_info = isset($_POST['tipo_info']) ? $_POST['tipo_info'] : false;
      $medio = isset($_POST['medioEnvioInfoLlamar']) ? $_POST['medioEnvioInfoLlamar'] : false;
      $correo = isset($_POST['correoEnvio']) ? $_POST['correoEnvio'] : '';
      $tipoDemo = isset($_POST['tipoDemo']) ? $_POST['tipoDemo'] : '';
      $fechaDemo = isset($_POST['fechaDemoLlamar']) ? $_POST['fechaDemoLlamar'] : '';
      $pauta = isset($_POST['pauta']) ? $_POST['pauta'] : '';
      $msj_pauta = isset($_POST['msj_pauta']) ? $_POST['msj_pauta'] : false;
      $observacionEnvio = isset($_POST['observacionEnvioInfo']) ? $_POST['observacionEnvioInfo'] : false;

      if ($idSolic && $rubro && $tipo_info && $medio && $msj_pauta && $observacionEnvio) {
        $consultaMCObj = new ConsultasMC();
        $save = $consultaMCObj->editarSolicInfoLlamar($idSolic, $rubro, $tipo_info, $medio, $msj_pauta, $observacionEnvio, $correo, $tipoDemo, $fechaDemo, $pauta);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Solicitud de Informacion registrada correctamente'
          ];
        } else {
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta en la BD. Comuníquese con soporte por favor'
          ];
        }
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta recibiendo todos los parametros. Comuníquese con soporte por favor'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Problemas con la funcion POST. Comuníquese con soporte por favor'
      ];
    }
    return json_encode($respuesta);
  }
  public function rechazarSolic()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $idSolic = isset($_POST['idSolic']) ? $_POST['idSolic'] : false;
      $observacion = isset($_POST['observacion']) ? $_POST['observacion'] : false;
      if ($idSolic && $observacion) {
        $consultaMCObj = new ConsultasMC();
        $estado = $consultaMCObj->rechazarSolic($idSolic, $observacion);
        if ($estado == '1') {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se ha rechazado la solicitud correctamente'
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
          'mensaje' => 'No se esta recibiendo todos los datos necesarios, comuníquese con soporte por favor'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error con el metodo POST, comuníquese con soporte por favor'
      ];
    }
    return json_encode($respuesta);
  }
}

$consultasCM = new ConsultasCMCOntroller();
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'consultasCM') {
    $consultasCM->index();
  } elseif ($_GET['method'] == 'guardarSolicInfo') {
    echo ($consultasCM->guardarSolicInfo());
  } elseif ($_GET['method'] == 'listarSolicInfo') {
    echo ($consultasCM->listarSolicInfo());
  } elseif ($_GET['method'] == 'editarSolicInfoLlamar') {
    echo ($consultasCM->editarSolicInfoLlamar());
  } elseif ($_GET['method'] == 'rechazarSolic') {
    echo ($consultasCM->rechazarSolic());
  }
} else {
  //    header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}
