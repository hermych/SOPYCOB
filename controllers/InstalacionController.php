<?php
session_start();
require_once "../models/instalaciones.php";
require_once "../models/clientes.php";

class InstalacionController
{
  public function index()
  {
    require_once "../views/comunityManager/altaSistemas.php";
  }

  public function misSolicInstaView(){
    require_once "../views/comunityManager/misSolicInsta.php";
  }
  public function porInstalar()
  {
    require_once "../views/soporte/porInstalar.php";
  }
  public function instalacionesRealizadasView(){
    require_once "../views/soporte/instalacionesRealizadas.php";
  }
  public function agendar()
  {
    $respuesta = [];
    /**Guardar imagenes */
    if (isset($_FILES['logo_1'])) {
      $file = $_FILES['logo_1'];
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
      if(!is_dir("../assets/image/logo_instalacion")){
        mkdir("../assets/image/logo_instalacion", 0777);
      }
      // mover archivo a upload
      $name_1 = $_SESSION['dbname'].$filename;
      $rutaLogo = "../assets/image/logo_instalacion/".$name_1;
      move_uploaded_file($file['tmp_name'], $rutaLogo);
    }
    if (isset($_FILES['logo_2'])) {
      $file = $_FILES['logo_2'];
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
      if(!is_dir("../assets/image/logo_instalacion")){
        mkdir("../assets/image/logo_instalacion", 0777);
      }
      // mover archivo a upload
      $name_2 = $_SESSION['dbname'].$filename;
      $rutaLogo = "../assets/image/logo_instalacion/".$name_2;
      move_uploaded_file($file['tmp_name'], $rutaLogo);
    }
    /**Fin de guardar imagenes */
    /**Guardar datos de formulario */
    if (isset($_POST)) {
      $tipo_sistema = isset($_POST['tipo_sistema']) ? $_POST['tipo_sistema'] : false;
      $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
      $asesor = isset($_POST['asesor']) ? $_POST['asesor'] : false;
      $dominioPos = isset($_POST['dominioPos']) ? $_POST['dominioPos'] : '';
      $dominioFactura = isset($_POST['dominioFactura']) ? $_POST['dominioFactura'] : '';
      $dominioRestobar = isset($_POST['dominioRestobar']) ? $_POST['dominioRestobar'] : '';
      $cliente = isset($_POST['cliente']) ? $_POST['cliente'] : false;
      $dni = isset($_POST['dni']) ? $_POST['dni'] : false;
      $razonSocial = isset($_POST['razonSocial']) ? $_POST['razonSocial'] : false;
      $name_comercial = isset($_POST['name_comercial']) ? $_POST['name_comercial'] : false;
      $ruc = isset($_POST['ruc']) ? $_POST['ruc'] : false;
      $tipo_negocio = isset($_POST['tipo_negocio']) ? $_POST['tipo_negocio'] : false;
      $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
      $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
      $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
      $direc_fiscal = isset($_POST['direc_fiscal']) ? $_POST['direc_fiscal'] : false;
      $serie_compro = isset($_POST['serie_compro']) ? $_POST['serie_compro'] : false;
      $especificacion = isset($_POST['especificacion']) ? $_POST['especificacion'] : false;
      $observacion = isset($_POST['observacion']) ? $_POST['observacion'] : false;
      $persona_contacto = isset($_POST['persona_contacto']) ? $_POST['persona_contacto'] : '';
      $cel_contacto = isset($_POST['cel_contacto']) ? $_POST['cel_contacto'] : '';
      $equipo_principal = isset($_POST['equipo_principal']) ? $_POST['equipo_principal'] : '';
      $equipo_cocina = isset($_POST['equipo_cocina']) ? $_POST['equipo_cocina'] : '';
      $equipo_bar = isset($_POST['equipo_bar']) ? $_POST['equipo_bar'] : '';
      $total_impresoras = isset($_POST['total_impresoras']) ? $_POST['total_impresoras'] : '';
      $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
      $clave_sol = isset($_POST['clave_sol']) ? $_POST['clave_sol'] : '';
      $logo_1 = isset($name_1) ? $name_1 : false;
      $logo_2 = isset($name_2) ? $name_2 : false;
      if($titulo && $asesor && $tipo_sistema && $cliente && $dni && $razonSocial && $name_comercial && $ruc && $tipo_negocio && $direc_fiscal && $serie_compro && $especificacion && $observacion){
        $instalacion = new Instalaciones();
        $clienteObj = new Clientes();
        $clienteObj->guardarClienteInstalacion($dni, $cliente, $name_comercial, $celular, $correo, $telefono, $direc_fiscal);
        $agendar = $instalacion->agendar($tipo_sistema, $titulo, $asesor, $dominioPos, $dominioFactura, $dominioRestobar, $cliente, $dni, $razonSocial, $name_comercial, $ruc, $tipo_negocio, $celular, $telefono, $correo, $direc_fiscal, $serie_compro, $especificacion, $observacion, $persona_contacto, $cel_contacto, $equipo_principal, $equipo_cocina, $equipo_bar, $total_impresoras, $usuario, $clave_sol, $logo_1, $logo_2);
        if($agendar == '1'){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se registro la instalacion correctamente.'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta, comuniquese con soporte por favor.'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta recibiendo los datos minimos, comuniquese con soporte por favor.'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al enviar los datos. No existe POST, comuniquese con soporte por favor.'
      ];
    }
    return json_encode($respuesta);
  }
  public function instalacionesView()
  {
    require_once "../views/comunityManager/instalaciones.php";
  }
  public function listarInstalaciones()
  {
    $indice = 1;
    $list = new Instalaciones();
    $instalaciones = $list->listarInstalaciones();
    foreach ($instalaciones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }
  public function listarInstalacionesRealizadas()
  {
    $indice = 1;
    $list = new Instalaciones();
    $instalaciones = $list->listarInstalacionesRealizadas();
    foreach ($instalaciones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }
  public function listarMisSolicInsta()
  {
    $indice = 1;
    $list = new Instalaciones();
    $instalaciones = $list->listarMisSolicInsta();
    foreach ($instalaciones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }
  public function instalacionesPendientes()
  {
    $indice = 1;
    $list = new Instalaciones();
    $instalaciones = $list->instalacionesPendientes();
    foreach ($instalaciones as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }
  public function editarPrograInsta()
  {
    $respuesta = [];
    /**Guardar imagenes */
    if (isset($_FILES['logo_1'])) {
      $file = $_FILES['logo_1'];
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
      if(!is_dir("../assets/image/logo_instalacion")){
        mkdir("../assets/image/logo_instalacion", 0777);
      }
      // mover archivo a upload
      $name_1 = $_SESSION['dbname'].$filename;
      $rutaLogo = "../assets/image/logo_instalacion/".$name_1;
      move_uploaded_file($file['tmp_name'], $rutaLogo);
    }
    if (isset($_FILES['logo_2'])) {
      $file = $_FILES['logo_2'];
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
      if(!is_dir("../assets/image/logo_instalacion")){
        mkdir("../assets/image/logo_instalacion", 0777);
      }
      // mover archivo a upload
      $name_2 = $_SESSION['dbname'].$filename;
      $rutaLogo = "../assets/image/logo_instalacion/".$name_2;
      move_uploaded_file($file['tmp_name'], $rutaLogo);
    }
    /**Fin de guardar imagenes */
    /** Guardar CDT */
    if (isset($_FILES['cdt'])) {
      $file = $_FILES['cdt'];
      $filename = $file['name'];
      //$mimetype = $file['type'];
      $extension = explode(".", $filename)[1];
      if ($extension == 'pfx') {
        // mover archivo a upload
        $name_cdt = $filename;
        $rutaPlan = "../assets/document/cdt/".$name_cdt;
        move_uploaded_file($file['tmp_name'], $rutaPlan);
      } else {
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'por favor, selecciona un archivo pdf'
        ];
        return json_encode($respuesta);
      }
    }
    /** Fin de guardar CDT */
    /**Guardar datos de formulario */
    if (isset($_POST)) {
      $id_insta = isset($_POST['id_instalacion']) ? $_POST['id_instalacion'] : false;
      $tipo_sistema = isset($_POST['tipo_sistema']) ? $_POST['tipo_sistema'] : false;
      $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
      $dominioPos = isset($_POST['dominioPos']) ? $_POST['dominioPos'] : '';
      $dominioFactura = isset($_POST['dominioFactura']) ? $_POST['dominioFactura'] : '';
      $dominioRestobar = isset($_POST['dominioRestobar']) ? $_POST['dominioRestobar'] : '';
      $cliente = isset($_POST['cliente']) ? $_POST['cliente'] : false;
      $dni = isset($_POST['dni']) ? $_POST['dni'] : false;
      $razonSocial = isset($_POST['razonSocial']) ? $_POST['razonSocial'] : false;
      $name_comercial = isset($_POST['name_comercial']) ? $_POST['name_comercial'] : false;
      $ruc = isset($_POST['ruc']) ? $_POST['ruc'] : false;
      $tipo_negocio = isset($_POST['tipo_negocio']) ? $_POST['tipo_negocio'] : false;
      $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
      $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
      $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
      $direc_fiscal = isset($_POST['direc_fiscal']) ? $_POST['direc_fiscal'] : false;
      $serie_compro = isset($_POST['serie_compro']) ? $_POST['serie_compro'] : false;
      $especificacion = isset($_POST['especificacion']) ? $_POST['especificacion'] : false;
      $observacion = isset($_POST['observacion']) ? $_POST['observacion'] : false;
      $persona_contacto = isset($_POST['persona_contacto']) ? $_POST['persona_contacto'] : '';
      $cel_contacto = isset($_POST['cel_contacto']) ? $_POST['cel_contacto'] : '';
      $equipo_principal = isset($_POST['equipo_principal']) ? $_POST['equipo_principal'] : '';
      $equipo_cocina = isset($_POST['equipo_cocina']) ? $_POST['equipo_cocina'] : '';
      $equipo_bar = isset($_POST['equipo_bar']) ? $_POST['equipo_bar'] : '';
      $total_impresoras = isset($_POST['total_impresoras']) ? $_POST['total_impresoras'] : '';
      $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
      $clave_sol = isset($_POST['clave_sol']) ? $_POST['clave_sol'] : '';
      $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
      $logo_1 = isset($name_1) ? $name_1 : false;
      $logo_2 = isset($name_2) ? $name_2 : false;
      $cdt = isset($name_cdt) ? $name_cdt : false;
      $clave_cdt = isset($_POST['clave_cdt']) ? $_POST['clave_cdt'] : '';
      $usuario_sec = isset($_POST['usuario_sec']) ? $_POST['usuario_sec'] : '';
      $clave_sec = isset($_POST['clave_sec']) ? $_POST['clave_sec'] : '';
      if($id_insta && $titulo && $tipo_sistema && $cliente && $dni && $razonSocial && $name_comercial && $ruc && $tipo_negocio && $direc_fiscal && $serie_compro && $especificacion && $observacion && $fecha){
        $instalacion = new Instalaciones();
        $agendar = $instalacion->editarPrograInsta($id_insta, $tipo_sistema, $titulo, $dominioPos, $dominioFactura, $dominioRestobar, $cliente, $dni, $razonSocial, $name_comercial, $ruc, $tipo_negocio, $celular, $telefono, $correo, $direc_fiscal, $serie_compro, $especificacion, $observacion, $persona_contacto, $cel_contacto, $equipo_principal, $equipo_cocina, $equipo_bar, $total_impresoras, $usuario, $clave_sol, $logo_1, $logo_2, $cdt, $fecha, $clave_cdt, $usuario_sec, $clave_sec);
        if($agendar == '1'){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se actualiza los datos correctamente.'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta, comuniquese con soporte por favor.'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta recibiendo los datos minimos, comuniquese con soporte por favor.'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al enviar los datos. No existe POST, comuniquese con soporte por favor.'
      ];
    }
    return json_encode($respuesta);
  }
  public function reenviarSolicInsta()
  {
    $respuesta = [];
    /**Guardar imagenes */
    if (isset($_FILES['logo_1'])) {
      $file = $_FILES['logo_1'];
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
      if(!is_dir("../assets/image/logo_instalacion")){
        mkdir("../assets/image/logo_instalacion", 0777);
      }
      // mover archivo a upload
      $name_1 = $_SESSION['dbname'].$filename;
      $rutaLogo = "../assets/image/logo_instalacion/".$name_1;
      move_uploaded_file($file['tmp_name'], $rutaLogo);
    }
    if (isset($_FILES['logo_2'])) {
      $file = $_FILES['logo_2'];
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
      if(!is_dir("../assets/image/logo_instalacion")){
        mkdir("../assets/image/logo_instalacion", 0777);
      }
      // mover archivo a upload
      $name_2 = $_SESSION['dbname'].$filename;
      $rutaLogo = "../assets/image/logo_instalacion/".$name_2;
      move_uploaded_file($file['tmp_name'], $rutaLogo);
    }
    /**Fin de guardar imagenes */
    /**Guardar datos de formulario */
    if (isset($_POST)) {
      $id_insta = isset($_POST['id_instalacion']) ? $_POST['id_instalacion'] : false;
      $tipo_sistema = isset($_POST['tipo_sistema']) ? $_POST['tipo_sistema'] : false;
      $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
      $dominioPos = isset($_POST['dominioPos']) ? $_POST['dominioPos'] : '';
      $dominioFactura = isset($_POST['dominioFactura']) ? $_POST['dominioFactura'] : '';
      $dominioRestobar = isset($_POST['dominioRestobar']) ? $_POST['dominioRestobar'] : '';
      $cliente = isset($_POST['cliente']) ? $_POST['cliente'] : false;
      $dni = isset($_POST['dni']) ? $_POST['dni'] : false;
      $razonSocial = isset($_POST['razonSocial']) ? $_POST['razonSocial'] : false;
      $name_comercial = isset($_POST['name_comercial']) ? $_POST['name_comercial'] : false;
      $ruc = isset($_POST['ruc']) ? $_POST['ruc'] : false;
      $tipo_negocio = isset($_POST['tipo_negocio']) ? $_POST['tipo_negocio'] : false;
      $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
      $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
      $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
      $direc_fiscal = isset($_POST['direc_fiscal']) ? $_POST['direc_fiscal'] : false;
      $serie_compro = isset($_POST['serie_compro']) ? $_POST['serie_compro'] : false;
      $especificacion = isset($_POST['especificacion']) ? $_POST['especificacion'] : false;
      $observacion = isset($_POST['observacion']) ? $_POST['observacion'] : false;
      $persona_contacto = isset($_POST['persona_contacto']) ? $_POST['persona_contacto'] : '';
      $cel_contacto = isset($_POST['cel_contacto']) ? $_POST['cel_contacto'] : '';
      $equipo_principal = isset($_POST['equipo_principal']) ? $_POST['equipo_principal'] : '';
      $equipo_cocina = isset($_POST['equipo_cocina']) ? $_POST['equipo_cocina'] : '';
      $equipo_bar = isset($_POST['equipo_bar']) ? $_POST['equipo_bar'] : '';
      $total_impresoras = isset($_POST['total_impresoras']) ? $_POST['total_impresoras'] : '';
      $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
      $clave_sol = isset($_POST['clave_sol']) ? $_POST['clave_sol'] : '';
      $logo_1 = isset($name_1) ? $name_1 : false;
      $logo_2 = isset($name_2) ? $name_2 : false;
      if($id_insta && $titulo && $tipo_sistema && $cliente && $dni && $razonSocial && $name_comercial && $ruc && $tipo_negocio && $direc_fiscal && $serie_compro && $especificacion && $observacion){
        $instalacion = new Instalaciones();
        $agendar = $instalacion->reenviarSolicInsta($id_insta, $tipo_sistema, $titulo, $dominioPos, $dominioFactura, $dominioRestobar, $cliente, $dni, $razonSocial, $name_comercial, $ruc, $tipo_negocio, $celular, $telefono, $correo, $direc_fiscal, $serie_compro, $especificacion, $observacion, $persona_contacto, $cel_contacto, $equipo_principal, $equipo_cocina, $equipo_bar, $total_impresoras, $usuario, $clave_sol, $logo_1, $logo_2);
        if($agendar == '1'){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se volvio a enviar la solicitud. Espera que lo confirmen.'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta, comuniquese con soporte por favor.'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta recibiendo los datos minimos, comuniquese con soporte por favor.'
        ];
      }
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al enviar los datos. No existe POST, comuniquese con soporte por favor.'
      ];
    }
    return json_encode($respuesta);
  }
  public function culminar()
  {
    $inst_obj = new Instalaciones();
    $id_insta = isset($_POST['id_insta']) ? $_POST['id_insta'] : false;
    $msj_final = isset($_POST['msj_final']) ? $_POST['msj_final'] : false;
    if ($id_insta && $msj_final) {
      $categoriaInhabilitado = $inst_obj->culminar($id_insta, $msj_final);
      if ($categoriaInhabilitado) {
        $respuesta = [
          'estado' => 'ok',
          'mensaje' => 'Se ha confirmado la instalacion'
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
        'mensaje' => 'No se esta recibiendo los datos correctamente'
      ];
    }
    return json_encode($respuesta);
  }
  public function descargarCDT(){
    $respuesta = [];
    if(isset($_GET)){
      $cdt = isset($_GET['cdt']) ? $_GET['cdt'] : false;
      if($cdt){
        $fileName = basename($cdt);
        $filePath = '../assets/document/cdt/'.$fileName;
        if(!empty($fileName) && file_exists($filePath)){
          // Define headers
          header("Cache-Control: public");
          header("Content-Description: File Transfer");
          header("Content-Disposition: attachment; filename=$fileName");
          header("Content-Type: MIME");
          header("Content-Transfer-Encoding: binary");

          // Read the file
          readfile($filePath);
          exit;
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'No se encuentra el archivo que esta buscando'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta recibiendo los datos correctamente'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'No hay conexion al servidor, comuniquese con soporte'
      ];
    }
    return json_encode($respuesta);
  }
  public function rechazarAltaSistemas(){
    $respuesta = [];
    if(isset($_POST)){
      $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : false;
      $id_insta = isset($_POST['id_insta']) ? $_POST['id_insta'] : false;
      if($motivo && $id_insta){
        $inst_obj = new Instalaciones();
        $rechazar = $inst_obj->rechazarAltaSistemas($motivo, $id_insta);
        if($rechazar == '1'){
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Se rechazo la solicitd de instalacion de sistema'
          ];
        }else{
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al realizar la consulta al BD. Comuniquese con soporte por favor'
          ];
        }
      }else{
        $respuesta = [
          'estado' => 'failed',
          'mensaje' => 'No se esta recibiendo el valor del motivo. Por favor comuniquese con soporte en caso los campos esten llenos'
        ];
      }
    }else{
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al comunicarse con el servidor'
      ];
    }
    return json_encode($respuesta);
  }}

$categoria = new InstalacionController();
if(isset($_SESSION['identity'])){
  if ($_GET['method'] == 'altaSistemas') {
    $categoria->index();
  }
  elseif ($_GET['method'] == 'agendar') {
    echo ($categoria->agendar());
  }
  elseif ($_GET['method'] == 'instalaciones') {
    echo ($categoria->instalacionesView());
  }
  elseif ($_GET['method'] == 'listarInstalaciones') {
    echo ($categoria->listarInstalaciones());
  }
  elseif ($_GET['method'] == 'editarPrograInsta') {
    echo ($categoria->editarPrograInsta());
  }
  elseif ($_GET['method'] == 'porInstalar') {
    echo ($categoria->porInstalar());
  }
  elseif ($_GET['method'] == 'instalacionesRealizadas') {
    echo ($categoria->instalacionesRealizadasView());
  }
  elseif ($_GET['method'] == 'listarInstalacionesRealizadas') {
    echo ($categoria->listarInstalacionesRealizadas());
  }
  elseif ($_GET['method'] == 'instalacionesPendientes') {
    echo ($categoria->instalacionesPendientes());
  }
  elseif ($_GET['method'] == 'culminar') {
    echo ($categoria->culminar());
  }
  elseif ($_GET['method'] == 'descargarCDT') {
    echo ($categoria->descargarCDT());
  }
  elseif ($_GET['method'] == 'rechazarAltaSistema') {
    echo ($categoria->rechazarAltaSistemas());
  }
  elseif ($_GET['method'] == 'misSolicInsta') {
    echo ($categoria->misSolicInstaView());
  }
  elseif ($_GET['method'] == 'listarMisSolicInsta') {
    echo ($categoria->listarMisSolicInsta());
  }
  elseif ($_GET['method'] == 'reenviarSolicInsta') {
    echo ($categoria->reenviarSolicInsta());
  }
}else{
  header("Location:../views/sinSesion.php");
}

