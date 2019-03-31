<?php 
	include "../conexion.php";
	if($_POST['Caso']=="Eliminar"){
		mysql_query("delete from productos where Id=".$_POST['Id']);
		unlink("../productos/".$_POST['Imagen']);
		echo 'El producto se ha eliminado';
	}
	if($_POST['Caso']=="Modificar"){
		$statement=$dbConn->prepare("update productos set Nombre=? where Id=?");
		$statement->execute([$_POST['Nombre'],$_POST['Id']]);
		$statement=$dbConn->prepare("update productos set Descripcion='".$_POST['Descripcion']."' where Id=".$_POST['Id']);
		
		$statement->execute();
		$statement=$dbConn->prepare("update productos set Precio='".$_POST['Precio']."' where Id=".$_POST['Id']);
		$statement->execute();
		echo 'El producto se ha modificado';
	}

?>