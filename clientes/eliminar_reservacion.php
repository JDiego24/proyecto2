
<?php

session_start();

require '../php/conexion.php';
$conexion=conectar();

$id=$conexion->real_escape_string($_POST['id_reservacion']);


$sql="DELETE FROM reservaciones WHERE id_reservacion=$id ";
if($conexion->query($sql)){
    $_SESSION['color']="success";
    $_SESSION['msg']="Reservacion Eliminada";
}else{
    $_SESSION['color']="danger";
    $_SESSION['msg']="Error al eliminar la reservacion";
}

header('Location: reservar.php');







?>