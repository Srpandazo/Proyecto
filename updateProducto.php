<?php
	include_once 'conexion.php';

	if(isset($_GET['idProducto'])){
		$idProducto=(int) $_GET['idProducto'];

		$buscar_id=$con->prepare('SELECT * FROM producto WHERE idProducto=:idProducto');
		$buscar_id->execute(array(':idProducto'=>$idProducto));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: indexProducto.php');
	}


	if(isset($_POST['guardar'])){
		$idProducto=(int) $_GET['idProducto'];
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		

		if(!empty($nombre) && !empty($precio)){

				$consulta_update=$con->prepare(' UPDATE producto SET  
					nombre=:nombre,
					precio=:precio
					WHERE idProducto=:idProducto;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':precio' =>$precio,
					':idProducto' =>$idProducto
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
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>UPDATE DE CATEGORIA PRODUCTO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="precio" value="<?php if($resultado) echo $resultado['precio']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="indexProducto.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
