<?php
session_start();
require_once "../models/usuario.php";

class UsuarioController
{
  public function index()
  {
    if (isset($_SESSION['title'])) {
      $_SESSION['title'] = 'Usuarios';
    }
    require_once "../views/usuario/index.php";
  }

  public function guardarUsuario()
  {
    $respuesta = [];
    if (isset($_POST)) {
      $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : false;
      $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
      $tipoDoc = isset($_POST['tipoDoc']) ? $_POST['tipoDoc'] : false;
      $nroDoc = isset($_POST['nroDoc']) ? $_POST['nroDoc'] : false;
      $celular = isset($_POST['celular']) ? $_POST['celular'] : false;
      $email = isset($_POST['email']) ? $_POST['email'] : false;
      $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
      $rol = isset($_POST['rol']) ? $_POST['rol'] : false;
      $sucursal = isset($_POST['sucursal']) ? $_POST['sucursal'] : false;
      $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : false;
      if ($nombres && $apellidos && $tipoDoc && $nroDoc && $celular && $email && $direccion && $rol && $password) {
        $usuario = new Usuario();
        $save = $usuario->save($nombres, $apellidos, $tipoDoc, $nroDoc, $celular, $email, $direccion, $rol, $password, $sucursal);
        if ($save == "realizado") {
          $respuesta = [
            'estado' => 'ok',
            'mensaje' => 'Usuario agregado correctamente',
          ];
        } elseif ($save == 'existe') {
          $respuesta = [
            'estado' => 'existeEmail',
            'mensaje' => 'El email ya ha sido registrado anteriormente',
          ];
        } else {
          $respuesta = [
            'estado' => 'failed',
            'mensaje' => 'Error al registrar usuario, intentelo mas tarde',
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

  public function listarUsuarios()
  {
    $indice = 1;
    $usuario = new Usuario();
    $usuarios = $usuario->listarUsuarios();
    foreach ($usuarios as $key => $value) {
      $json['data'][$key] = $value;
    }
    for ($i = 0; $i < count($json['data']); $i++) {
      $json['data'][$i]['indice'] = $indice;
      $indice++;
    }
    $jsonString = json_encode($json);
    return $jsonString;
  }

  public function editarUsuario()
  {
    // RECOGER LOS DATOS
    $usuario = new Usuario();
    $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : false;
    $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : false;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    $tipoDoc = isset($_POST['tipoDoc']) ? $_POST['tipoDoc'] : false;
    $nroDoc = isset($_POST['nroDoc']) ? $_POST['nroDoc'] : false;
    $celular = isset($_POST['celular']) ? $_POST['celular'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
    $rol = isset($_POST['rol']) ? $_POST['rol'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;
    // ENVIAR DATOS AL MODELO
    $usuario->editarUsuario($idUsuario, $nombres, $apellidos, $tipoDoc, $nroDoc, $celular, $email, $direccion, $rol, $password);
    if ($usuario) {
      $respuesta = [
        'estado' => 'ok',
        'mensaje' => 'Usuario editado correctamente'
      ];
    } else {
      $respuesta = [
        'estado' => 'failed',
        'mensaje' => 'Error al editar usuario, verifique los datos'
      ];
    }
    return json_encode($respuesta);
  }

  public function login()
  {
    if (isset($_POST)) {
      $email = isset($_POST['email']) ? $_POST['email'] : false;
      $password = isset($_POST['password']) ? $_POST['password'] : false;
      if($email && $password){
        $usuario = new Usuario();
        $identity = $usuario->login($email, $password);
        if ($identity && is_object($identity)) {
          $_SESSION['identity'] = $identity;
          $id = $_SESSION['identity']->{'idUsuario'};
          $permisos = $usuario->listarPermisos($id);
          for ($i = 0; $i < count($permisos); $i++) {
            $cod = $permisos[$i]['cod'];
            if ($cod == 'DS') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['DS'] = true;
              } else {
                $_SESSION['DS'] = false;
              }
            }
            if ($cod == 'DC') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['DC'] = true;
              } else {
                $_SESSION['DC'] = false;
              }
            }
            if ($cod == 'DCy') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['DCy'] = true;
              } else {
                $_SESSION['DCy'] = false;
              }
            }
            if ($cod == 'CL') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['CL'] = true;
              } else {
                $_SESSION['CL'] = false;
              }
            }
            if ($cod == 'PS') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['PS'] = true;
              } else {
                $_SESSION['PS'] = false;
              }
            }
            if ($cod == 'CS') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['CS'] = true;
              } else {
                $_SESSION['CS'] = false;
              }
            }
            if ($cod == 'SE') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['SE'] = true;
              } else {
                $_SESSION['SE'] = false;
              }
            }
            if ($cod == 'EP') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['EP'] = true;
              } else {
                $_SESSION['EP'] = false;
              }
            }
            if ($cod == 'PR') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['PR'] = true;
              } else {
                $_SESSION['PR'] = false;
              }
            }
            if ($cod == 'AC') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['AC'] = true;
              } else {
                $_SESSION['AC'] = false;
              }
            }
            if ($cod == 'HC') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['HC'] = true;
              } else {
                $_SESSION['HC'] = false;
              }
            }
            if ($cod == 'CO') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['CO'] = true;
              } else {
                $_SESSION['CO'] = false;
              }
            }
            if ($cod == 'PEN') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['PEN'] = true;
              } else {
                $_SESSION['PEN'] = false;
              }
            }
            if ($cod == 'CSE') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['CSE'] = true;
              } else {
                $_SESSION['CSE'] = false;
              }
            }
            if ($cod == 'TC') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['TC'] = true;
              } else {
                $_SESSION['TC'] = false;
              }
            }
            if ($cod == 'SC') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['SC'] = true;
              } else {
                $_SESSION['SC'] = false;
              }
            }
            if ($cod == 'US') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['US'] = true;
              } else {
                $_SESSION['US'] = false;
              }
            }
            if ($cod == 'CA') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['CA'] = true;
              } else {
                $_SESSION['CA'] = false;
              }
            }
            if ($cod == 'PER') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['PER'] = true;
              } else {
                $_SESSION['PER'] = false;
              }
            }
            if ($cod == 'DE') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['DE'] = true;
              } else {
                $_SESSION['DE'] = false;
              }
            }
            if ($cod == 'SU') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['SU'] = true;
              } else {
                $_SESSION['SU'] = false;
              }
            }
            if ($cod == 'TS') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['TS'] = true;
              } else {
                $_SESSION['TS'] = false;
              }
            }
            if ($cod == 'SS') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['SS'] = true;
              } else {
                $_SESSION['SS'] = false;
              }
            }
            if ($cod == 'DBS') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['DBS'] = true;
              } else {
                $_SESSION['DBS'] = false;
              }
            }
            if ($cod == 'SI') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['SI'] = true;
              } else {
                $_SESSION['SI'] = false;
              }
            }
            if ($cod == 'CDS') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['CDS'] = true;
              } else {
                $_SESSION['CDS'] = false;
              }
            }
            if ($cod == 'SOI') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['SOI'] = true;
              } else {
                $_SESSION['SOI'] = false;
              }
            }
            if ($cod == 'AS') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['AS'] = true;
              } else {
                $_SESSION['AS'] = false;
              }
            }
            if ($cod == 'AGI') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['AGI'] = true;
              } else {
                $_SESSION['AGI'] = false;
              }
            }
            if ($cod == 'REP') {
              if ($permisos[$i]['estado'] == 'activo') {
                $_SESSION['REP'] = true;
              } else {
                $_SESSION['REP'] = false;
              }
            }
          }
          header("Location: ../views/home.php");
        } else {
          header("https://matrizsoporteycobranza.sigefac.com/alejandro.php");
        }
      }else {
        header("Location:https://matrizsoporteycobranza.sigefac.com/alejandro.php");
      }
    }else{
      header("Location:https://matrizsoporteycobranza.sigefac.com/alejandro.php");
    }
  }

  public function logout()
  {
    $respuesta = [];
    if (isset($_SESSION['identity'])) {
      unset($_SESSION['identity']);
      unset($_SESSION['permisos']);
      unset($_SESSION['pension']);
      unset($_SESSION['empresa']);
      unset($_SESSION['DS']);
      unset($_SESSION['DC']);
      unset($_SESSION['DCy']);
      unset($_SESSION['CL']);
      unset($_SESSION['PS']);
      unset($_SESSION['CS']);
      unset($_SESSION['SE']);
      unset($_SESSION['EP']);
      unset($_SESSION['PR']);
      unset($_SESSION['AC']);
      unset($_SESSION['HC']);
      unset($_SESSION['CO']);
      unset($_SESSION['PEN']);
      unset($_SESSION['CSE']);
      unset($_SESSION['TC']);
      unset($_SESSION['SC']);
      unset($_SESSION['US']);
      unset($_SESSION['CA']);
      unset($_SESSION['PER']);
      unset($_SESSION['DE']);
      unset($_SESSION['SU']);
      unset($_SESSION['TS']);
      unset($_SESSION['SS']);
      unset($_SESSION['DBS']);
      unset($_SESSION['SI']);
      unset($_SESSION['CDS']);
      $respuesta = [
        'estado' => 'ok',
        'dbname' => $_SESSION['dbname']
      ];
    }
    return json_encode($respuesta);
  }

  public function inhabilitarUsuario()
  {
    $usuario = new Usuario();
    $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : false;
    if ($idUsuario) {
      $usuarioInhabilitado = $usuario->inhabilitarUsuario($idUsuario);
      if ($usuarioInhabilitado) {
        $respuesta = [
          'estado' => 'ok',
          'mensaje' => 'Usuario inhabilitado correctamente'
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
        'mensaje' => 'Usuario no tiene idUsuario'
      ];
    }
    return json_encode($respuesta);
  }

  public function habilitarUsuario()
  {
    $usuario = new Usuario();
    $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : false;
    if ($idUsuario) {
      $usuarioInhabilitado = $usuario->habilitarUsuario($idUsuario);
      if ($usuarioInhabilitado) {
        $respuesta = [
          'estado' => 'ok',
          'mensaje' => 'Usuario habilitado correctamente'
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
        'mensaje' => 'idUsuario no tiene valor'
      ];
    }
    return json_encode($respuesta);
  }

  public function listarRoles()
  {
    $usuario = new Usuario();
    $roles = $usuario->listarRoles();
    return json_encode($roles);
  }

  public function obtenerRol(){
    $usuario = new Usuario();
    $roles = $usuario->obtenerRol();
    return json_encode($roles);
  }

  public function consultarPendientes(){
    $rol = $_SESSION['identity']->{'codRol'};
    if($rol == 'SO'){
      $usuario = new Usuario();
      $pendientes = [
        'rol' => 'SO',
        'info' => $usuario->consultarPendientes($rol)
      ];
    }else{
      $pendientes = [
        'rol' => 'NO',
      ];
    }
    return json_encode($pendientes);
  }
}

$usuario = new UsuarioController();
if ($_GET['method'] == 'login') {
  echo $usuario->login();
}
if (isset($_SESSION['identity'])) {
  if ($_GET['method'] == 'logout') {
    echo($usuario->logout());
  }
  if ($_GET['method'] == 'principal') {
    $usuario->index();
  }
  if ($_GET['method'] == 'listarUsuarios') {
    echo($usuario->listarUsuarios());
  }
  if ($_GET['method'] == 'guardarUsuario') {
    echo($usuario->guardarUsuario());
  }
  if ($_GET['method'] == 'editarUsuario') {
    echo($usuario->editarUsuario());
  }
  if ($_GET['method'] == 'inhabilitarUsuario') {
    echo($usuario->inhabilitarUsuario());
  }
  if ($_GET['method'] == 'habilitarUsuario') {
    echo($usuario->habilitarUsuario());
  }
  if ($_GET['method'] == 'listarRoles') {
    echo($usuario->listarRoles());
  }
  if ($_GET['method'] == 'obtenerRol') {
    echo($usuario->obtenerRol());
  }
  if ($_GET['method'] == 'consultarPendientes') {
    echo($usuario->consultarPendientes());
  }
} else {
  //header("Location:../" . $_SESSION['dbname'] . ".php");
  header("Location:../views/sinSesion.php");
}
