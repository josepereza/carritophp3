<?php
session_start();
include 'cabezera.php';
if(!isset($_SESSION['cliente'])){
	$_SESSION['cliente']="";}
?>
<section>
	<div class="container">
    <form id="formulario" method="post" action="./verificarcliente.php">
		<?php 
		if(isset($_GET['error'])){
			echo '<center>Datos No Validos</center>';
		}
		?>
		<label for="usuario">Usuario</label><br>
		<input type="text" id="usuario" name="Usuario" placeholder="usuario" ><br>
		<label for="password">Password</label><br>
		<input type="password" id="password" name="Password" placeholder="password" ><br>
		<input type="submit" name="aceptar" value="Aceptar" class="aceptar">
	</form>

    </div>
	</section>
</body>
</html>
<?php
include 'pie.html';
?>