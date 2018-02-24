<?php 
@session_start();
if (!isset($_SESSION['teacher_id'])) {
	header('location:../students');
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Veranos Itz</title>
	<?php include '../appsummer.itz/modules/head.php' ?>
	
	
</head>
<body>
	<div class="container-fluid">
		<div class="row">

			<?php include '../appsummer.itz/modules/menu-nav-admin.php'; ?>

			<main class="main col">
				<div class="row">
					<div class="columna col-lg-12">
							<ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="#tab1" class="nav-link active" data-toggle="tab">Estudiantes</a>
					</li>
					<li class="nav-item">
						<a href="#tab2" class="nav-link" data-toggle="tab">Profesores</a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="tab1" role="tabpanel">
						<?php include '../appsummer.itz/modules/registro-estudiante.php' ?>
					</div>
					<div class="tab-pane" id="tab2" role="tabpanel">
						<?php include '../appsummer.itz/modules/registro-profesor.php'; ?>
					</div>
					
				</div>
						
					</div>

				</div>
			</main>
		</div>
	</div>		
	
	
	
	<?php include '../appsummer.itz/modules/scripts.php'; ?>
</body>
</html>