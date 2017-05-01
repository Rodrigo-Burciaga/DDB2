<?php include 'conexion/conexion.php';?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Consultas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<header id="header">
			<h1><a href="consultas.php">Consultas</a></h1>
			<nav id="nav">
				<ul>
					<li class="special">
						<a href="#menu" class="menuToggle"><span>Menu</span></a>
						<div id="menu">
							<ul>
								<li><a href="altas.html">Registrar</a></li>
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

									<div class="table-wrapper">
										<table class="alt" style="color: #2E3842;" >
											<thead>
												<tr>
													<th>SKU</th>
													<th>Nombre</th>
													<th>Descripcion</th>
													<th>Precio</th>
												</tr>
											</thead>
											<tbody>
												<?php while($user = mysqli_fetch_array($datos)){ ?>
													<tr>
														<td><?php echo $user['sku']; ?></td>
														<td><?php echo $user['nombre_producto']; ?></td>
														<td><?php echo $user['descripcion']; ?></td>
														<td><?php echo $user['precio']; ?></td>
													</tr>
												<?php } mysqli_close($conexion);?>
											</tbody>
										</table>

										<center><h4 id="supermarket">Supermarket</h4><center>
										<table class="alt" style="color: #2E3842;">
											<thead>
												<tr>
													<th>SKU</th>
													<th>Nombre</th>
													<th>Descripcion</th>
													<th>Precio</th>
												</tr>
											</thead>
											<tbody>
												<?php while($user2 = mysqli_fetch_array($datos2)){ ?>
													<tr>
														<td><?php echo $user2['id_producto']; ?></td>
														<td><?php echo $user2['nombre_producto']; ?></td>
														<td><?php echo $user2['descripcion_producto']; ?></td>
														<td><?php echo $user2['precio']; ?></td>
													</tr>
												<?php } mysqli_close($conexion2);?>
												
											</tbody>
										</table>
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
