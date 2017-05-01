<?php
$host = 'localhost';
$user = 'root';
$pass = "";
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

if(isset($_GET['edit']) ) {
	$id1 = $_GET['edit'];
	$res1 = mysqli_query($conexion, "SELECT * from producto ");
	$row1 = mysqli_fetch_array($res1);
}

	if(isset($_GET['edit2']) ) {
		$id2 = $_GET['edit2'];
		$res2 = mysqli_query($conexion2, "SELECT id_producto, nombre_producto, descripcion_producto from producto ");
		$row2 = mysqli_fetch_array($res2);
	}

	if(isset($_POST['nuevoNombre'])) {
		$nuevoNombre = $_POST['nuevoNombre'];
		$nuevoDesc = $_POST['nuevoDesc'];
		$id = $_POST['sku'];
		$sql = "update producto SET nombre_producto = $nuevoNombre, descripcion = $nuevoDesc WHERE sku = $id";
		$res = mysqli_query($conexion,$sql);
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Actualización de productos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<header id="header">
			<h1><a href="menu.php">SuperMercado "San Pancho".</a></h1>
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

					<article id="main">

						<section class="wrapper style5">
							<div class="inner">
								<center><h4>Actualización de productos</h4><center>

									<form method="POST" action="edit.php">

										<div class="row uniform">
											<div class="6u 12u$(xsmall)">
												<input type="text" name="nuevoSku" id="demo-name" value="<?php echo $row1[0]?>"  />
											</div>
										</div>
										<div class="row uniform">
											<div class="6u 12u$(xsmall)">
												<input type="text" name="nuevoNombre" id="demo-name" value="<?php echo $row1[1]?>"/>
											</div>
										</div>
										<div class="row uniform">
											<div class="6u 12u$(xsmall)">
												<input type="text" name="nuevaDesc" id="demo-name" value="<?php echo $row1[2]?>"  />
											</div>
										</div>
																				<!-- Consulta 2 -->

										<div class="row uniform">
										<div class="3u$">
											<ul class="actions">
												<li><input type="submit" value="Actualizar" class="special" /></li>
											</ul>
										</div>
									</div>
										</form>
								</div>
						</section>
					</article>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>
