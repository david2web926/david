<?php
require_once('db/conexion.php');
require_once('modelo/model.php');

$host = Conexion::$host;
$user = Conexion::$user;
$pass = Conexion::$pass;
$db = Conexion::$db;

$conexion = new Comentario($host,$user,$pass,$db);
$tipoPagina;

if(isset($_GET['ctl'])){
    $tipoPagina = $_GET['ctl'];
}

$comentarios = $conexion->getComentarios($tipoPagina);

require_once('vista/logComentarios.php');

?>

