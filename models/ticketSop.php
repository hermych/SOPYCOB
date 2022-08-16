<?php

require_once "../config/db.php";

class TicketSoporte
{
	private $db;

	public function __construct()
	{
		$this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
	}

	/* ##### METODOS ###### */
	public function registrarTicket($idCliente,$mensaje, $proceso, $comentario, $nombreSolicita, $celSolicitante, $motivoNoCompete, $responsable)
	{
		$idUsuarioRegistra = $_SESSION['identity']->{'idUsuario'};
		$fechaRegistro = date('Y-m-d');
		if($proceso==4){
			$idEstado = 4;
		}else{
			$idEstado = 1;
		}
		$horaRegistro = date('H:i:s');
		$imagenUrl = '';
		$obtenerNumeroConsulta = "SELECT numero FROM `tickets_soporte` ORDER BY `tickets_soporte`.`numero` DESC LIMIT 1;" ;
		$obtenerNumero = $this->db->query($obtenerNumeroConsulta);
		$numeroArray = $obtenerNumero->fetch_assoc();
		if(!(isset($numeroArray['numero']))){
			$numero = 1;
		}else{
			$numero = $numeroArray["numero"]+1;
		}
		$sql = "INSERT INTO `tickets_soporte`(`idUsuarioRegistra`, `idResponsable`,`idProceso`, `numero`, `idCliente`, `descripcion`, `fechaRegistro`, `idEstado`, `horaRegistro`, `imagenUrl`, `comentario`, `nombreSolicita`, `numSolicita`, `motivoNoCompete`) VALUES ('$idUsuarioRegistra','$responsable','$proceso','$numero','$idCliente','$mensaje','$fechaRegistro','$idEstado','$horaRegistro','$imagenUrl', '$comentario','$nombreSolicita', '$celSolicitante', '$motivoNoCompete');";
		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}
	public function listarTicketsPendientes()
	{
    $fecha = date('Y-m');
		$consulta = "SELECT tickets_soporte.idTicket, tickets_soporte.numero, (SELECT numero as 'lastNum' FROM tickets_soporte as tk WHERE tk.idEstado = 2 ORDER BY tk.idTicket DESC LIMIT 1) as 'lastNum', tickets_soporte.idResponsable, tickets_soporte.descripcion, clientes.nroDocumento, clientes.nombreCliente, clientes.nombreComercial, clientes.nombreContacto, clientes.nroContacto, procesos.nombreProceso, CONCAT(tickets_soporte.fechaRegistro,' ', tickets_soporte.horaRegistro) As fechaHora, tickets_soporte.nombreSolicita, tickets_soporte.numSolicita, estados.nombreEstado, tickets_soporte.comentario, tickets_soporte.motivoNoCompete, tickets_soporte.msjFinalizado, CONCAT(usuarios.nombre, ' ', usuarios.apellido) As responsable FROM `tickets_soporte`, clientes, procesos, estados, usuarios WHERE tickets_soporte.idCliente = clientes.idCliente AND tickets_soporte.idProceso = procesos.idProceso AND tickets_soporte.idEstado = estados.idEstado AND tickets_soporte.idResponsable = usuarios.idUsuario AND tickets_soporte.fechaRegistro LIKE '%$fecha%' ORDER BY tickets_soporte.idTicket DESC ";
		$consultar = $this->db->query($consulta);
		$solicitudes = $consultar->fetch_all(MYSQLI_ASSOC);
		return $solicitudes;
	}
	public function iniciarTicket($idTicket){
		$fechaInicio = date('Y-m-d');
		$horaInicio = date('H:i:s');
		$sql = "UPDATE tickets_soporte SET idEstado = 2, fechaInicio='$fechaInicio', horaInicio='$horaInicio' WHERE idTicket = $idTicket;";
		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = $idTicket;
		}
		return $result;
	}
	public function finalizarTicket($idTicket, $msjFinalizado){
		$fechaCulminacion = date('Y-m-d');
		$horaCulminacion = date('H:i:s');
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
		$sql = "UPDATE tickets_soporte SET idEstado = 3, fechaCulminacion='$fechaCulminacion', horaCulminacion='$horaCulminacion', msjFinalizado='$msjFinalizado', idUsuarioRealiza = '$idUsuario' WHERE idTicket = $idTicket;";
		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = $idTicket;
		}
		return $result;
	}

}
