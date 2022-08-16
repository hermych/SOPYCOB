<?php

require_once "../config/db.php";

class Sistemas
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']);
  }

  /* ##### METODOS ###### */
  public function guardarSistemaG($nombre, $precio)
  {
    $sql_save = "INSERT INTO `sistemas`(`nombre`, `precio`) VALUES ('$nombre','$precio')";
    $guardar = $this->db->query($sql_save);
    return $guardar;
  }
  public function listarSistemasGlobal()
  {
    $sql_listar = "SELECT * FROM `sistemas`";
    $listar = $this->db->query($sql_listar);
    $pautas = $listar->fetch_all(MYSQLI_ASSOC);
    return $pautas;
  }
  public function editarSistemaG($id, $nombre, $precio)
  {
    $sql_editar = "UPDATE `sistemas` SET `nombre`='$nombre',`precio`='$precio' WHERE `id`='$id'";
    $editar = $this->db->query($sql_editar);
    return $editar;
  }
  public function inhabilitarSistemaG($id)
  {
    $sql_inhabilitar = "UPDATE `sistemas` SET `estado`= 'inactivo' WHERE `id`='$id'";
    $inhabilitar = $this->db->query($sql_inhabilitar);
    return $inhabilitar;
  }
  public function habilitarSistemaG($id)
  {
    $sql_inhabilitar = "UPDATE `sistemas` SET `estado`= 'activo' WHERE `id`='$id'";
    $inhabilitar = $this->db->query($sql_inhabilitar);
    return $inhabilitar;
  }
  public function listarPautasAct()
  {
    $sql_listar = "SELECT * FROM `pautas` WHERE estado='activo'";
    $listar = $this->db->query($sql_listar);
    $pautas = $listar->fetch_all(MYSQLI_ASSOC);
    return $pautas;
  }
}