<?php 
@session_start();
session_unset();
session_destroy();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../appsummer.itz/modules/head.php';?>
	


	<title>Inicio-Sessión</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-4"></div>
			<div class="col-12 col-md-4  mt-5">
				<div class="login-container">
					<h4 class="title-text-s">Inicio de sesión</h4>
					<form action="../appsummer.controller/controllerteachers.php" method="post">
						<div class="row">
							<div class="col-12">
								<div class="form-group i-v">
									<label for="">N° Profsor</label>
									<input type="text" class="form-control " name="teacher_id" id="teacher_id">
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-12">
								<div class="form-group i-v">
									<label for="">Contraseña</label>
									<input type="password" class="form-control" name="teacher_password" id="teacher_password">
								</div>
							</div>
						</div>
							
					
					
					<div class="form-group">
					<input type="hidden" value="ingresar" name="accion">
					<input type="submit" class="btn btn-block btn-primary-b" name="submit" value="Entrar">
					</div>
					</form>
				</div>
					
				
			</div>
			<div class="col-12 col-md-4"></div>
		</div>
	</div>
	
	
	
	
	<?php include '../appsummer.itz/modules/scripts.php' ?>
</body>
</html>