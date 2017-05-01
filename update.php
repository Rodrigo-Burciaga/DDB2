<?php
	//Conectar con mySQL
	$host = 'localhost';
 	$user = 'root';
	$pass = "31193";
	$db = 'tenis';
	$conexion = mysqli_connect($host,$user,$pass);
	//Seleccionamos la base de datos
	mysqli_select_db($conexion, $db);
	//update query0
	$sql = "update producto set nombre_producto = '$_POST[pname]', descripcion ='$_POST[pdesc]', precio='$_POST[pprecio]' WHERE sku ='$_POST[psku]'";
	//Ejecutar la consulta
	if(mysqli_query($conexion, $sql))

    header("refresh:1;url=modificar.php");
  else
      echo "No se pudo actualizar";
//----------------------------------------------------------------
  $host2 = 'sql9.freesqldatabase.com';
  $user2 = 'sql9171921';
  $pass2 = '6b3jvgmSGk';
  $db2 = 'sql9171921';
  $conexion2 = mysqli_connect($host2,$user2,$pass2);
  //Seleccionamos la base de datos
  mysqli_select_db($conexion2, $db2);
  //Select query-
  $sql2 = "update producto set nombre_producto = '$_POST[name]', descripcion_producto ='$_POST[desc]', precio='$_POST[precio]' WHERE id_producto ='$_POST[idp]'";
  //Ejecutar la consulta
  if(mysqli_query($conexion2, $sql2))

    header("refresh:1;url=modificar.php");
  else
      echo "No se pudo actualizar";
?>
