<?php 

require '../php/conexion.php';
    $conexion=conectar();


    
$id=$conexion->real_escape_string($_POST['id_reservacion']);

$sql="SELECT * FROM reservaciones WHERE id_reservacion=$id LIMIT 1";
$resultado=$conexion->query($sql);
$rows = $resultado->num_rows;

$reservacion =[];

if($rows>0){
    $reservacion =$resultado->fetch_array();
}

echo json_encode($reservacion, JSON_UNESCAPED_UNICODE);


?>