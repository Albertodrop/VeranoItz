<?php
@session_start();
require_once '../appsummer.dao/SummerDao.php';
require_once '../appsummer.dao/CarreraDao.php';
if (!isset($_SESSION['student_acceso'])) {
    header('loction:index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['summer_id'])) {
        $verano = new SummerDao();
        $verano = $verano->getSummerIdEdit($_GET['summer_id'], $_SESSION['student_id']);
        $i      = count($verano);
        if ($i > 1) {
            $summer_id                  = $verano['summer_id'];
            $summer_available           = $verano['summer_available'];
            $summer_codesearch          = $verano['summer_codesearch'];
            $summer_studentcapacity     = $verano['summer_studentcapacity'];
            $summer_price               = $verano['summer_price'];
            $summer_description         = $verano['summer_description'];
            $summer_namecourse          = $verano['summer_namecourse'];
            $summer_nameteacher         = $verano['summer_nameteacher'];
            $summer_matterid            = $verano['summer_matterid'];
            $summer_starthour           = $verano['summer_starthour'];
            $summer_finalhour           = $verano['summer_finalhour'];
            $summer_facultyid_faculties = $verano['summer_facultyid_faculties'];
            $summer_contact             = $verano['summer_contact'];
            $faculty_name               = $verano['faculty_name'];
        } else {
            header('location:home.php');
        }
    } else {
        header('location:home.php');
    }
} else {
    header('location:home.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../appsummer.itz/modules/head.php';?>
	<title>Editar Verano </title>
</head>
<body>
	<?php include '../appsummer.itz/modules/menu-nav-user.php';?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-2"></div>
			<div class="col-12 col-md-8 mb-5">
				<div class="summer-container">
					<h4 class="title-text-s">Actualizar Verano</h4>
					<form action="../appsummer.controller/controllersummer.php" method="post">
						<div class="row mt-3">
							<div class="col-12 col-md-8">
								<div class="form-group i-v">
									<label for="nombre">Nombre Asignatura</label>
									<input type="text" class="form-control" name="summer_namecourse" id="summer_namecourse" value="<?php echo $summer_namecourse ?>">
								</div>
							</div>

							<div class="col-12 col-md-4">
								<div class="form-group i-v">
									<label for="nombre">Clave Asignatura </label>
									<input type="text" class="form-control" name="summer_matterid" id="sumer_matterid" placeholder="Ejemplo: AAA000" value="<?php echo $summer_matterid ?>">
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-12 col-md-8">
								<div class="form-group i-v">
									<label for="nombre">Nombre Profesor</label>
									<input type="text" class="form-control" name="summer_nameteacher" id="sumer_nameteacher" value="<?php echo $summer_nameteacher ?>">
								</div>
							</div>
							<div class="col-12 col-md-4">
								<div class="form-group i-v">
									<label for="nombre">Costo Verano</label>
									<input type="number" class="form-control" name="summer_price" id="summer_price" value="<?php echo $summer_price ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<label for="">Estado de privacidad</label>
							</div>
						</div>
						<?php
if ($summer_available == 1) {
    $publico = "checked";
    $privado = "";
} else {
    $publico = "";
    $privado = "checked";
}

?>
						<div class="row">
							<div class="col-12 col-md-8">

								<div class="form-check-inline">
									<label class="form-check-label">
									<input type="radio" name="summer_available" id="publico" class="form-check-input mr-2" value="publico" <?php echo $publico ?>>Publico
									</label>
								</div>
								<div class="form-check-inline">
									<label class="form-check-label">
									<input type="radio" name="summer_available" id="privado" class="form-check-input mr-2" value="privado" <?php echo $privado ?>>Privado
									</label>
								</div>
							</div>
							<div class="col-12 col-md-4">
								<div class="form-group i-v">
									<label for="nombre">Codigo Verano</label>
									<input type="text" class="form-control " maxlength="6" name="summer_codesearch" id="summer_codesearch" placeholder="(6) Caracteres alfanumericos" value="<?php echo $summer_codesearch ?>">
									<!--Meter ajax-->
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col-3 col-md-4">
								<div class="form-group">
									<label for="carrera">Hora Inicial</label>
									<select name="sumer_starthour" id="sumer_starthour" class="form-control">
										<?php
echo "<option value='$summer_starthour' selected>$summer_starthour</option>";
for ($i = 7; $i <= 20; $i++) {

    if ($i <= 9) {

        echo "<option value='$i'>0$i</option>";
    } else {

        echo "<option value='$i'>$i</option>";
    }

}
?>
									</select>
								</div>
							</div>
							<div class="col-3 col-md-4">
								<div class="form-group">
									<label for="carrera">Hora Final</label>
									<select name="summer_finalhour" id="summer_finalhour" class="form-control">
										<?php
echo "<option value='$summer_finalhour' selected>$summer_finalhour</option>";
for ($i = 7; $i <= 20; $i++) {
    if ($i <= 9) {
        echo "<option value='$i'>0$i</option>";
    } else {
        echo "<option value='$i'>$i</option>";
    }

}
?>
									</select>
								</div>
							</div>

							<div class="col-6 col-md-4">
								<div class="form-group i-v">
									<label for="nombre">Capacidad Estudiantes</label>
									<input type="number" class="form-control" name="summer_studentcapacity" id="summer_studentcapacity" value="<?php echo $summer_studentcapacity ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="carrera">Seleecione la carrera</label>
									<select name="summer_facultyid_faculties" id="summer_facultyid_faculties" class="form-control">
										<option value="<?php echo $summer_facultyid_faculties; ?>"><?php echo $faculty_name; ?></option>
										<?php
$rs = new CarreraDao();
$rs = $rs->showFaculties();
foreach ($rs as $key => $item) {?>
										<option value="<?php echo $item['faculty_id'] ?>"><?php echo $item['faculty_name']; ?></option>
										<?php }?>
									</select>
								</div>
							</div>

                            <div class="col-12 col-md-6">
                                <div class="form-group i-v">
                                    <label for="nombre">Contacto del vernao</label>
                                    <p>Deja algun numero telefonico o algun dato donde  los participantes se puedan poner  en contacto con usted</p>
                                    <input type="text" class="form-control" name="summer_contact" id="summer_contact" value="<?php echo $summer_contact ?>">
                                </div>
                            </div>


						</div>
						<div class="row">
							<div class="col-12">
								<div class="form-group i-v">
									<label for="nombre">Descripción Vernano</label>
									<textarea class="form-control" name="summer_description" id="summer_description" ><?php echo $summer_description ?></textarea>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group i-v mt-3">
						<input type="submit" class="form-control btn-block btn-primary-b" name="submit" id="btn-agregar-verano" value="ACTUALIZAR VERANO">
						<input type="hidden" value="update" name="accion">
						<input type="hidden" value="<?php echo $summer_id ?>" name="summer_id">
							</div>

						</div>
						</div>

				</div>

				</div>
				</form>



		</div>
	</div>

</body>
</html>