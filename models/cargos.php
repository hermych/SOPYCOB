<?php

require_once "../config/db.php";

class Cargos
{
	private $db;

	public function __construct()
	{
		$this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
	}

	/* ##### METODOS ###### */
	public function guardarCargo($nombreCargo, $codigoCargo, $sueldoCargo){
		$sql = "INSERT INTO `roles`(`nombre`, `codRol`, `sueldo`) VALUES ('$nombreCargo','$codigoCargo','$sueldoCargo')";
		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function listarCargos(){
		$consulta = "SELECT * FROM `roles` WHERE	estado ='activo'";
		$consultar = $this->db->query($consulta);
		$categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
		return $categoriasServicios;
	}

    public function listarCargosGlobal(){
        $consulta = "SELECT * FROM `roles`";
        $consultar = $this->db->query($consulta);
        $categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
        return $categoriasServicios;
    }

	public function editarCargo($idCargo, $editNombreCargo, $editCodigoCargo, $editSueldoCargo){
		$consulta = "UPDATE `roles` SET `nombre`='$editNombreCargo',`codRol`='$editCodigoCargo',`sueldo`='$editSueldoCargo' WHERE idRol = $idCargo";
		$query = $this->db->query($consulta);
		return $query;
	}

	public function inhabilitarCargo($idCargo){
		$consulta = "UPDATE `roles` SET `estado`='inhabilitado' WHERE idRol = $idCargo";
		$query = $this->db->query($consulta);
		return $query;
	}

    public function habilitarCargo($idCargo){
        $consulta = "UPDATE `roles` SET `estado`='activo' WHERE idRol = $idCargo";
        $query = $this->db->query($consulta);
        return $query;
    }


}


// $usuario = new Cargos();
// $usuarios = $usuario->listarCargos();
// echo json_encode($usuarios);

// var_dump($usuario);