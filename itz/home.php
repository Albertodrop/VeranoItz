<?php 
@session_start();
if (!isset($_SESSION['teacher_id'])) {
	header('location:index.php');
}
require_once '../appsummer.dao/SummerDao.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<?php include '../appsummer.itz/modules/head.php' ?>

	
	<title>Veranos Itz</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php include '../appsummer.itz/modules/menu-nav-admin.php'; ?>

			<main class="main col">
				<div class="row">
					<div class="columna col-lg-7">
						<div class="widget estadisticas">
							<h3 class="titulo">Estadisticas</h3>
							<div class="contenedor d-flex flex-wrap">
								<?php 
								$dao = new SummerDao();
								$students = $dao->getCountStudentAll();
								$summers = $dao->getCountSummerAll();
								$registry = $dao->getCountSummerRegistryAll(); 
								 ?>
								<div class="caja">
									<h3><?php echo $students ?></h3>
									<p>Estudiantes Registrados</p>
								</div>
								<div class="caja">
									<h3><?php echo $summers ?></h3>
									<p>Veranos Creados</p>
								</div>
								<div class="caja">
									<h3>3</h3>
									<p>Veranos Aprobados</p>
								</div>
								<div class="caja">
									<h3><?php echo $registry ?></h3>
									<p>Alumnos registrados a veranos</p>
								</div>
							</div>
						</div>
					</div>

					<div class="columna col-lg-5">
						

						<div class="widget comentarios">
							<h3 class="titulo">Permisos</h3>
							<div class="contenedor">
								<div class="comentario d-flex flex-wrap">
									<form class="form-inline" action="">
										<div class="input-group mb-2 mr-sm-2 mb-sm-0">
						
											<input class="form-control" type="search" placeholder="Buscar" name="search" id="inlineFormInputGroup">
										</div>
    				
    									<button class="btn" hidden="" type="submit">Buscar</button>
  									</form>
  									<div class="text">
  										<p>Hector Alberto Lopez Fabian</p>
  									</div>
									<div class="botones d-flex justify-content-start flex-wrap w-100">
										<button class="aprobar"><i class="icon-user-plus"></i> Asignar</button>
										<button class="eliminar"><i class="icon-user-minus"></i> Quitar</button>
									</div>
								</div>				
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="columna col-lg-12">
						<div class="widget estadisticas">
							<h3 class="titulo">Detalle Veranos</h3>
							<div class="contenedor d-flex flex-wrap">
								<div class="caja">
									<h3>Sistemas Computacionales</h3>
									<p>25 alumnos registrados</p>
									<p>5 veranos creados</p>
									<p>2 veranos aprobados</p>
									<p>0 veranos pendientes</p>
									<p>1 verano cancelado</p>
								</div>
								<div class="caja">
									<h3>Sistemas Computacionales</h3>
									<p>25 alumnos registrados</p>
									<p>5 veranos creados</p>
									<p>2 veranos aprobados</p>
									<p>0 veranos pendientes</p>
									<p>1 verano cancelado</p>
								</div>
								<div class="caja">
									<h3>Sistemas Computacionales</h3>
									<p>25 alumnos registrados</p>
									<p>5 veranos creados</p>
									<p>2 veranos aprobados</p>
									<p>0 veranos pendientes</p>
									<p>1 verano cancelado</p>
								</div>
								<div class="caja">
									<h3>Sistemas Computacionales</h3>
									<p>25 alumnos registrados</p>
									<p>5 veranos creados</p>
									<p>2 veranos aprobados</p>
									<p>0 veranos pendientes</p>
									<p>1 verano cancelado</p>
								</div>
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