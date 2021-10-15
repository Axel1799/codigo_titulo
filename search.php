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
				<form action="/titulosa/" method="POST" class="contact2-form validate-form">
					<span class="contact2-form-title">
						Búsqueda de Título
					</span>
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
						//$query2 = "SELECT ci, carrera, anio FROM titulos WHERE ci IN ( SELECT ci FROM titulos GROUP BY ci HAVING COUNT(*) > 1);";
						$query2 = "SELECT ci, carrera, anio from titulos where ci = (SELECT ci FROM titulos WHERE codigo_aut LIKE '$bu') ORDER BY anio ASC";

						if ($result = mysqli_query($mysqli, $query)) {

							$row_count = mysqli_num_rows($result);

							if ($row_count > 0) {



								while ($finfo = mysqli_fetch_assoc($result)) {

					?>
									<span class="contact2-form-title" style="color: #e53935">
										¡Encontrado!
									</span>
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
										<textarea class="input2" style="font-weight: bold" type="text" placeholder="<?= $finfo["carrera"] ?>" readonly></textarea>
									</div>

									<div class="wrap-input2 validate-input" data-validate="Name is required">
										<span class="focus-input2" data-placeholder="AÑO DE EGRESO"></span><br>
										<input class="input2" style="font-weight: bold" type="text" placeholder="<?= $finfo["anio"] ?>" readonly>
									</div>

									<div class="wrap-input2 validate-input" data-validate="Name is required">
										<span class="focus-input2" data-placeholder="NÚMERO DE SERIE"></span><br>
										<input class="input2" style="font-weight: bold" type="text" placeholder="<?= $finfo["serie"] ?>" readonly>
									</div> 
									
									
									<?php
											if ($result = mysqli_query($mysqli, $query2)) {

												$row_count = mysqli_num_rows($result);

												if ($row_count > 0) { ?>

													<div class="wrap-input2 validate-input" data-validate="Name is required">
													<span class="focus-input2" data-placeholder="CURSOS REALIZADOS"></span><br><?php

													while ($finfo = mysqli_fetch_assoc($result)) { ?>

														<textarea class="input2" style="font-weight: bolder" type="text" placeholder="- <?= $finfo["anio"], ", ", $finfo["carrera"] ?>" readonly></textarea>

												<?php }
												}
											} ?>
											</div>

											<p>* Por razones de codificación SQL, puede que en el nombre del estudiante citado se muestre con caracteres anglosajones (N en vez de Ñ).</p>

										<?php

									}
								} else { ?>

										<span class="contact2-form-title" style="color: #e53935">
											No Encontrado :(
										</span>
										<div class="wrap-input2 validate-input" data-validate="Name is required">
											<br>
											<p readonly style="text-align: center;">El código ingresado no corresponde a un egresado de la UNAE</p>
										</div><?php
											}
										}

										mysqli_free_result($result);
									}

									mysqli_close($mysqli);
												?>
							<br>
							<div class="container-contact2-form-btn">
								<div class="wrap-contact2-form-btn">
									<div class="contact2-form-bgbtn"></div>
									<button class="contact2-form-btn">
										Introducir nuevo código
									</button>
								</div>
							</div>
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