<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM categoriaproducto ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM categoriaproducto WHERE idCategoria LIKE :campo ;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>INICIO DE CATEGORIA PRODUCTO</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>INICIO DE CATEGORIA PRODUCTO </h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar por id" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insertCategoria.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id</td>
				<td>Nombre</td>
				<td>Descripcion</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['idCategoria']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['descripcion']; ?></td>
					<td><a href="updateCategoria.php?idCategoria=<?php echo $fila['idCategoria']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="deleteCategoria.php?idCategoria=<?php echo $fila['idCategoria']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>