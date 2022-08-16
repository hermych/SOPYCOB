<?php
session_start();
require_once "../models/empresa.php";
require_once "../helpers/utils.php";

class EmpresaController
{
  public function datosGenerales()
  {
    require_once "../views/empresa.php";
  }

  public function datosEmpresa()
  {
    $empresaObj = new Empresa();
    $datos = $empresaObj->datosEmpresa();
    return json_encode($datos);
  }

  public function editarDatos()
  {
    $respuesta = [];
    if (isset($_FILES['logo'])) {
      $file = $_FILES['logo'];
      $filename = $file['name'];
      $mimetype = $file['type'];
      
      $allowed_type = array("image/jpg", "image/jpeg", "image/png");
      
      if(!in_array($mimetype, $allowed_type)){
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'por favor, selecciona una imagen'
        ];
        return json_encode($respuesta);
      }

      // crear directorio upload
      if(!is_dir("../assets/image/logos")){
        mkdir("../assets/image/logos", 0777);
      }
      // mover archivo a upload
      $name = $_SESSION['dbname'].$filename;
      $rutaLogo = "../assets/image/logos/".$name;
      move_uploaded_file($file['tmp_name'], $rutaLogo);
    }
    $idEmpresa = $_POST['idEmpresa'];
    $razSocial = $_POST['razonSocial'];
    $nombreComercial = $_POST['nombreComercial'];
    $email = $_POST['email'];
    $propietario = $_POST['propietario'];
    $numeroRuc = $_POST['ruc'];
    $direccionEmpresa = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $empresaObj = new Empresa();
    $editar = $empresaObj->editarDatos($idEmpresa, $email, $razSocial,$nombreComercial,$propietario,$numeroRuc,$direccionEmpresa,$telefono,$celular, $rutaLogo);
    if($editar == "1"){
      $respuesta = [
        'estado' => 'ok',
        'mensaje' => 'Datos actualizados correctamente'
      ];
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al intentar actualizar los datos'
      ];
    }
    return json_encode($respuesta);
  }
}
$empresaObj = new EmpresaController();
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'datosGenerales') {
    echo ($empresaObj->datosGenerales());
  }
  if ($_GET['method'] == 'datosEmpresa') {
    echo ($empresaObj->datosEmpresa());
  }
  if ($_GET['method'] == 'editarDatos') {
    echo ($empresaObj->editarDatos());
  }
} else {
    //header("Location:../" . $_SESSION['dbname'].".php");
  header("Location:../views/sinSesion.php");
}
