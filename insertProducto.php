<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		$idCategori=$_POST['idCategori'];

		if(!empty($nombre) && !empty($precio)){
				$consulta_insert=$con->prepare('INSERT INTO producto(nombre,precio,idCategori) VALUES(:nombre,:precio,:idCategori)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':precio' =>$precio,
					':idCategori' =>$idCategori,
				));
				header('Location: indexProducto.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Producto</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CREATE EN PRODUCTO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="precio" placeholder="Precio" class="input__text">
				<input type="text" name="idCategori" placeholder="IdCategoria" class="input__text">
			</div>
			<div class="btn__group">
				<a href="indexProducto.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
