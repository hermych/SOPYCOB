<?php

require_once "../config/db.php";

class Pautas
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']);
  }

  /* ##### METODOS ###### */
  public function guardarPautaG($nombre, $f_inicio, $f_fin, $link)
  {
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    $sql_save = "INSERT INTO `pautas`(`nombre`, `link`, `f_inicio`, `f_fin`, `id_registra`) VALUES ('$nombre','$link','$f_inicio','$f_fin','$idUsuario')";
    $guardar = $this->db->query($sql_save);
    return $guardar;
  }
  public function listarPautasGlobal()
  {
    $sql_listar = "SELECT * FROM `pautas`";
    $listar = $this->db->query($sql_listar);
    $pautas = $listar->fetch_all(MYSQLI_ASSOC);
    return $pautas;
  }
  public function editarPautaG($id, $nombre, $f_inicio, $f_fin, $link)
  {
    $sql_editar = "UPDATE `pautas` SET `nombre`='$nombre',`link`='$link',`f_inicio`='$f_inicio',`f_fin`='$f_fin' WHERE `id`='$id'";
    $editar = $this->db->query($sql_editar);
    return $editar;
  }
  public function inhabilitarPautaG($id)
  {
    $sql_inhabilitar = "UPDATE `pautas` SET `estado`= 'inactivo' WHERE `id`='$id'";
    $inhabilitar = $this->db->query($sql_inhabilitar);
    return $inhabilitar;
  }
  public function habilitarPautaG($id)
  {
    $sql_inhabilitar = "UPDATE `pautas` SET `estado`= 'activo' WHERE `id`='$id'";
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