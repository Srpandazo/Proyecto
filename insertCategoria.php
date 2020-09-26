<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];

		if(!empty($nombre) && !empty($descripcion)){
				$consulta_insert=$con->prepare('INSERT INTO categoriaproducto(nombre,descripcion) VALUES(:nombre,:descripcion)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':descripcion' =>$descripcion,
				));
				header('Location: indexCategoria.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="descripcion" placeholder="Descripcion" class="input__text">
			</div>
			<div class="btn__group">
				<a href="indexCategoria.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
