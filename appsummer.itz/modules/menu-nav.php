
<?php @session_start(); ?>
<style>
		body {
			/*padding-top: 56px;*/
			/*padding-bottom: 56px;*/
		}
		@media screen and (max-width:576px){
			.container {
				width: 100%;
			}
		}
	</style>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary-b fixed-top">
		<div class="container">
			<button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#fm-menu" aria-controls="fm-menu" aria-expanded="false" aria-label="Menu">
				<span class="icon-menu3"></span>
			</button>
			<a href="home.php" class="navbar-brand"><span class="icon-home"> 
			</span>VeranosITZ</a>
			
			<div class="collapse navbar-collapse justify-content-end" id="fm-menu">
				
				<form class="form-inline" action="">
					

					<div class="input-group mb-2 mr-sm-2 mb-sm-0">
						
						<input class="buscador" type="search" placeholder="Buscar" name="search" id="inlineFormInputGroup">
						</div>
    				
    				<button class="btn" hidden="" type="submit">Buscar</button>
  				</form>

				<ul class="navbar-nav">
				
					<li class="nav-item">
						<a href="" class="nav-link"  title=""  data-toggle="modal" data-target="#fm-entry-summers" ><span class="icon-users"></span> Iniciar sesión</a>
					</li>	
					
				</ul>
			</div>
		</div>
	</nav>
		<div class="modal fade" id="fm-modal-session" tabindex="-1" role="dialog" aria-labelledby="fm-modal-grid" aria-hidden="true">
					<div class="modal-dialog modal-open">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title"></h4>
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
												<form action="../appsummer.controller/controllerstudent.php" method="post">
													<!-- Verificar si hay variable v -->
													<?php 
													if (isset($_GET['v'])) {
														 $summer_id = $_GET['v'];
														}
													 ?>
													<div class="form-group">
														<label for="">Numero Control</label>
														<input type="number" class="form-control"  name="student_id" id="student_id">
													</div>
													<div class="form-group">
														<label for="">Contraseña</label>
														<input type="password" class="form-control" name="student_password" id="student_password" >
													</div>
													<div class="form-group">
														<input type="submit" class="btn btn-block btn-primary" value="Iniciar Sesión">
													</div>
													<input type="hidden" name="accion" value="ingresar">
													<input type="hidden" name="v" value="<?php echo $summer_id  ?>">
												</form>
												<div class="text-center">
													<span>No tengo cuenta </span><a href="../students/index.php#registro-estudiante">Crear una aquí</a>
												</div>



										</div>
										<div class="col-12 col-md-2"></div>

									</div>
								</div>
							</div>
						</div>
					</div>
	</div>