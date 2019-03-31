<?php
session_start();


$conn=new PDO("mysql:host=localhost; dbname=tiendabd","root","3266root" );
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql='insert into cliente(usuario,password,Nombre,Direccion,Telefono,Correo,poblacion,provincia,pais)  values (:usuario, :password, :nombre, :direccion, :telefono, :correo, :pueblo, :provincia, :pais)';
//$sql='insert into cliente(usuario,password,Nombre,Direccion,Telefono,Correo,poblacion,provincia,pais)  values (:usuario, :password, :nombre, :direccion, :telefono, :correo, "jaca", :provincia, :pais)';

$resultado=$conn->prepare($sql);
 
$login=htmlentities(addslashes($_POST['usuario']));
$pass=htmlentities(addslashes($_POST['password']));
$nombre=htmlentities(addslashes($_POST['nombre']));
$direccion=htmlentities(addslashes($_POST['direccion']));
$telefono=htmlentities(addslashes($_POST['telefono']));
$correo=htmlentities(addslashes($_POST['email']));
$pueblo=htmlentities(addslashes($_POST['poblacion']));
$provincia=htmlentities(addslashes($_POST['provincia']));
$pais=htmlentities(addslashes($_POST['pais']));


$resultado->bindParam(":usuario", $login);
$resultado->bindParam(":password", $pass);
$resultado->bindParam(":nombre", $nombre);
$resultado->bindParam(":direccion", $direccion);
$resultado->bindParam(":telefono", $telefono);
$resultado->bindParam(":correo", $correo);
$resultado->bindParam(":pueblo", $pueblo);
$resultado->bindParam(":provincia", $provincia);
$resultado->bindParam(":pais", $pais);

$resultado->execute();



	header("Location: ./index.php");

?>