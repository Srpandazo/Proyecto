<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$idProduct=$_POST['idProduct'];


		if(!empty($nombre) && !empty($apellido) && !empty($direccion) && !empty($telefono)){
				$consulta_insert=$con->prepare('INSERT INTO proveedor(nombre,apellido,direccion,telefono,idProduct) VALUES(:nombre,:apellido,:direccion,:telefono,:idProduct)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':direccion' =>$direccion,
					':telefono' =>$telefono,
					':idProduct' =>$idProduct,

				));
				header('Location: indexProveedor.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Proveedor</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="apellido" placeholder="Apellido" class="input__text">
				<input type="text" name="direccion" placeholder="Direccion" class="input__text">
				<input type="text" name="telefono" placeholder="Telefono" class="input__text">
				<input type="text" name="idProduct" placeholder="IdProducto" class="input__text">
			</div>
			<div class="btn__group">
				<a href="indexProveedor.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
