<?php
session_start();
require_once "../models/sucursales.php";

class SucursalController
{
    public function listarSucursalesActivos()
    {
        $sucursalObj = new Sucursales();
        $sucursales = $sucursalObj->listarSucursalesActivos();
        return json_encode($sucursales);
    }

    public function sucursalesView()
    {
        require_once "../views/empresa/sucursales.php";
    }

    public function listarSucursalesGlobal()
    {
        $indice = 1;
        $sucursalObj = new Sucursales();
        $sucursales = $sucursalObj->listarSucursalesGlobal();
        foreach ($sucursales as $key => $value) {
            $json['data'][$key] = $value;
        }
        for ($i = 0; $i < count($json['data']); $i++) {
            $json['data'][$i]['indice'] = $indice;
            $indice++;
        }
        $jsonString = json_encode($json);
        return $jsonString;
    }

    public function guardarSucursal()
    {
        $respuesta = [];
        if (isset($_POST)) {
            $nombre = (isset($_POST['nombreSucursal']) ? $_POST['nombreSucursal'] : false);
            $direccion = (isset($_POST['direccionSucursal']) ? $_POST['direccionSucursal'] : false);
            $codSuc = (isset($_POST['codigoSucursal']) ? $_POST['codigoSucursal'] : false);
            $codFis = (isset($_POST['codigoFiscal']) ? $_POST['codigoFiscal'] : false);
            if ($direccion && $nombre) {
                $sucursalObj = new Sucursales();
                $sucursales = $sucursalObj->guardarSucursal($nombre, $direccion, $codSuc, $codFis);
                if ($sucursales) {
                    $respuesta = [
                        'estado' => 'ok',
                        'mensaje' => 'Se ha registrado la sucursal correctamente',
                    ];
                } else {
                    $respuesta = [
                        'estado' => 'failed',
                        'mensaje' => 'Error al realizar la consulta, comuniquese con soporte',
                    ];
                }
            } else {
                $respuesta = [
                    'estado' => 'failed',
                    'mensaje' => 'Complete todos los campos por favor',
                ];
            }
        } else {
            $respuesta = [
                'estado' => 'failed',
                'mensaje' => 'Error al enviar los datos al servidor',
            ];
        }
        return json_encode($respuesta);
    }

    public function editarSucursal()
    {
        $respuesta = [];
        if (isset($_POST)) {
            $idSucursal = (isset($_POST['idSucursal'])) ? $_POST['idSucursal'] : false;
            $nombre = (isset($_POST['NombreSucursal'])) ? $_POST['NombreSucursal'] : false;
            $direccion = (isset($_POST['DireccionSucursal'])) ? $_POST['DireccionSucursal'] : false;
            $codSuc = (isset($_POST['CodigoSucursal'])) ? $_POST['CodigoSucursal'] : false;
            $codFis = (isset($_POST['CodigoFiscal'])) ? $_POST['CodigoFiscal'] : false;
            if ($idSucursal && $nombre && $direccion && $codSuc && $codFis) {
                $sucursalObj = new Sucursales();
                $sucursales = $sucursalObj->editarSucursal($idSucursal, $nombre, $direccion, $codSuc, $codFis);
                if ($sucursales == '1') {
                    $respuesta = [
                        'estado' => 'ok',
                        'mensaje' => 'Se actualizo los datos correctamente',
                    ];
                }else{
                    $respuesta = [
                        'estado' => 'failed',
                        'mensaje' => 'Error en la consulta, comuniquese con soporte',
                    ];
                }
            } else {
                $respuesta = [
                    'estado' => 'failed',
                    'mensaje' => 'Faltan datos, por favor complete todos los datos',
                ];
            }
        } else {
            $respuesta = [
                'estado' => 'failed',
                'mensaje' => 'Error al enviar los datos, comuniquese con soporte',
            ];
        }
        return json_encode($respuesta);
    }

    public function inhabilitarSucursal()
    {
        $respuesta = [];
        if (isset($_POST)) {
            $idSucursal = (isset($_POST['idSucursal'])) ? $_POST['idSucursal'] : false;
            if ($idSucursal) {
                $sucursalObj = new Sucursales();
                $sucursales = $sucursalObj->inhabilitarSucursal($idSucursal);
                if ($sucursales == '1') {
                    $respuesta = [
                        'estado' => 'ok',
                        'mensaje' => 'La sucursal ha sido inhabilitada',
                    ];
                }else{
                    $respuesta = [
                        'estado' => 'failed',
                        'mensaje' => 'Error en la consulta, comuniquese con soporte',
                    ];
                }
            } else {
                $respuesta = [
                    'estado' => 'failed',
                    'mensaje' => 'Faltan datos, comuniquese con soporte',
                ];
            }
        } else {
            $respuesta = [
                'estado' => 'failed',
                'mensaje' => 'Error al enviar los datos, comuniquese con soporte',
            ];
        }
        return json_encode($respuesta);
    }

    public function habilitarSucursal()
    {
        $respuesta = [];
        if (isset($_POST)) {
            $idSucursal = (isset($_POST['idSucursal'])) ? $_POST['idSucursal'] : false;
            if ($idSucursal) {
                $sucursalObj = new Sucursales();
                $sucursales = $sucursalObj->habilitarSucursal($idSucursal);
                if ($sucursales == '1') {
                    $respuesta = [
                        'estado' => 'ok',
                        'mensaje' => 'La sucursal ha vuelto a ser habilitada',
                    ];
                }else{
                    $respuesta = [
                        'estado' => 'failed',
                        'mensaje' => 'Error en la consulta, comuniquese con soporte',
                    ];
                }
            } else {
                $respuesta = [
                    'estado' => 'failed',
                    'mensaje' => 'Faltan datos, comuniquese con soporte',
                ];
            }
        } else {
            $respuesta = [
                'estado' => 'failed',
                'mensaje' => 'Error al enviar los datos, comuniquese con soporte',
            ];
        }
        return json_encode($respuesta);
    }
}

$sucursal = new SucursalController();
if (isset($_SESSION['identity'])) {
    if ($_GET['method'] == 'listarSucursalesActivos') {
        echo $sucursal->listarSucursalesActivos();
    }
    if ($_GET['method'] == 'sucursales') {
        echo $sucursal->sucursalesView();
    }
    if ($_GET['method'] == 'allSucursales') {
        echo $sucursal->listarSucursalesGlobal();
    }
    if ($_GET['method'] == 'guardarSucursal') {
        echo $sucursal->guardarSucursal();
    }
    if ($_GET['method'] == 'editarSucursal') {
        echo $sucursal->editarSucursal();
    }
    if ($_GET['method'] == 'inhabilitarSucursal') {
        echo $sucursal->inhabilitarSucursal();
    }
    if ($_GET['method'] == 'habilitarSucursal') {
        echo $sucursal->habilitarSucursal();
    }
} else {
    //header("Location:../" . $_SESSION['dbname'] . ".php");
  header("Location:../views/sinSesion.php");
}

