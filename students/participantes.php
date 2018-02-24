<?php
@session_start();
if (!isset($_SESSION['student_id'])) {
	header('location:../');
}
require_once '../appsummer.dao/SummerDao.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../appsummer.itz/modules/head.php';?>
	<title>Participantes</title>
</head>
<body>

	<?php include '../appsummer.itz/modules/menu-nav-user.php';?>
	<div class="container">
		<div class="row">
			<?php
if (isset($_GET['summer_id'])) {
    $ver = new SummerDao();
    $ver = $ver->getSummerIdEdit($_GET['summer_id'], $_SESSION['student_id']);
    $i   = count($ver);
    if ($i > 1) {
        $summer_id          = $ver['summer_id'];
        $summer_namecourse  = $ver['summer_namecourse'];
        $summer_matterid    = $ver['summer_matterid'];
        $summer_nameteacher = $ver['summer_nameteacher'];
        $summer_starthour   = $ver['summer_starthour'];
        $summer_finalhour   = $ver['summer_finalhour'];
        $faculty_name       = $ver['faculty_name'];
        $faculty_id         = $ver['faculty_id'];

    } else {
        header('location:home.php');
    }
}

?>

			<div class="col-12 col-md-8 mt-5">
			<h5>Materia: <?php echo $summer_namecourse ?></h5>
			<h5>Clave Materia: <?php echo $summer_matterid ?></h5>
			<h5>Profesor: <?php echo $summer_nameteacher ?></h5>

			</div>
			<div class="col-12 col-md-4 mt-5 spn">

			<p>Horario: <?php echo $summer_starthour . '-' . $summer_finalhour ?></p>
			<p>Carrera: <?php echo $faculty_name ?></p>
			<p>Clave: <?php echo $faculty_id ?></p>
			</div>
		</div>
		<div class="container">
		<div class="row">
			<div class="col-md-2 col-12">

			</div>
			<div class="col-12 col-md-8">
				<table class="table table-responsive table-hover">
					<thead class="thead-default">
						<th># Control</th>
						<th>Nombre (s)</th>
						<th>Apellidos</th>
						<th>Clave carrera</th>
						<th>Estado</th>
						<th></th>
					</thead>
					<?php
$ps = new SummerDao();
$ps = $ps->getStudentSummer($summer_id);

?>
					<tbody>
						<?php
foreach ($ps as $key => $value) {
    ?>

						<tr>
							<td><?php echo $value['student_id'] ?></td>
							<td><?php echo $value['student_name'] ?></td>
							<td><?php echo $value['student_firstname'] . ' ' . $value['student_secondname'] ?></td>
							<td><?php echo $value['student_facultyid_faculties'] ?></td>
							<?php
$student_id = $value['student_id'];

    if ($value['rs_status'] == 'PAGO PENDIENTE') {

        echo "<td><a href ='../appsummer.controller/controllersummer.php?student_id=$student_id&summer_id=$summer_id&rs_status=PAGO PENDIENTE' class='btn btn-danger btn-block mt-1 mb-1 bl ml-2'>PENDIENTE</a></td>";

    } else {

        echo "<td><a href ='../appsummer.controller/controllersummer.php?student_id=$student_id&summer_id=$summer_id&rs_status=PAGADO' class='btn btn-success btn-block mt-1 mb-1 bl ml-2'>PAGADO</a></td>";
    }
    ?>

						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
			<div class="col-md-2 col-12">
				<a href="generar-reprte.php?summer_id=<?php echo $summer_id; ?>" class=" btn btn-block btn-danger" target="_blanck"><i class="icon-file-pdf"></i> PDF</a>
				 <form action="updsummer.php" method="get" id="form-edi">
                    <button class="btn-warning btn btn-block mt-1 bl"><i class="icon-pencil"></i> Editar</button>
                    <input type="hidden" name="summer_id" value="<?php echo $summer_id; ?>">

                  </form
			</div>

		</div>
		</div>


	<?php include '../appsummer.itz/modules/scripts.php';?>
</body>
</html>