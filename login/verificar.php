<?php
session_start();


$conn=new PDO("mysql:host=localhost; dbname=tiendabd","root","3266root" );
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql='select * from usuarios where Usuario=:login AND 
Password=:pass';

$resultado=$conn->prepare($sql);
 
$login=htmlentities(addslashes($_POST['Usuario']));
$pass=htmlentities(addslashes($_POST['Password']));
$resultado->bindParam(":login", $login);
$resultado->bindParam(":pass", $pass);
$resultado->execute();


while ($f=$resultado->fetch()){
$arreglo[]=array('Nombre'=>$f['Nombre'],
			'Apellido'=>$f['Apellido'],'Imagen'=>$f['Imagen']);

			echo $f['Usuario'];


}


if(isset($arreglo)){
	$_SESSION['Usuario']=$arreglo;
	header("Location: ../admin.php");
}else{
	header("Location: ../login.php?error=datos no validos");
}
?>

