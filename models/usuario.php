<?php

require_once "../config/db.php";

class Usuario
{
  private $email;
  private $password;
  //Conexion base de datos
  private $db;
  public function __construct()
  {
    $this->db = Database::connect($_SESSION['dbname']); //$_SESSION['dbname']
  }
  /* ##### METODOS ###### */
  public function save($nombres, $apellidos, $tipoDoc, $nroDoc, $celular, $email, $direccion, $rol, $password, $sucursal)
  {
    $result = false;
    $sql_verificar_email_existente = "SELECT * FROM `usuarios` WHERE email = '$email'";
    $consulta_existe = $this->db->query($sql_verificar_email_existente);
    $existe = $consulta_existe->fetch_assoc();
    if(is_null($existe)){
      $sql = "INSERT INTO `usuarios`(`idUsuario`, `nombre`, `apellido`, `idTipoDocumento`, `nroDocumento`, `celular`, `direccion`, `idRol`, `email`, `contrasena`, `imagen`, `idSucursal`) VALUES (NULL,'$nombres','$apellidos','$tipoDoc','$nroDoc','$celular','$direccion','$rol','$email','$password', NULL, '$sucursal')";
      $save = $this->db->query($sql);
      if ($save) {
        $idUsuarioRegistrado = "SELECT idUsuario, idRol FROM usuarios WHERE nroDocumento = '$nroDoc' and	nombre = '$nombres'";
        $consultar = $this->db->query($idUsuarioRegistrado);
        $usuario = $consultar->fetch_assoc();
        $idRol = $usuario['idRol'];
        $idUsuarioPermiso = $usuario['idUsuario'];
        switch ($idRol){
          case 1 : case '1' :
          $consultaPermisos = "INSERT INTO `usuarios_permisos`(`idUsuario`, `idPermiso`) VALUES ('$idUsuarioPermiso','1'), ('$idUsuarioPermiso','2'), ('$idUsuarioPermiso','3'),('$idUsuarioPermiso','4'), ('$idUsuarioPermiso','5'), ('$idUsuarioPermiso','6'), ('$idUsuarioPermiso','7'), ('$idUsuarioPermiso','8'), ('$idUsuarioPermiso','9'), ('$idUsuarioPermiso','10'), ('$idUsuarioPermiso','11'), ('$idUsuarioPermiso','12'),('$idUsuarioPermiso','13'),('$idUsuarioPermiso','14'),('$idUsuarioPermiso','15'),('$idUsuarioPermiso','16'),('$idUsuarioPermiso','17'),('$idUsuarioPermiso','18'),('$idUsuarioPermiso','19'),('$idUsuarioPermiso','20'),('$idUsuarioPermiso','21'),('$idUsuarioPermiso','22'),('$idUsuarioPermiso','23'),('$idUsuarioPermiso','24'),('$idUsuarioPermiso','25'),('$idUsuarioPermiso','26'),('$idUsuarioPermiso','27'),('$idUsuarioPermiso','28'),('$idUsuarioPermiso','29'),('$idUsuarioPermiso','30');";
          break;
          case 2 : case '2' :
          $consultaPermisos = "INSERT INTO `usuarios_permisos`(`idUsuario`, `idPermiso`, `estado`) VALUES ('$idUsuarioPermiso','1', 'inhabilitado'), ('$idUsuarioPermiso','2', 'inhabilitado'), ('$idUsuarioPermiso','3', 'inhabilitado'), ('$idUsuarioPermiso','4','activo'), ('$idUsuarioPermiso','5', 'inhabilitado'), ('$idUsuarioPermiso','6', 'inhabilitado'), ('$idUsuarioPermiso','7', 'inhabilitado'), ('$idUsuarioPermiso','8', 'inhabilitado'), ('$idUsuarioPermiso','9', 'inhabilitado'), ('$idUsuarioPermiso','10','activo'), ('$idUsuarioPermiso','11','activo'), ('$idUsuarioPermiso','12','activo'), ('$idUsuarioPermiso','13','activo'), ('$idUsuarioPermiso','14','activo'), ('$idUsuarioPermiso','15', 'inhabilitado'), ('$idUsuarioPermiso','16', 'inhabilitado'), ('$idUsuarioPermiso','17', 'inhabilitado'), ('$idUsuarioPermiso','18', 'inhabilitado'), ('$idUsuarioPermiso','19', 'inhabilitado'), ('$idUsuarioPermiso','20', 'inhabilitado'), ('$idUsuarioPermiso','21', 'inhabilitado'), ('$idUsuarioPermiso','22', 'inhabilitado'), ('$idUsuarioPermiso','23', 'inhabilitado'), ('$idUsuarioPermiso','24', 'inhabilitado'), ('$idUsuarioPermiso','25', 'inhabilitado'), ('$idUsuarioPermiso','26', 'inhabilitado'), ('$idUsuarioPermiso','27', 'inhabilitado'), ('$idUsuarioPermiso','28', 'inhabilitado'), ('$idUsuarioPermiso','29', 'inhabilitado'), ('$idUsuarioPermiso','30', 'activo');";
          break;
          case 3 : case '3' :
          $consultaPermisos = "INSERT INTO `usuarios_permisos`(`idUsuario`, `idPermiso`, `estado`) VALUES ('$idUsuarioPermiso','1','inhabilitado'), ('$idUsuarioPermiso','2','inhabilitado'), ('$idUsuarioPermiso','3','inhabilitado'), ('$idUsuarioPermiso','4','inhabilitado'), ('$idUsuarioPermiso','5','inhabilitado'), ('$idUsuarioPermiso','6','inhabilitado'), ('$idUsuarioPermiso','7','inhabilitado'), ('$idUsuarioPermiso','8','inhabilitado'), ('$idUsuarioPermiso','9','inhabilitado'), ('$idUsuarioPermiso','10','inhabilitado'), ('$idUsuarioPermiso','11','inhabilitado'), ('$idUsuarioPermiso','12','inhabilitado'), ('$idUsuarioPermiso','13','inhabilitado'), ('$idUsuarioPermiso','14','inhabilitado'), ('$idUsuarioPermiso','15','inhabilitado'), ('$idUsuarioPermiso','16','inhabilitado'), ('$idUsuarioPermiso','17','inhabilitado'), ('$idUsuarioPermiso','18','inhabilitado'), ('$idUsuarioPermiso','19','inhabilitado'), ('$idUsuarioPermiso','20','inhabilitado'),('$idUsuarioPermiso','21','inhabilitado'), ('$idUsuarioPermiso','22','activo'), ('$idUsuarioPermiso','23','activo'), ('$idUsuarioPermiso','24','activo'), ('$idUsuarioPermiso','25','inhabilitado'), ('$idUsuarioPermiso','26','inhabilitado'), ('$idUsuarioPermiso','27', 'activo'), ('$idUsuarioPermiso','28', 'inhabilitado'), ('$idUsuarioPermiso','29', 'inhabilitado'), ('$idUsuarioPermiso','30', 'inhabilitado');";
          break;
          case 4 : case '4' :
          $consultaPermisos = "INSERT INTO `usuarios_permisos`(`idUsuario`, `idPermiso`, `estado`) VALUES ('$idUsuarioPermiso','1','inhabilitado'), ('$idUsuarioPermiso','2','activo'),('$idUsuarioPermiso','3','inhabilitado'), ('$idUsuarioPermiso','4','activo'),('$idUsuarioPermiso','5','activo'), ('$idUsuarioPermiso','6','activo'),('$idUsuarioPermiso','7','activo'), ('$idUsuarioPermiso','8','activo'), ('$idUsuarioPermiso','9','activo'), ('$idUsuarioPermiso','10','activo'), ('$idUsuarioPermiso','11','activo'),('$idUsuarioPermiso','12','activo'), ('$idUsuarioPermiso','13','activo'), ('$idUsuarioPermiso','14','activo'), ('$idUsuarioPermiso','15','activo'),('$idUsuarioPermiso','16','activo'), ('$idUsuarioPermiso','17','inhabilitado'), ('$idUsuarioPermiso','18','inhabilitado'), ('$idUsuarioPermiso','19','inhabilitado'), ('$idUsuarioPermiso','20','inhabilitado'), ('$idUsuarioPermiso','21','inhabilitado'), ('$idUsuarioPermiso','22','inhabilitado'), ('$idUsuarioPermiso','23','inhabilitado'), ('$idUsuarioPermiso','24','inhabilitado'), ('$idUsuarioPermiso','25','inhabilitado'), ('$idUsuarioPermiso','26','inhabilitado'), ('$idUsuarioPermiso','27', 'inhabilitado'), ('$idUsuarioPermiso','28', 'activo'), ('$idUsuarioPermiso','29', 'activo'), ('$idUsuarioPermiso','30', 'activo');";
          break;
          case 5 : case '5' :
          $consultaPermisos = "INSERT INTO `usuarios_permisos`(`idUsuario`, `idPermiso`, `estado`) VALUES ('$idUsuarioPermiso','1','activo'), ('$idUsuarioPermiso','2','inhabilitado'), ('$idUsuarioPermiso','3','inhabilitado'), ('$idUsuarioPermiso','4','activo'), ('$idUsuarioPermiso','5','activo'), ('$idUsuarioPermiso','6','activo'), ('$idUsuarioPermiso','7','activo'), ('$idUsuarioPermiso','8','activo'), ('$idUsuarioPermiso','9','activo'), ('$idUsuarioPermiso','10','inhabilitado'), ('$idUsuarioPermiso','11','inhabilitado'), ('$idUsuarioPermiso','12','inhabilitado'), ('$idUsuarioPermiso','13','inhabilitado'), ('$idUsuarioPermiso','14','inhabilitado'), ('$idUsuarioPermiso','15','inhabilitado'), ('$idUsuarioPermiso','16','inhabilitado'), ('$idUsuarioPermiso','17','inhabilitado'), ('$idUsuarioPermiso','18','inhabilitado'), ('$idUsuarioPermiso','19','inhabilitado'), ('$idUsuarioPermiso','20','inhabilitado'), ('$idUsuarioPermiso','21','inhabilitado'), ('$idUsuarioPermiso','22','activo'), ('$idUsuarioPermiso','23','activo'), ('$idUsuarioPermiso','24','activo'), ('$idUsuarioPermiso','25','inhabilitado'), ('$idUsuarioPermiso','26','inhabilitado'), ('$idUsuarioPermiso','27','activo'), ('$idUsuarioPermiso','28','inhabilitado'), ('$idUsuarioPermiso','29','inhabilitado'), ('$idUsuarioPermiso','30','activo');";
          break;
          case 6 : case '6' :
          $consultaPermisos = "INSERT INTO `usuarios_permisos`(`idUsuario`, `idPermiso`, `estado`) VALUES ('$idUsuarioPermiso','1','inhabilitado'), ('$idUsuarioPermiso','2','inhabilitado'), ('$idUsuarioPermiso','3','inhabilitado'), ('$idUsuarioPermiso','4','activo'), ('$idUsuarioPermiso','5','inhabilitado'), ('$idUsuarioPermiso','6','inhabilitado'), ('$idUsuarioPermiso','7','inhabilitado'), ('$idUsuarioPermiso','8','inhabilitado'), ('$idUsuarioPermiso','9','inhabilitado'), ('$idUsuarioPermiso','10','inhabilitado'), ('$idUsuarioPermiso','11','inhabilitado'), ('$idUsuarioPermiso','12','activo'), ('$idUsuarioPermiso','13','inhabilitado'), ('$idUsuarioPermiso','14','activo'), ('$idUsuarioPermiso','15','inhabilitado'), ('$idUsuarioPermiso','16','inhabilitado'), ('$idUsuarioPermiso','17','inhabilitado'), ('$idUsuarioPermiso','18','inhabilitado'), ('$idUsuarioPermiso','19','inhabilitado'), ('$idUsuarioPermiso','20','inhabilitado'), ('$idUsuarioPermiso','21','inhabilitado'), ('$idUsuarioPermiso','22','inhabilitado'), ('$idUsuarioPermiso','23','inhabilitado'), ('$idUsuarioPermiso','24','inhabilitado'), ('$idUsuarioPermiso','25','activo'), ('$idUsuarioPermiso','26','activo'), ('$idUsuarioPermiso','27','inhabilitado'), ('$idUsuarioPermiso','28','activo'), ('$idUsuarioPermiso','29','activo'), ('$idUsuarioPermiso','30','inhabilitado'); ";
          break;
          case 7 : case '7' :
          $consultaPermisos = "INSERT INTO `usuarios_permisos`(`idUsuario`, `idPermiso`, `estado`) VALUES ('$idUsuarioPermiso','1','inhabilitado'), ('$idUsuarioPermiso','2','inhabilitado'), ('$idUsuarioPermiso','3','activo'), ('$idUsuarioPermiso','4','inhabilitado'), ('$idUsuarioPermiso','5','inhabilitado'), ('$idUsuarioPermiso','6','inhabilitado'), ('$idUsuarioPermiso','7','inhabilitado'), ('$idUsuarioPermiso','8','inhabilitado'), ('$idUsuarioPermiso','9','inhabilitado'), ('$idUsuarioPermiso','10','inhabilitado'), ('$idUsuarioPermiso','11','inhabilitado'), ('$idUsuarioPermiso','12','inhabilitado'), ('$idUsuarioPermiso','13','inhabilitado'), ('$idUsuarioPermiso','14','inhabilitado'), ('$idUsuarioPermiso','15','inhabilitado'), ('$idUsuarioPermiso','16','inhabilitado'), ('$idUsuarioPermiso','17','inhabilitado'), ('$idUsuarioPermiso','18','inhabilitado'), ('$idUsuarioPermiso','19','inhabilitado'), ('$idUsuarioPermiso','20','inhabilitado'), ('$idUsuarioPermiso','21','inhabilitado'), ('$idUsuarioPermiso','22','inhabilitado'), ('$idUsuarioPermiso','23','inhabilitado'), ('$idUsuarioPermiso','24','inhabilitado'), ('$idUsuarioPermiso','25','activo'), ('$idUsuarioPermiso','26','activo'), ('$idUsuarioPermiso','27','inhabilitado'), ('$idUsuarioPermiso','28','activo'), ('$idUsuarioPermiso','29','activo'), ('$idUsuarioPermiso','30','activo');";
          break;
          default :
            $consultaPermisos = "INSERT INTO `usuarios_permisos`(`idUsuario`, `idPermiso`, `estado`) VALUES ('$idUsuarioPermiso','1','inhabilitado'), ('$idUsuarioPermiso','2','inhabilitado'), ('$idUsuarioPermiso','3','inhabilitado'), ('$idUsuarioPermiso','4','inhabilitado'), ('$idUsuarioPermiso','5','inhabilitado'), ('$idUsuarioPermiso','6','inhabilitado'), ('$idUsuarioPermiso','7','inhabilitado'), ('$idUsuarioPermiso','8','inhabilitado'), ('$idUsuarioPermiso','9','inhabilitado'), ('$idUsuarioPermiso','10','inhabilitado'), ('$idUsuarioPermiso','11','inhabilitado'), ('$idUsuarioPermiso','12','inhabilitado'), ('$idUsuarioPermiso','13','inhabilitado'), ('$idUsuarioPermiso','14','inhabilitado'), ('$idUsuarioPermiso','15','inhabilitado'), ('$idUsuarioPermiso','16','inhabilitado'), ('$idUsuarioPermiso','17','inhabilitado'), ('$idUsuarioPermiso','18','inhabilitado'), ('$idUsuarioPermiso','19','inhabilitado'), ('$idUsuarioPermiso','20','inhabilitado'), ('$idUsuarioPermiso','21','inhabilitado'), ('$idUsuarioPermiso','22','inhabilitado'), ('$idUsuarioPermiso','23','inhabilitado'), ('$idUsuarioPermiso','24','inhabilitado'), ('$idUsuarioPermiso','25','inhabilitado'), ('$idUsuarioPermiso','26','inhabilitado'), ('$idUsuarioPermiso','27','inhabilitado'), ('$idUsuarioPermiso','28','inhabilitado'), ('$idUsuarioPermiso','29','inhabilitado'), ('$idUsuarioPermiso','30','inhabilitado');";
            break;
        };
        $consultar2 = $this->db->query($consultaPermisos);

        if($consultar2){
          $result = "realizado";
        }
      }else{
        return  $result;
      }
    }else{
      $result = "existe";
    }
    return $result;
  }
  public function login($email, $password)
  {
    $result = false;
    // Comprobar si existe el usuario
    $sql = "SELECT usuarios.idUsuario, usuarios.nombre, usuarios.apellido, roles.nombre as rol, roles.codRol, tipo_documentos.aliasTipoDoc AS 'documento', usuarios.nroDocumento, usuarios.celular, usuarios.direccion, usuarios.email, usuarios.contrasena, usuarios.estado, usuarios.idSucursal 
		FROM `usuarios`, roles, tipo_documentos, sucursales 
		WHERE usuarios.idRol = roles.idRol AND usuarios.idSucursal = sucursales.idSucursal AND usuarios.idTipoDocumento = tipo_documentos.idTipoDocumento AND usuarios.email='$email'";
    $login = $this->db->query($sql);
    if ($login && $login->num_rows == 1) {
      $usuario = $login->fetch_object();
      // Verificar la contraseña
      $verify = password_verify($password, $usuario->contrasena);
      if ($verify) {
        $result = $usuario;
      }
    }
    return $result;
  }
  public function listarPermisos($id){
    $sql_permisos = "SELECT permisos.codPermiso as'cod', usuarios_permisos.estado FROM permisos, usuarios_permisos WHERE idUsuario = '$id' AND usuarios_permisos.idPermiso = permisos.idPermiso";
    $listar = $this->db->query($sql_permisos);
    $permisos = $listar->fetch_all(MYSQLI_ASSOC);
    return $permisos;
  }
  public function listarUsuarios()
  {
    $usuarios = [];
    $consulta = "SELECT usuarios.idUsuario, concat_ws(', ',usuarios.nombre, usuarios.apellido) AS 'nombreApellido', usuarios.nombre, usuarios.apellido, usuarios.idRol, roles.nombre as rol, tipo_documentos.aliasTipoDoc AS 'documento', usuarios.nroDocumento, usuarios.celular, usuarios.direccion, usuarios.email, sucursales.nombre AS 'sucursal', usuarios.idSucursal, usuarios.contrasena, usuarios.estado FROM `usuarios`, roles, tipo_documentos, sucursales WHERE usuarios.idRol = roles.idRol AND usuarios.idTipoDocumento = tipo_documentos.idTipoDocumento AND usuarios.idSucursal = sucursales.idSucursal AND usuarios.estado='activo' ORDER BY sucursales.nombre DESC";
    $consultar = $this->db->query($consulta);
    $usuarios = $consultar->fetch_all(MYSQLI_ASSOC);
    return $usuarios;
  }
  public function editarUsuario($idUsuario, $nombres, $apellidos, $tipoDoc, $nroDoc, $celular, $email, $direccion, $rol, $password)
  {
    $result = false;
    $consulta1 = "SELECT contrasena FROM usuarios where	idUsuario = $idUsuario";
    $query = $this->db->query($consulta1);
    $user = $query->fetch_object();
    if ($password == $user->contrasena) {
      $result = true;
    };
    if ($result) {
      // En caso sea la misma contraseña
      $consulta2 = "UPDATE `usuarios` SET `nombre`='$nombres',`apellido`='$apellidos',`idTipoDocumento`=$tipoDoc,`nroDocumento`='$nroDoc',`celular`=$celular,`direccion`='$direccion',`idRol`=$rol,`email`='$email' WHERE idUsuario = $idUsuario";
    } else {
      // En caso sea diferentes contraseñas
      $passwordHasheado = password_hash($password, PASSWORD_DEFAULT);
      $consulta2 = "UPDATE `usuarios` SET `nombre`='$nombres',`apellido`='$apellidos',`idTipoDocumento`=$tipoDoc,`nroDocumento`='$nroDoc',`celular`=$celular,`direccion`='$direccion',`idRol`=$rol,`email`='$email',`contrasena`='$passwordHasheado' WHERE idUsuario = $idUsuario";
    }
    $query = $this->db->query($consulta2);
    return $query;
  }
  public function inhabilitarUsuario($idUsuario)
  {
    $consulta = "UPDATE `usuarios` SET `estado`='inhabilitado' WHERE idUsuario = $idUsuario";
    $query = $this->db->query($consulta);
    return $query;
  }
  public function habilitarUsuario($idUsuario)
  {
    $consulta = "UPDATE `usuarios` SET `estado`='activo' WHERE idUsuario = $idUsuario";
    $query = $this->db->query($consulta);
    return $query;
  }
  public function listarRoles()
  {
    $roles = [];
    $consulta = "SELECT * FROM `roles` WHERE estado='activo'";
    $consultar = $this->db->query($consulta);
    $roles = $consultar->fetch_all(MYSQLI_ASSOC);
    return $roles;
  }
  public function obtenerRol(){
    $idusuario = $_SESSION['identity']->{'idUsuario'};
    $consulta = "SELECT r.nombre as 'rol' FROM usuarios as u, roles as r WHERE u.idRol = r.idRol AND u.idUsuario = $idusuario";
    $consultar = $this->db->query($consulta);
    $rol = $consultar->fetch_all(MYSQLI_ASSOC)[0];
    return $rol;
  }
  public function consultarPendientes($rol){
    $pendientes = [];
    if($rol == 'SO'){
      $pendientes = $this->listarPendientesSoporte();
    }elseif($rol == 'VEN'){
      $pendientes = $this->listarPendientesSoporte();
    }elseif($rol == 'CA'){
      $pendientes = $this->listarPendientesSoporte();
    }else{
      $pendientes = $this->listarPendientesSoporte();
    }
    return $pendientes;
  }
  public function listarPendientesSoporte(){
    $fecha = date('Y-m');
    $sql_tickets = "SELECT COUNT(idTicket) as 'ticketsPendientes' FROM `tickets_soporte` WHERE idEstado = 1 AND fechaRegistro LIKE '%$fecha%'";
    $sql_instalaciones = "SELECT COUNT(id) as 'instalacionesPendientes' FROM `agendar_instalaciones` WHERE estado LIKE 'revisado' AND fecha_instalacion LIKE '%$fecha%'";
    $sql_suspenciones = "SELECT COUNT(idClienteServicio) as 'suspenciones' FROM `clientes_servicios` WHERE estadoClienteServicio = 'porSuspender'";
    $sql_eliminaciones = "SELECT COUNT(idClienteServicio) as 'eliminaciones' FROM `clientes_servicios` WHERE estadoClienteServicio = 'porEliminar'";

    $query_tickets = $this->db->query($sql_tickets);
    $query_instalaciones = $this->db->query($sql_instalaciones);
    $query_suspenciones = $this->db->query($sql_suspenciones);
    $query_eliminaciones = $this->db->query($sql_eliminaciones);

    $tickets = $query_tickets->fetch_all(MYSQLI_ASSOC)[0];
    $instalaciones = $query_instalaciones->fetch_all(MYSQLI_ASSOC)[0];
    $suspenciones = $query_suspenciones->fetch_all(MYSQLI_ASSOC)[0];
    $eliminaciones = $query_eliminaciones->fetch_all(MYSQLI_ASSOC)[0];

    $pendientes = [
      'tickets' => $tickets['ticketsPendientes'],
      'instalaciones' => $instalaciones['instalacionesPendientes'],
      'suspenciones' => $suspenciones['suspenciones'],
      'bajas' => $eliminaciones['eliminaciones']
    ];
    return $pendientes;
  }

}