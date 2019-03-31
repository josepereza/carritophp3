<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/noestilos.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javas"></script>
	<style>
	.productos {
		display:flex;
		justify-content: center;
		margin-left: auto;
		
		flex-wrap: wrap;
	

	}
	.producto {
	padding:20px;
	
		
		
	}
	
	
	</style>
</head>
<body>
	<header>

	<ul id="dropdown1" class="dropdown-content">
  <li><a href="logincliente.php">login</a></li>
  <li><a href="altacliente.php">registro</a></li>
  <li class="divider"></li>
  <li><a href="cerrar_session_cliente.php">salir</a></li>
</ul>
	
	<nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">Logo</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
		<li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">person</i></a></li>
	  <li><?php echo $_SESSION['cliente']?></li>
		<li><a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png" width="50px"></li>
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