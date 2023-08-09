<?php

session_start();

require '../php/conexion.php';
$conexion=conectar();

$id=$conexion->real_escape_string($_POST['id_reservacion']);
$nombreCliente=$conexion->real_escape_string($_POST['nombreCliente']);
$Phone=$conexion->real_escape_string($_POST['phone']);
$numeroSillas=$conexion->real_escape_string($_POST['numeroSillas']);
$tipoMesa=$conexion->real_escape_string($_POST['tipoMesa']);
$fechaReservacion=$conexion->real_escape_string($_POST['fechaReservacion']);
$horaReservacion=$conexion->real_escape_string($_POST['horaReservacion']);
$Estatus=$conexion->real_escape_string($_POST['estatus']);
$Comentarios=$conexion->real_escape_string($_POST['comentarios']);

$sql="UPDATE reservaciones SET nombreCliente='$nombreCliente',phone='$Phone', numeroSillas=$numeroSillas, tipoMesa='$tipoMesa',fechaReservacion='$fechaReservacion',horaReservacion='$horaReservacion',estatus='$Estatus',comentarios='$Comentarios' WHERE id_reservacion=$id ";
if($conexion->query($sql)){
    $_SESSION['color'].="success";
    $_SESSION['msg'].="Reservacion Actualizado";
    
}else{
    $_SESSION['color'].="danger";
    $_SESSION['msg'].="Error al actualizar reservacion";
}

header('Location: reservaciones.php');





?>