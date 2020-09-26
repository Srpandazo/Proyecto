<?php 

	include_once 'conexion.php';
	if(isset($_GET['cedula'])){
		$cedula=(int) $_GET['cedula'];
		$delete=$con->prepare('DELETE FROM proveedor WHERE cedula=:cedula');
		$delete->execute(array(':cedula'=>$cedula));
		header('Location: indexProveedor.php');
	}else{
		header('Location: indexProveedor.php');
	}
 ?>