<?php

session_start();


include "../conexion.php";
if (empty($_SESSION['cliente_id'])){

header("Location:../index.php?registrado=1");
}

		$arreglo=$_SESSION['carrito'];

		$numeroventa=0;
		$statement = $dbConn->prepare("select * from compras order by numeroventa DESC limit 1");
		$statement->execute();
		while ($f=$statement->fetch()) {
					$numeroventa=$f['numeroventa'];	
		}
		if($numeroventa==0){
			$numeroventa=1;
		}else{
			$numeroventa=$numeroventa+1;
		}

		if (!empty($_SESSION['cliente_id'])){
			for($i=0; $i<count($arreglo);$i++){
				$statement=$dbConn->prepare("insert into compras (numeroventa, imagen,nombre,precio,cantidad,subtotal)
				 values(?,?,?,?,?,?)");
					//".$numeroventa.",
					//'".$arreglo[$i]['Imagen']."',
					//'".$arreglo[$i]['Nombre']."',	
					//'".$arreglo[$i]['Precio']."',
					//'".$arreglo[$i]['Cantidad']."',
					//'".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."'
					//)");
					$subtotal=($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']);
					$statement->execute([$numeroventa,$arreglo[$i]['Imagen'],$arreglo[$i]['Nombre'],$arreglo[$i]['Precio'],$arreglo[$i]['Cantidad'],$subtotal]);
	
					$statement2=$dbConn->prepare("select stock from productos where id=".$arreglo[$i]['Id']);
					$statement2->execute();
							while ($f=$statement2->fetch()) {
								//hago el calculo de cuantos van a quedar en Stock
								$x=$f['stock']-$arreglo[$i]['Cantidad'];
								//Actualizo el registro stock de la BD
								$statement2=$dbConn->prepare("update productos set stock=".$x." where id=".$arreglo[$i]['Id']);
								$statement2->execute();}
								
					
	
			}
			$_SESSION["fecha"]=date("Y-m-d");
			$statement3=$dbConn->prepare("insert into ventas (numeroventa, fecha,cliente,total) values (?,?,?,?)");
					$statement3->execute([$numeroventa,$_SESSION["fecha"],$_SESSION['cliente_id'],$_SESSION['facturaTotal']]);
						
	
	
			
			}else {
				header ('Location:../index.php?registrado=1');
			}
			
		

		/*
		$numeroventa=0;

		$re=mysql_query("select * from compras order by numeroventa DESC limit 1") or die(mysql_error());	
		while (	$f=mysql_fetch_array($re)) {
					$numeroventa=$f['numeroventa'];	
		}
		if($numeroventa==0){
			$numeroventa=1;
		}else{
			$numeroventa=$numeroventa+1;
		}
		for($i=0; $i<count($arreglo);$i++){
			mysql_query("insert into compras (numeroventa, imagen,nombre,precio,cantidad,subtotal) values(
				".$numeroventa.",
				'".$arreglo[$i]['Imagen']."',
				'".$arreglo[$i]['Nombre']."',	
				'".$arreglo[$i]['Precio']."',
				'".$arreglo[$i]['Cantidad']."',
				'".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."'
				)")or die(mysql_error());
		}*/
		$total=0;
		$tabla='<table border="1">
			<tr>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Subtotal</th>
			</tr>';
		for($i=0;$i<count($arreglo);$i++){
			$tabla=$tabla.'<tr>
				<td>'.$arreglo[$i]['Nombre'].'</td>
				<td>'.$arreglo[$i]['Cantidad'].'</td>
				<td>'.$arreglo[$i]['Precio'].'</td>
				<td>'.$arreglo[$i]['Cantidad']*$arreglo[$i]['Precio'].'</td>
				</tr>
			';
			$total=$total+($arreglo[$i]['Cantidad']*$arreglo[$i]['Precio']);
		}
		$tabla=$tabla.'</table>';
		//echo $tabla;
		$nombre="Luis Alberto Grijalva";
		$fecha=date("d-m-Y");
		$hora=date("H:i:s");
		$asunto="Compra en X dominio";
		$desde="www.tupagina.com";
		$correo="josepereza66@gmail.com";
		$comentario='
			<div style="
				border:1px solid #d6d2d2;
				border-radius:5px;
				padding:10px;
				width:800px;
				heigth:300px;
			">
			<center>
				<img src="https://yt4.ggpht.com/-3eVnkBJn2y4/AAAAAAAAAAI/AAAAAAAAAAA/hAqolVRolHc/s48-c-k-no/photo.jpg" width="300px" heigth="250px">
				<h1>Muchas gracias por comprar en mi carrito de compras</h1>
			</center>
			<p>Hola '.$nombre.' muchas gracias por comprar aquí te mando los detalles de tu compra</p>
			<p>Lista de Artículos<br>
				'.$tabla.'
				<br>
				Total del pago es: '.$total.'

			</p>
			</div>

		';

		//echo $comentario;
		$headers="MIME-Version: 1.0\r\n";
		$headers.="Content-type: text/html; charset=utf8\r\n";
		$headers.="From: Remitente\r\n";
		mail($correo,$asunto,$comentario,$headers);
		unset($_SESSION['carrito']);
		//header("Location: ../index.php");
		echo "<script type='text/javascript'>
		location.href = '../index.php';
	
	</script>";
		

?>