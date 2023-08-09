<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
	
    //Mandamos la conexion de la base de datos

 	include 'conexion.php';
	$conexion=conectar();

    //obtener los datos del formulario al controlador
	$fullName = mysqli_real_escape_string($conexion,$_POST['fullName']);  //usamos este método php para evitar inyección sql a la bd
	$phone = mysqli_real_escape_string($conexion,$_POST['phone']);  //usamos este método php para evitar inyección sql a la bd
	$email = mysqli_real_escape_string($conexion,$_POST['email']);  //usamos este método php para evitar inyección sql a la bd
	$password = mysqli_real_escape_string($conexion,$_POST['pass']);  //usamos este método php para evitar inyección sql a la bd

	

	

		
		//realizamos una consulta para saber si el correo ya esta registrado en la BD
		$select = "SELECT * FROM users WHERE email='$email'";
		$res_Select = mysqli_query($conexion,$select);
		//si el correo no está registrado lo insertamos en la base de datos y regresamos 1
		if(mysqli_num_rows($res_Select) == 0){
			//Guardamos en una variable la consulta a la BD para insertar datos
			$insertar = "INSERT INTO users (fullName,phone,email,pass,tipo_usuario) VALUES('$fullName','$phone','$email','$password','usuario')";
			//ejecutamos la consulta y el resultado de la inserción lo guardamos en una variable
			echo mysqli_query($conexion, $insertar);
			//Si fallo la inserción avisamos al usuario, de lo contrario avisamos que el registro fue exitoso
			
			
		}else{ //si el correl ya estaba registrado en la BD regresamos 0
		echo '0';
			
		}
	
	
    
   
	

 //cerrar la conexión
 mysqli_close($conexion);
?>
