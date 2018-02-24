<div class="">
			<div class="row">
				<div class="col-12 col-md-2"></div>
				<div class="col-12 col-md-8 mt-3">
					<!--Aqui va ir el formulario-->
					<form action="" method="post">
					<div class="form-group">
						<label for="teacher_id">N° PROFESOR</label>
						<input type="text" class="form-control"  name="teacher_id" id="teacher_id">
					</div>
					<div class="form-group">
						<label for="teacher_name">Nombre</label>
						<input type="text" class="form-control"  name="teacher_name" id="teacher_name">
					</div>
					<div class="row">
						<div class="form-group col-12 col-md-6">
						<label for="teacher_firstname">Apellido Paterno</label>
						<input type="text" class="form-control"  name="teacher_firstname" id="teacher_firstname">
					</div>
					<div class="form-group col-12 col-md-6">
						<label for="teacher_secondname">Apelldio Materno</label>
						<input type="text" class="form-control" name="teacher_secondname" id="teacher_secondname">
					</div>
					</div>
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label for="teacher_email">Correo Electronico</label>
							<input type="email" class="form-control"  name="teacher_email" id="teacher_email">
						</div>
						<div class="form-group col-12 col-md-6">
							<label for="teacher_password">Contraseña</label>
							<input type="password" class="form-control"   name="teacher_password" id="teacher_password">
						</div>
					</div>

					<div class="form-group">
						<label for="teacher_departamentid_departaments">Seleecione su Departamento</label>
						<select name="teacher_departamentid_departaments" id="teacher_departamentid_departaments" class="form-control">
							<option value="Sistemas">Depto. Sistemas</option>
							<option value="Bioquimica">Depto. Bioquimica</option>
							<option value="Civil">Depto. Civil</option>
							<option value="Basicas">Depto. Basicas</option>
						</select>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" name="teacher_sex" id="hombre" class="form-check-input mr-2" value="hombre">Hombre
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" name="teacher_sex" id="mujer" class="form-check-input mr-2" value="mujer">Mujer
						</label>
					</div>
					<button class="btn btn-primary-b btn-block mb-5" type="submit" name="submit" >Registrar</button>
				</form>
				</div>
				<div class="col-12 col-md-2"></div>
			</div>
		</div>