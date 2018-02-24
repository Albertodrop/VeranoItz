<?php
@session_start();
require_once '../appsummer.dao/SummerDao.php';
if (!isset($_SESSION['student_acceso'])) {
    header('location:../');
} else if ($_SESSION['student_rol'] != 'USER-STUDENT') {
    header('location:../perfil/home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../appsummer.itz/modules/head.php'; ?>
        <title>Home Verano Itz</title>
    </head>
    <body>

        <?php include '../appsummer.itz/modules/menu-nav-user.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-9 mb-5 mt-3">
                    <?php if (isset($_GET['search'])) {
                        ?>

                        <div class="row">
                            <!-- Aqui entra el ciclo while -->
                            <?php
                            $rs = new SummerDao();
                            $rs = $rs->showSummersSeacrh($_GET['search']);

                            if (count($rs) > 0) {
                                foreach ($rs as $key => $tem) {
                                    ?>
                                    <div class="col-12 col-md-4 mb-4">
                                        <a href="curso.php?v=<?php echo $tem['summer_id']; ?>" class="course-info">
                                            <div class="card">
                                                <center> <img src="<?php echo $tem['summer_photo'] ?>" class="mt-3 card-img-top img-fluid img-card"  alt=""></center>
                                                <div class="card-block">
                                                    <h4 class="card-title"><?php echo $tem['summer_namecourse'] ?></h4>

                                                    <div class="card-info-v">
                                                        <p>Organizador (a):<strong> <?php echo $tem['student_name'] . ' ' . $tem['student_firstname'] . ' ' . $tem['student_secondname'] ?></strong></p>
                                                        <p>Horario: <?php echo $tem['summer_starthour'] . '-' . $tem['summer_finalhour']; ?></p>
                                                        <?php
                                                        $count = new SummerDao();
                                                        $count = $count->getCountSummer($tem['summer_id']);
                                                        ?>
                                                        <p>Inscritos: <span class="card-text text-success"><?php echo $count . '/' . $tem['summer_studentcapacity'] ?></span></p>
                                                        <p>Estado: <span class="card-text text-warning">PENDIENTE</span></p>
                                                        <p>Carera: <?php echo $tem['faculty_name'] ?></p>
                                                        <hr>
                                                        <p>Profesor: <i class="card-text"><?php echo $tem['summer_nameteacher'] ?></i></p>
                                                    </div>


                                                </div>
                                            </div>
                                        </a>
                                    </div>
        <?php }
    } else {
        ?>
                                <div class="col-12 col-md-6 m-auto mt-5">
                                    <h4>No hay resultados para <span class="text-danger"><?php echo $_GET['search'] ?></span></h4>
                                    <p>Quiero crearlo<a href="addsummer.php"> Ahora mismo</a></p>
                                </div>
    <?php } ?>





                            <!-- Aqui termina el ciclo -->


                        </div>
<?php } else {
    ?>
                        <div class="row">
                            <!-- Aqui entra el ciclo while -->
    <?php
    $rs = new SummerDao();
    $rs = $rs->showSummersHome($_SESSION['student_facultyid_faculties']);
    
    if (count($rs) > 0) {
        foreach ($rs as $key => $tem) {
            ?>
                                    <div class="col-sm-12 col-md-4 mb-4">
                                        <a href="curso.php?v=<?php echo $tem['summer_id']; ?>" class="course-info">
                                            <div class="card">
                                                <center> <img src="<?php echo $tem['summer_photo'] ?>" class="mt-3 card-img-top img-fluid img-card"  alt=""></center>
                                                <div class="card-block">
                                                    <h5 class="card-title"><?php echo $tem['summer_namecourse'] ?></h5>
                                                    <div class="card-info-v">
                                                        <p>Organizador (a):<strong> <?php echo $tem['student_name'] . ' ' . $tem['student_firstname'] . ' ' . $tem['student_secondname'] ?></strong></p>
                                                        <p>Horario: <?php echo $tem['summer_starthour']  . '-' . $tem['summer_finalhour']; ?></p>
                                                        <?php
                                                        $count = new SummerDao();
                                                        $count = $count->getCountSummer($tem['summer_id']);
                                                        ?>
                                                        <p>Inscritos: <span class="card-text text-success"><?php echo $count . '/' . $tem['summer_studentcapacity'] ?></span></p>
                                                        <p>Estado: <span class="card-text text-warning">PENDIENTE</span></p>
                                                        <p>Carera: <?php echo $tem['faculty_name'] ?></p>
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
                                    <h4>Al parecer no han creado verano para tu carrera</h4>
                                    <p>Se el primero en hacerlo <a href="addsummer.php">Haz click aquí</a></p>
                                </div>
    <?php } ?>





                            <!-- Aqui termina el ciclo -->


                        </div>
<?php } ?>





                </div>
                <div class="columna col-md-3 mt-3">

<?php
$mv = new SummerDao();
$mv = $mv->showMySummersCreating($_SESSION['student_id']);

if (count($mv) > 0) {
    ?>
                        <h4 class="ml-3">Mi verano creado <?php echo date('Y') ?></h4>
                        <?php foreach ($mv as $key => $mvrs) { ?>

                            <!-- Aqui empiza el ciclo -->

                            <div class="col-12 col-md-12 mb-5">
                                <div class="card">
                                    <center><img src="<?php echo $mvrs['summer_photo'] ?>" class="card-img-top img-fluid mt-3" alt="" height="200" width="200"></center>
                                    <div class="card-block">
                                        <h4 class="card-title"><?php echo $mvrs['summer_namecourse'] ?></h4>

                                        <p>Estado: <span class="card-text text-warning"><?php echo $mvrs['summer_status'] ?></span></p>
                                        <div class="text-center">

                                            <a href="#" class="btn btn-danger mt-3 btn-block consirm icon-bin" onclick="eliminarVerano('<?php echo $mvrs['summer_id']; ?>')"> Eliminar</a>


                                            <form action="updsummer.php" method="get" id="form-edi">
                                                <button class="btn-warning btn btn-block mt-1 bl"><i class="icon-pencil"></i> Editar</button>
                                                <input type="hidden" name="summer_id" value="<?php echo $mvrs['summer_id'] ?>">

                                            </form>
                                            <form action="participantes.php" method="get" id="form-edi">
                                                <button class="btn-primary btn btn-block mt-1 bl"><i class="icon-eye"></i> Ver verano</button>
                                                <input type="hidden" name="summer_id" value="<?php echo $mvrs['summer_id'] ?>">

                                            </form>

                                            <hr>
                                            <form  action="../appsummer.controller/controllersummer.php" method="get">
                                                <div class="col-12 col-md-12">
                                                    <span>Agregar Participantes</span>
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" placeholder="N° Control" maxlength="8" name="summer_nocontrol" id="inlineFormInputGroup">
                                                    <input type="hidden" name="summer_id" value="<?php echo $mvrs['summer_id'] ?>">
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <button class=" btn btn-success btn-block mt-1 bl ml-2"><i class="icon-user-plus"></i> Agregar </button>
                                                </div>

                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>

    <?php }
} ?>
                    <!-- Aqui terminara el ciclo -->
                    <!-- Borrar de aquí... -->

                    <!-- Hasta aquí -->

                </div>


            </div>

        </div>
        <div class="modal fade" id="fm-edit-summers" tabindex="-1" role="dialog" aria-labelledby="fm-modal-grid" aria-hidden="true">
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




        <?php include '../appsummer.itz/modules/scripts.php' ?>
    </body>
</html>