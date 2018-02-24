<?php 
	$nombre = '';

	//echo ucwords($nombre);  // Convierte a mayúsculas el primer caracter de cada palabra de una cadena
	//echo '<br>';
	//echo trim($nombre);  /*Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena*/
	// echo '<br>';

	// $pos = strpos($nombre,' '); /*Encuentra la posición de la última aparición de un substring en un string*/

	// substr — Devuelve parte de una cadena
	//echo ucwords(substr($nombre,0,$pos+2)).'.';

	//echo htmlspecialchars($nombre);
	// echo sha1($nombre);


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../appsummer.itz/modules/head.php' ?>
	<title>Prueba</title>

</head>
<body>
	<form action="">
		<div class="form-group col-md-6">
			<input type="text" pattern="[1-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]" title="Número de control conformado por 8 caracteres numericos, ejemplo: 15091055" maxlength="8" placeholder="Numero de control" class="form-control mt-5">
		</div>
		
	</form>
</body>
</html>