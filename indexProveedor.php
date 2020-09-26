<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM proveedor ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('SELECT *FROM proveedor WHERE cedula LIKE :campo ;');

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
		<h2>INICIO DE PROVEEDOR</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar por cedula" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insertProveedor.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Cdula</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Direccion</td>
				<td>Telefono</td>
				<td>idProducto</td>

				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['cedula']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['apellido']; ?></td>
					<td><?php echo $fila['direccion']; ?></td>
					<td><?php echo $fila['telefono']; ?></td>
					<td><?php echo $fila['idProduct']; ?></td>
					<td><a href="updateProveedor.php?cedula=<?php echo $fila['cedula']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="deleteProveedor.php?cedula=<?php echo $fila['cedula']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>
