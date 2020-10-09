//eliminar vendedor
<?php 

	include_once 'conexion.php';
	if(isset($_GET['cedula'])){
		$cedula=(int) $_GET['cedula'];
		$delete=$con->prepare('DELETE FROM vendedor WHERE cedula=:cedula');
		$delete->execute(array(':cedula'=>$cedula));
		header('Location: indexVendedor.php');
	}else{
		header('Location: indexVendedor.php');
	}
 ?>