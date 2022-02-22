<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";
	$objv= new ventas();
	$c=new conectar();
	$conexion= $c->conexion();	
	$FI=$_GET['FI'];
	$FF=$_GET['FF'];
	
	

 $sql="SELECT 	ve.id_venta,
				ve.fechaCompra,
				ve.precio,
				ve.cantidadV,
				art.nombre,
				art.precio,
				art.descripcion,
				ve.pago
		from ventas  as ve 
		inner join articulos as art
		on ve.id_producto=art.id_producto
WHERE fechaCompra BETWEEN '$FI' AND '$FF' AND pago='1'";

$result=mysqli_query($conexion,$sql);


 ?>	

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Reporte de venta</title>
 	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
	
 </head>
 <body>	
	 	
        <h1>INVERNADEROS "EL PIRUL"</h1>
 		<h2>Reporte de ventas</h2>
		<h2>De: <?php echo $FI?>       Hasta: <?php echo $FF?> </h2>
		<h4>--------------------------------------------------------------------------------------------------</h4>
		<h2>Ventas pagadas con efectivo</h2>
 		<table class="table" style="border-collapse: collapse;" border="1">
 			<tr>
			 	<td>Fecha</td>
 				<td>Producto</td>
 				<td>Total</td>
 				<td>Cantidad</td>
 				<td>Descripcion</td>
				
 			</tr>

 			<?php 
 			
			$total=0;
			while($ver=mysqli_fetch_row($result)):
 			 ?>

 			<tr>
			 	<td><?php echo $ver[1]; ?></td>
 				<td><?php echo $ver[4]; ?></td>
 				<td><?php echo "$".$ver[2]; ?></td>
 				<td><?php echo $ver[3]; ?></td>
 				<td><?php echo $ver[6]; ?></td>
				 
 			</tr>
 			<?php 
 				$total=$total + $ver[5] * $ver[3] ;
 			endwhile;
 			 ?>
 			 <tr>
 			 	<td>Total general=  <?php echo "$".$total; ?></td>
 			 </tr>
 		</table>





		 <h2>Ventas pagadas con tarjeta</h2>
 		<table class="table" style="border-collapse: collapse;" border="1">
		 <?php
		 $sql="SELECT 	ve.id_venta,
						ve.fechaCompra,
						ve.precio,
						ve.cantidadV,
						art.nombre,
						art.precio,
						art.descripcion,
						ve.pago
						from ventas  as ve 
						inner join articulos as art
						on ve.id_producto=art.id_producto
						WHERE fechaCompra BETWEEN '$FI' AND '$FF' AND pago='0'";

$result=mysqli_query($conexion,$sql);

		 ?>
 			<tr>
			 	<td>Fecha</td>
 				<td>Producto</td>
 				<td>Total</td>
 				<td>Cantidad</td>
 				<td>Descripcion</td>
 			</tr>

 			<?php 
 			
			$total2=0;
			while($tar=mysqli_fetch_row($result)):
 			 ?>

 			<tr>
			 	<td><?php echo $tar[1]; ?></td>
 				<td><?php echo $tar[4]; ?></td>
 				<td><?php echo "$".$tar[2]; ?></td>
 				<td><?php echo $tar[3]; ?></td>
 				<td><?php echo $tar[6]; ?></td>
 			</tr>
 			<?php 
 				$total2=$total2 + $tar[5] * $tar[3];
 			endwhile;
 			 ?>
 			 <tr>
 			 	<td>Total general=  <?php echo "$".$total2; ?></td>
 			 </tr>
 		</table>
 </body>
 </html>