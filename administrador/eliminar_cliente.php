
<?php

session_start();

require '../php/conexion.php';
$conexion=conectar();

$id=$conexion->real_escape_string($_POST['id_user']);


$sql="DELETE FROM users WHERE id_user=$id ";
if($conexion->query($sql)){
    $_SESSION['color']="success";
    $_SESSION['msg']="Cliente Eliminado";
}else{
    $_SESSION['color']="danger";
    $_SESSION['msg']="Error al eliminar cliente";
}

header('Location: clientes.php');







?>