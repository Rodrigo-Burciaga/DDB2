<?php

	define('DB_SERVER', 'sql9.freesqldatabase.com');
	define('DB_USERNAME', 'sql9171921');
	define('DB_PASSWORD', '6b3jvgmSGk');
	define('DB_DATABASE', 'sql9171921');
	///////////////////////////////////////////// SECOND CONNECTION --- LOCAL HOST DEPEND OF EACH USER
	define('DB_SERVER1', 'localhost');
	define('DB_USERNAME1', 'root');
	define('DB_PASSWORD1', '31193');
	define('DB_DATABASE1', 'tenis');
   	$conexion; //CONNECTION TO REMOTE SERVER FREESQLDATABASE
   	$conexion2; //CONNECTION LOCAL SERVER OF EACH USER

function conectar($sconexion)
{	
	global $conexion,$conexion2;
	if($sconexion==1){
		$conexion = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	}
	elseif ($sconexion==2) {
		$conexion2 = mysqli_connect(DB_SERVER1,DB_USERNAME1,DB_PASSWORD1,DB_DATABASE1);
	}
}

function desconectar($sdesconectar){
	global $conexion, $conexion2;
	if ($sdesconectar==1) {
		mysqli_close($conexion);
	}
	elseif ($sdesconectar==2) {
		mysqli_close($conexion2);
	}	
}




?>
