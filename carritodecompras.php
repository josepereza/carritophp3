<?php
	session_start();
	include './conexion.php';
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['id'])){
					$arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$_GET['id']){
							$encontro=true;
							$numero=$i;
						}
					}
					if($encontro==true){
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
					}else{
						$nombre="";
						$precio=0;
						$imagen="";

						//$re=mysql_query("select * from productos where id=".$_GET['id']);
						$stmt = $dbConn->query('SELECT * FROM productos where id='.$_GET['id']);
						while ($f = $stmt->fetch(PDO::FETCH_ASSOC)) {
							$nombre=$f['nombre'];
							$precio=$f['precio'];
							$imagen=$f['imagen'];
						}
						$datosNuevos=array('Id'=>$_GET['id'],
										'Nombre'=>$nombre,
										'Precio'=>$precio,
										'Imagen'=>$imagen,
										'Cantidad'=>1);

						array_push($arreglo, $datosNuevos);
						$_SESSION['carrito']=$arreglo;

					}
		}


	}else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$imagen="";

			//$re=mysql_query("select * from productos where id=".$_GET['id']);
			$stmt = $dbConn->query('SELECT * FROM productos where id='.$_GET['id']);

			while ($f = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$nombre=$f['nombre'];
				$precio=$f['precio'];
				$imagen=$f['imagen'];
			}

			$arreglo[]=array('Id'=>$_GET['id'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}
	include 'cabezera.php';
		echo "<section>";
		echo "<div class='container productos'>";
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			
			$total=0;
			for($i=0;$i<count($datos);$i++){
				
	?>
				
				<div class="producto">
					
						<img src="./productos/<?php echo $datos[$i]['Imagen'];?>" widht="200px" height="100px"><br>
						<span ><?php echo $datos[$i]['Nombre'];?></span><br>
						<span>Precio: <?php echo $datos[$i]['Precio'];?></span><br>
						<span>Cantidad: 
							<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
							data-precio="<?php echo $datos[$i]['Precio'];?>"
							data-id="<?php echo $datos[$i]['Id'];?>"
							class="cantidad" size="2" >
						</span><br>
						<span class="subtotal">Subtotal:<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br>
						<a href="borrar_elemento_array.php?id=<?php echo $i?>" class="eliminar" data-id="<?php echo $datos[$i]['Id']?>">Eliminar</a>
					
				
				</div>
			<?php
				$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
				$_SESSION['facturaTotal']=$total;
			}

				echo "</div>";
			}else{
				echo '<center><h2>No has añadido ningun producto</h2></center>';
			}
			echo '<center><h2 id="total">Total: '.$total.'</h2></center>';
			if($total!=0){
					echo '<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>';
			/*?>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="formulario">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="upload" value="1">
					<input type="hidden" name="business" value="tu_correo_paypal@gmail.com">
					<input type="hidden" name="currency_code" value="MXN">
					
					<?php 
						for($i=0;$i<count($datos);$i++){
					?>
						<input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Nombre'];?>">
						<input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Precio'];?>">
						<input	type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Cantidad'];?>">	
					<?php 
						}
					?>
						

					<center><input type="submit" value="comprar" class="aceptar" style="width:200px"></center>
			</form>
			<?php*/
			}
			
		?>
		<center><a href="./">Ver catalogo</a></center>

		
	</section>
	<?php 
	include 'pie.html';
		
	?>

<script>
	$(document).ready(function(){
	
	$('.cantidad').keyup(function(e){
		if($(this).val()!=''){
			if(e.keyCode==13){
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: '+(precio*cantidad));
				$.post('./js/modificarDatos.php',{
					Id:id,
					Precio:precio,
					Cantidad:cantidad
				},function(e){
						$('#total').text('Total: '+e);
						location.href="./carritodecompras.php";
				});
			}
		}
	});
})
</script>
	<script>
function faltaclienteJS(){
	alert("Debe loguearse");
}
</script>
