<?php
@session_start();
if (!isset($_SESSION['student_acceso'])) {
    header('location:../');
}
require_once '../appsummer.dao/SummerDao.php';
require_once '../appsummer.dao/CarreraDao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <?php include '../appsummer.itz/modules/head.php';?>
    <title>Mi Perfil</title>
</head>
<body>
    <?php include '../appsummer.itz/modules/menu-nav-user.php';?>
    <div class="container">
        <div class="miperfil">
            <div class="row mt-5">
                <div class="col-12 col-md-1">
                    <a href="" class="conf-perfil" id="menu-categorias" title="Configurar mi Perfil" data-toggle="modal" data-target="#fm-modal-miperfil"><span class="icon-cog"></span></a>
                </div>

                <div class="col-12 col-md-5 mt-3">
                    <div class="img">

                        <img src="<?php echo $_SESSION['student_photo']; ?>" alt="" class="my-photo">

                    </div>
                </div>
                <div class="col-12 col-md-6 mt-3">

                <h5><?php echo $_SESSION['student_name'] . ' ' . $_SESSION['student_firstname'] . ' ' . $_SESSION['student_secondname'] ?></h5>
                <p>Carera: <?php echo $_SESSION['student_facultyid_faculties']; ?></p>
                <p>Correo: <?php echo $_SESSION['student_email']; ?></p>
                <p>Numero Telefonico: <?php echo $_SESSION['student_telephone']; ?></p>
                <p>Rol: <?php echo $_SESSION['student_rol']; ?></p>
                <p>Sexo: <?php echo $_SESSION['student_sex'] ?></p>
                <p></p>
                </div>
                
            </div>

        </div>
        <div class="miperfil p-3 mt-5 mb-5">
            <div class="row ">
                <div class="col-12 mt-3">
                    <h5 class="mb-3">Veranos en los que participo:</h5>
                    <div class="row">
                    <!-- Aqui entra el ciclo while -->
                                         <?php

$rs = new SummerDao();
$rs = $rs->showMySummers($_SESSION['student_id']);

foreach ($rs as $key => $tem) {?>
                                        <div class="col-12 col-md-6  mb-4 ">

                        <div class="card" id="#veranos">
                                                    <center> <img src="<?php echo $tem['summer_photo'] ?>" class="mt-3 card-img-top img-fluid img-card"  alt=""></center>
                        <div class="card-block">
                        <h4 class="card-title"><?php echo $tem['summer_namecourse'] ?></h4>

                        <div class="card-info-v">
                            <p>Horario: <?php echo $tem['summer_starthour'] . '-' . $tem['summer_finalhour'] ?> </p>
                            <p>Estado: <span class="card-text text-warning"><?php echo $tem['summer_status'] ?></span></p>
                            <hr>
                            <p>Profesor: <i class="card-text"><?php echo $tem['summer_nameteacher'] ?></i></p>
                            <a href="curso.php?v=<?php echo $tem['summer_id']; ?>" class="btn btn-primary mt-3 btn-block">Ver curso</a>

                                <!-- <a href="#" class="btn btn-danger mt-3 btn-block consirm" onclick="$.confirm({ icon: 'fa fa-warning',title: '¿Estas seguro(a) que deseas salir de este verano?',content: '',type: 'red',typeAnimated: true,columnClass: 'col-md-6 col-md-offset-3',buttons: { Si: { btnClass: 'btn-red',action: function () {location.href = '../appsummer.controller/controllersummer.php?summer_id=&btn-salir'; } } ,Cancelar: { btnClass: 'btn-info',action: function () {}}} } );">Abandonar Verano</a> -->
                                <a href="#" class="btn btn-danger mt-3 btn-block consirm" onclick="abandonarVerano('<?php echo $tem['summer_id']; ?>')">Abandonar Verano</a>



                        </div>


                        </div>
                        </div>

                    </div>
                                        <?php }?>


<!-- <a class="confirm" data-title="¿Estas seguro(a)?" href="" onclick="h()">Goto twitter</a>
                                          -->

                    <!-- Aqui termina el ciclo -->


                </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="fm-modal-miperfil" tabindex="-1" role="dialog" aria-labelledby="fm-modal-grid" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Configuración de mi perfil</h5>
                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-2"></div>
                                    <div class="col-12 col-md-8 mt-3">


                                        <!--Aqui va ir el formulario-->
                                        <form action="../appsummer.controller/controllerstudent.php" method="post">
                                            <div class="form-group">
                                                <label for="student_id">N° Control</label>
                                                <input type="text" class="form-control"
                                                       value = "<?php echo $_SESSION['student_id'] ?>" disabled>
                                                <input type="hidden" class="form-control"  name="student_id" id="student_id"
                                                       value = "<?php echo $_SESSION['student_id'] ?>" >
                                            </div>
                                            <div class="form-group">
                                                <label for="student_name">Nombre</label>
                                                <input type="text" class="form-control"  name="student_name" id="student_name"
                                                       value = "<?php echo $_SESSION['student_name'] ?>">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12 col-md-6">
                                                    <label for="student_firstname">Apellido Paterno</label>
                                                    <input type="text" class="form-control"  name="student_firstname" id="student_firstname"
                                                           value = "<?php echo $_SESSION['student_firstname'] ?>">
                                                </div>
                                                <div class="form-group col-12 col-md-6">
                                                    <label for="student_secondnamestudent_secondname">Apelldio Materno</label>
                                                    <input type="text" class="form-control" name="student_secondname" id="student_secondname"
                                                           value = "<?php echo $_SESSION['student_secondname'] ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12 col-md-6">
                                                    <label for="student_email">Correo Electronico</label>
                                                    <input type="email" class="form-control"  name="student_email" id="student_email"
                                                           value = "<?php echo $_SESSION['student_email'] ?>">
                                                </div>
                                                <div class="form-group col-12 col-md-6">
                                                    <label for="student_password">Contraseña</label>
                                                    <input type="password" class="form-control"   name="student_password" id="student_password"
                                                           value = "<?php echo $_SESSION['student_password'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="student_facultyid_faculties">Seleecione su carrera</label>
                                                <select name="student_facultyid_faculties" id="student_facultyid_faculties" class="form-control">
                                                    <?php
$rs = new CarreraDao();
$rs = $rs->showFaculties();
foreach ($rs as $key => $item) {?>
                                                    <option value="<?php echo $item['faculty_id'] ?>"><?php echo $item['faculty_name']; ?></option>
                                                    <?php if ($item['faculty_id'] == $_SESSION['student_facultyid_faculties']) {?>
                                                            <option value="<?php echo $item['faculty_id'] ?>" selected><?php echo $item['faculty_name']; ?></option>

                                                     <?php }?>



                                                    <?php }?>
                                                </select>

                                            </div>
                                            <div class="form-group col-12 col-md-12">
                                                <label for="student_password">Agregue numero de telefono</label>
                                                <input type="number" class="form-control"   name="student_telephone" id="student_telephone"
                                                       value = "<?php echo $_SESSION['student_telephone'] ?>">
                                            </div>
                                            <div class="form-group col-12 col-md-12">
                                                <center><label for="">Quiero que mi numero de telefono lo vean</label></center>
                                                <?php
if ($_SESSION['student_privacity'] == 'n' || $_SESSION['student_privacity'] == '') {
    $all    = "";
    $nating = "checked";
    $org    = "";
} else if ($_SESSION['student_privacity'] == 'all') {
    $all    = "checked";
    $nating = "";
    $org    = "";

} else if ($_SESSION['student_privacity'] == 'o') {
    $all    = "";
    $nating = "";
    $org    = "checked";

}

?>

                                               <center> <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="student_privacity" id="all" class="form-check-input mr-2" value="all" <?php echo $all ?>>Todos
                                                    </label>
                                                    <label class="form-check-label">
                                                        <input type="radio" name="student_privacity" id="o" class="form-check-input ml-2 mr-2" value="o" <?php echo $org ?>>Sólo el organizador(a)
                                                    </label>
                                                       <label class="form-check-label">
                                                           <input type="radio" name="student_privacity" id="n" class="form-check-input ml-2" value="n" <?php echo $nating ?>>Sólo yo
                                                       </label>
                                                </div>
                                               </center>
                                            </div>
                                            <?php
if ($_SESSION['student_sex'] == 'hombre') {
    $hombre = "<input type='radio' name='student_sex' id='hombre' class='form-check-input mr-2' value='hombre' checked>Hombre";
    $mujer  = "<input type='radio' name='student_sex' id='mujer' class='form-check-input mr-2' value='mujer' >Mujer";
} else {
    $hombre = "<input type='radio' name='student_sex' id='hombre' class='form-check-input mr-2' value='hombre' checked>Hombre";
    $mujer  = "<input type='radio' name='student_sex' id='mujer' class='form-check-input mr-2' value='mujer' checked >Mujer";
}

?>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <?php echo $hombre ?>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <?php echo $mujer ?>
                                                </label>
                                            </div>
                                            <input type="submit" class="btn btn-primary-b btn-block mb-5" name="submit"  value="Guardar Cambios">
                                            <input type="hidden" name="accion" value="update">
                                        </form>
                                    </div>
                                    <div class="col-12 col-md-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../appsummer.itz/modules/scripts.php'?>

</body>
</html>