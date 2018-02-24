-<?php
@session_start();

require_once '../appsummer.clases/Departamento.php';
require_once '../appsummer.dao/DepartamentoDao.php';
require_once '../appsummer.dao/Softmor.php';
$soft = new Softmor();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['msj'] = true;
    switch ($_POST['accion']) {

        case 'registrar':
            // $departamentos = [$_POST['departament_name'],$_POST['departament_id'],]
            if ($_POST['departament_name'] == '') {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=El campo nombre es requerido');
            } else if ($_POST['departament_id'] == '') {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=El campo clave es requerido');

            } else if ($soft->issetsoft('departaments', 'departament_id', $_POST['departament_id'])) {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=Otro registro esta utilizando la misma clave');

            } else if ($soft->issetsoft('departaments ', 'departament_name', $_POST['departament_name'])) {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=Otro registro esta utilizando el mismo nombre');
            } else {
                $departamento = new Departamento();
                echo $_POST['departament_name'];
                echo $_POST['departament_id'];
                $departamento->setDepartamentId($_POST['departament_id']);
                $departamento->setDepartamentName($_POST['departament_name']);
                $dao = new DepartamentoDao();
                if ($dao->createDepartaments($departamento)) {
                    header('location:../softmor.msj/info.php?type=success&c=itz&a=conf&msj=Departamento Registrado');
                } else {
                    header('location:../softmor.msj/info.php?type=error&c=itz&a=conf&msj=Departamento No Registrado');
                }
            }
            break;
        case 'update':
            if ($_POST['departament_name'] == '') {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=El campo nombre es requerido');
            } else if ($_POST['departament_id'] == '') {
                header('location:../softmor.msj/info.php?type=warning&c=itz&a=conf&msj=El campo clave es requerido');
            } else {
                $departamento = new Departamento();

                $departamento->setDepartamentId($_POST['departament_id']);
                $departamento->setDepartamentName($_POST['departament_name']);
                $id  = $_POST['id_get'];
                $dao = new DepartamentoDao();
                if ($dao->updateDepartamentsId($departamento, $id)) {
                    header('location:../softmor.msj/info.php?type=success&c=itz&a=conf&msj=Departamento Actualizado');
                } else {

                }
            }

            break;
        case 'delete':
            $id  = $_POST['departament_id'];
            $dao = new DepartamentoDao();
            if ($dao->deleteDepartamentsId($id)) {
                header('location:../softmor.msj/info.php?type=success&c=itz&a=conf&msj=Departamento Eliminado');
            }
            break;
        default:
# code...
            break;
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $_SESSION['msj'] = true;

}
