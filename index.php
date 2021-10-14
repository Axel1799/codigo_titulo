<!DOCTYPE html>
<html lang="es">

<head>
	<title>Títulos UNAE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/mortarboard.png" />
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

	<nav class="navbar navbar-light justify-content-center navbar-custom">
		<a class="navbar-brand" href="http://www.unae.edu.py/">
			<img src="images/logo2.png" width="130" height="55">
		</a>
	</nav>


	<div class="bg-contact2" style="background-image: url('images/universidad2.png');">
		<div class="container-contact2">
			<div class="wrap-contact2">
				<form action="/titulosa/search.php" method="POST" class="contact2-form validate-form">
					<span class="contact2-form-title">
						Búsqueda de Título
					</span>
					<h4 style="text-align: center;">Inserte el código del título</h4>
					<div class="form-outline">
						<input STYLE="text-transform:uppercase" width="30px" type="search" id="codigo_aut" name="codigo_aut" class="form-control" required />
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

						$query = "SELECT codigo_aut, egresado, ci, carrera, anio, serie FROM titulos WHERE codigo_aut LIKE '$bu'";

						/*si el nombre continene un *, que muestre el mensaje de enie*/

						

						if ($result = mysqli_query($mysqli, $query)) {

							$row_count = mysqli_num_rows($result);

							if($row_count > 0){

							

							while ($finfo = mysqli_fetch_assoc($result)) {
								

					?>
								<p>El código <?= $finfo["codigo_aut"] ?> pertenece a: </p><br>
								<div class="wrap-input2 validate-input" data-validate="Name is required">
									<span class="focus-input2" data-placeholder="NOMBRE"></span><br>
									<input class="input2" style="font-weight: bold" type="text" placeholder="<?= $finfo["egresado"] ?>" readonly>
								</div>

								<div class="wrap-input2 validate-input" data-validate="Name is required">
									<span class="focus-input2" data-placeholder="CÉDULA"></span><br>
									<input class="input2" style="font-weight: bold" type="text" placeholder="<?= $finfo["ci"] ?>" readonly>
								</div>

								<div class="wrap-input2 validate-input" data-validate="Name is required">
									<span class="focus-input2" data-placeholder="CARRERA"></span><br>
									<input class="input2" style="font-weight: bold" type="text" placeholder="<?= $finfo["carrera"] ?>" readonly>
								</div>

								<div class="wrap-input2 validate-input" data-validate="Name is required">
									<span class="focus-input2" data-placeholder="AÑO DE EGRESO"></span><br>
									<input class="input2" style="font-weight: bold" type="text" placeholder="<?= $finfo["anio"] ?>" readonly>
								</div>

								<div class="wrap-input2 validate-input" data-validate="Name is required">
									<span class="focus-input2" data-placeholder="NÚMERO DE SERIE"></span><br>
									<input class="input2" style="font-weight: bold" type="text" placeholder="<?= $finfo["serie"] ?>" readonly>
								</div>

								<p>* Por razones de codificación SQL, puede que en el nombre del estudiante citado se muestre con caracteres anglosajones (N en vez de Ñ).</p>



								

					<?php
								
							
							}
						}else{ ?>
							<div class="wrap-input2 validate-input" data-validate="Name is required">
								<br>
								<p readonly>El código ingresado no corresponde a un egresado de la UNAE</p>
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