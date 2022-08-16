<?php

require_once "../config/db.php";

class ControlSolic
{
	private $db;

	public function __construct()
	{
		$this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
	}

	/* ##### METODOS ###### */
	public function agendarDemostracion($fechaDemo, $horaDemo, $tipoDemo, $observacionAgendarDemo, $idSolic)
	{
		$idUsuario = $_SESSION['identity']->{'idUsuario'};
    $fecha = date("Y-m-d");
    $hora = date("H:m:s");
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
		$sql = "UPDATE `solicitudesinformacion` SET `fechaDemo`='$fechaDemo', `horaDemo`='$horaDemo', `fechaAgendaDemo`='$fecha', `horaAgendaDemo`='$hora', `tipoDemo`='$tipoDemo', `observacionAgendarDemo`='$observacionAgendarDemo', `idUsuarioAgendaDemo`='$idUsuario', `estadoSolic` = 'demoPendiente', `idUsuarioAgendaDemo` = '$idUsuario' WHERE idSolicitud  = $idSolic";
		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}
	public function listarSolicLlamadasRealizadas()
	{
		$consulta = "SELECT * FROM `solicitudesinformacion` WHERE estadoSolic = 'llamadaRealizada'";
		$consultar = $this->db->query($consulta);
		$solicitudes = $consultar->fetch_all(MYSQLI_ASSOC);
		return $solicitudes;
	}
	public function listarSolicDemoPendientes()
	{
		$idUsuario = $_SESSION['identity']->{'idUsuario'};
		$consulta = "SELECT *, CONCAT(fechaDemo, ' ', horaDemo) As 'fechaHoraDemo' FROM `solicitudesinformacion` WHERE `idUsuarioAgendaDemo`='$idUsuario' AND estadoSolic = 'demoPendiente' AND fechaDemo >= '2017-04-16' ORDER by horaDemo ASC;";
		$consultar = $this->db->query($consulta);
		$solicitudes = $consultar->fetch_all(MYSQLI_ASSOC);
		
		return $solicitudes;
	}
	public function listarSolicVentasPendientes()
	{
		$idUsuario = $_SESSION['identity']->{'idUsuario'};
		$consulta = "SELECT * FROM `solicitudesinformacion` WHERE `idUsuarioAgendaDemo`='$idUsuario' AND estadoSolic = 'cierreVentaPendiente' AND fechaDemo >= '2017-04-16' ORDER by horaDemo ASC;";
		$consultar = $this->db->query($consulta);
		$solicitudes = $consultar->fetch_all(MYSQLI_ASSOC);
		
		return $solicitudes;
	}
	public function listarComprobantesGlobal()
	{
		$consulta = "SELECT * FROM `comprobantes`";
		$consultar = $this->db->query($consulta);
		$categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
		return $categoriasServicios;
	}
	public function rechazarAgendarDemo($idSolic, $observacion){
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
		$consulta = "UPDATE `solicitudesinformacion` SET `estadoSolic` = 'agendaDemoRechazada', `idUsuarioAgendaDemo`='$idUsuario', `observacionAgendarDemo` = '$observacion' WHERE idSolicitud  = $idSolic";
		$query = $this->db->query($consulta);
		return $query;
	}
	public function confirmarDemoRealizada($idSolic){
		$consulta = "UPDATE `solicitudesinformacion` SET `estadoDemo`='demoRealizada', `estadoSolic` = 'cierreVentaPendiente' WHERE idSolicitud  = $idSolic";
		$query = $this->db->query($consulta);
		return $query;
	}
	public function cancelarDemo($idSolic, $motivo){
		$consulta = "UPDATE `solicitudesinformacion` SET `estadoDemo`='demoRealizarCancelada', `motivoDemo`='$motivo', `estadoSolic` = 'demoRealizarCancelada' WHERE idSolicitud  = $idSolic";
		$query = $this->db->query($consulta);
		return $query;
	}
	public function cerrarVenta($arreglo){
		$idUsuario = $_SESSION['identity']->{'idUsuario'};
		$idSolic = $arreglo['idSolic'];
		foreach ($_POST as $key => $value) {
			if($key=='idSolic'){
				continue;
			}else{
				$sql = "INSERT INTO `cierreventadetalle`(`idSolicitud`, `producto`, `idUsuarioCierreVenta`) VALUES ('$idSolic','$value','$idUsuario');";
				$query = $this->db->query($sql);
			}
		}
		$consulta = "UPDATE `solicitudesinformacion` SET `estadoSolic` = 'ventaRealizada' WHERE idSolicitud  = $idSolic";
		$query = $this->db->query($consulta);
		return $query;
	}
	public function reprogramarDemo($fechaDemo, $horaDemo, $idSolic, $motivo){
		// $motivo = "$motivo -> de $fechaPasada $horaPasada hacia $fechaDemo $horaDemo";
		$consulta = "UPDATE `solicitudesinformacion` SET `fechaDemo` = '$fechaDemo', `horaDemo`='$horaDemo', `motivoReprogramar` = '$motivo' WHERE idSolicitud  = $idSolic";
		$query = $this->db->query($consulta);
		return $query;
	}
}
