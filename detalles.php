<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<img src="./imagenes/logo.png" id="logo">
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		
	<?php
		include 'conexion.php';
		//$re=mysql_query("select * from productos where id=".$_GET['id'])or die(mysql_error());

		$stmt = $dbConn->query('SELECT * FROM productos where id='.$_GET['id']);

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	?>
			
			<center>
				<img src="./productos/<?php echo $row['imagen'];?>"><br>
				<span><?php echo $row['nombre'];?></span><br>
				<span>Precio: <?php echo $row['precio'];?></span><br>
				<a href="./carritodecompras.php?id=<?php  echo $row['id'];?>">Añadir al carrito de compras</a>
			</center>
		
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>