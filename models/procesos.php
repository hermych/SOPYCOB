<?php

require_once "../config/db.php";

class Procesos
{
	private $db;

	public function __construct()
	{
		$this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
	}

	/* ##### METODOS ###### */
	public function guardarProceso($nombre)
	{
		$result = false;
		$sql = "INSERT INTO `procesos`(`nombreProceso`) VALUES ('$nombre')";
		$save = $this->db->query($sql);
		if ($save) {
			$result = true;
		}
		return $result;
	}
	public function listarProcesos()
	{
		$usuarios = [];
		$consulta = "SELECT * FROM `procesos` WHERE estado='activo'";
		$consultar = $this->db->query($consulta);
		$usuarios = $consultar->fetch_all(MYSQLI_ASSOC);
		return $usuarios;
	}
	public function listarProcesosGlobal()
	{
		$usuarios = [];
		$consulta = "SELECT * FROM `procesos`";
		$consultar = $this->db->query($consulta);
		$usuarios = $consultar->fetch_all(MYSQLI_ASSOC);
		return $usuarios;
	}
	public function editarProceso($idProceso, $nombreProceso)
	{
		$result = false;
		$consulta = "UPDATE `procesos` SET `nombreProceso`='$nombreProceso' WHERE idProceso = '$idProceso'";
		$consultar = $query = $this->db->query($consulta);
		if ($consultar) {
			$result = true;
		};
		return $result;
	}
	public function inhabilitarProceso($idProceso)
	{
		$consulta = "UPDATE `procesos` SET `estado`='inhabilitado' WHERE idProceso = $idProceso";
		$query = $this->db->query($consulta);
		return $query;
	}
	public function HabilitarProceso($idProceso)
	{
		$consulta = "UPDATE `procesos` SET `estado`='activo' WHERE idProceso = $idProceso";
		$query = $this->db->query($consulta);
		return $query;
	}
	public function listarRoles()
	{
		$roles = [];
		$consulta = "SELECT * FROM `roles` WHERE estado='activo'";
		$consultar = $this->db->query($consulta);
		$roles = $consultar->fetch_all(MYSQLI_ASSOC);
		return $roles;
	}
}


// $usuario = new Usuario();
// $usuarios = $usuario->listarUsuarios();
// echo json_encode($usuarios);

// echo 'demo';