<?php

require_once "../config/db.php";

class Instalaciones
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
  }

  /* ##### METODOS ###### */
  public function agendar($tipo_sistema, $titulo, $asesor, $dominioPos, $dominioFactura, $dominioRestobar, $cliente, $dni, $razonSocial, $name_comercial, $ruc, $tipo_negocio, $celular, $telefono, $correo, $direc_fiscal, $serie_compro, $especificacion, $observacion, $persona_contacto, $cel_contacto, $equipo_principal, $equipo_cocina, $equipo_bar, $total_impresoras, $usuario_sol, $clave_sol, $logo_1, $logo_2)
  {
    $fecha_registra = date('Y-m-d');
    $usuario = $_SESSION['identity']->{'idUsuario'};
    if($tipo_sistema == '1'){
      $sql_agendar = "INSERT INTO `agendar_instalaciones`(`titulo`, `asesor`,`tipo_sistema`, `dominio_pos`, `cliente`, `dni`, `razon_social`, `nombre_comercial`, `ruc`, `tipo_negocio`, `celular`, `telefono`, `correo`, `direccion_fiscal`, `serie_comprobante`, `especificacion`, `observacion`, `fecha_registro`, `usuario_registra`, `logo_1`, `logo_2`) VALUES ('$titulo','$asesor','$tipo_sistema','$dominioPos','$cliente','$dni','$razonSocial','$name_comercial','$ruc','$tipo_negocio','$celular','$telefono','$correo','$direc_fiscal','$serie_compro','$especificacion','$observacion','$fecha_registra','$usuario','$logo_1','$logo_2')";
    }elseif($tipo_sistema == '2'){
      $sql_agendar = "INSERT INTO `agendar_instalaciones`(`titulo`, `asesor`, `tipo_sistema`, `dominio_factura`, `cliente`, `dni`, `razon_social`, `nombre_comercial`, `ruc`, `tipo_negocio`, `celular`, `telefono`, `correo`, `direccion_fiscal`, `serie_comprobante`, `especificacion`, `observacion`, `usuario_sol`, `clave_sol`, `logo_1`, `logo_2`,`fecha_registro`, `usuario_registra`) VALUES ('$titulo','$asesor', '$tipo_sistema', '$dominioFactura', '$cliente', '$dni', '$razonSocial', '$name_comercial', '$ruc', '$tipo_negocio', '$celular', '$telefono', '$correo', '$direc_fiscal', '$serie_compro', '$especificacion', '$observacion', '$usuario_sol', '$clave_sol', '$logo_1', '$logo_2', '$fecha_registra', '$usuario')";
    }elseif($tipo_sistema == '3'){
      $sql_agendar = "INSERT INTO `agendar_instalaciones`(`titulo`, `asesor`, `tipo_sistema`, `cliente`, `dni`, `razon_social`, `nombre_comercial`, `ruc`, `tipo_negocio`, `celular`, `telefono`, `correo`, `direccion_fiscal`, `serie_comprobante`, `especificacion`, `observacion`, `persona_contacto`, `celular_contacto`, `equip_caja_prin`, `equipo_cocina`, `equipo_bar`, `total_impresoras`, `logo_1`, `logo_2`, `fecha_registro`, `usuario_registra`) VALUES ('$titulo','$asesor', '$tipo_sistema', '$cliente', '$dni', '$razonSocial', '$name_comercial', '$ruc', '$tipo_negocio', '$celular', '$telefono', '$correo', '$direc_fiscal', '$serie_compro', '$especificacion', '$observacion', '$persona_contacto', '$cel_contacto', '$equipo_principal', '$equipo_cocina', '$equipo_bar', '$total_impresoras', '$logo_1', '$logo_2', '$fecha_registra', '$usuario')";
    }elseif($tipo_sistema == '4'){
      $sql_agendar = "INSERT INTO `agendar_instalaciones`(`titulo`, `asesor`, `tipo_sistema`, `dominio_rest_web`, `cliente`, `dni`, `razon_social`, `nombre_comercial`, `ruc`, `tipo_negocio`, `celular`, `telefono`, `correo`, `direccion_fiscal`, `serie_comprobante`, `especificacion`, `observacion`, `logo_1`, `logo_2`, `fecha_registro`, `usuario_registra`) VALUES ('$titulo','$asesor', '$tipo_sistema', '$dominioRestobar', '$cliente', '$dni', '$razonSocial', '$name_comercial', '$ruc', '$tipo_negocio', '$celular', '$telefono', '$correo', '$direc_fiscal', '$serie_compro', '$especificacion', '$observacion', '$logo_1', '$logo_2', '$fecha_registra', '$usuario')";
    }elseif($tipo_sistema == '5'){
      $sql_agendar = "INSERT INTO `agendar_instalaciones`(`titulo`, `asesor`, `tipo_sistema`, `dominio_pos`, `dominio_factura`, `cliente`, `dni`, `razon_social`, `nombre_comercial`, `ruc`, `tipo_negocio`, `celular`, `telefono`, `correo`, `direccion_fiscal`, `serie_comprobante`, `especificacion`, `observacion`, `usuario_sol`, `clave_sol`, `logo_1`, `logo_2`, `fecha_registro`, `usuario_registra`) VALUES ('$titulo','$asesor', '$tipo_sistema', '$dominioPos', '$dominioFactura', '$cliente', '$dni', '$razonSocial', '$name_comercial', '$ruc', '$tipo_negocio', '$celular', '$telefono', '$correo', '$direc_fiscal', '$serie_compro', '$especificacion', '$observacion', '$usuario_sol', '$clave_sol', '$logo_1', '$logo_2', '$fecha_registra', '$usuario')";
    }elseif($tipo_sistema == '6'){
      $sql_agendar = "INSERT INTO `agendar_instalaciones`(`titulo`, `asesor`, `tipo_sistema`, `dominio_factura`, `cliente`, `dni`, `razon_social`, `nombre_comercial`, `ruc`, `tipo_negocio`, `celular`, `telefono`, `correo`, `direccion_fiscal`, `serie_comprobante`, `especificacion`, `observacion`, `persona_contacto`, `celular_contacto`, `equip_caja_prin`, `equipo_cocina`, `equipo_bar`, `total_impresoras`, `usuario_sol`, `clave_sol`, `logo_1`, `logo_2`, `fecha_registro`, `usuario_registra`) VALUES ('$titulo','$asesor', '$tipo_sistema', '$dominioFactura', '$cliente', '$dni', '$razonSocial', '$name_comercial', '$ruc', '$tipo_negocio', '$celular', '$telefono', '$correo', '$direc_fiscal', '$serie_compro', '$especificacion', '$observacion', '$persona_contacto', '$cel_contacto', '$equipo_principal', '$equipo_cocina', '$equipo_bar', '$total_impresoras', '$usuario_sol', '$clave_sol', '$logo_1', '$logo_2', '$fecha_registra', '$usuario')";
    }elseif($tipo_sistema == '7'){
      $sql_agendar = "INSERT INTO `agendar_instalaciones`(`titulo`, `asesor`, `tipo_sistema`, `dominio_factura`, `dominio_rest_web`, `cliente`, `dni`, `razon_social`, `nombre_comercial`, `ruc`, `tipo_negocio`, `celular`, `telefono`, `correo`, `direccion_fiscal`, `serie_comprobante`, `especificacion`, `observacion`, `usuario_sol`, `clave_sol`, `logo_1`, `logo_2`, `fecha_registro`, `usuario_registra`) VALUES ('$titulo','$asesor', '$tipo_sistema', '$dominioFactura', '$dominioRestobar', '$cliente', '$dni', '$razonSocial', '$name_comercial', '$ruc', '$tipo_negocio', '$celular', '$telefono', '$correo', '$direc_fiscal', '$serie_compro', '$especificacion', '$observacion', '$usuario_sol', '$clave_sol', '$logo_1', '$logo_2', '$fecha_registra', '$usuario')";
    }
    $agendar = $this->db->query($sql_agendar);
    $result = false;
    if ($agendar) {
      $result = true;
    }
    return $result;
  }
  public function listarInstalaciones()
  {
    $consulta = "SELECT ai.*, u.nombre FROM `agendar_instalaciones` as ai , usuarios as u WHERE ai.usuario_registra = u.idUsuario AND ai.estado != 'rechazado' ORDER BY ai.id DESC;";
    $listar = $this->db->query($consulta);
    $instalaciones = $listar->fetch_all(MYSQLI_ASSOC);
    return $instalaciones;
  }
  public function listarMisSolicInsta()
  {
    $usuario_realiza = $usuario = $_SESSION['identity']->{'idUsuario'};
    $consulta = "SELECT ai.*, u.nombre FROM `agendar_instalaciones` as ai , usuarios as u WHERE ai.usuario_registra = u.idUsuario  AND ai.usuario_registra = '$usuario_realiza' ORDER BY ai.id DESC;";
    $listar = $this->db->query($consulta);
    $instalaciones = $listar->fetch_all(MYSQLI_ASSOC);
    return $instalaciones;
  }
  public function instalacionesPendientes()
  {
    $consulta = "SELECT ai.*, u.nombre FROM `agendar_instalaciones` as ai , usuarios as u WHERE ai.usuario_registra = u.idUsuario AND (ai.estado != 'por_revisar' && ai.estado != 'realizado') ORDER BY `ai`.`fecha_realizado` ASC";
    $listar = $this->db->query($consulta);
    $instalaciones = $listar->fetch_all(MYSQLI_ASSOC);
    return $instalaciones;
  }
  public function listarInstalacionesRealizadas()
  {
    $consulta = "SELECT ai.*, u.nombre as 'realizadoPor' FROM `agendar_instalaciones` as ai , usuarios as u WHERE ai.usuario_realiza = u.idUsuario AND (ai.estado != 'por_revisar' && ai.estado != 'revisado') ORDER BY `ai`.`fecha_realizado` ASC";
    $listar = $this->db->query($consulta);
    $instalaciones = $listar->fetch_all(MYSQLI_ASSOC);
    return $instalaciones;
  }
  public function editarPrograInsta($id_insta, $tipo_sistema, $titulo, $dominioPos, $dominioFactura, $dominioRestobar, $cliente, $dni, $razonSocial, $name_comercial, $ruc, $tipo_negocio, $celular, $telefono, $correo, $direc_fiscal, $serie_compro, $especificacion, $observacion, $persona_contacto, $cel_contacto, $equipo_principal, $equipo_cocina, $equipo_bar, $total_impresoras, $usuario, $clave_sol, $logo_1, $logo_2, $cdt, $fecha, $clave_cdt, $usuario_sec, $clave_sec){
    $consulta = "UPDATE `agendar_instalaciones` SET `titulo`='$titulo',`tipo_sistema`='$tipo_sistema',`dominio_pos`='$dominioPos',`dominio_factura`='$dominioFactura',`dominio_rest_web`='$dominioRestobar',`cliente`='$cliente',`dni`='$dni',`razon_social`='$razonSocial',`nombre_comercial`='$name_comercial',`ruc`='$ruc',`tipo_negocio`='$tipo_negocio',`celular`='$celular',`telefono`='$telefono',`correo`='$correo',`direccion_fiscal`='$direc_fiscal',`serie_comprobante`='$serie_compro',`especificacion`='$especificacion',`observacion`='$observacion',`persona_contacto`='$persona_contacto
		',`celular_contacto`='$cel_contacto',`equip_caja_prin`='$equipo_principal',`equipo_cocina`='$equipo_cocina',`equipo_bar`='$equipo_bar',`total_impresoras`='$total_impresoras',`usuario_sol`='$usuario',`clave_sol`='$clave_sol',`fecha_instalacion`='$fecha', `estado` = 'revisado', `clave_cdt`='$clave_cdt',`usuario_sec`='$usuario_sec',`clave_sec`='$clave_sec'";
    if($logo_1 != ''){
      $consulta = "$consulta ,`logo_1`='$logo_1' ";
    }
    if($logo_2 != ''){
      $consulta = "$consulta ,`logo_2`='$logo_2'";;
    }
    if($cdt != ''){
      $consulta = "$consulta ,`cdt`='$cdt'";;
    }
    $consulta = "$consulta WHERE id='$id_insta'";
    $query = $this->db->query($consulta);
    return $query;
  }
  public function reenviarSolicInsta($id_insta, $tipo_sistema, $titulo, $dominioPos, $dominioFactura, $dominioRestobar, $cliente, $dni, $razonSocial, $name_comercial, $ruc, $tipo_negocio, $celular, $telefono, $correo, $direc_fiscal, $serie_compro, $especificacion, $observacion, $persona_contacto, $cel_contacto, $equipo_principal, $equipo_cocina, $equipo_bar, $total_impresoras, $usuario, $clave_sol, $logo_1, $logo_2){
    $consulta = "UPDATE `agendar_instalaciones` SET `titulo`='$titulo',`tipo_sistema`='$tipo_sistema',`dominio_pos`='$dominioPos',`dominio_factura`='$dominioFactura',`dominio_rest_web`='$dominioRestobar',`cliente`='$cliente',`dni`='$dni',`razon_social`='$razonSocial',`nombre_comercial`='$name_comercial',`ruc`='$ruc',`tipo_negocio`='$tipo_negocio',`celular`='$celular',`telefono`='$telefono',`correo`='$correo',`direccion_fiscal`='$direc_fiscal',`serie_comprobante`='$serie_compro',`especificacion`='$especificacion',`observacion`='$observacion',`persona_contacto`='$persona_contacto
		',`celular_contacto`='$cel_contacto',`equip_caja_prin`='$equipo_principal',`equipo_cocina`='$equipo_cocina',`equipo_bar`='$equipo_bar',`total_impresoras`='$total_impresoras',`usuario_sol`='$usuario',`clave_sol`='$clave_sol', `estado` = 'por_revisar'";
    if($logo_1 != ''){
      $consulta = "$consulta ,`logo_1`='$logo_1' ";
    }
    if($logo_2 != ''){
      $consulta = "$consulta ,`logo_2`='$logo_2'";;
    }
    if($cdt != ''){
      $consulta = "$consulta ,`cdt`='$cdt'";;
    }
    $consulta = "$consulta WHERE id='$id_insta'";
    $query = $this->db->query($consulta);
    return $query;
  }
  public function culminar($id_insta, $msj_final){
    $usuario_realiza = $usuario = $_SESSION['identity']->{'idUsuario'};
    $fecha_realizado = date('Y-m-d');
    $consulta = "UPDATE `agendar_instalaciones` SET `usuario_realiza`='$usuario_realiza', `fecha_realizado`='$fecha_realizado',  `msj_final`='$msj_final',`estado`='realizado' WHERE id='$id_insta'";
    $query = $this->db->query($consulta);
    return $query;
  }
  public function rechazarAltaSistemas($motivo, $id_insta){
    $consulta = "UPDATE `agendar_instalaciones` SET `motivoRechazo`='$motivo' ,`estado`='rechazado' WHERE id='$id_insta'";
    $query = $this->db->query($consulta);
    return $query;
  }
}