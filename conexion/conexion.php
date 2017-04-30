<?php

	$host = 'localhost';
 	$user = 'root';
	$pass = "31193";
	$db = 'tenis';
	///////////////////////////////////////////// SECOND CONNECTION --- LOCAL HOST DEPEND OF EACH USER
	$host2 = 'sql9.freesqldatabase.com';
 	$user2 = 'sql9171921';
	$pass2 = '6b3jvgmSGk';
	$db2 = 'sql9171921';
   	//$conexion; //CONNECTION TO REMOTE SERVER FREESQLDATABASE
   	//$conexion2; //CONNECTION LOCAL SERVER OF EACH USER

	$conexion = mysqli_connect($host,$user,$pass,$db);
	$conexion2 = mysqli_connect($host2,$user2,$pass2,$db2);

	if(!$conexion) {
		echo "Error al conectar la base de datos";
	} else {
		echo "Conectado a las base de datos 1";
	}

	if(!$conexion2) {
		echo "Error al conectar la base de datos";
	} else {
		echo "Conectado a las base de datos 2";
	}

	$datos = $conexion->query("select sku, nombre_producto, descripcion from producto");
	$datos2 = $conexion2->query("select id_producto, nombre_producto, descripcion_producto from producto");


?>
