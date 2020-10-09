<?php
	include_once 'conexion.php';

	if(isset($_GET['codigo'])){
		$codigo=(int) $_GET['codigo'];

		$buscar_id=$con->prepare('SELECT * FROM proveedor WHERE codigo=:codigo');
		$buscar_id->execute(array(':codigo'=>$codigo));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: indexProveedor.php');
	}


	if(isset($_POST['guardar'])){
		$codigo=(int) $_GET['codigo'];
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$producto_bodega=$_POST['producto_bodega'];
		

		if(!empty($codigo) && !empty($nombre)&& !empty($direccion) && !empty($producto_bodega )){

				$consulta_update=$con->prepare(' UPDATE bodega SET  
					nombre=:nombre,
					direccion=:direccion,
					producto_bodega=producto_bodega


					WHERE codigo=:codigo;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':direccion' =>$direccion,
					':producto_bodega' =>$producto_bodega,
					':codigo' =>$codigo

					
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
	<title>Editar Bodega</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>UPDATE DE BODEGA</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="direccion" value="<?php if($resultado) echo $resultado['direccion']; ?>" class="input__text">
				<input type="text" name="producto_bodega" value="<?php if($resultado) echo $resultado['producto_bodega']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
