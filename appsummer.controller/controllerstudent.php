<?php
@session_start();

require_once '../appsummer.clases/Estudiante.php';
require_once '../appsummer.dao/EstudianteDao.php';
require_once '../appsummer.dao/Softmor.php';
$soft = new Softmor();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['msj'] = true;
    $estudiantes     = [$_POST['student_id'], $_POST['student_name'],
        $_POST['student_firstname'], $_POST['student_secondname'],
        $_POST['student_sex'], $_POST['student_password'],
        $_POST['student_facultyid_faculties']];
    switch ($_POST['accion']) {
        case 'registrar':
        if (isset($_SESSION['teacher_id'])) {
            $c = 'itz';
            $a ='user';
        }else{
            $c='students';
            $a='index';
        }
            for ($i = 0; $i < count($estudiantes); $i++) {
                if ($estudiantes[$i] == '') {
                    header('location:../softmor.msj/info.php?type=warning&c='.$c.'&a='.$a.'&msj=Algunos campos son requeridos');
                    die();
                }
            }
            if ($soft->issetsoft('students', 'student_id', $_POST['student_id'])) {
                header('location:../softmor.msj/info.php?type=warning&c='.$c.'&a='.$a.'&msj=El estudiante ya existe');

            } else {
                $rutaimg = '../appsummer.resourse/img/woman.jpg';
                if ($_POST['student_sex'] == 'hombre') {
                    $rutaimg = '../appsummer.resourse/img/man.png';
                }
                $estudiante = new Estudiante();
                $estudiante->setStudentId($_POST['student_id']);
                $estudiante->setStudentName($_POST['student_name']);
                $estudiante->setStudentFirstname($_POST['student_firstname']);
                $estudiante->setStudentSecondname($_POST['student_secondname']);
                $estudiante->setStudentEmail($_POST['student_email']);
                $estudiante->setStudentPassword(sha1($_POST['student_password']));
                $estudiante->setStudentSex($_POST['student_sex']);
                $estudiante->setStudentPhoto($rutaimg);
                //EL ROL QUE CADA ESTUDIAMTE TIENE AL REGISTRARSE ES STUDENT TIPO DE ROL : STUDENT,
                //USER-STUDENT
                $estudiante->setStudentRol('USER-STUDENT');
                $estudiante->setStudentFacultyidFaculties($_POST['student_facultyid_faculties']);

                $crud = new EstudianteDao();
                if ($crud->createStudents($estudiante)) {

                    header('location:../softmor.msj/info.php?type=success&c='.$c.'&a='.$a.'&msj=Estudiante registrado');

                } else {
                    header('location:../softmor.msj/info.php?type=error&c='.$c.'&a='.$a.'&msj=Estudiante No registrado');

                }
            }
            break;
        case 'ingresar':
            $student_id       = $_POST['student_id'];
            $student_password = $_POST['student_password'];
            if ($student_id == '' || $student_password == '') {
                header('location:../softmor.msj/info.php?type=error&c=students&a=index&msj=Los campos no pueden estar vacios');
                /*}else if(!$soft->issetsoft('students', 'student_id', $_POST['student_id'])) {
            header('location:../softmor.msj/info.php?type=error&location=../students/index.php&msj=El estudiante no existe');*/

            } else {
                $estudiante = new Estudiante();
                $estudiante->setStudentId($_POST['student_id']);
                $estudiante->setStudentPassword(sha1($_POST['student_password']));
                $rs                                      = new EstudianteDao();
                $rs                                      = $rs->studentEntry($estudiante);
                $_SESSION['student_id']                  = $rs['student_id'];
                $_SESSION['student_name']                = $rs['student_name'];
                $_SESSION['student_firstname']           = $rs['student_firstname'];
                $_SESSION['student_secondname']          = $rs['student_secondname'];
                $_SESSION['student_email']               = $rs['student_email'];
                $_SESSION['student_facultyid_faculties'] = $rs['student_facultyid_faculties'];
                $_SESSION['student_privacity']           = $rs['student_privacity'];
                $_SESSION['student_telephone']           = $rs['student_telephone'];
                $_SESSION['student_rol']                 = $rs['student_rol'];
                $_SESSION['student_sex']                 = $rs['student_sex'];
                $_SESSION['student_acceso']              = true;
                $_SESSION['student_photo']               = $rs['student_photo'];
                $_SESSION['student_password']            = $rs['student_password'];
                if ($rs['student_rol'] == 'STUDENT') {
                    header('location:../perfil/home.php');
                } else if ($rs['student_rol'] == 'USER-STUDENT') {
                    if (isset($_POST['v'])) {
                        $summer_id = $_POST['v']; 
                       header('location:../students/curso.php?v='.$summer_id.'&r='.sha1($summer_id)); 
                    }else{
                         header('location:../students/home.php');
                    }
                   
                } else {
                    header('location:../softmor.msj/info.php?type=error&c=students&a=index&msj= El numero de control o la contraseña no son correctos');
                }
            }
            break;
        case 'update':
            /* echo $_POST['student_password']."<br>";
            echo $_SESSION['student_password'];*/
            for ($i = 0; $i < count($estudiantes); $i++) {
                if ($estudiantes[$i] == '') {
                    header('location:../softmor.msj/info.php?type=warning&c=students&a=index&msj=Algunos campos son requeridos');
                    die();
                }
            }

            $rutaimg = '../appsummer.resourse/img/woman.jpg';
            if ($_POST['student_sex'] == 'hombre') {
                $rutaimg = '../appsummer.resourse/img/man.png';
            }
            $passencrypt = '';
            if ($_SESSION['student_password'] == $_POST['student_password']) {
                $passencrypt = $_POST['student_password'];
            } else {
                $passencrypt = sha1($_POST['student_password']);
            }
            $estudiante = new Estudiante();
            $estudiante->setStudentId($_POST['student_id']);
            $estudiante->setStudentName($_POST['student_name']);
            $estudiante->setStudentFirstname($_POST['student_firstname']);
            $estudiante->setStudentSecondname($_POST['student_secondname']);
            $estudiante->setStudentEmail($_POST['student_email']);
            $estudiante->setStudentTelephone($_POST['student_telephone']);
            $estudiante->setStudentPrivacity($_POST['student_privacity']);
            $estudiante->setStudentPassword($passencrypt);
            $estudiante->setStudentSex($_POST['student_sex']);
            $estudiante->setStudentPhoto($rutaimg);
            //EL ROL QUE CADA ESTUDIAMTE TIENE AL REGISTRARSE ES STUDENT TIPO DE ROL : STUDENT,
            //USER-STUDENT
            $estudiante->setStudentRol('USER-STUDENT');
            $estudiante->setStudentFacultyidFaculties($_POST['student_facultyid_faculties']);

            $crud = new EstudianteDao();
            if ($crud->updateStudentsId($estudiante, $_POST['student_id'])) {
                $_SESSION['student_id']                  = $_POST['student_id'];
                $_SESSION['student_name']                = $_POST['student_name'];
                $_SESSION['student_firstname']           = $_POST['student_firstname'];
                $_SESSION['student_secondname']          = $_POST['student_secondname'];
                $_SESSION['student_email']               = $_POST['student_email'];
                $_SESSION['student_facultyid_faculties'] = $_POST['student_facultyid_faculties'];
                $_SESSION['student_privacity']           = $_POST['student_privacity'];
                $_SESSION['student_telephone']           = $_POST['student_telephone'];
                $_SESSION['student_rol']                 = 'USER-STUDENT';
                $_SESSION['student_sex']                 = $_POST['student_sex'];
                $_SESSION['student_acceso']              = true;
                $_SESSION['student_photo']               = $rutaimg;
                $_SESSION['student_password']            = $_POST['student_password'];

                header('location:../softmor.msj/info.php?type=success&c=students&a=miperfil&msj=Sus datos se actualizaron');

            } else {
                header('location:../softmor.msj/info.php?type=error&c=students&a=miperfil&msj=Lo sentimos no se pudieron actualizar sus datos');

            }

            break;
        default:
# code...
            break;
    }
} else if ($_SERVER['REQUEST_METHOD']) {
     if (isset($_GET['a'])) {
           echo "jajaja";
     }else{
        header('location:../students');
     }
 }else{
    header('location:../students');
 }
