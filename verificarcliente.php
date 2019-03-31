<?php
session_start();


$conn=new PDO("mysql:host=localhost; dbname=tiendabd","root","3266root" );
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql='select * from cliente where usuario=:login AND 
password=:pass';

$resultado=$conn->prepare($sql);
 
$login=htmlentities(addslashes($_POST['Usuario']));
$pass=htmlentities(addslashes($_POST['Password']));
$resultado->bindParam(":login", $login);
$resultado->bindParam(":pass", $pass);
$resultado->execute();


while ($f=$resultado->fetch()){
$cliente=$f['usuario'];
$cliente_id=$f['Cliente_id'];
			
}



	$_SESSION['cliente']=$cliente;
	$_SESSION['cliente_id']=$cliente_id;
	header("Location: ./index.php");

	

?>

