<?php

require_once "../config/db.php";

class Proveedores
{
	private $db;

	public function __construct()
	{
		$this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
	}

	/* ##### METODOS ###### */
	public function guardarProveedor($nroDocProveedor, $nombreProv, $celProv, $telfProveedor, $emailProveedor, $direcProveedor, $nombreContactoProv, $telfContactoProv, $emailContactoProv, $codProveedor, $tipoDocProveedor)
	{
		$sql = "INSERT INTO `serv_proveedores`(`codProveedor`, `nombreProveedor`, `celProv`, `telfProveedor`, `emailProveedor`, `direccionProveedor`, `idTipoDocumento`, `nroDocumento`, `nombreContacto`, `telfContacto`, `emailContacto`) VALUES ('$codProveedor','$nombreProv','$celProv','$telfProveedor','$emailProveedor','$direcProveedor','$tipoDocProveedor','$nroDocProveedor','$nombreContactoProv','$telfContactoProv','$emailContactoProv')";
		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}
	public function listarProveedores()
	{
		$consulta = "SELECT * FROM `serv_proveedores` WHERE estado='activo'";
		$consultar = $this->db->query($consulta);
		$categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
		return $categoriasServicios;
	}
	public function listarProveedoresGlobal()
	{
		$consulta = "SELECT * FROM `serv_proveedores`";
		$consultar = $this->db->query($consulta);
		$categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
		return $categoriasServicios;
	}
	public function editarProveedor($idProveedorEdit, $nombreProv, $telfProveedor, $emailProveedor, $celProv, $nroDocProveedor, $codProveedor, $direcProveedor, $nombreContactoProv, $telfContactoProv, $emailContactoProv){
		$consulta = "UPDATE `serv_proveedores` SET `codProveedor`='$codProveedor',`nombreProveedor`='$nombreProv',`celProv`='$celProv',`telfProveedor`='$telfProveedor',`emailProveedor`='$emailProveedor',`direccionProveedor`='$direcProveedor',`nroDocumento`='$nroDocProveedor',`nombreContacto`='$nombreContactoProv',`telfContacto`='$telfContactoProv',`emailContacto`='$emailContactoProv' WHERE idServProveedores = $idProveedorEdit";
		$query = $this->db->query($consulta);
		return $query;
	}
	public function inhabilitarProveedor($idProveedor){
		$consulta = "UPDATE `serv_proveedores` SET `estado`='inhabilitado' WHERE idServProveedores = $idProveedor";
		$query = $this->db->query($consulta);
		return $query;
	}
	public function habilitarProveedor($idProveedor){
		$consulta = "UPDATE `serv_proveedores` SET `estado`='activo' WHERE idServProveedores = $idProveedor";
		$query = $this->db->query($consulta);
		return $query;
	}
}