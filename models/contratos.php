<?php

require_once "../config/db.php";

class Contratos
{
	private $db;

	public function __construct()
	{
		$this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
	}

	/* ##### METODOS ###### */
	public function generarContrato($idCliente, $idServicios, $meses, $fechaRegistro, $fechaInicio, $idDepartamento, $idProvincia, $idDistrito, $tipoAfectacion, $precioServicio)
	{
		$idUsuario = $_SESSION['identity']->{'idUsuario'};
		$sql = "INSERT INTO `clientes_servicios`( `fechaRegistro`, `fechaInicioServicio`, `idServicio`, `idCliente`, `tiempoContrato`, `idUsuario`, `idDepartamento`, `idProvincia`, `idDistrito`, `idafectacionigv`) VALUES ('$fechaRegistro','$fechaInicio','$idServicios','$idCliente','$meses','$idUsuario','$idDepartamento','$idProvincia','$idDistrito','$tipoAfectacion')";
		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$obtenerContratoConsulta = "SELECT clientes_servicios.idClienteServicio, servicios.nombreServicio
			FROM clientes_servicios, servicios
			WHERE clientes_servicios.idServicio = servicios.idServicio AND clientes_servicios.idServicio ='$idServicios' AND idCliente='$idCliente' AND tiempoContrato='$meses' AND idUsuario='$idUsuario' AND fechaInicioServicio='$fechaInicio';";
			$contratoArray = ($this->db->query($obtenerContratoConsulta))->fetch_assoc();
			$idClienteServicio = $contratoArray['idClienteServicio'];
			$nombreServicio = $contratoArray['nombreServicio'];
			$fechaInicioArray = explode('-', $fechaInicio);
      $añoActual = $fechaInicioArray[0];
			$primerMes = $fechaInicioArray[1];
			$diasPago = $fechaInicioArray[2];
			$detallePago = "Servicio de: $nombreServicio";
			$contrato = new Contratos();
			$mesNuevo = $primerMes;
			for ($i = 1; $i <= $meses; $i++) {
				$mesNuevo = $primerMes;
				if ($mesNuevo >= 12) {
					$mesNuevo = 0;
				}
        if($mesNuevo == 1){
          if($i != 1){
            $añoActual += 1;
          }
        }
				if ($mesNuevo == '4' || $mesNuevo == '6' || $mesNuevo == '9' || $mesNuevo == '11') {
					if ($diasPago == '31') {
						$diasPago = 30;
					}
				} elseif ($mesNuevo == '2') {
					if ($diasPago == '31' || $diasPago == '30' || $diasPago == '29') {
						$diasPago = 28;
					}
				}else{
					$diasPago = $fechaInicioArray[2];
				}
				$fechaPago = "$añoActual-$primerMes-$diasPago";
				$contrato->generarPensiones($idClienteServicio, $idUsuario, $detallePago, $tipoAfectacion, $fechaPago, $fechaRegistro, $precioServicio);
        $primerMes = $mesNuevo + 1;

			}
			$result = true;
		}
		return $result;
	}
	public function listarTipoAfectacion()
	{
		$consulta = "SELECT * FROM `tipoafectacion_igv` WHERE estado='1'";
		$consultar = $this->db->query($consulta);
		$listaTipoAfectacion = $consultar->fetch_all(MYSQLI_ASSOC);
		return $listaTipoAfectacion;
	}

  public function generarPensiones($idClienteServicio, $idUsuario, $detallePago, $tipoAfectacion, $fechaPago, $fechaRegistro, $precioServicio)
	{
		$consulta = "INSERT INTO `detalle_pensiones`(`idClienteServicio`, `fechaEmisionRecibo` ,`fechaPago`, `fechaVencimiento`, `fechaRegistro`, `detallePago`, `idUsuario`, `idafectacionigv`, `precioServicio`) VALUES ('$idClienteServicio',DATE_SUB('$fechaPago', interval 2 day),'$fechaPago',DATE_ADD('$fechaPago', INTERVAL 3 DAY),'$fechaRegistro','$detallePago','$idUsuario','$tipoAfectacion', '$precioServicio');";
		$query = $this->db->query($consulta);
	}

  public function editarContrato($idContrato, $idServicio){
    $respuesta = false;
    $sql_precio_serv = "SELECT precio, nombreServicio FROM `servicios` WHERE idServicio = '$idServicio'";
    $precio_ejecutar = $this->db->query($sql_precio_serv);
    $precioArray = $precio_ejecutar->fetch_all(MYSQLI_ASSOC)[0];
    $precio = $precioArray['precio'];
    $detalle = $precioArray['nombreServicio'];

    $sql_editar_contrato = "UPDATE clientes_servicios SET `idServicio` = '$idServicio' WHERE `idClienteServicio` = '$idContrato'";
    $contrato_ejecutar = $this->db->query($sql_editar_contrato);

    $sql_editar_pensiones = "UPDATE detalle_pensiones SET `precioServicio` = '$precio', `detallePago` = 'Servicio de: $detalle' WHERE `idClienteServicio` = '$idContrato' AND estadoPago = 'pendiente' AND estadoPension = 'pendiente'";
    $pension_ejecutar = $this->db->query($sql_editar_pensiones);

    if($contrato_ejecutar == '1' && $pension_ejecutar == '1' ){
      $respuesta = true;
    }
    return $respuesta;
  }

  public function editarContrato_fecha($idContrato, $fechaInicioNew, $nombreServicio, $meses, $idservicio, $precioServicio){
    $respuesta = false;
    $idUsuario = $_SESSION['identity']->{'idUsuario'};
    $fechaRegistro = date('Y-m-d');
    /** Verificar si existen pensiones pagadas */
    $cant_pensiones = "SELECT COUNT(idDetallePensiones) as 'cant' FROM `detalle_pensiones` WHERE idClienteServicio = '$idContrato' AND (estadoPago = 'pagado' OR estadoPago = 'anulado')";
    $consultar = $this->db->query($cant_pensiones);
    $canArray = $consultar->fetch_all(MYSQLI_ASSOC)[0];
    $cant = $canArray['cant'];
    if($cant == 0){
      /** Buscamos el contrato que vamos a modificar para obtener su $tipoAfectacion */
      $sql_contrato = "SELECT * FROM `clientes_servicios` WHERE idClienteServicio = '$idContrato'";
      $consultar_contrato = $this->db->query($sql_contrato);
      $contratoArray = $consultar_contrato->fetch_all(MYSQLI_ASSOC)[0];
      $tipoAfectacion = $contratoArray['idafectacionigv'];

      /** Eliminamos los registros de las pensiones (esto debido a que no hay NINGUNA pension pagada previamente verificado */
      $sql_eliminar_pensiones = "DELETE FROM `detalle_pensiones` WHERE idClienteServicio = '$idContrato'";
      $eliminar = $this->db->query($sql_eliminar_pensiones);
      $fechaInicioArray = explode("-", $fechaInicioNew);
      $añoActual = $fechaInicioArray[0];
      $primerMes = $fechaInicioArray[1];
      $diasPago = $fechaInicioArray[2];
      $detallePago = "Servicio de: $nombreServicio";

      /** Proceso para generar las pensiones nuevamente con la fecha nueva */
      $contrato = new Contratos();
      $mesNuevo = $primerMes;
      for ($i = 1; $i <= $meses; $i++) {
        $mesNuevo = $primerMes;
        if ($mesNuevo >= 12) {
          $mesNuevo = 0;
        }
        if($mesNuevo == 1){
          if($i != 1){
            $añoActual += 1;
          }
        }
        if ($mesNuevo == '4' || $mesNuevo == '6' || $mesNuevo == '9' || $mesNuevo == '11') {
          if ($diasPago == '31') {
            $diasPago = 30;
          }
        } elseif ($mesNuevo == '2') {
          if ($diasPago == '31' || $diasPago == '30' || $diasPago == '29') {
            $diasPago = 28;
          }
        }else{
          $diasPago = $fechaInicioArray[2];
        }
        $fechaPago = "$añoActual-$primerMes-$diasPago";
        $contrato->generarPensiones($idContrato, $idUsuario, $detallePago, $tipoAfectacion, $fechaPago, $fechaRegistro, $precioServicio);
        $primerMes = $mesNuevo + 1;
      }

      /** Editar el contrato */
      $sql_editar_contrato = "UPDATE `clientes_servicios` SET `fechaInicioServicio`='$fechaInicioNew',`idServicio`='$idservicio',`tiempoContrato`='$meses' WHERE `idClienteServicio` = '$idContrato'";
      $editar_contrato = $this->db->query($sql_editar_contrato);
      $respuesta = true;
    }
    return $respuesta;
  }
	// ####### FIN DE METODOS #############


	public function listarCategoriasGlobal()
	{
		$consulta = "SELECT * FROM `serv_categorias`";
		$consultar = $this->db->query($consulta);
		$categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
		return $categoriasServicios;
	}
}
