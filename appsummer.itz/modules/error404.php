<?php 
@session_start();
session_unset();
session_destroy();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../appsummer.resourse/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../appsummer.resourse/icomoon/style.css">
	<title>Error404</title>
	<style>
		body { background-color:#000}
.error-template {padding: 40px 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }


	</style>

</head>
<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#fm-menu" aria-controls="fm-menu" aria-expanded="false" aria-label="Menu">
                <span class="icon-menu3"></span>
            </button>
            <a href="../../" class="navbar-brand"><span class="icon-home"> 
            </span>Inicio</a>
            
            <div class="collapse navbar-collapse justify-content-end" id="fm-menu">
                
                

                <ul class="navbar-nav">
                
                    <li class="nav-item">
                        <a href="" class="nav-link"  title=""  data-toggle="modal" data-target="#fm-modal-session" ><span class="icon-users"></span> Iniciar sesión</a>
                    </li>   
                    
                </ul>
            </div>
        </div>
    </nav>
        
	<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-12 mt-5">
            <div class="error-template mt-5">
                <h1>
                    Oops!</h1>
                <h2>
                   Error 404 </h2>
                <div class="error-details">
                    Lo sentimos, ha ocurrido un  error , Pagina no encontrada!
                </div>
                <div class="error-actions">
                    <a href="../../" class="btn btn-primary btn-lg"><span class="icon-home"></span>
                        Ir a Home </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-black" id="fm-modal-session" tabindex="-1" role="dialog" aria-labelledby="fm-modal-grid" aria-hidden="true">
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
                                                <img src="../../appsummer.resourse/img/logoitz.png" height="100" alt="">
                                                </div>
                                                <form action="../../appsummer.controller/controllerstudent.php" method="post">
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
                                                    <input type="hidden" name="accion" value="ingresar"
                    >
                                                </form>
                                                <div class="text-center">
                                                    <span>No tengo cuenta </span><a href="../../students/index.php#registro-estudiante">Crear una aquí</a>
                                                </div>



                                        </div>
                                        <div class="col-12 col-md-2"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
		  <script src="../../appsummer.resourse/js/jquery-3.2.1.min.js"></script>
    <script src="../../appsummer.resourse/js/bootstrap.min.js"></script>
</body>
</html>