<?php
@session_start();
if (isset($_SESSION['student_id'])) {
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../appsummer.itz/modules/head.php';?>
	<title>Registro-Inicio de sesión</title>
</head>
<style>
		body {
			/*padding-top: 56px;*/
			/*padding-bottom: 56px;*/
		}
		@media screen and (max-width:576px){
			.container {
				width: 100%;
			}
		}
	</style>
<body>

	<nav class="navbar navbar-toggleable-md navbar-light">
		<div class="container">
			<button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#fm-menu" aria-controls="fm-menu" aria-expanded="false" aria-label="Menu">
				<samp class="icon-users"></samp>
			</button>


			<a href="#" class="text-primary-b">VeranosItz  </a>

			<div class="collapse navbar-collapse justify-content-end" id="fm-menu">

				<form action="../appsummer.controller/controllerstudent.php" class="form-inline" method="post">
					<div class="form-group">
						<input type="text" class="form-control mr-3" name="student_id" id="student_id" placeholder="N° Control">
					</div>
					<div class="form-group">
						<input type="password" class="form-control mr-3" name="student_password" id="student_password" placeholder="Contraseña">
						<div class="form-group m-1">
							<input type="submit" class="btn btn-primary-b"
							name="submit" value="Iniciar Sesión">
						</div>
					</div>
					<input type="hidden" name="accion" value="ingresar"
					>
				</form>
			</div>
		</div>
	</nav>
	<?php
echo "<div class='container'>";

include '../appsummer.itz/modules/registro-estudiante.php';
echo "</div>";
include '../appsummer.itz/modules/scripts.php';
?>


</body>
</html>