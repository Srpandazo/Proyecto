//ActualizarVendedor
<?php
	include_once 'conexion.php';

	if(isset($_GET['cedula'])){
		$cedula=(int) $_GET['cedula'];

		$buscar_id=$con->prepare('SELECT * FROM vendedor WHERE cedula=:cedula');
		$buscar_id->execute(array(':cedula'=>$cedula));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: indexVendedor.php');
	}


	if(isset($_POST['guardar'])){
		$cedula=(int) $_GET['cedula'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$direccion=$_POST['direccion'];
		

		if(!empty($cedula) && !empty($nombre) && !empty($apellido) && !empty($direccion)){

				$consulta_update=$con->prepare(' UPDATE vendedor SET  
					nombre=:nombre,
					apellido=:apellido
					direccion=:direccion

					WHERE cedula=:cedula;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':direccion' =>$direccion,
					':cedula' =>$cedula
				));
				header('Location: indexVendedor.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Vendedor</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>UPDATE DE VENDEDOR</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" class="input__text">
				<input type="text" name="direccion" value="<?php if($resultado) echo $resultado['direccion']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
