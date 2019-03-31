<?php
session_start();
	include "../conexion.php";
	if(isset($_SESSION['Usuario'])){

	}else{
		header("Location: ./index.php?Error=Acceso denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="../css/estilosno.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="./js/jquery-1.10.2.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
	<header>

	<nav>
    <div class="nav-wrapper">
	<img src="../imagenes/logo.png" id="logo" class="brand-logo" width="50px">
		
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
	  <li><a href="../">Inicio</a></li>
		<li><a href="../admin.php">Ultimas Compras</a></li>
	    <li><a href="#" class="selected">Agregar</a></li>
	    <li><a href="./modificar.php" >Modificar</a></li>
	    <li><a href="./login/cerrar.php">Salir</a></li>
		<li><a href="../carritodecompras.php" title="ver carrito de compras">
			<img src="../imagenes/carrito.png" width="50px">
		</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">Javascript</a></li>
    <li><a href="mobile.html">Mobile</a></li>
  </ul>
          
		
	</header>
	<section>
	

	<center><h1>Agregar un Nuevo Producto</h1></center>
	<form action="altaproducto.php" method = "post" enctype="multipart/form-data">
		<fieldset>
			Nombre<br>
			<input type="text" name="nombre">
		</fieldset>
		<fieldset>
			Descripción<br>
			<input type="text" name="descripcion">
		</fieldset>
		<fieldset>
			Imagen<br>
			<input type="file" name="file">
		</fieldset>
		<fieldset>
			Precio<br>
			<input type="text" name="precio">
		</fieldset>
		<input type="submit" name="accion" value="Enviar" class="aceptar">
	</form>	
	
		</form>
	</section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	
	<script>
	$(document).ready(function(){
    $('.sidenav').sidenav();
  });
  </script>
</body>

</html>