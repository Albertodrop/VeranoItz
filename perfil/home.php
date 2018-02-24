<?php 
// Iniciar variables de sessión
@session_start();
// Verificar si el estudiante se encuentra registrado y con un rol de admin
if(isset($_SESSION['student_rol'])){
	header('location:../students/home.php');
}
// En caso de que sea un usuario no logeado cargaran las clases requeridas
require_once '../appsummer.dao/SummerDao.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Incluyendo estilos y demas cosas que necita la cabezara -->
    <?php include '../appsummer.itz/modules/head.php';?>

	<title>Home VeranoItz</title>
   <!-- Actualizar este estilo, pasarlo a ../appsummer.resourse/css/mystyle.css -->
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
    <!-- end style -->
</head>
<body>
    <!-- Inicio del contenido -->
    <!-- incluyendo la barra de navegación tipo usuario -->
    <!-- Tipo usuario: Barra de navegacion para usuarios no logeados -->
	<?php include '../appsummer.itz/modules/menu-nav.php'; ?>

	 <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <!-- Verificando si por el metodo get hay respuesta -->
                    <!-- Variable search: lo que el usuario introduce en el input de busqueda -->
                    <?php if (isset($_GET['search'])) {
                        ?>
                        <!-- si existe una variable por get hace lo siguiente -->
                        <div class="row">
                            <!-- Aqui entra el ciclo while -->
                            <?php
                            $rs = new SummerDao();
                            $rs = $rs->showSummersSeacrh($_GET['search']);
                            // showSummerSearch: recibe como parametro una cadena, esa cadena es con la cual se va a filtrar la busaqueda
                            if (count($rs) > 0) {
                                foreach ($rs as $key => $tem) {
                                    ?>
                            <div class="col-12 col-md-3 mb-4">
                                <!-- start a -->

                                <a href="curso.php?v=<?php echo $tem['summer_id']; ?>" class="course-info">
                                    <div class="card">
                                        <center> 
                                            <!-- Imagen del verano -->
                                            <img src="<?php echo $tem['summer_photo'] ?>" class="mt-3 card-img-top img-fluid img-card"  alt="">
                                        </center>
                                    <div class="card-block">
                                            <!-- Titulo del curso -->
                                        <h4 class="card-title"><?php echo $tem['summer_namecourse'] ?></h4>
                                    <div class="card-info-v">
                                         <p>Organizador (a):<strong> <?php echo $tem['student_name'] . ' ' . $tem['student_firstname'] . ' ' . $tem['student_secondname'] ?></strong></p>
                                        <p>Horario: <?php echo $tem['summer_starthour'] . '-' . $tem['summer_finalhour']; ?></p>
                                         <!--  getCountSummer: recibe como parametro el id del verano al cual se desea saber cuantos estudiantes hasta el momento hay inscritos este asu vez retorna el numero de estudiantes inscritos -->
                                         <?php
                                            $count = new SummerDao();
                                            $count = $count->getCountSummer($tem['summer_id']);
                                            ?>

                                        <p>Inscritos: <span class="card-text text-success"><?php echo $count . '/' . $tem['summer_studentcapacity'] ?></span></p>
                                        <p>Estado: <span class="card-text text-warning">PENDIENTE</span></p>
                                        <p>Carrera: <?php echo $tem['faculty_name'] ?></p>
                                        <hr>
                                        <p>Profesor: <i class="card-text"><?php echo $tem['summer_nameteacher'] ?></i></p>
                                     </div>


                                    </div>
                                    </div>
                                    </a>
                                    <!-- end a -->
                             </div>
        <?php }
    } else {
        ?>
                            <!-- En caso de hallar resultados  -->
                                <div class="col-12 col-md-6 m-auto mt-5">
                                    <h4 class="mt-5">No hay resultados para 
                                        <span class="text-danger"><?php echo $_GET['search'] ?></span>
                                    </h4>
                                 </div>
    <?php } ?>
                          </div>
                        <!-- end if -->
<?php } else {
    ?>
                    <!-- Si no hay variables get -->
                        <div class="row mt-2 mb-5">
                             <div class="col-12">
                                <center><h4>Registrate para crear nuevos veranos</h4></center>
                               <div class="col-12 text-center">
                                    <a href=""  class="nav-link"  title=""  data-toggle="modal" data-target="#fm-entry-summers" ><span class="icon-users"></span> Iniciar sesión/Registro</a>
                               </div>
                               </div>  
                            <!-- Aqui entra el ciclo while -->
                                    <?php
                                    $rs = new SummerDao();
                                    $rs = $rs->showSummersAllHome(); //showSummerAllHome: Muestra todos los veranos existentes sin hacer el filtro de carrera
                                    if (count($rs) > 0) {
                                        foreach ($rs as $key => $tem) {
                                    ?>
                                    <div class="col-12 col-md-3 mb-4">
                                        <a href="curso.php?v=<?php echo $tem['summer_id']; ?>" class="course-info">
                                            <div class="card">
                                                <center> <img src="<?php echo $tem['summer_photo'] ?>" class="mt-3 card-img-top img-fluid img-card" alt=""></center>
                                                <div class="card-block">
                                                    <h5 class="card-title"><?php echo $tem['summer_namecourse'] ?></h5>

                                                     <div class="card-info-v">
                                                        <p>Organizador (a):<strong> <?php echo $tem['student_name'] . ' ' . $tem['student_firstname'] . ' ' . $tem['student_secondname'] ?></strong></p>
                                                        <p>Horario: <?php echo $tem['summer_starthour'] . '-' . $tem['summer_finalhour']; ?></p>
                                                        <!-- start php -->

                                                        <?php
                                                        $count = new SummerDao();
                                                        $count = $count->getCountSummer($tem['summer_id']);
                                                        ?>
                                                        <!-- end php -->

                                                        <p>Inscritos: <span class="card-text text-success"><?php echo $count . '/' . $tem['summer_studentcapacity'] ?></span></p>
                                                        <p>Estado: <span class="card-text text-warning">PENDIENTE</span></p>
                                                        <p>Carrera: <?php echo $tem['faculty_name'] ?></p>
                                                        <hr>
                                                        <p>Profesor: <strong><i class="card-text"><?php echo $tem['summer_nameteacher'] ?></strong></i></p>
                                                    </div>


                                                </div>
                                            </div>
                                        </a>
                                    </div>
    <?php }
    } else {
    ?>
                                <div class="col-12 col-md-6 m-auto mt-5">
                                    <h4>Al parecer no han creado verano</h4>
                                </div>
    <?php } ?>
                              </div>
    <?php } ?>

             </div>
               

            </div>
         </div>
         
       <!-- Actualizar este modal -->
        <div class="modal fade" id="fm-entry-summers" tabindex="-1" role="dialog" aria-labelledby="fm-modal-grid" aria-hidden="true">
            <div class="modal-dialog modal-open">
                <div class="modal-content">
                    <div class="modal-header">
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

	
	<?php include '../appsummer.itz/modules/scripts.php' ?>
    
</body>
</html>