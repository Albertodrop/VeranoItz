<?php 
require_once '../appsummer.dao/SummerDao.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Veranos Itz</title>
	<?php include '../appsummer.itz/modules/head.php';?>



</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php include '../appsummer.itz/modules/menu-nav-admin.php';?>

			<main class="main col ml-4">
				<div class="row">
						<div class="row">
					<div class="col-12">
						<form action="">
								<div class="form-group mb-2">
										<input class="form-control" type="search" placeholder="Buscar Vernao" name="search" id="inlineFormInputGroup">
								</div>
								<div class="form-group">
									<label for="">Filrar por:  </label>
									<select name="" id="" class="form-control">
										<option value="">PENDIENTES</option>
										<option value="">RECHAZADOS</option>
										<option value="">APROBADOS</option>
									</select>
								</div>

								<hr>
							</form>
						<table class="table table-responsive table-hover">
							<thead class="thead-default">
								<th>Clave Verano</th>
								<th>Nombre Asignatura</th>
								<th>Clave Asignatura</th>
								<th>Estados</th>
							</thead>
							<tbody>
								<?php 
								$veranos = new SummerDao();
								$veranos = $veranos->showSummersByFaculty('ISIC-2010-224');
								if (count($veranos)>0) {
									foreach ($veranos as $key => $value){?>
								<tr>
								<td><?php echo $value['summer_id'];?></td>
								<td><?php echo $value['summer_namecourse'];?></td>
								<td><?php echo $value['summer_matterid'];?></td>
								<td align="center">
									<a href="" class="btn btn-success"><i class="icon-checkmark"></i></a>
									<a href="" class="btn btn-danger"><i class="icon-cross"></i></a>
									<a href="" class="btn btn-ver"><i class="icon-eye"></i></a>

								</td>
								</tr>
								<?php }} ?>
							</tbody>
						</table>
					</div>


				</div>
				</div>
				<nav>
					<ul class="pagination d-flex justify-content-center">
						<li class="page-item disabled">
							<span class="page-link" aria-hidden="true">&laquo; Anterior</span>
						</li>
						<li class="page-item active"><a href="#" class="page-link">1</a></li>
						<li class="page-item"><a href="#" class="page-link">2</a></li>
						<li class="page-item"><a href="#" class="page-link">3</a></li>
						<li class="page-item"><a href="#" class="page-link">4</a></li>
						<li class="page-item">
							<a href="#" class="page-link">
								<span aria-hidden="true">Siguiente &raquo; </span>
							</a>
						</li>
					</ul>
				</nav>
			</main>

		</div>
	</div>





	<?php include '../appsummer.itz/modules/scripts.php';?>
</body>
</html>