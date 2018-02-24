<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<?php include '../appsummer.itz/modules/head.php' ;
			require_once '../appsummer.dao/CarreraDao.php';
			require_once '../appsummer.dao/DepartamentoDao.php';
	?>
	
	
	<title>Veranos Itz</title>
</head>
<style>
	.card-v{
		padding: 10px;
		box-shadow: none;
		margin-bottom: 5px;
	}
	.control-label label{
		font-weight: bold;
		font-size: 16px;
	}
</style>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php include '../appsummer.itz/modules/menu-nav-admin.php'; ?>

			<main class="main col">
				<div class="row">
					<div class="columna col-lg-12">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="row">
									<div>
								<a href="" data-toggle="modal" data-target="#fm-modal-grid">Agregar Carreras</a>
							</div>
							<table class="table table-bordered table-hover table-responsive">
								<thead class="thead-default">
									<td>ID CARRERA</td>
									<td>NOMBRE CARRARA</td>
									<td>EDIFICIO</td>
									<td>ACCIONES</td>
								</thead>
								<tbody>
									<?php 
									$rs = new CarreraDao();
									$rs = $rs->showFaculties();
									foreach ($rs as $key => $item) {?>
									<tr>
										<td><?php echo $item['faculty_id'] ?></td>
										<td><?php echo $item['faculty_name'] ?></td>
										<td><?php echo $item['faculty_building'] ?></td>
										<td>
											<form action="" method="get">
												<input type="hidden" name="faculty_id_get" value="<?php echo $item['faculty_id'] ?>">
												<input type="submit" value="Editar" class="btn btn-warning mb-1 btn-block">
											</form>
											<form action="../appsummer.controller/controllerfaculties.php" method="post">
												<input type="hidden" name="faculty_id" value="<?php echo $item['faculty_id'] ?>">
												<input type="submit" value="Eliminar" class="btn btn-danger mb-1 btn-block">
												<input type="hidden" name="accion" value="delete">
											</form>
										</td>
										
									</tr>
										
									<?php } ?>
								</tbody>
							</table>
								</div>
								<!-- Desarrollando esta parte -->
							<div class="row">
								
							<div>
								<a href="" data-toggle="modal" data-target="#fm-departament">Agregar Departamentos</a>
							</div>
							<table class="table table-bordered table-hover table-responsive">
								<thead class="thead-default">
									<td>ID DEPARTAMENTO</td>
									<td>NOMBRE DEPARTAMENTO</td>
									<td>ACCIONES</td>
								</thead>
								<tbody>
									<?php 
									$rs = new DepartamentoDao();
									$rs = $rs->showDepartaments();
									foreach ($rs as $key => $item) {?>
									<tr>
										<td><?php echo $item['departament_id'] ?></td>
										<td><?php echo $item['departament_name'] ?></td>
										
										<td>
											<form action="" method="get">
												<input type="hidden" name="departament_id_get" value="<?php echo $item['departament_id'] ?>">
												<input type="submit" value="Editar" class="btn btn-warning mb-1 btn-block">
											</form>
											<form action="../appsummer.controller/controllerDepartaments.php" method="post">
												<input type="hidden" name="departament_id" value="<?php echo $item['departament_id'] ?>">
												<input type="submit" value="Eliminar" class="btn btn-danger mb-1 btn-block">
												<input type="hidden" name="accion" value="delete">
											</form>
										</td>
										
									</tr>
										
									<?php } ?>
								</tbody>
							</table>

							</div>
							<!-- Hasta aquí -->
							</div>
							
							





							
							<div class="modal fade" id="fm-modal-grid" tabindex="-1" role="dialog" aria-labelledby="fm-modal-grid" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Ingresar Carreras</h5>
                                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                        	<form action="../appsummer.controller/controllerfaculties.php" method="post">
											<div class="control-label">
												<label for="faculty_name" class="ml-2">Nombre Carrera</label>
												<input type="text" class="form-control" name="faculty_name">
											</div>
											<div class="control-label">
												<label for="faculty_id" class="ml-2">Clave Carrera</label>
												<input type="text" class="form-control" name="faculty_id">
											</div>
											<div class="control-label mb-3">
												<label for="faculty_building" class="ml-2">Edificio</label>
												<input type="text" class="form-control" name="faculty_building">
											</div>
											<div class="row">
												<div class="col-12  mb-3">
													<input type="submit" class="btn btn-primary form-control" name="faculty_submit" value="Agregar">
												</div>
												<input type="hidden" name="accion" value="registrar">
											</div>
										</form>
                                        </div>
                                    </div>
                                </div>
                            </div>       
                        </div>
                    </div>
    </div>	
    <div class="modal fade" id="fm-departament" tabindex="-1" role="dialog" aria-labelledby="fm-departament" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Ingresar Departamento</h5>
                                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                        	<form action="../appsummer.controller/controllerdepartaments.php"  method="post">
											<div class="control-label">

												<label for="departament_id" class="ml-2">ID Departamento.</label>
												<input type="text" class="form-control" name="departament_id">
											</div>
											<div class="control-label">
												<label for="departament_name" class="ml-2">Nombre Departamento.</label>
												<input type="text" class="form-control" name="departament_name">
											</div>
											
											<div class="row">
												<div class="col-12  mb-3">
													<input type="submit" class="btn btn-primary form-control mt-3" name="departament_submit" value="Agregar">
												</div>
												<input type="hidden" name="accion" value="registrar">
											</div>
										</form>
                                        </div>
                                    </div>
                                </div>
                            </div>       
                        </div>
                    </div>
    </div>

							<div class="col-12 col-md-6 mt-5">
								<?php 
							if (isset($_GET['faculty_id_get'])) { 
									$faculty_id = $_GET['faculty_id_get'];
									$rs = new CarreraDao();
									$rs = $rs->showFacultiesId($faculty_id);
									if ($rs>0) {?>

									<form action="../appsummer.controller/controllerfaculties.php" method="post">
											<div class="control-label">
												<label for="faculty_name" class="ml-2">Nombre Carrera</label>
												<input type="text" class="form-control" name="faculty_name"
												value="<?php echo $rs['faculty_name']; ?>">
											</div>
											<div class="control-label">
												<label for="faculty_id" class="ml-2">Clave Carrera</label>
												<input type="text" class="form-control" name="faculty_id"
												value="<?php echo $rs['faculty_id']; ?>">
											</div>
											<div class="control-label mb-3">
												<label for="faculty_building" class="ml-2">Edificio</label>
												<input type="text" class="form-control" name="faculty_building"
												value="<?php echo $rs['faculty_building'];?>">
											</div>
											<div class="row">
												<div class="col-12  mb-3">
													<input type="submit" class="btn btn-primary form-control mb-2" name="faculty_submit" value="Actualizar">
													<a href="conf.php" class="btn-warning btn btn-block">Cancelar</a>
												</div>
												<input type="hidden" name="accion" value="update">
												<input type="hidden" name="id_get" value="<?php echo $faculty_id ?>">
											</div>
										</form>
                                      
                                   
							<?php }else {?>
							<div class="alert alert-danger mt-5 text-center">
					<strong>Aviso</strong> La Carera no existe.
				</div>
							<?php }}else if(isset($_GET['departament_id_get'])){
								$departament_id = $_GET['departament_id_get'];

									$rs = new DepartamentoDao();
									$rs = $rs->showDepartamentsId($departament_id);
									if ($rs>0) {?>

									<form action="../appsummer.controller/controllerdepartaments.php" method="post">
										<div class="control-label">
												<label for="departament_id" class="ml-2">Clave Departamento</label>
												<input type="text" class="form-control" name="departament_id"
												value="<?php echo $rs['departament_id']; ?>">
											</div>
											<div class="control-label">
												<label for="departament_name" class="ml-2">Nombre Departamento</label>
												<input type="text" class="form-control" name="departament_name"
												value="<?php echo $rs['departament_name']; ?>">
											</div>
											
											
											<div class="row">
												<div class="col-12  mt-3">
													<input type="submit" class="btn btn-primary form-control mb-2" name="departament_submit" value="Actualizar">
													<a href="conf.php" class="btn-warning btn btn-block">Cancelar</a>
												</div>
												<input type="hidden" name="accion" value="update">
												<input type="hidden" name="id_get" value="<?php echo $departament_id ?>">
											</div>
										</form>
                                      
                                   
							<?php }else {?>
							<div class="alert alert-danger mt-5 text-center">
					<strong>Aviso</strong> El Departamento no existe.
				</div>
							<?php }} ?>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
	<?php include '../appsummer.itz/modules/scripts.php' ?>
</body>	

	<!-- <div class="modal fade" id="fm-modal-grid" tabindex="-1" role="dialog" aria-labelledby="fm-modal-grid" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Insertar</h5>
                                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                        </div>
                                    </div>
                                </div>
                            </div>       
                        </div>
                    </div>
    </div>	
 -->

