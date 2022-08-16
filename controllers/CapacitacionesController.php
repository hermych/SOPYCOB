<?php
session_start();
require_once "../models/servicios.php";

class ServiciosController
{
  public function capacitacionesView()
  {
    require_once "../views/capacitaciones/capacitaciones.php";
  }

  public function guardarServicio()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $nombreServicio = isset($_POST['nombreServicio']) ? $_POST['nombreServicio'] : false;
      $codServicio = isset($_POST['codServicio']) ? $_POST['codServicio'] : false;
      $precioServicio = isset($_POST['precioServicio']) ? $_POST['precioServicio'] : false;
      $proveedorServicio = isset($_POST['proveedorServicio']) ? $_POST['proveedorServicio'] : false;
      $categoriaServicio = isset($_POST['categoriaServicio']) ? $_POST['categoriaServicio'] : false;
      if ($nombreServicio && $codServicio && $precioServicio && $proveedorServicio && $categoriaServicio) {
        $serviciosObj = new Servicios();
        $save = $serviciosObj->guardarServicio($nombreServicio, $codServicio, $precioServicio, $proveedorServicio, $categoriaServicio);
        if ($save) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Servicio agregado correctamente'
          ];
        } else {
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al registrar servicio, intentelo mas tarde'
          ];
        }
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Llene todos los campos por favor'
      ];
    }
    return json_encode($respuesta);
  }

  public function listarServicios()
  {
    $indice = 1;
    $serviciosObj = new Servicios();
    $proveedores = $serviciosObj->listarServicios();
    foreach ($proveedores as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function listarServiciosGlobal()
  {
    $indice = 1;
    $serviciosObj = new Servicios();
    $proveedores = $serviciosObj->listarServiciosGlobal();
    foreach ($proveedores as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function editarServicio()
  {
    // RECOGER LOS DATOS
    $serviciosObj = new Servicios();
    $idServicio = isset($_POST['idServicio']) ? $_POST['idServicio'] : false;
    $editNombreServicio = isset($_POST['editNombreServicio']) ? $_POST['editNombreServicio'] : false;
    $editCodServicio = isset($_POST['editCodServicio']) ? $_POST['editCodServicio'] : false;
    $editPrecioServicio = isset($_POST['editPrecioServicio']) ? $_POST['editPrecioServicio'] : false;
    $editProveedorServicio = isset($_POST['editProveedorServicio']) ? $_POST['editProveedorServicio'] : false;
    $editCategoriaServicio = isset($_POST['editCategoriaServicio']) ? $_POST['editCategoriaServicio'] : false;
    // ENVIAR DATOS AL MODELO
    $serviciosObj->editarServicio($idServicio, $editNombreServicio, $editCodServicio, $editPrecioServicio, $editProveedorServicio, $editCategoriaServicio);
    if ($serviciosObj) {
      $respuesta = [
        'estado' => 'ok',
        'mensaje' => 'Servicio editado correctamente'
      ];
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al editar servicio, verifique los datos'
      ];
    }
    return json_encode($respuesta);
  }

  public function inhabilitarServicio()
  {
    $serviciosObj = new Servicios();
    $idServicio = isset($_POST['idServicio']) ? $_POST['idServicio'] : false;
    if ($idServicio) {
      $servicioInhabilitado = $serviciosObj->inhabilitarServicio($idServicio);
      if ($servicioInhabilitado) {
        $respuesta = [
          'estado' => 'ok',
          'mensaje' => 'Servicio inhabilitado correctamente'
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
        'mensaje' => 'Por favor ingrese el dato correctamente'
      ];
    }
    return json_encode($respuesta);
  }

  public function habilitarServicio()
  {
    $serviciosObj = new Servicios();
    $idServicio = isset($_POST['idServicio']) ? $_POST['idServicio'] : false;
    if ($idServicio) {
      $servicioInhabilitado = $serviciosObj->habilitarServicio($idServicio);
      if ($servicioInhabilitado) {
        $respuesta = [
          'estado' => 'ok',
          'mensaje' => 'Servicio habilitado correctamente'
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
        'mensaje' => 'Por favor ingrese el dato correctamente'
      ];
    }
    return json_encode($respuesta);
  }

  public function listarProveedoresCategoria(){
    $servicioObj = new Servicios();
    $datos = $servicioObj->listarProveedoresCategoria();
    return json_encode($datos);
  }

  public function suspenderServicioCliente(){
    $respuesta = [];
    if(isset($_POST)){
      $id = isset($_POST['idCliServ']) ? $_POST['idCliServ'] : false;
      $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : false;
      if($id && $motivo){
        $servicioObj = new Servicios();
        $suspender = $servicioObj->suspenderServicioCliente($id, $motivo);
        if($suspender == 1 || $suspender == '1'){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se realizo la suspencion del servicio correctamente'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error en la consulta, comuniquese con soporte'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'Por favor, escriba el motivo de suspencion'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Problemas con el servidor o la sesion, comuniquese con soporte'
      ];
    }
    return json_encode($respuesta);
  }

  public function cancelarSuspencionCobranza(){
    $respuesta = [];
    if(isset($_POST)){
      $id = isset($_POST['idCliServ']) ? $_POST['idCliServ'] : false;
      if($id){
        $servicioObj = new Servicios();
        $suspender = $servicioObj->cancelarSuspencion($id);
        if($suspender == 1 || $suspender == '1'){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se envio la solicitud de activacion del servicio correctamente'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error en la consulta, comuniquese con soporte'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'Por favor, escriba el motivo de suspencion'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Problemas con el servidor o la sesion, comuniquese con soporte'
      ];
    }
    return json_encode($respuesta);
  }

  public function cancelarSuspencionSoporte(){
    $respuesta = [];
    if(isset($_POST)){
      $id = isset($_POST['idClienteServicio']) ? $_POST['idClienteServicio'] : false;
      if($id){
        $servicioObj = new Servicios();
        $suspender = $servicioObj->cancelarSuspencionSoporte($id);
        if($suspender == 1 || $suspender == '1'){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se activo del servicio correctamente'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error en la consulta, comuniquese con soporte'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'Por favor, escriba el motivo de suspencion'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Problemas con el servidor o la sesion, comuniquese con soporte'
      ];
    }
    return json_encode($respuesta);
  }

  public function cancelarDarBajaSoporte(){
    $respuesta = [];
    if(isset($_POST)){
      $id = isset($_POST['idClienteServicio']) ? $_POST['idClienteServicio'] : false;
      if($id){
        $servicioObj = new Servicios();
        $suspender = $servicioObj->cancelarDarBajaSoporte($id);
        if($suspender == 1 || $suspender == '1'){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se activo del servicio correctamente'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error en la consulta, comuniquese con soporte'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'Por favor, escriba el motivo de suspencion'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Problemas con el servidor o la sesion, comuniquese con soporte'
      ];
    }
    return json_encode($respuesta);
  }

  public function suspencionSistemaView(){
    require_once "../views/soporte/suspencionSistemas.php";
  }

  public function darBajaSistemasView(){
    require_once "../views/soporte/darBajaSistemas.php";
  }

  public function listarSuspencionesDeSistemas(){
    $indice = 1;
    $servicioObj = new Servicios();
    $suspenciones = $servicioObj->listarSuspencionesDeSistemas();
    foreach ($suspenciones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function listarDarDeBajaSistemas(){
    $indice = 1;
    $servicioObj = new Servicios();
    $bajas = $servicioObj->listarDarDeBajaSistemas();
    foreach ($bajas as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function darDeBaja(){
    $respuesta = [];
    if(isset($_POST)){
      $id = isset($_POST['idCliServ']) ? $_POST['idCliServ'] : false;
      if($id){
        $servicioObj = new Servicios();
        $suspender = $servicioObj->darDeBaja($id);
        if($suspender == 1 || $suspender == '1'){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se procedio a dar de baja el servicio'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error en la consulta, comuniquese con soporte'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'Problemas con el servidor o la sesion, comuniquese con soporte'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Problemas con el servidor o la sesion, comuniquese con soporte'
      ];
    }
    return json_encode($respuesta);
  }

  public function suspencion(){
    $respuesta = [];
    if(isset($_POST)){
      $idClienteServicio = isset($_POST['idClienteServicio']) ? $_POST['idClienteServicio'] : false;
      if($idClienteServicio){
        $servicioObj = new Servicios();
        $response = $servicioObj->suspencion($idClienteServicio);
        if($response){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se suspendio el sistema correctamente'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error en la consulta, comuniquese con soporte'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se recibio el id, comuniquese con soporte'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al enviar los datos, comuniquese con soporte'
      ];
    }
    return json_encode($respuesta);
  }

  public function eliminacionServicio(){
    $respuesta = [];
    if(isset($_POST)){
      $idClienteServicio = isset($_POST['idClienteServicio']) ? $_POST['idClienteServicio'] : false;
      if($idClienteServicio){
        $servicioObj = new Servicios();
        $response = $servicioObj->darDeBajaAccion($idClienteServicio);
        if($response){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se elimino completamente el servicio'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error en la consulta, comuniquese con soporte'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se recibio el id, comuniquese con soporte'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al enviar los datos, comuniquese con soporte'
      ];
    }
    return json_encode($respuesta);
  }
}

$servicio = new ServiciosController();
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'capacitaciones') {
    $servicio->capacitacionesView();
  }
} else {
  //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}
