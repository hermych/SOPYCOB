<?php
session_start();
require_once "../models/cargos.php";

class CargosController
{
	public function index()
	{
		if (isset($_SESSION['title'])) {
			$_SESSION['title'] = 'Usuarios';
		}
		require_once "../views/usuario/cargos.php";
	}

	public function guardarCargo()
	{
		$respuesta = [];
		if (isset($_POST)) {
			$nombreCargo = isset($_POST['nombreCargo']) ? $_POST['nombreCargo'] : false;
			$codigoCargo = isset($_POST['codigoCargo']) ? $_POST['codigoCargo'] : false;
			$sueldoCargo = isset($_POST['sueldoCargo']) ? $_POST['sueldoCargo'] : false;
			if ($nombreCargo && $codigoCargo && $sueldoCargo) {
				$usuario = new Cargos();
				$save = $usuario->guardarCargo($nombreCargo, $codigoCargo, $sueldoCargo);
				if ($save) {
					$respuesta = [
						'estado' => 'ok',
						'mensaje' => 'Cargo registrado correctamente'
					];
				} else {
					$respuesta = [
						'estado' => 'failed',
						'mensaje' => 'Error al registrar el cargo, intentelo mas tarde'
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

	public function listarCargos()
	{
		$indice = 1;
		$categoriasServicios = new Cargos();
		$categorias = $categoriasServicios->listarCargos();
		foreach ($categorias as $key => $value) {
			$json['data'][$key] = $value;
		}
		for ($i = 0; $i < count($json['data']); $i++) {
			$json['data'][$i]['indice'] = $indice;
			$indice++;
		}
		$jsonString = json_encode($json);
		return $jsonString;
	}

    public function listarCargosGlobal()
    {
        $indice = 1;
        $categoriasServicios = new Cargos();
        $categorias = $categoriasServicios->listarCargosGlobal();
        foreach ($categorias as $key => $value) {
            $json['data'][$key] = $value;
        }
        for ($i = 0; $i < count($json['data']); $i++) {
            $json['data'][$i]['indice'] = $indice;
            $indice++;
        }
        $jsonString = json_encode($json);
        return $jsonString;
    }

	public function editarCargo()
	{
		// RECOGER LOS DATOS
		$categoriaObj = new Cargos();
		$idCargo = isset($_POST['idCargo']) ? $_POST['idCargo'] : false;
		$editNombreCargo = isset($_POST['editNombreCargo']) ? $_POST['editNombreCargo'] : false;
		$editCodigoCargo = isset($_POST['editCodigoCargo']) ? $_POST['editCodigoCargo'] : false;
		$editSueldoCargo = isset($_POST['editSueldoCargo']) ? $_POST['editSueldoCargo'] : false;
		// ENVIAR DATOS AL MODELO
		$estado = $categoriaObj->editarCargo($idCargo, $editNombreCargo, $editCodigoCargo, $editSueldoCargo);
		if ($categoriaObj) {
			$respuesta = [
				'estado' => 'ok',
				'mensaje' => 'Cargo editado correctamente'
			];
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'Error al editar cargo, verifique los datos'
			];
		}
		return json_encode($respuesta);
	}

	public function inhabilitarCargo()
	{
		$cargo = new Cargos();
		$idCargo = isset($_POST['idCargo']) ? $_POST['idCargo'] : false;
		if ($idCargo) {
			$cargoInhabilitado = $cargo->inhabilitarCargo($idCargo);
			if ($cargoInhabilitado) {
				$respuesta = [
					'estado' => 'ok',
					'mensaje' => 'Se ha inahbilitado el cargo correctamente'
				];
			} else {
				$respuesta = [
					'estado' => 'failed',
					'mensaje' => 'Error al realizar la consulta en la bd'
				];
			}
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'idCategoria no tiene iCategoria'
			];
		}
		return json_encode($respuesta);
	}

    public function habilitarCargo()
    {
        $cargo = new Cargos();
        $idCargo = isset($_POST['idCargo']) ? $_POST['idCargo'] : false;
        if ($idCargo) {
            $cargoInhabilitado = $cargo->habilitarCargo($idCargo);
            if ($cargoInhabilitado) {
                $respuesta = [
                    'estado' => 'ok',
                    'mensaje' => 'Se activo correctamente el cargo'
                ];
            } else {
                $respuesta = [
                    'estado' => 'failed',
                    'mensaje' => 'Error al realizar la consulta en la bd'
                ];
            }
        } else {
            $respuesta = [
                'estado' => 'failed',
                'mensaje' => 'idCargo no tiene valor'
            ];
        }
        return json_encode($respuesta);
    }
}

$cargos = new CargosController();
if(isset($_SESSION['identity'])){
	if ($_GET['method'] == 'cargos') {
		$cargos->index();
	}
	if ($_GET['method'] == 'listarCargos') {
		echo ($cargos->listarCargos());
	}
    if ($_GET['method'] == 'listarCargosGlobal') {
        echo ($cargos->listarCargosGlobal());
    }
	if ($_GET['method'] == 'guardarCargo') {
		echo ($cargos->guardarCargo());
	}
	if ($_GET['method'] == 'editarCargo') {
		echo ($cargos->editarCargo());
	}
	if ($_GET['method'] == 'inhabilitarCargo') {
		echo $cargos->inhabilitarCargo();
	}
    if ($_GET['method'] == 'habilitarCargo') {
        echo $cargos->habilitarCargo();
    }
}else{
  header("Location:../views/sinSesion.php");
}

