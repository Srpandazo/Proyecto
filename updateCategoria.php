<?php
	include_once 'conexion.php';

	if(isset($_GET['idCategoria'])){
		$idCategoria=(int) $_GET['idCategoria'];

		$buscar_id=$con->prepare('SELECT * FROM categoriaproducto WHERE idCategoria=:idCategoria');
		$buscar_id->execute(array(':idCategoria'=>$idCategoria));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: indexCategoria.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$idCategoria=(int) $_GET['idCategoria'];

		if(!empty($nombre) && !empty($descripcion)){

				$consulta_update=$con->prepare(' UPDATE categoriaproducto SET  
					nombre=:nombre,
					descripcion=:descripcion

					WHERE idCategoria=:idCategoria;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':descripcion' =>$descripcion,
					':idCategoria' =>$idCategoria
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
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>UPDATE DE CATEGORIA PRODUCTO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="descripcion" value="<?php if($resultado) echo $resultado['descripcion']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
