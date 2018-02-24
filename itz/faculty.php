<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario</title>
</head>
<body>
	<form action="controller/faculties.php" method="post">
		<input type="text" name="faculty_id" placeholder="Id Carrera"><br>
		<input type="text" name="faculty_name" placeholder="Nombre Carrera"><br>
		<input type="number" name="faculty_building" placeholder="Edificio"><br>
		<input type="submit" name="faculty_submit" placeholder="Id Carrera"><br>
		<input type="hidden" name="accion" placeholder="Id Carrera" value="ingresar"><br>
	</form>
</body>
</html>