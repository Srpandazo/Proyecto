<?php 

	include_once 'conexion.php';
	if(isset($_GET['idProducto'])){
		$idProducto=(int) $_GET['idProducto'];
		$delete=$con->prepare('DELETE FROM producto WHERE idProducto=:idProducto');
		$delete->execute(array(':idProducto'=>$idProducto));
		header('Location: indexProducto.php');
	}else{
		header('Location: indexProducto.php');
	}
 ?>