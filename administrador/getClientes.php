<?php 

require '../php/conexion.php';
    $conexion=conectar();


    
$id=$conexion->real_escape_string($_POST['id_user']);

$sql="SELECT * FROM users WHERE id_user=$id LIMIT 1";
$resultado=$conexion->query($sql);
$rows = $resultado->num_rows;

$cliente =[];

if($rows>0){
    $cliente =$resultado->fetch_array();
}

echo json_encode($cliente, JSON_UNESCAPED_UNICODE);


?>