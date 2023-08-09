<?php

session_start();

require '../php/conexion.php';
$conexion=conectar();

$id=$conexion->real_escape_string($_POST['id_user']);
$nombre=$conexion->real_escape_string($_POST['full-name']);
$phone=$conexion->real_escape_string($_POST['phone']);
$email=$conexion->real_escape_string($_POST['email']);
$pass=$conexion->real_escape_string($_POST['password']);

$sql="UPDATE users SET fullName='$nombre', phone='$phone', email='$email',pass='$pass' WHERE id_user=$id ";
if($conexion->query($sql)){
    $_SESSION['color'].="success";
    $_SESSION['msg'].="Cliente Actualizado";
    
}else{
    $_SESSION['color'].="danger";
    $_SESSION['msg'].="Error al actualizar el cliente";
}

header('Location: clientes.php');





?>