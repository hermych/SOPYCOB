<?php
session_start();
require_once "../models/caja.php";
require_once "../helpers/utils.php";

class CajaController
{
  public function index()
  {
    require_once "../views/pagos/pensiones.php";
  }

  public function abrirCaja()
  {
    $montoApertura = $_POST['montoApertura'];
    $cajaObj = new Caja();
    $cajaArray = $cajaObj->abrirCaja($montoApertura);
    if ($cajaArray) {
      $respuesta = [
        'estado' => 'ok',
        'mensaje' => 'Caja abierta correctamente. A cobrar $_$'
      ];
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al abrir caja'
      ];
    }
    return json_encode($respuesta);
  }

  public function consultarCajaAbierta()
  {
    $respuesta = [];
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    $cajaObj = new Caja();
    $cajaArray = $cajaObj->consultarCajaAbierta($idUsuario);
    if (count($cajaArray) == 0) {
      $respuesta = [
        'estado' => 'abrir',
      ];
    } else {
      $respuesta = [
        'estado' => 'abierto',
      ];
    }
    return json_encode($respuesta);
  }

  public function vistaAdmiCaja()
  {
    require_once "../views/caja/administrar.php";
  }

  public function vistaHistorialCaja()
  {
    require_once "../views/caja/historial.php";
  }

  public function movimientoCaja()
  {
    $cajaObj = new Caja();
    $datos = $cajaObj->movimiento();
    return json_encode($datos);
  }

  public function listarIngresos()
  {
    $indice = 1;
    $cajaObj = new Caja();
    $ingresos = $cajaObj->listarIngresos();
    if (count($ingresos) != 0) {
      foreach ($ingresos as $key => $value) {
        $json['data'][$key] = $value;
      }
      for ($i = 0; $i < count($json['data']); $i++) {
        $json['data'][$i]['indice'] = $indice;
        $indice++;
      }
    } else {
      $ingresos[0] = [
        "monto" => "",
        "descripcion" => "",
        "indice" => "",
      ];
      foreach ($ingresos as $key => $value) {
        $json['data'][$key] = $value;
      }
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function listarDevoluciones()
  {
    $indice = 1;
    $cajaObj = new Caja();
    $devoluciones = $cajaObj->listarDevoluciones();
    if (count($devoluciones) != 0) {
      foreach ($devoluciones as $key => $value) {
        $json['data'][$key] = $value;
      }
      for ($i = 0; $i < count($json['data']); $i++) {
        $json['data'][$i]['indice'] = $indice;
        $indice++;
      }
    } else {
      $devoluciones[0] = [
        "monto" => "",
        "descripcion" => "",
        "indice" => "",
      ];
      foreach ($devoluciones as $key => $value) {
        $json['data'][$key] = $value;
      }
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function listarPrestamos()
  {
    $indice = 1;
    $cajaObj = new Caja();
    $prestamos = $cajaObj->listarPrestamos();
    if (count($prestamos) != 0) {
      foreach ($prestamos as $key => $value) {
        $json['data'][$key] = $value;
      }
      for ($i = 0; $i < count($json['data']); $i++) {
        $json['data'][$i]['indice'] = $indice;
        $indice++;
      }
    } else {
      $prestamos[0] = [
        "monto" => "",
        "descripcion" => "",
        "indice" => "",
      ];
      foreach ($prestamos as $key => $value) {
        $json['data'][$key] = $value;
      }
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function listarGastos()
  {
    $indice = 1;
    $cajaObj = new Caja();
    $gastos = $cajaObj->listarGastos();
    if (count($gastos) != 0) {
      foreach ($gastos as $key => $value) {
        $json['data'][$key] = $value;
      }
      for ($i = 0; $i < count($json['data']); $i++) {
        $json['data'][$i]['indice'] = $indice;
        $indice++;
      }
    } else {
      $gastos[0] = [
        "monto" => "",
        "descripcion" => "",
        "indice" => "",
      ];
      foreach ($gastos as $key => $value) {
        $json['data'][$key] = $value;
      }
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function editarMontoInicial()
  {
    $respuesta = [];
    $monto = $_POST['monto'];
    $cajaObj = new Caja();
    $resultado = $cajaObj->editarMontoInicial($monto);
    if ($resultado) {
      $respuesta = [
        'estado' => 'ok',
        'mensaje' => 'Monto inicial editado correctamente'
      ];
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al realizar la consulta'
      ];
    }
    return json_encode($respuesta);
  }

  public function registrarMovimiento(){
    $respuesta = [];
    $descripcion = $_POST['descripcion'];
    $monto = $_POST['monto'];
    $tipo = $_POST['tipoMov'];
    $cajaObj = new Caja();
    $resultado = $cajaObj->registrarMovimiento($descripcion, $monto, $tipo);
    if ($resultado) {
      $respuesta = [
        'estado' => 'ok',
        'mensaje' => 'Movimiento registrado correctamente'
      ];
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al realizar la consulta'
      ];
    }
    return json_encode($respuesta);
  }

  public function cerrarCaja()
    {
      $respuesta = [];
      $idUsuario = $_SESSION['identity']->{'idUsuario'};
      $cajaObj = new Caja();
      $caja = ($cajaObj->consultarCajaAbierta($idUsuario))[0];
      $idCaja = $caja['idCaja'];
      $montoCierre = $cajaObj->montoCierre($idCaja);
      if($montoCierre){
        $respuesta = [
          'estado' => 'ok',
          'mensaje' => 'Se ha cerrado caja. Por favor vuelva abrir caja para poder administrarla.'
        ];
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'Se ha producido un error interno. Por favor, comuniquese con soporte'
        ];
      }
      return json_encode($respuesta);
    }

  public function historialCaja()
  {
    $indice = 1;
    $cajaObj = new Caja();
    $cajas = $cajaObj->historialCaja();
    if (count($cajas) != 0) {
      foreach ($cajas as $key => $value) {
        $json['data'][$key] = $value;
      }
      for ($i = 0; $i < count($json['data']); $i++) {
        $json['data'][$i]['indice'] = $indice;
        $indice++;
      }
    }
    /*else {
      $prestamos[0] = [
        "monto" => "",
        "descripcion" => "",
        "indice" => "",
      ];
      foreach ($prestamos as $key => $value) {
        $json['data'][$key] = $value;
      }
    }*/
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function montoCierreCaja(){
    $respuesta = [];
    if(isset($_POST)){
      $idCaja = isset($_POST['idCaja']) ? $_POST['idCaja'] : false;
      if($idCaja){
        $cajaObj = new Caja();
        $montoCierre = $cajaObj->montoCierre($idCaja);
        if($montoCierre){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se ha cerrado correctamente la caja'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error en la consulta, por favor comuniquese con soporte'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se ha recibido el id de la caja, comuniquese con soporte por favor'
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
}

$cajaObj = new CajaController();


if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'consultarCajaAbierta') {
    echo ($cajaObj->consultarCajaAbierta());
  }
  if ($_GET['method'] == 'abrirCaja') {
    echo ($cajaObj->abrirCaja());
  }
  if ($_GET['method'] == 'admiCaja') {
    echo ($cajaObj->vistaAdmiCaja());
  }
  if ($_GET['method'] == 'historial') {
    echo ($cajaObj->vistaHistorialCaja());
  }
  if ($_GET['method'] == 'movimiento') {
    echo ($cajaObj->movimientoCaja());
  }
  if ($_GET['method'] == 'listarIngresos') {
    echo ($cajaObj->listarIngresos());
  }
  if ($_GET['method'] == 'listarDevoluciones') {
    echo ($cajaObj->listarDevoluciones());
  }
  if ($_GET['method'] == 'listarPrestamos') {
    echo ($cajaObj->listarPrestamos());
  }
  if ($_GET['method'] == 'listarGastos') {
    echo ($cajaObj->listarGastos());
  }
  if ($_GET['method'] == 'editarMontoInicial') {
    echo ($cajaObj->editarMontoInicial());
  }
  if ($_GET['method'] == 'registrarMovimiento') {
    echo ($cajaObj->registrarMovimiento());
  }
  if ($_GET['method'] == 'cerrarCaja') {
      echo ($cajaObj->cerrarCaja());
    }
  if ($_GET['method'] == 'historialCaja') {
    echo ($cajaObj->historialCaja());
  }
  if ($_GET['method'] == 'montoCierreCaja') {
    echo ($cajaObj->montoCierreCaja());
  }
} else {
    header("Location:../views/sinSesion.php");
}
