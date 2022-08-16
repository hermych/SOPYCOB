<?php

session_start();
// unset($_SESSION['dbname']);
require_once "autoload.php";
require_once "config/db.php";
require_once "config/parameters.php";
require_once "helpers/utils.php";
require_once "views/layout/header.php";

function show_error(){
  $error = new errorController();
  $error->index();
}
// Obtener nombre de la bd
if(isset($_GET['empresa'])){
  $_SESSION['dbname'] = $_GET['empresa']; 
}
// Obtener el controlador
if(isset($_GET['controller'])){
  $nombre_controlador = $_GET['controller'].'Controller'; 
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
  $nombre_controlador = controller_default;
}else{
  show_error();
  exit();
}
// Obtener nombre del metodo a usar del controlador
if(isset($nombre_controlador) && class_exists($nombre_controlador)){
  $controlador = new $nombre_controlador();   
  if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
    $action = $_GET['action'];
    $controlador->$action(); //$action();
  }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $action_default = action_default;
    $controlador->$action_default();
  }else{
    show_error();
  }
}else{
  show_error();
}
?>

<?php require_once "views/layout/footer.php"; ?>