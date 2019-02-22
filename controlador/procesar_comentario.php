<?php
require_once('../db/conexion.php');
require_once('../modelo/model.php');

$host = Conexion::$host;
$user = Conexion::$user;
$pass = Conexion::$pass;
$db = Conexion::$db;

$conexion = new Comentario($host,$user,$pass,$db);
$tipoPagina;

if(isset($_GET['ctl'])){
    $tipoPagina = $_GET['ctl'];
}

if(isset($_POST)){
    $nombre = $_POST['name'];
    $comentario = $_POST['commit'];

    $conexion->insertarComentario($nombre,$comentario,$tipoPagina);

}

if($_GET['ctl'] == 'php') {
    header('Location: ../1.php?ctl=php');
}else if($_GET['ctl'] == 'js') {
    header('Location: ../2.php?ctl=js');
}

?>