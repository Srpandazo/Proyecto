<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM producto ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM producto WHERE idProducto LIKE :campo ;'
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
	<title>Inicio</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>INICIO DE PRODUCTO</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar por id" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insertProducto.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id Producto</td>
				<td>Nombre</td>
				<td>Precio</td>
				<td>Id Categoria</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['idProducto']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['precio']; ?></td>
					<td><?php echo $fila['idCategori']; ?></td>
					<td><a href="updateProducto.php?idProducto=<?php echo $fila['idProducto']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="deleteProducto.php?idProducto=<?php echo $fila['idProducto']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>