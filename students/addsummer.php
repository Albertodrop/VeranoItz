<?php 
@session_start();
require_once '../appsummer.dao/CarreraDao.php'; 
require_once '../appsummer.dao/SummerDao.php';
$bool = new SummerDao();
if ($bool->checkCreateSummer($_SESSION['student_id'])) {
	$_SESSION['msj'] = true;
	header('location:../softmor.msj/info.php?type=warning&c=students&a=home&msj= No puedes crear más veranos');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../appsummer.itz/modules/head.php';?>
	<title>Nuevo verano| Crear</title>
</head>
<body>
	
	<?php include '../appsummer.itz/modules/menu-nav-user.php'; ?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-2"></div>
			<div class="col-12 col-md-8 mb-5">
				<div class="summer-container">
					<h4 class="title-text-s">Registrar verano</h4>
					<form action="../appsummer.controller/controllersummer.php" method="post" enctype="multipart/form-data">
						<div class="row mt-3">
							<div class="col-12 col-md-8">
								<div class="form-group i-v">
									<label for="nombre">Nombre Asignatura</label>
									<input type="text" class="form-control" name="summer_namecourse" id="summer_namecourse" autofocus="">
								</div>
							</div>

							<div class="col-12 col-md-4">
								<div class="form-group i-v">
									<label for="nombre">Clave Asignatura </label>
									<input type="text" class="form-control" name="summer_matterid" id="sumer_matterid" placeholder="Ejemplo: AAA000">
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-12 col-md-8">
								<div class="form-group i-v">
									<label for="nombre">Nombre Profesor</label>
									<input type="text" class="form-control" name="summer_nameteacher" id="sumer_nameteacher">
								</div>
							</div>
							<div class="col-12 col-md-4">
								<div class="form-group i-v">
									<label for="nombre">Costo Verano</label>
									<input type="number" class="form-control" name="summer_price" id="summer_price">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<label for="">Estado de privacidad</label>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-8">
								
								<div class="form-check-inline">
									<label class="form-check-label">
									<input type="radio" name="summer_available" id="publico" class="form-check-input mr-2" value="publico" checked="on">Publico
									</label>
								</div>
								<div class="form-check-inline">
									<label class="form-check-label">
									<input type="radio" name="summer_available" id="privado" class="form-check-input mr-2" value="privado">Privado
									</label>
								</div>
							</div>
							<div class="col-12 col-md-4">
								<div class="form-group i-v">
									<label for="nombre">Codigo Verano</label>
									<input type="text" class="form-control " maxlength="6" name="summer_codesearch" id="summer_codesearch" placeholder="(6) Caracteres alfanumericos">
									<div class="val"></div>
								</div>
								
							</div>
						</div>
						<div class="row">
							<div class="col-3 col-md-4">
								<div class="form-group">
									<label for="carrera">Hora Inicial</label>
									<select name="sumer_starthour" id="sumer_starthour" class="form-control">
										<?php 
										for ($i=7; $i <=20 ; $i++) {
											if ($i <= 9) 
												echo "<option value='0$i'>0$i</option>";
											else
												echo "<option value='$i'>$i</option>";
											}
										 ?>
									</select>
								</div>
							</div>
							<div class="col-3 col-md-4">
								<div class="form-group">
									<label for="carrera">Hora Final</label>
									<br>
									<select name="summer_finalhour" id="summer_finalhour" class="form-control">
										
										<?php 
										for ($i=7; $i <=20 ; $i++) {
											if ($i <= 9) 
												echo "<option value='0$i'>0$i</option>";
											else
												echo "<option value='$i'>$i</option>";
											}
										 ?>
									</select>
								</div>
							</div>
							
							<div class="col-6 col-md-4">
								<div class="form-group i-v">
									<label for="nombre">Capacidad Estudiantes</label>
									<input type="number" class="form-control" name="summer_studentcapacity" id="summer_studentcapacity">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="carrera">Seleecione la carrera</label>
									<select name="summer_facultyid_faculties" id="summer_facultyid_faculties" class="form-control">
										<?php 
										$rs = new CarreraDao();
										$rs = $rs->showFaculties();
										foreach ($rs as $key => $item) {?>
										<option value="<?php echo $item['faculty_id'] ?>"><?php echo $item['faculty_name'];?></option>
										<?php } ?>
									</select>
								</div>
							</div>

                            <div class="col-12 col-md-8">
                                <div class="form-group i-v">
                                    <label for="nombre">Contacto del verano</label>
                                    <p>Deja algun numero telefonico o algun dato donde  los participantes se puedan poner  en contacto con usted</p>
                                    <input type="text" class="form-control" name="summer_contact" id="summer_contact">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group i-v">
                                    <br><br><br>
                                    <center><label for="nombre">Registrarme a este verano</label>
                                    <input type="checkbox" class="form-control" name="registry" id="registry" value="on" checked=""></center>
                                </div>
                            </div>
							
						</div>
						<div class="row">
							<div class="col-12">
								<div class="form-group i-v">
									<label for="nombre">Descripción Vernamo</label>
									<textarea class="form-control" name="summer_description" id="summer_description"></textarea>
								</div>
							</div>
						</div>
					
				</div>
				<div class="summer-container">
						<div class="form-group i-v">
						<label for="nombre">Foto Verano</label>
						<input type="file" class="form-control" name="summer_photo" id="summer_photo">
						</div>
						<div class="form-group i-v mt-3">
						<input type="submit" class="form-control btn-block btn-primary-b" name="submit" id="btn-agregar-verano" value="CREAR VERANO">
						<input type="hidden" value="registrar" name="accion">
						</div>
				</form>
				</div>
			</div>
			<div class="col-12 col-md-2"></div>
		</div>
	</div>
	
	<?php include '../appsummer.itz/modules/scripts.php' ?>
	<!-- DINAMIZIDAD-->
	<!-- <script>
		// Elijiendo la hora inicial y calculando la hora final
		$(document).ready(function(){
			$("#summer_finalhour").hide();
			$("#sumer_starthour").change(function(){
				var sumarhora = $("#sumer_starthour option:selected").val();
				sumarhora = parseInt(sumarhora)+4;
				$(".msj").hide(100);
				$("#summer_finalhour").show(100);
				$("#summer_finalhour option:selected").text(sumarhora);
			})
		})

	</script> -->

	<!-- VALIDACIONES -->
	<script>
		
	</script>




	<!-- Verifica si el codigo de busqueda ya existe -->
	<script>
		$('#summer_codesearch').change(function(){
			$.get('../appsummer.controller/controllersummer.php',{
				codesearch:$('#summer_codesearch').val(),
				code:'codesearch',
				baforeSend: function(){
					$('.val').text("Espere un momento por favor...");
				}
			}, function(respuesta){
				$('.val').html(respuesta);
			})
		});
	</script>


</body>
</html>