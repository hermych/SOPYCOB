<?php

require_once "../config/db.php";

class Tirajes
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']);
  }

  /* ##### METODOS ###### */
  public function guardaTiraje($sucursal, $comprobante, $serie, $desde, $hasta, $fecha, $disponibles)
  {
    $sql = "INSERT INTO `tirajes`(`fechaResolucion`, `serie`, `desde`, `hasta`, `idComprobante`, `disponible`, `idSucursal`) VALUES ('$fecha','$serie','$desde','$hasta','$comprobante','$disponibles','$sucursal')";
    $save = $this->db->query($sql);
    $result = false;
    if ($save) {
      $result = true;
    }
    return $result;
  }

  public function listarTirajes()
  {
    $consulta = "SELECT tirajes.*, sucursales.nombre, tirajes.utilizados, comprobantes.nombreComprobante FROM `tirajes`, sucursales, comprobantes WHERE tirajes.idSucursal = sucursales.idSucursal AND tirajes.idComprobante = comprobantes.idComprobante AND tirajes.estado='activo' ORDER BY sucursales.nombre";
    $consultar = $this->db->query($consulta);
    $categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
    return $categoriasServicios;
  }

  public function listarTirajesGlobal()
  {
    $consulta = "SELECT tirajes.*, sucursales.nombre, tirajes.utilizados, comprobantes.nombreComprobante FROM `tirajes`, sucursales, comprobantes WHERE tirajes.idSucursal = sucursales.idSucursal AND tirajes.idComprobante = comprobantes.idComprobante ORDER BY sucursales.nombre";
    $consultar = $this->db->query($consulta);
    $categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
    return $categoriasServicios;
  }

  public function editarTiraje($idTirajeEdit, $sucursalEdit, $comprobanteEdit, $serieEdit, $hastaEdit, $desdeEdit, $utilEdit)
  {
    $disponibles = $hastaEdit - $utilEdit;
    $consulta = "UPDATE `tirajes` SET `serie`='$serieEdit',`desde`='$desdeEdit',`hasta`='$hastaEdit', `disponible` = '$disponibles',`idComprobante`='$comprobanteEdit',`idSucursal`='$sucursalEdit', `utilizados`='$utilEdit' WHERE idTiraje = '$idTirajeEdit';";
    $query = $this->db->query($consulta);
    return $query;
  }

  public function inhabilitarTiraje($idTirajeInhabilitar)
  {
    $consulta = "DELETE FROM tirajes WHERE idTiraje = $idTirajeInhabilitar";
    $query = $this->db->query($consulta);
    return $query;
  }

  public function listarSucursales()
  {
    $consulta = "SELECT * FROM `sucursales` WHERE estado = 'activo'";
    $consultar = $this->db->query($consulta);
    $categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
    return $categoriasServicios;
  }

  public function listarComprobantes()
  {
    $consulta = "SELECT * FROM `comprobantes` WHERE estadoComprobante = 'activo'";
    $consultar = $this->db->query($consulta);
    $categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
    return $categoriasServicios;
  }
}