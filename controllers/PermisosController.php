<?php
session_start();
require_once "../models/permisos.php";

class PermisosControllers
{
  public function index()
  {
    require_once "../views/usuario/permisos.php";
  }

  public function listarPermisos()
  {
    $idEmpleadoPermiso = $_POST['idEmpleado'];
    $permisosArray = [];
    $serviciosObj = new Permisos();
    $permisos = $serviciosObj->listarPermisos($idEmpleadoPermiso);
    for ($i = 0; $i < count($permisos); $i++) {
      $permisosArray[$i] = $permisos[$i]['idUsuarioPermiso'];
    }
    return json_encode($permisos);
  }

  public function otorgarPermisos()
  {
    $idEmpleado = $_POST['idEmpleado'];
    $dashCobranza = $_POST['dashCobranza'];
    $dashSoporte = $_POST['dashSoporte'];
    $dashComunity = $_POST['dashComunity'];
    $p_servicio = $_POST['p_servicio'];
    $p_categoria = $_POST['p_categoria'];
    $p_proveedor = $_POST['p_proveedor'];
    $p_admiCaja = $_POST['p_admiCaja'];
    $p_histCaja = $_POST['p_histCaja'];
    $p_tipoComp = $_POST['p_tipoComp'];
    $p_serieComp = $_POST['p_serieComp'];
    $p_datos = $_POST['p_datos'];
    $p_sucursal = $_POST['p_sucursal'];
    $p_solic = $_POST['p_solic'];
    $p_atencion = $_POST['p_atencion'];
    $p_cliente = $_POST['p_cliente'];
    $p_proceso = $_POST['p_proceso'];
    $p_estados = $_POST['p_estados'];
    $p_contrato = $_POST['p_contrato'];
    $p_pension = $_POST['p_pension'];
    $p_clienteServ = $_POST['p_clienteServ'];
    $p_cargo = $_POST['p_cargo'];
    $p_usuario = $_POST['p_usuario'];
    $p_permiso = $_POST['p_permiso'];
    $p_ticket = $_POST['p_ticket'];
    $p_suspencion = $_POST['p_suspencion'];
    $p_baja = $_POST['p_baja'];
    $permisoRealizarInst = $_POST['permisoRealizarInst'];
    $p_reportes = $_POST['p_reportes'];
    $p_altaSistemas = $_POST['p_altaSistemas'];
    $p_agendarInst = $_POST['p_agendarInst'];
    $permiso = new Permisos();
    $permisoModel = $permiso->ortorgarPermisos($idEmpleado, $dashCobranza, $dashSoporte, $dashComunity, $p_servicio, $p_categoria, $p_proveedor, $p_admiCaja, $p_histCaja, $p_tipoComp, $p_serieComp, $p_datos, $p_sucursal, $p_solic, $p_atencion, $p_cliente, $p_proceso, $p_estados, $p_contrato, $p_pension, $p_clienteServ, $p_cargo, $p_usuario, $p_permiso, $p_ticket, $p_suspencion, $p_baja, $permisoRealizarInst, $p_reportes, $p_altaSistemas, $p_agendarInst);
    $respuesta = [];
    if($permisoModel){
      $respuesta = [
        'estado' => 'ok',
        'mensaje' => 'Se ha registrado los permisos correctamente'
      ];
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al intentar registrar permisos'
      ];
    }
    return json_encode($respuesta);
  }

  public function listarProveedoresCategoria()
  {
    $servicio = new Servicios();
    $proveedores = $servicio->listarProveedores();
    $categorias = $servicio->listarCategorias();
    $datos['prov'] = $proveedores;
    $datos['cate'] = $categorias;
    return json_encode($datos);
  }
}

$permiso = new PermisosControllers();
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'permisos') {
    $permiso->index();
  }
  if ($_GET['method'] == 'listarPermisos') {
    echo ($permiso->listarPermisos());
  }
  if ($_GET['method'] == 'otorgarPermisos') {
    echo ($permiso->otorgarPermisos());
  }
  if ($_GET['method'] == 'listarProveedoresCategoria') {
    echo $permiso->listarProveedoresCategoria();
  }
} else {
    //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}
