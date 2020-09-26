<?php 

	include_once 'conexion.php';
	if(isset($_GET['idCategoria'])){
		$idCategoria=(int) $_GET['idCategoria'];
		$delete=$con->prepare('DELETE FROM categoriaproducto WHERE idCategoria=:idCategoria');
		$delete->execute(array(':idCategoria'=>$idCategoria
		));
		header('Location: indexCategoria.php');
	}else{
		header('Location: indexCategoria.php');
	}
 ?>