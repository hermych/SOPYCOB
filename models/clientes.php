<?php

require_once "../config/db.php";

class Clientes
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']);
  }

  /* ##### METODOS ###### */
  public function guardarCliente($nroDocumento, $tipoDoc, $nombreCliente, $nombreComercial, $celuCliente, $emailCliente, $telfCliente, $idDepartamento, $idProvincia, $idDistrito, $direcCliente, $nombreContactoProv, $telfContactoProv, $dniContacto)
  {
    //   Buscar si ya existe el cliente en la bd
    $sql_searchCliente = "SELECT * FROM clientes WHERE nroDocumento = '$nroDocumento' AND estado='activo'";
    $consultar_searchCliente = $this->db->query($sql_searchCliente);
    $cliente = $consultar_searchCliente->fetch_all(MYSQLI_ASSOC);
    if(count($cliente) >= 1 ){
        $result = "existe";
    }else{
        $nombreArray = explode(" ", $nombreCliente);
        $nombre = $nombreArray[0];
        $codCliente = "CLI$nombre$nroDocumento";
        $sql = "INSERT INTO `clientes`(`codCliente`, `nombreCliente`, `nombreComercial`, `celularCliente`, `telefonoCliente`, `emailCliente`, `direccionCliente`, `idDepartamento`, `idProvincia`, `idDistrito`, `idTipoDocumento`, `nroDocumento`, `nombreContacto`, `nroContacto`, `nroDocContacto`) VALUES ('$codCliente','$nombreCliente','$nombreComercial','$celuCliente','$telfCliente','$emailCliente','$direcCliente','$idDepartamento','$idProvincia','$idDistrito','$tipoDoc','$nroDocumento','$nombreContactoProv','$telfContactoProv','$dniContacto')";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
          $result = true;
        }
    }
    
    return $result;
  }
  public function listarClientes()
  {
    $consulta = "SELECT * FROM `clientes` WHERE estado = 'activo'";
    $consultar = $this->db->query($consulta);
    $categoriasServicios = $consultar->fetch_all(MYSQLI_ASSOC);
    return $categoriasServicios;
  }
  public function editarProveedor($idClienteEdit, $nroDocumentoEdit, $tipoDoc, $nombreClienteEdit, $nombreComercialEdit, $celuClienteEdit, $emailClienteEdit, $telfClienteEdit, $idDepartamentoEdit, $idProvinciaEdit, $idDistritoEdit, $direcClienteEdit, $nombreContactoProvEdit, $telfContactoProvEdit, $dniContactoEdit){
    $consulta = "UPDATE `clientes` SET `nombreCliente`='$nombreClienteEdit', `nombreComercial`='$nombreComercialEdit',`celularCliente`='$celuClienteEdit',`telefonoCliente`='$telfClienteEdit',`emailCliente`='$emailClienteEdit',`direccionCliente`='$direcClienteEdit',`idDepartamento`='$idDepartamentoEdit',`idProvincia`='$idProvinciaEdit',`idDistrito`='$idDistritoEdit',`idTipoDocumento`='$tipoDoc',`nroDocumento`='$nroDocumentoEdit',`nombreContacto`='$nombreContactoProvEdit',`nroContacto`='$telfContactoProvEdit',`nroDocContacto`='$dniContactoEdit' WHERE idCliente = '$idClienteEdit'";
    $query = $this->db->query($consulta);
    return $query;
  }
  public function inhabilitarCliente($idCliente)
  {
    $consulta = "UPDATE `clientes` SET `estado`='inhabilitado' WHERE idCliente = $idCliente";
    $query = $this->db->query($consulta);
    return $query;
  }
  public function listarDepartamentos(){
    $consulta = "SELECT * FROM `departamentos`";
    $query = $this->db->query($consulta);
    $departamentos = $query->fetch_all(MYSQLI_ASSOC);
    return $departamentos;
  }
  public function listarProvincias($idDep){
    $consulta = "SELECT * FROM `provincias` WHERE idDepartamento = '$idDep';";
    $query = $this->db->query($consulta);
    $departamentos = $query->fetch_all(MYSQLI_ASSOC);
    return $departamentos;
  }
  public function listarDistritos($idDep, $idProv){
    $consulta = "SELECT * FROM `distritos` WHERE idProvincia = '$idProv' AND idDepartamento = '$idDep';";
    $query = $this->db->query($consulta);
    $departamentos = $query->fetch_all(MYSQLI_ASSOC);
    return $departamentos;
  }
  public function listarClienteEspecifico($dniRuc, $claveBuscador){
    if($claveBuscador){
      $consulta = "SELECT * FROM `clientes` WHERE nombreComercial LIKE '%$dniRuc%' LIMIT 1";
    }else{
      $consulta = "SELECT * FROM `clientes` WHERE nroDocumento = '$dniRuc' LIMIT 1";
    }
    $query = $this->db->query($consulta);
    $clientes = $query->fetch_all(MYSQLI_ASSOC);
    if(count($clientes)==1){
      return $clientes;
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'El cliente no ha sido registrado o hay mas de un cliente registrado con el mismo dni/ruc/nombre'
      ];
      return $respuesta;
    }
  }
  public function listarClientesPorServicio(){
    $sql_listar = "SELECT clientes_servicios.idClienteServicio as 'id', clientes.nombreComercial as 'cliente', clientes.nombreContacto as 'contacto', clientes.nroContacto, clientes_servicios.idServicio ,servicios.nombreServicio as 'servicio', clientes_servicios.tiempoContrato as 'duracion', clientes_servicios.fechaInicioServicio as 'inicio', clientes_servicios.estadoClienteServicio as 'estado', clientes_servicios.motivoSuspencion as 'mtvSuspencion' FROM clientes_servicios, clientes, servicios WHERE clientes_servicios.idCliente = clientes.idCliente AND clientes_servicios.idServicio = servicios.idServicio AND clientes_servicios.estadoClienteServicio != 'eliminado' ORDER BY cliente";
    $listar = $this->db->query($sql_listar);
    $clienteServicio = $listar->fetch_all(MYSQLI_ASSOC);
    return $clienteServicio;
  }
  public function buscarCliente($documento){
    $sql_cliente = "SELECT * FROM `clientes` WHERE nroDocumento='$documento'";
    $buscar = $this->db->query($sql_cliente);
    $cliente = ($buscar->fetch_all(MYSQLI_ASSOC));
    return $cliente;
  }
  public function buscarClienteContacto($documento, $clienteDoc){
    $sql_cliente = "SELECT * FROM `clientes` WHERE (nroDocumento = '$documento' or nroDocContacto = '$documento') AND  nroDocumento='$clienteDoc'";
    $buscar = $this->db->query($sql_cliente);
    $cliente = ($buscar->fetch_all(MYSQLI_ASSOC));
    return $cliente;
  }
  public function buscarClienteUnico($documento){
    $sql_cliente = "SELECT * FROM `clientes` WHERE nroDocumento = '$documento'";
    $buscar = $this->db->query($sql_cliente);
    $cliente = ($buscar->fetch_all(MYSQLI_ASSOC));
    return $cliente;
  }
  public function guardarClienteInstalacion($nroDocumento, $nombreCliente, $nombreComercial, $celuCliente, $emailCliente, $telfCliente, $direcCliente)
  {
    $direccion = explode("=>", $direcCliente)[1];
    $codigos = array("(0000)", "(0001)", "(0002)", "(0003)", "(0004)", "(0005)", "(0006)", "(0007)", "(0008)", "(0009)");
    $direccion_real = str_replace($codigos, "", $direccion);
    //   Buscar si ya existe el cliente en la bd
    $sql_searchCliente = "SELECT * FROM clientes WHERE nroDocumento = '$nroDocumento' AND estado='activo'";
    $consultar_searchCliente = $this->db->query($sql_searchCliente);
    $cliente = $consultar_searchCliente->fetch_all(MYSQLI_ASSOC);
    if(count($cliente) >= 1 ){
      $result = "existe";
    }else{
      $nombreArray = explode(" ", $nombreCliente);
      $nombre = $nombreArray[0];
      $codCliente = "CLI$nombre$nroDocumento";
      $sql = "INSERT INTO `clientes`(`codCliente`, `nombreCliente`, `nombreComercial`, `celularCliente`, `telefonoCliente`, `emailCliente`, `direccionCliente`, `idTipoDocumento`, `nroDocumento`) VALUES ('$codCliente','$nombreCliente','$nombreComercial','$celuCliente','$telfCliente','$emailCliente','$direccion_real','1','$nroDocumento')";
      $save = $this->db->query($sql);
      $result = false;
      if ($save) {
        $result = true;
      }
    }

    return $result;
  }
}