<?php
session_start();
require_once "../models/clientes.php";

class ClientesController
{
  public function index()
  {
    require_once "../views/clientes.php";
  }

  public function guardarCliente()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $nroDocumento = isset($_POST['nroDocumento']) ? $_POST['nroDocumento'] : false;
      $tipoDoc = isset($_POST['tipoDoc']) ? $_POST['tipoDoc'] : false;
      $nombreCliente = isset($_POST['nombreCliente']) ? $_POST['nombreCliente'] : false;
      $nombreComercial = ($_POST['nombreComercial'] != '') ? $_POST['nombreComercial'] : $_POST['nombreCliente'];
      $celuCliente = isset($_POST['celuCliente']) ? $_POST['celuCliente'] : false;
      $emailCliente = isset($_POST['emailCliente']) ? $_POST['emailCliente'] : '';
      $telfCliente = isset($_POST['telfCliente']) ? $_POST['telfCliente'] : '';
      $idDepartamento = isset($_POST['idDepartamento']) ? $_POST['idDepartamento'] : false;
      $idProvincia = isset($_POST['idProvincia']) ? $_POST['idProvincia'] : false;
      $idDistrito = isset($_POST['idDistrito']) ? $_POST['idDistrito'] : false;
      $direcCliente = isset($_POST['direcCliente']) ? $_POST['direcCliente'] : false;
      $nombreContactoProv = isset($_POST['nombreContactoProv']) ? $_POST['nombreContactoProv'] : false;
      $telfContactoProv = isset($_POST['telfContactoProv']) ? $_POST['telfContactoProv'] : false;
      $dniContacto = isset($_POST['dniContactoProv']) ? $_POST['dniContactoProv'] : false;

      if ($nroDocumento && $tipoDoc && $nombreCliente && $celuCliente && $idDepartamento && $idProvincia && $idDistrito && $direcCliente && $nombreContactoProv && $telfContactoProv && $dniContacto) {
        $cliente = new Clientes();
        $save = $cliente->guardarCliente($nroDocumento, $tipoDoc, $nombreCliente, $nombreComercial,$celuCliente, $emailCliente, $telfCliente, $idDepartamento, $idProvincia, $idDistrito, $direcCliente, $nombreContactoProv, $telfContactoProv, $dniContacto);
        if ($save === true) {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Cliente agregado correctamente'
          ];
          return json_encode($respuesta);
        } elseif($save == 'existe'){
            $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'El dni/ruc ingresado ya ha sido registrado antes'
          ];
          return json_encode($respuesta);
        } else {
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error en la consulta'
          ];
          return json_encode($respuesta);
        }
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'Error, Faltan enviar datos'
        ];
        return json_encode($respuesta);
      }
    }else{
        $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error en el servidor, comuniquese con soporte por favor'
        ];
    }
    return json_encode($respuesta);
  }

  public function listarClientes()
  {
    $indice = 1;
    $proveedoresObj = new Clientes();
    $proveedores = $proveedoresObj->listarClientes();
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

  public function listarClienteEspecifico(){
    $dniRucName = $_POST['valor'];
    $claveBuscador = (isset($_POST['nombreComercial'])) ? true : false;
    $clienteObj = new Clientes();
    $cliente = $clienteObj->listarClienteEspecifico($dniRucName, $claveBuscador);
    return json_encode($cliente);
  }

  public function editarCliente()
  {
    // RECOGER LOS DATOS
    $clienteObj = new Clientes();
    $idClienteEdit = isset($_POST['idClienteEdit']) ? $_POST['idClienteEdit'] : false;
    $nroDocumentoEdit = isset($_POST['nroDocumentoEdit']) ? $_POST['nroDocumentoEdit'] : false;
    $tipoDoc = isset($_POST['tipoDoc']) ? $_POST['tipoDoc'] : false;
    $nombreClienteEdit = isset($_POST['nombreClienteEdit']) ? $_POST['nombreClienteEdit'] : false;
    $nombreComercialEdit = ($_POST['nombreComercialEdit'] != '') ? $_POST['nombreComercialEdit'] : $_POST['nombreClienteEdit'];
    $celuClienteEdit = isset($_POST['celuClienteEdit']) ? $_POST['celuClienteEdit'] : false;
    $emailClienteEdit = isset($_POST['emailClienteEdit']) ? $_POST['emailClienteEdit'] : false;
    $telfClienteEdit = isset($_POST['telfClienteEdit']) ? $_POST['telfClienteEdit'] : '';
    $idDepartamentoEdit = isset($_POST['idDepartamentoEdit']) ? $_POST['idDepartamentoEdit'] : false;
    $idProvinciaEdit = isset($_POST['idProvinciaEdit']) ? $_POST['idProvinciaEdit'] : false;
    $idDistritoEdit = isset($_POST['idDistritoEdit']) ? $_POST['idDistritoEdit'] : false;
    $direcClienteEdit = isset($_POST['direcClienteEdit']) ? $_POST['direcClienteEdit'] : false;
    $nombreContactoProvEdit = isset($_POST['nombreContactoProvEdit']) ? $_POST['nombreContactoProvEdit'] : false;
    $telfContactoProvEdit = isset($_POST['telfContactoProvEdit']) ? $_POST['telfContactoProvEdit'] : false;
    $dniContactoEdit = isset($_POST['dniContactoEdit']) ? $_POST['dniContactoEdit'] : '';
    // ENVIAR DATOS AL MODELO
    $clienteObj->editarProveedor($idClienteEdit, $nroDocumentoEdit, $tipoDoc, $nombreClienteEdit, $nombreComercialEdit, $celuClienteEdit, $emailClienteEdit, $telfClienteEdit, $idDepartamentoEdit, $idProvinciaEdit, $idDistritoEdit, $direcClienteEdit, $nombreContactoProvEdit, $telfContactoProvEdit, $dniContactoEdit);
    if ($clienteObj) {
      $respuesta = [
        'estado' => 'ok',
        'mensaje' => 'Cliente editado correctamente'
      ];
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al editar cliente, verifique los datos'
      ];
    }
    return json_encode($respuesta);
  }

  public function inhabilitarCliente()
  {
    $clienteObj = new Clientes();
    $idCliente = isset($_POST['idCliente']) ? $_POST['idCliente'] : false;
    if ($idCliente) {
      $clienteInhabilitado = $clienteObj->inhabilitarCliente($idCliente);
      if ($clienteInhabilitado) {
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

  public function listarDeparmentos()
  {
    $cliente = new Clientes();
    $depas = $cliente->listarDepartamentos();
    return json_encode($depas);
  }

  public function listarProvincias()
  {
    $idDep = $_POST['idDep'];
    $cliente = new Clientes();
    $depas = $cliente->listarProvincias($idDep);
    return json_encode($depas);
  }

  public function listarDistritos()
  {
    $idDep = $_POST['idDep'];
    $idProv = $_POST['idProv'];
    $cliente = new Clientes();
    $depas = $cliente->listarDistritos($idDep, $idProv);
    return json_encode($depas);
  }

  public function listarClientesPorServicio(){
    $indice = 1;
    $proveedoresObj = new Clientes();
    $proveedores = $proveedoresObj->listarClientesPorServicio();
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

  public function buscarCliente(){
    $respuesta = [];
    if(isset($_POST)){
      $documento = isset($_POST['documento']) ? $_POST['documento'] : false;
      $clienteDoc = isset($_POST['clienteDoc']) ? $_POST['clienteDoc'] : false;
      if($documento && $clienteDoc){
        if($documento == $clienteDoc){
          $clienteObj = new Clientes();
          $cliente = $clienteObj->buscarCliente($documento);
          $respuesta = [
            'nombreCliente' => $cliente[0]['nombreCliente'],
            'direccion' => 'Lima'
          ];
        }else{
          $clienteObj = new Clientes();
          $cliente = $clienteObj->buscarClienteContacto($documento,$clienteDoc);
          if(count($cliente) != 1){
            $clienteObj = new Clientes();
            $cliente = $clienteObj->buscarClienteUnico($documento);
            if(count($cliente) != 1){
              $respuesta = [
                'estado' => 'noExiste',
                'mensaje' => 'No se encuentra el cliente, por favor registre al usuario'
              ];
            }else{
              $respuesta = [
                'nombreCliente' => $cliente[0]['nombreCliente'],
                'direccion' => 'Lima'
              ];
            }
          }else{
            $respuesta = [
              'nombreCliente' => $cliente[0]['nombreContacto'],
              'direccion' => 'Lima'
            ];
          }
        }
      }else{
        $respuesta = [
          'estado' => 'error',
          'mensaje' => 'Error, no se esta recibiendo el numero de documento, comuniquese con soporte'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'error',
        'mensaje' => 'Error en el servidor, por favor comuniquese con soporte'
      ];
    }
    return json_encode($respuesta);
  }
}

$clientes = new ClientesController();
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'clientes') {
    $clientes->index();
  }
  if ($_GET['method'] == 'listarClientes') {
    echo ($clientes->listarClientes());
  }
  if ($_GET['method'] == 'guardarCliente') {
    echo ($clientes->guardarCliente());
  }
  if ($_GET['method'] == 'editarCliente') {
    echo $clientes->editarCliente();
  }
  if ($_GET['method'] == 'inhabilitarCliente') {
    echo $clientes->inhabilitarCliente();
  }
  if ($_GET['method'] == 'listarDeparmentos') {
    echo $clientes->listarDeparmentos();
  }
  if ($_GET['method'] == 'listarProvincias') {
    echo $clientes->listarProvincias();
  }
  if ($_GET['method'] == 'listarDistritos') {
    echo $clientes->listarDistritos();
  }
  if ($_GET['method'] == 'listarClienteEspecifico') {
    echo $clientes->listarClienteEspecifico();
  }
  if ($_GET['method'] == 'listarProveedoresCategoria') {
    echo $clientes->listarProveedoresCategoria();
  }
  if ($_GET['method'] == 'listarClientesPorServicio') {
    echo $clientes->listarClientesPorServicio();
  }
  if ($_GET['method'] == 'buscarCliente') {
    echo $clientes->buscarCliente();
  }
} else {
  header("Location:../views/sinSesion.php");
}
