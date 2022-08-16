<?php

require_once "../config/db.php";

class ConsultasMC
{
	private $db;

	public function __construct()
	{
		$this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
	}

	/* ##### METODOS ###### */
	public function guardarSolicInfo($nombres, $rubro, $celular, $canal, $face, $tipoInformacion, $pauta)
	{
    $fecha = date('Y-m-d');
		$hora = date("H:i:s");
		$idUsuario = $_SESSION['identity']->{'idUsuario'};
		$sql = "INSERT INTO `solicitudesinformacion`(`cliente`, `celular`, `rubro`, `canal`, `fechaRegistro`, `horaRegistro`, idUsuarioRegistra, `facebook`, `tipoInformacion`, `pauta`) VALUES ('$nombres','$celular','$rubro','$canal','$fecha', '$hora', '$idUsuario', '$face', '$tipoInformacion', '$pauta');";
		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}
	public function listarSolicInfo()
	{
		$consulta = "SELECT * FROM `solicitudesinformacion` WHERE estadoSolic = 'llamadaPendiente'";
		$consultar = $this->db->query($consulta);
		$solicitudes = $consultar->fetch_all(MYSQLI_ASSOC);
		return $solicitudes;
	}
	public function editarSolicInfoLlamar($idSolic, $rubro, $tipo_info, $medio, $msj_pauta, $observacionEnvio, $correo, $tipoDemo, $fechaDemo, $pauta)
	{
		$idUsuario = $_SESSION['identity']->{'idUsuario'};
		$hoy = date('Y-m-d');
		$hora = date("H:i:s");
		if ($fechaDemo == '') {
			$consulta = "UPDATE `solicitudesinformacion` SET `mensaje_pauta`='$msj_pauta',`pauta`='$pauta',`rubro`='$rubro',`medioEnvioInfo`='$medio', `correoEnvio`='$correo', `fechaLlamada`='$hoy',  `tipoInformacion`='$tipo_info', `horaLlamada`='$hora', `observacionEnvioInfo`='$observacionEnvio', `estadoSolic` = 'llamadaRealizada', `idUsuarioLlama` = '$idUsuario' WHERE idSolicitud  = $idSolic";
		} else {
			$timeArray = explode('T', $fechaDemo);
			$fechaDemo = $timeArray[0];
			$horaDemo = $timeArray[1];
			$consulta = "UPDATE `solicitudesinformacion` SET `mensaje_pauta`='$msj_pauta',`pauta`='$pauta',`rubro`='$rubro',`medioEnvioInfo`='$medio', `correoEnvio`='$correo',`fechaDemo`='$fechaDemo', `tipoInformacion`='$tipo_info', `horaDemo`='$horaDemo',`fechaAgendaDemo`='$hoy',`horaAgendaDemo`='$hora', `tipoDemo`='$tipoDemo', `fechaLlamada`='$hoy', `horaLlamada`='$hora', `observacionEnvioInfo`='$observacionEnvio', `estadoSolic` = 'demoPendiente', `idUsuarioLlama` = '$idUsuario', `idUsuarioAgendaDemo` = '$idUsuario' WHERE idSolicitud  = $idSolic";
		}
		$query = $this->db->query($consulta);
		return $query;
	}
	public function rechazarSolic($idSolic, $observacion)
	{
		$idUsuario = $_SESSION['identity']->{'idUsuario'};
		$hora = date("H:i:s");
		$fecha = date("Y:m:d");
		$consulta = "UPDATE `solicitudesinformacion` SET `fechaLlamada`='$fecha', `horaLlamada`='$hora', `observacionEnvioInfo`='$observacion', `estadoSolic` = 'solicRechazada', `idUsuarioLlama`='$idUsuario' WHERE idSolicitud  = $idSolic";
		$query = $this->db->query($consulta);
		return $query;
	}
}
