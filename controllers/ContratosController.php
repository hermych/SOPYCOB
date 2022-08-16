<?php
session_start();
require_once "../models/contratos.php";

class ContratosController
{
	public function index()
	{
		require_once "../views/pagos/contratos.php";
	}

	public function generarContrato()
	{
		$respuesta = [];
		if (isset($_POST)) {
			$idCliente = isset($_POST['idCliente']) ? $_POST['idCliente'] : false;
      $precioServicio = isset($_POST['precioServicio']) ? $_POST['precioServicio'] : false;
			$idServicios = isset($_POST['idServicios']) ? $_POST['idServicios'] : false;
			$meses = isset($_POST['meses']) ? $_POST['meses'] : false;
			$fechaRegistro = date('Y-m-d h:i:s');
			$fechaInicio = isset($_POST['fechaInicio']) ? $_POST['fechaInicio'] : false;
			$tipoAfectacion = isset($_POST['tipoAfectacion']) ? $_POST['tipoAfectacion'] : false;
			$idDepartamento = isset($_POST['idDepartamentoContrato']) ? $_POST['idDepartamentoContrato'] : false;
			$idProvincia = isset($_POST['idProvinciaContrato']) ? $_POST['idProvinciaContrato'] : false;
			$idDistrito = isset($_POST['idDistritoContrato']) ? $_POST['idDistritoContrato'] : false;
			if ($idCliente && $idServicios && $meses && $fechaRegistro && $fechaInicio && $idDepartamento && $idProvincia && $idDistrito && $tipoAfectacion) {
				$contratoObj = new Contratos();
				$save = $contratoObj->generarContrato($idCliente, $idServicios, $meses, $fechaRegistro, $fechaInicio, $idDepartamento, $idProvincia, $idDistrito, $tipoAfectacion, $precioServicio);
				if ($save) {
					$respuesta = [
						'estado' => 'ok',
						'mensaje' => 'Contrato realizado correctamente'
					];
				} else {
					$respuesta = [
						'estado' => 'failed',
						'mensaje' => 'Error al registrar usuario, intentelo mas tarde'
					];
				}
			}
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'No entro al if'
			];
		}
		return json_encode($respuesta);
	}

	public function listarTipoAfectacion()
	{
		$tipoAfectacion = new Contratos();
		$listaTipoAfectacion = $tipoAfectacion->listarTipoAfectacion();
		return json_encode($listaTipoAfectacion);
	}

  public function editarContrato(){
    $respuesta = [];
    if(isset($_POST)){
      $idContrato = isset($_POST['idContrato']) ? $_POST['idContrato'] : false;
      $idServicio = isset($_POST['idservicio']) ? $_POST['idservicio'] : false;
      $fechaInicioNew = isset($_POST['fechaInicioNew']) ? $_POST['fechaInicioNew'] : false;
      $meses = isset($_POST['duracionNew']) ? $_POST['duracionNew'] : false;
      $nombreServicio = isset($_POST['servicio']) ? $_POST['servicio'] : false;
      $precio = isset($_POST['precio']) ? $_POST['precio'] : false;

      if($idContrato && $idServicio){
        $contratoObj = new Contratos();
        $editar = $contratoObj->editarContrato($idContrato, $idServicio);
        $editar_fecha = $contratoObj->editarContrato_fecha($idContrato, $fechaInicioNew, $nombreServicio, $meses, $idServicio, $precio);
        if($editar){
          if($editar_fecha){
            $respuesta = [
              'estado' => 'ok',
              'mensaje' => 'Se actualizo los datos correctamente'
            ];
          }else{
            $respuesta = [
              'estado' => 'ok',
              'mensaje' => 'Se cambio el servicio mas no la nueva fecha ya que tiene pensiones PAGADAS'
            ];
          }
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error en la consulta de la bd, comuniquese con soporte'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta recibiendo todos los datos necesarios, comuniquese con soporte'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al comnicarse con el servidor, comuniquese con soporte'
      ];
    }
    return json_encode($respuesta);
  }
}

$contratosObj = new ContratosController();
if(isset($_SESSION['identity'])){
	if ($_GET['method'] == 'contratos') {
		$contratosObj->index();
	}
	if ($_GET['method'] == 'listarTipoAfectacion') {
		echo ($contratosObj->listarTipoAfectacion());
	}
	if ($_GET['method'] == 'generarContrato') {
		echo ($contratosObj->generarContrato());
	}
  if ($_GET['method'] == 'editar') {
    echo ($contratosObj->editarContrato());
  }
}else{
    //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}

