<?php
session_start();
require_once "../models/proveedores.php";

class ProveedoresController
{
    public function index()
    {
        require_once "../views/servicios/proveedores.php";
    }

    public function guardarProveedor()
    {
        $respuesta = [];
        if (isset($_POST)) {
            $nroDocProveedor = isset($_POST['nroDocProveedor']) ? $_POST['nroDocProveedor'] : false;
            $nombreProv = isset($_POST['nombreProv']) ? $_POST['nombreProv'] : false;
            $celProv = isset($_POST['celProv']) ? $_POST['celProv'] : false;
            $telfProveedor = isset($_POST['telfProveedor']) ? $_POST['telfProveedor'] : '';
            $emailProveedor = isset($_POST['emailProveedor']) ? $_POST['emailProveedor'] : '';
            $direcProveedor = isset($_POST['direcProveedor']) ? $_POST['direcProveedor'] : false;
            $nombreContactoProv = isset($_POST['nombreContactoProv']) ? $_POST['nombreContactoProv'] : false;
            $telfContactoProv = isset($_POST['telfContactoProv']) ? $_POST['telfContactoProv'] : false;
            $emailContactoProv = isset($_POST['emailContactoProv']) ? $_POST['emailContactoProv'] : '';
            $codProveedor = 'PROV' . substr($nroDocProveedor, -4) . substr($nombreProv, 0, 3);
            $tipoDocProveedor = '2';
            if ($nroDocProveedor && $nombreProv && $celProv && $direcProveedor && $nombreContactoProv && $telfContactoProv && $codProveedor) {
                $usuario = new Proveedores();
                $save = $usuario->guardarProveedor($nroDocProveedor, $nombreProv, $celProv, $telfProveedor, $emailProveedor, $direcProveedor, $nombreContactoProv, $telfContactoProv, $emailContactoProv, $codProveedor, $tipoDocProveedor);
                if ($save) {
                    $respuesta = [
                        'estado' => 'ok',
                        'mensaje' => 'Proovedor agregado correctamente'
                    ];
                } else {
                    $respuesta = [
                        'estado' => 'failed',
                        'mensaje' => 'Error al registrar proveedor, intentelo mas tarde'
                    ];
                }
            } else {
                $respuesta = [
                    'estado' => 'failed',
                    'mensaje' => 'Por favor complete los campos necesarios'
                ];
            }
        } else {
            $respuesta = [
                'estado' => 'failed',
                'mensaje' => 'Error al momento de enviar datos, comiquese con soporte por favor'
            ];
        }
        return json_encode($respuesta);
    }

    public function listarProveedores()
    {
        $indice = 1;
        $proveedoresObj = new Proveedores();
        $proveedores = $proveedoresObj->listarProveedores();
        foreach ($proveedores as $key => $value) {
            $json['data'][$key] = $value;
        }
        for ($i = 0; $i < count($json['data']); $i++) {
            $json['data'][$i]['indice'] = $indice;
            $indice++;
        }
        $jsonString = json_encode($json);
        return $jsonString;
    }

    public function listarProveedoresGlobal()
    {
        $indice = 1;
        $proveedoresObj = new Proveedores();
        $proveedores = $proveedoresObj->listarProveedoresGlobal();
        foreach ($proveedores as $key => $value) {
            $json['data'][$key] = $value;
        }
        for ($i = 0; $i < count($json['data']); $i++) {
            $json['data'][$i]['indice'] = $indice;
            $indice++;
        }
        $jsonString = json_encode($json);
        return $jsonString;
    }

    public function editarProveedor()
    {
        if ($_POST) {
            $proveedorObj = new Proveedores();
            $idProveedorEdit = isset($_POST['idProveedorEdit']) ? $_POST['idProveedorEdit'] : false;
            $nombreProv = isset($_POST['editNombreProv']) ? $_POST['editNombreProv'] : false;
            $celProv = isset($_POST['editCelProv']) ? $_POST['editCelProv'] : false;
            $telfProveedor = isset($_POST['editTelfProveedor']) ? $_POST['editTelfProveedor'] : '';
            $emailProveedor = isset($_POST['editEmailProveedor']) ? $_POST['editEmailProveedor'] : '';
            $nroDocProveedor = isset($_POST['editNroDocProveedor']) ? $_POST['editNroDocProveedor'] : false;
            $codProveedor = 'PROV' . substr($nroDocProveedor, -4) . substr($nombreProv, 0, 3);
            $direcProveedor = isset($_POST['editDirecProveedor']) ? $_POST['editDirecProveedor'] : false;
            $nombreContactoProv = isset($_POST['editNombreContactoProv']) ? $_POST['editNombreContactoProv'] : false;
            $telfContactoProv = isset($_POST['editTelfContactoProv']) ? $_POST['editTelfContactoProv'] : false;
            $emailContactoProv = isset($_POST['editEmailContactoProv']) ? $_POST['editEmailContactoProv'] : '';
            if($idProveedorEdit && $nombreProv && $celProv && $nroDocProveedor && $codProveedor && $direcProveedor && $nombreContactoProv && $telfContactoProv ) {
                // ENVIAR DATOS AL MODELO
                $proveedorObj->editarProveedor($idProveedorEdit, $nombreProv, $telfProveedor, $emailProveedor, $celProv, $nroDocProveedor, $codProveedor, $direcProveedor, $nombreContactoProv, $telfContactoProv, $emailContactoProv);
                if ($proveedorObj) {
                    $respuesta = [
                        'estado' => 'ok',
                        'mensaje' => 'Proveedor editado correctamente'
                    ];
                } else {
                    $respuesta = [
                        'estado' => 'failed',
                        'mensaje' => 'Error en la consulta, por favor comuniquese con soporte'
                    ];
                }
            } else{
                $respuesta = [
                    'estado' => 'failed',
                    'mensaje' => 'Faltan datos, por favor complete los campos necesarios'
                ];
            }
        } else {
            $respuesta = [
                'estado' => 'failed',
                'mensaje' => 'Error en el servidor, no se envian los datos, comuniquese con soporte por favor'
            ];
        }
        // RECOGER LOS DATOS

        return json_encode($respuesta);
    }

    public function inhabilitarProveedor()
    {
        $proveedor = new Proveedores();
        $idProveedor = isset($_POST['idProveedor']) ? $_POST['idProveedor'] : false;
        if ($proveedor) {
            $categoriaInhabilitado = $proveedor->inhabilitarProveedor($idProveedor);
            if ($categoriaInhabilitado) {
                $respuesta = [
                    'estado' => 'ok',
                    'mensaje' => 'Proveedor inhabilitado correctamente'
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
                'mensaje' => 'Error en la consulta'
            ];
        }
        return json_encode($respuesta);
    }

    public function habilitarProveedor()
    {
        $proveedor = new Proveedores();
        $idProveedor = isset($_POST['idProveedor']) ? $_POST['idProveedor'] : false;
        if ($proveedor) {
            $categoriaInhabilitado = $proveedor->habilitarProveedor($idProveedor);
            if ($categoriaInhabilitado) {
                $respuesta = [
                    'estado' => 'ok',
                    'mensaje' => 'Proveedor activado correctamente'
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
                'mensaje' => 'Error en la consulta'
            ];
        }
        return json_encode($respuesta);
    }
}

$categoria = new ProveedoresController();
if (isset($_SESSION['identity'])) {
    if ($_GET['method'] == 'proveedores') {
        $categoria->index();
    }
    if ($_GET['method'] == 'listarProveedores') {
        echo($categoria->listarProveedores());
    }
    if ($_GET['method'] == 'listarProveedoresGlobal') {
        echo($categoria->listarProveedoresGlobal());
    }
    if ($_GET['method'] == 'guardarProveedor') {
        echo($categoria->guardarProveedor());
    }
    if ($_GET['method'] == 'editarProveedor') {
        echo $categoria->editarProveedor();
    }
    if ($_GET['method'] == 'inhabilitarProveedor') {
        echo $categoria->inhabilitarProveedor();
    }
    if ($_GET['method'] == 'habilitarProveedor') {
        echo $categoria->habilitarProveedor();
    }
} else {
    //header("Location:../" . $_SESSION['dbname'].".php");
    header("Location:../views/sinSesion.php");
}
