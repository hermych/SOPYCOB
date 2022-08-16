<?php

require_once "../config/db.php";

class Permisos
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
  }

  /* ##### METODOS ###### */
  public function listarPermisos($idEmpleadoPermiso)
  {
    $consulta = "SELECT idUsuarioPermiso, idPermiso as 'valor', estado FROM usuarios_permisos WHERE idUsuario = $idEmpleadoPermiso";
    $consultar = $this->db->query($consulta);
    $categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
    return $categoriasServicios;
  }
  public function ortorgarPermisos($idEmpleado, $dashCobranza, $dashSoporte, $dashComunity, $p_servicio, $p_categoria, $p_proveedor, $p_admiCaja, $p_histCaja, $p_tipoComp, $p_serieComp, $p_datos, $p_sucursal, $p_solic, $p_atencion, $p_cliente, $p_proceso, $p_estados, $p_contrato, $p_pension, $p_clienteServ, $p_cargo, $p_usuario, $p_permiso, $p_ticket, $p_suspencion,$p_baja, $permisoRealizarInst, $p_reportes, $p_altaSistemas, $p_agendarInst){
    $resultado = false;
    $consulta1 = "UPDATE `usuarios_permisos` SET `estado`='$dashSoporte' WHERE idUsuario='$idEmpleado' AND idPermiso='1';";
    $consulta2 = "UPDATE `usuarios_permisos` SET `estado`='$dashCobranza' WHERE idUsuario='$idEmpleado' AND idPermiso='2';";
    $consulta3 = "UPDATE `usuarios_permisos` SET `estado`='$dashComunity' WHERE idUsuario='$idEmpleado' AND idPermiso='3';";
    $consulta4 = "UPDATE `usuarios_permisos` SET `estado`='$p_cliente' WHERE idUsuario='$idEmpleado' AND idPermiso='4';";
    $consulta5 = "UPDATE `usuarios_permisos` SET `estado`='$p_proveedor' WHERE idUsuario='$idEmpleado' AND idPermiso='5';";
    $consulta6 = "UPDATE `usuarios_permisos` SET `estado`='$p_categoria' WHERE idUsuario='$idEmpleado' AND idPermiso='6';";
    $consulta7 = "UPDATE `usuarios_permisos` SET `estado`='$p_servicio' WHERE idUsuario='$idEmpleado' AND idPermiso='7';";
    $consulta8 = "UPDATE `usuarios_permisos` SET `estado`='$p_estados' WHERE idUsuario='$idEmpleado' AND idPermiso='8';";
    $consulta9 = "UPDATE `usuarios_permisos` SET `estado`='$p_proceso' WHERE idUsuario='$idEmpleado' AND idPermiso='9';";
    $consulta10 = "UPDATE `usuarios_permisos` SET `estado`='$p_admiCaja' WHERE idUsuario='$idEmpleado' AND idPermiso='10';";
    $consulta11 = "UPDATE `usuarios_permisos` SET `estado`='$p_histCaja' WHERE idUsuario='$idEmpleado' AND idPermiso='11';";
    $consulta12 = "UPDATE `usuarios_permisos` SET `estado`='$p_contrato' WHERE idUsuario='$idEmpleado' AND idPermiso='12';";
    $consulta13 = "UPDATE `usuarios_permisos` SET `estado`='$p_pension' WHERE idUsuario='$idEmpleado' AND idPermiso='13';";
    $consulta14 = "UPDATE `usuarios_permisos` SET `estado`='$p_clienteServ' WHERE idUsuario='$idEmpleado' AND idPermiso='14';";
    $consulta15 = "UPDATE `usuarios_permisos` SET `estado`='$p_tipoComp' WHERE idUsuario='$idEmpleado' AND idPermiso='15';";
    $consulta16 = "UPDATE `usuarios_permisos` SET `estado`='$p_serieComp' WHERE idUsuario='$idEmpleado' AND idPermiso='16';";
    $consulta17 = "UPDATE `usuarios_permisos` SET `estado`='$p_usuario' WHERE idUsuario='$idEmpleado' AND idPermiso='17';";
    $consulta18 = "UPDATE `usuarios_permisos` SET `estado`='$p_cargo' WHERE idUsuario='$idEmpleado' AND idPermiso='18';";
    $consulta19 = "UPDATE `usuarios_permisos` SET `estado`='$p_permiso' WHERE idUsuario='$idEmpleado' AND idPermiso='19';";
    $consulta20 = "UPDATE `usuarios_permisos` SET `estado`='$p_datos' WHERE idUsuario='$idEmpleado' AND idPermiso='20';";
    $consulta21 = "UPDATE `usuarios_permisos` SET `estado`='$p_sucursal' WHERE idUsuario='$idEmpleado' AND idPermiso='21';";
    $consulta22 = "UPDATE `usuarios_permisos` SET `estado`='$p_ticket' WHERE idUsuario='$idEmpleado' AND idPermiso='22';";
    $consulta23 = "UPDATE `usuarios_permisos` SET `estado`='$p_suspencion' WHERE idUsuario='$idEmpleado' AND idPermiso='23';";
    $consulta24 = "UPDATE `usuarios_permisos` SET `estado`='$p_baja' WHERE idUsuario='$idEmpleado' AND idPermiso='24';";
    $consulta25 = "UPDATE `usuarios_permisos` SET `estado`='$p_solic' WHERE idUsuario='$idEmpleado' AND idPermiso='25';";
    $consulta26 = "UPDATE `usuarios_permisos` SET `estado`='$p_atencion' WHERE idUsuario='$idEmpleado' AND idPermiso='26';";
    $consulta27 = "UPDATE `usuarios_permisos` SET `estado`='$permisoRealizarInst' WHERE idUsuario='$idEmpleado' AND idPermiso='27';";
    $consulta28 = "UPDATE `usuarios_permisos` SET `estado`='$p_altaSistemas' WHERE idUsuario='$idEmpleado' AND idPermiso='28';";
    $consulta29 = "UPDATE `usuarios_permisos` SET `estado`='$p_agendarInst' WHERE idUsuario='$idEmpleado' AND idPermiso='29';";
    $consulta30 = "UPDATE `usuarios_permisos` SET `estado`='$p_reportes' WHERE idUsuario='$idEmpleado' AND idPermiso='30';";
    $consultar1 = $this->db->query($consulta1);
    $consultar2 = $this->db->query($consulta2);
    $consultar3 = $this->db->query($consulta3);
    $consultar4 = $this->db->query($consulta4);
    $consultar5 = $this->db->query($consulta5);
    $consultar6 = $this->db->query($consulta6);
    $consultar7 = $this->db->query($consulta7);
    $consultar8 = $this->db->query($consulta8);
    $consultar9 = $this->db->query($consulta9);
    $consultar10 = $this->db->query($consulta10);
    $consultar11 = $this->db->query($consulta11);
    $consultar12 = $this->db->query($consulta12);
    $consultar13 = $this->db->query($consulta13);
    $consultar14 = $this->db->query($consulta14);
    $consultar15 = $this->db->query($consulta15);
    $consultar16 = $this->db->query($consulta16);
    $consultar17 = $this->db->query($consulta17);
    $consultar18 = $this->db->query($consulta18);
    $consultar19 = $this->db->query($consulta19);
    $consultar20 = $this->db->query($consulta20);
    $consultar21 = $this->db->query($consulta21);
    $consultar22 = $this->db->query($consulta22);
    $consultar23 = $this->db->query($consulta23);
    $consultar24 = $this->db->query($consulta24);
    $consultar25 = $this->db->query($consulta25);
    $consultar26 = $this->db->query($consulta26);
    $consultar27 = $this->db->query($consulta27);
    $consultar28 = $this->db->query($consulta28);
    $consultar29 = $this->db->query($consulta29);
    $consultar30 = $this->db->query($consulta30);
    if($consultar1 && $consultar2 && $consultar3 && $consultar4 && $consultar5 && $consultar6 && $consultar7 && $consultar8 && $consultar9 && $consultar10 && $consultar11 && $consultar12 && $consultar13 && $consultar14 && $consultar15 && $consultar16 && $consultar17 && $consultar18 && $consultar19 && $consultar20 && $consultar21 && $consultar22 && $consultar23 && $consultar24 && $consultar25 && $consultar26 && $consultar27 && $consultar28 && $consultar29 && $consultar30){
      $resultado = true;
    }
    return $resultado;
  }
  public function listarProveedores()
  {
    $roles = [];
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
}


// $usuario = new Proveedores();
// $usuarios = $usuario->listarProveedores();
// echo json_encode($usuarios);

// var_dump($usuarios);