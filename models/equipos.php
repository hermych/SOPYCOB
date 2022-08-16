<?php

require_once "../config/db.php";

class Equipos
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']);
  }

  /* ##### METODOS ###### */
  public function guardarEquipoG($nombre, $precio)
  {
    $sql_save = "INSERT INTO `equipos`(`nombre`, `precio`, `estado`) VALUES ('$nombre','$precio', 'activo')";
    $guardar = $this->db->query($sql_save);
    return $guardar;
  }
  public function listarEquiposGlobal()
  {
    $sql_listar = "SELECT * FROM `equipos`";
    $listar = $this->db->query($sql_listar);
    $pautas = $listar->fetch_all(MYSQLI_ASSOC);
    return $pautas;
  }
  public function editarEquipoG($id, $nombre, $precio)
  {
    $sql_editar = "UPDATE `sistemas` SET `nombre`='$nombre',`precio`='$precio' WHERE `id`='$id'";
    $editar = $this->db->query($sql_editar);
    return $editar;
  }
  public function inhabilitarEquipoG($id)
  {
    $sql_inhabilitar = "UPDATE `sistemas` SET `estado`= 'inactivo' WHERE `id`='$id'";
    $inhabilitar = $this->db->query($sql_inhabilitar);
    return $inhabilitar;
  }
  public function habilitarEquipoG($id)
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