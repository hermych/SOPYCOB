<?php

require_once "../config/db.php";

class Estados
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
  }

  /* ##### METODOS ###### */
  public function guardarEstado($nombre)
  {
    $result = false;
    $sql = "INSERT INTO `estados`(`nombreEstado`, `estado`) VALUES ('$nombre', 'activo')";
    $save = $this->db->query($sql);
    if ($save) {
      $result = true;
    }
    return $result;
  }
  public function listarEstados()
  {
    $usuarios = [];
    $consulta = "SELECT * FROM `estados` WHERE estado='activo'";
    $consultar = $this->db->query($consulta);
    $usuarios = $consultar->fetch_all(MYSQLI_ASSOC);
    return $usuarios;
  }
  public function listarEstadosGlobal()
  {
    $usuarios = [];
    $consulta = "SELECT * FROM `estados`";
    $consultar = $this->db->query($consulta);
    $usuarios = $consultar->fetch_all(MYSQLI_ASSOC);
    return $usuarios;
  }
  public function editarEstado($idEstado, $nombreEstado)
  {
    $result = false;
    $consulta = "UPDATE `estados` SET `nombreEstado`='$nombreEstado' WHERE idEstado = '$idEstado'";
    $consultar = $query = $this->db->query($consulta);
    if ($consultar) {
      $result = true;
    };
    return $result;
  }
  public function inhabilitarEstado($idEstado)
  {
    $consulta = "UPDATE `estados` SET `estado`='inhabilitado' WHERE idEstado = $idEstado";
    $query = $this->db->query($consulta);
    return $query;
  }
  public function HabilitarEstado($idEstado)
  {
    $consulta = "UPDATE `estados` SET `estado`='activo' WHERE idEstado = $idEstado";
    $query = $this->db->query($consulta);
    return $query;
  }
}


// $usuario = new Usuario();
// $usuarios = $usuario->listarUsuarios();
// echo json_encode($usuarios);

// echo 'demo';