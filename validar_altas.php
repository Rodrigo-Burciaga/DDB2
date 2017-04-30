<?php

$nombre_producto = $_POST['nombre_producto'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$bd = $_POST['bd']

?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Alta de productos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  		<link rel="icon" href="images/favicon.ico" type="image/x-icon">-
	</head>
	<body>

		<header id="header">
			<h1><a href="altas.html">Registrar Productos</a></h1>
			<nav id="nav">
				<ul>
					<li class="special">
						<a href="#menu" class="menuToggle"><span>Menu</span></a>
						<div id="menu">
							<ul>
								<li><a href="altas.html">Registrar</a></li>
								<li><a href="bajas.html">Eliminar</a></li>
								<li><a href="consultas.php">Consultar</a></li>
								<li><a href="cambios.html">Modificar</a></li>
								<li><a href="index.php">Salir</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</nav>
		</header>

					<article id="main">

						<section class="wrapper style5">
							<div class="inner">
								<center><h4>Alta de productos</h4><center>
								<?php
									
									//echo $sku;
									//echo "<br>";
									/*
									echo $nombre_producto;
									echo "<br>";
									echo $precio;
									echo "<br>";
									echo $descripcion;
									echo "<br>";
									echo $bd;
									echo "<br>";
									*/
									
									if ($bd==1) 
									{//BASE DE DATOS SUPERMARKET
										include "conection/conexion.php";
										conectar(1);

										//Quita espacios de la cadena
										$cadena = str_replace(' ', '', $nombre_producto);

										//ALGORITMO GENERAR SKU
										$max_sku = "select count(id_producto) from producto";
										$max_sku_result = mysqli_query($conexion,$max_sku);
										$max_sku_result_array = mysqli_fetch_array($max_sku_result);
										$max_producto = $max_sku_result_array[0];

										$sku = strtoupper($max_producto.substr($cadena, 0,3).substr($cadena, -3));

										//SELECCIONAR PRIMER SUBCATEGORIA
										$subcategoria = "select id_subcategoria from subcategoria limit 1";
										$subcategoria_result = mysqli_query($conexion,$subcategoria);
										$subcategoria_result_array = mysqli_fetch_array($subcategoria_result);
										$subcat = $subcategoria_result_array[0];

										/*
										echo $cadena;
										echo "<br>";
										echo $sku;
										echo "<br>";
										echo $max_producto;
										echo "<br>";
										echo $subcat;
										echo "<br>";
										*/

										$registro_producto = "insert into producto(id_producto,nombre_producto,descripcion_producto,precio,id_subcategoria) values('$sku','$nombre_producto','$descripcion','$precio','$subcat')";
										$result_registro_producto = mysqli_query($conexion,$registro_producto);

										if($result_registro_producto)
										{
										?>
											<br>
											<p>Producto en la base de datos Supermarket registrado exitosamente.</p>
											<br>
											<a href="altas.html">Continuar</a>
										<?php
										}
										else
										{
										?>
											<br>
											<p>Hubo un error al registrar el producto.</p>
											<br>
											<a href="altas.html">Continuar</a>
										<?php
										}															

									}
									elseif ($bd==2) 
									{//BASE DE DATOS TENIS
										include "conection/conexion.php";
										conectar(2);

										$registro_producto ="insert into producto(nombre_producto, descripcion, precio, seccion_idseccion, tipo_idtipo, marca_idmarca) values('$nombre_producto','$descripcion','$precio','1','6','11')";
										$result_registro_producto = mysqli_query($conexion2,$registro_producto);
										//echo $registro_producto;

										if($result_registro_producto)
										{
										?>
											<br>
											<p>Producto registrado en la base de datos Sneakerland exitosamente.</p>
											<br>
											<a href="altas.html">Continuar</a>
										<?php
										}
										else
										{
										?>
											<br>
											<p>Hubo un error al registrar el producto.</p>
											<br>
											<a href="altas.html">Continuar</a>
										<?php
										}
									}
								?>
								</div>
						</section>
					</article>

					<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; PRÁCTICA 2</li><li>Burciaga Ornelas Rodrigo Andrés</li><li>García Enríquez Roberto Francisco</li><li>González García Jorge</li><li>Reyes Izquierdo Julio Armando</li>
						</ul>
					</footer>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
</html>
