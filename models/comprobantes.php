  <?php

require_once "../config/db.php";

class Comprobantes
{
	private $db;

	public function __construct()
	{
		$this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
	}

	/* ##### METODOS ###### */
	public function guardarComprobante($comprobante)
	{
		$sql = "INSERT INTO `comprobantes`(`idComprobante`, `nombreComprobante`) VALUES (NULL,'$comprobante')";
		$save = $this->db->query($sql);
		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}
	public function listarComprobantes()
	{
		$consulta = "SELECT * FROM `comprobantes` WHERE estadoComprobante='activo'";
		$consultar = $this->db->query($consulta);
		$categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
		return $categoriasServicios;
	}
	public function listarComprobantesGlobal()
	{
		$consulta = "SELECT * FROM `comprobantes`";
		$consultar = $this->db->query($consulta);
		$categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
		return $categoriasServicios;
	}
	public function listarComprobantesParaPagar()
	{
		$consulta = "SELECT comprobantes.idComprobante, comprobantes.nombreComprobante, tirajes.idTiraje, tirajes.serie , ((tirajes.hasta - tirajes.disponible) + 1 ) AS 'numeroComprobante' FROM `comprobantes`, tirajes WHERE tirajes.idComprobante = comprobantes.idComprobante;";
		$consultar = $this->db->query($consulta);
		$categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
		return $categoriasServicios;
	}
	public function editarComprobante($idComprobante, $comprobante){
		$consulta = "UPDATE `comprobantes` SET `nombreComprobante`='$comprobante' WHERE idComprobante  = $idComprobante";
		$query = $this->db->query($consulta);
		return $query;
	}
	public function inhabilitarComprobante($idComprobante){
		$consulta = "UPDATE `comprobantes` SET `estadoComprobante`='inhabilitado' WHERE idComprobante  = $idComprobante";
		$query = $this->db->query($consulta);
		return $query;
	}
	public function habilitarComprobante($idComprobante){
		$consulta = "UPDATE `comprobantes` SET `estadoComprobante`='activo' WHERE idComprobante  = $idComprobante";
		$query = $this->db->query($consulta);
		return $query;
	}
}
