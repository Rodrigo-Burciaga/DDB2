<?php
include "conection/conexion.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$company=$_POST["select"];
	if ($company!='') {
		switch ($company) {
				case '1':
					//CONNECT TO A REMOTE DATABASE
					//echo "<script>alert($company);</script>";
					conectar(1);
					if (!$conexion) {
						die("Connection failed: " . mysqli_connect_error());
					}
					else{
						//echo "<script>alert('conectado correctamente 1');</script>";
					    $user = mysqli_real_escape_string($conexion,$_POST['user']);
    					$password = mysqli_real_escape_string($conexion,$_POST['pass']);
    					$sql = "SELECT * FROM usuario WHERE id_usuario='$user' AND password_usuario='$password'";
    					$result = mysqli_query($conexion,$sql);

    					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
						$active = $row['active'];

						$count = mysqli_num_rows($result);

    

						if($count == 1){
							switch ($row["rol"]) {
						          case 1:
						              //desconectar();
						              header("location: home_administrador.php");
							            desconectar(1);
						              break;
						          case 2:
						               header("location: home_gerente.php");
						               desconectar(1);
						              break;
						          case 3:
						               header("location: home_asesor.php");
						               desconectar(1);
						              break;
						          default:
						               header("location: index.php");
						               desconectar(1);
						      }    
						}

						else{
							 $error="Usuario y/o contraseña equivocados";
						}
					}
					break;

				case '2':
					//CONNECT TO A REMOTE DATABASE
					//echo "<script>alert($company);</script>";
					conectar(2);
					if (!$conexion2) {
						die("Connection failed: " . mysqli_connect_error());
					}
					else{
						//echo "<script>alert('conectado correctamente 2');</script>";
						$user = mysqli_real_escape_string($conexion2,$_POST['user']);
    					$password = mysqli_real_escape_string($conexion2,$_POST['pass']);
						$sql = "SELECT * FROM usuario WHERE id_usuario='$user' AND password='$password'";
						$result = mysqli_query($conexion2,$sql);

						$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
						$active = $row['active'];
						
						$count = mysqli_num_rows($result);


						if($count == 1){
							switch ($row["id_nivel_usuario"]) {
						          case 1:
						              //desconectar();
						              header("location: home_administrador.php");
							            desconectar(2);
						              break;
						          case 2:
						               header("location: home_gerente.php");
						               desconectar(2);
						              break;
						          case 3:
						               header("location: home_asesor.php");
						               desconectar(2);
						              break;
						          default:
						               header("location: index.php");
						               desconectar(2);             
									  break;
						      }    
						}else{
							 $error="Usuario y/o contraseña equivocados";
						}

					}

					break;

				default:
					break;
			}	
	}

}

?>




<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  			<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	</head>
	<body>
				<header id="header">
					<h1><a href="index.php">Sistema Multibase</a></h1>
				</header>

					<article id="main">

						<section class="wrapper style5">
							<div class="inner">
								<center><h4>Iniciar Sesión</h4><center>

								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

								<div class="row uniform">
									<div class="6u 12u$(xsmall)">
										<input type="text" name="user"   placeholder="Nombre" required value="<?php echo $user;?>" />
									</div>
								</div>
								<div class="row uniform">
									<div class="6u 12u$(xsmall)">
										<input type="password" name="pass"  placeholder="Constraseña" required />
									</div>
								</div>

								<div class="row uniform">
								<div class="6u 12u$(xsmall)">
									<div class="select-wrapper">
										<select name="select" required>
											<option value="">- Compañía -</option>
											<option value="1">Supermarket</option>
											<option value="2">Sneakerland</option>
										</select>
									</div>
								</div>
								</div>
								
								
									<div class="row uniform">
									<div class="3u$">
									<ul class="actions">
										<li><center><input type="submit" value="Ingresar" class="special" /></center></li>	
									</ul>
									</div>
									</div>
								</form>

								<div class="error text-center" style="color:red; font-size: 10px;"><?php echo  $error?></div>

								
								


							</div>
						</section>
					</article>

					<footer id="footer" style="padding-top: 30px">
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
