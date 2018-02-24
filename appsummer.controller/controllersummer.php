<?php
@session_start();

require_once '../appsummer.clases/CursoVerano.php';
require_once '../appsummer.dao/SummerDao.php';
require_once '../appsummer.clases/RegistroVerano.php';
require_once '../appsummer.dao/Softmor.php';
$soft = new Softmor();
/*Eliminar y editar el verano*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['msj'] = true;
    $veranos         = [$_POST['summer_namecourse'], $_POST['summer_matterid'],
        $_POST['summer_nameteacher'], $_POST['summer_price'], $_POST
        ['summer_available'], $_POST['sumer_starthour'], $_POST['summer_finalhour'],
        $_POST['summer_studentcapacity'],
        $_POST['summer_contact']];
    if ( $_POST['summer_nameteacher']== "") {
            $veranos[2] = "----";
             $name_teacher = "---";
        }    
    $summer_available = false;
    if ($veranos[4] == 'publico') {
        $summer_available = 1;
    } else {
        $summer_available = 0;
    }

    switch ($_POST['accion']) {

        case 'registrar':

            for ($i = 0; $i < count($veranos); $i++) {
                if ($veranos[$i] == '') {

                    header('location:../softmor.msj/info.php?type=error&c=students&a=addsummer&msj=Algunos campos no pueden estar vacios');
                    die();
                }
            }

            /* Procesar imagen */
            $tmp_name = $_FILES['summer_photo']['tmp_name'];
            if (is_dir('../appsummer.resourse/img/') && is_uploaded_file($tmp_name)) {
                $img_file = $_FILES['summer_photo']['name'];
                $img_type = $_FILES['summer_photo']['type'];

                // Si se trata de una imagen
                if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
                    strpos($img_type, "jpg")) || strpos($img_type, "png"))
                ) {
                    //¿Tenemos permisos para subir la imágen?

                    if (move_uploaded_file($tmp_name, '../appsummer.resourse/img' . '/' . $img_file)) {
                        /*Me quede aqui*/
                        $verano    = new CursoVerano();
                        $summer_id = $_SESSION['student_id'];
                        $summer_id .= $_POST['summer_matterid'];
                        $summer_id .= date('y');
                        $verano->setSummer_id($summer_id);
                        $verano->setSummer_namecourse($veranos[0]);
                        $verano->setSummer_matterid($veranos[1]);
                        $verano->setSummer_nameteacher($name_teacher);
                        $verano->setSummer_price($veranos[3]);
                        $verano->setSummer_available($summer_available);
                        $verano->setSummer_codesearch($_POST['summer_codesearch']);
                        $verano->setSummer_starthour($veranos[5]);
                        $verano->setSummer_finalhour($veranos[6]);
                        $verano->setSummer_studentcapacity($veranos[7]);
                        $verano->setSummer_facultyid_faculties($_POST['summer_facultyid_faculties']);
                        $verano->setSummer_contact($veranos[8]);
                        $verano->setSummer_studentid_students($_SESSION['student_id']);
                        $verano->setSummer_dateregistry(date('d-m-Y'));
                        $verano->setSummer_status('PENDIENTE');
                        $verano->setSummer_description($_POST['summer_description']);
                        $verano->setSummer_fotho('../appsummer.resourse/img/' . $img_file);

                        $dao = new SummerDao();
                        if ($dao->createSummers($verano)) {
                            if (isset($_POST['registry'])) {
                                if ($_POST['registry'] == 'on') {

                                    $registro = new RegistroVerano();
                                    $registro->setSrStudentidStudents($_SESSION['student_id']);
                                    $registro->setSrSummerIdSummers($summer_id);
                                    $registro->setRsStatus('PAGO PENDIENTE');
                                    $dao = new SummerDao();
                                    if ($dao->summerRegistry($registro)) {

                                        header('location:../softmor.msj/info.php?type=success&c=students&a=miperfil&msj=Verano creado');
                                    } else {

                                        header('location:../softmor.msj/info.php?type=error&c=students&a=home&msj= No es posible registrarte a este verano, intentalo más tarde.');
                                    }
                                } else {

                                    header('location:../softmor.msj/info.php?type=success&c=students&a=home&msj=Verano creado');
                                }

                            } else {

                                header('location:../softmor.msj/info.php?type=success&c=students&a=home&msj=Verano creado');
                            }
                        } else {

                            header('location:../softmor.msj/info.php?type=error&c=students&a=addsummer&msj=No es posible crearse este verano, verifique que todo este en orden');
                        }
                    } else {

                        header('location:../softmor.msj/info.php?type=error&c=students&a=addsummer&msj=No es posible cargar la imagen, dado que el formato no cumple');
                    }
                }
            } else {

                header('location:../softmor.msj/info.php?type=error&c=students&a=addsummer&msj= Es requirida una imagen que represente al vernao que usted esta creando.');
            }
            break;

        case 'update':
            for ($i = 0; $i < count($veranos); $i++) {
                if ($veranos[$i] == '') {

                    header('location:../softmor.msj/info.php?type=error&c=students&a=addsummer&msj=Algunos campos no pueden estar vacios');
                    die();
                }
            }
            $summer_id_old = $_POST['summer_id'];
            $verano        = new CursoVerano();
            $summer_id     = $_SESSION['student_id'];
            $summer_id .= $_POST['summer_matterid'];
            $summer_id .= date('y');
            $verano->setSummer_id($summer_id);
            $verano->setSummer_namecourse($veranos[0]);
            $verano->setSummer_matterid($veranos[1]);
            $verano->setSummer_nameteacher($name_teacher);
            $verano->setSummer_price($veranos[3]);
            $verano->setSummer_available($summer_available);
            $verano->setSummer_codesearch($_POST['summer_codesearch']);
            $verano->setSummer_starthour($veranos[5]);
            $verano->setSummer_finalhour($veranos[6]);
            $verano->setSummer_studentcapacity($veranos[7]);
            $verano->setSummer_facultyid_faculties($_POST['summer_facultyid_faculties']);
            $verano->setSummer_contact($veranos[8]);
            $verano->setSummer_description($_POST['summer_description']);
            // $verano->setSummer_description($_POST['summer_description']);
            $dao = new SummerDao();
            if ($dao->updateSummersId($verano, $_SESSION['student_id'], $summer_id_old)) {

                header('location:../softmor.msj/info.php?type=success&c=students&a=home&msj= El verano se ha actualizado correctamente');
            } else {

                header('location:../softmor.msj/info.php?type=warning&c=students&a=home&msj= No se actuallizo el verano');
            }

            break;
            
        default:
# code...
            break;
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $_SESSION['msj'] = true;
    if(isset($_GET['code'])){
        $code = new SummerDao();
            if(strlen($_GET['codesearch'])<6){
            echo "<span class='text-danger'>Codigo no valido</span>";
           }
           else if ($code-> getCodeSearch($_GET['codesearch'])) {
               echo "<span class='text-danger'>El codigo ya existe</span>";
            }else{
                echo "<span class='text-success'>Codigo Valido</span>";
            }
    }
    if (isset($_GET['idv']) && isset($_GET['ids'])) {
        if ($_GET['idv'] == '' || $_GET['ids'] == '') {
            header('location:students/home.php');
        } else {
            $registro = new RegistroVerano();
            $registro->setSrStudentidStudents($_GET['ids']);
            $registro->setSrSummerIdSummers($_GET['idv']);
            $registro->setRsStatus('PAGO PENDIENTE');
            $dao = new SummerDao();
            if ($dao->summerRegistry($registro)) {

                header('location:../softmor.msj/info.php?type=success&c=students&a=miperfil&msj= Ya formas parte de éste verano, ponte en contacto con el administrador');

            } else {

                header('location:../softmor.msj/info.php?type=error&c=students&a=home&msj= No es posible registrarte a este verano, intentalo más tarde.');
            }
        }

    }if (isset($_GET['btn-eliminar'])) {
        $delete = new SummerDao();
        if ($delete->deleteChildrenSummer($_GET['summer_id'])) {
                if ($delete->deleteSummer($_GET['summer_id'], $_SESSION['student_id'])) {

                header('location:../softmor.msj/info.php?type=success&c=students&a=home&msj= El verano se ha eliminado correctamente');
            } else {

                header('location:../softmor.msj/info.php?type=error&c=students&a=home&msj=Lo sentimos el verano no ha sido posible eliminarse');
            }
        }else{
            header('location:../softmor.msj/info.php?type=error&c=students&a=home&msj=Lo sentimos el verano no ha sido posible eliminarse');

        }
        
        exit();

    }if (isset($_GET['btn-salir'])) {

        $verano = new SummerDao();
        if ($verano->deleteRegistry($_GET['summer_id'], $_SESSION['student_id'])) {

            header('location:../softmor.msj/info.php?type=success&c=students&a=miperfil&msj= Te haz salido del verano exitosamente.&p=true');
        } else {

            header('location:../softmor.msj/info.php?type=error&c=students&a=miperfil&msj= Lo sentimos no es posible que puedas salir ahora mismo, intenta más tarde.');
        }

    }if (isset($_GET['summer_codesearch'])) {
        $code = new SummerDao();
        $code = $code->summerSearchCode($_GET['summer_id'], $_GET['summer_codesearch']);
        $i    = count($code);
        if ($i == 2) {

            $registro = new RegistroVerano();
            $registro->setSrStudentidStudents($_SESSION['student_id']);
            $registro->setSrSummerIdSummers($code['summer_id']);
            $registro->setRsStatus('PAGO PENDIENTE');
            $dao = new SummerDao();
            if ($dao->summerRegistry($registro)) {

                header('location:../softmor.msj/info.php?type=success&c=students&a=miperfil&msj= Ya formas parte de éste verano, ponte en contacto con el administrador');

            } else {

                header('location:../softmor.msj/info.php?type=error&c=students&a=home&msj= No es posible registrarte a este verano, intentalo más tarde.');
            }
        } else {
            header('location:../softmor.msj/info.php?type=error&c=students&a=home&msj= El codigo no coincide');
        }
    }if (isset($_GET['summer_nocontrol'])) {
        if ($_GET['summer_nocontrol'] == "") {
            header('location:../softmor.msj/info.php?type=warning&c=students&a=home&msj= Por favor introdusca un numero de control valido.');
        } else if (!$soft->issetsoft('students', 'student_id', $_GET['summer_nocontrol'])) {
            header('location:../softmor.msj/info.php?type=error&c=students&a=home&msj=El estudiante no existe ');

        } else {
            $registro = new RegistroVerano();
            $registro->setSrStudentidStudents($_GET['summer_nocontrol']);
            $registro->setSrSummerIdSummers($_GET['summer_id']);
            $registro->setRsStatus('PAGO PENDIENTE');
            $dao = new SummerDao();
            if ($dao->summerRegistry($registro)) {

                header('location:../softmor.msj/info.php?type=success&c=students&a=home&msj= Hubo un registro exitoso');

            } else {

                header('location:../softmor.msj/info.php?type=error&c=students&a=home&msj= Es probable que este usuario ya se encuentre registrado en este verano');
            }

        }
    }if (isset($_GET['rs_status'])) {
        $status = $_GET['rs_status'];
        $change = new SummerDao();
        if ($status == 'PAGO PENDIENTE') {
            echo "" . $_GET['rs_status'];

            $change = $change->cambiarStatus($_GET['student_id'], $_GET['summer_id'], "PAGADO");
            header('location:../students/participantes.php?summer_id=' . $_GET['summer_id']);

        } else if ($status == 'PAGADO') {
            echo "" . $_GET['rs_status'];
            $change = $change->cambiarStatus($_GET['student_id'], $_GET['summer_id'], "PAGO PENDIENTE");
            header('location:../students/participantes.php?summer_id=' . $_GET['summer_id']);

        }
    } 
} else {

    header('location:../softmor.msj/info.php?type=error&c=students&a=home&msj= Por Favor utiliza el formulario');
}
