<?php
@session_start();
require '../appsummer.dao/SummerDao.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Curso</title>
	<?php include '../appsummer.itz/modules/head.php';?>

</head>
<body>
	<?php include '../appsummer.itz/modules/menu-nav-user.php';?>
	<div class="curso">

	</div>
	<div class="container">
			<div class="info-curso caja-b">
				<div class="container">
					<div class="row">
						<?php

if (isset($_GET['v'])) {
    $issetCourse = true;
    $summer_id   = '';
    $rs          = new SummerDao();
    $rs          = $rs->getSummerId($_GET['v']);
    if (count($rs > 0)) {
        $summer_id = $rs['summer_id']?>
						<div class="col-12 col-md-4">
							<center><img src="<?php echo $rs['summer_photo'] ?>" alt="" width="270" height="200" class = "mt-3 card-img-top img-fluid" ></center>
							<br>
							<center><h4 class="mt-1"><?php echo $rs['summer_namecourse'] ?></h4></center>
						</div>

									<div class="col-12 col-md-8">
							<div class="text-center-v">
								<!-- <p>Profesor: Lopez Duran Errique</p>
								<p>Carrera: Ing. Sistemas Computacionales</p>
								<p>Estado: <span class="text-warning">PENDIENTE</span></p> -->
								<div class="row">
									<div class="col-12 col-md-6">
										<p>Profesor: <?php echo $rs['summer_nameteacher'] ?></p>
										<p>Carrera: <?php echo $rs['faculty_name'] ?></p>
										<p>Estado: <span class="text-warning"><?php echo $rs['summer_status'] ?></span></p>
										<p>Organizador(a): <?php echo '   ' . $rs['student_name'] . ' ' . $rs['student_firstname']; ?></p>
										<p>Cupo: <?php echo $rs['summer_studentcapacity'] ?></p>

                                        <?php
$price   = $rs['summer_price'];
        $student = $rs['summer_studentcapacity'];

        $count = new SummerDao();
        $count = $count->getCountSummer($summer_id);
        echo "<p>Costo Total: $price</p>";
        if ($count == 0) {
            echo "<p class='txt-bold'>Costo por alumno: ---</p>";

        } else {
            $pricestudent = round($price / $count, 2);
            echo "<p class='txt-bold'>Costo por alumno: $pricestudent  <i class='icon-eye' data-toggle='tooltip' data-placement='top' title='El precio por alumno ira disminuyendo conforme incremente el numero de alumnos inscritos'></i></p>";

        }

        ?>



									</div>
									<div class="col-12 col-md-6">
										<p>Fecha Registro: <?php echo $rs['summer_dateregistry'] ?></p>
										<p>Clave Asignatura: <?php echo $rs['summer_matterid'] ?></p>
										<p>Horario: <?php echo $rs['summer_starthour'] . '-' . $rs['summer_finalhour'] ?></p>
										<p>Contacto: <?php echo $rs['summer_contact'] ?></p>

										<p>Inscritos: <?php echo $count; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<p class="mb-3">Descripción:</p>
										<p><?php echo $rs['summer_description'] ?></p>
										<hr>
										<div class="row">
											<div class="col-12 text-center">

												<?php
$res = new SummerDao();
        $res = $res->showUserRegistry($_SESSION['student_id'], $summer_id);
        if ($res) {?>
												<a href="#participantes" class="ins-v" data-toggle="tab"> <span class="icon-checkmark c-v"></span>Ver participantes</a>
												<?php } else {
            if ($rs['summer_available'] == 0) {?>
            <a href="#" class="ins-v" onclick="setCodeSearch('<?php echo $rs['summer_id'] ?>')"> <span class="icon-checkmark c-v"></span>Inscribirme</a>



         									 <?php } else {?>
         									 <?php if (isset($_GET['r'])){
         									 	$students_id = $_SESSION['student_id'];?>
         									 	<div class="msj-registro">Espere un momento...</div>
         									  <script>
												
												
												location.href = '../appsummer.controller/controllersummer.php?idv=<?php echo $summer_id ?>&ids=<?php echo $_SESSION['student_id'] ?>';
													
												

												</script> 
         									<?php } else{?>
												<a href="../appsummer.controller/controllersummer.php?idv=<?php echo $summer_id ?>&ids=<?php echo $_SESSION['student_id'] ?>" class="ins-v"> <span class="icon-checkmark c-v"></span>Inscribirme</a>
         								<?php	}}}?>

												<a href="#comentar" class="ins-v c" data-toggle="tab"> <span class="icon-bubble"></span> Comentar</a>
											</div>

										</div>

									</div>
								</div>
							</div>
						</div>

							<?php
} else {
        header('location:../softmor.msj/info.php?type=warning&c=students&a=home&msj=El verano que usted busca no se encuentra');
    }
}?>



					</div>
				</div>

			</div>

	</div>
	<div class="container tab-content">
	
			<div class="participantes caja-b tab-pane active" id="participantes" role="tabpanel">
				
			<center><h5><?php echo $count . ' Partcipantes de ' . $student . ':'; ?></h5></center>
			<?php
$ps = new SummerDao();
$ps = $ps->getStudentSummer($summer_id);
?>
			<div class="container">
				<div class="row">
				<div class="col-12 col-md-2"></div>
				<div class="col-12 col-md-10 m-auto">
					<table class="table table-responsive table-hover text-center">
			<thead class="thead-default">
				<th>NOMBRE</th>
				<th>APELLIDOS</th>
				<th>NO CONTROL</th>
				<th>CARRERA</th>
				<th>TELEFONO</th>
			</thead>
			<tbody>
				<?php if ($ps > 0) {
    foreach ($ps as $key => $value) {?>
				<tr>
					<td><?php echo $value['student_name'] ?></td>
					<td><?php echo $value['student_firstname'] . ' ' . $value['student_secondname'] ?></td>
					<td><?php echo $value['student_id'] ?></td>
					<td><?php echo $value['student_facultyid_faculties'] ?></td>
					<td><?php echo $value['student_telephone'] ?></td>
				</tr>
				<?php }}?>
			</tbody>
		</table>
				</div>
				<div class="col-12 col-md-2"></div>
			</div>
			</div>
			
			</div>
			<div class="participantes caja-b tab-pane" id="comentar" role="tabpanel">
				<h4>Comentarios</h4>
			</div>

	</div>
	<div class="modal fade" id="fm-modal-session" tabindex="-1" role="dialog" aria-labelledby="fm-modal-grid" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="">Necesitas iniciar sesion</h5>
								<button class="close" data-dismiss="modal" aria-label="Cerrar">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								<div class="container-fluid">
									<div class="row">
										<div class="col-12 col-md-2"></div>
										<div class="col-12 col-md-8 mt-3">
											<div class="text-center">
												<img src="../appsummer.resourse/img/logoitz.png" height="100" alt="">
												</div>
												<form action="">
													<div class="form-group">
														<label for="">Numero Control</label>
														<input type="number" class="form-control">
													</div>
													<div class="form-group">
														<label for="">Contraseña</label>
														<input type="password" class="form-control">
													</div>
													<div class="form-group">
														<input type="submit" class="btn btn-block btn-primary" value="Iniciar Sesión">
													</div>
												</form>
												<div class="text-center">
													<span>No tengo cuenta </span><a href="">Crear una aquí</a>
												</div>



										</div>
										<div class="col-12 col-md-2"></div>

									</div>
								</div>
							</div>
						</div>
					</div>
	</div>


	<?php include '../appsummer.itz/modules/scripts.php';?>
	
</body>
</html>