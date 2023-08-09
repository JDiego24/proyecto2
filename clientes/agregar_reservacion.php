<?php

session_start();

require '../php/conexion.php';
$conexion=conectar();

$id=$_SESSION['id_user'];

$nombreCliente=$conexion->real_escape_string($_POST['nombreCliente']);
$phone=$conexion->real_escape_string($_POST['phone']);
$numeroSillas=$conexion->real_escape_string($_POST['numeroSillas']);
$tipoMesa=$conexion->real_escape_string($_POST['tipoMesa']);
$fechaReservacion=$conexion->real_escape_string($_POST['fechaReservacion']);
$horaReservacion=$conexion->real_escape_string($_POST['horaReservacion']);
$champagne=$conexion->real_escape_string($_POST['champagne']);
$Comentarios=$conexion->real_escape_string($_POST['comentarios']);



$sql="INSERT INTO reservaciones (nombreCliente,phone, numeroSillas, tipoMesa,fechaReservacion,horaReservacion,champagne, comentarios, estatus, id_usuario ) VALUES ('$nombreCliente','$phone',$numeroSillas,'$tipoMesa','$fechaReservacion','$horaReservacion','$champagne','$Comentarios','Reservado',$id)";
if($conexion->query($sql)){

  $_SESSION['color'].="success";
    $_SESSION['msg'].="Reservacion realiazada";

    
}else{
    $_SESSION['color'].="danger";
    $_SESSION['msg'].="Error al reservar";
}

header('Location: reservar.php');







?>