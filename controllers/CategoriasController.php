<?php
session_start();
require_once "../models/categorias.php";

class CategoriasController
{
	public function index()
	{
		if (isset($_SESSION['title'])) {
			$_SESSION['title'] = 'Usuarios';
		}
		require_once "../views/servicios/categorias.php";
	}

	public function guardarCategoria()
	{
		$respuesta = [];
		if (isset($_POST)) {
			$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
			if ($categoria) {
				$usuario = new Categorias();
				$save = $usuario->guardarCategoria($categoria);
				if ($save) {
					$respuesta = [
						'estado' => 'ok',
						'mensaje' => 'Usuario agregado correctamente'
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

	public function listarCategorias()
	{
		$indice = 1;
		$categoriasServicios = new Categorias();
		$categorias = $categoriasServicios->listarCategorias();
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

	public function listarCategoriasGlobal()
	{
		$indice = 1;
		$categoriasServicios = new Categorias();
		$categorias = $categoriasServicios->listarCategoriasGlobal();
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

	public function editarCategoria()
	{
		// RECOGER LOS DATOS
		$categoriaObj = new Categorias();
		$idCategoria = isset($_POST['idCategoria']) ? $_POST['idCategoria'] : false;
		$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
		// ENVIAR DATOS AL MODELO
		$estado = $categoriaObj->editarCategoria($idCategoria, $categoria);
		if ($categoriaObj) {
			$respuesta = [
				'estado' => 'ok',
				'mensaje' => 'Categoria editada correctamente'
			];
		} else {
			$respuesta = [
				'estado' => 'failed',
				'mensaje' => 'Error al editar categoria, verifique los datos'
			];
		}
		return json_encode($respuesta);
	}
	public function inhabilitarCategoria()
	{
		$categoria = new Categorias();
		$iCategoria = isset($_POST['idCategoria']) ? $_POST['idCategoria'] : false;
		if ($iCategoria) {
			$categoriaInhabilitado = $categoria->inhabilitarCategoria($iCategoria);
			if ($categoriaInhabilitado) {
				$respuesta = [
					'estado' => 'ok',
					'mensaje' => 'categoria inhabilitada correctamente'
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
	public function HabilitarCategoria()
	{
		$categoria = new Categorias();
		$iCategoria = isset($_POST['idCategoria']) ? $_POST['idCategoria'] : false;
		if ($iCategoria) {
			$categoriaInhabilitado = $categoria->HabilitarCategoria($iCategoria);
			if ($categoriaInhabilitado) {
				$respuesta = [
					'estado' => 'ok',
					'mensaje' => 'Categoria habilitado correctamente'
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
}

$categoria = new CategoriasController();
if(isset($_SESSION['identity'])){
	if ($_GET['method'] == 'categorias') {
		$categoria->index();
	}
	if ($_GET['method'] == 'listarCategorias') {
		echo ($categoria->listarCategorias());
	}
	if ($_GET['method'] == 'listarCategoriasGlobal') {
		echo ($categoria->listarCategoriasGlobal());
	}
	if ($_GET['method'] == 'guardarCategoria') {
		echo ($categoria->guardarCategoria());
	}
	if ($_GET['method'] == 'editarCategoria') {
		echo $categoria->editarCategoria();
	}
	if ($_GET['method'] == 'inhabilitarCategoria') {
		echo $categoria->inhabilitarCategoria();
	}
	if ($_GET['method'] == 'HabilitarCategoria') {
		echo $categoria->HabilitarCategoria();
	}
}else{
  header("Location:../views/sinSesion.php");
}

