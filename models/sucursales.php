<?php

require_once "../config/db.php";

class Sucursales
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
    }

    /* ##### METODOS ###### */
    public function listarSucursalesActivos()
    {
        $sql_sucursales = "SELECT idSucursal, nombre FROM `sucursales` WHERE estado='activo'";
        $consultar = $this->db->query($sql_sucursales);
        $sucursales = $consultar->fetch_all(MYSQLI_ASSOC);
        return $sucursales;
    }

    public function listarSucursalesGlobal()
    {
        $sql_sucursales = "SELECT * FROM `sucursales`";
        $consultar = $this->db->query($sql_sucursales);
        $sucursales = $consultar->fetch_all(MYSQLI_ASSOC);
        return $sucursales;
    }

    public function guardarSucursal($nombre, $direccion, $codSuc, $codFis)
    {
        // ************* Obteniendo datos de empresa ******************
        $sql_idEmpreas = "SELECT idDatosEmpresa as 'idEmpresa' FROM `datos_empresa` LIMIT 1";
        $cons_sql_idEmpresa = $this->db->query($sql_idEmpreas);
        $empresaArray = ($cons_sql_idEmpresa->fetch_all(MYSQLI_ASSOC))[0];
        $idEmpresa = $empresaArray['idEmpresa'];

        // ************** Registrando la sucursal ***********************
        $sql_guardar = "INSERT INTO `sucursales`(`codigoSucursal`, `nombre`, `direccion`, `codigoFiscal`, `idDatosEmpresa`) VALUES ('$codSuc','$nombre','$direccion','$codFis', '$idEmpresa')";
        $guardando = $this->db->query($sql_guardar);
        return $guardando;
    }

    public function editarSucursal($idSucursal, $nombre, $direccion, $codSuc, $codFis)
    {
        $sql_editar = "UPDATE `sucursales` SET `codigoSucursal`='$codSuc',`nombre`='$nombre',`direccion`='$direccion',`codigoFiscal`='$codFis' WHERE idSucursal='$idSucursal'";
        $editando = $this->db->query($sql_editar);
        return $editando;
    }

    public function inhabilitarSucursal($idSucursal)
    {
        $sql_editar = "UPDATE `sucursales` SET `estado`='inhabilitado' WHERE idSucursal='$idSucursal'";
        $editando = $this->db->query($sql_editar);
        return $editando;
    }

    public function habilitarSucursal($idSucursal)
    {
        $sql_editar = "UPDATE `sucursales` SET `estado`='activo' WHERE idSucursal='$idSucursal'";
        $editando = $this->db->query($sql_editar);
        return $editando;
    }
}