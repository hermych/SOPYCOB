<?php
session_start();
require_once "config/db.php";
require_once "config/parameters.php";
require_once "helpers/utils.php";
?>
<?php
$archivo = explode("/", $_SERVER['REQUEST_URI'])[1];
$dbname = explode(".", $archivo)[0];
$_SESSION['dbname'] = $dbname;
if($_SESSION['identity']):
    header("Location: /views/home.php");
?>
<?php
else:
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="../assets/image/favicon-100x100.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/login2.css">
  <script src="assets/js/librerias/jquery-3.6.0.min.js"></script>
  <title>Iniciar Sesion</title>
</head>

<body>
  <section>
    <div class="imgBx">
      <img src="../assets/image/imgBx.jpg" alt="">
    </div>
    <div class="contentBx">
      <div class="formBx">
        <h2>Login</h2>
        <form action="controllers/UsuarioController.php?method=login" method="POST">
          <div class="inputBx">
            <span>Correo</span>
            <input type="email" name="email" placeholder="Ingrese su correo">
          </div>
          <div class="inputBx">
            <span>Contraseña</span>
            <input type="password" name="password" placeholder="Ingrese su contraseña">
          </div>
          <div class="inputBx">
            <input type="submit" name="" value="Iniciar Sesion">
          </div>
          <div class="inputBx">
            <p>¿No tienes una cuenta? <a href="https://sigefac.com/contactenos/" target="_blank"> Registrate</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>


</html>
<body>
?>
<?php
endif;
?>