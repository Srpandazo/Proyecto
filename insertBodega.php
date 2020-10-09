<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$codigo=$_POST['codigo'];
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];

		if(!empty($codigo) && !empty($nombre) && !empty($direccion)){
				$consulta_insert=$con->prepare('INSERT INTO bodega(codigo,nombre,direccion) VALUES(:codigo,:nombre,:direccion)');
				$consulta_insert->execute(array(
					':codigo' =>$codigo,
					':nombre' =>$nombre,
					':direccion' =>$direccion,
				));
				header('Location: indexBodega.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nueva Bodega</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="codigo" placeholder="Codigo" class="input__text">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="direccion" placeholder="Direccion" class="input__text">
			</div>
			<div class="btn__group">
				<a href="indexBodega.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>