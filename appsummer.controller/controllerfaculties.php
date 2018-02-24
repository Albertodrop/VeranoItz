<?php
@session_start();

require_once '../appsummer.clases/Carrera.php';
require_once '../appsummer.dao/CarreraDao.php';
require_once '../appsummer.dao/Softmor.php';
$soft = new Softmor();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['msj'] = true;
    switch ($_POST['accion']) {

        case 'registrar':
            // $carreras = [$_POST['faculty_name'],$_POST['faculty_id'],]
            if ($_POST['faculty_name'] == '') {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=El campo nombre es requerido');
            } else if ($_POST['faculty_id'] == '') {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=El campo clave es requerido');
            } else if ($_POST['faculty_building'] == '') {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=El campo edificio es requerido');
            } else if ($soft->issetsoft('faculties', 'faculty_id', $_POST['faculty_id'])) {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=Otro registro esta utilizando la misma clave');

            } else if ($soft->issetsoft('faculties ', 'faculty_name', $_POST['faculty_name'])) {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=Otro registro esta utilizando el mismo nombre');
            } else {
                $carrera = new Carrera();
                $carrera->setFacultyId($_POST['faculty_id']);
                $carrera->setFacultyName($_POST['faculty_name']);
                $carrera->setFacultyBuilding($_POST['faculty_building']);
                $dao = new CarreraDao();
                if ($dao->createFaculties($carrera)) {
                    header('location:../softmor.msj/info.php?type=success&c=itz&a=conf&msj=Carrera Registrada');
                }
            }
            break;
        case 'update':
            if ($_POST['faculty_name'] == '') {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=El campo nombre es requerido');
            } else if ($_POST['faculty_id'] == '') {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=El campo clave es requerido');
            } else if ($_POST['faculty_building'] == '') {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=El campo edificio es requerido');
                // }else if ($soft->issetsoft('faculties', 'faculty_id', $_POST['faculty_id'])) {
                //      header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=Otro registro esta utilizando la misma clave');

                // }else if($soft->issetsoft('faculties ', 'faculty_name', $_POST['faculty_name'])) {
                //      header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=Otro registro esta utilizando el mismo nombre');
                //
            } else {
                $carrera = new Carrera();
                $carrera->setFacultyId($_POST['faculty_id']);
                $carrera->setFacultyName($_POST['faculty_name']);
                $carrera->setFacultyBuilding($_POST['faculty_building']);
                $id  = $_POST['id_get'];
                $dao = new CarreraDao();
                if ($dao->updateFacultiesId($carrera, $id)) {
                    header('location:../softmor.msj/info.php?type=success&c=itz&a=conf&msj=Carrera Actualizada');
                }
            }

            break;
        case 'delete':
            $id  = $_POST['faculty_id'];
            $dao = new CarreraDao();
            $dao = $dao->deleteFacultiesId($id);
            if ($dao > 0) {

                header('location:../softmor.msj/info.php?type=success&c=itz&a=conf&msj=Carrera Eliminada');
            } else {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=No se elimino la carrea');
            }
            break;

        default:
# code...
            break;
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $_SESSION['msj'] = true;
}
