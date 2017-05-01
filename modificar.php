<?php
	//Conectar con mySQL
	$host = 'localhost';
 	$user = 'root';
	$pass = "31193";
	$db = 'tenis';
	$conexion = mysqli_connect($host,$user,$pass);
	//Seleccionamos la base de datos
	mysqli_select_db($conexion, $db);
	//Select query
	$sql = "select * from producto";
	//Ejecutar la consulta
	$records = mysqli_query($conexion, $sql);
//_--------------------------------------------------------------------------
	$host2 = 'sql9.freesqldatabase.com';
	$user2 = 'sql9171921';
	$pass2 = '6b3jvgmSGk';
	$db2 = 'sql9171921';
	$conexion2 = mysqli_connect($host2,$user2,$pass2);
	//Seleccionamos la base de datos
	mysqli_select_db($conexion2, $db2);
	//Select query
	$sql2 = "select * from producto";
	//Ejecutar la consulta
	$records2 = mysqli_query($conexion2, $sql2);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Modificar</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<header id="header">
			<h1><a href="modificar.php">Modificar</a></h1>
			<nav id="nav">
				<ul>
					<li class="special">
						<a href="#menu" class="menuToggle"><span>Menu</span></a>
						<div id="menu">
							<ul>
								<li><a href="menu.php">Menu</a></li>
								<li><a href="altas.php">Registrar</a></li>
								<li><a href="bajas.php">Eliminar</a></li>
								<li><a href="consultas.php">Consultar</a></li>
								<li><a href="modificar.php">Modificar</a></li>
								<li><a href="index.php">Salir</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</nav>
		</header>

				<!-- Main -->
					<article id="main">

						<section class="wrapper style5">
							<div class="inner">
								<center><h4>Productos Disponibles</h4><center>

								<center><h6><a href="#sneakerland">Sneakerland</a></h6><h6><a href="#supermarket">Supermarket</a></h6><center>
								<center><h4 id="sneakerland">Sneakerland</h4><center>

									<div class="table-wrapper" id="sneakerland">
										<table class="alt">
											<thead>
												<tr>
													<th>sku</th>
													<th>Nombre</th>
													<th>Descripcion</th>
													<th>Preco</th>
													<th>Operación</th>
												</tr>
											</thead>
											<tbody>
												<?php while($row = mysqli_fetch_array($records)){
													echo "<tr><form action=update.php method=post>";

													echo "<td><input type=text  readonly=”readonly” name =psku value='".$row['sku']."'></td>";
													echo "<td><input type=text name =pname value='".$row['nombre_producto']."'></td>";
													echo "<td><input type=text name =pdesc value='".$row['descripcion']."'></td>";
													echo "<td><input type='text' name='pprecio' value='".$row['precio']."'></td>";
													echo "<td><input type=submit value=Actualizar></td>";
													echo "</form></tr>";
												}
												mysqli_close($conexion);
												?>
											</tbody>
										</table>

										<center><h4 id="supermarket">Supermarket</h4><center>
										<table class="alt" style="color: #2E3842;">
										<table class="alt">
											<thead>
												<tr>
													<th>sku</th>
													<th>Nombre</th>
													<th>Descripcion</th>
													<th>Preco</th>
													<th>Operación</th>
												</tr>
											</thead>
											<tbody>
												<?php while($row2 = mysqli_fetch_array($records2)){
													echo "<tr><form action=update.php method=post>";

													echo "<td><input type=text  readonly=”readonly” name =idp value='".$row2['id_producto']."'></td>";
													echo "<td><input type=text name =name value='".$row2['nombre_producto']."'></td>";
													echo "<td><input type=text name =desc value='".$row2['descripcion_producto']."'></td>";
													echo "<td><input type='text' name='precio' value='".$row2['precio']."'></td>";
													echo "<td><input type=submit value=Actualizar></td>";
													echo "</form></tr>";
												}

												mysqli_close($conexion2);
												?>
											</tbody>
										</table>
									</div>
								</div>
							</section>								
					</article>

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
