<?php 
@session_start();
require_once '../appsummer.dao/ProfesorDao.php';
require_once '../appsummer.dao/Softmor.php';
require_once '../appsummer.clases/Profesor.php';

$soft = new Softmor();
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$_SESSION['msj'] = true;
	$accion = $_POST['accion'];
	switch ($accion) {
		//Ingresar a la plataforma
		case 'ingresar':
		$profesor = [$_POST['teacher_id'],$_POST['teacher_password']];
		validity($profesor);
		if (!$soft->issetsoft('teachers', 'teacher_id', $_POST['teacher_id'])) {
           header('location:../softmor.msj/info.php?type=error&c=itz&a=index&msj= El ID de profesor no existe');
		} else {
			$teacher = new Profesor();
			$teacher->setTeacherId($_POST['teacher_id']);
			$teacher->setTeacherPassword($_POST['teacher_password']);
			$entry = new ProfesorDao();
			$entry = $entry->teacherEntry($teacher);
			if (count($entry)>1) {
				$_SESSION['teacher_id'] = $entry['teacher_id'];
				header('location:../itz/home.php');
			}else{
			header('location:../softmor.msj/info.php?type=error&c=itz&a=index&msj= La contraseña es incorrecta');
				
			}

		}
			break;
			//Aqui termina la sesion de ingresar
		
		default:
			# code...
			break;
	}
}
function validity($array){
	for ($i=0; $i <count($array) ; $i++) { 
		if ($array[$i]=='') {
			header('location:../softmor.msj/info.php?type=error&c=itz&a=index&msj= Numero de profesor y contraseña es requerdio');
			die();
		}
	}
}

 ?>