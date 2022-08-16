<?php

require_once "../config/db.php";

class Empresa
{
	private $db;

	public function __construct()
	{
		$this->db = Database::connect($_SESSION['dbname']);
	}

	/* ##### METODOS ###### */
	public function datosEmpresa()
	{
		$sql_datosEmpresa = "SELECT * FROM `datos_empresa`;";
		$consultar = $this->db->query($sql_datosEmpresa);
		$datosEmpresa = $consultar->fetch_all(MYSQLI_ASSOC);
		return $datosEmpresa[0];
	}

	public function editarDatos($idEmpresa, $email, $razSocial,$nombreComercial,$propietario,$numeroRuc,$direccionEmpresa,$telefono,$celular, $rutaLogo){
		$respuesta = false;
		if($rutaLogo != ''){
			$sql_editarDatos = "UPDATE `datos_empresa` SET `razonSocial`='$razSocial', `email`='$email', `nombreComercial`='$nombreComercial',`propietario`='$propietario',`numeroRuc`='$numeroRuc',
			`direccionEmpresa`='$direccionEmpresa',`telefono`='$telefono', `celular`='$celular', `logoEmpresa` = '$rutaLogo' WHERE idDatosEmpresa = $idEmpresa";
		}else{
			$sql_editarDatos = "UPDATE `datos_empresa` SET `razonSocial`='$razSocial', `email`='$email', `nombreComercial`='$nombreComercial',`propietario`='$propietario',`numeroRuc`='$numeroRuc',
			`direccionEmpresa`='$direccionEmpresa',`telefono`='$telefono', `celular`='$celular' WHERE idDatosEmpresa = $idEmpresa";
		}
		$consultar = $this->db->query($sql_editarDatos);
		if($consultar == "1"){
			$respuesta = true;
		}
		return $respuesta;
	}
}
