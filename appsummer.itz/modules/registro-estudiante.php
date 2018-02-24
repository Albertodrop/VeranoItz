	<?php 
			require_once '../appsummer.dao/CarreraDao.php';
		 ?>
		<div class="" id="registro-estudiante">
			<div class="row">
				<div class="col-12 col-md-2"></div>
				<div class="col-12 col-md-8 mt-3">

					
					<!--Aqui va ir el formulario-->
					<form action="../appsummer.controller/controllerstudent.php" method="post" id="registro-estudiante">
					<div class="form-group">
						<label for="student_id">N° Control</label>
						<input type="text" class="form-control"  name="student_id" id="student_id">
					</div>
					<div class="form-group">
						<label for="student_name">Nombre</label>
						<input type="text" class="form-control"  name="student_name" id="student_name">
					</div>
					<div class="row">
						<div class="form-group col-12 col-md-6">
						<label for="student_firstname">Apellido Paterno</label>
						<input type="text" class="form-control"  name="student_firstname" id="student_firstname">
					</div>
					<div class="form-group col-12 col-md-6">
						<label for="student_secondnamestudent_secondname">Apelldio Materno</label>
						<input type="text" class="form-control" name="student_secondname" id="student_secondname">
					</div>
					</div>
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label for="student_email">Correo Electronico</label>
							<input type="email" class="form-control"  name="student_email" id="student_email">
						</div>
						<div class="form-group col-12 col-md-6">
							<label for="student_password">Contraseña</label>
							<input type="password" class="form-control"   name="student_password" id="student_password">
						</div>
					</div>

					<div class="form-group">
						<label for="student_facultyid_faculties">Seleecione su carrera</label>
						<select name="student_facultyid_faculties" id="student_facultyid_faculties" class="form-control">
						<?php 
							$rs = new CarreraDao();
							$rs = $rs->showFaculties();
							foreach ($rs as $key => $item) {?>
							<option value="<?php echo $item['faculty_id'] ?>"><?php echo $item['faculty_name'];?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" name="student_sex" id="hombre" class="form-check-input mr-2" value="hombre">Hombre
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" name="student_sex" id="mujer" class="form-check-input mr-2" value="mujer">Mujer
						</label>
					</div>
					<input type="submit" class="btn btn-primary-b btn-block mb-5" name="submit"  value="Registrar">
					<input type="hidden" name="accion" value="registrar">
				</form>
				</div>
				<div class="col-12 col-md-2"></div>
			</div>
		</div>