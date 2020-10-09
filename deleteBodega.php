<?php 

	include_once 'conexion.php';
	if(isset($_GET['codigo'])){
		$codigo=(int) $_GET['codigo'];
		$delete=$con->prepare('DELETE FROM bodega WHERE codigo=:codigo');
		$delete->execute(array(':codigo'=>$codigo));
		header('Location: indexBodega.php');
	}else{
		header('Location: indexBodega.php');
	}
 ?>