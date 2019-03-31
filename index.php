  
	
	<?php
	
	if (!empty($_GET['registrado'])) {
		echo "<script type='text/javascript'>
		alert('Para comprar necesita registrarse');
	</script>";

	}
	session_start();
	
	
	if(!isset($_SESSION['cliente'])){
		$_SESSION['cliente']="";}

		include 'cabezera.php';

		
		echo "<br><br>";
		echo "<section>";
		echo "<div class='container center-align'>";
		echo "<div class='productos'>";
		include 'conexion.php';

		$stmt = $dbConn->query('SELECT * FROM productos');
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	?>
			<div class="producto ">
				
					<img src="./productos/<?php echo $row['imagen'];?>" height="200px" ><br>
					<span><?php echo $row['nombre'];?></span><br>
					<a href="./detalles.php?id=<?php  echo $row['id'];?>">ver</a>
				
			</div>
	<?php
		}

		echo "</div> </div></section>";
		include 'pie.html';
	
	
	
	?>

