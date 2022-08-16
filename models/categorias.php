<?php

require_once "../config/db.php";

class Servicios
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
  }

  /* ##### METODOS ###### */
  public function guardarServicio($nombreServicio, $codServicio, $precioServicio, $proveedorServicio, $categoriaServicio)
  {
    $sql = "INSERT INTO `servicios`(`codInterno`, `nombreServicio`, `precio`, `idServProveedores`, `idServCategoria`) VALUES ('$codServicio','$nombreServicio','$precioServicio','$proveedorServicio','$categoriaServicio')";
    $save = $this->db->query($sql);
    $result = false;
    if ($save) {
      $result = true;
    }
    return $result;
  }

  public function listarServicios()
  {
    $consulta = "SELECT servicios.idServicio, servicios.nombreServicio, servicios.codInterno, servicios.precio, servicios.idServProveedores as 'idProveedor',serv_proveedores.nombreProveedor as 'proveedor', servicios.idServCategoria as 'idCategoria', serv_categorias.nombreCategoria as 'categoria', servicios.idUnidadMedida, servicios.estado FROM servicios, serv_proveedores, serv_categorias WHERE serv_proveedores.idServProveedores = servicios.idServProveedores AND serv_categorias.idServCategoria = servicios.idServCategoria AND servicios.estado='activo' ORDER BY `servicios`.`idServicio` ASC";
    $consultar = $this->db->query($consulta);
    $categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
    return $categoriasServicios;
  }

  public function listarServiciosGlobal()
  {
    $consulta = "SELECT servicios.idServicio, servicios.nombreServicio, servicios.codInterno, servicios.precio, servicios.idServProveedores as 'idProveedor',serv_proveedores.nombreProveedor as 'proveedor', servicios.idServCategoria as 'idCategoria', serv_categorias.nombreCategoria as 'categoria', servicios.idUnidadMedida, servicios.estado FROM servicios, serv_proveedores, serv_categorias WHERE serv_proveedores.idServProveedores = servicios.idServProveedores AND serv_categorias.idServCategoria = servicios.idServCategoria ORDER BY `servicios`.`idServicio` ASC";
    $consultar = $this->db->query($consulta);
    $categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
    return $categoriasServicios;
  }

  public function editarServicio($idServicio, $editNombreServicio, $editCodServicio, $editPrecioServicio, $editProveedorServicio, $editCategoriaServicio)
  {
    $consulta = "UPDATE `servicios` SET `codInterno`='$editCodServicio',`nombreServicio`='$editNombreServicio',`precio`='$editPrecioServicio',`idServProveedores`='$editProveedorServicio',`idServCategoria`='$editCategoriaServicio' WHERE idServicio = $idServicio";
    $query = $this->db->query($consulta);
    return $query;
  }

  public function inhabilitarServicio($idServicio)
  {
    $consulta = "UPDATE `servicios` SET `estado`='inhabilitado' WHERE idServicio  = $idServicio";
    $query = $this->db->query($consulta);
    return $query;
  }

  public function habilitarServicio($idServicio)
  {
    $consulta = "UPDATE `servicios` SET `estado`='activo' WHERE idServicio  = $idServicio";
    $query = $this->db->query($consulta);
    return $query;
  }

  public function listarProveedores()
  {
    $consulta = "SELECT idServProveedores as 'id', nombreProveedor as 'nombre' FROM `serv_proveedores` WHERE estado='activo';";
    $consultar = $this->db->query($consulta);
    $roles = $consultar->fetch_all(MYSQLI_ASSOC);
    return $roles;
  }

  public function listarCategorias()
  {
    $roles = [];
    $consulta = "SELECT idServCategoria as 'id', nombreCategoria as 'nombre' FROM `serv_categorias` WHERE estado='activo';";
    $consultar = $this->db->query($consulta);
    $roles = $consultar->fetch_all(MYSQLI_ASSOC);
    return $roles;
  }

  public function listarProveedoresCategoria(){
    $datos = [];
    $proveedores = $this->listarProveedores();
    $categorias = $this->listarCategorias();
    $datos['prov'] = $proveedores;
    $datos['cat'] = $categorias;
    return $datos;
  }

  public function listarSuspencionesDeSistemas(){
    $sql_listar = "SELECT clientes_servicios.idClienteServicio as 'idClienteServicio', clientes.nombreCliente as 'cliente', servicios.nombreServicio as 'servicio', clientes_servicios.tiempoContrato as 'duracion', clientes_servicios.motivoSuspencion as 'motivo', clientes_servicios.estadoClienteServicio as 'estado' FROM clientes_servicios, clientes, servicios WHERE clientes_servicios.idCliente = clientes.idCliente AND clientes_servicios.idServicio = servicios.idServicio AND (clientes_servicios.estadoClienteServicio = 'porSuspender' OR clientes_servicios.estadoClienteServicio = 'porActivar') ORDER BY cliente";
    $listar = $this->db->query($sql_listar);
    $clienteServicio = $listar->fetch_all(MYSQLI_ASSOC);
    return $clienteServicio;
  }

  public function listarDarDeBajaSistemas(){
    $sql_listar = "SELECT clientes_servicios.idClienteServicio as 'idClienteServicio', clientes.nombreCliente as 'cliente', servicios.nombreServicio as 'servicio', clientes_servicios.estadoClienteServicio as 'estado' FROM clientes_servicios, clientes, servicios WHERE clientes_servicios.idCliente = clientes.idCliente AND clientes_servicios.idServicio = servicios.idServicio AND clientes_servicios.estadoClienteServicio = 'porEliminar'  ORDER BY cliente";
    $listar = $this->db->query($sql_listar);
    $clienteServicio = $listar->fetch_all(MYSQLI_ASSOC);
    return $clienteServicio;
  }

  // ****** CAMBIAR A ESTADO POR ACTIVAR (SERVICIO SUSPENDIDO) ********
  public function cancelarSuspencion($id)
  {
    $fecha = date('Y-m-d');
    $mes = date("m", strtotime($fecha . "+ 1 month"));
    $año = date('Y');
    $fechaPension = "$año-$mes-01";

    #SUSPENDER CONTRATO
    $sql_suspender_contrato = "UPDATE `clientes_servicios` SET `estadoClienteServicio`='porActivar', `motivoSuspencion` = '-' WHERE idClienteServicio  = $id";
    #CAMBIAR ESTADO A LAS PENSIONES SIGUIENTES DEL MES ACTUAL
    $sql_suspender_pension = "UPDATE detalle_pensiones SET estadoPago = 'porActivar', estadoPension = 'porActivar' WHERE idClienteServicio = $id AND fechaPago > '$fechaPension'";

    $query = $this->db->query($sql_suspender_contrato);
    if ($query) {
      $query2 = $this->db->query($sql_suspender_pension);
      if($query2){
        return $query2;
      }else{
        return 0;
      }
    }else{
      return 0;
    }
  }

  // ****** REACTIVAR SERVICIO SUSPENDIDO CONFIRMACION DESDE SOPORTE********
  public function cancelarSuspencionSoporte($id)
  {
    $fecha = date('Y-m-d');
    $mes = date("m", strtotime($fecha . "+ 1 month"));
    $año = date('Y');
    $fechaPension = "$año-$mes-01";

    #SUSPENDER CONTRATO
    $sql_suspender_contrato = "UPDATE `clientes_servicios` SET `estadoClienteServicio`='activo', `motivoSuspencion` = '-', `idUsuarioSuspende` = NULL, `fechaSuspencion` = NULL WHERE idClienteServicio  = $id";
    #CAMBIAR ESTADO A LAS PENSIONES SIGUIENTES DEL MES ACTUAL
    $sql_suspender_pension = "UPDATE detalle_pensiones SET estadoPago = 'pendiente', estadoPension = 'pendiente' WHERE idClienteServicio = $id AND fechaPago > '$fechaPension'";

    $query = $this->db->query($sql_suspender_contrato);
    if ($query) {
      $query2 = $this->db->query($sql_suspender_pension);
      if($query2){
        return $query2;
      }else{
        return 0;
      }
    }else{
      return 0;
    }
  }

  // ****** CAMBIAR A ESTADO POR SUSPENDER ********
  public function suspenderServicioCliente($id, $motivo)
  {
    $fecha = date('Y-m-d');
    $mes = date("m", strtotime($fecha . "+ 1 month"));
    $año = date('Y');
    $fechaPension = "$año-$mes-01";

    #SUSPENDER CONTRATO
    $sql_suspender_contrato = "UPDATE `clientes_servicios` SET `estadoClienteServicio`='porSuspender', `motivoSuspencion` = '$motivo' WHERE idClienteServicio  = $id";
    #CAMBIAR ESTADO A LAS PENSIONES SIGUIENTES DEL MES ACTUAL
    $sql_suspender_pension = "UPDATE detalle_pensiones SET estadoPago = 'porSuspender', estadoPension = 'porSuspender' WHERE idClienteServicio = $id AND fechaPago > '$fechaPension'";

    $query = $this->db->query($sql_suspender_contrato);
    if ($query) {
      $query2 = $this->db->query($sql_suspender_pension);
      if($query2){
        return $query2;
      }else{
        return 0;
      }
    }else{
      return 0;
    }
  }

  // ****** CAMBIAR A ESTADO POR ELIMINAR ********
  public function darDeBaja($id)
  {
    $fecha = date('Y-m-d');
    $mes = date("m", strtotime($fecha . "+ 1 month"));
    $año = date('Y');
    $fechaPension = "$año-$mes-01";

    #SUSPENDER CONTRATO
    $sql_suspender_contrato = "UPDATE `clientes_servicios` SET `estadoClienteServicio`='porEliminar' WHERE idClienteServicio  = $id";
    #CAMBIAR ESTADO A LAS PENSIONES SIGUIENTES DEL MES ACTUAL
    $sql_suspender_pension = "UPDATE detalle_pensiones SET estadoPago = 'porEliminar', estadoPension = 'porEliminar' WHERE idClienteServicio = $id AND fechaPago > '$fechaPension'";

    $query = $this->db->query($sql_suspender_contrato);
    if ($query) {
      $query2 = $this->db->query($sql_suspender_pension);
      if($query2){
        return $query2;
      }else{
        return 0;
      }
    }else{
      return 0;
    }
  }

  // ****** CAMBIAR A ESTADO DE POR ELIMINAR A ACTIVO ********
  public function cancelarDarBajaSoporte($id)
  {
    $fecha = date('Y-m-d');
    $mes = date("m", strtotime($fecha . "+ 1 month"));
    $año = date('Y');
    $fechaPension = "$año-$mes-01";

    #SUSPENDER CONTRATO
    $sql_suspender_contrato = "UPDATE `clientes_servicios` SET `estadoClienteServicio`='activo', `motivoSuspencion` = '-', `idUsuarioSuspende` = NULL, `fechaSuspencion` = NULL WHERE idClienteServicio  = $id";
    #CAMBIAR ESTADO A LAS PENSIONES SIGUIENTES DEL MES ACTUAL
    $sql_suspender_pension = "UPDATE detalle_pensiones SET estadoPago = 'pendiente', estadoPension = 'pendiente' WHERE idClienteServicio = $id AND fechaPago > '$fechaPension'";

    $query = $this->db->query($sql_suspender_contrato);
    if ($query) {
      $query2 = $this->db->query($sql_suspender_pension);
      if($query2){
        return $query2;
      }else{
        return 0;
      }
    }else{
      return 0;
    }
  }

  // ****** SUSPENDER SISTEMA (estado suspendido) **********
  public function suspencion($id){
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    $fecha = date('Y-m-d');
    $mes = date("m", strtotime($fecha . "+ 1 month"));
    $año = date('Y');
    $fechaPension = "$año-$mes-01";

    #SUSPENDER CONTRATO
    $sql_suspender_servicio = "UPDATE `clientes_servicios` SET `estadoClienteServicio`='suspendido', `fechaSuspencion` = '$fecha', `idUsuarioSuspende` = '$idUsuario' WHERE idClienteServicio  = $id";
    #CAMBIAR ESTADO A LAS PENSIONES SIGUIENTES DEL MES ACTUAL
    $sql_suspender_pension = "UPDATE detalle_pensiones SET estadoPago = 'suspendido', estadoPension = 'suspendido' WHERE idClienteServicio = $id AND fechaPago > '$fechaPension'";

    $query = $this->db->query($sql_suspender_servicio);
    if ($query) {
      $query2 = $this->db->query($sql_suspender_pension);
      if($query2){
        return $query2;
      }else{
        return 0;
      }
    }else{
      return 0;
    }
  }
  // ****** DAR DE BAJA A UN SISTEMA (estado eliminado) **********
  public function darDeBajaAccion($id){
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    $fecha = date('Y-m-d');
    $mes = date("m", strtotime($fecha . "+ 1 month"));
    $año = date('Y');
    $fechaPension = "$año-$mes-01";

    #SUSPENDER CONTRATO
    $sql_suspender_servicio = "UPDATE `clientes_servicios` SET `estadoClienteServicio`='eliminado', `fechaEliminacion` = '$fecha', `idUsuarioElimina` = '$idUsuario' WHERE idClienteServicio  = $id";
    #CAMBIAR ESTADO A LAS PENSIONES SIGUIENTES DEL MES ACTUAL
    $sql_suspender_pension = "UPDATE detalle_pensiones SET estadoPago = 'eliminado', estadoPension = 'eliminado' WHERE idClienteServicio = $id AND fechaPago > '$fechaPension'";

    $query = $this->db->query($sql_suspender_servicio);
    if ($query) {
      $query2 = $this->db->query($sql_suspender_pension);
      if($query2){
        return $query2;
      }else{
        return 0;
      }
    }else{
      return 0;
    }
  }
}