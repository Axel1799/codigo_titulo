<!DOCTYPE html>
<html lang="en">

<head>
	<title>Títulos UNAE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/edu2.png" />
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://kit.fontawesome.com/85b07c1155.js" crossorigin="anonymous"></script>

	<!-- footer resources -->
	

</head>

<body>
	<!-- Image and text -->

	<nav class="navbar navbar-light bg-light justify-content-center">
		<a class="navbar-brand" href="http://www.unae.edu.py/">
			<img src="images/logo.png" width="220" height="65">
		</a>
	</nav>


	<div class="bg-contact2" style="background-image: url('images/universidad2.png');">
		<div class="container-contact2">
			<div class="wrap-contact2">
				<form action="/titulos/index.php" method="POST" class="contact2-form validate-form">
					<span class="contact2-form-title">
						Buscar Título
					</span>
					<legend>Inserte el código del título</legend>
					<div class="form-outline">
						<input STYLE="text-transform:uppercase" type="search" id="codigo_aut" name="codigo_aut" class="form-control" required />
					</div>
					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn">
								Buscar
							</button>
						</div>
					</div>
					<br>

					<?php

					$mysqli = new mysqli("localhost", "root", "", "codigo_titulo");

					/* verificar la conexión */
					if (mysqli_connect_errno()) {
						printf("Conexión fallida: %s\n", mysqli_connect_error());
						exit();
					}

					if (isset($_POST["codigo_aut"])) {

						$bu = $_POST["codigo_aut"];

						$query = "SELECT egresado, ci, carrera, anio, serie FROM titulos WHERE codigo_aut LIKE '$bu'";

						

						if ($result = mysqli_query($mysqli, $query)) {

							$row_count = mysqli_num_rows($result);

							if($row_count > 0){

							

							while ($finfo = mysqli_fetch_assoc($result)) {
								

					?>
								<div class="wrap-input2 validate-input" data-validate="Name is required">
									<span class="focus-input2" data-placeholder="NOMBRE"></span><br>
									<input class="input2" type="text" placeholder="<?= $finfo["egresado"] ?>" readonly>
								</div>

								<div class="wrap-input2 validate-input" data-validate="Name is required">
									<span class="focus-input2" data-placeholder="CÉDULA"></span><br>
									<input class="input2" type="text" placeholder="<?= $finfo["ci"] ?>" readonly>
								</div>

								<div class="wrap-input2 validate-input" data-validate="Name is required">
									<span class="focus-input2" data-placeholder="CARRERA"></span><br>
									<input class="input2" type="text" placeholder="<?= $finfo["carrera"] ?>" readonly>
								</div>

								<div class="wrap-input2 validate-input" data-validate="Name is required">
									<span class="focus-input2" data-placeholder="AÑO DE EGRESO"></span><br>
									<input class="input2" type="text" placeholder="<?= $finfo["anio"] ?>" readonly>
								</div>

								<div class="wrap-input2 validate-input" data-validate="Name is required">
									<span class="focus-input2" data-placeholder="NÚMERO DE SERIE"></span><br>
									<input class="input2" type="text" placeholder="<?= $finfo["serie"] ?>" readonly>
								</div>

					<?php
							
							}
						}else{ ?>
							<div class="wrap-input2 validate-input" data-validate="Name is required">
								<span class="focus-input2" data-placeholder="CÓDIGO"></span><br>
								<input class="input2" type="text" placeholder="El código ingresado no corresponde a un egresado de la UNAE" readonly>
							</div><?php
						}
							
						}
						
						mysqli_free_result($result);
						
						
						
					}
					


					mysqli_close($mysqli);
					?>

				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
<div class="center">


<footer class="footer-distributed">

	<div class="footer-left justify-content-center">
		<p>Designed by UNAE &copy; 2021</p>
	</div>

</footer>
</div>

</body>

</html>